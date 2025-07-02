<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    CONST ADMIN_ROLE = 1;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles')->withTimestamps();;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions')->withTimestamps();;
    }
}
