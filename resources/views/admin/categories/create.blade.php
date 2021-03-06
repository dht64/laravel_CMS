@extends('layouts.admin')

@section('content')

	<h1>Create Category</h1>
	
	<div class="col-sm-6">
	
		{!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
			<div class="form-group">
				{!! Form::label('name', 'Category:') !!}
				{!! Form::text('name', null, ['class'=>'form-control']) !!}
			</div>
	
			<div class="form-group">
				{!! Form::submit('Create Category', ['class'=>'btn btn-primary col-sm-3']) !!}
			</div>
		{!! Form::close() !!}	
	
	</div>
	
	<div class="col-sm-6">
		
	</div>
	
@stop