@extends('web.layouts.main')
@section('content')
    @include('web.render._page_header', ['pageTitle' => 'Portfolio'])

    <div class="page-portfolio portfolio">
        <div class="container">
            @if($categorys->isNotEmpty())
                <div class="row">
                    <div class="col-12 d-flex justify-content-center lineBg">
                        <div class="nav flex-row nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach($categorys as $category)
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="v-pills-{{ $category->short_url }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $category->short_url }}" type="button" role="tab">{{ $category->title }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach($categorys as $category)
                            <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="v-pills-{{ $category->short_url }}" role="tabpanel">
                                <div class="row">
                                    @forelse($category->portfolios->where('status', 'Active') as $portfolio)
                                        @php $image = $portfolio->thumbnail?->image ?? $portfolio->banner; @endphp
                                        <div class="col-lg-4 col-md-6 mb-4">
                                            <div class="service-box">
                                                @if($image)
                                                <div class="service-image">
                                                    <a href="{{ url('project/'.$portfolio->short_url) }}" data-cursor-text="View">
                                                        <figure class="image-anime">
                                                            <img src="{{ asset($image) }}" {!! imageAltAttr($portfolio->thumbnail?->image_attribute, $portfolio->title) !!}>
                                                        </figure>
                                                    </a>
                                                </div>
                                                @endif
                                                <div class="service-item">
                                                    <div class="service-content">
                                                        <h3><a href="{{ url('project/'.$portfolio->short_url) }}">{{ $portfolio->title }}</a></h3>
                                                        @if($portfolio->location)<p>{{ $portfolio->location }}</p>@endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12"><p>No portfolio items in this category.</p></div>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
