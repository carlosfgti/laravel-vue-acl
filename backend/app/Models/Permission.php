<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, Profile::class);
    }
}
