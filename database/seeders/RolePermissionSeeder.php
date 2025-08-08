<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use PragmaRX\Google2FAQRCode\Google2FA; // Tambahkan ini di atas

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $google2fa = new Google2FA();

        // Roles
        $superAdminRole = Role::firstOrCreate(['name' => 'superAdmin'], ['guard_name' => 'web']);
        $authorRole = Role::firstOrCreate(['name' => 'author'], ['guard_name' => 'web']);
        $adminRole = Role::firstOrCreate(['name' => 'admin'], ['guard_name' => 'web']);

        // Super admin
        $userSU = User::firstOrCreate(
            ['email' => 'admin-halcen@salmanitb.com'],
            [
                'name' => 'Admin Pusat Halal',
                'password' => bcrypt('secret-halcen'),
                'two_factor_secret' => $google2fa->generateSecretKey(), // 👈 generate secret 2FA
                'role' => 'superAdmin', // Tambahkan ini untuk menetapkan role
            ]
        );

        if (!$userSU->hasRole($superAdminRole)) {
            $userSU->assignRole($superAdminRole);
        }

        // Author
        $userAuthor = User::firstOrCreate(
            ['email' => 'author@example.com'],
            [
                'name' => 'Author User',
                'password' => bcrypt('author-password'),
                'role' => 'author', // Tambahkan ini untuk menetapkan role
            ]
        );

        if (!$userAuthor->hasRole($authorRole)) {
            $userAuthor->assignRole($authorRole);
        }

        // Super admin
        $userSU2 = User::firstOrCreate(
            ['email' => 'jundiabdullah@salmanitb.com'],
            [
                'name' => 'Admin Bayangan',
                'password' => bcrypt('secret'),
                'two_factor_secret' => 'HALOSAYAJUNDI', // 👈 generate secret 2FA
                'role' => 'superAdmin', // Tambahkan ini untuk menetapkan role
            ]
        );

        if (!$userSU2->hasRole($superAdminRole)) {
            $userSU2->assignRole($superAdminRole);
        }
    }
}
