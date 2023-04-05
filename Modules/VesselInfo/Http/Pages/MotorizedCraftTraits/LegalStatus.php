<?php
namespace Modules\VesselInfo\Http\Pages\MotorizedCraftTraits;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Modules\VesselInfo\Models\Image;
use Modules\VesselInfo\Models\VesselWiseInsuranceInfo;

trait LegalStatus
{

    use WithFileUploads;

    public $vessel_insured;
    public $lives_insured;
    public $health_insurance;
    public $vessel_insured_issue_date;
    public $vessel_insured_expired_date;
    public $lives_insured_issue_date;
    public $lives_insured_expired_date;
    public $health_insurance_issue_date;
    public $health_insurance_expired_date;
    
    public $other_legal_status;
    public $other_fishing_no;
    public $other_first_issue_date;
    public $other_first_expired_date;
    public $other_fishing_image_id;
    public $other_fishing_image_prev;
    
     //--LEGAL STATUS--//
     public $registered_with_mmo;
     public $mmo_registration_no;
     public $date_issued;
     public $expired_date_mmo;
     public $license_first_expired_date;
     public $permit_first_expired_date;
     public $seawortthiness_cert_expired_date;
     
     public $fishing_license;
     public $license_first_issue_date;
     public $fishing_license_no;
     public $insurance_status_id;
     public $fishing_permit_no;
     public $permit_first_issue_date;
     public $fishing_permit;
     public $seaworthiness_certificate;
     public $seaworthiness_certificate_no;
     public $seawortthiness_cert_issue_date;
     public $registration_certificate_image_id;
     public $fishing_license_image_id;
     public $insurance_image_id;
     public $fishing_permit_image_id;
     public $seaworthiness_cert_img_id;
     public $registration_certificate_image_prev;
     public $fishing_license_image_prev;
     public $insurance_image_prev;
     public $fishing_permit_image_prev;
     public $seaworthiness_cert_image_prev;

     

    public function legalStatusValidation()
    {
        # Validation @request
        $this->validate([
            'registered_with_mmo' => ['required', 'string'],
            'mmo_registration_no' => ['required', 'string'],
            'date_issued' => ['required', 'date'],
            'fishing_license' => ['required', 'string'],
            'license_first_issue_date' => ['required', 'date'],
            'fishing_license_no' => ['required', 'string'],
            'insurance_status_id' => ['required', 'string'],
            'fishing_permit_no' => ['required', 'string'],
            'permit_first_issue_date' => ['required', 'date'],
            'fishing_permit' => ['required', 'string'],
            'seaworthiness_certificate' => ['required', 'string'],
            'seaworthiness_certificate_no' => ['required', 'string'],
            'seawortthiness_cert_issue_date' => ['required', 'date'],
        ]);

    }

