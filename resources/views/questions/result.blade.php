@if($answer->result == 1)
	<div class="bg-success text-white p-3">¡Correcto!</div>
@else
	<div class="bg-danger text-white p-3">¡Incorrecto!</div>
@endif

<a href="{{ $url }}" class="btn btn-block btn-secondary">Siguiente <i class="fa fa-angle-right"></i></a>
