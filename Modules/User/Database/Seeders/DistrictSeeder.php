<?php

namespace Modules\User\Database\Seeders;

use Modules\User\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $DistrictList = [
            ['id' => 1, 'division_id' => 3, 'name' => 'Dhaka', 'dist_code' => '26', 'bn_name' => 'ঢাকা', 'lat' => 23.7115253, 'lon' => 90.4111451, 'url' => 'www.dhaka.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'division_id' => 3, 'name' => 'Faridpur', 'dist_code' => '29', 'bn_name' => 'ফরিদপুর', 'lat' => 23.6070822, 'lon' => 89.8429406, 'url' => 'www.faridpur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'division_id' => 3, 'name' => 'Gazipur', 'dist_code' => '33', 'bn_name' => 'গাজীপুর', 'lat' => 24.0022858, 'lon' => 90.4264283, 'url' => 'www.gazipur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'division_id' => 3, 'name' => 'Gopalganj', 'dist_code' => '35', 'bn_name' => 'গোপালগঞ্জ', 'lat' => 23.0050857, 'lon' => 89.8266059, 'url' => 'www.gopalganj.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'division_id' => 8, 'name' => 'Jamalpur', 'dist_code' => '39', 'bn_name' => 'জামালপুর', 'lat' => 24.937533, 'lon' => 89.937775, 'url' => 'www.jamalpur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'division_id' => 3, 'name' => 'Kishoreganj', 'dist_code' => '48', 'bn_name' => 'কিশোরগঞ্জ', 'lat' => 24.444937, 'lon' => 90.776575, 'url' => 'www.kishoreganj.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'division_id' => 3, 'name' => 'Madaripur', 'dist_code' => '54', 'bn_name' => 'মাদারীপুর', 'lat' => 23.164102, 'lon' => 90.1896805, 'url' => 'www.madaripur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'division_id' => 3, 'name' => 'Manikganj', 'dist_code' => '56', 'bn_name' => 'মানিকগঞ্জ', 'lat' => 0, 'lon' => 0, 'url' => 'www.manikganj.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'division_id' => 3, 'name' => 'Munshiganj', 'dist_code' => '59', 'bn_name' => 'মুন্সিগঞ্জ', 'lat' => 0, 'lon' => 0, 'url' => 'www.munshiganj.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'division_id' => 8, 'name' => 'Mymensingh', 'dist_code' => '61', 'bn_name' => 'ময়মনসিং', 'lat' => 0, 'lon' => 0, 'url' => 'www.mymensingh.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'division_id' => 3, 'name' => 'Narayanganj', 'dist_code' => '67', 'bn_name' => 'নারায়াণগঞ্জ', 'lat' => 23.63366, 'lon' => 90.496482, 'url' => 'www.narayanganj.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'division_id' => 3, 'name' => 'Narsingdi', 'dist_code' => '68', 'bn_name' => 'নরসিংদী', 'lat' => 23.932233, 'lon' => 90.71541, 'url' => 'www.narsingdi.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'division_id' => 8, 'name' => 'Netrokona', 'dist_code' => '72', 'bn_name' => 'নেত্রকোনা', 'lat' => 24.870955, 'lon' => 90.727887, 'url' => 'www.netrokona.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'division_id' => 3, 'name' => 'Rajbari', 'dist_code' => '82', 'bn_name' => 'রাজবাড়ি', 'lat' => 23.7574305, 'lon' => 89.6444665, 'url' => 'www.rajbari.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'division_id' => 3, 'name' => 'Shariatpur', 'dist_code' => '86', 'bn_name' => 'শরীয়তপুর', 'lat' => 0, 'lon' => 0, 'url' => 'www.shariatpur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'division_id' => 8, 'name' => 'Sherpur', 'dist_code' => '89', 'bn_name' => 'শেরপুর', 'lat' => 25.0204933, 'lon' => 90.0152966, 'url' => 'www.sherpur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'division_id' => 3, 'name' => 'Tangail', 'dist_code' => '93', 'bn_name' => 'টাঙ্গাইল', 'lat' => 0, 'lon' => 0, 'url' => 'www.tangail.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'division_id' => 5, 'name' => 'Bogra', 'dist_code' => '10', 'bn_name' => 'বগুড়া', 'lat' => 24.8465228, 'lon' => 89.377755, 'url' => 'www.bogra.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'division_id' => 5, 'name' => 'Joypurhat', 'dist_code' => '38', 'bn_name' => 'জয়পুরহাট', 'lat' => 0, 'lon' => 0, 'url' => 'www.joypurhat.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'division_id' => 5, 'name' => 'Naogaon', 'dist_code' => '64', 'bn_name' => 'নওগাঁ', 'lat' => 0, 'lon' => 0, 'url' => 'www.naogaon.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'division_id' => 5, 'name' => 'Natore', 'dist_code' => '69', 'bn_name' => 'নাটোর', 'lat' => 24.420556, 'lon' => 89.000282, 'url' => 'www.natore.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'division_id' => 5, 'name' => 'Nawabganj', 'dist_code' => '70', 'bn_name' => 'নবাবগঞ্জ', 'lat' => 24.5965034, 'lon' => 88.2775122, 'url' => 'www.chapainawabganj.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'division_id' => 5, 'name' => 'Pabna', 'dist_code' => '76', 'bn_name' => 'পাবনা', 'lat' => 23.998524, 'lon' => 89.233645, 'url' => 'www.pabna.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'division_id' => 5, 'name' => 'Rajshahi', 'dist_code' => '81', 'bn_name' => 'রাজশাহী', 'lat' => 0, 'lon' => 0, 'url' => 'www.rajshahi.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'division_id' => 5, 'name' => 'Sirajgonj', 'dist_code' => '88', 'bn_name' => 'সিরাজগঞ্জ', 'lat' => 24.4533978, 'lon' => 89.7006815, 'url' => 'www.sirajganj.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'division_id' => 6, 'name' => 'Dinajpur', 'dist_code' => '27', 'bn_name' => 'দিনাজপুর', 'lat' => 25.6217061, 'lon' => 88.6354504, 'url' => 'www.dinajpur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'division_id' => 6, 'name' => 'Gaibandha', 'dist_code' => '32', 'bn_name' => 'গাইবান্ধা', 'lat' => 25.328751, 'lon' => 89.528088, 'url' => 'www.gaibandha.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'division_id' => 6, 'name' => 'Kurigram', 'dist_code' => '49', 'bn_name' => 'কুড়িগ্রাম', 'lat' => 25.805445, 'lon' => 89.636174, 'url' => 'www.kurigram.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'division_id' => 6, 'name' => 'Lalmonirhat', 'dist_code' => '52', 'bn_name' => 'লালমনিরহাট', 'lat' => 0, 'lon' => 0, 'url' => 'www.lalmonirhat.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'division_id' => 6, 'name' => 'Nilphamari', 'dist_code' => '73', 'bn_name' => 'নীলফামারী', 'lat' => 25.931794, 'lon' => 88.856006, 'url' => 'www.nilphamari.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'division_id' => 6, 'name' => 'Panchagarh', 'dist_code' => '77', 'bn_name' => 'পঞ্চগড়', 'lat' => 26.3411, 'lon' => 88.5541606, 'url' => 'www.panchagarh.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 32, 'division_id' => 6, 'name' => 'Rangpur', 'dist_code' => '85', 'bn_name' => 'রংপুর', 'lat' => 25.7558096, 'lon' => 89.244462, 'url' => 'www.rangpur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 33, 'division_id' => 6, 'name' => 'Thakurgaon', 'dist_code' => '94', 'bn_name' => 'ঠাকুরগাঁও', 'lat' => 26.0336945, 'lon' => 88.4616834, 'url' => 'www.thakurgaon.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 34, 'division_id' => 1, 'name' => 'Barguna', 'dist_code' => '04', 'bn_name' => 'বরগুনা', 'lat' => 0, 'lon' => 0, 'url' => 'www.barguna.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 35, 'division_id' => 1, 'name' => 'Barisal', 'dist_code' => '06', 'bn_name' => 'বরিশাল', 'lat' => 0, 'lon' => 0, 'url' => 'www.barisal.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 36, 'division_id' => 1, 'name' => 'Bhola',  'dist_code' => '09', 'bn_name' => 'ভোলা', 'lat' => 22.685923, 'lon' => 90.648179, 'url' => 'www.bhola.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 37, 'division_id' => 1, 'name' => 'Jhalokati', 'dist_code' => '42', 'bn_name' => 'ঝালকাঠি', 'lat' => 0, 'lon' => 0, 'url' => 'www.jhalakathi.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 38, 'division_id' => 1, 'name' => 'Patuakhali',  'dist_code' => '78', 'bn_name' => 'পটুয়াখালী', 'lat' => 22.3596316, 'lon' => 90.3298712, 'url' => 'www.patuakhali.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 39, 'division_id' => 1, 'name' => 'Pirojpur',  'dist_code' => '79', 'bn_name' => 'পিরোজপুর', 'lat' => 0, 'lon' => 0, 'url' => 'www.pirojpur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 40, 'division_id' => 2, 'name' => 'Bandarban',  'dist_code' => '03', 'bn_name' => 'বান্দরবান', 'lat' => 22.1953275, 'lon' => 92.2183773, 'url' => 'www.bandarban.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 41, 'division_id' => 2, 'name' => 'Brahmanbaria',  'dist_code' => '12', 'bn_name' => 'ব্রাহ্মণবাড়িয়া', 'lat' => 23.9570904, 'lon' => 91.1119286, 'url' => 'www.brahmanbaria.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 42, 'division_id' => 2, 'name' => 'Chandpur',  'dist_code' => '13', 'bn_name' => 'চাঁদপুর', 'lat' => 23.2332585, 'lon' => 90.6712912, 'url' => 'www.chandpur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 43, 'division_id' => 2, 'name' => 'Chittagong', 'dist_code' => '15', 'bn_name' => 'চট্টগ্রাম', 'lat' => 22.335109, 'lon' => 91.834073, 'url' => 'www.chittagong.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 44, 'division_id' => 2, 'name' => 'Comilla',  'dist_code' => '19', 'bn_name' => 'কুমিল্লা', 'lat' => 23.4682747, 'lon' => 91.1788135, 'url' => 'www.comilla.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 45, 'division_id' => 2, 'name' => "Cox's Bazar",  'dist_code' => '22', 'bn_name' => 'কক্স বাজার', 'lat' => 0, 'lon' => 0, 'url' => 'www.coxsbazar.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 46, 'division_id' => 2, 'name' => 'Feni',  'dist_code' => '30', 'bn_name' => 'ফেনী', 'lat' => 23.023231, 'lon' => 91.3840844, 'url' => 'www.feni.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 47, 'division_id' => 2, 'name' => 'Khagrachari', 'dist_code' => '46', 'bn_name' => 'খাগড়াছড়ি', 'lat' => 23.119285, 'lon' => 91.984663, 'url' => 'www.khagrachhari.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 48, 'division_id' => 2, 'name' => 'Lakshmipur',  'dist_code' => '51', 'bn_name' => 'লক্ষ্মীপুর', 'lat' => 22.942477, 'lon' => 90.841184, 'url' => 'www.lakshmipur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 49, 'division_id' => 2, 'name' => 'Noakhali',  'dist_code' => '75', 'bn_name' => 'নোয়াখালী', 'lat' => 22.869563, 'lon' => 91.099398, 'url' => 'www.noakhali.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 50, 'division_id' => 2, 'name' => 'Rangamati',  'dist_code' => '84', 'bn_name' => 'রাঙ্গামাটি', 'lat' => 0, 'lon' => 0, 'url' => 'www.rangamati.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 51, 'division_id' => 7, 'name' => 'Habiganj',  'dist_code' => '36', 'bn_name' => 'হবিগঞ্জ', 'lat' => 24.374945, 'lon' => 91.41553, 'url' => 'www.habiganj.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 52, 'division_id' => 7, 'name' => 'Maulvibazar',  'dist_code' => '58', 'bn_name' => 'মৌলভীবাজার', 'lat' => 24.482934, 'lon' => 91.777417, 'url' => 'www.moulvibazar.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 53, 'division_id' => 7, 'name' => 'Sunamganj',  'dist_code' => '90', 'bn_name' => 'সুনামগঞ্জ', 'lat' => 25.0658042, 'lon' => 91.3950115, 'url' => 'www.sunamganj.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 54, 'division_id' => 7, 'name' => 'Sylhet',  'dist_code' => '91', 'bn_name' => 'সিলেট', 'lat' => 24.8897956, 'lon' => 91.8697894, 'url' => 'www.sylhet.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 55, 'division_id' => 4, 'name' => 'Bagerhat',  'dist_code' => '01', 'bn_name' => 'বাগেরহাট', 'lat' => 22.651568, 'lon' => 89.785938, 'url' => 'www.bagerhat.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 56, 'division_id' => 4, 'name' => 'Chuadanga',  'dist_code' => '18', 'bn_name' => 'চুয়াডাঙ্গা', 'lat' => 23.6401961, 'lon' => 88.841841, 'url' => 'www.chuadanga.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 57, 'division_id' => 4, 'name' => 'Jessore',  'dist_code' => '41', 'bn_name' => 'যশোর', 'lat' => 23.16643, 'lon' => 89.2081126, 'url' => 'www.jessore.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 58, 'division_id' => 4, 'name' => 'Jhenaidah',  'dist_code' => '44', 'bn_name' => 'ঝিনাইদহ', 'lat' => 23.5448176, 'lon' => 89.1539213, 'url' => 'www.jhenaidah.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 59, 'division_id' => 4, 'name' => 'Khulna',  'dist_code' => '47', 'bn_name' => 'খুলনা', 'lat' => 22.815774, 'lon' => 89.568679, 'url' => 'www.khulna.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 60, 'division_id' => 4, 'name' => 'Kushtia',  'dist_code' => '50', 'bn_name' => 'কুষ্টিয়া', 'lat' => 23.901258, 'lon' => 89.120482, 'url' => 'www.kushtia.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 61, 'division_id' => 4, 'name' => 'Magura',  'dist_code' => '55', 'bn_name' => 'মাগুরা', 'lat' => 23.487337, 'lon' => 89.419956, 'url' => 'www.magura.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 62, 'division_id' => 4, 'name' => 'Meherpur',  'dist_code' => '57', 'bn_name' => 'মেহেরপুর', 'lat' => 23.762213, 'lon' => 88.631821, 'url' => 'www.meherpur.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 63, 'division_id' => 4, 'name' => 'Narail',  'dist_code' => '65', 'bn_name' => 'নড়াইল', 'lat' => 23.172534, 'lon' => 89.512672, 'url' => 'www.narail.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 64, 'division_id' => 4, 'name' => 'Satkhira',  'dist_code' => '87', 'bn_name' => 'সাতক্ষীরা', 'lat' => 0, 'lon' => 0, 'url' => 'www.satkhira.gov.bd', 'status' => 1, 'created_at' => now(), 'updated_at' => now()],
            ];

        District::insertOrIgnore($DistrictList);
    }
}
