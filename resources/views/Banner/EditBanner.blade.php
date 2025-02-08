@extends('layout.admin')

@section('content')
    <div class="container justify-content-center d-flex p-5">
        <div class="card justify-content-center w-75 h-50 align-self-center">
            <div class="row justify-content-center">Update Banner</div>
            <form action="{{ route('EditBanner', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="banner" class="col-md-4 col-form-label text-md-end">New Banner Name</label>
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
                    <label for="banner_image" class="col-md-4 col-form-label text-md-end">New Banner Image</label>
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

                <div class="row justify-content-center">
                    <button class="col-md-4 btn btn-primary text-center" type="submit">Update Banner</button>
                </div>
            </form>
        </div>
    </div>
@endsection
