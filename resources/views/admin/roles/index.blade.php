@extends('layouts.master')
@section('title', 'Roles')
@section('content')

<div class="card mb-3">
	<div class="card-header">
		<div class="btn-group float-left">
			<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				File
			</button>
			<div class="dropdown-menu text-center">
				<a href="{{ route('admin.roles.create') }}">
					<i class="fa fa-plus"></i><span class="badge">Create new Role</span></a>
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
							<th><span class="h6">ID</span></th>
							<th><span class="h6">Role</span></th>
							<th class="text-center"><span class="h6">Action</span></th>
						</tr>
					</thead>
					<tbody>
						@if(count($roles) > 0)
						@foreach($roles as $role)
						<tr>
							<td><span class="badge">{{ $role->id }}</span></td>
							<td><span class="badge">{{ $role->name }}</span></td>
							<td class="text-center">
								<a href="{{ route('admin.roles.edit',[$role->id])  }}" class="btn btn-sm btn-primary"><i class="fa fa-edit" title="Edit"></i></a>
								{!! Form::open(['route' => ['admin.roles.destroy',$role->id], 'method' => 'delete']) !!}
								{!! Form::submit('Delete',['class'=>'btn btn-sm btn-danger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
						@else
						<tr>
							<td colspan="3">
							There is not data<a href="{{ route('admin.roles.create') }}">
					Create new Role</a>
							</td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@endsection
	@section('javascript')
	<script src="{{ asset('js/allotment_scripts/allotment.js') }}"></script>
	@endsection