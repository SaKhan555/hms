@extends('layouts.master')
@section('title', 'Allotment Details')
@section('content')
<div class="card mb-3">
  <div class="card-header">
          <div class="btn-group float-left">
        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          File
        </button>
        <div class="dropdown-menu text-center">
          <a href="{{ route('admin.allotment.create') }}">
            <i class="fa fa-plus"></i><span class="badge">Allot Room</span></a>
        </div>
      </div>
  		@if($flash = session('success_msg'))
                <span class="badge badge-pill badge-success" style="margin: 11px 66px;">{{ $flash }}</span>
         @endif
         <div class="float-right">
            <a href="{{ route('home') }}" class="badge badge-danger" title="Close">
              <span class="fa fa-times"></span>
            </a>
         </div>
</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th><span class="h6">Room Number</span></th>
            <th><span class="h6">Allotment Details</span></th>
            <th class="text-center"><span class="h6">Action</span></th>
          </tr>
        </thead>
        <tbody>
          @php $i = 1 @endphp
          @if(count($rooms->all()))
          @foreach($rooms as $si_rr)
          <tr>
            <td><span class="badge">{{ '0'.$i }}</span></td>
              <td><h5>{{ ucfirst($si_rr->room_number) }}</h5></td>
              <td><span class="badge">
                <p style="border-bottom: 1px dotted grey;">Size: ({{ count($si_rr->allotedRenters) }})</p>
                @if(count($si_rr->allotedRenters) > 0)
                  @foreach($si_rr->allotedRenters as $allotedRenter)
                    <p style="border-bottom: 1px dotted grey;">Alloted to: {{ $allotedRenter->name }} <span>----------</span> DoA: {{ Carbon\Carbon::parse($allotedRenter->pivot->date)->toFormattedDateString() }}</p>
                      
                  @endforeach
                  @else
                  Empty
                @endif
              </span></td>
            <td class="text-center">
              <a href="{{ route('admin.allotment.edit',[$si_rr->id])  }}" class="btn btn-sm btn-info rounded-circle"><i class="fa fa-edit" title="Edit"></i></a>
              <a href="{{ route('admin.allotment.destroy',[$si_rr->id]) }}" class="btn btn-sm btn-danger rounded-circle"><i class="fa fa-trash" title="Delete"></i></a>
            </td>
            <tr>
              @php $i++ @endphp
              @endforeach
              @else
              <tr>
                <td colspan="7"><i>there is no record in the list.</i><a href="{{ route('admin.allotment.create') }}"> <span class="h6">click to add</span></a>
             
                </td>
              </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
 @endif
@endsection