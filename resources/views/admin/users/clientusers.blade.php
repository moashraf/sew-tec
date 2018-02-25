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
                   
                    <h4 class="page-title">  العملاء</h4>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">المستخدمين</a>
                        </li>
                        
                        <li class="active">
                           العملاء
                        </li>
                    </ol>
                </div>
            </div>
            <div id="msg">
            
                 @include('admin.includes.messages')
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                 <form class="add_form" go="{{ url('/clientusers/addusers') }}"  >

                                {{ csrf_field() }}
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <img src="{{ url('/') }}/src/images/loading.gif" alt="" class="loading modalload" style="display:none;">
                                        <h4 class="modal-title">اضافة عميل</h4>
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
                                                    <input type="text" name="username" class="form-control" id="field-3" placeholder="اسم المستخدم">
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
                                           
                                        
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">البريد الالكتروني</label>
                                                    <input type="text" name="email" class="form-control" id="field-3" placeholder="البريد الالكتروني">
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">رقم الهاتف</label>
                                                    <input type="number" name="phone" class="form-control" id="field-3" placeholder="رقم الهاتف">
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
                                                   <textarea class="form-control autogrow" id="field-7" name="address" placeholder="العنوان" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-info waves-effect waves-light">حفظ  <img src="{{ url('/') }}/src/images/loading.gif" alt="" class="loading modalload" style="display:none;"></button>
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">الغاء</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.modal -->
                        <div class="button-list">
                            <button type="button" class="add btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">اضافة مستخدم</button>
                            <button type="button" action="deleteSelected();" data-toggle="confirmation" class="btn  btn-inverse waves-effect waves-light red-mint  uppercase">حذف المحدد</button>
                        </div>
                        <br>
                        <br>
                           <form action="#" id="action_form" method="post"  go="{{ url('clientusers/deleteselected') }}">

                            {{ csrf_field() }}
                        <table id="datatable-responsive" class="clientusers table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th>
                                        <input type="checkbox" id="checkall" />
                                    </th>
                                    <th>اسم المستخدم</th>
                                    <th>البريد الالكتروني</th>
                                    <th>رقم الهاتف</th>
                                    <th>الحاله</th>
                                    <th>التحكم</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

               

<div id="edit" class="modal fade edit" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="edit_content">
                <img src="{{ url('/') }}/src/images/loading.gif" alt="" class="loading">
                <span> ... جاري التحميل &nbsp;&nbsp; </span>
            </div>
        </div>
    </div>

@endsection

@section('script')

<script type="text/javascript">
      $('.clientusers').dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ url('clientusers/clientusersdatatable') }}",
        "columns": [
            {"searchable": false, "orderable": false},
            {"searchable": true, "orderable": true},
            {"searchable": true, "orderable": true},
            {"searchable": true, "orderable": true},
            {"searchable": true, "orderable": true},
            
            {"searchable": false, "orderable": false}

        ],
        "order": [[1, 'asc']]
    });
</script>


@endsection