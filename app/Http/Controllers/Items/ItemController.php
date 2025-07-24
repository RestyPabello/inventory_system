<?php

namespace App\Http\Controllers\Items;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Http\Resources\Items\ItemResource;
use App\Models\Item;
use App\Services\Items\ItemApi;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ItemController extends Controller
{
    protected $itemApi;

    public function __construct(ItemApi $itemApi)
    {
        $this->itemApi = $itemApi;
    }

    public function index(Request $request)
    {
        try {
            $result = $this->itemApi->getAllItems($request);

            return response()->json([
                'status_code' => 200,
                'message'     => 'Successful',
                'data'        => $result,
            ]);
        } catch(\Throwable $e) {
            return response()->json([
                'status_code' => 400,
                'message'     => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        try {
            $item = Item::create([
                'name'        => $request->name,
                'description' => $request->description,
                'quantity'    => $request->quantity
            ]);

            return response()->json([
                'status_code' => 200,
                'message'     => 'Successful',
                'data'        => $item
            ]);
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'status_code' => 400,
                    'message'     => $e->getMessage(),
                ],
                400
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $item = Item::findOrFail($id);

            return response()->json([
                'status_code' => 200,
                'message' => 'Item found',
                'data' => $item
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 404,
                'message' => 'Item not found with ID ' . $id,
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, string $id)
    {
        try {
            $item = Item::findOrFail($id);
            $item->update([
                'name'        => $request->name,
                'description' => $request->description,
                'quantity'    => $request->quantity
            ]);

            return response()->json([
                'status_code' => 200,
                'message'     => 'Item has been successfully updated',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 404,
                'message' => 'Item not found with ID ' . $id,
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = Item::findOrFail($id);
            $item->delete();
          
            return response()->json([
                'status_code' => 200,
                'message'     => 'Item has been successfully deleted',
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status_code' => 404,
                'message' => 'Item not found with ID ' . $id,
            ], 404);
        }
    }
}
