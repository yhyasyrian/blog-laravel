<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class Index extends Controller
{
    public function index()
    {
        $visitors = Analytics::getVisitors();
        [$visitorsLabel,$visitorsCount] = [Json::encode($visitors['label']),Json::encode($visitors['count'])];
        $categories = Analytics::getAsArrayCategories();
        [$categoriesLabel,$categoriesCount] = [Json::encode($categories['label']),Json::encode($categories['count'])];
        return view('dashboard.index',compact(
            'visitorsLabel','visitorsCount',
            'categoriesLabel','categoriesCount'
        ));
    }
}
