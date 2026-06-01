<x-guest-layout
    page-title="Reset password"
    panel-title="Recover access without losing control"
    panel-accent="#withRECOVERY"
    panel-copy="Request a reset link and move back into the governed portal flow with the same visual system used at sign in."
    panel-footer="Security first. Friction only where it matters."
>
    <div class="signin-stack">
        <p class="signin-intro">Enter your email address and we will send a password reset link.</p>

        <x-auth-session-status class="mt-6" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="signin-form">
            @csrf

            <div class="signin-field">
                <div class="signin-field__label-row">
                    <x-input-label for="email" :value="__('Email')" />
                    <span class="signin-required">*</span>
                </div>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="you@youremail.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <x-primary-button>
                {{ __('Email password reset link') }}
            </x-primary-button>
        </form>

        <a href="{{ route('login') }}" class="signin-secondary-action">Back to sign in</a>
    </div>
</x-guest-layout>
