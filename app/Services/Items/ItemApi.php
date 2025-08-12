<?php

namespace App\Services\Items;

use App\Models\Item;
use App\Models\ItemVariant;
use App\Models\ItemVariantStock;
use Illuminate\Support\Facades\DB;

class ItemApi
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item             = $item;
        $this->itemVariant      = $itemVariant;
        $this->itemVariantStock = $itemVariantStock;
    }

    public function getAllItems($request)
    {

        $perPage = $request->get('per_page', 10); 

        return DB::table('items as i')
            ->leftJoin('units as u', 'i.unit_id', 'u.id')
            ->leftJoin('categories as c', 'i.category_id', 'c.id')
            ->leftJoin('item_variants as iv', 'i.id', 'iv.item_id')
            ->leftJoin('item_variant_stocks as ivs', 'iv.id', 'ivs.item_variant_id')
            ->select(
                'i.id as item_id',
                'i.name as item_name',
                'u.name as unit_name',
                'c.name as category_name',
                'iv.image',
                'iv.description',
                'iv.price',
                'ivs.quantity',
                'ivs.status',
                'ivs.expires_at',
                'ivs.purchased_at'
            )
            ->paginate($perPage);
    }

    public function createItem($request)
    {
        $item = $this->item->create([
            'name'        => $request->name,
            'unit_id'     => $request->unit_id,
            'category_id' => $request->category_id
        ]);

        $itemVariant = $item->itemVariant->create([
            // 'item_id'     => $item->id,
            'image'       => $request->image,
            'description' => $request->description,
            'price'       => $request->price
        ]);

        $itemVariantStocks = $itemVariant->itemVariantStocks()->create([
            // 'item_variant_id' => $itemVariant->id,
            'quantity'    => $request->quantity,
            'status'      => $request->status,
            'expires_at'  => $request->expires_at,
            'purchased_at' => $request->purchased_at ?? null
        ]);

        return $item->load('itemVariants.itemVariantStocks');
    }
}