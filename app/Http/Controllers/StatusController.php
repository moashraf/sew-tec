<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\orders_status;

use Yajra\Datatables\Facades\Datatables;

use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    //

      //
     public function postAddstatus(Request $request) {

        //////////// valdiation rouls ///////////////////////////////////////////
        $rules = [
            'name' => 'required|unique:orders_status,name',
            
        ];
        //////////// valdiation messages ////////////////////////////////////////
        $messages = [
            'name.required' => 'يرجى ادخال اسم الحاله',
            'name.unique' => 'الحاله مضافه سابقاا',
          
        ];
        //////////// send validation //////////////////////////////////////////////


        $this->validate($request, $rules, $messages);

 
        ///////////// save data schools ////////////////////////////////////////// 	

        $st = new orders_status;
        $st->name = $request->name;
        $st->save();


        ////////////// return to view  ///////////////////////////////////////////

        if ($st->save()) {
            $request->session()->flash('success_message', "تم اضافه الحاله $request->name ");
        } else {
            return response()->json(['error' => 'حدث خطأ فى عملية الاضافه'], 422);
        }

        ///////////////////////////////////////////////////////////////////////////
    }

    //VIEW DATATABLE //////////////////////////////////////////////////////////////////////////

    public function getStatusdatatable() {

        $orders_status = DB::table('orders_status')
                ->select('id','name');
        return Datatables::queryBuilder($orders_status)
                        ->editColumn('id', '<input type="checkbox" name="ids[]" class="checkboxes" value="{{ $id }}" /> ')
                        ->addColumn('action', '<a type="button" data-toggle="modal" data-target="#edit" href="{{url("status/editstatus/$id")}}" class="btn green edit">تعديل</a>
                	<button type="button" class="btn red" data-toggle="confirmation" action="Delete(\'{{ url("/status/deleteonestatus/$id") }}\', element);" >حذف</button> ')
                        ->make();
    }

    //EDIT VIEW plans ///////////////////////////////////////////////////////////////////////


    public function getEditstatus($id) {

        $orders_status = orders_status::find($id);

        return view('admin.setting.edit.status_edit')->with('orders_status', $orders_status);
    }


    //UPDATE plans ///////////////////////////////////////////////////////////////////////

     public function postUpdatestatus(Request $request ,$id) {

        //////////// valdiation rouls ///////////////////////////////////////////
          //////////// valdiation rouls ///////////////////////////////////////////
        $rules = [
            'name' => 'required',
            
        ];
        //////////// valdiation messages ////////////////////////////////////////
        $messages = [
            'name.required' => 'يرجى ادخال اسم الحاله',
           
        ];
        //////////// send validation //////////////////////////////////////////////


        $this->validate($request, $rules, $messages);


        


      
        ///////////// save data schools ////////////////////////////////////////// 	

        $st =  orders_status::find($id);
        $st->name = $request->name;
      
        $st->save();

     

        ////////////// return to view  ///////////////////////////////////////////

        if ($st->save()) {
            $request->session()->flash('success_message', "تم تعديل الحاله $request->name");
        } else {
            return response()->json(['error' => 'حدث خطأ فى عملية الاضافه'], 422);
        }

        ///////////////////////////////////////////////////////////////////////////
    }

    //DELETE plans ///////////////////////////////////////////////////////////////////////

    public function getDeleteonestatus($id) {

        $delete = DB::table('orders_status_dates')->where('order_status_id', $id)->count();
                if ($delete > 0) {
                   return response()->json(['error' => 'برجاء مسح الطلبات المرتبطه  اولا'], 422);
                }
                else{

                     $orders_status = orders_status::find($id);
                }

       
        

        if (!$orders_status->delete()) {
            return response()->json(['error' => 'حدث خطأ فى عمليه الحذف'], 422);
        }
    }
     public function postDeleteselected (Request $request) {
        
        $messages = array(
            'ids.required' => 'رجاء الاختيار ليتم الحذف',);

        $rules = array(
            'ids' => 'required',);

        $this->validate($request, $rules, $messages);


         $arrayids = $request->ids;

          foreach($arrayids as $ids){

     $delete = DB::table('orders_status_dates')->where('order_status_id', $ids)->count();

          $req = DB::table('orders_status')->where('id', $ids)->value('name');

           if ($delete > 0) {
                   return response()->json(['error' => "برجاء مسح الطلبات المرتبطه بالحاله $req اولا "], 422);
                }
           }

        orders_status::destroy($request->ids);

        $request->session()->flash('delete_message', 'تم الحذف');
        //return redirect('library/setting/jobs');
    }
}
