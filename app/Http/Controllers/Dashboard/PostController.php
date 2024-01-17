<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Const\Links;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SEOController;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Comment;
use App\Models\Seo;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        SEOController::start(
            title: __('site.index'),
            description: Links::getSitting('description')
        );
        $posts = Post::orderBy('id','desc')->paginate(12); // it is bad, you should use inner join but i study model for that i use it
        return view('blog.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        SEOController::start(
            title: __('site.post.new'),
            index: false
        );
        $posts = Post::paginate(25);
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
        $post = Post::where('id','=',$seo->post_id)->first();
        $postsRandom = Post::inRandomOrder()->limit(3)->get();
        $comments = Comment::where('post_id','=',$post->id)
            ->paginate(15);
        SEOController::start(
            title: $post->title,
            description: $seo->description,
            image: asset($seo->image),
            post: $post,
            type: 'article'
        );
        return view('blog.post',compact('post','seo','postsRandom','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        SEOController::start(
            title: __('site.post.edit'),
            index: false
        );
        $posts = Post::paginate(25);
        $currentPost = $post;
        return view('dashboard.create-post',compact('posts','currentPost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, int $id)
    {
        $request->update($id);
        return back()->with('success',__('site.post.done_update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success',__('site.post.done_remove'));
    }

    /**
     * add comment
     */
    public function comment(Post $post,CommentRequest $request)
    {
        $request->createComment($post);
        return back()->with('success',__('site.comment.done'));
    }
}
