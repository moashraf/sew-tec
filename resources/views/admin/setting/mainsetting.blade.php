@extends('admin.home')

@section('content')


<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                  
                    <h4 class="page-title"> الإعدادات الرئيسية </h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#"> إعدادات النظام</a>
                        </li>
                    
                        <li class="active">
                         الإعدادات الرئيسية  
                        </li>
                    </ol>
                </div>
            </div>
            <div id="msg">
            @include('admin.includes.messages')
                
            </div>
              <div id="errors" style="display: none;" class='alert  alert-danger avatar_alert'>

                                        <ul>

                                        </ul>
                </div>
            
             <dir class="row">
                 <dir class="col-md-12">
                     <div class="card-box">
                      <form go="{{ url('/mainsetting/savesetting') }}"  class=" setting_form form-horizontal" method="post">
                         {{ csrf_field() }}

                          <div class="row">

                            <div class="form-group">
                                    <label class="col-md-2 control-label">اسم البرنامج</label>
                                    <div class="col-md-4">
                                        <input type="text" name="name" class="form-control" value="{{$setting->name}}">
                                    </div>
                             
                                    <label class="col-md-2 control-label">رقم الهاتف</label>
                                    <div class="col-md-4">
                                        <input type="text" name="phone" class="form-control" value="{{$setting->phone}}">
                                    </div>
                             </div>
                             <div class="form-group">
                                    <label class="col-md-2 control-label">البريد الالكتروني</label>
                                    <div class="col-md-4">
                                        <input type="text" name="email" class="form-control" value="{{auth()->user()->email}}">
                                    </div>
                             
                                    <label class="col-md-2 control-label">أسم الدخول</label>
                                    <div class="col-md-4">
                                        <input type="text" name="username" class="form-control" value="{{auth()->user()->username}}">
                                    </div>
                             </div>
                             <div class="form-group">
                                    <label class="col-md-2 control-label">كلمه المرور</label>
                                    <div class="col-md-4">
                                        <input type="password" name="password" class="form-control" >
                                    </div>
                                    <label class="col-md-2 control-label">اعادة كلمه المرور</label>
                                    <div class="col-md-4">
                                        <input type="password" name="confpassword" class="form-control" >
                                    </div>
                                    
                             </div>
                             <div class="form-group">
                               <label class="col-md-2 control-label"> استقبال طلبات العملاء </label>
                                    <div class="col-md-4">
                                        <input type="text" name="email_send" class="form-control" value="{{$setting->email}}">
                                    </div>
                               
                                 <label class="col-md-2 control-label"> صفحة الفيسبوك </label>
                                    <div class="col-md-4">
                                        <input type="text" name="facebook" class="form-control" value="{{$setting->facebook}}">
                                    </div>
                                </div>
                                  <div class="form-group">
                               <label class="col-md-2 control-label"> الموقع الالكتروني </label>
                                    <div class="col-md-4">
                                        <input type="text" name="website" class="form-control" value="{{$setting->website}}">
                                    </div>
                               
                                 <label class="col-md-2 control-label"> قناة اليوتيوب </label>
                                    <div class="col-md-4">
                                        <input type="text" name="youtube" class="form-control" value="{{$setting->youtube}}">
                                    </div>
                                </div>
                             <div class="form-group">

                             <label class="col-md-2 control-label">وصف البرنامج</label>
                                    <div class="col-md-4">
                                         <textarea class="form-control autogrow" id="field-7" name="desc" placeholder="" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{$setting->desc}}</textarea>
                                    </div>
                                    <label class="col-md-1 control-label" style="text-align: right;">شعار النظام</label>
                                    <div class="col-md-2">
                                        <input type="file" name="system_logo" class="form-control" >
                                        <img src="{{ url('/') }}/src/images/system/{{$setting->logo}}" alt="image" class="img-responsive thumb-lg">
                                    </div>
                                    <label class="col-md-1 control-label" style="text-align: right;">شعار المستخدم</label>
                                    <div class="col-md-2">
                                        <input type="file" name="user_logo" class="form-control" >
                                          <img src="{{ url('/') }}/src/images/users/{{auth()->user()->logo}}" alt="image" class="img-responsive thumb-lg">
                                    </div>
                                
                             </div>
                             
                             <div class="form-group">

                                     <label class="col-md-2 control-label">من نحن</label>
                                    <div class="col-md-10">
                                         <textarea class="form-control autogrow" id="field-7" name="about_us" placeholder="" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{$setting->about_us}}</textarea>
                                    </div>
                             </div>
 <div class="form-group">
        <div class="col-sm-12">
                    <div class="card-box table-responsive">

                     <fieldset class="gllpLatlonPicker">
                     <div class="form-group">
                     <label class="col-md-2 control-label"> الموقع علي الخريطة</label>
                       <div class="col-md-4">
                        <input type="text" class="gllpSearchField form-control ">
                         
                       </div>
                       <div class="col-md-4">
    <input type="button" class="gllpSearchButton form-control " value="بحث">
                         </div>
                     </div>
   
    <br>
    <br>
    
    <div class="gllpMap">الموقع على الخريطة</div>
    <br>
   
    <br>
   
    <div class="col-md-2">
    <input type="number" class="gllpZoom form-control" name="zoom" value="{{$setting->zoom}}"/>
      
    </div>
    <div class="col-md-3">
    <input type="text" class="gllpLatitude form-control" name="lat" value="{{$setting->lat}}"/>
    </div>
    <div class="col-md-3">
    <input type="text" class="gllpLongitude form-control" name="long" value="{{$setting->long}}"/>
    </div>
  </fieldset>



                    </div>

                       


                    </div>
                    </div>

                             <div class="col-md-4">
                                 <button type="submit" class="btn btn-default waves-effect waves-light">حفظ <img src="{{ url('/') }}/src/images/loading.gif" alt="" class="loading modalload" style="display:none;"></button>
                             </div>

                          </div>
                      </form>
                                    
                     </div>
                 </dir>
             </dir>
            
           
            </div>
        </div>
