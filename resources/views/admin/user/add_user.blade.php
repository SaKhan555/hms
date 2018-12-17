@extends('layouts.master')
@section('title', 'Add User')
@section('content')
<div class="container">
  <div class="card mx-auto">
    <div class="card-header">
      <i class="fa fa-plus"></i> <span class="h5">Add new user</span> 
      <a class="badge badge-danger float-right rounded-circle" href="{{ route('admin.user.user') }}" title="Close"><span class="fa fa-times"></span></a>
    </div>
    <div class="card-body" style="background-color: #f3f3f3;">
      <form method="post" action="{{ route('admin.user.store_user') }}">
        {{ csrf_field() }}
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label class="h6">Name: </label>
              <input type="text"name="name" class="form-control form-control-sm" autofocus="name"/>
            </div>              
            <div class="col-md-6">
              <label class="h6">Email:</label>
              <input type="email" name="email" class="form-control form-control-sm"/>    
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label class="h6">Password:</label>
              <input type="password" name="password"  class="form-control form-control-sm"/>
            </div>
            <div class="col-md-6">
              <label class="h6">Confirm Password:</label>
              <input type="password" name="password_confirmation" class="form-control form-control-sm"/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12 text-right">
            <div class="btn-group btn-group-sm">
              <a class="btn btn-danger" href="{{ route('admin.user.user') }}" title="Cancel">Cancel</a>
              <button type="reset" class="btn btn-warning" title="Reset">Reset</button>
              <button type="submit" class="btn btn-primary" title="Submit">Submit</button>
            </div>
          </div>
        </div>

        <div class="text-center" id="msg_box">
          @if(count($errors->all()))
          <ul>
            @foreach($errors->all() as $error)
            <li class="badge badge-warning">{{ $error }}</li>
            @endforeach
          </ul>
          @endif
          @if($flash = session('failure_msg'))
          <p class="badge badge-dagner">{{ $flash }}</p>
          @endif
        </div> 
      </form>
    </div>
  </div>
</div>
@endsection