@extends('layouts.master')
@section('title', 'Payment Details')
@section('content')
<div class="card mb-3">
  <div class="card-header" style="padding: 0px;">
  	<div style="float: left"><span class="h6">Payments</span></div>
  		@if($flash = session('success_msg'))
                <span class="badge badge-pill badge-success msg" style="margin: 11px 66px;">{{ $flash }}</span>
         @endif
  	<div style="float: right;padding: 4px;">
  		<a href="{{ route('payment.create') }}" class="btn btn-outline-success btn-sm rounded-circle">
      <i class="fa fa-plus"></i>  
      </a>
  	</div>
</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-light">
          <tr>
            <th><span class="badge badge-light">#</span></th>
            <th><span class="badge badge-light">Occupant</span></th>
            <th><span class="badge badge-light">Payment</span></th>
            <th><span class="badge badge-light">Payment for</span></th>
            <th style="width: 150px;" class="text-center"><span class="badge badge-light">Actions</span></th>
          </tr>
        </thead>
        <tbody>
          @php $i = 1 @endphp
          @if(!empty($payments))
          @php $total_amount = 0; @endphp
          @foreach($payments as $payment)
          @php $total_amount += $payment->payment  @endphp
          <tr>
            <td><span class="badge badge-light">{{ '0'.$i }} </span></td>
              <td><a href="{{ route('payment.show',['id'=>$payment->id]) }}" class="badge"> {{ $payment->renter->name }}</a> </td>
              <td><span class="badge badge-light">{{ number_format($payment->payment, 2) }}</span></td>
              <td><span class="badge badge-light">{{ Carbon\Carbon::parse($payment->date)->toFormattedDateString() }}
              </span>
              </td>
            <td class="text-center">
              <a href="{{ route('payment.edit',$payment->id)  }}" class="btn btn-outline-primary btn-sm rounded-circle"><i class="fa fa-edit" title="Edit"></i></a>
              <a href="{{ route('payment.destroy',['id'=>$payment->id]) }}" class="btn btn-outline-danger btn-sm rounded-circle"><i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <tr>
              @php $i++ @endphp
              @endforeach
              @else
              <tr>
                <td colspan="7" align="center">Data not found</td>
              </tr>
              @endif
              <tr>
                <td class="text-left"><span class="badge badge-light">Total:</span> </td>
                <td></td>
                <td><span class="badge badge-light">{{ number_format($total_amount,2) }}</span></td>
                <td></td>
                <td></td>
              </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection