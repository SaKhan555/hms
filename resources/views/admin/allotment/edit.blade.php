@extends('layouts.master')
@section('title', 'Edit Allotment')
@section('content')
<div class="container">
  <div class="card" style="background-color: #ecececf2;">
    <div class="card-header">
      <span class="h6">Allotment</span> 
      <div class="float-right">
            <a href="{{ route('admin.allotment') }}" class="badge badge-danger" title="Close">
              <span class="fa fa-times"></span>
            </a>
         </div>

    </div>
    <div class="card-body" style="background: #f6f6f64d !important;">
      <form method="post" action="{{ route('admin.allotment.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-4">
              <label class="h6">Room: </label>
                <select name="room" class="form-control form-control-sm" onchange="room_stauts(this);">
                @foreach($rooms as $room)
                  <option value="{{ $room->id }}" {{ ($RenterRoom->room_id == $room->id) ? 'selected' : '' }}>{{ ucfirst($room->room_number) }}</option>
                  @endforeach
              </select>
            </div>
           
            <div class="col-md-8">
              <label class="h6">Renter: </label>
                <select name="renter[]" class="form-control form-control-sm select2me" multiple>
                @foreach($renters as $renter)
                <option value="{{ $renter->id }}" {{ ($RenterRoom->renter_id == $renter->id) ? 'selected' : '' }}>{{ ucfirst($renter->name) }}</option>
                @endforeach
              </select>
   </div>
          </div>
          <div class="form-row">
              <div class="col-md-4">
                <label class="h6">Allotment Date: </label>
                <input id="datepicker" class="form-control form-control-sm" placeholder="dd/mm/yyyy"  type="text" name="date" autocomplete="off">    
              </div>
            </div>
          
        </div>
    </div>
     <div class="card-footer text-muted">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12" style="text-align: right;">
            <div class="btn-group btn-group-sm">
            <a class="btn btn-danger" href="{{ route('admin.allotment') }}" title="Cancel">Cancel</a>
            <button type="submit" class="btn btn-primary" title="Submit">Submit</button>
          </div>
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
        
        <li class="badge badge-pill badge-warning">{{ $i }}) {{ $error }}</li>
        @php $i++ @endphp
        @endforeach;
      </ul>
      @endif

      @if($flash = session('failure_msg'))
      <p class="badge badge-pill badge-danger">{{ $flash }}</p>
      @endif
  </div>

</div>
<a href="{{ route('admin.allotment') }}" title="Go Back">
        <i class="fas fa-arrow-circle-left"></i></a>
@endsection

@section('javascript')
        <script src="{{ asset('js/allotment_scripts/allotment.js') }}"></script>
@endsection