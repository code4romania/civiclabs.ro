<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function cookieConsent(Request $request)
    {
        $request->session()->put('cookieConsent', true);
    }

    public function checkboxConsent(Request $request, $identifier)
    {
        $request->session()->put('checkboxConsent' . $identifier, true);
    }
}
