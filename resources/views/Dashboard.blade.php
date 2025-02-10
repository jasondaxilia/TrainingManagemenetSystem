{{-- @php
    @dd($user);
@endphp --}}

@extends('layout.' . $user->role)

@section('content')
    <div class="container">
        <div class="row">
            <div class="card h1 text-start p-2">
                <strong>Welcome, <br> {{ $user->username }}</strong>
            </div>
        </div>
        <div class="row d-flex justify-content-evenly">
            <div class="card col-md-4 text-start">
                <div>
                    <strong>Total User</strong>
                </div>
                <div>
                    <strong>
                        {{ $user_count }}
                    </strong>
                </div>
            </div>
            <div class="card col-md-4 text-start">
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
            <div class="card col-md-4 text-start">
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

        <div class="row h1 d-flex justify-content-center mt-5"> On Going Event</div>

        <div class="row" style="height: max-content;">
            <div id="bannerCarousel" class="carousel slide col-md-8 p-0" data-bs-ride="carousel" style="height: 400px">
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
                                    <img id="banner_image" src="{{ asset('storage/' . $banner->banner_image) }}"
                                        class="d-flex" alt="{{ $banner->title }}">
                                </a>
                            @else
                                <img id="banner_image" src="{{ asset('storage/' . $banner->banner_image) }}" class="d-block"
                                    alt="{{ $banner->title }}">
                            @endif
                            {{-- @if ($banner->title)
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $banner->title }}</h5>
                                </div>
                            @endif --}}
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
            <div class="card col-md-4 p-0">
                <div class="card-header d-flex justify-content-center p-0">
                    <strong>Closest Birthday</strong>
                </div>
                @if (count($closestBirthdays) > 0)
                    <div class="card-body p-3 m-0">
                        <div class="container h-100"
                            style="display: flex;flex-direction: column ;justify-content: space-evenly">
                            @foreach ($closestBirthdays as $birthday)
                                <div class="">
                                    <strong>
                                        {{ $birthday['user']->name }}
                                    </strong>
                                    Birthday:
                                    {{ \Carbon\Carbon::parse($birthday['user']->date_of_birth)->format('j F Y') }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p>No birthdays available.</p>
                @endif

            </div>
        </div>
    </div>
@endsection
