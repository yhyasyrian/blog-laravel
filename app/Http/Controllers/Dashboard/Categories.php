<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class Categories extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.create-category',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriesRequest $request)
    {
        $request->createCategory();
        return back()->with('success',__('site.category.done'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success',__('site.category.done_remove'));
    }
}
