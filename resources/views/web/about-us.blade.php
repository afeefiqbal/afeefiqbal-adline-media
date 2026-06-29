@extends('web.layouts.main')
@section('content')
    @include('web.render._page_header', ['pageTitle' => 'About us', 'banner' => $banner ?? null])

    @if($about)
        <div class="about-us">
            <div class="container">
                <div class="row">
                    @if($about->image || $about->image_2)
                        <div class="col-lg-6">
                            <div class="about-us-image position-sticky">
                                @if($about->image)
                                    <div class="about-img-1">
                                        <figure class="image-anime reveal">
                                            <img src="{{ asset($about->image) }}" {!! imageAltAttr($about->image_attribute, strip_tags($about->title ?? 'About us')) !!}>
                                        </figure>
                                    </div>
                                @endif
                                @if($about->image_2)
                                    <div class="about-img-2">
                                        <figure class="image-anime reveal">
                                            <img src="{{ asset($about->image_2) }}" {!! imageAltAttr($about->image_2_attribute, strip_tags($about->title ?? 'About us')) !!}>
                                        </figure>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-{{ ($about->image || $about->image_2) ? '6' : '12' }}">
                        <div class="about-us-content">
                            <div class="section-title mb-4">
                                <h3 class="wow fadeInUp">about us</h3>
                                @if($about->title)
                                    <h2 class="text-anime-style-3">{!! $about->title !!}</h2>
                                @endif
                                @if($about->description)
                                    <div class="textAreaC wow fadeInUp" data-wow-delay="0.2s">{!! $about->description !!}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($keyFeatures->isNotEmpty())
                        <div class="col-lg-12">
                            <div class="about-counter-list">
                                @foreach($keyFeatures as $feature)
                                    <div class="about-counter-item">
                                        @if($feature->image)
                                            <div class="icon-box">
                                                <img src="{{ asset($feature->image) }}" {!! imageAltAttr($feature->image_attribute, $feature->title) !!}>
                                            </div>
                                        @endif
                                        <div class="about-counter-content">
                                            @if($feature->count)
                                                @php $countData = explodePlus($feature->count); @endphp
                                                <h2><span class="counter">{{ $countData['value'] }}</span>{{ $countData['plus'] }}</h2>
                                            @endif
                                            <p>{{ $feature->title }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @elseif($about->count)
                        <div class="col-lg-12">
                            <div class="about-counter-list">
                                @php $countData = explodePlus($about->count); @endphp
                                <div class="about-counter-item">
                                    <div class="about-counter-content">
                                        <h2><span class="counter">{{ $countData['value'] }}</span>{{ $countData['plus'] }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if($about->mission || $about->vision || $about->values || $about->goal)
            <div class="our-mission-vision bg-section">
                <div class="container">
                    @if($about->mv_section_title || $about->mv_section_sub_title || $about->mv_section_description)
                        <div class="row section-row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    @if($about->mv_section_title)
                                        <h3 class="wow fadeInUp">{{ $about->mv_section_title }}</h3>
                                    @endif
                                    @if($about->mv_section_sub_title)
                                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ $about->mv_section_sub_title }}</h2>
                                    @endif
                                    @if($about->mv_section_description)
                                        <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $about->mv_section_description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mission-vision-list">
                                @if($about->mission)
                                    <div class="mission-vision-item wow fadeInUp">
                                        @if($about->mission_image)
                                            <div class="icon-box">
                                                <img src="{{ asset($about->mission_image) }}" {!! imageAltAttr($about->mission_image_meta_tag, $about->mission_title ?: 'Our mission') !!}>
                                            </div>
                                        @endif
                                        <div class="mission-vision-content">
                                            @if($about->mission_title)
                                                <h3>{{ strtolower($about->mission_title) }}</h3>
                                            @endif
                                            {!! $about->mission !!}
                                        </div>
                                    </div>
                                @endif

                                @if($about->vision)
                                    <div class="mission-vision-item active wow fadeInUp" data-wow-delay="0.2s">
                                        @if($about->vision_image)
                                            <div class="icon-box">
                                                <img src="{{ asset($about->vision_image) }}" {!! imageAltAttr($about->vision_image_meta_tag, $about->vision_title ?: 'Our vision') !!}>
                                            </div>
                                        @endif
                                        <div class="mission-vision-content">
                                            @if($about->vision_title)
                                                <h3>{{ strtolower($about->vision_title) }}</h3>
                                            @endif
                                            {!! $about->vision !!}
                                        </div>
                                    </div>
                                @endif

                                @if($about->values)
                                    <div class="mission-vision-item wow fadeInUp" data-wow-delay="0.4s">
                                        @if($about->values_image)
                                            <div class="icon-box">
                                                <img src="{{ asset($about->values_image) }}" {!! imageAltAttr($about->values_image_meta_tag, $about->values_title ?: 'Our value') !!}>
                                            </div>
                                        @endif
                                        <div class="mission-vision-content">
                                            @if($about->values_title)
                                                <h3>{{ strtolower($about->values_title) }}</h3>
                                            @endif
                                            {!! $about->values !!}
                                        </div>
                                    </div>
                                @endif

                                @if($about->goal)
                                    <div class="mission-vision-item wow fadeInUp" data-wow-delay="0.4s">
                                        @if($about->goal_image)
                                            <div class="icon-box">
                                                <img src="{{ asset($about->goal_image) }}" {!! imageAltAttr($about->goal_image_meta_tag, $about->goal_title ?: 'Our Goals') !!}>
                                            </div>
                                        @endif
                                        <div class="mission-vision-content">
                                            @if($about->goal_title)
                                                <h3>{{ $about->goal_title }}</h3>
                                            @endif
                                            {!! $about->goal !!}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif

    @include('web.render._home_why_choose')
    @include('web.render._home_team')

    @include('web.render._home_testimonials')
    @include('web.render._home_clients')
@endsection
