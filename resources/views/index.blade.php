@extends('layouts.template')

@section('content')

    @foreach ($recipes as $recipe)
        <div class="post">
            <a href="/show/{{$recipe->id}}">
                <h2> {{ $recipe->title }} </h2>
            </a>
            <p> {{ $recipe->body }} </p>
            <span> {{ $recipe->author_name }} </span>
        </div>
    @endforeach

@endsection
