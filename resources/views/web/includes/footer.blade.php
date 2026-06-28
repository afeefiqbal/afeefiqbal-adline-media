<footer class="footer-main bg-section dark-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="about-footer">
                    <div class="footer-logo">
                        @if(isset($siteInformation) && $siteInformation->footer_logo)
                            <img src="{{ asset($siteInformation->footer_logo) }}" {!! imageAltAttr($siteInformation->footer_logo_attribute, config('app.name')) !!}>
                        @elseif(isset($siteInformation) && $siteInformation->site_logo)
                            <img src="{{ asset($siteInformation->site_logo) }}" {!! imageAltAttr($siteInformation->site_logo_attribute, config('app.name')) !!}>
                        @endif
                    </div>
                    <div class="about-footer-content mt-3">
                        @if(isset($siteInformation) && $siteInformation->footer_description)
                            <p style="font-size: 14px">{!! $siteInformation->footer_description !!}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="footer-links">
                    <h3>contact us</h3>
                    @if(isset($siteInformation) && $siteInformation->phone_number)
                        <div class="footer-contact-item">
                            <div class="icon-box">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="footer-contact-content">
                                <h3>For more information</h3>
                                <p><a href="tel:{{ $siteInformation->phone_number }}">{{ $siteInformation->phone_number }}</a></p>
                            </div>
                        </div>
                    @endif
                    @if(isset($siteInformation) && $siteInformation->email_id)
                        <div class="footer-contact-item">
                            <div class="icon-box">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="footer-contact-content">
                                <h3>Mail</h3>
                                <p><a href="mailto:{{ $siteInformation->email_id }}">{{ $siteInformation->email_id }}</a></p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            @if($homeServices->isNotEmpty())
                <div class="col-lg-4 col-md-5">
                    <div class="footer-links">
                        <h3>Services</h3>
                        <ul class="gridUl">
                            @foreach($homeServices->take(8) as $hService)
                                <li><a href="{{ url('service/'.$hService->short_url) }}">{{ $hService->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="col-lg-2 col-md-3">
                <div class="footer-links">
                    <h3>quick link</h3>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('about-us') }}">About us</a></li>
                        <li><a href="{{ url('portfolio') }}">Portfolio</a></li>
                        <li><a href="{{ url('blogs') }}">Blog</a></li>
                        <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                        <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="footer-copyright">
                    <div class="footer-copyright-text">
                        <p>Copyright © {{ date('Y') }} All Rights Reserved.</p>
                    </div>
                    <div class="footer-social-links">
                        <span>Follow us on social</span>
                        <ul>
                            @if(isset($siteInformation) && $siteInformation->facebook_url)
                                <li><a href="{{ $siteInformation->facebook_url }}" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a></li>
                            @endif
                            @if(isset($siteInformation) && $siteInformation->instagram_url)
                                <li><a href="{{ $siteInformation->instagram_url }}" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a></li>
                            @endif
                            @if(isset($siteInformation) && $siteInformation->linkedin_url)
                                <li><a href="{{ $siteInformation->linkedin_url }}" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            @endif
                            @if(isset($siteInformation) && $siteInformation->twitter_url)
                                <li><a href="{{ $siteInformation->twitter_url }}" target="_blank" rel="noopener"><i class="fa-brands fa-x-twitter"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@if(isset($siteInformation) && $siteInformation->whatsapp_number)
    <a href="https://wa.me/{{ str_replace(' ', '', $siteInformation->whatsapp_number) }}" class="whatsAppFixed wht1">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
@endif

<div class="bottomBar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bottomBtn">
                    @if(isset($siteInformation) && $siteInformation->email_id)
                        <a class="icon em2" href="mailto:{{ $siteInformation->email_id }}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.418 2.67188H1.58203C0.707941 2.67188 0 3.38421 0 4.25391V13.7461C0 14.621 0.713145 15.3281 1.58203 15.3281H16.418C17.2847 15.3281 18 14.6239 18 13.7461V4.25391C18 3.38576 17.2949 2.67188 16.418 2.67188ZM16.1964 3.72656C15.8732 4.04807 10.3107 9.58124 10.1187 9.77228C9.81984 10.0711 9.42258 10.2356 9 10.2356C8.57742 10.2356 8.18016 10.0711 7.88034 9.77129C7.75118 9.6428 2.25011 4.17073 1.80359 3.72656H16.1964ZM1.05469 13.5314V4.46924L5.61227 9.00281L1.05469 13.5314ZM1.80425 14.2734L6.36005 9.74661L7.13556 10.518C7.63358 11.0161 8.29571 11.2903 9 11.2903C9.70429 11.2903 10.3664 11.0161 10.8635 10.519L11.64 9.74661L16.1957 14.2734H1.80425ZM16.9453 13.5314L12.3877 9.00281L16.9453 4.46924V13.5314Z" fill="white"/>
                            </svg>
                        </a>
                    @endif
                    @if(isset($siteInformation) && $siteInformation->phone_number)
                        <a class="icon ph2" href="tel:{{ $siteInformation->phone_number }}">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.2243 11.1503C13.8558 10.7666 13.4113 10.5615 12.9402 10.5615C12.473 10.5615 12.0247 10.7628 11.641 11.1465L10.4405 12.3432C10.3417 12.29 10.2429 12.2407 10.1479 12.1913C10.0112 12.1229 9.88202 12.0583 9.77185 11.9899C8.64734 11.2757 7.6254 10.3449 6.64525 9.14065C6.17037 8.54041 5.85125 8.03514 5.61951 7.52227C5.93103 7.23734 6.21976 6.94102 6.50089 6.65609C6.60726 6.54972 6.71363 6.43955 6.82 6.33318C7.6178 5.53538 7.6178 4.50205 6.82 3.70425L5.78287 2.66712C5.6651 2.54935 5.54353 2.42778 5.42956 2.30621C5.20162 2.07067 4.96228 1.82754 4.71535 1.59959C4.34684 1.23489 3.90615 1.04114 3.44267 1.04114C2.97919 1.04114 2.53091 1.23489 2.15101 1.59959C2.14721 1.60339 2.14721 1.60339 2.14341 1.60719L0.851739 2.91026C0.365464 3.39653 0.0881355 3.98918 0.0273512 4.6768C-0.0638254 5.78612 0.262891 6.81945 0.513626 7.49568C1.12907 9.15585 2.04843 10.6945 3.41988 12.3432C5.08385 14.3301 7.08594 15.8991 9.37295 17.0046C10.2467 17.4187 11.413 17.9088 12.7161 17.9924C12.7959 17.9962 12.8794 18 12.9554 18C13.833 18 14.57 17.6847 15.1475 17.0578C15.1513 17.0502 15.1589 17.0464 15.1627 17.0388C15.3602 16.7995 15.5882 16.5829 15.8275 16.3512C15.9908 16.1954 16.158 16.0321 16.3214 15.8611C16.6975 15.4698 16.895 15.0139 16.895 14.5467C16.895 14.0756 16.6937 13.6235 16.31 13.2436L14.2243 11.1503Z" fill="white"/>
                            </svg>
                        </a>
                    @endif
                    @if(isset($siteInformation) && $siteInformation->whatsapp_number)
                        <a class="icon whatsApp wht2" href="https://wa.me/{{ str_replace(' ', '', $siteInformation->whatsapp_number) }}">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{!! isset($extra_meta_data) ? $extra_meta_data->footer_tag : '' !!}
