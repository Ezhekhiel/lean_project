<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiMovieController extends Controller
{
    public function index()
    {
        return view('movie-api.content.index');
    }
}
