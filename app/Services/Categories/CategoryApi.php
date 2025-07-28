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

    public function createCategory($request)
    {
        return $this->category->create([
            'name'        => $request->name,
            'description' => $request->description,
            'parent_id'   => $request->parent_id ?? null
        ]);
    }

    public function updateCategory($request, $id)
    {
        $category = $this->category->findOrFail($id);

        return $category->update([
            'name'        => $request->name,
            'description' => $request->description,
            'parent_id'   => $request->parent_id ?? null
        ]);
    }
}