@extends('web.layouts.main')
@section('content')
    @include('web.render._page_header', [
        'pageTitle' => $service->title,
        'banner' => $pageBanner ?? null,
        'breadcrumb' => '<li class="breadcrumb-item"><a href="'.url('service').'">services</a></li><li class="breadcrumb-item active" aria-current="page">'.$service->title.'</li>'
    ])

    <div class="page-service-single">
        <div class="container">
            <div class="row flex-lg-row flex-column-reverse">
                <div class="col-lg-4">
                    <div class="page-single-sidebar">
                        <div class="page-catagery-list wow fadeInUp">
                            <h3>Service category</h3>
                            <ul>
                                @foreach($servicesList->where('parent_id', 0) as $parentService)
                                    @php
                                        $isParentActive = $service->id == $parentService->id || $service->parent_id == $parentService->id;
                                    @endphp
                                    <li>
                                        <a href="{{ url('service/'.$parentService->short_url) }}" class="{{ $isParentActive ? 'active' : '' }}">{{ $parentService->title }}</a>
                                    </li>
                                    @if($parentService->sub->isNotEmpty() && $isParentActive)
                                        <ul class="subListCat">
                                            @foreach($parentService->sub as $subService)
                                                <li>
                                                    <a href="{{ url('service/'.$parentService->short_url.'/'.$subService->short_url) }}" class="{{ $service->id == $subService->id ? 'active' : '' }}">{{ $subService->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="service-single-content">
                        @if($service->image || $service->banner)
                            <div class="service-feature-image">
                                <figure class="image-anime reeval">
                                    <img src="{{ asset($service->image ?: $service->banner) }}" {!! imageAltAttr($service->image ? $service->image_meta_tag : $service->banner_meta_tag, $service->title) !!}>
                                </figure>
                            </div>
                        @endif

                        <div class="service-entry">
                            <h2>{{ $service->title }}</h2>
                            {!! $service->description !!}
                        </div>

                        @if(isset($faqs) && $faqs->isNotEmpty())
                            <div class="page-single-faqs">
                                <div class="section-title">
                                    <h2 class="wow fadeInUp" data-cursor="-opaque">Frequently asked questions</h2>
                                </div>
                                <div class="faq-accordion page-faq-accordion" id="faqaccordion">
                                    @foreach($faqs as $faq)
                                        @php
                                            $headingId = 'heading'.$faq->id;
                                            $collapseId = 'collapse'.$faq->id;
                                            $isOpen = ($faqs->count() === 1 && $loop->first) || $loop->iteration === 2;
                                        @endphp
                                        <div class="accordion-item wow fadeInUp" @if($loop->index > 0) data-wow-delay="{{ number_format($loop->index * 0.2, 1) }}s" @endif>
                                            <h2 class="accordion-header" id="{{ $headingId }}">
                                                <button class="accordion-button {{ $isOpen ? '' : 'collapsed' }}" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                                                        aria-expanded="{{ $isOpen ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                                                    {{ $faq->question }}
                                                </button>
                                            </h2>
                                            <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $isOpen ? 'show' : '' }}"
                                                 aria-labelledby="{{ $headingId }}" data-bs-parent="#faqaccordion">
                                                <div class="accordion-body">
                                                    {!! $faq->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
