<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Genre;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'comicCount' => Comic::count(),
            'genreCount' => Genre::count(),
        ]);
    }
}