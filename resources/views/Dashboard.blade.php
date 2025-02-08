{{-- @php
    @dd($user);
@endphp --}}

@extends('layout.' . $user->role)

@section('content')
    <div class="container">
        <h1>Welcome {{ $user->name }}</h1>
        <div class="row justify-content-center">
            <div id="bannerCarousel" class="carousel slide col-md-5 mb-5" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($banners as $banner)
                        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $loop->index }}"
                            @if ($loop->first) class="active" aria-current="true" @endif
                            aria-label="Slide {{ $loop->iteration }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($banners as $banner)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            @if ($banner->link)
                                <a href="{{ $banner->link }}">
                                    <img src="{{ asset('storage/' . $banner->banner_image) }}" class="d-block w-100"
                                        alt="{{ $banner->title ?? 'Banner Image' }}">
                                </a>
                            @else
                                <img src="{{ asset('storage/' . $banner->banner_image) }}" class="d-block w-100"
                                    alt="{{ $banner->title ?? 'Banner Image' }}">
                            @endif
                            @if ($banner->title)
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $banner->title }}</h5>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>

        <div class="row d-flex justify-content-evenly">
            <div class="card col-md-2 text-center">
                <div class="card-head">
                    <strong>Total User</strong>
                </div>
                <div>
                    <strong>
                        {{ $user_count }}
                    </strong>
                </div>
            </div>
            <div class="card col-md-2 text-center">
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
            <div class="card col-md-2 text-center">
                <div>
                    <strong>
                        Total Banner
                    </strong>
                </div>
                <div>
                    <strong>
                        {{ $banner_count }}
                    </strong>
                </div>
            </div>
        </div>
    </div>
@endsection
