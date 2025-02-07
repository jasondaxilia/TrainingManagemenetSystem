@extends('layout.' . $user->role)

@section('content')
    <div class="container mt-5">
        <div class=" card row align-items-center mt-5 p-5">
            <div class="col-lg-6">
                <div class="d-flex justify-content-center">
                    @if ($user->username == 'jede')
                        <img src="{{ asset('storage/profile_pictures/cowboypatrick.png') }}" alt="tes Profile Picture"
                            class="border-2 rounded-circle" width="300">
                    @elseif ($user->profile_picture)
                        <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" alt="tes Profile Picture"
                            class="border-2 rounded-circle" width="300">
                    @else
                        <img src="{{ asset('storage/profile_pictures/Default-Profile-Icon.png') }}" alt="Profile Picture"
                            class="border-2 rounded-circle" width="300">
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="">
                    <h3 class="text-center mt-5 mb-2">Hi {{ $user->name }}!</h3>
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="Profile">
                                <label>Date of Birth</label>
                                <p>{{ \Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y') }}</p>
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
                                <a href="{{ route('EditProfilePicture') }}" class="btn d-inline edit_profile">Edit Profile
                                    Picture</a>
                                <form action=""></form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
