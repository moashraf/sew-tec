<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

public function __construct() {

        $setting = \App\setting::find(1);
        view()->share('setting', $setting);
    }

     public function getIndex(){

         $orders = DB::table('orders')->count('id');
         $clients = DB::table('users')->where('type','client')->count('id');
         $users = DB::table('users')->where('type','admin')->count('id');
         $products = DB::table('products')->count('id');
         
     $data = array('orders' => $orders , 'clients'=>$clients ,'users'=>$users ,'products'=>$products);
        return view('admin.dashboard')->with($data);


    }
     public function getMessage(){
      return view('admin.includes.messages');

    }


     public function getAddproducts(){

        return view('admin.products.addproducts');


    }

     public function getNeworders(){

        return view('admin.orders.neworders');


    }
     public function getPreviousorders(){

        return view('admin.orders.previousorders');


    }
     public function getAdminusers(){

        return view('admin.users.adminusers');


    }
     public function getClientusers(){

        return view('admin.users.clientusers');


    }
  public function getMainsetting(){


         $setting = DB::table('setting')->first();

        return view('admin.setting.mainsetting')->with('setting',$setting);


    }

      public function getOrderstatus(){


       

        return view('admin.setting.orderstaus');


    }
}
