@if($testimonials->isNotEmpty())
    <div class="our-testimonials">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Client Testimonials</h3>
                        <h2 class="text-anime-style-3">What They're Saying About Our Work</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper" data-cursor-text="Drag">
                                @foreach($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="testimonial-item">
                                            <div class="testimonial-quote">
                                                @if($homeSettings && $homeSettings->testimonial_quote_icon)
                                                    <img src="{{ asset($homeSettings->testimonial_quote_icon) }}" {!! imageAltAttr($homeSettings->testimonial_quote_icon_attribute, 'Testimonial quote') !!}>
                                                @endif
                                            </div>
                                            <div class="testimonial-body">
                                                <div class="testimonial-rating">
                                                    @for($i = 0; $i < 5; $i++)
                                                        <i class="fa-solid fa-star"></i>
                                                    @endfor
                                                </div>
                                                <div class="testimonial-content">
                                                    {!! $testimonial->message !!}
                                                </div>
                                                <div class="author-info">
                                                    <div class="author-content">
                                                        <h3>{{ $testimonial->title }}</h3>
                                                        @if($testimonial->designation)
                                                            <p>{{ $testimonial->designation }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="testimonial-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
