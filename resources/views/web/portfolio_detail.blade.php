@extends('web.layouts.main')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
@endsection

@section('content')
    @include('web.render._page_header', [
        'pageTitle' => 'Portfolio',
        'breadcrumb' => '<li class="breadcrumb-item"><a href="'.url('portfolio').'">Portfolio</a></li><li class="breadcrumb-item active" aria-current="page">'.$portfolio->title.'</li>'
    ])

    <section class="portfolio-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 pe-lg-4">
                    @if($portfolio->photos->isNotEmpty())
                        <div class="slider-portfolio-for">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    @foreach($portfolio->photos as $photo)
                                        <div class="swiper-slide {{ $photo->type == 'Video' ? 'video' : '' }}">
                                            @if($photo->type == 'Video' && $photo->video_url)
                                                <a class="videoBtn" href="{{ $photo->video_url }}" data-fancybox="gallery">
                                                    <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g filter="url(#filter0_d_119_7)">
                                                            <circle cx="50" cy="50" r="30" fill="#EF3E3B"></circle>
                                                        </g>
                                                        <g clip-path="url(#clip0_119_7)">
                                                            <path d="M44.2552 40.441C42.4521 39.4067 40.9902 40.254 40.9902 42.332V57.6666C40.9902 59.7466 42.4521 60.5928 44.2552 59.5595L57.6584 51.8729C59.4621 50.8382 59.4621 49.1619 57.6584 48.1275L44.2552 40.441Z" fill="white"></path>
                                                        </g>
                                                        <defs>
                                                            <filter id="filter0_d_119_7" x="0" y="0" width="100" height="100" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                                <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
                                                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"></feColorMatrix>
                                                                <feOffset></feOffset>
                                                                <feGaussianBlur stdDeviation="10"></feGaussianBlur>
                                                                <feComposite in2="hardAlpha" operator="out"></feComposite>
                                                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.3 0"></feColorMatrix>
                                                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_119_7"></feBlend>
                                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_119_7" result="shape"></feBlend>
                                                            </filter>
                                                            <clipPath id="clip0_119_7">
                                                                <rect width="20" height="20" fill="white" transform="translate(40 40)"></rect>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </a>
                                            @endif
                                            <img src="{{ asset($photo->image) }}" class="img-fluid w-100" {!! imageAltAttr($photo->image_attribute, $portfolio->title) !!}>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="slider-portfolio-nav">
                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    @foreach($portfolio->photos as $photo)
                                        <div class="swiper-slide {{ $photo->type == 'Video' ? 'video' : '' }}">
                                            @if($photo->type == 'Video' && $photo->video_url)
                                                <a class="videoBtn" href="javascript:void(0)" tabindex="0">
                                                    <svg width="40" height="40" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g filter="url(#filter0_d_nav_{{ $photo->id }})">
                                                            <circle cx="50" cy="50" r="30" fill="#EF3E3B"></circle>
                                                        </g>
                                                        <g clip-path="url(#clip0_nav_{{ $photo->id }})">
                                                            <path d="M44.2552 40.441C42.4521 39.4067 40.9902 40.254 40.9902 42.332V57.6666C40.9902 59.7466 42.4521 60.5928 44.2552 59.5595L57.6584 51.8729C59.4621 50.8382 59.4621 49.1619 57.6584 48.1275L44.2552 40.441Z" fill="white"></path>
                                                        </g>
                                                    </svg>
                                                </a>
                                            @endif
                                            <img src="{{ asset($photo->image) }}" class="img-fluid w-100" {!! imageAltAttr($photo->image_attribute, $portfolio->title) !!}>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-5 mt-lg-0 mt-5 d-flex align-items-center">
                    <div>
                        <h4>{{ $portfolio->title }}</h4>
                        <ul>
                            @if($portfolio->location)
                                <li><b>Location :</b> {{ $portfolio->location }}</li>
                            @endif
                            @if($portfolio->type)
                                <li><b>Type :</b> {{ $portfolio->type }}</li>
                            @endif
                            @if($portfolio->attendees)
                                <li><b>Attendees :</b> {{ $portfolio->attendees }}</li>
                            @endif
                        </ul>
                        @if($portfolio->description)
                            <div class="mt-4">{!! $portfolio->description !!}</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($previousItem || $nextItem)
        <section class="portfolioNav mb-0">
            <div class="container">
                <div class="row">
                    @if($previousItem)
                        @php $prevImage = $previousItem->thumbnail?->image ?? $previousItem->banner; @endphp
                        <div class="col-6 pe-lg-3">
                            <a href="{{ url('project/'.$previousItem->short_url) }}" class="navBox navBoxRev">
                                @if($prevImage)
                                <div class="imgBox">
                                    <img src="{{ asset($prevImage) }}" class="img-fluid w-100" {!! imageAltAttr($previousItem->thumbnail?->image_attribute ?: $previousItem->banner_attribute, $previousItem->title) !!}>
                                </div>
                                @endif
                                <div class="dtBox">
                                    <h6>{{ $previousItem->title }}</h6>
                                    @if($previousItem->location)<p>{{ $previousItem->location }}</p>@endif
                                </div>
                            </a>
                        </div>
                    @endif
                    @if($nextItem)
                        @php $nextImage = $nextItem->thumbnail?->image ?? $nextItem->banner; @endphp
                        <div class="col-6 {{ $previousItem ? 'ps-lg-3' : '' }}">
                            <a href="{{ url('project/'.$nextItem->short_url) }}" class="navBox">
                                @if($nextImage)
                                <div class="imgBox">
                                    <img src="{{ asset($nextImage) }}" class="img-fluid w-100" {!! imageAltAttr($nextItem->thumbnail?->image_attribute ?: $nextItem->banner_attribute, $nextItem->title) !!}>
                                </div>
                                @endif
                                <div class="dtBox">
                                    <h6>{{ $nextItem->title }}</h6>
                                    @if($nextItem->location)<p>{{ $nextItem->location }}</p>@endif
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    @include('web.render._home_clients')
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
@endsection
