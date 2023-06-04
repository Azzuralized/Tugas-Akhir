<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    public function index()
    {
        // Add your logic to retrieve news data and pass it to the view
        return view('news.index');
    }
}
