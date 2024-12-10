<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store(Request $request ,Feature $feature)
    {
        $validateComment=$request->validate([
            'comment'=>'string|required'
        ]);
        $featureId=$feature->id;

        $validateComment['user_id']=Auth::id();
        $validateComment['feature_id']=$featureId;
        Comment::create($validateComment);
        return to_route('feature.show',$featureId)->with('success','successfully commented');
    }

       public function destroy(Feature $feature)
    {
        $featureId=$feature->id;
        $feature->comment()->where('user_id',Auth::id())->delete();
       return to_route('feature.show',$featureId);
    }
}
