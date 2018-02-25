
@extends('admin.home')

@section('content')


               <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                            
                                <h4 class="page-title"> اللوحة الرئيسية</h4>
                               
                            </div>
                        </div>

<div>
<br>
<div id="msg">

            @include('admin.includes.messages')
                
            </div>
</div>
           
            <br>

                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated">
                                    <div class="bg-icon bg-icon-info pull-left">
                                        <i class="md md-work text-info"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">{{$products}}</b></h3>
                                        <p class="text-muted">المنتجات</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-pink pull-left">
                                        <i class="md md-wallet-travel text-pink"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">{{$clients}}</b></h3>
                                        <p class="text-muted">العملاء</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-purple pull-left">
                                        <i class="md md-track-changes text-purple"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">{{$orders}}</b></h3>
                                        <p class="text-muted">الطلبات</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box">
                                    <div class="bg-icon bg-icon-success pull-left">
                                        <i class="md md-remove-red-eye text-success"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">{{$users}}</b></h3>
                                        <p class="text-muted">المديرون</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                     
                              
                            
             

                    </div> <!-- container -->
                               
                </div> <!-- content -->
               


@endsection

@section('script')

 <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>
<script src="{{ url('/') }}/src/js/jquery.waypoints.js"></script>
<script src="{{ url('/') }}/src/js/jquery.counterup.min.js"></script>



<script src="{{ url('/') }}/src/js/morris.min.js"></script>
<script src="{{ url('/') }}/src/js/raphael-min.js"></script>

<script src="{{ url('/') }}/src/js/jquery.knob.js"></script>
@endsection

