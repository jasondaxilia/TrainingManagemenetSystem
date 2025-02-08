@extends('layout.admin')

@section('content')

    <div class="container">
        <h2>Edit Company</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('EditCompany', $company->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name"
                    value="{{ old('company_name', $company->company_name) }}" required>
            </div>
            <div class="mb-3">
                <label for="company_address" class="form-label">Company Address</label>
                <input type="text" class="form-control" id="company_address" name="company_address"
                    value="{{ old('company_address', $company->company_address) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
