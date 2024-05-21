<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    /**
     * Show the analytics of the code
     * 
     */
    public function show($code)
    {
        $short_url = ShortUrl::where('short_code', $code)->firstOrFail();

        return response()->json([
            'long_url' => $short_url->long_url,
            'short_code' => $short_url->short_code,
            'visits' => $short_url->visits,
        ]);
    }
}
