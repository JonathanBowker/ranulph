<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Jonathan Bowker',
                'email' => 'jonathan@advancedanalytica.co.uk',
                'is_super_admin' => true,
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Test Admin',
                'email' => 'test@example.com',
                'is_super_admin' => false,
                'email_verified_at' => null,
            ],
            [
                'name' => 'Rupert Evil',
                'email' => 'rupert@ethicsinsight.co',
                'is_super_admin' => true,
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $attributes) {
            User::updateOrCreate(
                ['email' => $attributes['email']],
                [
                    'name' => $attributes['name'],
                    'password' => Hash::make('password'),
                    'is_super_admin' => $attributes['is_super_admin'],
                    'email_verified_at' => $attributes['email_verified_at'],
                    'disabled_at' => null,
                ],
            );
        }
    }
}
