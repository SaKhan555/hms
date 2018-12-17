var modal = (function () {/*
<form action="javascript:update_country();">
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label class="badge">Country</label>
              <input id="edit_country" class="form-control form-control-sm" type="text" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12 text-right">
              <button type="submit" class="btn btn-primary btn-sm" id="btnAdd">Update</button>
            </div>
          </div>
        </div>
    </form>
 */}).toString().match(/[^]*\/\*([^]*)\*\/\}$/)[1];

function modal_dismiss(){
    $('#edit_modal').modal('toggle');
}
$('#refresh').on('click',function(){
    load_data();
}
)
function load_data() {
    var request = get_XmlHttp();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
                document.getElementById('tbCountry').innerHTML = request.responseText;
                alertify.success('Data reloaded successfully...');
                // swal("Reload", "Data reloaded Successfully.", "success");
            }
        }
    request.open('get','country/load_data',true);
    request.send();
}


function add_country(){
    var country = $('#country').val();
    data = new FormData();
    data.append('country',country);
    token = document.getElementsByTagName('meta')['csrf-token'].content;
    var request = get_XmlHttp();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            $("form")[0].reset();
            if (request.responseText != "") {
                $obj = JSON.parse(request.responseText);
                if($obj.success == true){
                $('#tbCountry tr:last').after('<tr><td><a class="dropdown-toggle badge" data-toggle="dropdown" href="#">'+$obj.name+'</a></td></tr>');
                alertify.success('Country '+$obj.name+' Added successfully...');
                } else if($obj.success == false) {  
                alertify.error('Failed to add..');
            }else{
                alertify.error($obj.error_msg);
            }  
            }
        }
    };
    request.open('post','country/store',true);
    request.setRequestHeader('X-CSRF-Token', token);
    request.send(data);
}

$("#tbCountry").on('click', '.btnEdit', function () {
    var id = $(this).attr("data-id");
    var value = $(this).attr("data-value");
    open_modal(modal);
    $('.modal-title').html('Edit '+value);
    $('#edit_country').val(value);
    $('#edit_country').attr('data-id',id);

});

function update_country(){
    var id = $('#edit_country').attr('data-id');
    var country = $('#edit_country').val();
    data = new FormData();
    data.append('id',id);
    data.append('country',country);
    token = document.getElementsByTagName('meta')['csrf-token'].content;
    var request = get_XmlHttp();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            $("form")[0].reset();
            if (request.responseText != "") {
                $obj = JSON.parse(request.responseText);
                if($obj.success == true){
                    modal_dismiss();
                     load_data();
                alertify.success('Country '+$obj.name+' Update successfully...');

                } else if($obj.success == false) {  
                alertify.error('Failed to update..');
            }else{
                alertify.error($obj.error_msg);
            }  
            }
        }
    };
    request.open('POST','country/update',true);
    request.setRequestHeader('X-CSRF-Token', token);
    request.send(data);
}

// function delete_country(){
//     var country = $('#;
//     data = new FormData();
//     data.append('country',country);
//     token = document.getElementsByTagName('meta')['csrf-token'].content;
//     var request = get_XmlHttp();
//     request.onreadystatechange = function() {
//         if (request.readyState == 4 && request.status == 200) {
//             $("form")[0].reset();
//             if (request.responseText != "") {
//                 $obj = JSON.parse(request.responseText);
//                 if($obj.success == true){
//                 $('#tbCountry tr:last').after('<tr><td><a class="dropdown-toggle badge" data-toggle="dropdown" href="#">'+$obj.name+'</a></td></tr>');
//                 alertify.success('Country '+$obj.name+' Added successfully...');
//                 } else if($obj.success == false) {  
//                 alertify.error('Failed to add..');
//             }else{
//                 alertify.error($obj.error_msg);
//             }  
//             }
//         }
//     };
//     request.open('post','country/store',true);
//     request.setRequestHeader('X-CSRF-Token', token);
//     request.send(data);
// }
// var me = $('#tbCountry').closest('tr').find('.btnDelete');
// me.onclick = function(){
//     debugger;

// };


$("#tbCountry").on('click', '.btnDelete', function () {
    debugger;
    var country_id = $(this).attr("data-id");
    var remove = $(this).closest('tr');
    data = new FormData();
    data.append('id',country_id);
    token = document.getElementsByTagName('meta')['csrf-token'].content;
    var request = get_XmlHttp();
    alertify.confirm('<p class="h6" style = "color:grey;">Do you want to delete the country?<br /> you won\'t be able to restore it.  <i class="fa fa-trash" style="color:#ff5858;"></i></p>',function(){
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                if (request.responseText.toLowerCase().search('success') != -1) {
                    remove.remove();
                    // alertify.success('Deleted ' + request.responseText);
                    swal("Success", "Your Data deleted successfully.", "success");
                } else {
                    alertify.error(request.responseText);
                }  
            }};
        request.open('POST','country/delete_country',true);
        request.setRequestHeader('X-CSRF-Token', token);
        request.send(data);  
        },function(){
            alertify.error('Cancel');
        }).set({labels:{ok:'Yes', cancel: 'No'}}); 
});

// swal({
//   title: "Are you sure?",
//   text: "Once deleted, you will not be able to recover this imaginary file!",
//   icon: "warning",
//   buttons: true,
//   dangerMode: true,
// })
// .then((willDelete) => {
//   if (willDelete) {
//     swal("Poof! Your imaginary file has been deleted!", {
//       icon: "success",
//     });
//   } else {
//     swal("Your imaginary file is safe!");
//   }
// });
