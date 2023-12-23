<?php

namespace App\Http\Controllers\Const;

use App\Http\Controllers\Controller;
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
                $result[__('Dashboard')] = [
                'link' => route('dashboard'),
                'active' => request()->routeIs('dashboard')
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
}
