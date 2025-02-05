@extends('layout.Admin')

@section('content')
    <div class="container d-flex justify-content-center" style="width: 100%">
        <div class="container">Welcome {{ $user->name }}</div>
    </div>
@endsection
