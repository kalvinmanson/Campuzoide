@extends('layouts.app')

@section('content')

<div class="bg-primary text-white p-2 mb-2">
    <h1>{{ $category->name }}</h1>
</div>
<div class="card-columns">
@foreach($pages as $page)
    <div class="card">
        <div class="card-header">
            <h5 class="m-0"><a href="/{{ $page->category->slug }}/{{ $page->slug }}" title="{{ $page->name }}">{{ $page->name }}</a></h5>
        </div>
        <div class="card-body">
            <img src="{{ $page->picture }}" class="img-fluid" alt="{{ $page->name }}">
            <p><small><i class="fa fa-calendar-o"></i> {{ $page->created_at->format('l jS \of F Y h:i:s A') }}</small></p>
            <p>{{ $page->description }}</p>
            <a href="/{{ $page->category->slug }}/{{ $page->slug }}" title="{{ $page->name }}" class="btn btn-secondary">Seguir leyendo</a>
        </div>
    </div>
@endforeach
</div>
{{ $pages->links() }}
@endsection
