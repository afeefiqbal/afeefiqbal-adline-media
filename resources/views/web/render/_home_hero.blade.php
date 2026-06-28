@php
    $hasHero = $homeSettings && (
        $homeSettings->hero_video
        || $homeSettings->hero_title
        || $homeSettings->hero_sub_title
        || $homeSettings->hero_button_text
    );
@endphp

@if($hasHero)
    <div class="hero brLight">
        <div class="hero-section hero-bg-image {{ ($homeSettings->hero_video) ? 'hero-video' : '' }} bg-section dark-section">
            @if($homeSettings->hero_video)
                <div class="hero-bg-video">
                    <video autoplay muted loop playsinline id="myVideo">
                        <source src="{{ asset($homeSettings->hero_video) }}" type="video/mp4">
                    </video>
                </div>
            @endif
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
    </div>
@endif
