<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function Division()
    {
        return $this->belongsTo(Division::class);
    }

    public function scopeSearch($query, $term)
    {
        return $query->whereLike(['name', 'bn_name'], $term);
    }
}
