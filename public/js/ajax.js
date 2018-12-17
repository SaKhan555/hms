// var modal = (function () {/*
//  <div id="background_fade" style="z-index:9999999; height: 100% !important; min-height: 100%; width: 100%; position: fixed; top: 0; background-color: rgba(0, 0, 0, 0.7);display:none;">
//  <div id="processing" style="z-index:99999999;display: block; padding-right: 17px;" class="modal fade in show " role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
//  <div class="modal-dialog ajax_modal">
//  <div class="modal-content">
//  <div class="modal-header">
//  <button type="button" class="close" onclick="$('#background_fade').fadeOut(function() { $(this).remove(); });" aria-hidden="true">x</button>
//  <h4 class="modal-title" id="ajax_modal_title">Processing..</h4>
//  </div>
//  <div class="modal-body">
//  <div id="ajax_modal_data" style="padding: 5px 20px;">
//  <div class="form-group">
//  <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
//  <span>Please wait while we are processing your request.</span><br>
//  <span>It could take a few seconds depending on your internet connection speed.</span>
//  </div>
//  </div>
//  </div>
//  </div>
//  </div>
//  */}).toString().match(/[^]*\/\*([^]*)\*\/\}$/)[1];


var modal = (function () {/* 
<div class="modal fade" id="background_fade" tabindex="-1" style="z-index:9999999; height: 100% !important; min-height: 100%; width: 100%;position: fixed; top: 0; background-color: rgba(0, 0, 0, 0.7);display:none;">
  <div id="processing" style="z-index:99999999;display: block; padding-right: 17px;" class="modal fade in show " role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog  ajax_modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="$('#background_fade').fadeOut(function() { $(this).remove(); });" aria-hidden="true">x</button>
            <h4 class="modal-title" id="ajax_modal_title">Processing..</h4>
      </div>
            <div class="modal-body">
              <div id="ajax_modal_data" style="padding: 5px 20px;">
             <div class="form-group">
              <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
              <span>Please wait while we are processing your request.</span><br>
             <span>It could take a few seconds depending on your internet connection speed.</span>
              </div>
              </div>
              </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
*/}).toString().match(/[^]*\/\*([^]*)\*\/\}$/)[1];


function call_ajax(response_div, php_file, form_data) {
    var request = get_XmlHttp();
    token = document.getElementsByTagName('meta')['csrf-token'].content;
    request.open("POST", php_file, true);
    request.setRequestHeader('X-CSRF-Token', token);
    request.send(form_data);
    $('body').append(modal);
    $('#background_fade').fadeIn();
    $('.btn').attr('disabled', 'disabled');
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            $('#background_fade').fadeOut(function () {
                $(this).remove();
            });
            $('.btn').removeAttr('disabled');
            if (response_div == '') {
                if (request.responseText.toLowerCase().search('fail') != -1) {
                    alertify.error(request.responseText);
                } else {
                    alertify.success(request.responseText);
                }
            } else {
                if (request.responseText != "") {
                    document.getElementById(response_div).innerHTML = request.responseText;
                }
            }
        }
    }
}


function call_ajax_without_modal(response_div, php_file, form_data) {
    var request = get_XmlHttp();
    request.open("POST", php_file, true);
    request.send(form_data);
    $('.btn').attr('disabled', 'disabled');
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            $('.btn').removeAttr('disabled');
            if (response_div == '') {
                if (request.responseText.toLowerCase().search('fail') != -1) {
                    alertify.error(request.responseText);
                } else {
                    alertify.success(request.responseText);
                }
            } else {
                if (request.responseText != "") {
                    document.getElementById(response_div).innerHTML = request.responseText;
                }
            }
        }
    }
}

function call_ajax_without_modal_with_functions(response_div, php_file, form_data, functions) {
    var request = get_XmlHttp();
    request.open("POST", php_file, true);
    request.send(form_data);
    $('.btn').attr('disabled', 'disabled');
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            $('.btn').removeAttr('disabled');
            if (response_div == '') {
                if (request.responseText.toLowerCase().search('fail') != -1) {
                    alertify.error(request.responseText);
                } else {
                    alertify.success(request.responseText);
                }
            } else {
                if (request.responseText != "") {
                    document.getElementById(response_div).innerHTML = request.responseText;
                }
            }
            if (functions.length > 0) {
                if (request.responseText.search('fail') != -1) {
                } else {
                    while (functions.length) {
                        functions.shift().call();
                    }
                }
            }
        }
    }
}

function call_ajax_with_functions(response_div, php_file, form_data, functions) {
    var request = get_XmlHttp();
    token = document.getElementsByTagName('meta')['csrf-token'].content;
    request.open("POST", php_file, true);
    request.setRequestHeader('X-CSRF-Token', token);
    request.send(form_data);
    $('body').append(modal);
    $('#background_fade').fadeIn();
    $('.btn').attr('disabled', 'disabled');
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            $('.btn').removeAttr('disabled');
            $('#background_fade').fadeOut(function () {
                $(this).remove();
            });
            if (response_div == '') {
                if (request.responseText.toLowerCase().search('fail') != -1) {
                    alertify.error(request.responseText);
                    console.log(request.responseText);
                } else {
                    alertify.success(request.responseText);
                     console.log(request.responseText);
                }
            } else {
                document.getElementById(response_div).innerHTML = request.responseText;
            }
            if(request.responseText != ''){
                try {
                    json_object = JSON.parse(request.responseText);
                } catch (ex) {
                    console.log('invalid json string');
                    console.log(request.responseText);
                }
            }
            if (functions.length > 0) {
                if (request.responseText.search('fail') != -1) {
                } else {
                    while (functions.length) {
                        functions.shift().call();
                    }
                }
            }
        }
    }
}

