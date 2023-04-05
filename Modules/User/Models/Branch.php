<?php

namespace Modules\User\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    public function division()
     {
         return $this->BelongsTo(Division::class,'division_code','id');
     }
     public function upazila()
     {
         return $this->BelongsTo(Upazila::class,'upazila_code','id');
     }

    protected $fillable = [];
}