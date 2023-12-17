<?php

namespace App\Http\Controllers\Const;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Links extends Controller
{
    protected static $categories;
    public static function navigtionUser()
    {
        return [
            __('site.blog') => [
                'link' => route('home'),
                'active' => request()->routeIs('home')
            ],
            __('Dashboard') => [
                'link' => route('dashboard'),
                'active' => request()->routeIs('dashboard')
            ],
        ];
    }
    public static function categories()
    {
        if (empty(self::$categories)) {
            self::$categories = \App\Models\Category::all();
        }
        return self::$categories;
    }
}
