<?php

namespace Modules\VesselInfo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class VesselWiseInsuranceInfo extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function VesselGear(): BelongsTo
    {
        return $this->belongsTo(VesselSetupInfo::class,'gear_id');
    }
}