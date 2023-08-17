<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("admin.products.index", compact("products"));
    }

    public function create()
    {
        return view("admin.products.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "designation"=>"required",
            "stock"=>"required",
            "image"=>"required|mimes:png,jpg,webp,jpeg",
            "unite"=>"required",
            "price"=>'required|gt:0'
        ]);
        $image = $request->file("image");
        $name = uniqid().".".$image->getClientOriginalExtension();
        $image->storeAs("public/products",$name);
        Product::create([
            "designation"=>$request->designation,
            "description"=>$request->description,
            "image"=>$name,
            "stock"=>$request->stock,
            "unite"=>$request->unite,
            "price"=>$request->price
        ]);
        return back()->with("success_msg","le produit est ajoute avec success");
    }
}
