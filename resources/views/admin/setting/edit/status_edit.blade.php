<form class="edit_form" go='{{ url("/status/updatestatus/$orders_status->id") }}'  >

    {{ csrf_field() }}
    
 <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <img src="{{ url('/') }}/src/images/loading.gif" alt="" class="loading modalload" style="display:none;">
                                        <h4 class="modal-title">  تعديل الحاله {{$orders_status->name}}</h4>
                                         <div id="errors" style="display: none;" class='alert  alert-danger avatar_alert'>

                                        <ul>

                                        </ul>
                                    </div>
                                    </div>
                                     <div class="modal-body">
                             <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">اسم الحالات</label>
                                                    <input type="text" name="name" class="form-control" id="field-3" placeholder="اسم الحاله" value="{{$orders_status->name}}">
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


