<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserManagementController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->orderByDesc('is_super_admin')
            ->orderBy('name')
            ->get();

        return view('admin.users.index', [
            'users' => $users,
            'userStats' => [
                'total' => $users->count(),
                'disabled' => $users->whereNotNull('disabled_at')->count(),
                'super_admins' => $users->filter->isSuperAdmin()->count(),
                'verified' => $users->whereNotNull('email_verified_at')->count(),
            ],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'is_super_admin' => ['nullable', 'boolean'],
            'email_verified' => ['nullable', 'boolean'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'is_super_admin' => (bool) ($validated['is_super_admin'] ?? false),
            'email_verified_at' => ($validated['email_verified'] ?? false) ? now() : null,
        ]);

        return back()->with('status', "{$user->name} has been added.");
    }

    public function updateSuperAdmin(User $user): RedirectResponse
    {
        $currentUser = request()->user();

        if ($currentUser->is($user) && $user->is_super_admin) {
            $remainingSuperAdmins = User::query()
                ->whereKeyNot($user->getKey())
                ->where('is_super_admin', true)
                ->count();

            abort_if($remainingSuperAdmins === 0, 422, 'You cannot remove the last database-backed superadmin.');
        }

        $user->forceFill([
            'is_super_admin' => ! $user->is_super_admin,
        ])->save();

        return back()->with('status', $user->is_super_admin
            ? "{$user->name} can now manage users."
            : "{$user->name} no longer has superadmin access.");
    }

    public function updateVerification(User $user): RedirectResponse
    {
        $user->forceFill([
            'email_verified_at' => $user->email_verified_at ? null : now(),
        ])->save();

        return back()->with('status', $user->email_verified_at
            ? "{$user->name} is now marked as verified."
            : "{$user->name} is no longer marked as verified.");
    }

    public function updateDisabled(User $user): RedirectResponse
    {
        $currentUser = request()->user();

        abort_if($currentUser->is($user), 422, 'You cannot disable the account you are currently using.');

        if (! $user->isDisabled() && $user->is_super_admin) {
            $remainingSuperAdmins = User::query()
                ->whereKeyNot($user->getKey())
                ->where('is_super_admin', true)
                ->whereNull('disabled_at')
                ->count();

            abort_if($remainingSuperAdmins === 0, 422, 'You cannot disable the last active database-backed superadmin.');
        }

        $user->forceFill([
            'disabled_at' => $user->isDisabled() ? null : now(),
        ])->save();

        return back()->with('status', $user->isDisabled()
            ? "{$user->name} has been disabled."
            : "{$user->name} has been re-enabled.");
    }
}
