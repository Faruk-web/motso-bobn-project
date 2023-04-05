<?php

namespace Modules\User\Http\Pages;
use Modules\VesselInfo\Models\FishingAreaInfo;
use Modules\VesselInfo\Models\FishingSpeciesInfo;
use Modules\VesselInfo\Models\VesselOwnerInfo;
use Modules\VesselInfo\Models\VesselSetupInfo;
use Modules\VesselInfo\Models\VesselInfo;
use Modules\VesselInfo\Models\PortInfo;
use Modules\VesselInfo\Models\VesselWiseGearInfo;
use Modules\User\Models\Menu;
use Modules\User\Models\User;
use Modules\User\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Http\Common\Component;
use Illuminate\Support\Facades\Request;
// use Modules\User\Http\Pages\Carbon;
use Modules\User\Models\Session;
use Carbon\Carbon;
class Dashboard extends Component
{
    public $name;
    public $email;
    public $phone;
    public $link;
    public $User;

    public function mount()
    {
        // $menu = Menu::with('Module')->active()->rootMenu()->get();

        // $menu->map(function ($menu) {
        //     dd($menu->permission_name);
        // });



        // $this->gearSurveyEdit($User);

    }


    public function render()
    {
        $start_date = now()->subYear(); // Get the date one year ago from today
       
        $end_date = now();
        
        $users = User::count();
        $fishing_area_infos = FishingAreaInfo::count();
        $fishing_gear_info = VesselWiseGearInfo::count();
        $VesselOwnerInfo = VesselOwnerInfo::count();
        $fishing_port_infos = PortInfo::count();
        $fishing_spaces_infos = FishingSpeciesInfo::count();
        $vessel_setup_infos = VesselSetupInfo::count();
        $total_vessel = VesselInfo::count();
        $total_crew = VesselInfo::sum('total_crew');
        $total_industrial = VesselInfo::where('vessel_class_id',78)->count();
        $total_veryfied_vessel = VesselInfo::where('status',1)->count();
        $login_date_time=Carbon::now()->toTimeString();
        $allSessions = Session::with('UserInfo')->get();
        $user_info= auth()->user();
        $yearly_registration = VesselInfo::whereBetween('update_date', [$start_date, $end_date])
        ->count();
        // dd($yearly_registration);
        $fishing_permit = VesselInfo::where('fishing_permit', 2)->count();
        $registered_with_mmo = VesselInfo::where('registered_with_mmo', 2)->count();
        $registered_with_mmo_without = VesselInfo::where('registered_with_mmo', 1)->count();
        $no_permit = VesselInfo::where('fishing_permit', 1)->count();
        $no_license = VesselInfo::where('fishing_license', 1)->count();
        $license = VesselInfo::where('fishing_license', 2)->count();
        $seaworthiness_certificate = VesselInfo::where('seaworthiness_certificate', 2)->count();
        $no_seaworthiness_certificate = VesselInfo::where('seaworthiness_certificate', 1)->count();
        $with_fishing_permit = VesselInfo::where('fishing_permit', 2)->count();
        $without_fishing_permit = VesselInfo::where('fishing_permit', 1)->count();
        $fishing_number = FishingSpeciesInfo::count();
        $ip_addres=Request::ip();
        $letest_login_list = VesselInfo::whereBetween('update_date', [$start_date, $end_date])->take(10)
        ->get();
        // $letest_login_list = VesselInfo::orderBy('submission_time', 'desc')->take(8)
        // ->get();
        // dd($fishing_gear_info);
        $data = [
            [
                'label' => 'Count',
                'data' => [875, 640, 352, 749],
                'backgroundColor' => ['#FF6384', '#36A2EB', '#FFCE56', '#8DB600']
            ],
            
        ];
        return view('user::pages.dashboard',compact('login_date_time','registered_with_mmo_without','registered_with_mmo','with_fishing_permit','data','no_seaworthiness_certificate','seaworthiness_certificate','no_permit','no_license','vessel_setup_infos','total_veryfied_vessel','fishing_spaces_infos','fishing_port_infos','total_crew','total_industrial','VesselOwnerInfo','fishing_number','fishing_permit','license','allSessions','ip_addres','users','fishing_area_infos','fishing_gear_info','total_vessel','user_info','yearly_registration','letest_login_list'))->layout('template::layouts.backend');
    }
}
