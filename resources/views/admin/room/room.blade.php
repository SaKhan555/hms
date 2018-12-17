@extends('layouts.master')
@section('title', 'Room Details')
@section('content')
<div class="card mb-3">
  <div class="card-header" style="padding: 0px;">
    @if($flash = session('success_msg'))
    <span class="badge badge-pill badge-success" style="margin: 11px 66px;">{{ $flash }}</span>
    @endif
    <div class="btn-group">
      <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        File
      </button>

      <div class="dropdown-menu text-center">
        <h6 class="dropdown-header">Rooms</h6>
        <a href="{{ route('room.add_room') }}" class="badge"><i class="fa fa-plus"></i> Add New</a>
      </div>
    </div>
    <div class="float-right">
      <a href="{{ route('home') }}" class="badge badge-danger rounded-circle " title="Close">
        <i class="fa fa-times"></i></a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th><span class="badge">Room number</span></th>
              <th><span class="badge">Room type</span></th>
              <th><span class="badge">Number of beds</span></th>
              <th><span class="badge">Rent</span></th>
              <th><span class="badge">Added By</span></th>
              <th><span class="badge">Updated By</span></th>

            </tr>
          </thead>
          <tbody>
            @php
            $total_amount = 0;
            $total_beds = 0;
            @endphp
            @foreach($rooms as $room)

            @php
            $total_amount += $room->rent; 
            $total_beds += $room->beds; 
            @endphp
            <tr>
              <td>
                <div class="btn-group dropright"> 
                  <a href="#" class="badge dropdown-toggle" data-toggle="dropdown">
                    <span>{{ ucfirst($room->room_number) }}</span>
                  </a>
                  <div class="dropdown-menu">
                    <a href="{{ route('room.edit_room',['id'=>$room->id]) }}" class="badge"><i class="fa fa-edit"></i> Edit</a><br />
                    <a href="{{ route('room.remove_room',['id'=>$room->id]) }}" class="badge"><i class="fa fa-trash"></i> Delete</a>
                  </div>
                </div>
              </td>
              <td><span class="badge">{{ $room->room_type }}</span></td>
              <td><span class="badge">{{ $room->beds }}</span></td>
              <td><span class="badge">{{ $room->rent }}</span></td>
              <td><span class="badge">{{ $room->user->name }}</span></td>
              <td><span class="badge">
                {{ $room->user_2->name}}
              </span></td>
            </tr>
            @endforeach
            <tr>
              <td colspan="2"><span class="badge badge-secondary">Total: </span></td>
              <td><span class="badge badge-secondary">{{ number_format($total_beds) }}</span></td>
              <td colspan="4"><span class="badge badge-secondary">{{ number_format($total_amount,2) }}</span></td> 
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted badge">Updated yesterday at 11:59 PM</div>
  </div>
             <a href="{{ route('home') }}" title="Go Back">
        <i class="fas fa-arrow-circle-left"></i></a>
  @endsection