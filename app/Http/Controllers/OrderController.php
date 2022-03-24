<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('admin');
    }

    public function index()
    {
        $orders = Order::orderBy('name')->paginate(4);
        return view('dashboard.orders.index')->withOrders($orders);
    }

    public function inProgress()
    {
        $last_activity = count(Activity::all());

        $orders = Order::all()->where('activity.order', '!=', $last_activity);
        return view('dashboard.orders.progress')->withOrders($orders);
    }

    public function checkedOut()
    {
        $last_activity = count(Activity::all());

        $orders = Order::all()->where('activity.order', $last_activity);
        return view('dashboard.orders.checkout')->withOrders($orders);
    }

    public function trash()
    {
        $orders = Order::onlyTrashed()->get();
        return view('dashboard.orders.trashed')->withOrders($orders);
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
            'description' => ['required', 'string']
        ]);

        $activity = Activity::orderBy('order')->first();

        $order = new Order();

        $order->track_number = Str::upper(bin2hex(random_bytes(3)));
        $order->activity_id = $activity->id;
        $order->name = $request->name;
        $order->phone_number = $request->phone_number;
        $order->mobile_type = $request->mobile_type;
        $order->description = $request->description;

        $order->save();

        return redirect(route('orders'))
            ->with(['success' => true, 'type' => 'success', 'msg' => __('Order added with success')]);
    }


    public function show(Order $order)
    {
        // return view('dashboard.orders.show', [
        //     'order' => $order,
        // ]);

        return view('dashboard.orders.show')
            ->withOrder($order)
            ->withActivity(Activity::orderBy('order')->get());
    }


    public function edit(Order $order)
    {
        return view('dashboard.orders.edit', ['order' => $order]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'activity_id' => ['required', 'exists:activities,id'],
        ]);

        $order->activity_id = $request->activity_id;
        $order->save();

        return redirect()->back()
            ->with(['success' => true, 'type' => 'success', 'msg' => __('Status changed with success')]);
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'phone_number' => ['required', 'numeric'],
            'mobile_type' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

        $order->name = $request->name;
        $order->phone_number = $request->phone_number;
        $order->mobile_type = $request->mobile_type;
        $order->description = $request->description;
        $order->save();

        return redirect(route('orders'))
            ->with(['success' => true, 'type' => 'primary', 'msg' => __('Order Updated with success')]);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()
            ->with(['success' => true, 'type' => 'dark', 'msg' => __('Order trashed with success')]);
    }

    public function restore(Order $order)
    {
        $order->restore();
        return redirect()->back()
            ->with(['success' => true, 'type' => 'primary', 'msg' => __('Order restored with success')]);
    }

    public function delete(Order $order)
    {
        $order->forceDelete();
        return redirect()->back()
            ->with(['success' => true, 'type' => 'danger', 'msg' => __('Order deleted with success')]);
    }
}
