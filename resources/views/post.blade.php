@extends('layouts.blog-post')

@section('content')
	
	<!-- Blog Post -->

		<!-- Title -->
		<h1>{{$post->title}}</h1>

		<!-- Author -->
		<p class="lead">
			by <a href="#">{{$post->user->name}}</a>
		</p>

		<hr>

		<!-- Date/Time -->
		<p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>

		<hr>

		<!-- Preview Image -->
		<img class="img-responsive" src="{{URL::asset($post->photo->file)}}" alt="">

		<hr>

		<!-- Post Content -->
		<!--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>-->
		<p>{{filter_var($post->body,FILTER_SANITIZE_STRING)}}</p>

		<hr>
		
		@if(Session::has('comment_message'))
			<div class="bg-info">{{session('comment_message')}}</div>
		@endif

		<!-- Blog Comments -->
		
	@if(Auth::check()) 
		<!-- Comments Form -->
		<div class="well">
			<h4>Leave a Comment:</h4>
			
			{!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
			<input type="hidden" name="post_id" value="{{$post->id}}">
			<div class="form-group">
				{!! Form::label('body', ' ') !!}
				{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
			</div>
	
			<div class="form-group">
				{!! Form::submit('Submit Comment', ['class'=>'btn btn-primary']) !!}
			</div>
			{!! Form::close() !!}	
			<!--<form role="form">
				<div class="form-group">
					<textarea class="form-control" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>-->
		</div>

		<hr>
	@endif
		
		<!-- Posted Comments -->
		
	@if(count($comments))
		@foreach($comments as $comment)
			<!-- Comment -->
			<div class="media">
				<a class="pull-left" href="#">
					<img class="media-object" height="64px" src="{{URL::asset($comment->photo)}}" alt="http://placehold.it/64x64">
				</a>
				<div class="media-body">
					<h4 class="media-heading">{{$comment->author}}
						<small>{{$comment->created_at->diffForHumans()}}</small>
					</h4>
				</div>
				<p>{{$comment->body}}</p>
				
				@if(count($comment->replies))
					@foreach($comment->replies as $reply)
				
					<!-- Nested Comment -->
					<div class="media">
						<a class="pull-left" href="#">
							<img class="media-object" height="64px" src="{{URL::asset($reply->photo)}}" alt="http://placehold.it/64x64">
						</a>
						<div class="media-body">
							<h4 class="media-heading">{{$reply->author}}
								<small>{{$reply->created_at->diffForHumans()}}</small>
							</h4>
							{{$reply->body}}
						</div>
						
						<br><br>
						
						{!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
						<input type="hidden" name="comment_id" value="{{$comment->id}}">
						<div class="form-group">
							{!! Form::label('body', 'Reply:') !!}
							{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2]) !!}
						</div>
				
						<div class="form-group">
							{!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
						</div>
						{!! Form::close() !!}
						
					</div>
					<!-- End Nested Comment -->
					
					@endforeach
				@endif
				
			</div>
			<!-- End Comment -->
			
		@endforeach
	@endif
	
@stop