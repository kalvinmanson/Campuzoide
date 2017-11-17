@if($question)
<div class="card text-white bg-dark">
	<div class="card-body">
		<i class="fa fa-question-circle-o fa-4x float-left mb-4 mr-2"></i>
		<span class="badge badge-primary float-right p-2">{{ $question->rank }}%</span>
		<a href="/questions/{{ $question->code }}">
			<h6 class="card-title mb-0 text-white">{{ $question->name }}</h6>
		</a>
    	<p class="m-0 text-muted"><small>{{ $question->code }}</small></p>
    	<span class="text-success">
			{{ $question->answers->where('result', 1)->count() }} <i class="fa fa-check"></i>
		</span>
		<span class="text-danger">
			{{ $question->answers->where('result', 0)->count() }} <i class="fa fa-remove"></i>
		</span>
	</div>
</div>
@endif