<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Order;
use Illuminate\Http\Request;

class TrackController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'track_number' => ['required', 'exists:orders,track_number']
        ]);

        $activities = Activity::orderBy('order')->get();

        $order = Order::where('track_number', $request->track_number)->firstOrFail();

        return view('tracking', ['order' => $order, 'activities' => $activities]);
    }
}
