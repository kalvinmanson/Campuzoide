<div class="card card-light">
	<div class="card-header">Comentarios</div>
	<div class="card-body">
		@if(Auth::check())
		<form action="" method="POST">
			<div class="form-group">
				<textarea class="form-control" placeholder="Dejar un comentario"></textarea>
				<label class="form-check-label text-danger">
		          <input class="form-check-input" type="checkbox"> <small>Reportar pregunta</small>
		        </label>
				<button type="submit" class="float-right btn btn-sm btn-primary"><i class="fa fa-comment"></i> Dejar comentario</button>
			</div>
		</form>
		@else
			<p class="text-center"><a href="/login">Inicia sesión</a> para comentar.</p>
		@endif
	</div>
</div>