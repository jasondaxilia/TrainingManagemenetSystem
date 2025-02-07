@extends('layout.' . $user->role)

@section('content')
    <div class="container">
        <h1>Welcome {{ $user->name }}</h1>
        <div class="row">
            <div id="carousel" class="carousel slide col-md-4" data-bs-ride="true">
                <div class="carousel-inner">
                    @foreach ($banners as $banner)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $banner->banner_image) }}" class="d-block w-100"
                                alt="Banner Image">
                        </div>
                    @endforeach
                </div>

                <!-- Carousel Navigation Buttons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

                <!-- Optional: Carousel Indicators -->
                <div class="carousel-indicators">
                    @foreach ($banners as $key => $banner)
                        <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $key }}"
                            class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}"
                            aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-evenly">
            <div class="card col-md-3">
                <div class="card-head">
                    <strong>Total User</strong>
                </div>
                <div>
                    <strong>
                        {{ $user_count }}
                    </strong>
                </div>
            </div>
            <div class="card col-md-3">
                <div class="card-head">
                    <div>
                        <strong>
                            Total Company
                        </strong>
                    </div>
                    <div>
                        <strong>
                            {{ $company_count }}
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