function call_ajax_modal(php_file, form_data, title) {
    var request = get_XmlHttp();
    request.open("get", php_file, true);
    request.send(form_data);
    $('body').append(modal);
    $('#background_fade').fadeIn();
    $('.btn').attr('disabled', 'disabled');
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            $('.btn').removeAttr('disabled');
            if (request.responseText != "") {
                document.getElementById('ajax_modal_title').innerHTML = title;
                document.getElementById('ajax_modal_data').innerHTML = request.responseText;
            } else {
                alertify.error("No Response..");
                $('#background_fade').fadeOut(function () {
                    $(this).remove();
                });
            }
        }
    }
}

function call_ajax_modal_with_functions(php_file, form_data, title, functions) {
    var request = get_XmlHttp();
    request.open("POST", php_file, true);
    request.send(form_data);
    $('body').append(modal);
    $('#background_fade').fadeIn();
    $('.btn').attr('disabled', 'disabled');
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            $('.btn').removeAttr('disabled');
            if (request.responseText != "") {
                document.getElementById('ajax_modal_title').innerHTML = title;
                document.getElementById('ajax_modal_data').innerHTML = request.responseText;
            } else {
                alertify.error("No Responce..");
                $('#background_fade').fadeOut(function () {
                    $(this).remove();
                });
            }
            if (functions.length > 0) {
                while (functions.length) {
                    functions.shift().call();
                }
            }
        }
    }
}

function call_ajax_modal_with_gfunctions(php_file, form_data, title, functions) {
    var request = get_XmlHttp();
    request.open("GET", php_file, true);
    request.send(form_data);
    $('body').append(modal2);
    $('#background_fade').fadeIn();
    $('.btn').attr('disabled', 'disabled');
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            $('.btn').removeAttr('disabled');
            if (request.responseText != "") {
                document.getElementById('ajax_modal_title').innerHTML = title;
                document.getElementById('ajax_modal_data').innerHTML = request.responseText;
            } else {
                alertify.error("No Responce..");
                $('#background_fade').fadeOut(function () {
                    $(this).remove();
                });
            }
            if (functions.length > 0) {
                while (functions.length) {
                    functions.shift().call();
                }
            }
        }
    }
}
function call_ajax_modal_with_pfunctions(php_file, form_data, title, functions) {
    var request = get_XmlHttp();
    token = document.getElementsByTagName('meta')['csrf-token'].content;
    request.open("POST", php_file, true);
    request.setRequestHeader('X-CSRF-Token', token);
    request.send(form_data);
    $('body').append(modal3);
    $('#background_fade').fadeIn();
    $('.btn').attr('disabled', 'disabled');
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            $('.btn').removeAttr('disabled');
            if (request.responseText != "") {
                document.getElementById('ajax_modal_title').innerHTML = title;
                document.getElementById('ajax_modal_data').innerHTML = request.responseText;
            } else {
                alertify.error("No Responce..");
                $('#background_fade').fadeOut(function () {
                    $(this).remove();
                });
            }
            if (functions.length > 0) {
                while (functions.length) {
                    functions.shift().call();
                }
            }
        }
    }
}

function call_ajax_modal_with_lgp_functions(php_file, form_data, title, functions) {
    var request = get_XmlHttp();
    token = document.getElementsByTagName('meta')['csrf-token'].content;
    request.open("POST", php_file, true);
    request.setRequestHeader('X-CSRF-Token', token);
    request.send(form_data);
    $('body').append(modal2);
    $('#background_fade').fadeIn();
    $('.btn').attr('disabled', 'disabled');
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            $('.btn').removeAttr('disabled');
            if (request.responseText != "") {
                document.getElementById('ajax_modal_title').innerHTML = title;
                document.getElementById('ajax_modal_data').innerHTML = request.responseText;
            } else {
                alertify.error("No Responce..");
                $('#background_fade').fadeOut(function () {
                    $(this).remove();
                });
            }
            if (functions.length > 0) {
                while (functions.length) {
                    functions.shift().call();
                }
            }
        }
    }
}

function call_ajax_confirm_with_function(response_div, php_file, form_data, functions){
    var request = get_XmlHttp();
    token = document.getElementsByTagName('meta')['csrf-token'].content;
    request.open("POST", php_file, true);
    request.setRequestHeader('X-CSRF-Token', token);
    request.send(form_data);
    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            if (request.responseText != "") {
                alertify.success(request.responseText);
                console.log(request.responseText);
            } else {
                 alertify.error(request.responseText);
                 console.log(request.responseText);
            }
            if (functions.length > 0) {
                while (functions.length) {
                    functions.shift().call();
                }
            }
        }
    }
}

function get_XmlHttp() {
    var xmlHttp = null;
    if (window.XMLHttpRequest) {		// for Forefox, IE7+, Opera, Safari, ...
        xmlHttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {	// for Internet Explorer 5 or 6
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlHttp;
}

