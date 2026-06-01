<x-guest-layout
    page-title="Sign up"
    panel-title="Build secure access for your team"
    panel-accent="#withCONTROL"
    panel-copy="Create a new account inside the same governed environment, with the same black, white, teal, and orange control language as sign in."
    panel-footer="Provision carefully. Operate confidently."
>
    <div class="signin-stack">
        <p class="signin-intro">Create your account and continue into the portal.</p>

        <form method="POST" action="{{ route('register') }}" class="signin-form">
            @csrf

            <div class="signin-field">
                <div class="signin-field__label-row">
                    <x-input-label for="name" :value="__('Name')" />
                    <span class="signin-required">*</span>
                </div>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="signin-field">
                <div class="signin-field__label-row">
                    <x-input-label for="email" :value="__('Email')" />
                    <span class="signin-required">*</span>
                </div>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="you@youremail.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="signin-field">
                <div class="signin-field__label-row">
                    <x-input-label for="password" :value="__('Password')" />
                    <span class="signin-required">*</span>
                </div>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Create a password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="signin-field">
                <div class="signin-field__label-row">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <span class="signin-required">*</span>
                </div>
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Repeat your password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <x-primary-button>
                {{ __('Create account') }}
            </x-primary-button>
        </form>

        <a href="{{ route('login') }}" class="signin-secondary-action">Back to sign in</a>
    </div>
</x-guest-layout>
