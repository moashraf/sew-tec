<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\orders;
use App\orders_status_dates;

use Yajra\Datatables\Facades\Datatables;

use Illuminate\Support\Facades\DB;


class Orders_usersController extends Controller
{
    //


      public function getNewordersatatable() {

        $orders = DB::table('orders')
        ->leftjoin('users','users.id','=','orders.user_id')
        ->where('date','>' ,date('Y-m-d' , strtotime("-7 day")))
                ->select('orders.id','order_number', 'username' , 'date',  'total_cost' );
        return Datatables::queryBuilder($orders)
                        ->editColumn('id', '<input type="checkbox" name="ids[]" class="checkboxes" value="{{ $id }}" /> ')
                        ->addColumn('action', '<a type="button" data-toggle="modal" data-target="#edit" href="{{url("ordersusers/vieworder/$id")}}" class="btn green edit"> معاينه</a><a type="button" data-toggle="modal" data-target="#edit" href="{{url("ordersusers/editorder/$id")}}" class="btn green edit"> الحاله</a>
                	<button type="button" class="btn red" data-toggle="confirmation" action="Delete(\'{{ url("/ordersusers/deleteoneorder/$id") }}\', element);" >حذف</button> ')
                        ->make();
    }


    public function getPreviousordersdatatable() {

        $date = strtotime("+7 day");


        $orders = DB::table('orders')
        ->leftjoin('users','users.id','=','orders.user_id')
        ->where('date','<' ,date('Y-m-d' , strtotime("-7 day")))
                ->select('orders.id','order_number', 'username' , 'date',  'total_cost' );
        return Datatables::queryBuilder($orders)
                        ->editColumn('id', '<input type="checkbox" name="ids[]" class="checkboxes" value="{{ $id }}" /> ')
                        ->addColumn('action', '<a type="button" data-toggle="modal" data-target="#edit" href="{{url("ordersusers/vieworder/$id")}}" class="btn green edit"> معاينه</a><a type="button" data-toggle="modal" data-target="#edit" href="{{url("ordersusers/editorder/$id")}}" class="btn green edit"> الحاله</a>
                	<button type="button" class="btn red" data-toggle="confirmation" action="Delete(\'{{ url("/ordersusers/deleteoneorder/$id") }}\', element);" >حذف</button> ')
                        ->make();
    }


    public function getEditorder($id) {

        $orders = orders::find($id);

        $statuss  = DB::table('orders_status')->get();

        $data = array('statuss' => $statuss  ,'orders'=>$orders);

        return view('admin.orders.edit.edit_order_status')->with( $data);
    }

     public function getVieworder($id) {

        $orders = orders::find($id);

        $statuss  = DB::table('orders_status')->get();

        $user_info  = DB::table('users')->where('id',$orders->user_id)->first();

        $items  = DB::table('orders_items')->where('order_id',$id)->get();

        $status  = DB::table('orders_status_dates')
        ->leftjoin('orders_status','orders_status.id','=','orders_status_dates.order_status_id')
        ->where('order_id',$id)->select('name','date')->get();

        $data = array('statuss' => $statuss  ,'orders'=>$orders ,'user_info'=>$user_info ,'items'=>$items ,'status'=>$status);

        return view('admin.orders.edit.view_order')->with( $data);
    }


      public function postChangestatus(Request $request ,$id ,$ordernumber) {

        //////////// valdiation rouls ///////////////////////////////////////////
        $rules = [
            'status' => 'required',
            'status_date' => 'required',
            
        ];
        //////////// valdiation messages ////////////////////////////////////////
        $messages = [
            'status.required' => 'يرجى اختيار اسم الحاله',
            'status_date.required' => 'يرجى ادخال التاريخ',
          
        ];
        //////////// send validation //////////////////////////////////////////////


        $this->validate($request, $rules, $messages);

 
        ///////////// save data schools //////////////////////////////////////////  

        $st = new orders_status_dates;
        $st->order_id = $id;
        $st->order_status_id = $request->status;
        $st->date = $request->status_date;
        $st->save();


        ////////////// return to view  ///////////////////////////////////////////

        if ($st->save()) {
            $request->session()->flash('success_message', "تم اضافه الحاله الي الطلب رقم  $ordernumber بتاريخ $request->status_date ");
        } else {
            return response()->json(['error' => 'حدث خطأ فى عملية الاضافه'], 422);
        }

        ///////////////////////////////////////////////////////////////////////////
    }

    public function getDeleteoneorder($id) {

        $user = orders::find($id);
        

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

        orders::destroy($request->ids);

        $request->session()->flash('delete_message', 'تم الحذف');
        //return redirect('library/setting/jobs');
    }
}
