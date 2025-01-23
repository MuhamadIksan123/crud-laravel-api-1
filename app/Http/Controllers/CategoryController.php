<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // return response()->json(['data' => $categories]);
        return CategoryResource::collection($categories);
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return new CategoryResource($category);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $category = Category::create($request->all());
        $category->refresh();

        return response()->json(['data' => $category], 201);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:100',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return new CategoryResource($category);
    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return new CategoryResource($category);
    }
}
