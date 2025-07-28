<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoryResource;
use App\Http\Requests\Categories\CategoryRequest;
use App\Services\Categories\CategoryApi;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryApi;

    public function __construct(CategoryApi $categoryApi)
    {
        $this->categoryApi = $categoryApi;
    }

    public function index(Request $request)
    {
        try {
            $result = $this->categoryApi->getAllCategories($request);

            return response()->json([
                'status_code' => 200,
                'message'     => 'Successful',
                'data'        => CategoryResource::collection($result),
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
    
    public function store(CategoryRequest $request)
    {
        try {
            $result = $this->categoryApi->createCategory($request);

            return response()->json([
                'status_code' => 201,
                'message'     => 'Successful',
                'data'        => new CategoryResource($result)
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }

    public function update(CategoryRequest $request, $id)
    {
        try {
            $result = $this->categoryApi->updateCategory($request, $id);

            return response()->json([
                'status_code' => 201,
                'message'     => 'The category has been successfully updated'
            ], 201);
        } catch (\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }
}
