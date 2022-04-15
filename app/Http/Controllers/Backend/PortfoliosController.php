<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\BusinessPeople;
use App\Models\Category; 
use Illuminate\Support\Str;

class PortfoliosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios= Profile::all();
        return view('backend.pages.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $business_person= BusinessPeople::all();
        $portfolios= Profile::all();
        // $portfolios=Profile::where('is_approved',1)->get();
        return view('backend.pages.portfolios.create', compact('categories', 'business_person', 'portfolios'));
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
            'business_name' => 'required|max:100',
            'category_id' => 'required',
            // 'business_id' => 'required',
            'slug' => 'nullable',
            'description' => 'nullable|min:5',
            'image'=>'nullablee',
        ]);

        $portfolio = new Profile();
        $portfolio->name=$request->name;
        $portfolio->age=$request->age;
        $portfolio->business_name=$request->business_name;
        $portfolio->start_year=$request->start_year;
        $portfolio->email=$request->email;
        $portfolio->aspirations=$request->aspirations;
        $portfolio->social_media=$request->social_media;
        $portfolio->linkedin=$request->linkedin;

        
        if(empty($request->slug)){
            $portfolio->slug= Str::slug($request->name);
        }
        else{
            $portfolio->slug= ($request->slug);
        }
        $portfolio->category_id=$request->category_id;
        $portfolio->business_id=$request->business_id;
        $portfolio ->description=$request->description;
        $portfolio-> is_approved=1;
        $portfolio-> user_id=1;
        $portfolio->save();

        //Image Upload
        if($request->image){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $nam = time().'-'.$portfolio->id.'.'.$ext;
            $path ='images/portfolios';
            $file -> move($path, $nam);
            $portfolio->image=$nam;
            $portfolio->save();
            // dd($file);
        }

        session()->flash('success','Portfolio has been updated.');
        return redirect()->route('admin.portfolios.index');

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
        $portfolio=Profile::find($id);
        $categories= Category::all();
        $business_person= BusinessPeople::all();
        $portfolios= Profile::all();
        // $portfolios=Profile::where('is_approved',1)->get();
        return view('backend.pages.portfolios.edit', compact('categories', 'business_person', 'portfolios','portfolio'));
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
        // $portfolio = Profile::find($id);

        // $request->validate([
        //     'name' => 'required|max:100',
        //     'slug' => 'nullable|unique:portfolios,slug,'.$portfolio->id,
        //     'description' => 'nullable|min:5',
        // ]);

        
        // $portfolio->name=$request->name;

        // if(empty($request->slug)){
        //     $portfolio->slug= Str::slug($request->name);
        // }
        // else{
        //     $portfolio->slug= ($request->slug);
        // }
        // $portfolio->parent_id=$request->parent_id;
        // $portfolio ->description=$request->description;
        // $portfolio->save();

        // session()->flash('success','Portfolio has been updated.');
        // return back();

        $portfolio = Profile::find($id);
        $request->validate([
            'business_name' => 'required|max:100',
            'category_id' => 'required',
            // 'business_id' => 'required',
            'slug' => 'nullable,slug,'.$portfolio->id,
            'description' => 'nullable|min:5',
            'image'=>'nullable|image',
        ]);

        
        $portfolio->name=$request->name;
        $portfolio->age=$request->age;
        $portfolio->business_name=$request->business_name;
        $portfolio->start_year=$request->start_year;
        $portfolio->email=$request->email;
        $portfolio->aspirations=$request->aspirations;
        $portfolio->social_media=$request->social_media;
        $portfolio->linkedin=$request->linkedin;

        
        if(empty($request->slug)){
            $portfolio->slug= Str::slug($request->name);
        }
        else{
            $portfolio->slug= ($request->slug);
        }
        $portfolio->category_id=$request->category_id;
        $portfolio->business_id=$request->business_id;
        $portfolio ->description=$request->description;
        // $portfolio-> is_approved=1;
        // $portfolio-> user_id=1;     no need to update
        $portfolio->save();

        //Image Upload
        if($request->image){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $nam = time().'-'.$portfolio->id.'.'.$ext;
            $path ='images/portfolios';
            $file -> move($path, $nam);
            $portfolio->image=$nam;
            $portfolio->save();
            // dd($file);
        }

        session()->flash('success','Portfolio has been updated.');
        return redirect()->route('admin.portfolios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete all child portfolios if parent is deleted

        $child_portfolios= Profile::where('parent_id',$id)->get();
        
        foreach($child_portfolios as $child){
            $child->delete();
        }
        $portfolio = Profile::find($id);
        $portfolio ->delete();

        session()->flash('success','Portfolio has been deleted.');
        return back();
    }
}
