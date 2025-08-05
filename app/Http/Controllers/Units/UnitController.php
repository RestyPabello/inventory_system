<?php

namespace App\Http\Controllers\Units;

use App\Http\Controllers\Controller;
use App\Http\Requests\Units\UnitRequest;
use App\Http\Resources\Units\UnitResource;
use App\Services\Units\UnitApi;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    protected $unitApi;

    public function __construct(UnitApi $unitApi)
    {
        $this->unitApi = $unitApi;
    }

    public function index(Request $request)
    {
        try {
            $result = $this->unitApi->getAllUnits($request);

            return response()->json([
                'status_code' => 200,
                'message'     => 'Successful',
                'data'        => UnitResource::collection($result),
                'pagination'  => [
                    'current_page'   => $result->currentPage(),
                    'last_page'      => $result->lastPage(),
                    'per_page'       => $result->perPage(),
                    'total'          => $result->total(),
                    'next_page_url'  => $result->nextPageUrl(),
                    'prev_page_url'  => $result->previousPageUrl(),
                    'path'           => $result->path(),
                ],
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }

    public function store(UnitRequest $request)
    {
        try {
            $result = $this->unitApi->createUnit($request);

            return response()->json([
                'status_code' => 201,
                'message'     => 'Successful',
                'data'        => new UnitResource($result)
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }

    public function update(UnitRequest $request, $id)
    {
        try {
            $result = $this->unitApi->updateUnit($request, $id);

            return response()->json([
                'status_code' => 201,
                'message'     => 'The unit has been successfully updated'
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }
}
