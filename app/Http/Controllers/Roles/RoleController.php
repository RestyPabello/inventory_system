<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\RoleRequest;
use App\Http\Resources\Roles\RoleResource;
use App\Services\Roles\RoleApi;
use Illuminate\Http\Request;


class RoleController extends Controller
{

    protected $roleApi;

    public function __construct(RoleApi $roleApi)
    {
        $this->roleApi = $roleApi;
    }

    public function index(Request $request)
    {
        try {
            $result = $this->roleApi->getAllRoles($request);

            return response()->json([
                'status_code' => 200,
                'message'     => 'Successful',
                'data'        => RoleResource::collection($result),
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

    public function store(RoleRequest $request)
    {
        try {
            $result = $this->roleApi->createRole($request);

            return response()->json([
                'status_code' => 201,
                'message'     => 'Successful',
                'data'        => new RoleResource($result)
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }

    public function update(RoleRequest $request, $id)
    {
        try {
            $result = $this->roleApi->updateRole($request, $id);

            return response()->json([
                'status_code' => 200,
                'message'     => 'The album has been successfully updated'
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }
}

