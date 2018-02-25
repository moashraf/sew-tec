<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="ar" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
       <link rel="shortcut icon" href="{{ url('/') }}/src/images/favicon_1.ico">

        <title>{{$setting->name}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="#1 selling multi-purpose bootstrap admin theme sold in themeforest marketplace packed with angularjs, material design, rtl support with over thausands of templates and ui elements and plugins to power any type of web applications including saas and admin dashboards. Preview page ofRTL  Theme #1 for "
            name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/src/login/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/src/login/css/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/src/login/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/src/login/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ url('/') }}/src/login/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ url('/') }}/src/login/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ url('/') }}/src/login/css/components-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ url('/') }}/src/login/css/plugins-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ url('/') }}/src/login/css/login-5-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
       
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-2 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 login-container bs-reset" style=" background-color: lavender;">
                    <img class="login-logo login-6" src="{{ url('/') }}/src/images/system/{{$setting->logo}}" />
                    <div class="login-content">
                        <h1>{{$setting->name}}</h1>
                        <p> {{$setting->desc}} . </p>
                         <form class="login-form" action="{{ url('/') }}/login/login" method="post">
                
                {{ csrf_field() }}
                          
         @if (session('loginerror'))
          <div class="alert alert-danger ">
               <button class="close" data-close="alert"></button>
                     <span> {{ session('loginerror') }} </span>
          </div>
                            

        @endif

            

                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="أسم المستخدم" name="email" required /> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="كلمه المرور" name="password" required /> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" name="remember" value="1" /> تذكرني
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-sm-8 text-right">
                                  
                                    <button class="btn blue" type="submit">تسجيل الدخول</button>
                                </div>
                            </div>
                        </form>
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                      
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                <ul class="login-social">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p> جميع الحقوق محفوظة لموقع {{$setting->name}} © {{date('Y')}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 bs-reset">
                    <div class="login-bg"> </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-2 -->
        <!--[if lt IE 9]>
<script src="{{ url('/') }}/src/login/js/respond.min.js"></script>
<script src="{{ url('/') }}/src/login/js/excanvas.min.js"></script> 
<script src="{{ url('/') }}/src/login/js/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ url('/') }}/src/login/js/jquery.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/src/login/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/src/login/js/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/src/login/js/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/src/login/js/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/src/login/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ url('/') }}/src/login/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/src/login/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/src/login/js//select2.full.min.js" type="text/javascript"></script>
        <script src="{{ url('/') }}/src/login/js/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ url('/') }}/src/login/js/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ url('/') }}/src/login/js/login-5.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>