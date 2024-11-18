<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\UserAnalytics;
use App\Models\SessionData;

class AnalyticsController extends Controller
{
    public function trackEvent(Request $request)
    {
        $validated = $request->validate([
            'session_id' => 'required|string',
            'user_id' => 'nullable|integer',
            'event_type' => 'required|in:view,click,add_to_cart,purchase,page_view',
            'product_id' => 'nullable|integer|exists:products,id',
            'page_url' => 'nullable|string',
        ]);

        // Check if session exists or create a new session record
        $session = Session::where('session_id', $validated['session_id'])->first();
        if (!$session) {
            $session = Session::create([
                'session_id' => $validated['session_id'],
                'user_id' => $validated['user_id'] ?? null,
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);
        }

        // Create the analytics record for the event
        $analyticsData = new UserAnalytics();
        $analyticsData->session_id = $session->id;
        $analyticsData->user_id = $validated['user_id'];
        $analyticsData->event_type = $validated['event_type'];
        $analyticsData->product_id = $validated['product_id'];
        $analyticsData->page_url = $validated['page_url'] ?? null;
        $analyticsData->save();

        return response()->json(['message' => 'Event tracked successfully']);
    }
}
