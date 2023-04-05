<?php

namespace Modules\VesselInfo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class VesselSetupInfo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $timestamps = true;
    // protected $dates = ['deleted_at'];

    public function scopeActive($query)
    {
        return $query->whereStatus('A');
    }
    public function gearType(): HasMany
    {
        return $this->hasMany(VesselWiseGearInfo::class,'gear_id','id');
    }
   
}
