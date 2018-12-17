$("#tbRenter").on('click', '.btnDelete', function () {

    var id = $(this).attr("data-id");
    var remove_row = $(this).closest('tr');
    data = new FormData();
    data.append('id',id);
    token = document.getElementsByTagName('meta')['csrf-token'].content;
    var request = get_XmlHttp();
    request.open('post','renter/destroy',true);
    alertify.confirm(" Do you want to delete?",function(){
        request.setRequestHeader('X-CSRF-Token', token);
        request.send(data);
        request.onreadystatechange = function() {
// $('body').append(loader);
if (request.readyState == 4 && request.status == 200) {
    if (request.responseText.toLowerCase().search('success') != -1) {
        remove_row.remove();
        alertify.success(request.responseText);
    } else {  
        alertify.error(request.responseText);
    }  
}};
},function(){
    alertify.error('Cancel');
}).set({labels:{ok:'Yes', cancel: 'No'}}); 
});
// delete_row('#tbRenter','.btnDelete','renter/destroy');

function get_XmlHttp() {
    var xmlHttp = null;
if(window.XMLHttpRequest) {   // for Forefox, IE7+, Opera, Safari, ...
    xmlHttp = new XMLHttpRequest();
}
else if(window.ActiveXObject) { // for Internet Explorer 5 or 6
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
}
return xmlHttp;
}

// Dynamic js function for delete operation on html table
// function delete_row(str_tbody,str_btn_class,str_url) {
// $(str_tbody).on('click', str_btn_class, function () {
//     var id = $(this).attr("data-id");
//     var remove_row = $(this).closest('tr');
//     data = new FormData();
//     data.append('id',id);
//     token = document.getElementsByTagName('meta')['csrf-token'].content;
//     var request = get_XmlHttp();
//     request.open('post',str_url,true);
//     alertify.confirm(" Do you want to delete?",function(){
//     request.setRequestHeader('X-CSRF-Token', token);
//     request.send(data);
//         request.onreadystatechange = function() {
//             if (request.readyState == 4 && request.status == 200) {
//                 if (request.responseText.toLowerCase().search('success') != -1) {
//                     remove_row.remove();
//                     alertify.success(request.responseText);
//                 } else {
//                     alertify.error(request.responseText);
//                 }  
//             }};
//         },function(){
//             alertify.error('Cancel');
//         }).set({labels:{ok:'Yes', cancel: 'No'}}); 
// });
// }