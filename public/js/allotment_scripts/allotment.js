function room_stauts(me) {
    var room_id = $(me).val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax('isfull', { //Route /URL
        type: 'POST', // http method
        data: { id: room_id }, // data to submit
        success: function(data) {
            swal('Room Details', 'Room Size: ' + data._size + ' || Alloted: ' + data.alloted + ' || ' + data.msg + ': ' + data.available, "success");
        },
        error: function(jqXhr, textStatus, errorMessage) {
            swal("oops!", 'Error: ' + errorMessage, "error");
        }
    });
}
