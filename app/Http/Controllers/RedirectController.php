<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    /**
     * Redirecting the code that was generated to the url originally in csv
     * 
     */
    public function redirect($code)
    {
        $short_url = ShortUrl::where('short_code', $code)->firstOrFail();

        // dd('here', $short_url);
        // increment the visit count
        $short_url->incrementVisitCount();

        return redirect()->to($short_url->long_url);
    }
}
