@extends('layouts.admin')

@section('content')
	<h1>Create User</h1>
	
	{!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store']) !!}
	<div class="form-group">
		{!! Form::label('name', 'Title:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('email', 'Email:') !!}
		{!! Form::text('email', null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('role_id', 'Role ID:') !!}
		{!! Form::select('role_id', [''=>'Choose Options'] + $roles, null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('status', 'Status:') !!}
		{!! Form::select('status', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', ['class'=>'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
	</div>

	{!! Form::close() !!}	
@stop