<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request){
    	$products = Product::with('category')->get();
    	$categories = Category::all();
    	return view('shop.index', ['products' => $products, 'categories' => $categories]);
    }

    public function show($slug){
        //do something here...
        $product = Product::where('slug', $slug)->first();
        return view('shop.show', ['product' => $product]);
    }

    public function category_wise_products($slug){
        //do something here...
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('shop.category', ['category' => $category, 'products' => $products]);
    }

    
}
