<?php

namespace App\Notifications;

use App\Models\MagicLoginToken;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;

class MagicLoginLink extends Notification
{
    use Queueable;

    public function __construct(
        protected MagicLoginToken $magicLoginToken,
        protected string $plainTextToken,
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $url = URL::route('magic-login.consume', [
            'token' => $this->plainTextToken,
        ]);

        return (new MailMessage)
            ->subject('Your Ranulph sign-in link')
            ->greeting('Sign in to Ranulph')
            ->line('Use the button below to sign in without a password.')
            ->action('Sign in with magic link', $url)
            ->line('This link expires in 15 minutes and can only be used once.');
    }
}
