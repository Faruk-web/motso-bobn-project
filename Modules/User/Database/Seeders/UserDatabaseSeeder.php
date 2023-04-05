<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
                    RoleTableSeeder::class,
                    CountrySeeder::class,
                    DistrictSeeder::class,
                    DivisionSeeder::class,
                    UpazilaSeeder::class,
                    UserTableSeeder::class,
                    SoftwareSettingTableSeeder::class,
               ]);
    }
}
