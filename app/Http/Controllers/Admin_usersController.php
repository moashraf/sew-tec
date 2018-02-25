<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Yajra\Datatables\Facades\Datatables;

use Illuminate\Support\Facades\DB;


class Admin_usersController extends Controller
{
    //

    public function postAddusers(Request $request) {

        //////////// valdiation rouls ///////////////////////////////////////////
        $rules = [
          'username' => 'required',
            'password' => 'required',
            'confpassword' => 'required|same:password',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'address' => 'required'
        ];
        //////////// valdiation messages ////////////////////////////////////////
        $messages = [
            'username.required' => 'يرجى ادخال اسم المستخدم',
            'password.required' => 'يرجى ادخال كلمه المرور',
            'confpassword.required' => 'يرجى ادخال تأكيد كلمه المرور',
            'confpassword.same' => 'كلمة المرور غير متطابقة فى الحقلين',
            'email.required' => 'يرجى ادخال البريد الالكارونى',
            'email.unique' => 'البريد الالكترونى مستخدم من قبل',
            'phone.required' => 'يرجى ادخال رقم الهاتف',
            'address.required' => 'يرجى ادخال العنوان',
            'image.image' => 'صيغه ملف شعار المستخدم يجب ان يكون من نوع صورة',
        
        ];
        //////////// send validation //////////////////////////////////////////////


        $this->validate($request, $rules, $messages);

       $image = $request->file('image');
        if ($image){

        	$fileName1 = time() . $image->getClientOriginalName();
            $des1 = 'src/images/users/';
            $image->move($des1, $fileName1);

        }
        else{

        	$fileName1 = "avatar.png";

        }
        ///////////// save data schools ////////////////////////////////////////// 	

        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->api_token = str_random(60);
        $user->active = "actiive";
        $user->logo = $fileName1;
        $user->type = "admin";
        $user->save();


        ////////////// return to view  ///////////////////////////////////////////

        if ($user->save()) {
            $request->session()->flash('success_message', "تم اضافه المستخدم $request->username ");
        } else {
            return response()->json(['error' => 'حدث خطأ فى عملية الاضافه'], 422);
        }

        ///////////////////////////////////////////////////////////////////////////
    }

    //VIEW DATATABLE //////////////////////////////////////////////////////////////////////////

    public function getAdminusersdatatable() {

        $users = DB::table('users')->where('type','admin')
                ->select('id','username', 'email' , 'phone');
        return Datatables::queryBuilder($users)
                        ->editColumn('id', '<input type="checkbox" name="ids[]" class="checkboxes" value="{{ $id }}" /> ')
                        ->addColumn('action', '<a type="button" data-toggle="modal" data-target="#edit" href="{{url("adminusers/editusers/$id")}}" class="btn green edit">تعديل</a>
                	<button type="button" class="btn red" data-toggle="confirmation" action="Delete(\'{{ url("/adminusers/deleteoneuser/$id") }}\', element);" >حذف</button> ')
                        ->make();
    }

    //EDIT VIEW plans ///////////////////////////////////////////////////////////////////////


    public function getEditusers($id) {

        $user = User::find($id);

        return view('admin.users.edit.adminusers_edit')->with('user', $user);
    }


    //UPDATE plans ///////////////////////////////////////////////////////////////////////

     public function postUpdateusers (Request $request ,$id) {

        //////////// valdiation rouls ///////////////////////////////////////////
          //////////// valdiation rouls ///////////////////////////////////////////
         $rules = [
          'username' => 'required',
            
            'confpassword' => 'same:password',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ];
        //////////// valdiation messages ////////////////////////////////////////
        $messages = [
            'username.required' => 'يرجى ادخال اسم المستخدم',
            'password.required' => 'يرجى ادخال كلمه المرور',
            'confpassword.required' => 'يرجى ادخال تأكيد كلمه المرور',
            'confpassword.same' => 'كلمة المرور غير متطابقة فى الحقلين',
            'email.required' => 'يرجى ادخال البريد الالكارونى',
            'email.unique' => 'البريد الالكترونى مستخدم من قبل',
            'phone.required' => 'يرجى ادخال رقم الهاتف',
            'address.required' => 'يرجى ادخال العنوان',
            'image.image' => 'صيغه ملف شعار المستخدم يجب ان يكون من نوع صورة',
        
        ];
        //////////// send validation //////////////////////////////////////////////


        $this->validate($request, $rules, $messages);


      $image = $request->file('image');
        if ($image){

        	$fileName1 = time() . $image->getClientOriginalName();
            $des1 = 'src/images/users/';
            $image->move($des1, $fileName1);

        }
      


      
        ///////////// save data schools ////////////////////////////////////////// 	

        $user =  User::find($id);
        $user->username = $request->username;
        if($request->password){

        $user->password = bcrypt($request->password);

        }
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->api_token = str_random(60);
        $user->active = "actiive";
        if($image){
        	$st->image = $fileName1;
        }
        $user->save();

     

        ////////////// return to view  ///////////////////////////////////////////

        if ($user->save()) {
            $request->session()->flash('success_message', "تم تعديل المستخدم $request->username");
        } else {
            return response()->json(['error' => 'حدث خطأ فى عملية الاضافه'], 422);
        }

        ///////////////////////////////////////////////////////////////////////////
    }

    //DELETE plans ///////////////////////////////////////////////////////////////////////

    public function getDeleteoneuser($id) {

        $user = User::find($id);
        

        if (!$user->delete()) {
            return response()->json(['error' => 'حدث خطأ فى عمليه الحذف'], 422);
        }
    }
     public function postDeleteselected (Request $request) {
        
        $messages = array(
            'ids.required' => 'رجاء الاختيار ليتم الحذف',);

        $rules = array(
            'ids' => 'required',);

        $this->validate($request, $rules, $messages);

        User::destroy($request->ids);

        $request->session()->flash('delete_message', 'تم الحذف');
        //return redirect('library/setting/jobs');
    }
}
