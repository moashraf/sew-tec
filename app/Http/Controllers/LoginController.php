<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\DB;
use Config;


class LoginController extends Controller
{
    //


    public function postLogin(Request $request){


        if(Auth::attempt(["email"=>$request->email ,"password"=>$request->password ,"type"=>"admin"] )  )
                {
               
                return Redirect::intended('admin');

                }
                else{
                 return Redirect::to('/')->with('loginerror',"خطأ فى بريد المستخدم او كلمه المرور  "); 
                }
    }
    public function getLogout(Request $request){

         $request->session()->flush();

         Auth::logout();

        return Redirect::to('/');
    }
}
