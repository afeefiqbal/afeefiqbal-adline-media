@if($homeServices->isNotEmpty())
    <div class="our-services bg-section bg-prim">
        <div class="container">
            <!--section-row align-items-center-->
            <div class="row pb-3">
                <div class="col-lg-6">
                    <div class="section-title section-title-center">
                        @if(isset($whatWeDo) && $whatWeDo && $whatWeDo->title)
                            <h3 class="wow fadeInUp color-white">{{ $whatWeDo->title }}</h3>
                        @endif
                        @if(isset($whatWeDo) && $whatWeDo && $whatWeDo->sub_title)
                            <h2 class="text-anime-style-3">{!! $whatWeDo->sub_title !!}</h2>
                        @endif
                        @if(isset($whatWeDo) && $whatWeDo && $whatWeDo->description)
                            <div class="wow fadeInUp" data-wow-delay="0.2s">{!! $whatWeDo->description !!}</div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-us-image position-sticky" style="padding:0; margin:0;">
                        <div class="about-img-1 w-100">
                            <figure class="image-anime reveal" style="transform: translate(0px, 0px); opacity: 1; visibility: inherit;">
                                <img class="w-100" src="https://hexagroupsintl.com/Adlinedev/uploads/who-we-are/image/list-2.png" alt="Who We Are" style="transform: translate(0px, 0px);">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="services-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                @foreach($homeServices as $service)
                                    @php $serviceImage = $service->thumbnail_image ?: $service->image; @endphp
                                    <div class="swiper-slide">
                                        <div class="service-box">
                                            @if($serviceImage)
                                                <div class="service-image">
                                                    <a href="{{ url('service/'.$service->short_url) }}" data-cursor-text="View">
                                                        <figure class="image-anime">
                                                            <img src="{{ asset($serviceImage) }}" {!! imageAltAttr($service->thumbnail_image_meta_tag ?: $service->image_meta_tag, $service->title) !!}>
                                                        </figure>
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="service-item">
                                                @if($service->image && $service->image !== $serviceImage)
                                                    <!--<div class="icon-box">-->
                                                    <!--    <img src="{{ asset($service->image) }}" {!! imageAltAttr($service->image_meta_tag, $service->title) !!}>-->
                                                    <!--</div>-->
                                                @endif
                                                <div class="service-content">
                                                    <h3><a href="{{ url('service/'.$service->short_url) }}">{{ $service->title }}</a></h3>
                                                    @if($service->home_description)
                                                        <p class="line-limit02">{!! strip_tags($service->home_description) !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="services-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
