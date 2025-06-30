<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use App\Http\Resources\Permissions\PermissionResource;
use App\Http\Requests\Permissions\PermissionRequest;
use App\Services\Permissions\PermissionApi;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionApi;

    public function __construct(PermissionApi $permissionApi) 
    {
        $this->permissionApi = $permissionApi;
    }

    public function index(Request $request)
    {
        try {
            $result = $this->permissionApi->getAllPermissions($request);

            return response()->json([
                'status_code' => 200,
                'message'     => 'Successful',
                'data'        => PermissionResource::collection($result),
                'pagination'  => [
                    'current_page'   => $result->currentPage(),
                    'last_page'      => $result->lastPage(),
                    'per_page'       => $result->perPage(),
                    'total'          => $result->total(),
                    'next_page_url'  => $result->nextPageUrl(),
                    'prev_page_url'  => $result->previousPageUrl(),
                    'path'           => $result->path(),
                ]
            ]);
        } catch(\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }

    public function store(PermissionRequest $request)
    {
        try {
            $result = $this->permissionApi->createPermission($request);

            return response()->json([
                'status_code' => 200,
                'message'     => 'Successful',
                'data'        => new PermissionResource($result)
            ]);
        } catch(\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }

    public function update(PermissionRequest $request, $id)
    {
         try {
            $result = $this->permissionApi->updatePermission($request, $id);

            return response()->json([
                'status_code' => 200,
                'message'     => 'Successful',
                'message'     => 'The permission has been successfully updated'
            ]);
        } catch(\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }
}
