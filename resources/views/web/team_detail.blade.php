@extends('web.layouts.main')
@section('content')
    @include('web.render._page_header', [
        'pageTitle' => $member->title,
        'banner' => $banner ?? null,
        'breadcrumb' => '<li class="breadcrumb-item"><a href="'.url('about-us').'">about us</a></li><li class="breadcrumb-item active" aria-current="page">'.strtolower($member->title).'</li>',
    ])

    <div class="page-team-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-single-box">
                        <div class="team-about-box">
                            @if($member->image)
                                <div class="team-single-image">
                                    <figure class="image-anime">
                                        <img src="{{ asset($member->image) }}" {!! imageAltAttr($member->image_attribute, $member->title) !!}>
                                    </figure>
                                </div>
                            @endif

                            <div class="team-about-content">
                                <div class="section-title">
                                    <h2 class="text-anime-style-3" data-cursor="-opaque">About me</h2>
                                    @if($member->description)
                                        <div class="wow fadeInUp">{!! $member->description !!}</div>
                                    @endif
                                </div>

                                @if($member->designation || $member->email || $member->experience || $member->phone)
                                    <div class="team-contact-list wow fadeInUp" data-wow-delay="0.4s">
                                        @if($member->designation)
                                            <div class="team-contact-box">
                                                <div class="icon-box">
                                                    <img src="{{ asset('web/imagesN/icon-position.svg') }}" alt="">
                                                </div>
                                                <div class="team-contact-content">
                                                    <h3>position</h3>
                                                    <p>{{ $member->designation }}</p>
                                                </div>
                                            </div>
                                        @endif

                                        @if($member->email)
                                            <div class="team-contact-box">
                                                <div class="icon-box">
                                                    <img src="{{ asset('web/imagesN/icon-mail-white.svg') }}" alt="">
                                                </div>
                                                <div class="team-contact-content">
                                                    <h3>email address</h3>
                                                    <p><a href="mailto:{{ $member->email }}">{{ $member->email }}</a></p>
                                                </div>
                                            </div>
                                        @endif

                                        @if($member->experience)
                                            <div class="team-contact-box">
                                                <div class="icon-box">
                                                    <img src="{{ asset('web/imagesN/icon-experience.svg') }}" alt="">
                                                </div>
                                                <div class="team-contact-content">
                                                    <h3>experience</h3>
                                                    <p>{{ $member->experience }}</p>
                                                </div>
                                            </div>
                                        @endif

                                        @if($member->phone)
                                            <div class="team-contact-box">
                                                <div class="icon-box">
                                                    <img src="{{ asset('web/imagesN/icon-phone-white.svg') }}" alt="">
                                                </div>
                                                <div class="team-contact-content">
                                                    <h3>contact number</h3>
                                                    <p><a href="tel:{{ preg_replace('/\s+/', '', $member->phone) }}">{{ $member->phone }}</a></p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
