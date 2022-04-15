<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessPeople;
use Illuminate\Support\Str;

class BusinessPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons= BusinessPeople::all();
        return view('backend.pages.BusinessPerson.index', compact('persons'));
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
            'description' => 'nullable|min:5',
        ]);

        $person = new BusinessPeople();
        $person->name=$request->name;
        $person->link= ($request->link);
        $person ->description=$request->description;
        $person->save();

        session()->flash('success','A new business person has been created.');
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
        $person = BusinessPeople::find($id);
        $person->name=$request->name;
        $person->link= ($request->link);
        $person ->description=$request->description;
        $person->save();

        session()->flash('success','Business person has been updated.');
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
        $person = BusinessPeople::find($id);
        $person->delete();

        session()->flash('success','Business person has been deleted.');
        return back();
    }
}
