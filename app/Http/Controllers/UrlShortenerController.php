<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UrlShortenerController extends Controller
{

    /**
     * Index method
     * 
     */
    public function index()
    {
        $shortUrls = ShortUrl::all();
        return response()->json($shortUrls);
    }


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
                $shortenedUrls = [];
                
                foreach ($urls as $long_url) {
                    // Generate a unique short code
                    $short_code = str()->random(6);
                    // if the short code exists, generate another one
                    while (ShortUrl::where('short_code', $short_code)->exists()) {
                        $short_code = str()->random(6);
                    }
                    // Create URL entry
                    ShortUrl::create([
                        'long_url' => $long_url,
                        'short_code' => str()->random(6),
                    ]);

                    $shortenedUrls[] = [
                        'long_url' => $long_url,
                        'short_code' => $short_code,
                    ];
                }

                session(['shortenedUrls' => $shortenedUrls]);

                return response()->json([
                    'shortenedUrls' => $shortenedUrls,
                ], 200);
            } else {
                // There are no URLs provided...
                return response()->json([
                    'error' => 'No URLs provided',
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating URL shortend request: '. $e->getMessage()] , 500);
        }
    }
}
