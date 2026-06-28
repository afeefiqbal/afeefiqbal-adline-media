@php
    $primaryOffice = \App\Models\OfficeAddress::where('status', 'Active')->orderBy('sort_order')->first();
    $workingHoursLines = collect(preg_split("/\r\n|\n|\r/", $homeSettings->working_hours ?? ''))
        ->map(fn ($line) => trim($line))
        ->filter()
        ->values();
    $hasCtaContent = (isset($siteInformation) && ($siteInformation->email_id || $siteInformation->phone_number))
        || $primaryOffice
        || $workingHoursLines->isNotEmpty();
@endphp

@if($hasCtaContent)
    <div class="hero-cta-box brLight">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-cta-info">
                        @if(isset($siteInformation) && ($siteInformation->email_id || $siteInformation->phone_number))
                            <div class="hero-cta-item wow fadeInUp">
                                <div class="hero-cta-item-header">
                                    @if($homeSettings && $homeSettings->cta_contact_icon)
                                        <div class="icon-box">
                                            <img src="{{ asset($homeSettings->cta_contact_icon) }}" {!! imageAltAttr($homeSettings->cta_contact_icon_attribute, 'Contact Us') !!}>
                                        </div>
                                    @endif
                                    <div class="hero-cta-item-title"><h3>Contact Us</h3></div>
                                </div>
                                <div class="hero-cta-item-content">
                                    @if($siteInformation->email_id)
                                        <p><a href="mailto:{{ $siteInformation->email_id }}"><span>Email:</span> {{ $siteInformation->email_id }}</a></p>
                                    @endif
                                    @if($siteInformation->phone_number)
                                        <p><a href="tel:{{ $siteInformation->phone_number }}"><span>Phone:</span> {{ $siteInformation->phone_number }}</a></p>
                                    @endif
                                </div>
                            </div>
                        @endif
                        @if($primaryOffice)
                            <div class="hero-cta-item wow fadeInUp" data-wow-delay="0.2s">
                                <div class="hero-cta-item-header">
                                    @if($homeSettings && $homeSettings->cta_location_icon)
                                        <div class="icon-box">
                                            <img src="{{ asset($homeSettings->cta_location_icon) }}" {!! imageAltAttr($homeSettings->cta_location_icon_attribute, 'Our Location') !!}>
                                        </div>
                                    @endif
                                    <div class="hero-cta-item-title"><h3>Our Location</h3></div>
                                </div>
                                <div class="hero-cta-item-content">
                                    <p>{!! strip_tags($primaryOffice->address) !!}</p>
                                </div>
                            </div>
                        @endif
                        @if($workingHoursLines->isNotEmpty())
                            <div class="hero-cta-item wow fadeInUp" data-wow-delay="0.4s">
                                <div class="hero-cta-item-header">
                                    @if($homeSettings && $homeSettings->cta_working_hours_icon)
                                        <div class="icon-box">
                                            <img src="{{ asset($homeSettings->cta_working_hours_icon) }}" {!! imageAltAttr($homeSettings->cta_working_hours_icon_attribute, 'Working Hours') !!}>
                                        </div>
                                    @endif
                                    <div class="hero-cta-item-title"><h3>Working Hours</h3></div>
                                </div>
                                <div class="hero-cta-item-content">
                                    @foreach($workingHoursLines as $line)
                                        <p>{{ $line }}</p>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
