@extends('web.layouts.main')
@section('content')
    @include('web.render._page_header', ['pageTitle' => 'Privacy Policy', 'banner' => $banner ?? null])

    <div class="page-service-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="service-entry">
                        @if(isset($siteInformation) && $siteInformation->privacy_policy)
                            {!! $siteInformation->privacy_policy !!}
                        @else
                            <p>Privacy policy content is not available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
