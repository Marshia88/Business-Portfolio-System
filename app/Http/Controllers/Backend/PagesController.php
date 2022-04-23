<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Category;
use App\Models\BusinessPeople;
use App\Models\ProfileCreator;

class PagesController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $total_profiles=count(Profile::all());
        $total_categories=count(Category::all());
        $total_people=count(BusinessPeople::all());
        $total_creators=count(ProfileCreator::all());
        return view('backend.pages.index', compact('total_profiles','total_categories','total_people','total_creators'));
    }
}
