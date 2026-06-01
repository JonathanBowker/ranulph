<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Support\RanulphContent;

class RanulphLandingController extends Controller
{
    public function show(Request $request): View
    {
        $ownOptions = RanulphContent::ownOptions();
        $otherOptions = RanulphContent::otherOptions();
        $leafCatalog = RanulphContent::leafCatalog();

        $initialState = [
            'branch' => old('branch', data_get(session('ranulph_state'), 'branch', '')),
            'leaf' => old('leaf', data_get(session('ranulph_state'), 'leaf', '')),
            'freebie_requested' => old('freebie_requested', data_get(session('ranulph_state'), 'freebie_requested', '')),
            'urgency_flag' => filter_var(
                old('urgency_flag', data_get(session('ranulph_state'), 'urgency_flag', false)),
                FILTER_VALIDATE_BOOLEAN
            ),
            'submit_label' => 'Send',
            'selected_title' => '',
        ];

        if ($initialState['leaf'] !== '' && isset($leafCatalog[$initialState['leaf']])) {
            $initialState['submit_label'] = $leafCatalog[$initialState['leaf']]['submit_label'];
            $initialState['selected_title'] = $leafCatalog[$initialState['leaf']]['title'];
        }

        return view('welcome', [
            'ownOptions' => $ownOptions,
            'otherOptions' => $otherOptions,
            'preferredNextSteps' => RanulphContent::preferredNextSteps(),
            'roleOptions' => RanulphContent::roleOptions(),
            'initialState' => $initialState,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'website' => ['nullable', 'max:0'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'organisation' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'preferred_next_step' => [
                'required',
                'string',
                Rule::in([
                    'Book a scoping call',
                    'Request a deep-dive assessment',
                    'Share documents first',
                ]),
            ],
            'message' => ['nullable', 'string', 'max:2000'],
            'branch' => ['required', Rule::in(['own', 'other'])],
            'leaf' => ['required', Rule::in(array_keys(RanulphContent::leafCatalog()))],
            'freebie_requested' => ['nullable', 'string', 'max:255'],
            'time_sensitive' => ['nullable', 'accepted'],
            'confidentiality_consent' => ['accepted'],
        ]);

        Log::info('Ranulph enquiry submitted', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'organisation' => $validated['organisation'],
            'role' => $validated['role'] ?? null,
            'preferred_next_step' => $validated['preferred_next_step'],
            'message' => $validated['message'] ?? null,
            'branch' => $validated['branch'],
            'leaf' => $validated['leaf'],
            'freebie_requested' => $validated['freebie_requested'] ?? null,
            'time_sensitive' => $request->boolean('time_sensitive'),
        ]);

        return redirect()->to(url('/').'#contact')
            ->with('ranulph_status', 'Thanks. Your enquiry has been received, and we will come back with the right next step.')
            ->with('ranulph_state', [
                'branch' => $validated['branch'],
                'leaf' => $validated['leaf'],
                'freebie_requested' => $validated['freebie_requested'] ?? '',
                'urgency_flag' => $request->boolean('time_sensitive'),
            ]);
    }
}
