@extends('layouts.master')
@section('title', 'Edit Renter')
@section('content')
<div class="container">

  <div class="card" style="margin-top: 0rem !important;">
    <div class="card-header">
      <span class="badge badge-secondary">Renter Edit</span> 
      <a href="{{ route('renter') }}" title='Close' class="badge badge-danger rounded-circle float-right">
        <i class="fa fa-times"></i>
      </a>
    </div>
    <div class="card-body" style="background: #f6f6f64d !important;">
      <form method="post" action="{{ route('renter.update',['id'=>$ed_renter->id]) }}" enctype="multipart/form-data">

        @method('PUT')
        @csrf

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-4">
              <label class="col-form-label col-form-label-sm">Name</label>
              <input id="name" class="form-control form-control-sm" placeholder="Name"  autofocus="name" type="text" name="name" value="{{ $ed_renter->name }}">
            </div>
            <div class="col-md-4">
              <label class="col-form-label col-form-label-sm">Father Name</label>
              <input id="father_name" class="form-control form-control-sm" placeholder="Father Name"  autofocus="father_name" type="text" name="father_name" value="{{ $ed_renter->father_name }}">
            </div>
            <div class="col-md-4">
              <label class="col-form-label col-form-label-sm"> NIC Number</label>
              <input id="nic_number" class="form-control form-control-sm" value="{{ $ed_renter->nic_number }}"  type="text" name="nic_number">    
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-4">
              <label class="col-form-label col-form-label-sm">Contact Number</label>
              <input id="contact" class="form-control form-control-sm"  type="text" name="contact" value="{{ $ed_renter->contact }}">    
            </div>
            <div class="col-md-4">
              <label class="col-form-label col-form-label-sm">Email</label>
              <input id="email" class="form-control form-control-sm" placeholder="Email"  type="email" name="email" value="{{ $ed_renter->email }}">    
            </div>
            <div class="col-md-4">
              <label class="col-form-label col-form-label-sm">Date of birth</label>
              <input type="text" name="dob" placeholder="Date of birth" class="form-control form-control-sm" id="datepicker" value="{{ $ed_renter->dob }}">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label class="col-form-label col-form-label-sm">Address</label>
              <input id="address" class="form-control form-control-sm" placeholder="Address"  type="text" name="address" value="{{ $ed_renter->address }}">    
            </div>
            <div class="col-md-6">
              <label class="col-form-label col-form-label-sm">Profession</label>
              <input id="profession" class="form-control form-control-sm" placeholder="Profession"  type="text" name="profession" value="{{ $ed_renter->profession }}">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-3">
              <label class="col-form-label col-form-label-sm">Marital Status</label>
              <select class="form-control form-control-sm" name="marital_status">
                <option disabled selected="">Select any option</option>
                <option value="single" {{ ($ed_renter->marital_status=='single') ? "selected" : '' }}>Single</option>
                <option value="married" {{ ($ed_renter->marital_status=='married') ? "selected" : '' }}>Married</option>
                <option value="divorced" {{ ($ed_renter->marital_status=='divorced') ? "selected" : '' }}>Divorced</option>
              </select>
            </div>

            <div class="col-md-3">
              @if($ed_renter->nic_copy)
              <button type="button" class="btn btn-outline-success btn-sm rounded-circle" data-toggle="modal" data-target="#exampleModal" onclick="eiv('nic_copy');">
                <i class="fa fa-eye"></i>
              </button>
              @endif
              <label class="col-form-label col-form-label-sm">NIC Copy</label>
              <input    type="file" name="nic_copy">
            </div>
            <div class="col-md-3">
              @if($ed_renter->photo_url)
              <button type="button" class="btn btn-outline-success btn-sm rounded-circle" data-toggle="modal" data-target="#exampleModal" onclick="eiv('photo');">
               <i class="fa fa-eye"></i>
              </button>
              @endif
              <label class="col-form-label col-form-label-sm">Photo</label>
              <input   type="file" name="photo">
            </div>
            <div class="col-md-3" style="text-align: center;">
              <label class="col-form-label col-form-label-sm">Gender: </label><br />
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender"  value="1"  {{ ($ed_renter->gender=='1') ? "checked" : '' }}>
                <label class="form-check-label col-form-label-sm" style="padding: 5px;">Male</label>
                <input class="form-check-input" type="radio" name="gender"  value="2" {{ ($ed_renter->gender=='2') ? "checked" : '' }}>
                <label class="form-check-label col-form-label-sm">Female</label>
              </div>
            </div>
            <div class="col-md-12">
              <label class="col-form-label col-form-label-sm">Other details </label><br />
              <textarea name="other_details" class="form-control form-control-sm">{{ $ed_renter->other_details }}</textarea>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12" style="text-align: right;">
              <input type="submit" value="Update" class="btn btn-primary btn-sm">
            </div>
          </div>
        </div>
    </form>
  </div>

    <div class="text-center" id="msg_box">
      @if(count($errors->all()))
      <ul>
        @php $i= 1; @endphp
        @foreach($errors->all() as $error)

        <li class="badge badge-pill badge-warning">{{ $i }}) {{ $error }}</li>
        @php $i++ @endphp
        @endforeach
      </ul>
      @endif

      @if($flash = session('failure_msg'))
      <p class="badge badge-pill badge-danger">{{ $flash }}</p>
      @endif
    </div>

  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close rounded-circle btn-sm" style="background-color: red; width: 30px; margin: -15px -14px;" data-dismiss="modal" aria-label="Close">
           &times;
          </button>
          <img src="" alt="img not found" id="modal_img"  class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  @endsection
  @section('javascript')

  <script>
    function eiv(photo) {
      if(photo == 'photo'){
        var src_url = "{{asset('uploads/images/'.$ed_renter->photo_url) }}";
        document.getElementById('exampleModalLabel').innerHTML = "{{ $ed_renter->name }} Photo ";
      } else {
        var src_url = "{{asset('uploads/images/'.$ed_renter->nic_copy) }}";
        document.getElementById('exampleModalLabel').innerHTML = "{{ $ed_renter->name }} N-I-C";
      }
      document.getElementById('modal_img').src = src_url;
    }

  </script>
  @endsection