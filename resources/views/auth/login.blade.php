<x-guest-layout
    page-title="Sign in"
    panel-title="Connect to our suite of intelligent services"
    panel-accent="#withRANULPH"
    panel-copy="Use Ranulph to turn risk insights into controlled AI communications, governed workflows, and machine-operable controls."
    panel-footer="Trusted by some of the world's largest brands"
>
    <div
        class="signin-stack"
        x-data="{ mode: 'password', showPassword: false }"
    >
        <div class="signin-switcher" role="tablist" aria-label="Sign in method">
            <button
                type="button"
                class="signin-switcher__button"
                :class="{ 'is-active': mode === 'password' }"
                :aria-selected="mode === 'password'"
                @click="mode = 'password'"
            >
                Password
            </button>
            <button
                type="button"
                class="signin-switcher__button"
                :class="{ 'is-active': mode === 'magic' }"
                :aria-selected="mode === 'magic'"
                @click="mode = 'magic'"
            >
                Magic link
            </button>
        </div>

        <section x-show="mode === 'password'" x-cloak>
            <p class="signin-intro">Sign in with your email and password.</p>

            <x-auth-session-status class="mt-6" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="signin-form">
                @csrf

                <div class="signin-field">
                    <div class="signin-field__label-row">
                        <x-input-label for="email" :value="__('Email')" />
                        <span class="signin-required">*</span>
                    </div>
                    <x-text-input
                        id="email"
                        class="block mt-1 w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="you@youremail.com"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="signin-field">
                    <div class="signin-field__meta">
                        <div class="signin-field__label-row">
                            <x-input-label for="password" :value="__('Password')" />
                            <span class="signin-required">*</span>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="signin-link" href="{{ route('password.request') }}">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    <div class="signin-password-wrap">
                        <x-text-input
                            id="password"
                            class="block mt-1 w-full"
                            x-bind:type="showPassword ? 'text' : 'password'"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                        />
                        <button type="button" class="signin-password-toggle" @click="showPassword = !showPassword" aria-label="Toggle password visibility">
                            <svg x-show="!showPassword" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M2.5 12s3.5-6 9.5-6 9.5 6 9.5 6-3.5 6-9.5 6-9.5-6-9.5-6z" fill="none" stroke="currentColor" stroke-width="1.8"/>
                                <circle cx="12" cy="12" r="3.25" fill="none" stroke="currentColor" stroke-width="1.8"/>
                            </svg>
                            <svg x-show="showPassword" x-cloak viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M3 3l18 18" fill="none" stroke="currentColor" stroke-width="1.8"/>
                                <path d="M10.6 10.7A3.1 3.1 0 0012 15.2a3.2 3.2 0 003.4-3.4" fill="none" stroke="currentColor" stroke-width="1.8"/>
                                <path d="M6.5 6.7A15.4 15.4 0 012 12s3.5 6 10 6a10.7 10.7 0 004.4-.9" fill="none" stroke="currentColor" stroke-width="1.8"/>
                                <path d="M9.1 4.6A11.7 11.7 0 0112 4c6.5 0 10 6 10 6a18.5 18.5 0 01-3.4 4.4" fill="none" stroke="currentColor" stroke-width="1.8"/>
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <x-primary-button>
                    {{ __('Sign in') }}
                </x-primary-button>
            </form>
        </section>

        <section x-show="mode === 'magic'" x-cloak>
            <p class="signin-intro">Send a secure one-time link to your email address.</p>

            <x-auth-session-status class="mt-6" :status="session('status')" />

            <form method="POST" action="{{ route('magic-login.store') }}" class="signin-form">
                @csrf

                <div class="signin-field">
                    <div class="signin-field__label-row">
                        <x-input-label for="magic_email" :value="__('Email')" />
                        <span class="signin-required">*</span>
                    </div>
                    <x-text-input
                        id="magic_email"
                        class="block mt-1 w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
                        placeholder="you@youremail.com"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <x-primary-button>
                    {{ __('Email magic link') }}
                </x-primary-button>
            </form>
        </section>

        <a href="{{ route('register') }}" class="signin-secondary-action">Sign up</a>

        <div class="signin-divider">
            <span>OR</span>
        </div>

        <a href="{{ route('auth.linkedin.redirect') }}" class="signin-oauth">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <rect x="2.25" y="2.25" width="19.5" height="19.5" rx="3.25" fill="#0A66C2"/>
                <circle cx="7.48" cy="8.04" r="1.28" fill="#fff"/>
                <path d="M6.33 10.15H8.63V17.5H6.33zM10.08 10.15h2.2v1.03h.03c.34-.64 1.16-1.22 2.39-1.22 2.55 0 3.02 1.68 3.02 3.86v3.68h-2.3v-3.26c0-.78-.02-1.78-1.09-1.78-1.09 0-1.25.85-1.25 1.72v3.32h-2.3z" fill="#fff"/>
            </svg>
            <span>Continue with LinkedIn</span>
        </a>

        <p class="signin-footnote">
            Don't have an account? Use the Sign up button above.
        </p>
    </div>
</x-guest-layout>
