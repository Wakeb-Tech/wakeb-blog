<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::whenSearch(request()->search)
            ->paginate(5);

        return view('dashboard.categories.index', compact('categories'));

    }//end of index

    public function create()
    {
        return view('dashboard.categories.create');

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|unique:categories,name_ar',
            'name_en' => 'required|unique:categories,name_en',
        ]);

        Category::create($request->all());
        session()->flash('success', 'Data added successfully');
        return redirect()->route('dashboard.categories.index');

    }//end of store

    public function show()
    {

    }//end of show

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));

    }//end of edit

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_ar' => 'required|unique:categories,name_ar,' . $category->id,
            'name_en' => 'required|unique:categories,name_en,' . $category->id,
        ]);

        $category->update($request->all());
        session()->flash('success', 'Data updated successfully');
        return redirect()->route('dashboard.categories.index');

    }//end of update

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.categories.index');

    }//end of destroy

}//end of controller
