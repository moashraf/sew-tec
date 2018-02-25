<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\products;

use Yajra\Datatables\Facades\Datatables;

use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    //

     //
     public function postAddproducts(Request $request) {

        //////////// valdiation rouls ///////////////////////////////////////////
        $rules = [
            'name' => 'required|unique:products,name',
            'title' => 'required',
            'description' => 'required',
            'unit_weight' => 'required',
            'number_of_units' => 'required',
            'price' => 'required',
            'order_max' => 'required',
            'order_min' => 'required',
            'image' => 'required|image',
        ];
        //////////// valdiation messages ////////////////////////////////////////
        $messages = [
            'name.required' => 'يرجى ادخال اسم المنتج',
            'name.unique' => 'اسم المنتج مضاف سابقاا',
            'title.required' => 'يرجى ادخال عنوان المنتج',
            'description.required' => 'يرجى ادخال وصف المنتج',
            'unit_weight.required' => 'يرجى ادخال وزن الوحدة',
            'number_of_units.required' => 'يرجى ادخال عدد الوحدات في المنتج',
            'order_max.required' => 'يرجى ادخال الحد الاقصي للطلب',
            'order_min.required' => 'يرجى ادخال الحد الادني للطلب',
            'price.required' => 'يرجى ادخال سعر المنتج',
            'image.required' => 'يرجى ادخال صورة المنتج',
            'image.image' => 'صيغه ملف صورة المنتج يجب ان يكون من نوع صورة',
        ];
        //////////// send validation //////////////////////////////////////////////


        $this->validate($request, $rules, $messages);

       $image = $request->file('image');
       $fileName1 = time() . $image->getClientOriginalName();
            $des1 = 'src/images/products/';
            $image->move($des1, $fileName1);
        ///////////// save data schools ////////////////////////////////////////// 	

        $st = new products;
        $st->name = $request->name;
        $st->title = $request->title;
        $st->description = $request->description;
        $st->unit_weight = $request->unit_weight;
        $st->number_of_units = $request->number_of_units;
        $st->order_max = $request->order_max;
        $st->order_min = $request->order_min;
        $st->price = $request->price;
        $st->image = $fileName1;
        $st->save();


        ////////////// return to view  ///////////////////////////////////////////

        if ($st->save()) {
            $request->session()->flash('success_message', "تم اضافه المنتج $request->name ");
        } else {
            return response()->json(['error' => 'حدث خطأ فى عملية الاضافه'], 422);
        }

        ///////////////////////////////////////////////////////////////////////////
    }

    //VIEW DATATABLE //////////////////////////////////////////////////////////////////////////

    public function getProductsdatatable() {

        $products = DB::table('products')
                ->select('id','name', 'unit_weight' , 'number_of_units',  'order_max' ,'price');
        return Datatables::queryBuilder($products)
                        ->editColumn('id', '<input type="checkbox" name="ids[]" class="checkboxes" value="{{ $id }}" /> ')
                        ->addColumn('action', '<a type="button" data-toggle="modal" data-target="#edit" href="{{url("products/editproducts/$id")}}" class="btn green edit">تعديل</a>
                	<button type="button" class="btn red" data-toggle="confirmation" action="Delete(\'{{ url("/products/deleteoneproduct/$id") }}\', element);" >حذف</button> ')
                        ->make();
    }

    //EDIT VIEW plans ///////////////////////////////////////////////////////////////////////


    public function getEditproducts($id) {

        $product = products::find($id);

        return view('admin.products.edit.products_edit')->with('product', $product);
    }


    //UPDATE plans ///////////////////////////////////////////////////////////////////////

     public function postUpdateproducts (Request $request ,$id) {

        //////////// valdiation rouls ///////////////////////////////////////////
          //////////// valdiation rouls ///////////////////////////////////////////
        $rules = [
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'unit_weight' => 'required',
            'number_of_units' => 'required',
            'price' => 'required',
            'order_max' => 'required',
            'order_min' => 'required',
            'image' => 'image',
        ];
        //////////// valdiation messages ////////////////////////////////////////
        $messages = [
            'name.required' => 'يرجى ادخال اسم المنتج',
            'name.unique' => 'اسم المنتج مضاف سابقاا',
            'title.required' => 'يرجى ادخال عنوان المنتج',
            'description.required' => 'يرجى ادخال وصف المنتج',
            'unit_weight.required' => 'يرجى ادخال وزن الوحدة',
            'number_of_units.required' => 'يرجى ادخال عدد الوحدات في المنتج',
            'order_max.required' => 'يرجى ادخال الحد الاقصي للطلب',
            'order_min.required' => 'يرجى ادخال الحد الادني للطلب',
            'price.required' => 'يرجى ادخال سعر المنتج',
            'image.required' => 'يرجى ادخال صورة المنتج',
            'image.image' => 'صيغه ملف صورة المنتج يجب ان يكون من نوع صورة',
        ];
        //////////// send validation //////////////////////////////////////////////


        $this->validate($request, $rules, $messages);


        $image = $request->file('image');
        if ($image){

        	$fileName1 = time() . $image->getClientOriginalName();
            $des1 = 'src/images/products/';
            $image->move($des1, $fileName1);

        }
       


      
        ///////////// save data schools ////////////////////////////////////////// 	

        $st =  products::find($id);
        $st->name = $request->name;
        $st->title = $request->title;
        $st->description = $request->description;
        $st->unit_weight = $request->unit_weight;
        $st->number_of_units = $request->number_of_units;
        $st->order_max = $request->order_max;
        $st->order_min = $request->order_min;
        $st->price = $request->price;
        if($image){
        	$st->image = $fileName1;
        }
        $st->save();

     

        ////////////// return to view  ///////////////////////////////////////////

        if ($st->save()) {
            $request->session()->flash('success_message', "تم تعديل المنتج $request->name");
        } else {
            return response()->json(['error' => 'حدث خطأ فى عملية الاضافه'], 422);
        }

        ///////////////////////////////////////////////////////////////////////////
    }

    //DELETE plans ///////////////////////////////////////////////////////////////////////

    public function getDeleteoneproduct($id) {

       $delete = DB::table('orders_items')->where('product_id', $id)->count();
                if ($delete > 0) {
                   return response()->json(['error' => 'برجاء مسح الطلبات المرتبطه بالمنتج اولا'], 422);
                }
                else{

                  $products = products::find($id);
                       
                }
        

        if (!$products->delete()) {
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

     $delete = DB::table('orders_items')->where('product_id', $ids)->count();

          $req = DB::table('products')->where('id', $ids)->value('name');

           if ($delete > 0) {
                   return response()->json(['error' => "برجاء مسح الطلبات المرتبطه بالمنتج $req اولا "], 422);
                }
           }

        products::destroy($request->ids);

        $request->session()->flash('delete_message', 'تم الحذف');
        //return redirect('library/setting/jobs');
    }
}