<form class="edit_form" go='{{ url("/ordersusers/changestatus/$orders->id/$orders->order_number") }}'  >

    {{ csrf_field() }}
    
 <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <img src="{{ url('/') }}/src/images/loading.gif" alt="" class="loading modalload" style="display:none;">
                                        <h4 class="modal-title">  اضافه حاله  للطلب رقم {{$orders->order_number}}</h4>
                                         <div id="errors" style="display: none;" class='alert  alert-danger avatar_alert'>

                                        <ul>

                                        </ul>
                                    </div>
                                    </div>
                                     <div class="modal-body">
                             <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">اسم الحاله</label>
                                                     <select class="form-control select2" name="status" id="fields" onchange="select();">
                                              <option value=""> أختر أسم الحاله</option>
                                    @if($statuss)
                                    @foreach($statuss as $status)
                                        <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                                    @endif
                                             
                                              
                                                </select>
                                                </div>
                                            </div>

                                             <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">التاريخ</label>
                                                    <input type="date" name="status_date" class="form-control" id="field-3" placeholder="اسم الحاله">
                                                </div>
                                            </div>
                                      
                                    </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">حفظ <img src="{{ url('/') }}/src/images/loading.gif" alt="" class="loading modalload" style="display:none;"></button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">الغاء</button>
                                    </div>
</form>





<script src="{{ url('/') }}/src/js/custom2.js" type="text/javascript"></script>


