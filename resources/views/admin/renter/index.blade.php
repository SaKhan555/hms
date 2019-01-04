@extends('layouts.master')
@section('title', 'Renter Details')
@section('content')
<div class="card mb-3">
  <div class="card-header" style="padding: 0px;">
    <div class="float-left">

      <div class="btn-group">
        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          File
        </button>
        <div class="dropdown-menu text-center">
          <a href="{{ route('renter.create') }}" class="badge">Add New</a><br />
          <a href="{{ route('renter.export') }}" class="badge">Export file</a>
        </div>
      </div>
    </div>
    <div class="float-right">
      <a href="{{ route('home') }}" class="badge badge-danger rounded-circle " title="Close">
        <i class="fa fa-times"></i></a>
      </div>
      @if($flash = session('success_msg'))
      <span class="badge badge-pill badge-success" style="margin: 11px 66px;">{{ $flash }}</span>
      @endif
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th><span class="badge">#</span></th>
              <th><span class="badge">Name</span></th>
              <th><span class="badge">Room Number</span></th>
              <th><span class="badge">Contact</span></th>
              <th><span class="badge">Date of birth</span></th>
            </tr>
          </thead>
          <tbody id="tbRenter">
            @php $i = 1 @endphp
            @if(count($renters) > 0)
            @foreach($renters as $renter)
            <tr>
              <td><span class="badge">{{ '0'.$i }}</span></td>
              <td>

                <li class="dropdown list-unstyled">
                  <a class="dropdown-toggle badge" data-toggle="dropdown" href="#">{{ $renter->name }}
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li>            <a href="{{ route('renter.show',$renter->id) }}" class="dropdown-item badge" title="Click to view details"><i class="fa fa-eye"></i> View</a> </li>
                      <li><a href="{{ route('renter.edit',$renter->id)  }}" class="dropdown-item badge" title="Edit {{ $renter->name }}"><i class="fa fa-edit"></i> Edit</a></li>
                      <li> <button type="button" class="dropdown-item badge btnDelete" data-id="{{ $renter->id }}" title="Delete {{ $renter->name }}" style="cursor: pointer;"><i class="fa fa-trash"></i> Delete</button></li>
                    </ul>
                  </li>
                </td>
                <td><span class="badge">
                  @if(count($renter->rooms) > 0)
                  @foreach($renter->rooms as $room)
                      {{ $room->room_number }}
                  @endforeach
                  @else
                    Not assigned yet
                  @endif
                </span></td>
                <td><span class="badge">{{ $renter['contact'] }}</span></td>
                <td><span class="badge">{{ Carbon\Carbon::parse($renter['dob'])->toFormattedDateString() }}</span></td>
                <tr>
                  @php $i++ @endphp
                  @endforeach
                  @else
                  <tr>
                    <td colspan="5" class="text-center">Data not found!</td>
                  </tr>
                @endif
                </tbody>
              </table>
            </div>
            <a href="{{ route('home') }}" title="Back">
              <i class="far fa-arrow-alt-circle-left"></i>
            </a>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        @endsection
        @section('javascript')
        <script src="{{ asset('js/renter_scripts/renter.js') }}"></script>
        @endsection