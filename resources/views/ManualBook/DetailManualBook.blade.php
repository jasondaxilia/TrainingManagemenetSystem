@extends('layout.' . $user->role)

{{-- @php
    dd($manual_book);
@endphp --}}


@section('content')
    <div class="container d-flex justify-content-center p-5">
        <div class="card align-self-center w-100 m-5 p-5" style="height: 80%">
            <div class="d-flex h2">
                {{ $manual_book->manual_book_name }}
            </div>
            <div class="h4">Written by: {{ $manual_book->manual_book_writer }}</div>
            <div>{{ $manual_book->manual_book_description }}</div>
        </div>
    </div>
@endsection
