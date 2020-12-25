<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){

        //Category::orderBy('created_at', 'desc')->paginate(5);
    	$categories = Category::withCount('products')
                ->orderBy('products_count','desc')->paginate(5);
    	return view('admin.index', [
    		'categories' => $categories
    	]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

    	$name = $request->name;
    	$slug = $request->slug;

    	$category = new Category();
    	$category->name = $name;
    	$category->slug = $slug;
    	$category->save();

    	return redirect()->back()->with('msgSaved', 'Category Added Successfully');
    }

    public function show($slug){
        //do something here...
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id', $category->id)->get();
        return view('admin.show', ['category' => $category, 'products' => $products]);
    }

    public function edit($id){

        $category = Category::where('id', $id)->first();
        return view('admin.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, $id){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$id,
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $name = $request->name;
        $slug = $request->slug;

        $category = Category::findOrFail($id);
        $category->name = $name;
        $category->slug = $slug;
        $category->save();

        return redirect('admin/category')->with('msgSaved', 'Category Updated Successfully');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('admin/category')->with('msgSaved', 'Category Deleted!');
    }

}
