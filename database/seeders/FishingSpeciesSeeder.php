<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\FishingSpeciesInfo;

class FishingSpeciesInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //vessel setup info seeder
        FishingSpeciesInfo::create([
            'name' => 'Barracuda (Great) ',
            'code' => '234123',
            'status' =>'1',
        ]);
        FishingSpeciesInfo::create([
            'name' => 'Barracuda (Pacific) ',
            'code' => '324234',
            'status' =>'1',
        ]);
        FishingSpeciesInfo::create([
            'name' => 'Barramundi ',
            'code' => '324243',
            'status' =>'1',
        ]);
    }

}
