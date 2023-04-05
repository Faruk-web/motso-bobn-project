<?php

namespace Modules\VesselInfo\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VesselWiseFishingSpeciesInfo extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function FishingSpeciesInfo(): BelongsTo
    {
        return $this->belongsTo(FishingSpeciesInfo::class,'fishing_species_ids');
    }
}
