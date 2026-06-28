@if($whatWeDo)
    <div class="why-choose-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="why-choose-content">
                        <div class="section-title section-title-center">
                            @if($whatWeDo->title)
                                <h3 class="wow fadeInUp">{{ $whatWeDo->title }}</h3>
                            @endif
                            @if($whatWeDo->sub_title)
                                <h2 class="text-anime-style-3">{!! $whatWeDo->sub_title !!}</h2>
                            @endif
                            @if($whatWeDo->description)
                                <div class="wow fadeInUp" data-wow-delay="0.2s">{!! $whatWeDo->description !!}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @if($whatWeDo->image)
                    <div class="col-lg-5">
                        <div class="why-choose-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset($whatWeDo->image) }}" {!! imageAltAttr($whatWeDo->image_attribute, strip_tags($whatWeDo->title ?? '')) !!}>
                            </figure>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif
