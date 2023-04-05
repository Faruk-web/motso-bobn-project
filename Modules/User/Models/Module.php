<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeWithoutCore($query)
    {
        return $query->whereNull('is_core');
    }

    public function Roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }
}