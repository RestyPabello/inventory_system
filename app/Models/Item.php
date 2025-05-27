<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    // Table name should be set explicitly if it's not the default plural form
    protected $table = 'items';

    // Fillable fields for mass assignment
    protected $fillable = ['name', 'description', 'quantity'];

    // Cast the quantity field as an integer
    protected $casts = [
        'quantity' => 'integer',
    ];
}
