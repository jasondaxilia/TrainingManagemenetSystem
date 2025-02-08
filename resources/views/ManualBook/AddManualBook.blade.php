@extends('layout.admin')

@section('content')
    <div class="container justify-content-center d-flex p-5">
        <div class="card justify-content-center w-75 h-50 align-self-center">
            <div class="row justify-content-center h3 mb-3">Add Manual Book</div>
            <form action="{{ route('AddManualBook') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="manual_book_name" class="col-md-4 col-form-label text-md-end">Name</label>
                    <div class="col-md-5">
                        <input id="manual_book_name" type="text"
                            class="form-control @error('manual_book_name') is-invalid @enderror" name="manual_book_name"
                            value="{{ old('manual_book_name') }}" required>
                        @error('manual_book_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="manual_book_writer" class="col-md-4 col-form-label text-md-end">
                        Writer</label>
                    <div class="col-md-5">
                        <input id="manual_book_writer" type="text"
                            class="form-control @error('manual_book_writer') is-invalid @enderror" name="manual_book_writer"
                            required>
                        @error('manual_book_writer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="manual_book_description" class="col-md-4 col-form-label text-md-end">
                        Description</label>
                    <div class="col-md-5">
                        <textarea id="manual_book_description" class="form-control @error('manual_book_description') is-invalid @enderror"
                            name="manual_book_description" rows="4" required>{{ old('manual_book_description') }}</textarea>

                        @error('manual_book_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary " type="submit">Publish Manual Book</button>
                </div>
            </form>
        </div>
    </div>
@endsection
