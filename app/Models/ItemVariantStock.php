<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemVariantStock extends Model
{
    protected function casts(): array
    {
        return [
            'quantity' => 'integer'
        ];
    }

    public function itemVariant()
    {
        return $this->belongsTo(ItemVariant::class);
    }
}
