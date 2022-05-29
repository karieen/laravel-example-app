@extends('dashboard');

@section('content')
    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="/recipe/edit/{{$recipe->id}}" method="post">
    @csrf
    <label for="name">Name</label><br/>
    <input type="text" size="80" name="name" value="{{ $recipe->name }}"><br/>
    <label for="description">Description</label><br/>
    <textarea rows="20" cols="80" name="description">{{ $recipe->description }}</textarea><br/>
    <label for="published">Published</label>
    <input type="checkbox" name="published[published]" value="published" @checked($recipe->published)><br/>
    <input type="submit">
</form>
@endsection
