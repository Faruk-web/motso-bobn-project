<?php

namespace Modules\VesselInfo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\User\Models\User;
use Modules\User\Models\Branch;
class VesselInfo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function VesselOwnerInfo(): BelongsTo
    {
        return $this->belongsTo(VesselOwnerInfo::class,'primary_owner_id');
    }
    public function VesselOwnerInfosecondery(): BelongsTo
    {
        return $this->belongsTo(VesselOwnerInfo::class,'secondary_owner_id');
    }
    public function OfficeInfo(): BelongsTo
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }
    public function UserInfo(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function VesselSetupInfo(): BelongsTo
    {
        return $this->belongsTo(VesselSetupInfo::class,'vessel_class_id');
    }
    public function VesselSetupins(): BelongsTo
    {
        return $this->belongsTo(VesselSetupInfo::class,'vessel_class_id')->where('type','ins');
    }
    public function VesselSetupneq(): BelongsTo
    {
        return $this->belongsTo(VesselSetupInfo::class,'vessel_class_id')->where('type','neq');
    }
    public function VesselSetupvcl(): BelongsTo
    {
        return $this->belongsTo(VesselSetupInfo::class,'vessel_class_id')->where('type','vcl');
    }
    public function VesselSetupflm(): BelongsTo
    {
        return $this->belongsTo(VesselSetupInfo::class,'vessel_class_id')->where('type','flm');
    }
    public function VesselSetupvst(): BelongsTo
    {
        return $this->belongsTo(VesselSetupInfo::class,'vessel_class_id')->where('type','vst');
    }
    public function VesselWiseFishingSpeciesInfo(): HasOne
    {
        return $this->hasOne(VesselWiseFishingSpeciesInfo::class, 'vessel_info_id');
    }
    public function VesselWiseFishingSpeciesInfoprimaery(): HasOne
    {
        return $this->hasOne(VesselWiseFishingSpeciesInfo::class, 'vessel_info_id')->where('fishing_species_type','P');
    }
    public function VesselWiseFishingSpeciesInfosecondery(): HasOne
    {
        return $this->hasOne(VesselWiseFishingSpeciesInfo::class, 'vessel_info_id')->where('fishing_species_type','S');
    }
    public function VesselWiseFishingSpeciesInfoother(): HasOne
    {
        return $this->hasOne(VesselWiseFishingSpeciesInfo::class, 'vessel_info_id')->where('fishing_species_type','O');
    }
    public function VesselWiseEquipmentInfo(): HasOne
    {
        return $this->hasOne(VesselWiseEquipmentInfo::class, 'vessel_info_id');
    }
    public function VesselWiseEquipmentneq(): HasOne
    {
        return $this->hasOne(VesselWiseEquipmentInfo::class, 'vessel_info_id')->where('type','neq');
    }
    public function VesselWiseEquipmentlse(): HasOne
    {
        return $this->hasOne(VesselWiseEquipmentInfo::class, 'vessel_info_id')->where('type','lse');
    }
    public function VesselWiseEquipmentceq(): HasOne
    {
        return $this->hasOne(VesselWiseEquipmentInfo::class, 'vessel_info_id')->where('type','ceq');
    }
    public function VesselWiseEquipmentfse(): HasOne
    {
        return $this->hasOne(VesselWiseEquipmentInfo::class, 'vessel_info_id')->where('type','fse');
    }
    public function VesselWiseGearInfo(): HasOne
    {
        return $this->hasOne(VesselWiseGearInfo::class, 'vessel_info_id');
    }
    public function registrationCertificateImage(): BelongsTo
    {
        return $this->belongsTo(Image::class,'registration_certificate_image_id');
    }

    public function fishingLicenseImage(): BelongsTo
    {
        return $this->belongsTo(Image::class,'fishing_license_image_id');
    }

    public function insuranceImage(): BelongsTo
    {
        return $this->belongsTo(Image::class,'insurance_image_id');
    }

    public function fishingPermitImage(): BelongsTo
    {
        return $this->belongsTo(Image::class,'fishing_permit_image_id');
    }

    public function seaworthinessCartImage(): BelongsTo
    {
        return $this->belongsTo(Image::class,'seaworthiness_cert_img_id');
    }

    public function User(): belongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    
    // public function scopeSearchFilter($query,$trems)
    // {
    //     return $query->whereLike(['name,User.name,'],$trems);
    // }
}
