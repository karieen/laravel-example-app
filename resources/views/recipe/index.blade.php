@extends('dashboard')

@section('content')
<div class="mx-12">
    <a href="{{ route('recipe.create') }}">
    Create
    </a>
</div>

<table>
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @foreach($recipes as $recipe)
            <tr>
                <td>{{ $recipe->id }}</td>
                <td>{{ $recipe->name }}</td>
                <td>{{ $recipe->description }}</td>
                <td>
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

@endsection
