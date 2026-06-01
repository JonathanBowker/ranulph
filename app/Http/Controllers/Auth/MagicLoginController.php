<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MagicLoginToken;
use App\Models\User;
use App\Notifications\MagicLoginLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class MagicLoginController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        /** @var User|null $user */
        $user = User::query()
            ->where('email', $validated['email'])
            ->first();

        if ($user && ! $user->isDisabled()) {
            $plainTextToken = Str::random(64);

            $user->magicLoginTokens()
                ->whereNull('used_at')
                ->delete();

            $magicLoginToken = $user->magicLoginTokens()->create([
                'token' => hash('sha256', $plainTextToken),
                'expires_at' => now()->addMinutes(15),
            ]);

            $user->notify(new MagicLoginLink($magicLoginToken, $plainTextToken));
        }

        return back()->with('status', 'If the account exists, a sign-in link has been sent.');
    }

    public function consume(Request $request, string $token): RedirectResponse
    {
        $magicLoginToken = MagicLoginToken::query()
            ->where('token', hash('sha256', $token))
            ->first();

        if (! $magicLoginToken || ! $magicLoginToken->isUsable() || $magicLoginToken->user->isDisabled()) {
            throw ValidationException::withMessages([
                'email' => 'This magic link is invalid or has expired.',
            ]);
        }

        $magicLoginToken->forceFill([
            'used_at' => now(),
        ])->save();

        $magicLoginToken->user->magicLoginTokens()
            ->whereKeyNot($magicLoginToken->getKey())
            ->whereNull('used_at')
            ->delete();

        Auth::login($magicLoginToken->user, remember: true);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
