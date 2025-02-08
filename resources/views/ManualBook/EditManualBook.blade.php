@extends('layout.' . $user->role)

@section('content')
    <div class="container justify-content-center d-flex p-5">
        <div class="card justify-content-center w-75 h-50 align-self-center">
            <div class="row justify-content-center mb-5 h2">
                Edit Manual Book
            </div>
            <form action="{{ route('EditManualBook', $manual_book_id->id) }}" method="POST">
                @csrf
                <div class="row mb-3 d-flex flex-row justify-content-center">
                    <div class="w-auto align-self-center">
                        <label for="manual_book_name">New Manual Book Name</label>
                    </div>
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
                <div class="row mb-3 justify-content-center">
                    <div class="w-auto align-self-center">
                        <label for="manual_book_writer">New Manual Book Writer</label>
                    </div>
                    <div class="col-md-5">
                        <input id="manual_book_writer" type="text"
                            class="form-control @error('manual_book_writer') is-invalid @enderror" name="manual_book_writer"
                            value="{{ old('manual_book_writer') }}" required>
                        @error('manual_book_writer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="w-auto align-self-center">
                        <label for="manual_book_description">Manual Book Description</label>
                    </div>
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
                <div class="row justify-content-center">
                    <button type="submit" class="col-md-4 btn btn-primary text-center">Update Manual Book</button>
                </div>
            </form>
        </div>
    </div>
@endsection
