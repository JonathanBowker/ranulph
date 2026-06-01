<x-guest-layout
    page-title="Confirm password"
    panel-title="Confirm identity before continuing"
    panel-accent="#withVERIFY"
    panel-copy="This protected action requires a fresh password confirmation inside the same themed authentication surface."
    panel-footer="Extra verification for higher-risk actions."
>
    <div class="signin-stack">
        <p class="signin-intro">This is a secure area of the application. Confirm your password before continuing.</p>

        <form method="POST" action="{{ route('password.confirm') }}" class="signin-form">
            @csrf

            <div class="signin-field">
                <div class="signin-field__label-row">
                    <x-input-label for="password" :value="__('Password')" />
                    <span class="signin-required">*</span>
                </div>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </form>
    </div>
</x-guest-layout>
