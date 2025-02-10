@extends('layout.' . $user->role)

@section('content')
    <div class="container mt-5">
        <div class=" card row align-items-center mt-5 p-5">
            <div class="row justify-content-center h1 mb-3">
                {{ $user->role . ' ' . 'Profile' }}
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-center">
                    @if ($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}"
                            alt="{{ $user->name }}'s Profile Picture" class="border-2 rounded-circle" width="300">
                    @else
                        <img src="{{ asset('storage/Default-Profile-Icon.png') }}"
                            alt="{{ $user->name }}'s Profile Picture" class="border-2 rounded-circle" width="300">
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="">
                    <h3 class="text-center mt-5 mb-2">Hi {{ $user->username }}!</h3>
                    <div class="row text-center">
                        <div class="col-md-6">
                            <div class="Profile">
                                <label>Username</label>
                                <p>{{ $user->username }}</p>
                            </div>
                            <div class="Profile">
                                <label>Name</label>
                                <p>{{ $user->name }}</p>
                            </div>
                            <div class="Profile">
                                <label>Company</label>
                                <p>{{ $company->company_name }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="Profile">
                                <label>E-mail</label>
                                <p>{{ $user->email }}</p>
                            </div>
                            <div class="Profile">
                                <label>Phone</label>
                                <p>{{ $user->phone_number }}</p>
                            </div>
                            <div class="Profile">
                                <label>Date of Birth</label>
                                <p>{{ \Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Profile text-center">
                    <a href="{{ route('EditProfile', $user->id) }}" class="btn d-inline edit_profile" style="">Edit
                        Profile</a>
                </div>
            </div>

        </div>
    </div>
@endsection
