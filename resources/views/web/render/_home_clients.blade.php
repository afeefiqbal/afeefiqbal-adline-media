@if($clients->isNotEmpty())
    <div class="our-testimonials pt-0">
        <div class="container">
            <div class="col-lg-12">
                @if($clientHeading)
                    <div class="row section-row">
                        <div class="col-12">
                            <div class="section-title">
                                @if($clientHeading->title)
                                    <h3 class="wow fadeInUp">{{ $clientHeading->title }}</h3>
                                @endif
                                @if($clientHeading->sub_title)
                                    <h2 class="text-anime-style-3">{!! $clientHeading->sub_title !!}</h2>
                                @endif
                                @if($clientHeading->description)
                                    <div class="wow fadeInUp" data-wow-delay="0.2s">{!! $clientHeading->description !!}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <div class="trusted-client-box">
                    <div class="testimonial-company-slider w-100">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach($clients as $client)
                                    <div class="swiper-slide">
                                        <div class="trusted-client-logo">
                                            <img src="{{ asset($client->image) }}" {!! imageAltAttr($client->image_meta_tag, $client->title) !!}>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
