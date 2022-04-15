<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;

class PagesController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }
}
