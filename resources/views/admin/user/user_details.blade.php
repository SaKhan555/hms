@extends('layouts.master')
@section('title', 'Renter Details')
@section('content')

<div class="card  bg-light mb-3">
  <div class="card-header">
    <div class="float-left"><span class="h6">Renter Details</span></div>
    <div class="float-right">
      <a href="{{ route('admin.user.user') }}" class="badge rounded-circle badge-danger" title="Close">
        <i class="fa fa-times"></i>
      </a>
    </div>
  </div>
  <div class="card-body" id="print_div">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <span class="h6">Username: {{ ucfirst($user->name) }}</span>   
        </div>
        <div class="col-md-4">
          <span class="h6">Email: </span> <span class="badge">{{ $user->email }}</span>   
        </div>
        <div class="col-md-4">
          <span class="h6">Created at: </span> <span class="badge">{{ Carbon\Carbon::parse($user->created_at)->toDayDateTimeString() }}</span>   
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated {{ Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}
  </div>

</div>
<button type="button" class="btn btn-info btn-sm" onclick="PrintElem('print_div')" style="float: right;" /><i class="fas fa-print"></i> </button>
  <a href="{{ route('admin.user.user') }}" title="Back">
        <i class="fas fa-arrow-circle-left"></i>
  </a>
@endsection