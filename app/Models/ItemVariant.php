<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemVariant extends Model
{
    protected $table = 'item_variants';

    protected $fillable = [
        'item_id',
        'name', 
        'description', 
        'price',
        'quantity',
        'expires_at'
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer'
        ];
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
