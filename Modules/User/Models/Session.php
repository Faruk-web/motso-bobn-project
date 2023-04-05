<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Models\User;
class Session extends Model
{
    use HasFactory;

    protected $fillable = [];
    public function UserInfo(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}