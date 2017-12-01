<ul class="list-group">
  <li class="list-group-item active">Últimas respuestas</li>
  @foreach($question->answers->take(12) as $answer)
    <li class="list-group-item">
        <small class="text-muted float-right"><i class="fa fa-clock-o"></i> {{ $answer->created_at->diffForHumans() }}</small> 
        <a href="/users/{{ $answer->user->username }}" class="{{ $answer->result ? 'text-success' : 'text-danger' }}">{{ $answer->user->name }}</a>
    </li>
  @endforeach
</ul>