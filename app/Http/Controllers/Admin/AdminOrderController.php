<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class AdminOrderController extends Controller
{


    public function show_orders ()
    {
        $data = new Order;
        $data = $data->orderBy('created_at', 'DESC');
        $data->get();
        $data = $data->paginate(config('GS.admin.pagination'));

        return view('Admin.orders.showorders',['data' => $data]);
    }

    public function change_status (Request $request)
    {

        $order_id = $request->route()->parameter('id');
        $order = Order::where('id', $order_id)->firstOrFail();
        $new_status = (int) $request->status;
        $old_status = $order->status;
        if($new_status > $old_status)
            if(!($new_status === 3 and $old_status === 2))
            {
                {
                    $order->status = $request->status;
                    $order->save();
                }
            }
        if($new_status === 1 and $old_status === 2)
        {
            $order->status = $request->status;
            $order->save();
        }




        //return Redirect::route('admin_show_orders', ['id'=> $order-id ]);
        return \redirect()->back();
    }
}
