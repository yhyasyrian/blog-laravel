<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SEOController;
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
        SEOController::start(
            title: __('site.category.new'),
            index: false
        );
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
    public function show(string $slug)
    {
        $category = Category::where('slug','=',$slug)->first();
        $posts = $category->posts()->paginate(15);
        SEOController::start(
            title:$category->title,
            type: 'section',
            post: $category,
            image:asset($category->img),
            description:$category->description
        );
        return view('blog.category',compact('posts','category'));
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
