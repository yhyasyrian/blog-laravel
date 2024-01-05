<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Seo;
use Illuminate\Http\Request;
use App\Models\Post as PostModel;

class Post extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = PostModel::orderBy('id','desc')->paginate(12); // it is bad, you should use inner join but i study model for that i use it
        return view('blog.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = PostModel::paginate(25);
        return view('dashboard.create-post',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $request->createPost();
        return back()->with('success',__('site.post.done'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $seo = Seo::where('slug','=',$slug)->firstOrFail();
        $post = PostModel::where('id','=',$seo->post_id)->first();
        $postsRandom = PostModel::inRandomOrder()->limit(3)->get();
        $comments = Comment::where('post_id','=',$post->id)
            ->paginate(15);
        return view('blog.post',compact('post','seo','postsRandom','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostModel $post)
    {
        $post->delete();
        return back()->with('success',__('site.post.done_remove'));
    }

    /**
     * add comment
     */
    public function comment(PostModel $post,CommentRequest $request)
    {
        $request->createComment($post);
        return back()->with('success',__('site.comment.done'));
    }
}
