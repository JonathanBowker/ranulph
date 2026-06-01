<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'linkedin_id',
        'linkedin_avatar',
        'password',
        'is_super_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'disabled_at' => 'datetime',
            'email_verified_at' => 'datetime',
            'is_super_admin' => 'boolean',
            'password' => 'hashed',
        ];
    }

    public function isSuperAdmin(): bool
    {
        $superAdminEmails = collect(config('auth.super_admin_emails', []))
            ->map(fn (string $email) => mb_strtolower(trim($email)))
            ->filter();

        return $this->is_super_admin || $superAdminEmails->contains(mb_strtolower($this->email));
    }

    public function isDisabled(): bool
    {
        return $this->disabled_at !== null;
    }

    public function magicLoginTokens(): HasMany
    {
        return $this->hasMany(MagicLoginToken::class);
    }
}
