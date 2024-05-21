<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrlShortenerController extends Controller
{
    /**
     * URL Shortener method that receives a request from the front end
     * 
     */
    public function shorten(Request $request)
    {
        // Get the URL from the request
        $urls = $request->input('urls', []);
        // Check if the URL is valid
        dd($urls);
    }
}
