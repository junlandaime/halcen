<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::create([
            'name' => 'superAdmin'
        ]);
        $authorRole = Role::create([
            'name' => 'author'
        ]);
        $memberRole = Role::create([
            'name' => 'member'
        ]);

        $userSU = User::create([
            'name' => 'Admin Pusat Halal',
            // 'avatar' => 'images/default-avatar.png',
            'email' => 'admin-halcen@salmanitb.com',
            'password' => bcrypt('secret-halcen')
        ]);

        $userSU2 = User::create([
            'name' => 'Jundi Abdullah',
            // 'avatar' => 'images/default-avatar.png',
            'email' => 'jdi.jundi99@gmail.com',
            'password' => bcrypt('secret')
        ]);

        $member1 = User::create([
            'name' => 'Jundii Abdullah',
            // 'avatar' => 'images/default-avatar.png',
            'email' => 'jdi.jundii99@gmail.com',
            'password' => bcrypt('secret')
        ]);

        $author1 = User::create([
            'name' => 'Jundthor Abdullah',
            // 'avatar' => 'images/default-avatar.png',
            'email' => 'jdi.jund99@gmail.com',
            'password' => bcrypt('secret')
        ]);

        $userSU->assignRole($superAdminRole);
        $userSU2->assignRole($superAdminRole);
        $member1->assignRole($memberRole);
        $author1->assignRole($authorRole);
    }
}
