@extends('layouts.master')
@section('title', 'Permission')
@section('content')

<div class="card mb-3">
	<div class="card-header">
		<div class="float-left">
			<h6>Permissions</h6>
		</div>
		<div class="float-right">
			<a href="{{ route('admin.permission.index') }}" class="badge badge-danger" title="Close">
				<span class="fa fa-times"></span>
			</a>
		</div>
	</div>
	<div class="card-body">
		{!! Form::open(['route' => 'admin.permission.store', 'method' => 'post']) !!}
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					{!! Form::label('Permssion', 'Permission Name: ', ['class' => 'label h6']) !!}
					{!! Form::text('perName',null,['class'=>'form-control','placeholder' => 'Permission']) !!}
					<hr />
					<div class="text-right">
						{!! Form::reset('Reset',['class'=>'btn btn-sm btn-danger']) !!}
						{!! Form::submit('Submit',['class'=>'btn btn-sm btn-success']) !!}
					</div>
				</div>
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>
<a href="{{ route('admin.permission.index') }}" title="Go Back">
	<i class="far fa-arrow-alt-circle-left"></i></a>
	@endsection
{{-- @section('javascript')
<script src="{{ asset('js/permession/permission.js') }}"></script>
@endsection --}}