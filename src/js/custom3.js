$('body').on('hidden.bs.modal', '#addnew', function () {
  $(this).removeData('bs.modal');
});


$(".add").on('click', function (event) {
    $('.avatar_alert').hide().find('ul').empty();

    $(".add_form3")[0].reset();
    $('.multi-select').multiSelect('refresh'); 
   $(".select2").select2();

    
});

$('body').on('hidden.bs.modal', '#edit', function () {
  $(this).removeData('bs.modal');
});







$(".add_form3").on('submit', function (event) {
    
    event.preventDefault();
    var info = $('.avatar_alert');
    var table = $('#datatable-responsive').dataTable();
    var data = new FormData(this);
    var action = $(this).attr('go');
     $('.modalload').show(); 

    $.ajax({
        type: "POST",
        url: action,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend : function () {
            // disable submit button not to send the same request twice
//            $("button[type='submit']").attr('disabled','disabled');
        },
        success: function () {
            // Show success message, close modal?
           // location.reload();
           $('#addnew').modal('hide');
           // $('#msg').load("message");
           $('.modalload').hide(); 
             location.reload();

            

            //info.hide().find('ul').empty();


        },
        error: function (response) {

           $('.modalload').hide(); 
            
            info.hide().find('ul').empty();
            $.each(response.responseJSON, function (index, error) {

                info.find('ul').append("<li>" + error + "</li>");
            });

            if (response.status == 422) {
                info.slideDown();
            }
            $("button[type='submit']").removeAttr('disabled');

        }
    });

});








  $(".change_plan").click(function()
 {

  var id=$(this).attr('plan');
  var name=$(this).attr('planename');
  var dataString = {id:id , name:name};
  var action = $(this).attr('go');

  $.ajax
  ({
   type: "GET",
   url:action,
   data: dataString,
   cache: false,
   success: function(html)
   {
      location.reload();
   } 

   });
  });

    
