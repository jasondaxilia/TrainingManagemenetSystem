@extends('layout.admin')

@section('content')
    <div class="container justify-content-center d-flex p-5">
        <div class="card justify-content-center w-75 h-50 align-self-center">
            <div class="row justify-content-center">Add Banner</div>
            <form action="/AddBanner" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="banner" class="col-md-4 col-form-label text-md-end">Banner Name</label>
                    <div class="col-md-5">
                        <input id="banner" type="text" class="form-control @error('banner_name') is-invalid @enderror"
                            name="banner_name" value="{{ old('banner_name') }}" required>
                        @error('banner_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="banner_link" class="col-md-4 col-form-label text-md-end">Banner link</label>
                    <div class="col-md-5">
                        <input id="banner_link" type="text"
                            class="form-control @error('banner_link') is-invalid @enderror" name="banner_link" required>
                        @error('banner_link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="banner_image" class="col-md-4 col-form-label text-md-end">Banner Image</label>
                    <div class="col-md-5">
                        <input id="banner_image" type="file"
                            class="form-control @error('banner_image') is-invalid @enderror" name="banner_image" required>
                        @error('banner_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row col-md-4">
                    <button class="col-md-4 btn btn-primary text-center" type="submit">Add Banner</button>
                </div>
            </form>
        </div>
    </div>
@endsection
