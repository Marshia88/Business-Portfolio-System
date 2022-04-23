<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\BusinessPeople;
use App\Models\Category; 
use Illuminate\Support\Str;
use Auth;

class PortfoliosController extends Controller
{
    public function show()
    {
        $portfolio = Profile::first();
        if (!is_null($portfolio)) {
        return view('frontend.pages.portfolios.show', compact('portfolio'));
        }
        return redirect()->route('index');  
    }
    public function create()
    {
        $categories= Category::all();
        $business_person= BusinessPeople::all();
        $portfolios= Profile::all();
        // $portfolios=Profile::where('is_approved',1)->get();
        return view('frontend.pages.portfolios.create', compact('categories', 'business_person', 'portfolios'));      
    }
    public function store(Request $request)
    {

        // $request->validate([
        //     'business_name' => 'required|max:100',
        //     'category_id' => 'required',
        //     // 'business_id' => 'required',
        //     'slug' => 'nullable',
        //     'description' => 'nullable|min:5',
        //     'image'=>'nullablee',
        // ]);

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
        $portfolio-> user_id=Auth::id();
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

        session()->flash('success','Portfolio has been created.');
        return redirect()->route('index');

    }
}
