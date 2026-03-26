<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRolesSeeder extends Seeder
{
    public function run(): void
    {
        // Promote configured admin account if it exists.
        $adminEmail = env('ADMIN_EMAIL');
        if ($adminEmail) {
            User::query()
                ->where('email', $adminEmail)
                ->update([
                    'is_admin' => true,
                    'role' => User::ROLE_ADMIN,
                ]);
        }

        User::query()->updateOrCreate(
            ['email' => 'copywriter@enot24.local'],
            [
                'name' => 'Blog Copywriter',
                'password' => Hash::make('Copywriter123!'),
                'is_admin' => false,
                'role' => User::ROLE_COPYWRITER,
            ]
        );
    }
}