@endsection

@section('script')

<script type="text/javascript">
    $(".setting_form").on('submit', function (event) {
    
    event.preventDefault();
    var info = $('.avatar_alert');
    var table = $('#datatable-responsive').dataTable();
    var data = new FormData(this);
    var action = $(this).attr('go');
     $('.modalload').show(); 

    $.ajax({
        type: "POST",
        url: action,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend : function () {
            // disable submit button not to send the same request twice
//            $("button[type='submit']").attr('disabled','disabled');
        },
        success: function () {
            // Show success message, close modal?
           // location.reload();
           $('#con-close-modal').modal('hide');
            //$('#msg').load("message");
            location.reload();
            

            //info.hide().find('ul').empty();


        },
        error: function (response) {

           $('.modalload').hide(); 
            
            info.hide().find('ul').empty();
            $.each(response.responseJSON, function (index, error) {

                info.find('ul').append("<li>" + error + "</li>");
            });

            if (response.status == 422) {
                info.slideDown();
            }
            $("button[type='submit']").removeAttr('disabled');

        }
    });

});

</script>




  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAZp2010fMybtC77jryTtWKY113pDJjQtg&sensor=false"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/src/map/css/jquery-gmaps-latlon-picker.css"/>
  <script src="{{ url('/') }}/src/map/js/jquery-gmaps-latlon-picker.js"></script>
         <script>
  $(document).ready(function() {
    // Copy the init code from "jquery-gmaps-latlon-picker.js" and extend it here
    $(".gllpLatlonPicker").each(function() {
      $obj = $(document).gMapsLatLonPicker();

      $obj.params.strings.markerText = "Drag this Marker (example edit)";

      $obj.params.displayError = function(message) {
        console.log("MAPS ERROR: " + message); // instead of alert()
      };

      $obj.init( $(this) );
    });
  });
</script> 


@endsection

