<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function scopeIsUserId($query)
    {
        return $query->where('user_id','=',\Auth::id());
        
    }
}
