@if($user)
<div class="card">
	<div class="card-body">
		<img class="rounded-circle mb-2 mr-2 float-left" src="{{ $user->picture }}" alt="{{ $user->picture }}">
		<span class="badge badge-primary float-right p-2">{{ $user->rank }}%</span>
		<a href="/users/{{ $user->username }}"><h5 class="card-title m-1">{{ $user->name }}</h5></a>
		<span class="text-success">
			{{ $user->answers->where('result', 1)->count() }} <i class="fa fa-check"></i>
		</span>
		<span class="text-danger">
			{{ $user->answers->where('result', 0)->count() }} <i class="fa fa-remove"></i>
		</span>
	</div>
</div>
@endif