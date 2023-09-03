<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data['name'] = $request->name;
        $cat = Category::create($data);
        return response()->json($cat);
    }
    
     public function update(Request $request , $id)
    {
        $pro = Category::find($id);
       
        $pro->update([
       
            'name'  => $request->name ?? $pro->name,
            ]);
    
        return response()->json($pro);
    }
    
    public function delete($id)
    {
        $pro = Category::find($id);
        $pro->delete();
        return response()->json('deleted');
    }
}
