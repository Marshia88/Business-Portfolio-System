<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;

class PortfoliosController extends Controller
{
    public function show()
    {
        return view('frontend.pages.portfolios.show');
    }
}
