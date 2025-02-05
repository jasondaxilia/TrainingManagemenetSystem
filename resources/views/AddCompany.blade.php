@extends('layout.admin')

@section('content')
    <div class="container card d-flex p-5">
        <div class="row justify-content-center">Add Company</div>
        <form action="/AddCompany" method="POST">
            @csrf
            <div class="row mb-3">
                <label for="company_name" class="col-md-4 col-form-label text-md-end">Company Name</label>
                <div class="col-md-5">
                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror"
                        name="company_name" value="{{ old('company_name') }}" required>
                    @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="company_address" class="col-md-4 col-form-label text-md-end">Company Address</label>
                <div class="col-md-5">
                    <input id="company_address" type="text"
                        class="form-control @error('company_address') is-invalid @enderror" name="company_address" required>
                    @error('company_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class=" d-flex justify-content-center">
                <button class="btn btn-primary " type="submit">Add Company</button>
            </div>
        </form>
    </div>
@endsection
