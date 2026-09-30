<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryStoryRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoryRequest $request)
    {
        /*$category =  new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();*/

        $data = $request->validated();

        $category = Category::create($data);

        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        /*
        $category = Category::find($id);

        if(!$category) {
            return response()->json([
                'massage' => 'Categoria nao encontrada'            
            ], 404);
        }
        */
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Category $category, CategoryStoryRequest $request)
    {
        /*$category->name = $request->name ?? $category->name;
        $category->description = $request->description ?? $category->description;*/

        $data = $request->validated();
        $category->fill($data);
        
        $category->save();

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $hasProducts = \App\Models\Product::where('category_id', $category->id)->exists();

        if ($hasProducts) {
            return response()->json([
                'message' => 'Categoria com produtos relacionados',
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => 'Categoria excluida',
        ], 204);
    }
}
