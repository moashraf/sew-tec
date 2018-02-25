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
العروض                        </li>
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
                      <form go="{{ url('/saveoffers') }}"  class=" setting_form form-horizontal" method="post">
                         {{ csrf_field() }}

                          <div class="row">

                            <div class="form-group">
                                    <label class="col-md-2 control-label"> عنوان العرض</label>
                                    <div class="col-md-4">
                                        <input type="text" name="name" class="form-control"  >
                                    </div>
                              <label class="col-md-2 control-label"> صوره </label>
                                        <div class="col-md-2">
                                        <input type="file" name="user_logo" class="form-control" >
                                     </div>
                                   
                             </div>
                             <div class="form-group">
                                    <label class="col-md-2 control-label"> تفاصيل العرض</label>
                                    <div class="col-md-4">
                                        <input type="text" name="email" class="form-control"  >
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

