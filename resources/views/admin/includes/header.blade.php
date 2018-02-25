<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{ url('/') }}/src/images/favicon_1.ico">
    <title>{{$setting->name}}</title>
<link rel="stylesheet" href="{{ url('/') }}/src/css/morris.css">

            <!--Form Wizard-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/src/css/jquery.steps.css" />
    <!-- DataTables -->
    <link href="{{ url('/') }}/src/css/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    
    

    <link href="{{ url('/') }}/src/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="{{ url('/') }}/src/css/switchery.min.css" rel="stylesheet" />
    
            
        <!--calendar css-->
        <link href="{{ url('/') }}/src/css/fullcalendar.min.css" rel="stylesheet" />

        
    
    

        
        <link href="{{ url('/') }}/src/css/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="{{ url('/') }}/src/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="{{ url('/') }}/src/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="{{ url('/') }}/src/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="{{ url('/') }}/src/css/daterangepicker.css" rel="stylesheet">

    <link href="{{ url('/') }}/src/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/bootstrap-select.min.css" rel="stylesheet" />
    
    
    
        
    <link href="{{ url('/') }}/src/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/core.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/components.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/src/css/responsive.css" rel="stylesheet" type="text/css" />
    
            <!-- Plugin Css-->
        <link rel="stylesheet" href="{{ url('/') }}/src/css/magnific-popup.css" />
        <link rel="stylesheet" href="{{ url('/') }}/src/css/datatables.css" />

    
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    <script src="{{ url('/') }}/src/js/modernizr.min.js"></script>
    <link rel="stylesheet" href="{{ url('/') }}/src/js/cl/jquery.calendars.picker.css">
<style>
.START_DATE{z-index:1151 !important;}
</style>
    
</head>

<body class="fixed-left">
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                  <a href="{{ url('/') }}/admin" class="logo"><i class="icon-magnet icon-c-logo md  md-access-time"></i><span><img src="{{ url('/') }}/src/images/system/{{$setting->logo}}" height="44px"/></span></a>
                     <!-- <a href="{{ url('/') }}" class="logo"><img src="{{ url('/') }}/src/images/logo_f.png" height="44px"/></a> -->
                    <!-- Image Logo here -->
                    <!--<a href="index.html" class="logo">-->
                    <!--<i class="icon-c-logo"> <img src="{{ url('/') }}/src/images/logo_sm.png" height="42"/> </i>-->
                    <!--<span></span>-->
                    <!--</a>-->
                </div>
            </div>
            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="">
                        <div class="pull-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="md md-menu"></i>
                            </button>
                            <span class="clearfix"></span>
                        </div>
                        

                            
                        <ul class="nav navbar-nav ">
                          <li style="color: aliceblue; padding: 19px 30px 10px 0px;"> 
                          أنت الأن تعمل على نظام تشغيل {{$setting->name}} © v1.00</li>

                        </ul>
                        
                        
                        <ul class="nav navbar-nav navbar-right pull-right">

                      
                        
                    <!--     
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">أضف جديد <span
                                            class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a type="button" data-toggle="modal" data-target="#addnew" href="{{ url('/') }}/add_new/generalgoal" class="btn green edit">...</a></li>
                                    <li><a type="button" data-toggle="modal" data-target="#addnew" href="{{ url('/') }}/add_new/detailedgoal" class="btn green edit">...</a></li>
                                </ul>
                            </li> -->
                         
                            <li class="hidden-xs">
                                <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                            </li>
                            <li class="dropdown top-menu-item-xs">
                                <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">

  @if(auth()->user()->logo)
<img src="{{ url('/') }}/src/images/users/{{auth()->user()->logo}}" alt="user-img" class="img-circle"> </a>

@else
<img src="{{ url('/') }}/src/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
@endif                              


                                <ul class="dropdown-menu">
                                    
                                    <li><a href="javascript:void(0)"><i class="ti-settings m-r-10 text-custom"></i> اعدادات </a></li>
                                    
                                    <li><a href="{{ url('/') }}/login/logout"><i class="ti-power-off m-r-10 text-danger"></i> خروج</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <!-- Top Bar End -->