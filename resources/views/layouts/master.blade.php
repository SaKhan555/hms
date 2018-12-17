<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>HMS - @yield('title')</title>

  <!-- Bootstrap core CSS-->
  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('alertifyjs/css/alertify.min.css') }}" rel="stylesheet">
  <link href="{{ asset('alertifyjs/css/themes/default.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <!-- Page level plugin CSS-->

  <!-- Custom styles for this template-->
  <link href="{{ asset('/css/sb-admin.css') }}" rel="stylesheet">

  <!-- Bootstrap4 datepicker styles-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet">   


<!--------------------------Select2----------------------------------------->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

  <!-------------------------- Favicon ------------------------------>
  <link rel="icon" href="{{ asset('uploads/logo/favicon.ico') }}" type="image/gif" sizes="16x16">
</head>
<body id="page-top">

  @include('layouts.header')

  <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <div id="content-wrapper" style="background-color: #e9ecef;">
      <div class="container-fluid">
        @yield('content')
      </div>
      <!-- /.container-fluid -->
      <!-- Sticky Footer -->
      @include('layouts.footer')

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


<!------------------------------  General edit modal  --------------------------------------->
  <div class="modal fade" id="edit_modal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h6 class="modal-title"></h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body" id="form_data">
  
        </div>   
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="{{ asset('/js/jquery.min.js')  }}"></script>
  <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('/js/jquery.easing.min.js') }}"></script>
  <!-- Page level plugin JavaScript-->
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin.min.js') }}"></script> 
  <script src="{{ asset('alertifyjs/alertify.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

  <!-- Bootstrap4 datepicker scripts-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

<!-------------------------------------------------Sweet Alerts------------------------------------------>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-------------------------------------------------Selecet2js------------------------------------------>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <script>
// ajax example here 
// For showed messsage romoving
//---------------->msg showing fuction<-----------------
$(".msg").show();
setTimeout(function() { $(".msg").remove(); }, 3000);
//------------->Datepicker intialization<--------------
$('#datepicker').datepicker({
  format:'d/mm/yyyy'
});
//----------------->for NIC number and mobile numbers pattern <----------------
$(document).ready(function(){
  $('#nic_number').mask('00000-0000000-0');
  $('#contact').mask('+92-000-0000000');
});


$(document).ready(function() {
    $('.select2me').select2();
});

//-----------------------> Print function <----------------------------
function PrintElem(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = printContents;
  window.print();
  document.body.innerHTML = originalContents;
}

//-------------->Modal POP UP on btn click<-----------------

function open_modal(modal_data){
        $("#edit_modal").modal();
        document.getElementById('form_data').innerHTML = modal_data;
}

//--------------------> AJAX XML Request function <------------------------
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
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> --}}
@yield('javascript')
</body>
</html>
