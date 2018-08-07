<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Http\Requests\NewOrderRequest;

use App\Mail\OrderMail;
use App\Order;
use App\Product;
use App\Settings;
use Illuminate\Http\Request;
use Mail;

class OrderController extends Controller
{
    public function new_order_show()
    {
        return view('Guitarshop.neworder');
    }


    public function new_order (NewOrderRequest $request)
    {
        $email_send1 = Settings::all()->first()->email_send1;
        if ($request->ajax()) {

           if ($request->action === 'newOrder') {
               $guest = Guest::where('email', $request->email)->first();
               if(!$guest) {
                   //Новый гость
                   $guest = new Guest();
                   $guest->email = $request->email;
                   $guest->save();
               }

               //Новый заказ
               try {
                   $order = new Order;
                   $order->content = $request->comment;
                   $order->guest_id = $guest->id;
                   $order->status = '0';
                   $order->product_id = $request->product;
                   $order->save();

                   $response = [
                       'error' => 0
                   ];
               } catch(\Exception $e){
                   $response = [
                       'error' => 1,
                       'data' => var_dump($e->getMessage())
                   ];
               }

               if (!$response['error']) {
                   if($email_send1){
                       Mail::to($email_send1)->send(new OrderMail($order));
                   }
               }
               return json_encode($response);
           }
        }
    }
}
