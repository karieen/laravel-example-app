@extends('dashboard')

@section('content')
    <h1>{{ $recipe->name }}</h1>
    <p>{{ $recipe->description}}</p>

    @foreach($recipe->comments as $comment)
        <div class="comment">
            <h4> {{ $comment->author }} </h4>
            <p> {{ $comment->body }} </p>
        </div>
    @endforeach

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/comments/store" method="POST">
        @csrf
        <div class="form-input">
            <input type="text" placeholder="Author name" name="author">
        </div>
        <div class="form-input">
            <textarea name="body" placeholder="Comment body"></textarea>
        </div>
        <input type="hidden" value={{ $recipe->id }} name="commentable_id">
        <input type="hidden" value={{ get_class($recipe) }} name="commentable_type">
        <input type="submit">
    </form>
@endsection
