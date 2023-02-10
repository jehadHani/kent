<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(6);
        return view('dashboard.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:20|unique:categories,name'
        ]);
        Category::create($request->all());
        return redirect()->route('categories.create')->with('category-created','تم إنشاء القسم بنجاح');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $id = $category->id;
        $request->validate([
            'name' => 'required|string|min:3|max:20|unique:categories,name,'.$id
        ]);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('category-updated','test');
    }

    public function destroy(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route('categories.index')->with('category-deleted','');
    }
}
