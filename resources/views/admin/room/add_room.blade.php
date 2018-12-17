@extends('layouts.master')
@section('title', 'Add new Room')
@section('content')
<div class="container">
  <div class="card card-login mx-auto mt-5">
    <div class="card-header" style="padding: 0px;">
      <i class="fa fa-plus">Add new room</i>
          <div class="float-right">
      <a href="{{ route('room.room') }}" class="badge badge-danger rounded-circle " title="Close">
        <i class="fa fa-times"></i></a>
      </div>
    </div>
    <div class="card-body" style="background: #f6f6f64d !important;">
      <form method="post" action="{{ route('room.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label class="h6">Room number: </label>
              <input id="room_number" class="form-control form-control-sm" placeholder="Room Number" required="required" autofocus="room_number" type="text" name="room_number">
            </div>
          </div>
          <div class="form-row" style="margin-top: 10px;">
            <div class="col-md-12">
              <label class="h6">Room Type: </label>
              <input id="room_type" class="form-control form-control-sm" placeholder="Room Type" required="required" type="text" name="room_type">
            </div>
          </div>

          <div class="form-row" style="margin-top: 10px;">
            <div class="col-md-12">
              <label class="h6">Number of Beds: </label>
              <input id="beds" class="form-control form-control-sm" placeholder="Number of Beds" required="required" type="text" name="beds">
            </div>
          </div>
          <div class="form-row" style="margin-top: 10px;">
            <div class="col-md-12">
              <label class="h6">Rent: </label>
              <input id="rent" class="form-control form-control-sm" placeholder="Rent" required="required" type="text" name="rent">
            </div>
          </div>
        </div>
        <div class="form-row text-right" style="margin-top: 10px;">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-sm">Add Room</button>
          </div>
        </div>
      </form>

      <div class="text-center" id="msg_box">
        @if(count($errors->all()))
        <ul>
          @foreach($errors->all() as $error)
          <li style="color: #fef4f4;background: #535050;">{{ $error }}</li>
          @endforeach
        </ul>
        @endif

        @if($flash = session('failure_msg'))
        <p style="color: #fef4f4;background: #535050;">{{ $flash }}</p>
        @endif

      </div>
    </div>
  </div>
        <a href="{{ route('room.room') }}" title="Go Back">
        <i class="fas fa-arrow-circle-left"></i></a>
</div>
@endsection