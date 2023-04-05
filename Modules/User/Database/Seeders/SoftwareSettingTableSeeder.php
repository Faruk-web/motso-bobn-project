<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\SoftwareSetting;

class SoftwareSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SoftwareSetting::firstOrCreate([
            'copyright' => 'Leotech',
            'developer_by' => 'Leotech',
            'header_title' => 'Dof'
        ]);
    }
}
