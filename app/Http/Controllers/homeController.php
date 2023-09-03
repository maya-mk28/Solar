<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home()
    {
        $data = Category::with('products')->get();
        return response()->json($data);
    }

    public function all_products_for_category($id)
    {
        $data = Product::where('category_id' , $id)->get();
        return response()->json($data);
    }

    public function offers()
    {
        $data = Offer::all();
        return response()->json($data);
    }
}
