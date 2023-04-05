<?php

namespace Modules\User\Http\Pages\Settings;

use Modules\User\Models\Branch;
use Illuminate\Support\Facades\Hash;
use Modules\Core\Http\Common\Component;
use Illuminate\Validation\Rules\Password;
use Modules\User\Models\Upazila;
use Modules\User\Models\District;

class Branchs extends Component
{
    public $branch_id;
    public $name;
    public $reg_code;
    public $phone_no;
    public $email_add;
    public $address;
    public $web_address;
    public $contact_person;
    public $contact_person_mobile;
    public $contact_email;
    public $status;
    public $map_url;
    
    public $entry_by;
    public $update_by;
    public $division_code;
    public $district_code;
    public $upazila_code;

    protected $listeners = [
        'openBranchModal',
        'branchDelete',
    ];

    public function openBranchModal($data = [])
    {
        $this->reset();
        if (isset($data['id'])) {
            $this->branchEdit($data['id']);
        }

        $this->dispatchBrowserEvent('modalOpen', 'BranchModal');
    }

    public function updatedUpazilaCode($value)
    {
        if($value){
            $this->reg_code = Upazila::find($value)->upa_code;
        }else{
            $this->reg_code = null;
        }
    }

    public function branchEdit($id)
    {
        $user_info= auth()->user();
        $this->branch_id = $id;
        $Branch = Branch::find($id);
        if (!$Branch) {
            $this->alert('error', 'Branch not found!');
            return;
        }
        
        $this->update_by = $user_info->id;
        $this->name = $Branch->name;
        $this->reg_code = $Branch->reg_code;
        $this->phone_no = $Branch->phone_no;
        $this->email_add = $Branch->email_add;
        $this->address = $Branch->address;
        $this->web_address = $Branch->web_address;
        $this->contact_person = $Branch->contact_person;
        $this->contact_person_mobile = $Branch->contact_person_mobile;
        $this->contact_email = $Branch->contact_email;
        $this->status = $Branch->status;
        $this->division_code = $Branch->division_code;
        $this->district_code = $Branch->district_code;
        $this->upazila_code = $Branch->upazila_code;
        $this->map_url = $Branch->map_url;
    }


    public function branchStore()
    {
        $user_info= auth()->user();
        $validation = [
                    'name' => ['required', 'string', 'max:255'],
                ];
        $this->validate($validation);

        if ($this->branch_id) {
            $Branch = Branch::find($this->branch_id);
        } else {
            $Branch = new Branch();
        }
        $Branch->entry_by = $user_info->id;
        $Branch->name = $this->name;
        $Branch->reg_code = $this->reg_code;
        $Branch->phone_no = $this->phone_no;
        $Branch->email_add = $this->email_add;
        $Branch->address = $this->address;
        $Branch->web_address = $this->web_address;
        $Branch->contact_person = $this->contact_person;
        $Branch->contact_person_mobile = $this->contact_person_mobile;
        $Branch->contact_email = $this->contact_email;
        $Branch->status = $this->status;
        $Branch->division_code = $this->division_code;
        $Branch->district_code = $this->district_code;
        $Branch->upazila_code = $this->upazila_code;
        $Branch->map_url = $this->map_url;
        $Branch->save();
        $this->dispatchBrowserEvent('refreshDatatable');
        $this->dispatchBrowserEvent('modalClose', 'BranchModal');
        $this->alert('success', 'Profile updated successfully!');
    }

    public function branchDelete($data = [])
    {
        $data = $this->alertConfirm($data);

        if (isset($data['id'])) {
            $Branch = Branch::find($data['id']);

            if (!$Branch) {
                $this->alert('error', 'Branch not found!');
                return;
            }

            $Branch->delete();

            $this->emit('refreshDatatable');
            $this->alert('success', 'Branch deleted successfully!');
        }
    }
  
    public function render()
    {
        return view('user::pages.settings.branch')->layout('template::layouts.backend');
    }
}
