@if($whyChooseUs->isNotEmpty())
    <div class="why-choose-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="why-choose-content">
                        @if($whyChooseHeading)
                            <div class="section-title section-title-center">
                                @if($whyChooseHeading->title)
                                    <h3 class="wow fadeInUp">{{ $whyChooseHeading->title }}</h3>
                                @endif
                                @if($whyChooseHeading->sub_title)
                                    <h2 class="text-anime-style-3">{!! $whyChooseHeading->sub_title !!}</h2>
                                @endif
                                @if($whyChooseHeading->description)
                                    <div class="wow fadeInUp" data-wow-delay="0.2s">{!! $whyChooseHeading->description !!}</div>
                                @endif
                            </div>
                        @endif
                        <div class="why-choose-list">
                            @foreach($whyChooseUs as $item)
                                <div class="why-choose-list-item wow fadeInUp" data-wow-delay="{{ 0.4 + ($loop->index * 0.2) }}s">
                                    @if($item->image)
                                        <div class="icon-box">
                                            <img src="{{ asset($item->image) }}" {!! imageAltAttr($item->image_attribute, $item->title) !!}>
                                        </div>
                                    @endif
                                    <div class="why-choose-item-content">
                                        <h3 class="color-black">{{ $item->title }}</h3>
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if($whyChooseHeading && $whyChooseHeading->image)
                    <div class="col-lg-5">
                        <div class="why-choose-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset($whyChooseHeading->image) }}" {!! imageAltAttr($whyChooseHeading->image_attribute, strip_tags($whyChooseHeading->sub_title ?? '')) !!}>
                            </figure>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif
