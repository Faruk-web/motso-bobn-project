<?php

namespace Modules\VesselInfo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishingSpeciesInfo extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function FishingSpeciesInfo(): BelongsTo
    {
        return $this->belongsTo(FishingSpeciesInfo::class,'fishing_species_ids');
    }
}
