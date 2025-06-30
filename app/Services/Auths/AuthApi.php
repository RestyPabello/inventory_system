<?php

namespace App\Services\Auths;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AuthApi
{
    protected $user;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function createUser($request)
    {
        $role = $this->role->findOrFail($request->role_id);

        $user = $this->user->create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user->roles()->attach($request->role_id);

        if ($request->role_id !== Role::ADMIN_ROLE && !empty($request->permission_id)) {
            $permissions = is_array($request->permission_id) 
                ? $request->permission_id 
                : [$request->permission_id];

            $role->permissions()->attach($permissions);
        }   

        return $user->load('roles.permissions');
    }
}