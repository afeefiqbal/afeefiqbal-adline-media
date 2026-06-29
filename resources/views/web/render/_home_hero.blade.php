@php
    $hasHeroBanners = isset($homeBanners) && $homeBanners->isNotEmpty();
    $hasHeroVideo = $homeSettings && $homeSettings->hero_video;
    $hasHero = $homeSettings && (
        $hasHeroVideo
        || $hasHeroBanners
        || $homeSettings->hero_title
        || $homeSettings->hero_sub_title
        || $homeSettings->hero_button_text
    );
@endphp

@if($hasHero)
    <div class="hero brLight">
        @if($hasHeroVideo)
            <div class="hero-section hero-bg-image hero-video bg-section dark-section">
                <div class="hero-bg-video">
                    <video autoplay muted loop playsinline id="myVideo">
                        <source src="{{ asset($homeSettings->hero_video) }}" type="video/mp4">
                    </video>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="hero-content">
                                <div class="section-title">
                                    @if($homeSettings->hero_title)
                                        <h1 class="text-anime-style-3">{!! $homeSettings->hero_title !!}</h1>
                                    @endif
                                    @if($homeSettings->hero_sub_title)
                                        <p class="wow fadeInUp">{!! $homeSettings->hero_sub_title !!}</p>
                                    @endif
                                </div>
                                @if($homeSettings->hero_button_text)
                                    <div class="hero-btn wow fadeInUp" data-wow-delay="0.2s">
                                        <a href="{{ url($homeSettings->hero_button_url ?: '/') }}" class="btn-default btn-highlighted">{{ $homeSettings->hero_button_text }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($hasHeroBanners)
            <div class="hero-section hero-bg-image hero-slider-layout bg-section dark-section">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($homeBanners as $slide)
                            <div class="swiper-slide">
                                <div class="hero-slide">
                                    @if($slide->image)
                                        <div class="hero-slider-image">
                                            <img src="{{ asset($slide->image) }}" {!! imageAltAttr($slide->image_meta_tag, strip_tags($slide->title ?? 'Hero banner')) !!}>
                                        </div>
                                    @endif
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="hero-content">
                                                    <div class="section-title">
                                                        @if($slide->title)
                                                            <h1 class="text-anime-style-3">{!! $slide->title !!}</h1>
                                                        @elseif($homeSettings->hero_title)
                                                            <h1 class="text-anime-style-3">{!! $homeSettings->hero_title !!}</h1>
                                                        @endif
                                                        @if($slide->sub_title)
                                                            <p class="wow fadeInUp">{!! $slide->sub_title !!}</p>
                                                        @elseif($homeSettings->hero_sub_title)
                                                            <p class="wow fadeInUp">{!! $homeSettings->hero_sub_title !!}</p>
                                                        @endif
                                                    </div>
                                                    @php
                                                        $btnText = $slide->button_text ?: $homeSettings->hero_button_text;
                                                        $btnUrl = $slide->button_url ?: $homeSettings->hero_button_url;
                                                    @endphp
                                                    @if($btnText)
                                                        <div class="hero-btn wow fadeInUp" data-wow-delay="0.2s">
                                                            <a href="{{ url($btnUrl ?: '/') }}" class="btn-default btn-highlighted">{{ $btnText }}</a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="hero-pagination"></div>
                </div>
            </div>
        @else
            <div class="hero-section hero-bg-image bg-section dark-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="hero-content">
                                <div class="section-title">
                                    @if($homeSettings->hero_title)
                                        <h1 class="text-anime-style-3">{!! $homeSettings->hero_title !!}</h1>
                                    @endif
                                    @if($homeSettings->hero_sub_title)
                                        <p class="wow fadeInUp">{!! $homeSettings->hero_sub_title !!}</p>
                                    @endif
                                </div>
                                @if($homeSettings->hero_button_text)
                                    <div class="hero-btn wow fadeInUp" data-wow-delay="0.2s">
                                        <a href="{{ url($homeSettings->hero_button_url ?: '/') }}" class="btn-default btn-highlighted">{{ $homeSettings->hero_button_text }}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endif
