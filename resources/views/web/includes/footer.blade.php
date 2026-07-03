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
    <!--<a href="https://wa.me/{{ str_replace(' ', '', $siteInformation->whatsapp_number) }}" class="whatsAppFixed wht1">-->
    <!--    <i class="fa-brands fa-whatsapp"></i>-->
    <!--</a>-->
    
    <a href="https://wa.me/{{ str_replace(' ', '', $siteInformation->whatsapp_number) }}" class="whatsAppFixed wht1">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_295_8)">
<path d="M0.0605469 28L2.0293 20.8086C0.815234 18.7086 0.180859 16.3187 0.180859 13.8742C0.180859 6.22344 6.40977 0 14.0605 0C17.7738 0 21.2574 1.44922 23.877 4.06875C26.4965 6.69375 27.9402 10.1773 27.9402 13.8852C27.9348 21.5359 21.7113 27.7594 14.0605 27.7594H14.0551C11.7309 27.7594 9.45039 27.1742 7.42148 26.0695L0.0605469 28ZM7.76055 23.5594L8.18164 23.8109C9.95352 24.8609 11.9824 25.4187 14.0551 25.4187H14.0605C20.4207 25.4187 25.5941 20.2453 25.5941 13.8852C25.5941 10.8062 24.3965 7.90781 22.2199 5.72578C20.0434 3.54375 17.1449 2.34609 14.066 2.34609C7.70039 2.34609 2.52695 7.51953 2.52695 13.8797C2.52695 16.0563 3.13398 18.1781 4.28789 20.0156L4.56133 20.4531L3.39648 24.7078L7.76055 23.5594Z" fill="white"/>
<path d="M0.546875 27.5134L2.45 20.5735C1.27422 18.5446 0.65625 16.2368 0.65625 13.8798C0.661719 6.49151 6.67187 0.486816 14.0547 0.486816C17.6367 0.486816 21.0055 1.88135 23.532 4.41338C26.0641 6.94541 27.4586 10.3087 27.4531 13.8907C27.4477 21.2735 21.4375 27.2837 14.0547 27.2837H14.0492C11.807 27.2837 9.60312 26.7204 7.64531 25.654L0.546875 27.5134Z" fill="url(#paint0_linear_295_8)"/>
<path d="M0.0605469 28L2.0293 20.8086C0.815234 18.7086 0.180859 16.3187 0.180859 13.8742C0.180859 6.22344 6.40977 0 14.0605 0C17.7738 0 21.2574 1.44922 23.877 4.06875C26.4965 6.69375 27.9402 10.1773 27.9402 13.8852C27.9348 21.5359 21.7113 27.7594 14.0605 27.7594H14.0551C11.7309 27.7594 9.45039 27.1742 7.42148 26.0695L0.0605469 28ZM7.76055 23.5594L8.18164 23.8109C9.95352 24.8609 11.9824 25.4187 14.0551 25.4187H14.0605C20.4207 25.4187 25.5941 20.2453 25.5941 13.8852C25.5941 10.8062 24.3965 7.90781 22.2199 5.72578C20.0434 3.54375 17.1449 2.34609 14.066 2.34609C7.70039 2.34609 2.52695 7.51953 2.52695 13.8797C2.52695 16.0563 3.13398 18.1781 4.28789 20.0156L4.56133 20.4531L3.39648 24.7078L7.76055 23.5594Z" fill="url(#paint1_linear_295_8)"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M10.5875 8.07178C10.325 7.4921 10.0516 7.48116 9.80547 7.47022C9.60312 7.45928 9.37344 7.46475 9.13828 7.46475C8.90859 7.46475 8.53125 7.55225 8.21406 7.89678C7.89687 8.24131 7 9.0835 7 10.7898C7 12.496 8.24141 14.1476 8.41641 14.3773C8.59141 14.6069 10.8172 18.2218 14.3391 19.6108C17.2703 20.7648 17.8664 20.5351 18.5008 20.4804C19.1352 20.4257 20.5516 19.6437 20.8414 18.8343C21.1312 18.0249 21.1312 17.3304 21.0437 17.1882C20.9562 17.046 20.7266 16.9585 20.3766 16.7835C20.032 16.6085 18.3258 15.7718 18.0086 15.6569C17.6914 15.5421 17.4617 15.4819 17.2266 15.8319C16.9969 16.1765 16.3297 16.9585 16.1273 17.1882C15.925 17.4179 15.7227 17.4507 15.3781 17.2757C15.0336 17.1007 13.9125 16.7343 12.5891 15.553C11.5555 14.6343 10.8609 13.4968 10.6586 13.1523C10.4562 12.8077 10.6367 12.6163 10.8117 12.4468C10.9648 12.2937 11.1562 12.0421 11.3312 11.8398C11.5062 11.6374 11.5609 11.4952 11.6758 11.2601C11.7906 11.0304 11.7359 10.828 11.6484 10.653C11.5719 10.4726 10.8992 8.76085 10.5875 8.07178Z" fill="white"/>
</g>
<defs>
<linearGradient id="paint0_linear_295_8" x1="13.9999" y1="27.5156" x2="13.9999" y2="0.484957" gradientUnits="userSpaceOnUse">
<stop stop-color="#20B038"/>
<stop offset="1" stop-color="#60D66A"/>
</linearGradient>
<linearGradient id="paint1_linear_295_8" x1="14.0004" y1="28" x2="14.0004" y2="0" gradientUnits="userSpaceOnUse">
<stop stop-color="#F9F9F9"/>
<stop offset="1" stop-color="white"/>
</linearGradient>
<clipPath id="clip0_295_8">
<rect width="28" height="28" fill="white"/>
</clipPath>
</defs>
</svg>

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
