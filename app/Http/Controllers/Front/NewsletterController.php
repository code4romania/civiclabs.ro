<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['email'],
        ]);

        Newsletter::subscribePending($attributes['email']);

        return redirect()->route('newsletter.thanks');
    }

    public function thanks()
    {
        return view('site._placeholders.newsletterThanks');
    }
}
