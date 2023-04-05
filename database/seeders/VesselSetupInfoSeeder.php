<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\VesselInfo\Models\VesselSetupInfo;

class VesselSetupInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //vessel setup info seeder
        VesselSetupInfo::create([
            'name' => 'vessel class',
            'code' => 'vessel_class code',
            'type' =>'vcl',
            'status' =>'A',
        ]);
        VesselSetupInfo::create([
            'name' => 'insurance',
            'code' => 'insurance code',
            'type' =>'ins',
            'status' =>'A',
        ]);
        VesselSetupInfo::create([
            'name' => 'vessel cond',
            'code' => 'vessel_cond code',
            'type' =>'vcn',
            'status' =>'I',
        ]);
        VesselSetupInfo::create([
            'name' => 'vessel type',
            'code' => 'vessel_type code',
            'type' =>'vst',
            'status' =>'A',
        ]);
        VesselSetupInfo::create([
            'name' => 'hull',
            'code' => 'hull code',
            'type' =>'hul',
            'status' =>'I',
        ]);
        VesselSetupInfo::create([
            'name' => 'color',
            'code' => 'color code',
            'type' =>'clr',
            'status' =>'A',
        ]);
        VesselSetupInfo::create([
            'name' => 'navigation equipment',
            'code' => 'navigation equipment code',
            'type' =>'neq',
            'status' =>'A',
        ]);
        VesselSetupInfo::create([
            'name' => 'life saving equipment',
            'code' => 'life_saving_equipment code',
            'type' =>'lse',
            'status' =>'I',
        ]);
        VesselSetupInfo::create([
            'name' => 'communication equipment',
            'code' => 'communication_equipment code',
            'type' =>'ceq',
            'status' =>'A',
        ]);
        VesselSetupInfo::create([
            'name' => 'gear',
            'code' => 'gear code',
            'type' =>'ger',
            'status' =>'A',
        ]);
        VesselSetupInfo::create([
            'name' => 'fillament',
            'code' => 'fillament code',
            'type' =>'flm',
            'status' =>'I',
        ]);
    }

}
