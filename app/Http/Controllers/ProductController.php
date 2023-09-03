<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return response()->json($data);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $data['features'] = $request->features;
        $cat = Product::create($data);
    
        return response()->json($cat);
    }
    
    public function update(Request $request , $id)
    {
        $pro = Product::find($id);
       
        $pro->update([
            'category_id'  => $request->category_id ?? $pro->category_id,
            'name'  => $request->name ?? $pro->name,
            ]);
    
        return response()->json($pro);
    }
    
    public function delete($id)
    {
        $pro = Product::find($id);
        $pro->delete();
        return response()->json('deleted');
    }
    
    public function get_product_with_category()
    {
        $data = Category::with('product')->get();
        return response()->json($data);
    }
}
