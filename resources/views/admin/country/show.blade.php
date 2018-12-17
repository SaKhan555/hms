@extends('layouts.master')
@section('title', 'Renter Details')
@section('content')
<style type="text/css" media="screen">
.col-md-4 {
  padding: 20px 12px;
}

#show_det strong {
  border-bottom: 2px solid lightgrey !important;
} 
</style>
<div class="card  bg-light mb-3" id="print_div">
  <div class="card-header" style="padding: 0px;">

    <div class="float-left">

  <div class="btn-group">
  <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu text-center">
        <a href="{{ route('renter.edit',$si_renter->id)  }}" class="badge" title="Edit {{ $si_renter->name }}">
        <i class="fa fa-edit"> </i>
        Edit
      </a><br />
      <a href="javascript:confirm(){{ route('renter.destroy',$si_renter->id)  }}" class="badge" title="Delete {{ $si_renter->name }}">
        <i class="fa fa-trash"></i> Delete</a><br />

        <a href="javascript:PrintElem('print_div')" class="badge" />
        <i class="fas fa-print"></i> Print
      </a>

  </div>
</div>
 </div>

    <div class="float-right">

      <a href="{{ route('renter') }}" class="badge badge-danger rounded-circle" title="Close"><i class="fa fa-times"></i></a>
    </div>
</div>
  <div class="card-body" id="show_det">
    <div class="col-md-12">
      <div class="row" style="padding: 30px 0px;">
        <div class="col-md-4">
          <img src="{{ asset("uploads/images/".$si_renter->photo_url)  }}" class="rounded float-left" style="width: 200px;height: 200px;">
        </div>
        <div class="col-md-4">
          <h3><span class="display-6" style="padding: 0px 50px;">{{ $si_renter->name }}</span></h3>
        </div>
        <div class="col-md-4">
          <img class="rounded float-right" src="{{ asset("uploads/images/".$si_renter->nic_copy)  }}" alt="" style="width: 200px;">
        </div>
      </div>
      <div class="row">
        <table class="table table-striped  table-sm  table-bordered">
          <tbody>
            <tr>
              <td scope="col"><span class="badge">Father Name: </span></td>
              <td scope="col"><span class="badge">{{ $si_renter->father_name }}</span></td>
              <td scope="col"><span class="badge">Date of birth:  </span></td>
              <td scope="col"><span class="badge"><?php $date = date_create($si_renter->dob); ?> {{ date_format($date,"d-m-Y") }}</span></td>
              <td><span class="badge">Mobile Number: </span></td>
              <td><span class="badge">{{ $si_renter->contact }}</span></td>
            </tr>
            <tr>
              <td scope="col"><span class="badge">Nic Number: </span></td>
              <td scope="col"><span class="badge">{{ $si_renter->nic_number }}</span></td>
              <td scope="col"><span class="badge">Profession: </span></td>
              <td scope="col"><span class="badge">{{ $si_renter->profession }}</span></td>
              <td><span class="badge">Email: </span></td>
              <td><span class="badge">{{ $si_renter->email }}</span></td>
            </tr>
            <tr>
              <td scope="col"><span class="badge">Gender:</span>  </td>
              <td scope="col"><span class="badge">{{ ($si_renter->gender == 1) ? 'male':'female' }}</span></td>
              <td scope="col"><span class="badge">Marital Status:</span> </td>
              <td scope="col"><span class="badge">{{ $si_renter->marital_status }}</span></td>
              <td><span class="badge">Address: </span> </td>
              <td><span class="badge">{{ $si_renter->address }}</span></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-md-12">
          <span class="badge">Other Details: {{ $si_renter->other_details }}</span>   
        </div>
      </div>
      <div class="row" style="float: right;">
        <table class="table-sm" style="color: #5a5959;">
          <tr>
            <td><strong class="badge"> Added by:  </strong></td>
            <td><span class="badge badge-light">{{ $si_renter->user->name }}</span></td>
          </tr>
          <tr>
            <td><strong class="badge">  Added on: </strong></td>
            <td><span class="badge badge-light">{{ Carbon\Carbon::parse($si_renter->added_on)->toDayDateTimeString() }}</span></td>
          </tr>
        </table>         
      </div>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated {{ Carbon\Carbon::parse($si_renter->added_on)->diffForHumans() }}
  </div>

</div>

<a href="{{ route('renter') }}"><i class="far fa-arrow-alt-circle-left"></i></a>


@endsection
