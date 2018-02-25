<form class="edit_form" go='{{ url("/products/updateproducts/$product->id") }}'  >

    {{ csrf_field() }}
    
 <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <img src="{{ url('/') }}/src/images/loading.gif" alt="" class="loading modalload" style="display:none;">
                                        <h4 class="modal-title">  تعديل المنتج {{$product->name}}</h4>
                                         <div id="errors" style="display: none;" class='alert  alert-danger avatar_alert'>

                                        <ul>

                                        </ul>
                                    </div>
                                    </div>
                                     <div class="modal-body">
                                           <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">اسم المنتج</label>
                                                    <input type="text" name="name" class="form-control" id="field-3" placeholder="اسم المنتج" value="{{$product->name}}">
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">عنوان المنتج</label>
                                                    <input type="text" name="title" class="form-control"  id="field-3" placeholder="عنوان المنتج" value="{{$product->title}}" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">وزن الوحدة</label>
                                                    <input type="number" name="unit_weight" class="form-control" id="field-3" placeholder="mm" value="{{$product->unit_weight}}" >
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">عدد الوحدات في المنتج</label>
                                                    <input type="number" name="number_of_units" class="form-control" id="field-3" placeholder="" value="{{$product->number_of_units}}" >
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">الحد الاقصي للطلب</label>
                                                    <input type="number" name="order_max" class="form-control" id="field-3" placeholder=""  value="{{$product->order_max}}" >
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">الحد الادني للطلب</label>
                                                    <input type="number" name="order_min" class="form-control" id="field-3" placeholder="" value="{{$product->order_min}}" >
                                                </div>
                                            </div>
                                        </div>
                                           <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">سعر المنتج</label>
                                                    <input type="number" name="price" class="form-control" id="field-3" placeholder="" value="{{$product->price}}" >
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">صورة المنتج</label>
                                                   <input type="file" name="image" class="form-control" >
                                                    <img src="{{ url('/') }}/src/images/products/{{$product->image}}" alt="image" class="img-responsive thumb-lg">
                                                </div>
                                            </div>
                                        </div>

                                          <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">وصف المنتج</label>
                                                   <textarea class="form-control autogrow" id="field-7" name="description" placeholder="وصف المنتج" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{$product->description}}</textarea>
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


