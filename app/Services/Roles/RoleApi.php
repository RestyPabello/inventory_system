<?php

namespace App\Services\Roles;

use App\Models\Role;

class RoleApi 
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function getAllRoles($request) 
    {
        $perPage = $request->get('per_page', 10); 

        return $this->role->with('permissions')->paginate($perPage);
    }

    public function createRole($request)
    {
        return $this->role->create([
            'name'        => $request->name,
            'description' => $request->description
        ]);
    }

    public function updateRole($request, $id)
    {
        $role = $this->role->findOrfail($id);

        return $role->update([
            'name'        => $request->name,
            'description' => $request->description
        ]);
    }
}