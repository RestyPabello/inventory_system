<?php

namespace App\Http\Resources\Items;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->item_id,
            'name'        => $this->name,
            'description' => $this->description,
            'quantity'    => $this->quantity
        ];
    }
}
