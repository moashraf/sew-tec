<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;



class OffersController extends Controller
{

  public function getDeleteoneuser($id) {

        $user = DB::table('Offers')->where('id', '=', $id )->delete();
   // return redirect('/');
    return back() ;
 
         //dd($user );

       
    }
    
    
    
      
              public function getallOffersveiw() {
              
             //dd("ff");
               $setting = DB::table('setting')->first();

        return view('admin.allOffers')->with('setting',$setting);
 
               
              
}




     
     
     
         public function getallOffers() {

        $users = DB::table('Offers')->select('id', 'title' , 'time' , 'Offers_details' );
   return Datatables::queryBuilder($users)
                        ->editColumn('id', '<input type="checkbox" name="ids[]" class="checkboxes" value="{{ $id }}" /> ')
                      
                    //  ->editColumn('active', '@if($active == "active") مفعل @elseif($active == "deactive") غير مفعل @endif')
                  ->addColumn('action', '<a type="button" data-toggle="modal" data-target="#edit" href=" " class="btn green edit"> </a>
                  
                  <a href="{{ url("/admin/DeletOffers/$id") }}">حذف </a>
 
 
                  ')
                        ->make();
                        
                        
                        }
                        
                        
                        
     
     
     public function getOff(Request $request) {
     
       $setting = DB::table('setting')->first();

        return view('admin.Offers')->with('setting',$setting);
        
        
     }
     
     
     
     

    public function gg(Request $request) {


        $users = DB::table('Offers') ->orderBy('id', 'desc')->get();
        
        
          
   //   $name = DB::table('Offers')->pluck('imag');
if( $users ){
         return response()->json(  ['code'=> 200,  'data' =>  $users  ] );}
         
         else{ 
         
            return response()->json(['code'=> 500,  'msg' =>  "not exist"  ]);
            
             }


                
       }
       
       
           
       
    public function saveoffers(Request $request) {
    
  
         $rules = [
            'name' => 'required',
              'user_logo' => 'required',
            'email' => 'required',
 
           
            
        ];
        //////////// valdiation messages ////////////////////////////////////////
        $messages = [
            'name.required' => 'يرجى ادخال قيمه الحقل ',
             'user_logo.required' => 'يرجى ادخال قيمه الحقل ',
             'email.required' => 'يرجى ادخال قيمه  الحقل ' 
 
         
            
        ];
        
        //////////// send validation //////////////////////////////////////////////

     

       $this->validate($request, $rules, $messages);
 
    
    /******** send notification to topic tokens **********/
    $fields = array
    (
    	// notification body
        'data'  => array('body'=>"$request->email",'title'=>"$request->name" ),
 
        // put topic name instead of $product->id
        'to'            => '/topics/offers'
    );
 
    $headers = array
    (
    	//replace authorization token with yours
        'Authorization: key=AAAAQsKMkIk:APA91bE1AWi3E4nwIesIeW-s--3wQucMqimpA1wDuUA0slznn5au9EYwG-zr-_NfrTGKZ5pxZkfcZJf8aC6ac8P-FlZ1wbLzm2z9qRVfqJ2E5lykBtC-QTseXIjrUknAY4sz9pkb3gcP',
        'Content-type: application/json; charset=utf-8' 
 
 
    );
     
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    curl_close( $ch );
    
        ///////////// save data schools ////////////////////////////////////////// 	
     $user_logo = $request->file('user_logo');
        if ($user_logo) {
            $fileName1 = time() . $user_logo->getClientOriginalName();
            $des1 = 'public/Offers/';
            $user_logo->move($des1, $fileName1);
        }
        ///////////
        $system_logo = $request->file('system_logo');
        if ($system_logo) {
            $fileName2 = time() . $system_logo->getClientOriginalName();
            $des2 = 'public/Offers/';
            $system_logo->move($des2, $fileName2);
        }
        
                if ($request->user_logo ) {  
 
  
      $user=  DB::table('Offers')->insert([
    ['products_id' =>  "", 'Offers_details' =>    ( $request->email ) ,'time' => date('Y/m/d') , 'imag' =>"https://apps.be4em.net/sew-tec/public/Offers/$fileName1", 'title' => "$request->name" ],
 ]);
 
  }



       
        
     


        




         ////////////// return to view  ///////////////////////////////////////////

        if ($user) {
        
            return redirect('admin');

            $request->session()->flash('success_message', "تم اضافه  $request->username");
        } else {
            return response()->json(['error' => 'حدث خطأ فى عملية الاضافه'], 422);
        }
        
        
          


        ///////////////////////////////////////////////////////////////////////////
    }





   
}

 