@extends('dashboard')

@section('content')
    <div class="mx-12 max-w-xs">
        <h1 class="font-medium leading-tight text-5xl mt-0 mb-2 text-blue-600">{{ $recipe->name }}</h1>
        <p>{{ $recipe->description}}</p>
    </div>

    @foreach($recipe->comments as $comment)
        <div class="mx-12 max-w-xs">
            <h4 class="font-medium leading-tight text-2xl mt-0 mb-2 text-blue-600"> {{ $comment->author }} </h4>
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

    <div class="mx-12 max-w-xs">
    <form action="/comments/store" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <input type="text" placeholder="Author name" name="author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-4">
            <textarea name="body" placeholder="Comment body" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
        </div>
        <input type="hidden" value={{ $recipe->id }} name="commentable_id">
        <input type="hidden" value={{ get_class($recipe) }} name="commentable_type">
        <div class="flex items-center justify-between">
            <input class="bg-blue-500 hover:bg-blue-700 text-white text-center py-2 px-4 rounded" type="submit">
        </div>
    </form>
    </div>
@endsection
