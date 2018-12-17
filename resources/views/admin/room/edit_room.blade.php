@extends('layouts.master')
@section('title', 'Edit Room')
@section('content')
<div class="container">
      <div class="card card-login mx-auto mt-5" style="margin-top: 0rem !important;">
        <div class="card-header" style="height: 36px !important;">Room Edit</div>
        <div class="card-body" style="background: #f6f6f64d !important;">
          <form method="post" action="{{ route('room.update_room', ['id' => $rooms->id]) }}">
            {{ csrf_field() }}
              <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label>Room number</label>
                    <input id="room_number" class="form-control form-control-sm" placeholder="Room Number" required="required" autofocus="room_number" type="text" name="room_number" value="{{ $rooms->room_number }}">
                </div>
              </div>
                <div class="form-group">
                <div class="form-row">
                  <div class="col-md-12">
                  <label>Room Type</label>
                    <input id="room_type" class="form-control form-control-sm" placeholder="Room Type" required="required" type="text" name="room_type" value="{{ $rooms->room_type }}">
                </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label>Number of Beds</label>
                <input id="beds" class="form-control form-control-sm" placeholder="Number of Beds" required="required" type="text" name="beds" value="{{ $rooms->beds }}">
                </div>
              </div>
            </div>
                <div class="form-group">
                <div class="form-row">
                <div class="col-md-12">
                  <label for="rent">Rent</label>
                <input id="rent" class="form-control form-control-sm" placeholder="Rent" required="required" type="text" name="rent" value="{{ $rooms->rent }}">
                </div>
              </div>
              </div>
                                          <div class="form-group">
                <div class="form-row">
                <div class="col-md-12" style="text-align: center;">
<input type="submit" class="btn-sm" value="Update">
                </div>
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
    </div>
@endsection