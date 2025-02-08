@extends('layout.admin')

@section('content')
    <div class="container p-5">
        <h1>Rick and Morty Characters</h1>
        <ul>
            @foreach ($characters as $character)
                <li>
                    <h2>{{ $character['name'] }}</h2>
                    <p>Status: {{ $character['status'] }}</p>
                    <p>Species: {{ $character['species'] }}</p>
                    <p>Gender: {{ $character['gender'] }}</p>
                    <img src="{{ $character['image'] }}" alt="{{ $character['name'] }}" width="100">
                </li>
            @endforeach
        </ul>
    </div>
@endsection
