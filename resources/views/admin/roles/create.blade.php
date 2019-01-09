@extends('layouts.master')
@section('title', 'Roles')
@section('content')

<div class="card mb-3">
	<div class="card-header">
		<div class="float-right">
			<a href="{{ route('admin.roles.index') }}" class="badge badge-danger" title="Close">
				<span class="fa fa-times"></span>
			</a>
		</div>
	</div>
	<div class="card-body">
		{!! Form::open(['route' => 'admin.roles.store', 'method' => 'post']) !!}
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<div class="col-md-12">
						{!! Form::label('Role', 'Role Name: ', ['class' => 'label h6']) !!}
						{!! Form::text('name',null,['class'=>'form-control','placeholder' => 'Role']) !!}
					</div>
					<hr />
					<div class="col-md-12 text-right">
						{!! Form::submit('Submit',['class'=>'btn btn-sm btn-success']) !!}
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				{!! Form::label('permissions', 'Select Permissions: ', ['class' => 'label h6']) !!}
				{!! Form::select('permissions[]',$permissions,null,['class'=>'form-control select2me','multiple'=>'multiple']) !!}
				</div>
			</div>
		</div>
		{{ Form::close() }}

	</div>

</div>
  <a href="{{ route('admin.roles.index') }}" title="Go Back">
    <i class="far fa-arrow-alt-circle-left"></i></a>
@endsection
@section('javascript')
<script src="{{ asset('js/allotment_scripts/allotment.js') }}"></script>
@endsection