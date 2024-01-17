<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SEOController;
use App\Http\Requests\AddWriterRequest;
use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WriterController extends Controller
{
    public function index()
    {
        SEOController::start(
            title: __('site.rule.add'),
            index: false
        );
        $writers = Rule::where('name','=','writer')->firstOrFail()->users()->get();
        return view('auth.add-writer',compact('writers'));
    }
    public function destroy(int $userId)
    {
        $user = User::where('id','=',$userId)->firstOrFail();
        $user->update([
           'rule_id' => Rule::where('name','=','user')->firstOrFail()->id
        ]);
        return $this->index()->with('success',__('index.rule.done_remove'));
    }
    public function store(AddWriterRequest $request)
    {
        $request->upRule();
        return $this->index()->with('success',__('index.rule.done_add'));
    }
}
