<?php

namespace Modules\VesselInfo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class VesselWiseEquipmentInfo extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function VesselSetupequevment(): BelongsTo
    {
        return $this->belongsTo(VesselSetupInfo::class,'equipment_ids','id');
    }
}
