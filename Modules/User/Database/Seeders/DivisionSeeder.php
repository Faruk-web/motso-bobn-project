<?php

namespace Modules\User\Database\Seeders;

use Modules\User\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DivisionList = [
            ['id' => 1, 'country_id' => 19, 'name' => 'Barisal', 'div_code' => '10', 'bn_name' => 'বরিশাল', 'created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 2, 'country_id' => 19, 'name' => 'Chittagong', 'div_code' => '20', 'bn_name' => 'চট্টগ্রাম', 'created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 3, 'country_id' => 19, 'name' => 'Dhaka', 'div_code' => '30', 'bn_name' => 'ঢাকা', 'created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 4, 'country_id' => 19, 'name' => 'Khulna', 'div_code' => '40', 'bn_name' => 'খুলনা', 'created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 5, 'country_id' => 19, 'name' => 'Rajshahi', 'div_code' => '50', 'bn_name' => 'রাজশাহী', 'created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 6, 'country_id' => 19, 'name' => 'Rangpur', 'div_code' => '55', 'bn_name' => 'রংপুর', 'created_at' => now(), 'status' => 1, 'updated_at' => now()],
            ['id' => 7, 'country_id' => 19, 'name' => 'Sylhet', 'div_code' => '60', 'bn_name' => 'সিলেট', 'created_at' => now(), 'status' => 1, 'updated_at' => now()],
            // ['id' => 8, 'country_id' => 19, 'name' => 'Mymensingh', 'bn_name' => 'ময়মনসিংহ', 'created_at' => now(), 'status' => 1, 'updated_at' => now()],
        ];

        Division::insertOrIgnore($DivisionList);
    }
}
