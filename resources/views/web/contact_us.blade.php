@extends('web.layouts.main')
@section('content')
    @php
        $workingHoursLines = collect(preg_split("/\r\n|\n|\r/", $homeSettings->working_hours ?? ''))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values();
    @endphp

    @include('web.render._page_header', ['pageTitle' => 'Contact us'])

    <div class="page-contact-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="contact-us-image">
                        @if($siteInformation->contact_image)
                            <div class="contact-us-img">
                                <figure class="image-anime">
                                    <img src="{{ asset($siteInformation->contact_image) }}" {!! imageAltAttr($siteInformation->contact_image_attribute, 'Contact Us') !!}>
                                </figure>
                            </div>
                        @endif

                        @if($workingHoursLines->isNotEmpty())
                            <div class="opeaning-hour-box wow fadeInUp">
                                @if($homeSettings && $homeSettings->cta_working_hours_icon)
                                    <div class="icon-box">
                                        <img src="{{ asset($homeSettings->cta_working_hours_icon) }}" {!! imageAltAttr($homeSettings->cta_working_hours_icon_attribute, 'Opening hours') !!}>
                                    </div>
                                @endif
                                <div class="opeaning-hour-content">
                                    <h3>Opening hours</h3>
                                    @foreach($workingHoursLines as $line)
                                        <p>{{ $line }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="contact-us-content">
                        <div class="section-title">
                            <h2 class="text-anime-style-3" data-cursor="-opaque">
                                {{ $siteInformation->contact_form_title ?? 'Get in touch with us' }}
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay="0.2s">Have questions or need assistance? Reach out to us for expert guidance, personalized solutions, and exceptional support. We're here to help!</p>
                        </div>

                        <div class="contact-form">
                            <form id="contactForm" role="form" method="post" class="wow fadeInUp" data-wow-delay="0.4s">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="text" class="form-control contact-required" autocomplete="off" name="contact_name" id="contact_name" placeholder="First Name" required>
                                        <div class="invalid" id="contact_name_error"></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="email" class="form-control contact-required" autocomplete="off" name="contact_email" id="contact_email" placeholder="E-mail Address" required>
                                        <div class="invalid" id="contact_email_error"></div>
                                    </div>
                                    <div class="form-group col-md-6 mb-4">
                                        <input type="text" class="form-control contact-required" autocomplete="off" name="contact_phone" id="contact_phone" placeholder="Phone No." required>
                                        <div class="invalid" id="contact_phone_error"></div>
                                    </div>
                                    <div class="form-group col-md-12 mb-5">
                                        <textarea class="form-control" name="contact_comments" autocomplete="off" id="contact_comments" rows="4" placeholder="Write Message"></textarea>
                                    </div>
                                    @include('web.render._form_math_captcha', ['formFlag' => 'contact'])
                                    <div class="col-md-12">
                                        <input type="hidden" name="prefixKey" value="contact">
                                        <button data-url="contact-form-submit" data-flag="contact" class="submit-form-btn btn-default" type="submit"><span>send message</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($officeAddress->isNotEmpty())
        <div class="contact-info">
            <div class="container">
                <div class="row">
                    @foreach($officeAddress as $oAddress)
                        <div class="col-lg-4 col-md-6">
                            <div class="contact-info-item wow fadeInUp" @if(!$loop->first) data-wow-delay="{{ $loop->index * 0.2 }}s" @endif>
                                <div class="contact-info-content">
                                    <h2 class="fw-bold color-white">{{ $oAddress->title }}</h2>
                                    @if($oAddress->address)
                                        <p class="mt-4">{!! $oAddress->address !!}</p>
                                    @endif
                                    @if($oAddress->mobile)
                                        <p class="mt-2"><a class="fw-bold" href="tel:{{ strip_tags($oAddress->mobile) }}">{!! $oAddress->mobile !!}</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @php $mapEmbed = googleMapEmbed($siteInformation->google_map ?? ''); @endphp
    @if($mapEmbed)
        <div class="google-map bg-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="google-map-iframe">{!! $mapEmbed !!}</div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
