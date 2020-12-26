<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index(){
        //do something here...
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.all_products', ['products' => $products]);
    }

	public function create(){
		$categories = Category::all();
    	return view('admin.create_product', ['categories' => $categories]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:4096',
            'slug' => 'required|unique:products',
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $name = $request->name;
        $description = $request->description;
        $category_id = $request->category;
        $slug = $request->slug;
        $price = $request->price;
        $seo_title = $request->seo_title;
        $seo_description = $request->seo_description;
        $imageName = $slug.'-'.time().'.'.$request->image->getClientOriginalExtension();
        $path = $request->image->storeAs('public/images/product', $imageName);
            
        $product = new Product();
        $product->name = $name;
        $product->description = $description;
        $product->category_id = $category_id;
        $product->slug = $slug;
        $product->price = $price;
        $product->seo_title = $seo_title;
        $product->seo_description = $seo_description;
        $product->image = $imageName;
        $product->save();

    	return redirect('admin/product/')->with('msgSaved', 'Product Added Successfully');
    }

    public function edit($id){
        $categories = Category::all();
        $product = Product::where('id', $id)->first();
        return view('admin/edit_product', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpg,png,jpeg|max:4096',
            'slug' => 'required|unique:products,slug,'.$id,
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $product = Product::findOrFail($id);
        $name = $request->name;
        $description = $request->description;
        $category_id = $request->category;
        $slug = $request->slug;
        $price = $request->price;
        $seo_title = $request->seo_title;
        $seo_description = $request->seo_description;
        if($request->hasFile('image')) {
            $imageName = $slug.'-'.time().'.'.$request->image->getClientOriginalExtension();
            $path = $request->image->storeAs('public/images/product', $imageName);
        }else{
            $imageName = $product->image;
        }
            
        $product->name = $name;
        $product->description = $description;
        $product->category_id = $category_id;
        $product->slug = $slug;
        $product->price = $price;
        $product->seo_title = $seo_title;
        $product->seo_description = $seo_description;
        $product->image = $imageName;
        $product->save();

        return redirect('admin/product/')->with('msgSaved', 'Product Updated Successfully');
    }
    public function destroy($id){
        //do something here...
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('admin/product')->with('msgSaved', 'Product Deleted!');;
    }
}
