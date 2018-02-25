<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mail;
use App\User;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UsersController extends Controller {

    public function postCreate(Request $request) {
        
        $validate = validator($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'address' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json(['code' => 500, 'mesasage' => $validate->getMessageBag()->all()]);
        } else {
            $user = new \App\User();

            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->api_token = str_random(60);
            $user->active = "deactive";
            $user->type = "client";

            if ($user->save()) {

        $data = array('user_info' => $user , 'password'=>$request->password  );

 $setting = DB::table('setting')->where('id', 1)->select('email' ,'name')->first();

        Mail::send('emails.confirmation', $data, function ($message) use ($user ,$setting) {

          $message->from($setting->email, $setting->name);

        $message->to($user->email)->subject('Confirmation Email' );

        });
                return response()->json(['code' => 200]);
            }
        }

        return response()->json(['Uknown error'], 500);
    }

    public function postLogin(Request $request) {
       
           if (auth()->validate(['email' => $request->email, 'password' => $request->password ])) {

            $user = \App\User::where(['email' => $request->email])->first();

             if ($user->active == "deactive") {
                return response()->json([
                'code' => 500,
                'mesasage'=>'Your account is not activated'
            ]);

            }

            $userData = (object) [
                        'userId' => $user->id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'address' => $user->address,
                        'phone' => $user->phone,
                        'api_token' => $user->api_token
            ];

            $usersOrders = array();
            
            foreach ($user->orders as $order) {
                
                $order_items = array();
                
                foreach ($order->orderItems as $item) {
                    
                    $json_item = (object) [
                        'id' => (int) $item->id,
                        'quantity' => (int) $item->quantity,
                        'product' => (object) [
                            'id' => (int) $item->product_id,
                            'productName' => $item->product_name,
                            'price' => floatval($item->product_price)
                        ]
                    ];
                    
                    $order_items[] = $json_item;
                }
                
                $order_status = array();
                
                foreach ($order->orderStatus as $status) {
                    
                    $json_status = (object) [
                        'id' => $status->status_data->id,
                        'name' => $status->status_data->name,
                        'date' => strtotime($status->date)
                    ];
                    
                    $order_status[] = $json_status;
                }
                
                $json_order = (object) [
                    'id' => $order->id,
                    'orderNumber' => (int) $order->order_number,
                    'totalCost' => floatval($order->total_cost),
                    'date' => strtotime($order->date),
                    'orderItem' => $order_items,
                    'orderStatus' => $order_status
                ];
                
                $usersOrders[] = $json_order;
            }
             $products = DB::table('products')->get();

             $companyData =  DB::table('setting')->first();

               if($products){
                    $products = json_decode(json_encode($products), True);
                      foreach($products as $key => $value)
                    {

                  
                $products[$key]['productName']= $products[$key]['name'];
                $products[$key]['unitWeight']= $products[$key]['unit_weight'];
                $products[$key]['unitsNumber']= $products[$key]['number_of_units'];
                $products[$key]['ordermax']= $products[$key]['order_max'];
                $products[$key]['ordermin']= $products[$key]['order_min'];
                $products[$key]['photoUrl'] = url('/')."/src/images/products/".$products[$key]['image'];
           unset($products[$key]['unit_weight'] , $products[$key]['number_of_units'] 
                ,$products[$key]['order_max'] , $products[$key]['order_max']
                , $products[$key]['order_min'] , $products[$key]['image']
                , $products[$key]['name']);


                    }
                     
             }

            return response()->json([
                        'code' => 200,
                        'data' => (object) [
                            'userData' => $userData,
                            'userOrders' => $usersOrders,
                            'products' => $products,
                            'companyData'=> $companyData
                        ]
            ]);
       
       
        } else {
            return response()->json([
                'code' => 500 ,
                'mesasage'=>'Incorrect username or password'
            ]);
        }
    }

    public function getConfirmaccount($id , $api){



        $user =  user::find($id);

        if ($user->api_token == $api ){

         $user->active = "active";
         $user->save();
         $tittle  =  "Your account is activated";
        return view('emails.welcome')->with('tittle',$tittle);
        

        } else {

        $tittle  =  "Activation link is incorrect";
        return view('emails.welcome')->with('tittle',$tittle);

        }

        


    }
     public function getResetpassword($id , $api){



        $user =  user::find($id);

        if ($user->api_token == $api ){

       

        return view('emails.newpassword')->with('user',$user);
        

        } else {

        $tittle  =  "Reset link is incorrect";
        return view('emails.welcome')->with('tittle',$tittle);

        }

        


    }



    public function postReloaddata(Request $request) {
       
         

            $user = \App\User::where(['id' => $request->user_id])->first();

            

            $userData = (object) [
                        'userId' => $user->id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'address' => $user->address,
                        'phone' => $user->phone,
                        'api_token' => $user->api_token
            ];

            $usersOrders = array();
            
            foreach ($user->orders as $order) {
                
                $order_items = array();
                
                foreach ($order->orderItems as $item) {
                    
                    $json_item = (object) [
                        'id' => (int) $item->id,
                        'quantity' => (int) $item->quantity,
                        'product' => (object) [
                            'id' => (int) $item->product_id,
                            'productName' => $item->product_name,
                            'price' => floatval($item->product_price)
                        ]
                    ];
                    
                    $order_items[] = $json_item;
                }
                
                $order_status = array();
                
                foreach ($order->orderStatus as $status) {
                    
                    $json_status = (object) [
                        'id' => $status->status_data->id,
                        'name' => $status->status_data->name,
                        'date' => strtotime($status->date)
                    ];
                    
                    $order_status[] = $json_status;
                }
                
                $json_order = (object) [
                    'id' => $order->id,
                    'orderNumber' => (int) $order->order_number,
                    'totalCost' => floatval($order->total_cost),
                    'date' => strtotime($order->date),
                    'orderItem' => $order_items,
                    'orderStatus' => $order_status
                ];
                
                $usersOrders[] = $json_order;
            }
             $products = DB::table('products')->get();

             $companyData =  DB::table('setting')->first();

               if($products){
                    $products = json_decode(json_encode($products), True);
                      foreach($products as $key => $value)
                     {

                  
                $products[$key]['productName']= $products[$key]['name'];
                $products[$key]['unitWeight']= $products[$key]['unit_weight'];
                $products[$key]['unitsNumber']= $products[$key]['number_of_units'];
                $products[$key]['ordermax']= $products[$key]['order_max'];
                $products[$key]['ordermin']= $products[$key]['order_min'];
                $products[$key]['photoUrl'] = url('/')."/src/images/products/".$products[$key]['image'];
           unset($products[$key]['unit_weight'] , $products[$key]['number_of_units'] 
                ,$products[$key]['order_max'] , $products[$key]['order_max']
                , $products[$key]['order_min'] , $products[$key]['image']
                , $products[$key]['name']);


                    }
                     
             }

            return response()->json([
                        'code' => 200,
                        'data' => (object) [
                            'userData' => $userData,
                            'userOrders' => $usersOrders,
                            'products' => $products,
                            'companyData'=> $companyData
                        ]
            ]);
       
       
        
    }


       public function postUsersetting(Request $request) {

        if (auth()->validate(['email' => $request->current_email, 'password' => $request->current_password ])) {

       $validate = validator($request->all(), [
          
          'user_id' => 'required',
          'username' => 'required',
            'confpassword' => 'same:password',
          
            'phone' => 'required',
            'address' => 'required'
        ]);
        //////////// send validation //////////////////////////////////////////////

        if ($validate->fails()) {
            return response()->json(['code' => 500, 'mesasage' => $validate->getMessageBag()->all()]);
        }
        $id = $request->user_id;
        $user =  User::find($id);
        $user->username = $request->username;
        if($request->password){
        $user->password = bcrypt($request->password);
        }
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return response()->json([
                        'code' => 200,
            ]);

       }
       else {
            return response()->json([
                'code' => 500 ,
                'mesasage'=>'Incorrect username or password'
            ]);
        }
   }

       public function postResetpassword(Request $request) {

         $validate = validator($request->all(), [
          
            'email' => 'required|email',
        ]);
        //////////// send validation //////////////////////////////////////////////

        if ($validate->fails()) {
            return response()->json(['code' => 500, 'mesasage' => $validate->getMessageBag()->all()]);
        }
        if (User::where('email', '=', $request->email )->count() > 0) {
   // user found


        $user =  DB::table('users')->where('email', $request->email )->first();

       $data = array('user_info' => $user   );
       $setting = DB::table('setting')->where('id', 1)->select('email' ,'name')->first();

        Mail::send('emails.resetpassword', $data, function ($message) use ($user ,$setting) {
       $message->from($setting->email, $setting->name);
        $message->to($user->email)->subject('Reset Password' );
        });

      return response()->json([
                        'code' => 200,
                        
            ]);
          }
          else {

             return response()->json([
                'code' => 500 ,
                'mesasage'=>'Invalid email address'
            ]);

          }
       }



        public function postNewpassword(Request $request) {



         $this->validate($request, [
        'user_id' => 'required',
          'password' => 'required',
          'confpassword' => 'required|same:password',
    ]);

            $id = $request->user_id;
        $user =  User::find($id);
        if($request->password){
        $user->password = bcrypt($request->password);
        }
     

      if ( $user->save()){

        $tittle  =  "Successfully Changed ";
        return view('emails.welcome')->with('tittle',$tittle);

      }


        }



         


}