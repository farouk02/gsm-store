<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function __construct()
    {
        // $this->middleware('admin');
    }

    public function index()
    {
        Collection::macro('checked', function () {
            return $this->map(function ($value) {
                return $value->activity->order;
            });
        });

        $last = count(Activity::all());
        $orders = Order::all()->where('activity.order', '!=', $last);
        $checked = Order::all()->where('activity.order', $last);
        $trashed = Order::onlyTrashed()->get();
        return view('dashboard.orders.index', ['orders' => $orders, 'checked' => $checked, 'trashed' => $trashed]);
    }

    public function create()
    {
        return view('dashboard.orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'phone_number' => ['required', 'numeric'],
            'mobile_type' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);
        $activity = Activity::orderBy('order')->first();
        $order = new Order();

        $order->track_number = Str::upper(bin2hex(random_bytes(3)));
        // $order->track_number = bin2hex(random_bytes(3));
        $order->activity_id = $activity->id;
        $order->name = $request->name;
        $order->phone_number = $request->phone_number;
        $order->mobile_type = $request->mobile_type;
        $order->description = $request->description;
        $order->save();

        return redirect(route('orders'))->with(['success' => true]);
    }


    public function show(Order $order)
    {
        return view('dashboard.orders.show', [
            'order' => $order,
        ]);
    }


    public function edit(Order $order)
    {
        //
    }

    public function updateStatus(Request $request, Order $order)
    {
        //
    }
    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }
    public function restore(Order $order)
    {
        $order->restore();
        return redirect()->back();
    }
    public function delete(Order $order)
    {
        $order->forceDelete();
        return redirect()->back();
    }
}
