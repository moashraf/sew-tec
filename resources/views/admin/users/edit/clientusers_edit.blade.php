<form class="edit_form" go='{{ url("/clientusers/updateusers/$user->id") }}'  >

    {{ csrf_field() }}
    
 <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <img src="{{ url('/') }}/src/images/loading.gif" alt="" class="loading modalload" style="display:none;">
                                        <h4 class="modal-title">  تعديل المستخدمم {{$user->name}}</h4>
                                         <div id="errors" style="display: none;" class='alert  alert-danger avatar_alert'>

                                        <ul>

                                        </ul>
                                    </div>
                                    </div>
                                  <div class="modal-body">
                                           <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">اسم المستخدم</label>
                                                    <input type="text" name="username" class="form-control" id="field-3" placeholder="اسم المستخدم" value="{{$user->username}}">
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">كلمه المرور</label>
                                                    <input type="password" name="password" class="form-control" id="field-3" placeholder="كلمه المرور">
                                                </div>
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">تأكيد كلمه المرور</label>
                                                    <input type="password" name="confpassword" class="form-control" id="field-3" placeholder="تأكيد كلمه المرور">
                                                </div>
                                            </div>
                                        </div>
                                        
                                          <div class="row">
                                           
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">البيرد الالكتروني</label>
                                                    <input type="text" name="email" class="form-control" id="field-3" placeholder="البيرد الالكتروني" value="{{$user->email}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">الحاله</label>
                                                    <select name="active" class="form-control ">
                                                    <option value="active" @if($user->active == "active") selected @endif>مفعل</option>
                                                    <option value="deactive" @if($user->active == "deactive") selected @endif>غير مفعل</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">رقم الهاتف</label>
                                                    <input type="number" name="phone" class="form-control" id="field-3" placeholder="رقم الهاتف" value="{{$user->phone}}">
                                                </div>
                                            </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">شعار المستخدم</label>
                                                   <input type="file" name="image" class="form-control" >
                                                </div>
                                            </div>
                                        
                                        </div>
                                          

                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">العنوان</label>
                                                   <textarea class="form-control autogrow" id="field-7" name="address" placeholder="وصف المنتج" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{$user->phone}}</textarea>
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

