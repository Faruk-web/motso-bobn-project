<?php
namespace Modules\User\Http\Pages\Settings;
use Modules\User\Models\SoftwareSetting;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Common\Component;
use Illuminate\Validation\Rules\Password;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SoftwareSettings extends Component
{
    use WithFileUploads;
    public $SoftwareSetting_id;
    public $copyright;
    public $developer_by;
    public $header_logo;
    public $header_logo_preview;
    public $company_logo;
    public $company_logo_preview;
    public $login_page;
    public $reset_page;
    public $otp_page;
    public $confiremation_page;
    public $faceboack;
    public $twitter;
    public $website;
    public $website_logo;
    public $background_imag;
    public $footer_logo;

    public $website_logo_pre;
    public $background_imag_pre;
    public $footer_logo_pre;

     public function userStore()
    {
        // $validation = [
        //             'copyright' => ['required', 'string', 'max:255'],
        //         ];

        // $this->validate($validation);

        $User = SoftwareSetting::firstOrNew();
        $User->copyright = $this->copyright;
        $User->developer_by = $this->developer_by;
        $User->login_page = $this->login_page;
        $User->reset_page = $this->reset_page;
        $User->otp_page = $this->otp_page;
        $User->confiremation_page = $this->confiremation_page;
        $User->faceboack = $this->faceboack;
        $User->twitter = $this->twitter;
        $User->website = $this->website;
        if($this->header_logo){
            if($User->header_logo){
                if(Storage::disk('public')->exists($User->header_logo)){
                    Storage::disk('public')->delete($User->header_logo);
                }
            }
            $User->header_logo = $this->header_logo->store('photos','public');
        }
        if($this->company_logo){
            if($User->company_logo){
                if(Storage::disk('public')->exists($User->company_logo)){
                    Storage::disk('public')->delete($User->company_logo);
                }
            }
            $User->company_logo = $this->company_logo->store('photos','public');
        }

        if($this->website_logo){
            if($User->website_logo){
                if(Storage::disk('public')->exists($User->website_logo)){
                    Storage::disk('public')->delete($User->website_logo);
                }
            }
            $User->website_logo = $this->website_logo->store('photos','public');
        }
        if($this->background_imag){
            if($User->background_imag){
                if(Storage::disk('public')->exists($User->background_imag)){
                    Storage::disk('public')->delete($User->background_imag);
                }
            }
            $User->background_imag = $this->background_imag->store('photos','public');
        }
        if($this->footer_logo){
            if($User->footer_logo){
                if(Storage::disk('public')->exists($User->footer_logo)){
                    Storage::disk('public')->delete($User->footer_logo);
                }
            }
            $User->footer_logo = $this->footer_logo->store('photos','public');
        }
        $User->save();
        $this->alert('success', 'Profile updated successfully!');
    }


    public function mount()
    {
        $User = SoftwareSetting::first();
        $this->copyright = $User->copyright;
        $this->copyright = $User->developer_by;
        $this->login_page = $User->login_page;
        $this->reset_page = $User->reset_page;
        $this->otp_page = $User->otp_page;
        $this->faceboack = $User->faceboack;
        $this->twitter = $User->twitter;
        $this->website = $User->website;
        $this->confiremation_page = $User->confiremation_page;
        $this->header_logo_preview = $User->header_logo;
        $this->company_logo_preview = $User->company_logo;
        $this->website_logo_pre = $User->website_logo;
        $this->background_imag_pre = $User->background_imag;
        $this->footer_logo_pre = $User->footer_logo;
    }


    public function render()
    {
        return view('user::pages.settings.softwaresetting')->layout('template::layouts.backend');
    }
}
