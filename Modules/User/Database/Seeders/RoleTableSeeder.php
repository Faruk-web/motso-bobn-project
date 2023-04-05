<?php

namespace Modules\User\Database\Seeders;

use Modules\User\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DataList = collect([
                         [
                             'title' => 'Super Admin',
                             'name' => 'superadmin',
                             'guard_name' => 'web',
                             'is_only_superadmin' => now(),
                         ],
                         [
                             'title' => 'Admin',
                             'name' => 'admin',
                             'guard_name' => 'web',
                             'is_only_superadmin' => null,
                         ],
                         [
                             'title' => 'Member',
                             'name' => 'member',
                             'guard_name' => 'web',
                             'is_only_superadmin' => null,
                         ]
                     ]);


        $DataList = $DataList->map(function ($item) {
            return array_merge($item, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        })->toArray();

        Role::insertOrIgnore($DataList);
    }
}
