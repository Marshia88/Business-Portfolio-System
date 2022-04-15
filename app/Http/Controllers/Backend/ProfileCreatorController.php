<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfileCreator;

class ProfileCreatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creators= ProfileCreator::All();
        return view('backend.pages.ProfileCreator.index', compact('creators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'link' => 'nullable',
            'description' => 'nullable',
        ]);

        $creator = new ProfileCreator();
        $creator->name=$request->name;
        $creator->link= $request->link;
        $creator->address= $request->address;
        $creator->outlet= $request->outlet;
        $creator ->description=$request->description;
        $creator->save();

        session()->flash('success','A new profiler has been created.');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable',
        ]);
        $creator = ProfileCreator::find($id);
        $creator->name=$request->name;
        // $creator->link= str_slug($request->name);
        $creator ->description=$request->description;
        $creator->save();

        session()->flash('success','Profiler has been updated.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $creator = ProfileCreator::find($id);
        $creator->delete();

        session()->flash('success','Profiler has been deleted.');
        return back();
    }
}
