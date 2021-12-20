<?php

use Illuminate\Database\Seeder;

class AdminLogin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => 'Administrator']);
        $role = \Spatie\Permission\Models\Role::create(['name' => 'Member']);

        $user = \App\User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'affiliate_id' => \Illuminate\Support\Str::uuid(),
            'password' => bcrypt('admin-secret'),
            'email_verified_at' => now()
        ]);

        $user->assignRole('Administrator');
    }
}
