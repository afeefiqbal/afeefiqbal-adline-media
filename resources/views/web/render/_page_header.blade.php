@php
    $pageBanner = $banner ?? null;
    $hasPageBanner = $pageBanner && $pageBanner->banner && $pageBanner->status === 'Active';
@endphp
<div class="page-header bg-section dark-section {{ $hasPageBanner ? 'page-header-has-banner' : '' }}">
    @if($hasPageBanner)
        <div class="page-header-bg">
            <img src="{{ asset($pageBanner->banner) }}" {!! imageAltAttr($pageBanner->banner_meta_tag, $pageBanner->title ?: $pageTitle) !!}>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header-box">
                    <h1 class="text-anime-style-3 {{ isset($headerClass) ? $headerClass : '' }}" data-cursor="-opaque">{{ $pageTitle }}</h1>
                    @if(isset($pageMeta))
                        <div class="post-single-meta wow fadeInUp">{!! $pageMeta !!}</div>
                    @else
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">home</a></li>
                                @if(isset($breadcrumb))
                                    {!! $breadcrumb !!}
                                @else
                                    <li class="breadcrumb-item active" aria-current="page">{{ strtolower($pageTitle) }}</li>
                                @endif
                            </ol>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
