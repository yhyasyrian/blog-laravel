<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SEOController;
use App\Http\Requests\SittingRequest;
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
        $lastTenUser = Analytics::lastTenUser();
        SEOController::start(
            title: __('site.dashboard.title'),
            index: false
        );
        return view('dashboard.index',compact(
            'visitorsLabel','visitorsCount',
            'categoriesLabel','categoriesCount',
            'lastTenUser'
        ));
    }
    public function update(SittingRequest $request)
    {
        $request->save();
        return back();
    }
}
