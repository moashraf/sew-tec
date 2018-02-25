<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;
use App\User;
use Illuminate\Support\Facades\DB;
class OrdersController extends Controller
{
    public function getMail(){

     $data = array('mes' =>'lomaaaaaaaa' , );

        Mail::send('emails.mail', $data, function ($message) {

        $message->from('us@example.com', 'Goldenreach');

        $message->to('islam.azouz44@yahoo.com')->subject('New Order From ');;

        });

            


    }

    public function postCreate (Request $request) {
        
        $validate = validator($request->all(), [
            'orderNumber' => 'required|unique:orders,order_number',
            'userId' => 'required|exists:users,id',
            'totalcost' => 'required',
            'orderItems' => 'required|min:1',
            'orderItems.*.productId' => 'exists:products,id'
        ]);
        
        if ($validate->fails()) {
            return response()->json(['code' => 500, 'mesasage' => $validate->getMessageBag()->all()]);
        } else {
            $order = new \App\Order();
            
            $order->order_number = $request->orderNumber;
            $order->user_id = $request->userId;
            $order->total_cost = floatval($request->totalcost);
            $order->date = date('Y-m-d H:i:s');
            
            $items = array();
            
            foreach($request->orderItems as $item) {
                
                $item = (object) $item;
                
                $product = \App\Product::find($item->productId);
                
                $item_to_add = new \App\orderItem();
                $item_to_add->product_id = $item->productId;
                $item_to_add->product_name = $product->name;
                $item_to_add->product_price = $product->price;
                $item_to_add->quantity = $item->quantity;
                
                $items[] = $item_to_add;
                
            }
            $user_info = user::find($request->userId);
            $product_info = $product;
            $orderNumber = $request->orderNumber;
            $totalcost = $request->totalcost;

            $data = array('user_info' =>$user_info ,
             'orderNumber'=>$orderNumber ,'items'=>$items );

            $setting = DB::table('setting')->where('id', 1)->select('email' ,'name')->first();

        Mail::send('emails.mail', $data, function ($message) use ($user_info ,$totalcost ,$setting) {

        $message->from($user_info->email , $setting->name);

        $message->to($setting->email)->subject('New Order From '.$user_info ->username.'Total Cost : '.$totalcost );;

        });

            
            if($order->save() && $order->orderItems()->saveMany($items)) {
                return response()->json([
                    'code' => 200,
                    'orderId' => $order->id
                ]);
            }
        }
    }
}