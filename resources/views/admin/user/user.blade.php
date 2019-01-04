@extends('layouts.master')
@section('title', 'Users Details')
@section('content')
<div class="card mb-3">
  <div class="card-header">
    <div class="btn-group float-left">
      <button type="button" class="btn btn-secondary btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
        <span class="caret"></span>
        File
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item badge" href="{{ route('admin.user.add_user') }}"><span class="fa fa-plus"></span>  Add new user</a>
      </div>
    </div>
    @if($flash = session('success_msg'))
    <span class="badge badge-pill badge-success" style="margin: 11px 66px;">{{ $flash }}</span>
    @endif
    <div>
      <a class="badge badge-danger float-right rounded-circle" href="{{ route('home') }}"><span class="fa fa-times"></span></a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-sm table-bordered">
        <thead class="thead-light">
          <tr>
            <th><span class="h6">#</span> </th>
            <th><span class="h6">User</span> </th>
            <th><span class="h6">Email</span> </th>
            <th><span class="h6">Role</span> </th>
          </tr>
        </thead>
        <tbody>
          @if(count($users) > 0)
          <?php $number = 1;  ?>
          @foreach($users as $user)
          <tr>
            <td><span class="badge">{{ $number }} </span> </td>
            <td>
              <div class="btn-group dropright"> 
                <a href="#" class="badge dropdown-toggle" data-toggle="dropdown">
                  <span>{{ ucfirst($user->name) }}</span>
                </a>
                <div class="dropdown-menu" style="background-color: #dadada;">
                  <a href="{{ route('admin.user.user_details',['id'=>$user->id]) }}" class="badge"><i class="fa fa-eye"></i> View</a><br />
                  <a href="{{ route('admin.user.edit_user',['id'=>$user->id]) }}" class="badge"><i class="fa fa-edit"></i> Edit</a><br />
                  <a href="" class="badge"><i class="fa fa-trash"></i> Delete</a>
                </div>
              </div></td>
              <td>
                <a href="{{ route('admin.user.user_details',['id'=>$user->id]) }}" class="badge"> {{ $user->email }}</a>

              </td>
              <td>
                <ul>
                @foreach($user->roles as $role)
                 <li><span class="badge">{{ $role->name }}</span></li> 
                @endforeach
                </ul>
              </td>
            </tr>

            <?php $number++; ?>

            @endforeach
            @else
            <tr>
              <td colspan="4">Data not found</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
    <div class="card-footer small text-muted">Last updated on
{{ $last_updated }}
    </div>
  </div>
  <a href="{{ route('home') }}" title="Go Back">
    <i class="fas fa-arrow-circle-left"></i></a>
    @endsection