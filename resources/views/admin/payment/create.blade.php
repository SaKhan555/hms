@extends('layouts.master')
@section('title', 'Add Payment')
@section('content')
<div class="container">

  <div class="card">
    <div class="card-header">
      <h6>Add new Payment</h6> 
    </div>

    <div class="card-body">

      <form method="post" action="{{ route('payment.store') }}">
        {{ csrf_field() }}

        <div class="form-group">
          <div class="form-row">

            <div class="col-md-4">
              <label class="badge badge-light">Allotte: </label>
              <select name="occupant" class="form-control form-control-sm" id="occupant">
                <option value="" selected disabled="true">Select a occupant</option>
                @foreach($renters as $renter)
                <option value="{{ $renter->id }}">{{ $renter->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-4">
              <label class="badge badge-light">Payment: </label>
              <input type="number" name="payment" class="form-control form-control-sm" placeholder="Payment">
            </div>

            <div class="col-md-4">
              <label class="badge badge-light">Payment for: </label>
              <input id="datepicker" class="form-control form-control-sm" placeholder="Month-Year"  type="text" name="date" autocomplete="off">    
            </div>

          </div>
        </div>
      </div>

      <div class="card-footer text-muted">
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-10" style="float: left;">
              @if(count($errors->all()))
              <ul>
                @php $i= 1; @endphp
                @foreach($errors->all() as $error)
                <li class="badge badge-pill badge-danger msg">{{ $i }}) {{ $error }}</li>
                @php $i++ @endphp
                @endforeach
              </ul>
              @endif
            </div>
            <div class="col-md-2" style="float:right;">
              <input type="submit" value="Add Payment">
            </div>
          </div>
        </div>
      </div>

    </form>

    <div class="text-center" id="msg_box">
      @if($flash = session('failure_msg'))
      <p class="badge badge-pill badge-danger msg">{{ $flash }}</p>
      @endif
    </div>
  </div>
<script src="{{ asset('js/paymentScripts/payment.js') }}" type="text/javascript"></script>
  @endsection
