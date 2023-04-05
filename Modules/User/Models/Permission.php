<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    protected $guarded = [];
    //Extended Permission Model
}
