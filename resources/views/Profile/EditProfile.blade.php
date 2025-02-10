@extends('layout.' . $user->role)

@section('content')
    <div class="container align-self-center">
        <div class="card container align-self-center justify-content-center">
            <div class="row align-self-center h2 my-4">Edit Profile</div>
            <div class="col-lg-6 d-flex justify-content-center w-100">
                <div class="d-flex justify-content-center">
                    @if ($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="tes Profile Picture"
                            class="border-2 rounded-circle" width="300">
                    @else
                        <img src="{{ asset('storage/profile_pictures/Default-Profile-Icon.png') }}" alt="Profile Picture"
                            class="border-2 rounded-circle" width="300">
                    @endif
                </div>
            </div>
            <div class="col-lg-6 d-flex flex-col justify-content-center w-100">
                <div class="row my-5">
                    <form method="POST" action="{{ route('UpdateProfile', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <label for="username" class="col-md-6 col-form-label text-md-right">{{ __('Username') }}</label>
                            <div class="col-md-6">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username', auth()->user()->username) }}" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="phone_number"
                                class="col-md-6 col-form-label text-md-right">{{ __('phone_number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    value="{{ old('phone_number', auth()->user()->phone_number) }}" required autofocus>

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="email"
                                class="col-md-6 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', auth()->user()->email) }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="password"
                                class="col-md-6 col-form-label text-md-right">{{ __('password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password">
                                {{-- value="{{ old('password', auth()->user()->password) }}" required> --}}
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <label for="profile_picture"
                                class="col-md-6 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                            <div class="col-md-6">
                                <input id="profile_picture" type="file"
                                    class="form-control @error('profile_picture') is-invalid @enderror"
                                    name="profile_picture">

                                @error('profile_picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Changes') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
