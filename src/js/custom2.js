$('body').on('hidden.bs.modal', '#edit', function () {
  $(this).removeData('bs.modal');
});




jQuery.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource, fnCallback, bStandingRedraw )
{
    // DataTables 1.10 compatibility - if 1.10 then `versionCheck` exists.
    // 1.10's API has ajax reloading built in, so we use those abilities
    // directly.
    if ( jQuery.fn.dataTable.versionCheck ) {
        var api = new jQuery.fn.dataTable.Api( oSettings );
 
        if ( sNewSource ) {
            api.ajax.url( sNewSource ).load( fnCallback, !bStandingRedraw );
        }
        else {
            api.ajax.reload( fnCallback, !bStandingRedraw );
        }
        return;
    }
 
    if ( sNewSource !== undefined && sNewSource !== null ) {
        oSettings.sAjaxSource = sNewSource;
    }
 
    // Server-side processing should just call fnDraw
    if ( oSettings.oFeatures.bServerSide ) {
        this.fnDraw();
        return;
    }
 
    this.oApi._fnProcessingDisplay( oSettings, true );
    var that = this;
    var iStart = oSettings._iDisplayStart;
    var aData = [];
 
    this.oApi._fnServerParams( oSettings, aData );
 
    oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
        /* Clear the old information from the table */
        that.oApi._fnClearTable( oSettings );
 
        /* Got the data - add it to the table */
        var aData =  (oSettings.sAjaxDataProp !== "") ?
            that.oApi._fnGetObjectDataFn( oSettings.sAjaxDataProp )( json ) : json;
 
        for ( var i=0 ; i<aData.length ; i++ )
        {
            that.oApi._fnAddData( oSettings, aData[i] );
        }
 
        oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
 
        that.fnDraw();
 
        if ( bStandingRedraw === true )
        {
            oSettings._iDisplayStart = iStart;
            that.oApi._fnCalculateEnd( oSettings );
            that.fnDraw( false );
        }
 
        that.oApi._fnProcessingDisplay( oSettings, false );
 
        /* Callback user function - for event handlers etc */
        if ( typeof fnCallback == 'function' && fnCallback !== null )
        {
            fnCallback( oSettings );
        }
    }, oSettings );
};
  







$('.edit_form').on('submit', function (event) {
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
        success: function (response) {
            // Show success message, close modal?
            //location.reload();
            $('#edit').modal('hide');
            $('#msg').load("message");
           $('.modalload').hide(); 
            table.fnReloadAjax();
            $('#edit').removeData('bs.modal');




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
        }
    });
});









  