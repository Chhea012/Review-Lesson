<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'status' => 'successfully ',
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();
        return response()->json([
            'status' => 'Create product successfully',
            'product' => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Not found product'], 404);
        }
        return response()->json([
            'status' => 'sucessfully',
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Not found product'], 404);
        }
        $product->name = $request->name ??  $product->name;
        $product->price = $request->price ??  $product->price;
        $product->qty = $request->qty ?? $product->qty ;
        $product->description = $request->description ??  $product->description;
        $product->category_id = $request->category_id ??  $product->category_id;
        $product->save();
        return response()->json([
            'status'=> 'Update product successfully ',
            'product'=>$product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Not found product'], 404);
        }
        $product->delete();
        return response()->json(['message' => 'delete product successfully '], 200);
    }
}
