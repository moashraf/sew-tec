<form class="edit_form" go='{{ url("/ordersusers/changestatus/$orders->id/$orders->order_number") }}'  >

    {{ csrf_field() }}
    
 <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <img src="{{ url('/') }}/src/images/loading.gif" alt="" class="loading modalload" style="display:none;">
                                        <h4 class="modal-title"> معاينه للطلب رقم {{$orders->order_number}}</h4>
                                         <div id="errors" style="display: none;" class='alert  alert-danger avatar_alert'>

                                        <ul>

                                        </ul>
                                    </div>
                                    </div>
                                     <div class="modal-body">
                             <div class="row">
                                            <div class="col-md-12">
                                            <label for="field-3" class="control-label">تفاصيل العميل</label>
                                            <table class="table table-striped table-bordered">
                                            <tr>
                                            <td>اسم العميل</td><td>رقم الهاتف</td><td>البريد الالكتروني</td>
                                            </tr>
                                            <tr>
                                            <td>{{$user_info->username}}</td><td>{{$user_info->phone}}</td><td>{{$user_info->email}}</td>
                                            </tr>
                                            </table>
                                             <label for="field-3" class="control-label">تفاصيل الطلب</label>
                                             <table class="table table-striped table-bordered">
                                            <tr>
                                            <td>اسم المنتج</td><td>السعر</td><td>الكميه</td>
                                            </tr>
                                            @foreach($items as $item)
                                            <tr>
                                            <td>{{$item->product_name}}</td><td>{{$item->product_price}}</td><td>{{$item->quantity}}</td>
                                            </tr>
                                              @endforeach
                                            </table>
                                              <label for="field-3" class="control-label">حالات الطلب</label>
                                             <table class="table table-striped table-bordered">
                                            <tr>
                                            <td>الحاله</td><td>التاريخ</td>
                                            </tr>
                                            @foreach($status as $stat)
                                            <tr>
                                            <td>{{$stat->name}}</td><td>{{$stat->date}}</td>
                                            </tr>
                                              @endforeach
                                            </table>
   
   
  
  
                                            </div>

                                      
                                      
                                    </div>

                                    </div>
                                
</form>





<script src="{{ url('/') }}/src/js/custom2.js" type="text/javascript"></script>


