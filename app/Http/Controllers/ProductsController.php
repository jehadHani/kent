<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('dashboard.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:200',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'required|string|min:10',
            'image' => 'required|max:5000',

        ]);

        $product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->category_id = $request->get('category');
        $product->description = $request->get('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $request->image->move(public_path('product-images/'), $imageName);
            $product->image = ($imageName);
        }
        $isSave = $product->save();
        if ($isSave){
            return redirect()->route('products.create')->with('product-created','');
        }
        else{
            return back();
        }
    }

    public function show(Product $product)
    {
//        return view('product',compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('dashboard.products.edit',compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:200',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'required|string|min:10',
            'image' => 'max:5000',
        ]);
        $product->update([
        'name' => $request->get('name'),
        'price' => $request->get('price'),
        'category_id' => $request->get('category'),
        'description' => $request->get('description')
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $request->image->move(public_path('product-images/'), $imageName);
            $product->image = ($imageName);
        }
        $isSave = $product->save();
        if ($isSave){
            return redirect()->route('products.index')->with('product-updated','');
        }
        else{
            return back();
        }
    }

    public function destroy(Request $request)
    {
        Product::destroy($request->id);
        return redirect()->route('products.index')->with('product-deleted','');
    }

    public function product(Product $product)
    {
        return view('product',compact('product'));
    }
}
