<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Upvote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpvoteController extends Controller
{
        public function store(Request $request ,Feature $feature)
    {
        $validateUpvote=$request->validate([
            'upvote'=>'boolean|required'
        ]);
        $validateUpvote['user_id']=Auth::id();
        $validateUpvote['feature_id']=$feature->id;
        Upvote::create($validateUpvote);
        return back();

    }


    public function destroy(Feature $feature)
    {
        $feature->upvote()->where('user_id',Auth::id())->delete();
        return back();
    }
}
