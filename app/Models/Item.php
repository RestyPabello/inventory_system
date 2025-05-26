<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'quantity'];

    protected $casts = [
        'quantity' => integer
    ];
}
