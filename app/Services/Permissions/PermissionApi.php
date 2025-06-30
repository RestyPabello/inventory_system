<?php

namespace App\Services\Permissions;

use App\Models\Permission;

class PermissionApi 
{
    protected $permission; 

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function getAllPermissions($request) 
    {
        $perPage = $request->get('per_page', 10);

        return $this->permission->paginate($perPage);
    }

    public function createPermission($request)
    {
        return $this->permission->create([
            'name'        => $request->name,
            'description' => $request->description
        ]);
    }

    public function updatePermission($request, $id)
    {
        $permission = $this->permission->findOrfail($id);

        return $permission->update([
            'name'        => $request->name,
            'description' => $request->description
        ]);
    }
}