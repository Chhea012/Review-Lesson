<?php

namespace App\Http\Controllers\Api\V1\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        if(!$category){
            return response()->json(['message'=> 'Not found category'], 404);
        }
        return response()->json([
            'status'=>'Retrivel category successfully ',
            'category'=> $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return response()->json([
            'status'=> 'Create category succussfully',
            'category'=> $category
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json(['message'=>'Not found category'], 404);
        }
        return response()->json([
            'status'=> 'successfully',
            'category'=> $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json(['message ' => 'Not found category'], 404);
        }
        $category->name = $request->name ?? $category-> name;
        $category->description = $request->description ?? $category-> description;
        $category->save();
        return response()->json([
            'status'=> 'update category successfully',
            'category' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if(!$category){
            return response()->json(['message'=>'Not found category'], 404);
        }
        $category->delete();
        return response()->json(['message'=> 'Delete category successfully'], 200);
    }
}
