<?php

namespace App\Services\Units;

use App\Models\Unit;

class UnitApi
{
    protected $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

    public function getAllUnits($request) 
    {
        $perPage = $request->get('per_page', 10);

        return $this->unit->paginate($perPage);
    }
}