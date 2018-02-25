


@if(session('success_message'))
<div  class='alert alert-dismissable alert-success'>
    <button type="button" class="close" onclick="this.parentElement.style.display = 'none';" aria-hidden="true"></button>
    {{ session('success_message') }}
     <script type="text/javascript">
        $.Notification.autoHideNotify('success', 'top left', '{{ session("success_message") }}','رجاء مراجعه الجدول المختص لمراجعه البيانات المدخله هذه الرساله سوف تختفي بعد 5 ثواني')
    </script>
</div>
@endif

@if(session('error_message'))
<div  class='alert alert-dismissable alert-danger'>
    <button type="button" class="close" onclick="this.parentElement.style.display = 'none';" aria-hidden="true"></button>
    {{ session('error_message') }}
</div>
@endif

@if(session('delete_message'))
<div  class='alert alert-dismissable alert-warning'>
    <button type="button" class="close" onclick="this.parentElement.style.display = 'none';" aria-hidden="true"></button>
    {{ session('delete_message') }}
</div>
@endif
@if(session('error-danger'))
<div  class='alert alert-dismissable alert-warning'>
    <button type="button" class="close" onclick="this.parentElement.style.display = 'none';" aria-hidden="true"></button>
    {{ session('error_message') }}
</div>
@endif


<!-- divs for ajax -->

<div style="display: none;" class="alert alert-danger errors" >
    <button type="button" class="close" onclick="this.parentElement.style.display = 'none';" aria-hidden="true"></button>
    <ul></ul>
</div>

<div style="display: none;" class="alert alert-success success" >
    <button type="button" class="close" onclick="this.parentElement.style.display = 'none';" aria-hidden="true"></button>
</div>

