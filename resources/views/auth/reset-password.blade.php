<x-guest-layout
    page-title="Set new password"
    panel-title="Finish recovery and restore access"
    panel-accent="#withRESET"
    panel-copy="Choose a new password and return to the portal with the same controlled authentication experience."
    panel-footer="Reset deliberately. Re-enter securely."
>
    <div class="signin-stack">
        <p class="signin-intro">Set a new password for your account.</p>

        <form method="POST" action="{{ route('password.store') }}" class="signin-form">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="signin-field">
                <div class="signin-field__label-row">
                    <x-input-label for="email" :value="__('Email')" />
                    <span class="signin-required">*</span>
                </div>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="signin-field">
                <div class="signin-field__label-row">
                    <x-input-label for="password" :value="__('Password')" />
                    <span class="signin-required">*</span>
                </div>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="signin-field">
                <div class="signin-field__label-row">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <span class="signin-required">*</span>
                </div>
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <x-primary-button>
                {{ __('Reset password') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
