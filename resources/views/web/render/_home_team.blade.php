@if($teams->isNotEmpty())
    <div class="our-team bg-section">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title">
                        @if($teamHeading && $teamHeading->title)
                            <h3 class="wow fadeInUp">{{ $teamHeading->title }}</h3>
                        @endif
                        @if($teamHeading && $teamHeading->sub_title)
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{!! $teamHeading->sub_title !!}</h2>
                        @endif
                        @if($teamHeading && $teamHeading->description)
                            <div class="wow fadeInUp" data-wow-delay="0.2s">{!! $teamHeading->description !!}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper" data-cursor-text="Drag">
                                @foreach($teams as $member)
                                    <div class="swiper-slide">
                                        <div class="team-item wow fadeInUp" data-wow-delay="{{ $loop->index * 0.2 }}s">
                                            @if($member->image)
                                                <div class="team-image">
                                                    <a href="{{ url('team/'.$member->short_url) }}" data-cursor-text="View">
                                                        <figure class="image-anime">
                                                            <img src="{{ asset($member->image) }}" {!! imageAltAttr($member->image_attribute, $member->title) !!}>
                                                        </figure>
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="team-body">
                                                <div class="team-content">
                                                    <h3><a href="{{ url('team/'.$member->short_url) }}">{{ $member->title }}</a></h3>
                                                    @if($member->designation)
                                                        <p>{{ $member->designation }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="team-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
