<x-guest-layout
    page-title="Verify email"
    panel-title="Complete email verification"
    panel-accent="#withTRUST"
    panel-copy="Before entering the portal fully, verify the email address tied to your account."
    panel-footer="Verified identity supports controlled access."
>
    <div class="signin-stack">
        <p class="signin-intro">
            Thanks for signing up. Verify your email address by clicking the link we sent you. If you didn't receive it, we can send another.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="auth-status mt-6">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="signin-form">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <x-primary-button>
                    {{ __('Resend verification email') }}
                </x-primary-button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="signin-secondary-action">
                    {{ __('Log out') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
