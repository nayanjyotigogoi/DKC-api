<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email|max:255']);

        $existing = NewsletterSubscriber::where('email', $request->email)->first();

        if ($existing) {
            if ($existing->is_active) {
                return response()->json(['message' => 'already_subscribed'], 200);
            }
            $existing->update(['is_active' => true]);
            return response()->json(['message' => 'resubscribed'], 200);
        }

        NewsletterSubscriber::create([
            'email'      => $request->email,
            'ip_address' => $request->ip(),
        ]);

        return response()->json(['message' => 'subscribed'], 201);
    }
}
