<?php

namespace App\Http\Controllers\Admin;

use App\Guest;
use App\Order;
use App\Product;
use App\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Session;

class AdminOrderController extends Controller
{

    public function show_editorder (Request $request)
    {
        $big_title = 'Редактировать заказ';
        $submint_action = 'admin_edit_order';
        $input = $request->route()->parameter('id');
        $param = ['alias'=>$input];
        $order = Order::where('id', $input)->firstOrFail();
        $products = Product::all();
        $guests = Guest::all();
        $view = view('Admin.orders.order',[ 'big_title' => $big_title,
                                                    'submint_action' => $submint_action,
                                                    'param' => $param,
                                                    'products' => $products,
                                                    'guests' => $guests,
                                                    'order' => $order]);
        return $view;
    }

    public function editorder (Request $request)
    {

        $input = $request->route()->parameter('id');
        $order = Order::where('id', $input)->firstOrfail();
        $order = $order->fill($request->all());
        $order->guest->fill($request->all());
        $susses = $order->push();

        /*$order->guest()->updateExistingPivot($request->guest_id, $request->all());*/
        if($susses){
            Session::flash('success', "Данные успешно добавлены");
            return Redirect::route('admin_edit_order_show', ['alias' => $order->id]);
        }else{
            Session::flash('message', "Данные не добавлены");
            return Redirect::route('admin_edit_order_show', ['alias' => $order->id]);
        }
    }

    public function show_orders (Request $request)
    {
        $data = new Order;
        $data = $data->orderBy('created_at', 'DESC');
            if($request->status) {
                $data = $data->whereIn('status', $request->status);
            }
        $pgn = Settings::all()->first()->paginatoin_admin_product;
        $data = $data->paginate($pgn)->appends($request->status);
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
