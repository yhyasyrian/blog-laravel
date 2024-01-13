<?php

namespace App\Http\Controllers\Const;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Sitting;
use Illuminate\Http\Request;

class Links extends Controller
{
    protected static $categories;
    public static function navigtionUser()
    {
        $result = [
            __('site.blog') => [
                'link' => route('home'),
                'active' => request()->routeIs('home')
            ],
        ];
        switch (auth()->user()->rule()->value('name')){
            case 'admin':
                $result[__('site.dashboard.title')] = [
                    'link' => route('dashboard'),
                    'active' => request()->routeIs('dashboard')
                ];
                $result[__('site.rule.add')] = [
                    'link' => route('add-writer'),
                    'active' => request()->routeIs('add-writer')
                ];
            case 'writer':
            case 'admin':
                $result = [...$result,
                    __('site.posts.new') => [
                        'link' => route('post.create'),
                        'active' => request()->routeIs('post.create')
                    ],
                    __('site.category.new') => [
                        'link' => route('category.create'),
                        'active' => request()->routeIs('category.create')
                    ],
                ];
                break;
        }
        return $result;
    }
    public static function categories()
    {
        if (empty(self::$categories)) {
            self::$categories = \App\Models\Category::all();
        }
        return self::$categories;
    }
    public static function lastPosts()
    {
        return Post::orderBy('id','desc')->limit(10)->get();
    }
    public static function socialMedia()
    {
        $list = ['facebook','github','instagram','linkedin','twitter'];
        return array_map(fn($key) => ['social'=>$key,'link'=>self::getSitting($key)],$list);
    }
    public static function getSitting(string $key)
    {
        return Sitting::getSitting($key);
    }
}
