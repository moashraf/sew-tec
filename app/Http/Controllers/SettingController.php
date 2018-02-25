<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\user;
use App\setting;

class SettingController extends Controller
{
    //

    public function postSavesetting(Request $request){

    	 //////////// valdiation rouls ///////////////////////////////////////////
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'confpassword' => 'same:password',
            'user_logo' => 'image',
            'system_logo' => 'image',
            'email_send' => 'required',
            
        ];
        //////////// valdiation messages ////////////////////////////////////////
        $messages = [
            'name.required' => 'يرجى ادخال اسم البرنامج',
            'phone.required' => 'يرجى ادخال رقم الهاف',
            'email.required' => 'يرجى ادخال البريد الالكارونى',
            'email_send.required' => 'يرجى ادخال البريد الالكارونى المخصص لاستقبال طلبات العملاء',
            'email.email' => 'صيغه البريد الالكترونى غير صحسحه',
            'username.required' => 'يرجى ادخال اسم الدخول',
            'confpassword.same' => 'كلمة المرور غير متطابقة فى الحقلين',
            'user_logo.image' => 'يجب ان يكون شعار المستخدم من صيغه صوره',
            'system_logo.image' => 'يجب ان يكون شعار النظام من صيغه صوره',
        ];
        //////////// send validation //////////////////////////////////////////////


        $this->validate($request, $rules, $messages);

         /////////////// upload logo  //////////////////////////////////////////////

        $user_logo = $request->file('user_logo');
        if ($user_logo) {
            $fileName1 = time() . $user_logo->getClientOriginalName();
            $des1 = 'src/images/users/';
            $user_logo->move($des1, $fileName1);
        }
        ///////////
        $system_logo = $request->file('system_logo');
        if ($system_logo) {
            $fileName2 = time() . $system_logo->getClientOriginalName();
            $des2 = 'src/images/system/';
            $system_logo->move($des2, $fileName2);
        }
       
         //////////////  save user data  ///////////////////////////////////////////

        $user =  user::find(auth()->user()->id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password ) { $user->password = bcrypt($request->password);}
        if ($request->user_logo ) { $user->logo = $fileName1; }
        $user->save();

    

        //////////////  save سثففهىل data  ///////////////////////////////////////////

        $setting =  setting::find(1);
        $setting->name = $request->name;
        $setting->email = $request->email_send;
        $setting->phone = $request->phone;
        $setting->desc = $request->desc;
        $setting->about_us = $request->about_us;
        $setting->zoom = $request->zoom;
        $setting->lat = $request->lat;
        $setting->long = $request->long;
        $setting->facebook = $request->facebook;
        $setting->youtube = $request->youtube;
        $setting->website = $request->website;
        if ($request->system_logo ) { $setting->logo = $fileName2; }
        
        $setting->save();



         ////////////// return to view  ///////////////////////////////////////////

        if ($setting->save()) {
            $request->session()->flash('success_message', "تم حفظ البينات");
        } else {
            return response()->json(['error' => 'حدث خطأ فى عملية الاضافه'], 422);
        }

    }
}
