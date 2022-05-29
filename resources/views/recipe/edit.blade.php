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
<div class="mx-12 max-w-xs">
    <form action="/recipe/edit/{{$recipe->id}}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <label for="name">Name</label><br/>
        <input type="text" name="name" value="{{ $recipe->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><br/>
        <label for="description">Description</label><br/>
        <textarea name="description" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $recipe->description }}</textarea><br/>
        <label for="published">Published</label>
        <input type="checkbox" name="published[published]" value="published" @checked($recipe->published)><br/>
        <input class="bg-blue-500 hover:bg-blue-700 text-white text-center py-2 px-4 rounded" type="submit">
    </form>
</div>
@endsection
