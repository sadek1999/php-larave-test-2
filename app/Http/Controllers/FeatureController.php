<?php

namespace App\Http\Controllers;

use App\Http\Resources\FeatureResource;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Feature::latest()->paginate();

        return Inertia::render('Feature/index',[
            'features'=>FeatureResource::collection($data)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'string|required',
               'description'=>'string'
        ]);
        $data['user_id']=Auth::id();
        Feature::create($data);
        return to_route('feature.index')->with('success','successfully create feature');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        return Inertia::render('Feature/show',[
            'feature'=>new FeatureResource($feature)
        ]) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return Inertia::render('Feature/edit',[
            'feature'=>new FeatureResource($feature)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        //
        $validateData=$request->validate([
            'name'=>'string|required',
            'description'=>'string'
        ]);
        $featureId=$feature->id;
        $feature->update($validateData);
        return to_route('feature.show',$featureId);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $feature->delete();
        return to_route('feature.index');
    }
}
