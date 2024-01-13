<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Rule::where('name','=','writer')->firstOrFail()->users()->get();
        return view('auth.add-writer',compact('writers'));
    }
}
