@extends('layouts.admin')

@section('content')

	@if(count($comments))
	<h1>Comments</h1>
	
	<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Author</th>
				<th>Email</th>
				<th>Body</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		
		@foreach($comments as $comment)
			<tr>
				<td>{{$comment->id}}</td>
				<td>{{$comment->author}}</td>
				<td>{{$comment->email}}</td>
				<td>{{$comment->body}}</td>
				<td><a href="{{route('home.post', $comment->post->slug)}}">View Post</a></td>
				<td>
					
					@if($comment->is_active == 1)
						{!! Form::open(['method'=>'PATCH', 'action'=>['AdminPostCommentsController@update', $comment->id]]) !!}
							<input type="hidden" name="is_active" value="0">
							<div class="form-group">
								{!! Form::submit('Un-approve', ['class'=>'btn btn-warning']) !!}
							</div>
						{!! Form::close() !!}
					
					@else
						{!! Form::open(['method'=>'PATCH', 'action'=>['AdminPostCommentsController@update', $comment->id]]) !!}
							<input type="hidden" name="is_active" value="1">
							<div class="form-group">
								{!! Form::submit('Approve', ['class'=>'btn btn-primary']) !!}
							</div>
						{!! Form::close() !!}
					
					@endif
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostCommentsController@destroy', $comment->id]]) !!}
						<input type="hidden" name="is_active" value="1">
						<div class="form-group">
							{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
						</div>
					{!! Form::close() !!}
					
				</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
	</div>
	
	@else
	<h1 class="text-center">Oops! No Comments</h1>	
	
	@endif
	
@stop