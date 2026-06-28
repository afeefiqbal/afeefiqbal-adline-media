@if($whoWeAre)
    <div class="about-us">
        <div class="container">
            <div class="row">
                @if($whoWeAre->image || $whoWeAre->image_2)
                    <div class="col-lg-6">
                        <div class="about-us-image position-sticky">
                            @if($whoWeAre->image)
                                <div class="about-img-1">
                                    <figure class="image-anime reveal">
                                        <img src="{{ asset($whoWeAre->image) }}" {!! imageAltAttr($whoWeAre->image_attribute, strip_tags($whoWeAre->title ?? '')) !!}>
                                    </figure>
                                </div>
                            @endif
                            @if($whoWeAre->image_2)
                                <div class="about-img-2">
                                    <figure class="image-anime reveal">
                                        <img src="{{ asset($whoWeAre->image_2) }}" {!! imageAltAttr($whoWeAre->image_2_attribute, strip_tags($whoWeAre->title ?? '')) !!}>
                                    </figure>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                <div class="col-lg-6">
                    <div class="about-us-content">
                        <div class="section-title mb-4">
                            @if($whoWeAre->title)
                                <h3 class="wow fadeInUp">{{ $whoWeAre->title }}</h3>
                            @endif
                            @if($whoWeAre->sub_title)
                                <h2 class="text-anime-style-3">{!! $whoWeAre->sub_title !!}</h2>
                            @endif
                            @if($whoWeAre->description)
                                <div class="textAreaC wow fadeInUp" data-wow-delay="0.2s">{!! $whoWeAre->description !!}</div>
                            @endif
                        </div>
                        <div class="about-us-body">
                            <div class="about-body-content">
                                @if($whoWeAre->button_text)
                                    <div class="about-body-footer wow fadeInUp" data-wow-delay="0.6s">
                                        <a href="{{ url($whoWeAre->button_url ?: 'about-us') }}" class="btn-default">{{ $whoWeAre->button_text }}</a>
                                    </div>
                                @endif
                            </div>
                            @if($whoWeAre->count)
                                @php $countData = explodePlus($whoWeAre->count); @endphp
                                <div class="about-team-member wow fadeInUp" data-wow-delay="0.6s">
                                    @if($whoWeAre->count_icon)
                                        <img src="{{ asset($whoWeAre->count_icon) }}" {!! imageAltAttr($whoWeAre->count_icon_attribute, 'Team members') !!}>
                                    @endif
                                    <h2><span class="counter">{{ $countData['value'] }}</span>{{ $countData['plus'] }}</h2>
                                    <p>Team members</p>
                                </div>
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
                @endif
            </div>
        </div>
    </div>
@endif