    public function legalStatusStore($VesselInfo)
    {
        if($this->registration_certificate_image_id){
            $Image = Image::findOrNew($VesselInfo->registration_certificate_image_id);

            if($Image->image){
                if(Storage::disk('public')->exists($Image->image)){
                    Storage::disk('public')->delete($Image->image);
                }
            }
            $Image->image = $this->registration_certificate_image_id->store('photos','public');
            $Image->save();
            $VesselInfo->registration_certificate_image_id = $Image->id;
        }
        if($this->fishing_license_image_id){
            $Image = Image::findOrNew($VesselInfo->fishing_license_image_id);

            if($Image->image){
                if(Storage::disk('public')->exists($Image->image)){
                    Storage::disk('public')->delete($Image->image);
                }
            }
            $Image->image = $this->fishing_license_image_id->store('photos','public');
            $Image->save();
            $VesselInfo->fishing_license_image_id = $Image->id;
        }
        if($this->insurance_image_id){
            $Image = Image::findOrNew($VesselInfo->insurance_image_id);

            if($Image->image){
                if(Storage::disk('public')->exists($Image->image)){
                    Storage::disk('public')->delete($Image->image);
                }
            }
            $Image->image = $this->insurance_image_id->store('photos','public');
            $Image->save();
            $VesselInfo->insurance_image_id = $Image->id;
        }
        if($this->fishing_permit_image_id){
            $Image = Image::findOrNew($VesselInfo->fishing_permit_image_id);

            if($Image->image){
                if(Storage::disk('public')->exists($Image->image)){
                    Storage::disk('public')->delete($Image->image);
                }
            }
            $Image->image = $this->fishing_permit_image_id->store('photos','public');
            $Image->save();
            $VesselInfo->fishing_permit_image_id = $Image->id;
        }
        if($this->seaworthiness_cert_img_id){
            $Image = Image::findOrNew($VesselInfo->seaworthiness_cert_img_id);

            if($Image->image){
                if(Storage::disk('public')->exists($Image->image)){
                    Storage::disk('public')->delete($Image->image);
                }
            }
            $Image->image = $this->seaworthiness_cert_img_id->store('photos','public');
            $Image->save();
            $VesselInfo->seaworthiness_cert_img_id = $Image->id;
        }
        if($this->other_fishing_image_id){
            $Image = Image::findOrNew($VesselInfo->other_fishing_image_id);

            if($Image->image){
                if(Storage::disk('public')->exists($Image->image)){
                    Storage::disk('public')->delete($Image->image);
                }
            }
            $Image->image = $this->other_fishing_image_id->store('photos','public');
            $Image->save();
            $VesselInfo->other_fishing_image_id = $Image->id;
        }
        // -------------------only insurance----------
        if($this->vessel_insured==1){
            $user_info= auth()->user();
            $VesselWiseInsuranceInfo = VesselWiseInsuranceInfo::where('vessel_info_id',$VesselInfo->id)->firstOrNew();
            $VesselWiseInsuranceInfo->vessel_info_id = $VesselInfo->id;
            $VesselWiseInsuranceInfo->insurance_id = $this->vessel_insured;
            $VesselWiseInsuranceInfo->issue_date = $this->vessel_insured_issue_date;
            $VesselWiseInsuranceInfo->expire_date = $this->vessel_insured_expired_date;
            $VesselWiseInsuranceInfo->entry_by = $user_info->id;
            $VesselWiseInsuranceInfo->status = 'A';
            $VesselWiseInsuranceInfo->save();
          // -------------------only insurance----------
        }
        if($this->lives_insured==1){
            $user_info= auth()->user();
            $VesselWiseInsuranceInfo = VesselWiseInsuranceInfo::where('vessel_info_id',$VesselInfo->id)->firstOrNew();
            $VesselWiseInsuranceInfo->vessel_info_id = $VesselInfo->id;
            $VesselWiseInsuranceInfo->insurance_id = $this->vessel_insured;
            $VesselWiseInsuranceInfo->issue_date = $this->lives_insured_issue_date;
            $VesselWiseInsuranceInfo->expire_date = $this->lives_insured_expired_date;
            $VesselWiseInsuranceInfo->entry_by = $user_info->id;
            $VesselWiseInsuranceInfo->status = 'A';
            $VesselWiseInsuranceInfo->save();
          // -------------------only insurance----------
        }
        if($this->health_insurance==1){
            $user_info= auth()->user();
            $VesselWiseInsuranceInfo = VesselWiseInsuranceInfo::where('vessel_info_id',$VesselInfo->id)->firstOrNew();
            $VesselWiseInsuranceInfo->vessel_info_id = $VesselInfo->id;
            $VesselWiseInsuranceInfo->insurance_id = $this->vessel_insured;
            $VesselWiseInsuranceInfo->issue_date = $this->health_insurance_issue_date;
            $VesselWiseInsuranceInfo->expire_date = $this->health_insurance_expired_date;
            $VesselWiseInsuranceInfo->entry_by = $user_info->id;
            $VesselWiseInsuranceInfo->status = 'A';
            $VesselWiseInsuranceInfo->save();
          // -------------------only insurance----------
        }
        $VesselInfo->other_fishing_no = $this->other_fishing_no;
        $VesselInfo->other_first_issue_date = $this->other_first_issue_date;
        $VesselInfo->other_first_expired_date = $this->other_first_expired_date;
        $VesselInfo->registered_with_mmo = $this->registered_with_mmo;
        $VesselInfo->registered_with_mmo = $this->registered_with_mmo;
        $VesselInfo->mmo_registration_no = $this->mmo_registration_no;
        $VesselInfo->date_issued = $this->date_issued;
        $VesselInfo->expired_date_mmo = $this->expired_date_mmo;
        $VesselInfo->license_first_expired_date = $this->license_first_expired_date;
        $VesselInfo->permit_first_expired_date = $this->permit_first_expired_date;
        $VesselInfo->seawortthiness_cert_expired_date = $this->seawortthiness_cert_expired_date;
        $VesselInfo->fishing_license = $this->fishing_license;
        $VesselInfo->license_first_issue_date = $this->license_first_issue_date;
        $VesselInfo->fishing_license_no = $this->fishing_license_no;
        $VesselInfo->insurance_status_id = $this->insurance_status_id ? implode(',', $this->insurance_status_id) : null;
        $VesselInfo->fishing_permit_no = $this->fishing_permit_no;
        $VesselInfo->permit_first_issue_date = $this->permit_first_issue_date;
        $VesselInfo->fishing_permit = $this->fishing_permit;
        $VesselInfo->seaworthiness_certificate = $this->seaworthiness_certificate;
        $VesselInfo->seaworthiness_certificate_no = $this->seaworthiness_certificate_no;
        $VesselInfo->seawortthiness_cert_issue_date = $this->seawortthiness_cert_issue_date;

        $VesselInfo->save();
    }

