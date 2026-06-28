@extends('web.layouts.main')
@section('content')
<!-- Page Header Start -->
    <div class="page-header bg-section dark-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Page Header Box Start -->
                    <div class="page-header-box">
                        <h1 class="text-anime-style-3" data-cursor="-opaque">Page not found</h1>
                        <nav class="wow fadeInUp">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">404 error page</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Page Header Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- error section start -->
    <div class="error-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(isset($siteInformation) && $siteInformation->error_page_image)
                        <div class="error-page-image wow fadeInUp">
                            <img src="{{ asset($siteInformation->error_page_image) }}" {!! imageAltAttr($siteInformation->error_page_image_attribute, 'Page not found') !!}>
                        </div>
                    @endif

                    <!-- Error Page Content Start -->
                    <div class="error-page-content">
                        <div class="section-title">
                            <h2 class="text-anime-style-3" data-cursor="-opaque">Oops! page not found</h2>
                        </div>
                        <div class="error-page-content-body">
                            <p class="wow fadeInUp" data-wow-delay="0.25s">The page you are looking for does not exist</p>
                            <a class="btn-default wow fadeInUp" data-wow-delay="0.5s" href="{{ url('/') }}"><span>back to home</span></a>
                        </div>
                    </div>
                    <!-- Error Page Content End -->
                </div>
            </div>
        </div>
    </div>
    <!-- error section end -->
@endsection
