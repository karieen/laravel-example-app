@extends('dashboard')

@section('content')
<div class="mx-12 flex space-x-2 justify-center">
    <a class="bg-blue-500 hover:bg-blue-700 text-white text-center py-2 px-4 rounded" href="{{ route('recipe.create') }}">
    Create
    </a>
</div>

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full">
                    <thead class="border-b">
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">ID</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Description</th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Actions</th>
                    </thead>
                    <tbody>
                        @foreach($recipes as $recipe)
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $recipe->id }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $recipe->name }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $recipe->description }}</td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('recipe.show', ['recipe' => $recipe->id]) }}">
                                    Show
                                    </a>
                                    <a href="{{ route('recipe.edit', ['recipe' => $recipe->id]) }}">
                                    Edit
                                    </a>
                                    <a href="{{ route('recipe.delete', ['recipe' => $recipe->id]) }}">
                                    Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    <tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
