<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function home()
    {
        $listings = Listing::all();
        return view('home', [
            'listings' => $listings,
        ]);
    }
}
