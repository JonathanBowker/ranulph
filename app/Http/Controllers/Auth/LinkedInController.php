<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class LinkedInController extends Controller
{
    public function redirect(): RedirectResponse
    {
        if (! $this->isConfigured()) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'LinkedIn sign in is not configured yet.']);
        }

        /** @var RedirectResponse $response */
        $response = Socialite::driver('linkedin-openid')
            ->scopes(['openid', 'profile', 'email'])
            ->redirect();

        return $response;
    }

    public function callback(): RedirectResponse
    {
        if (! $this->isConfigured()) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'LinkedIn sign in is not configured yet.']);
        }

        try {
            /** @var SocialiteUser $linkedInUser */
            $linkedInUser = Socialite::driver('linkedin-openid')->user();
        } catch (Throwable) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'LinkedIn sign in could not be completed.']);
        }

        $user = $this->resolveUser($linkedInUser);

        if (! $user) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'LinkedIn did not return enough account information to sign you in.']);
        }

        if ($user->isDisabled()) {
            return redirect()
                ->route('login')
                ->withErrors(['email' => 'This account has been disabled.']);
        }

        Auth::login($user, remember: true);
        request()->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    protected function resolveUser(SocialiteUser $linkedInUser): ?User
    {
        $linkedInId = trim((string) $linkedInUser->getId());

        if ($linkedInId === '') {
            return null;
        }

        $user = User::query()->where('linkedin_id', $linkedInId)->first();

        if ($user) {
            $user->update([
                'linkedin_avatar' => $linkedInUser->getAvatar(),
            ]);

            return $user;
        }

        $email = trim((string) $linkedInUser->getEmail());

        if ($email === '') {
            return null;
        }

        $user = User::query()->where('email', $email)->first();
        $attributes = [
            'linkedin_id' => $linkedInId,
            'linkedin_avatar' => $linkedInUser->getAvatar(),
        ];

        if ($this->emailIsVerified($linkedInUser) && ! $user?->email_verified_at) {
            $attributes['email_verified_at'] = now();
        }

        if ($user) {
            if ($user->linkedin_id && $user->linkedin_id !== $linkedInId) {
                return null;
            }

            $user->fill($attributes);
            $user->save();

            return $user;
        }

        return User::query()->create($attributes + [
            'name' => $this->resolveName($linkedInUser),
            'email' => $email,
            'password' => Str::random(40),
        ]);
    }

    protected function resolveName(SocialiteUser $linkedInUser): string
    {
        $name = trim((string) $linkedInUser->getName());

        if ($name !== '') {
            return $name;
        }

        return 'LinkedIn User';
    }

    protected function emailIsVerified(SocialiteUser $linkedInUser): bool
    {
        $rawUser = is_array($linkedInUser->user ?? null) ? $linkedInUser->user : [];

        return ($rawUser['email_verified'] ?? false) === true;
    }

    protected function isConfigured(): bool
    {
        return filled(config('services.linkedin-openid.client_id'))
            && filled(config('services.linkedin-openid.client_secret'))
            && filled(config('services.linkedin-openid.redirect'));
    }
}
