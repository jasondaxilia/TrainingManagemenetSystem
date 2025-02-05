@extends('layout.Admin')

@section('content')
    <section class="vh-100 gradient-custom w-100">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">User Registration</h3>
                            <form method="POST" action="UserRegister" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="username">Username</label>
                                            <input name="username" type="text" id="username" class="form-control"
                                                required />
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="name">Name</label>
                                            <input name="name" type="text" id="name" class="form-control"
                                                required />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div data-mdb-input-init class="form-outline datepicker w-100">
                                            <label for="email" class="form-label">Email</label>
                                            <input name="email" type="email" class="form-control" id="email"
                                                required />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div data-mdb-input-init class="form-outline datepicker w-100">
                                            <label for="password" class="form-label">Password</label>
                                            <input name="password" type="password" class="form-control" id="password"
                                                required />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 d-flex align-items-center">
                                        <div data-mdb-input-init class="form-outline datepicker w-100">
                                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                                            <input name="date_of_birth" type="text" class="form-control"
                                                id="date_of_birth" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="phone_number">Phone Number</label>
                                            <input name="phone_number" type="tel" id="phone_number" class="form-control"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <label for="role" class="col-md-4 col-form-label ">Role</label>
                                        <div class="col-md-12">
                                            <select id="role" class="form-control @error('role') is-invalid @enderror"
                                                name="role" required>
                                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User
                                                </option>
                                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin
                                                </option>
                                            </select>
                                            @error('role')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <label for="company" class="col-md-4 col-form-label">{{ __('Company') }}</label>
                                        <select id="company" name="company"
                                            class="form-control @error('company') is-invalid @enderror">
                                            <option value="">Select a company</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ old('company') == $company->id ? 'selected' : '' }}>
                                                    {{ $company->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('company')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <label for="profile_picture" class="col-md-6 col-form-label ">Profile
                                            Picture</label>
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
                                <div class="d-flex justify-content-center mt-4">
                                    <form action="UserRegister">
                                        @csrf
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
