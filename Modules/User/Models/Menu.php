<?php

namespace Modules\User\Models;

use Nwidart\Modules\Json;
use Modules\User\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public $timestamps = true;
    protected $dates = ['deleted_at'];

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function scopeRootMenu($query)
    {
        return $query->whereNull('parent_id');
    }

    public function Parent(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function SingleParent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function Module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function getPermissionNameAttribute()
    {
        if (file_exists($this->Module->path.'/common.json')) {
            $data = new Json($this->Module->path.'/common.json');
            $commonData = collect($data->get('route'))->where('route_name', $this->route_name)->first();
            return isset($commonData['permission']) ? $commonData['permission'] : null;
        }
    }
}