    public function legalStatusEdit($VesselInfo)
    {
        $this->other_fishing_no = $VesselInfo->other_fishing_no;
        $this->other_first_issue_date = $VesselInfo->other_first_issue_date;
        $this->other_first_expired_date = $VesselInfo->other_first_expired_date;
        $this->registered_with_mmo = $VesselInfo->registered_with_mmo;
        $this->registered_with_mmo = $VesselInfo->registered_with_mmo;
        $this->mmo_registration_no = $VesselInfo->mmo_registration_no;
        $this->date_issued = $VesselInfo->date_issued;
        $this->expired_date_mmo = $VesselInfo->expired_date_mmo;
        $this->license_first_expired_date = $VesselInfo->license_first_expired_date;
        $this->permit_first_expired_date = $VesselInfo->permit_first_expired_date;
        $this->seawortthiness_cert_expired_date = $VesselInfo->seawortthiness_cert_expired_date;
        $this->fishing_license = $VesselInfo->fishing_license;
        $this->license_first_issue_date = $VesselInfo->license_first_issue_date;
        $this->fishing_license_no = $VesselInfo->fishing_license_no;
        $this->insurance_status_id = $VesselInfo->insurance_status_id ? explode(',', $VesselInfo->insurance_status_id) : null;
        $this->fishing_permit_no = $VesselInfo->fishing_permit_no;
        $this->permit_first_issue_date = $VesselInfo->permit_first_issue_date;
        $this->fishing_permit = $VesselInfo->fishing_permit;
        $this->seaworthiness_certificate = $VesselInfo->seaworthiness_certificate;
        $this->seaworthiness_certificate_no = $VesselInfo->seaworthiness_certificate_no;
        $this->seawortthiness_cert_issue_date = $VesselInfo->seawortthiness_cert_issue_date;
        $this->registration_certificate_image_prev = $VesselInfo->registration_certificate_image_id ? $VesselInfo->registrationCertificateImage->image : null;
        $this->fishing_license_image_prev = $VesselInfo->fishing_license_image_id ? $VesselInfo->fishingLicenseImage->image : null;
        $this->insurance_image_prev = $VesselInfo->insurance_image_id ? $VesselInfo->insuranceImage->image : null;
        $this->fishing_permit_image_prev = $VesselInfo->fishing_permit_image_id ? $VesselInfo->fishingPermitImage->image : null;
        $this->seaworthiness_cert_image_prev = $VesselInfo->seaworthiness_cert_img_id ? $VesselInfo->seaworthinessCartImage->image : null;
        $this->other_fishing_image_prev = $VesselInfo->other_fishing_image_id ? $VesselInfo->seaworthinessCartImage->image : null;
        
    }
}
