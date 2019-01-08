@extends('layouts.master')
@section('title', 'Permissions')
@section('content')
<div class="card mb-3">
	<div class="card-header">
		<div class="btn-group float-left">
			<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				File
			</button>
			<div class="dropdown-menu text-center">
				<a href="{{ route('admin.permission.create') }}">
					<i class="fa fa-plus"></i><span class="badge">Create new Permission</span></a>
				</div>
			</div>
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
							<th class="text-right"><span class="h6">#</span></th>
							<th><span class="h6">Permission</span></th>
							<th class="text-center"><span class="h6">Action</span></th>
						</tr>
					</thead>
					<tbody>
						@if(count($permissions) > 0)
							@foreach($permissions as $permission)
								<tr>
									<td align="right"><h6>{{ $permission->id }}</h6></td>
									<td><h6>{{ ucfirst($permission->perName) }}</h6></td>
									<td align="center">
										<a href="{{ route('admin.permission.edit',$permission->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-edit"></i></a>
										<a href="{{ route('admin.permission.destroy',$permission->id) }}" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							@endforeach
						@else
						<tr>
							<td colspan="3"><span class="h5">Data not found</span></td>
						</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<a href="{{ route('home') }}" title="Go Back">
	<i class="far fa-arrow-alt-circle-left"></i></a>
	@endsection
	@section('javascript')
	<script src="{{ asset('js/allotment_scripts/allotment.js') }}"></script>
	@endsection