<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\UserAnalytics;
use App\Models\SessionData;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function trackEvent(Request $request)
    {
        $validated = $request->validate([
            'session_id' => 'required|string',
            'user_id' => 'nullable|integer',
            'event_type' => 'required|in:view,click,add_to_cart,purchase,page_view,test_event',
            'product_id' => 'nullable|integer',
            'page_url' => 'nullable|string',
        ]);

        // Apply the exists rule conditionally
        if ($request->filled('product_id') && $request->product_id != 0) {
            $request->validate([
                'product_id' => 'exists:products,id',
            ]);
        }

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
        $analyticsData->user_id = $validated['user_id'] ?? null;
        $analyticsData->event_type = $validated['event_type'];
        $analyticsData->product_id = array_key_exists('product_id', $validated) && $validated['product_id'] != 0 ? $validated['product_id'] : null;
        $analyticsData->page_url = $validated['page_url'] ?? null;
        $analyticsData->save();

        return response()->json(['message' => 'Event tracked successfully']);
    }

    public function getTodayAnalytics()
    {
        $today = Carbon::today();
        $analytics = UserAnalytics::with('user')
            ->whereDate('created_at', $today)
            ->get()
            ->map(function ($item) {
                return [
                    'session_id' => $item->session_id,
                    'user_name' => $item->user ? $item->user->name : 'N/A',
                    'user_email' => $item->user ? $item->user->email : 'N/A',
                    'event_type' => $item->event_type,
                    'product_id' => $item->product_id,
                    'page_url' => $item->page_url,
                    'created_at' => $item->created_at->format('F j, Y, g:i a'),
                ];
            });

        return response()->json($analytics);
    }
}
