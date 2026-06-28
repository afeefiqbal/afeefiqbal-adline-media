@if($portfolios->isNotEmpty())
    <div class="our-services bg-section bg-prim">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp color-white">Let's go with us</h3>
                        <h2 class="text-anime-style-3">Our Projects</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="portfolio-slider ps-4 pe-4">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                                @foreach($portfolios as $portfolio)
                                @php $image = $portfolio->thumbnail?->image ?? $portfolio->banner; @endphp
                                @if($image)
                                <div class="swiper-slide">
                                    <div class="service-box">
                                        <div class="service-image">
                                            <a href="{{ url('project/'.$portfolio->short_url) }}" data-cursor-text="View">
                                                <figure class="image-anime">
                                                    <img src="{{ asset($image) }}" {!! imageAltAttr($portfolio->thumbnail?->image_attribute, $portfolio->title) !!}>
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="service-item">
                                            <div class="service-content">
                                                <h3><a href="{{ url('project/'.$portfolio->short_url) }}">{{ $portfolio->title }}</a></h3>
                                                @if($portfolio->location)
                                                    <p>{{ $portfolio->location }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="portfolio-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
