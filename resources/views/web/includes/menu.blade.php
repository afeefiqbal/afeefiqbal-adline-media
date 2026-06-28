<header class="main-header brLight">
    <div class="header-sticky">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    @if(isset($siteInformation) && $siteInformation->site_logo)
                        <img src="{{ asset($siteInformation->site_logo) }}" {!! imageAltAttr($siteInformation->site_logo_attribute, config('app.name')) !!}>
                    @else
                        <span class="navbar-brand-text">{{ config('app.name') }}</span>
                    @endif
                </a>

                <div class="collapse navbar-collapse main-menu">
                    <div class="nav-menu-wrapper">
                        <ul class="navbar-nav mr-auto" id="menu">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == null || Request::segment(1) == 'home' ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'about-us' ? 'active' : '' }}" href="{{ url('about-us') }}">About Us</a>
                            </li>
                            @if($serviceExist > 0)
                                <li class="nav-item submenu">
                                    <a class="nav-link {{ Request::segment(1) == 'service' ? 'active' : '' }}" href="#">
                                        Services
                                        <svg width="13" height="7" viewBox="0 0 13 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_278_11)">
                                                <mask id="mask0_278_11" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="13" height="7">
                                                    <path d="M13 0H0V7H13V0Z" fill="white"/>
                                                </mask>
                                                <g mask="url(#mask0_278_11)">
                                                    <path d="M11.56 1L7.21333 5.34667C6.7 5.86 5.86 5.86 5.34667 5.34667L1 1" stroke="#7B798C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_278_11">
                                                    <rect width="13" height="7" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                    <ul class="submenu-list">
                                        @include('web.includes._service_submenu', ['services' => $menuServices])
                                    </ul>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'portfolio' || Request::segment(1) == 'project' ? 'active' : '' }}" href="{{ url('portfolio') }}">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'blogs' || Request::segment(1) == 'blog' ? 'active' : '' }}" href="{{ url('blogs') }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'contact-us' ? 'active' : '' }}" href="{{ url('contact-us') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="header-btn">
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#requestModal" class="btn-default">Request Quote</a>
                    </div>
                </div>
                <div class="navbar-toggle"></div>
            </div>
        </nav>
        <div class="responsive-menu"></div>
    </div>
</header>

<div class="modal fade requestModal" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestModalLabel">Request a Free Quote</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body contact-form">
                @include('web.render._quote_form')
            </div>
        </div>
    </div>
</div>
