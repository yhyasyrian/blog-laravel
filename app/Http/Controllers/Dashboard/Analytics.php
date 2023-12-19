<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Const\Links;
use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Analytics extends Controller
{
    public static function getVisitors()
    {
        return self::getAsArrayVisitors();
    }
    public static function getAllVisitors()
    {
        return Visitor::where('date','LIKE',date('Y-m').'-%')->get();
    }
    private static function getAsArrayVisitors()
    {
        $visitors = ['label'=>[],'count'=>[]];
        foreach (self::getAllVisitors() as $visitor) {
            $visitors['label'][] = $visitor->date;
            $visitors['count'][] = $visitor->count;
        }
        return $visitors;
    }
    public static function getAsArrayCategories()
    {
        // Sql Code is: SELECT COUNT(category_id) as `count`,categories.title FROM `posts` INNER JOIN `categories` ON `categories`.`id`=`posts`.`category_id` GROUP BY `category_id`
        $categories = DB::table('posts')
            ->join('categories','categories.id','=','posts.category_id')
            ->select(['categories.title',DB::raw('COUNT(category_id) as `count`')])
            ->groupBy('category_id','title')
            ->get()
        ;
        $categoriesArray = ['label'=>[],'count'=>[]];
        foreach ($categories as $category) {
            $categoriesArray['label'][] = $category->title;
            $categoriesArray['count'][] = $category->count;
        }
        return $categoriesArray;
    }
}
