<div class="card card-light">
	<div class="card-header">Comentarios</div>
	<div class="card-body">
		@if(Auth::check())
		<form method="POST" action="{{ url('comments') }}">
    		{{ csrf_field() }}
			<input type="hidden" name="question_id" value="{{ isset($question) ? $question->id : 0 }}">
			<input type="hidden" name="post_id" value="{{ isset($post) ? $post->id : 0 }}">
			<input type="hidden" name="content_id" value="{{ isset($content) ? $content->id : 0 }}">

			<div class="form-group">
				<textarea class="form-control" placeholder="Dejar un comentario" name="content" id="content"></textarea>
				<label class="form-check-label text-danger">
		          <input class="form-check-input" type="checkbox" name="report" value="1"> <small>Reportar pregunta</small>
		        </label>
				<button type="submit" class="float-right btn btn-sm btn-primary"><i class="fa fa-comment"></i> Dejar comentario</button>
			</div>
		</form>
		@else
			<p class="text-center"><a href="/login">Inicia sesión</a> para comentar.</p>
		@endif

		@foreach($comments as $comment)
		<blockquote>
			<p class="p-0 m-0">
				<small class="text-muted float-right">
					<i class="fa fa-clock-o"></i> 
					{{ $comment->created_at->diffForHumans() }}
				</small>
				<a href="/users/{{ $comment->user->username }}" class="text-muted d-block">
					<img class="rounded-circle mr-2" width="20" src="{{ $comment->user->picture }}" alt="{{ $comment->user->name }}">
					{{ $comment->user->name }}:
				</a>
				<br>
				{!! $comment->content !!}
			</p>
		</blockquote>
		<div class="clearfix"></div>
		@endforeach
	</div>
</div>