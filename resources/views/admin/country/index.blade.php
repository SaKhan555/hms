@extends('layouts.master')
@section('title', 'Country')
@section('content')
<div class="card">
  <div class="card-header" style="padding: 5px;">
    <div class="float-left"> 
        <h5> Countries </h5>
    </div>
    <div class="float-right">
      <a href="{{ route('home') }}" class="badge badge-danger rounded-circle" title="Close">
      <span class="fa fa-times"></span>
    </a>
    </div>
    
  </div>
  <div class="card-body">
    <div class="row">
     <div class="col-md-4">
  <div class="card">
  <div class="card-header bg-light" style="padding: 5px;">
    <i class="fa fa-plus"></i>
    <i class="badge">Add new Country</i>
  </div>
  <div class="card-body">
    <div class="row">    
      <div class="col-md-12">
      <div id="the-basics">
  <input class="typeahead form-control form-control-sm" type="text" placeholder="States of USA">
  <input type="hidden" value="{{ $countryList }}" id="hiddenCountryList">
  <input type="hidden" id="typeaheadValue">
</div>
    </div>
  </div>

      <form action="javascript:add_country();">
        {{ csrf_field() }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label class="badge" for="country">Country: </label>
              <input id="country" class="form-control form-control-sm" placeholder="Country"  autofocus="country" type="text" name="country" required autocomplete="off">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-12 text-right">
              <button type="submit" class="btn btn-primary btn-sm" id="btnAdd">Submit</button>
            </div>
          </div>
        </div>
    </form>

  </div>
</div>
</div>

<div class="col-md-8">
  <div class="card">
  <div class="card-header bg-light" style="padding: 0px;">
    <div class="float-left">
       <i class="fa fa-eye"></i><i class="badge">Countries</i>
    </div>
       <div class="float-right">
          <button type="button" id="refresh" class="btn  badge badge-primary rounded-circle" title="Reload Data"><i class="fas fa-sync"></i></button>
       </div>
  </div>
  <div class="card-body">
    <div class="table-wrapper-scroll-y" style="
  display: block;
  max-height: 280px;
  overflow-y: auto;
  -ms-overflow-style: -ms-autohiding-scrollbar;
">
<table class="table table-hover table-sm table-bordered">
  <thead class="thead-light">
    <tr>
      <th><span class="badge">Country</span> </th>
      <th><span class="badge">Created by</span> </th>
      <th><span class="badge">Created on</span> </th>
    </tr>
  </thead>
  <tbody id="tbCountry">
       @if(count($countries) > 0)
    @foreach ($countries as $country)
    <tr class="table-light">
        <td>
                <li class="dropdown list-unstyled">
                  <a class="dropdown-toggle badge" data-toggle="dropdown" href="#">{{ (strlen($country->country) > 3) ? ucfirst($country->country) : strtoupper($country->country) }}
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#" class="dropdown-item badge btnEdit" data-id='{{ $country->id }}' data-value='{{ $country->country }}' title="Edit"><i class="fa fa-edit"></i> Edit</a></li>
                      <li> <button type="button" class="dropdown-item badge btnDelete" data-id="{{ $country->id }}" title="Delete" style="cursor: pointer;"><i class="fa fa-trash"></i> Delete</button></li>
                    </ul>
                  </li>
        </td>
        <td><span class="badge">{{ $country->user->name }}</span></td>
        <td><span class="badge">{{ $country->created_at->diffForHumans() }}</span></td>
    </tr>

    @endforeach
     @else
    <tr class="table-light">
      <td> <a href="#"><span class="badge" style="color: red;">There is no record.</span></a>
      </td>
    </tr>
    @endif
  </tbody>
</table>
</div>
  </div>
</div>

</div> 


    </div>
  </div>
</div>
        @endsection
        @section('javascript')
        <script src="{{ asset('js/country_scripts/country.js') }}"></script>
        @endsection