<?php

namespace App\Services\Categories;

use App\Models\Category;

class CategoryApi
{
    protected $category;

    public  function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAllCategories($request)
    {
        $perPage = $request->get('per_page', 10);

        return $this->category->paginate($perPage);
    }
}