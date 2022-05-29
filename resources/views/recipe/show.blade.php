@extends('dashboard')

@section('content')
    <h1>{{ $recipe->name }}</h1>
    <p>{{ $recipe->description}}</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
