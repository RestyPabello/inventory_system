<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['name', 'description', 'abbreviation', 'type'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
