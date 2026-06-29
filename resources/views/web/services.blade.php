@extends('web.layouts.main')
@section('content')
    @include('web.render._page_header', ['pageTitle' => 'Services', 'banner' => $banner ?? null])

    <div class="page-services our-services">
        <div class="container">
            @if(isset($whatWeDo) && $whatWeDo)
                <div class="row section-row">
                    <div class="col-lg-12">
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
            @endif

            <div class="row">
                @forelse($services as $service)
                    @php $serviceImage = $service->thumbnail_image ?: $service->image; @endphp
                    <div class="col-lg-4 col-md-6">
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
                                    <div class="icon-box">
                                        <img src="{{ asset($service->image) }}" {!! imageAltAttr($service->image_meta_tag, $service->title) !!}>
                                    </div>
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
                @empty
                    <div class="col-12"><p>No services available.</p></div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
