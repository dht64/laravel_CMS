@extends('layouts.admin')

@section('content')

	@if(count($replies))
	<h1>Replies</h1>
	
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
		
		@foreach($replies as $reply)
			<tr>
				<td>{{$reply->id}}</td>
				<td>{{$reply->author}}</td>
				<td>{{$reply->email}}</td>
				<td>{{$reply->body}}</td>
				<td><a href="{{route('home.post', $reply->comment->post->slug)}}">View Post</a></td>
				<td>
					
					@if($reply->is_active == 1)
						{!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
							<input type="hidden" name="is_active" value="0">
							<div class="form-group">
								{!! Form::submit('Un-approve', ['class'=>'btn btn-warning btn-sm']) !!}
							</div>
						{!! Form::close() !!}
					
					@else
						{!! Form::open(['method'=>'PATCH', 'action'=>['CommentRepliesController@update', $reply->id]]) !!}
							<input type="hidden" name="is_active" value="1">
							<div class="form-group">
								{!! Form::submit('Approve', ['class'=>'btn btn-primary btn-sm']) !!}
							</div>
						{!! Form::close() !!}
					
					@endif
				</td>
				<td>
					{!! Form::open(['method'=>'DELETE', 'action'=>['CommentRepliesController@destroy', $reply->id]]) !!}
						<input type="hidden" name="is_active" value="1">
						<div class="form-group">
							{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
						</div>
					{!! Form::close() !!}
					
				</td>
			</tr>
			@endforeach
			
		</tbody>
	</table>
	</div>
	
	@else
	<h1 class="text-center">Oops! No Reply</h1>	
	
	@endif
	
@stop