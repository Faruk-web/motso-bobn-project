<?php

namespace Modules\User\Database\Seeders;

use Modules\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $User = User::create([
             'name' => 'Super Admin',
             'email' => 'superadmin@leotechapp',
             'mobile' => '0171112345678',
             'password' => Hash::make('12345678'),
         ]);

        $User->assignRole('superadmin');
        // $User->givePermissionTo('view.dashboard', 'edit.dashboard');
    }
}
