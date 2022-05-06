<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SearchOrderController extends Controller
{
    public function index()
    {
        return view('dashboard.orders.search');
    }

    function autoComplete(Request $request)
    {
        if ($request->search_value) {
            $search_value = $request->search_value;

            $orders = Order::where('name', 'LIKE', "%{$search_value}%")
                ->orWhere('track_number', 'LIKE', "%{$search_value}%")
                ->orWhere('phone_number', 'LIKE', "%{$search_value}%")
                ->limit(10)->get();

            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';

            if (count($orders) > 0) {
                foreach ($orders as $order) {
                    $output .= '
                <li><a class="dropdown-item" href=" ' . route('orders.show', $order->id) . ' ">' . $order->track_number . ' | ' . $order->name . ' | ' . $order->phone_number . '</a></li>
                ';
                }
            } else {
                $output .= '<li><a> No results </a></li>';
            }

            $output .= '</ul>';

            return $output;
        }
    }
}
