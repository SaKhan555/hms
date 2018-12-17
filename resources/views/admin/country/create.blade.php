@extends('layouts.master')
@section('title', 'Add Renter')
@section('content')
<div class="container">
  <div class="card" style="margin-top: 0rem !important;">
    <div class="card-header">
      <span class="badge badge-secondary">Renter Details</span> 
      <a href="{{ route('renter') }}" title='Close' class="badge badge-danger rounded-circle float-right">
        <i class="fa fa-times"></i>
      </a>
    </div>
    <div class="card-body" style="background: #f6f6f64d !important;">
      <form method="post" action="{{ route('renter.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-4">
              <label class="badge">Name</label>
              <input id="name" class="form-control form-control-sm" placeholder="Name"  autofocus="name" type="text" name="name">
            </div>
            <div class="col-md-4">
              <label class="badge">Father Name</label>
              <input id="father_name" class="form-control form-control-sm" placeholder="Father Name"  autofocus="father_name" type="text" name="father_name">
            </div>
              <div class="col-md-4">
                <label class="badge"> NIC Number</label>
                <input id="nic_number" class="form-control form-control-sm" placeholder="xxxxx-xxxxxxx-x"  type="text" name="nic_number" autocomplete="off">    
              </div>
          </div>
        </div>
          <div class="form-group">
            <div class="form-row">

              <div class="col-md-4">
                <label class="badge">Contact Number</label>
                <input id="contact" class="form-control form-control-sm"  type="tel" name="contact" value="+92-" autocomplete="off">    
              </div>
                            <div class="col-md-4">
                <label class="badge">Email</label>
                <input id="email" class="form-control form-control-sm" placeholder="Email"  type="email" name="email">    
              </div>
                        <div class="col-md-4">
              <label class="badge">Dath of birth</label>
             <input type="text" name="dob" class="form-control form-control-sm" id="datepicker" autocomplete="off" placeholder="mm/dd/yyyy">
              </div>

            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                <label class="badge">Address</label>
                <input id="address" class="form-control form-control-sm" placeholder="Address"  type="text" name="address">    
              </div>
              <div class="col-md-6">
                  <label class="badge">Profession</label>
                <input id="profession" class="form-control form-control-sm" placeholder="Profession"  type="text" name="profession">
            </div>
            </div>
          </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-3">
            <label class="badge">Marital Status</label>
              <select class="form-control form-control-sm" name="marital_status">
              <option disabled selected="">Select any option</option>
              <option value="single">Single</option>
              <option value="married">Married</option>
              <option value="divorced">Divorced</option>
            </select>
            </div>

                        <div class="col-md-3">
            <label class="badge">NIC Copy</label>
              <input    type="file" name="nic_copy">
                        </div>
                        <div class="col-md-3">
            <label class="badge">Photo</label>
              <input   type="file" name="photo">
            </div>

              <div class="col-md-3" style="text-align: center;">
                <label class="badge">Gender: </label><br />
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender"  value="1">
                  <label class="form-check-label col-form-label-sm" style="padding: 5px;">Male</label>
                  <input class="form-check-input" type="radio" name="gender"  value="2">
                  <label class="form-check-label col-form-label-sm">Female</label>
                </div>
            </div>
              <div class="col-md-12">
                <label class="badge">Other details </label><br />
                <textarea name="other_details" class="form-control form-control-sm"></textarea>
            </div>
          </div>
        </div>
     

    </div>
     <div class="card-footer text-muted">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12" style="text-align: right;">
              <input type="submit" value="Add Renter" class="btn btn-primary btn-sm">
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="text-center" id="msg_box">
      @if(count($errors->all()))
      <ul>
        @php $i= 1; @endphp
        @foreach($errors->all() as $error)
        
        <li class="badge badge-pill badge-danger">{{ $i }}) {{ $error }}</li>
        @php $i++ @endphp
        @endforeach
      </ul>
      @endif

      @if($flash = session('failure_msg'))
      <p class="badge badge-pill badge-danger">{{ $flash }}</p>
      @endif
  </div>

</div>
@endsection