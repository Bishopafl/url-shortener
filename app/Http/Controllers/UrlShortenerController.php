<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
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
        
        try {
            // Check if the URL is valid
            if ($urls) {
                
                foreach ($urls as $long_url) {
                    // dd('url', $long_url, str()->random(6)); // this works
                    ShortUrl::create([
                        'long_url' => $long_url,
                        'short_code' => str()->random(6),
                    ]);
                }

                return redirect()->route('welcome')->with('success', 'URLs Shortened Successfully.');

            }
        } catch (\Exception $e) {
            return redirect()->route('welcome')->with('error', 'Error creating URL shortend request: '. $e->getMessage());
        }
    }
}
