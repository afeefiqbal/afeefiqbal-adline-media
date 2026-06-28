
<header>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="index.php">
                        <img class="img-fluid" src="assets/images/logo.svg" alt="wales Logo">
                    </a>

                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item ">
                                <a class="nav-link" id="homeMenu" href="index.php"> Home </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" id="aboutMenu" href="about-us.php"> About Us </a>
                            </li>
                            <li class="nav-item dropdown has-megamenu">
                                <a id="servicesMenu"  class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                    Services
                                    <svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.6813 5.21379L7.86788 2.0272C8.21071 1.68438 8.21071 1.13071 7.86788 0.787882C7.52505 0.445055 6.97138 0.445055 6.62856 0.787882L4.06249 3.35566L1.49643 0.787882C1.1536 0.445054 0.599933 0.445054 0.257105 0.787882C-0.0857229 1.13071 -0.085723 1.68438 0.257105 2.0272L3.44369 5.21379C3.7848 5.5549 4.34018 5.5549 4.6813 5.21379Z" fill="#6D737A"/>
                                    </svg>
                                </a>
                                <ul class="dropdown-menu dropdown-menu2">
                                    <li>
                                        <a id="testSeriesUpscMenu" class="dropdown-item dropdown-itemSubmenu" href="services-details.php">
                                            Signages
                                        </a>
                                    </li>
                                    <li>
                                        <a id="" class="dropdown-item" href="services-details.php">
                                            Experiential Marketing
                                        </a>
                                        <ul class="submenu dropdown-menu">
                                            <li>
                                                <a id="testSeriesPolity" class="dropdown-item" href="services-details.php">
                                                    Virtual Reality
                                                </a>
                                            </li>
                                            <li>
                                                <a id="privacyTermMenu" class="dropdown-item" href="services-details.php">
                                                    Augmented Reality
                                                </a>
                                            </li>
                                            <li>
                                                <a id="privacyTermMenu" class="dropdown-item" href="services-details.php">
                                                    Hologram
                                                </a>
                                            </li>
                                            <li>
                                                <a id="privacyTermMenu" class="dropdown-item" href="services-details.php">
                                                    Permanent Interactive
                                                    Installations
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a id="" class="dropdown-item" href="services-details.php">
                                            Display Stands
                                        </a>
                                    </li>
                                    <li>
                                        <a id="" class="dropdown-item" href="services-details.php">
                                            Signages
                                        </a>
                                        <ul class="submenu dropdown-menu">
                                            <li>
                                                <a id="testSeriesPolity" class="dropdown-item" href="services-details.php">
                                                    Virtual Reality
                                                </a>
                                            </li>
                                            <li>
                                                <a id="privacyTermMenu" class="dropdown-item" href="services-details.php">
                                                    Augmented Reality
                                                </a>
                                            </li>
                                            <li>
                                                <a id="privacyTermMenu" class="dropdown-item" href="services-details.php">
                                                    Hologram
                                                </a>
                                            </li>
                                            <li>
                                                <a id="privacyTermMenu" class="dropdown-item" href="services-details.php">
                                                    Permanent Interactive
                                                    Installations
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a id="" class="dropdown-item" href="services-details.php">
                                            Display Stands
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" id="portfolioMenu" href="portfolio.php"> Portfolio </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" id="blogMenu" href="blog.php"> Blog </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" id="contactMenu" href="contact-us.php"> Contact Us </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mobile_right ">
                        <a class="social" href="mailto:example@mail.com" >
                            <i class="fa-solid fa-envelope"></i>
                        </a>
                        <a class="social" href="tel:+123400123" >
                            <i class="fa-solid fa-phone-volume"></i>
                        </a>
                        <a class="primary_btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#requestModal">
                            Request Quote
                        </a>
                        <a class="hamburgerMenu " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                            <img src="assets/images/svg/hamburgerMenu.svg" alt="">
                        </a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>


<div class="offcanvas offcanvas-start mobileMenu" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <a class="navbar-brand" href="index.php">
            <img class="img-fluid" src="assets/images/logo.svg" alt="Test Dona">
        </a>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item ">
                <a class="nav-link" id="homeMobileMenu" href="index.php"> Home </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="aboutMobileMenu" href="about-us.php"> About Us </a>
            </li>
            <li class="nav-item dropdown has-megamenu">
                <a id="servicesMobileMenu"  class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    Services
                    <svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.6813 5.21379L7.86788 2.0272C8.21071 1.68438 8.21071 1.13071 7.86788 0.787882C7.52505 0.445055 6.97138 0.445055 6.62856 0.787882L4.06249 3.35566L1.49643 0.787882C1.1536 0.445054 0.599933 0.445054 0.257105 0.787882C-0.0857229 1.13071 -0.085723 1.68438 0.257105 2.0272L3.44369 5.21379C3.7848 5.5549 4.34018 5.5549 4.6813 5.21379Z" fill="#6D737A"/>
                    </svg>
                </a>
                <ul class="dropdown-menu dropdown-menu2">
                    <li>
                        <a id="testSeriesUpscMobileMenu" class="dropdown-item " href="services-details.php" data-bs-toggle="dropdown">
                            Signages
                        </a>
                    </li>
                    <li>
                        <a id="testSeriesBpscMenu" class="dropdown-item " href="services-details.php" data-bs-toggle="dropdown">
                            Experiential Marketing
                            <svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.6813 5.21379L7.86788 2.0272C8.21071 1.68438 8.21071 1.13071 7.86788 0.787882C7.52505 0.445055 6.97138 0.445055 6.62856 0.787882L4.06249 3.35566L1.49643 0.787882C1.1536 0.445054 0.599933 0.445054 0.257105 0.787882C-0.0857229 1.13071 -0.085723 1.68438 0.257105 2.0272L3.44369 5.21379C3.7848 5.5549 4.34018 5.5549 4.6813 5.21379Z" fill="#6D737A"/>
                            </svg>
                        </a>
                        <ul class="submenu dropdown-menu">
                            <li>
                                <a id="testSeriesPolity" class="dropdown-item" href="services-details.php">
                                    Virtual Reality
                                </a>
                            </li>
                            <li>
                                <a id="privacyTermMenu" class="dropdown-item" href="services-details.php">
                                    Augmented Reality
                                </a>
                            </li>
                            <li>
                                <a id="privacyTermMenu" class="dropdown-item" href="services-details.php">
                                    Hologram
                                </a>
                            </li>
                            <li>
                                <a id="privacyTermMenu" class="dropdown-item" href="services-details.php">
                                    Permanent Interactive
                                    Installations
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a id="" class="dropdown-item" href="services-details.php" data-bs-toggle="dropdown">
                            Display Stands
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="portfolioMobileMenu" href="portfolio.php"> Portfolio </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="blogMobileMenu" href="blog.php"> Blog </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" id="contactMobileMenu" href="contact-us.php"> Contact Us </a>
            </li>
        </ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade requestModal" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request a Free Quote</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Name <span>*</span></label>
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Email <span>*</span></label>
                                <input type="text" class="form-control" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Mobile <span>*</span></label>
                                <div class="input-telephone w-100">
                                    <div class="input-telephone-wrap">
                                        <input type="text" class="theme-tel theme-input form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Company Name <span>*</span></label>
                                <input type="text" class="form-control" placeholder="Company Name *">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">City <span>*</span></label>
                                <input type="text" class="form-control" placeholder="City">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Subject <span>*</span></label>
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Message (optional)</label>
                                <textarea name="" class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>




                    <button type="submit" class="primary_btn ms-auto">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>