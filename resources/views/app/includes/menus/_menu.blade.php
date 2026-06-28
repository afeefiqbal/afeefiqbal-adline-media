<li class="nav-item">
    <a href="{{url(sitePrefix().'administration')}}" class="nav-link {{ (Request::segment(2)=='administration')?'active':'' }}">
        <i class="nav-icon fas fa-user-shield"></i>
        <p>
            Administration             
        </p>
    </a>
</li>
<li class="nav-item {{ (Request::segment(2)=='home')?'menu-is-opening menu-open':'' }}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-th-list"></i>
    <p>
      Home
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='home')?'block':'none' }}">
    <li class="nav-item">
      <a href="{{url(sitePrefix().'home/hero')}}" class="nav-link {{ (Request::segment(3)=='hero')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Hero Section</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'home/key-feature')}}" class="nav-link {{ (Request::segment(3)=='key-feature')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Key Features</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'home/what-we-do')}}" class="nav-link {{ (Request::segment(3)=='what-we-do')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>What We Do</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'home/why-choose-us')}}" class="nav-link {{ (Request::segment(3)=='why-choose-us')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Why Choose Us</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'home/who-we-are')}}" class="nav-link {{ (Request::segment(3)=='who-we-are')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Who We Are</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'home/testimonial')}}" class="nav-link {{ (Request::segment(3)=='testimonial')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Testimonial</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'home/our-client')}}" class="nav-link {{ (Request::segment(3)=='our-client')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Partners</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'home/faq')}}" class="nav-link {{ (Request::segment(3)=='faq')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>FAQ</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='about-us')?'menu-is-opening menu-open':'' }}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas icon fas fa-info"></i>
    <p>
      About-us
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='about-us')?'block':'none' }}">
    <li class="nav-item">
      <a href="{{url(sitePrefix().'about-us')}}" class="nav-link {{ (Request::segment(3)=='')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>About-us </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'about-us/our-team')}}" class="nav-link {{ (Request::segment(3)=='our-team')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Our Team </p>
      </a>
    </li> 
  </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='service')?'menu-is-opening menu-open':'' }}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas icon fas fa-cog"></i>
    <p>
      Services
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='service')?'block':'none' }}">
    <li class="nav-item">
      <a href="{{url(sitePrefix().'service/')}}" class="nav-link {{ (Request::segment(3)=='/')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Services</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'service/sub')}}" class="nav-link {{ (Request::segment(3)=='sub')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Sub Services</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item {{ (Request::segment(3)=='portfolio'||Request::segment(2)=='portfolio')?'menu-is-opening menu-open':'' }}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-copy"></i>
    <p>
      Portfolio
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: {{ (Request::segment(3)=='item'||Request::segment(2)=='portfolio')?'block':'none' }}">
    <li class="nav-item">
      <a href="{{url(sitePrefix().'portfolio/category')}}" class="nav-link {{ (Request::segment(2)=='portfolio' && Request::segment(3)=='category')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Category</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'portfolio/item')}}" class="nav-link {{ (Request::segment(2)=='portfolio' && Request::segment(3)=='item')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Portfolio </p>
      </a>
    </li>  
  </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='blog')}}">
  <a href="{{url(sitePrefix().'blog')}}" class="nav-link {{ (Request::segment(2)=='blog')?'active':'' }}">
    <i class="far fa-comments nav-icon"></i>
    <p>Blogs</p>
  </a>
</li>
<li class="nav-item {{ (Request::segment(2)=='banner')?'menu-is-opening menu-open':'' }}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-image"></i>
    <p>
      Banner
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='banner')?'block':'none' }}">
    <li class="nav-item">
      <a href="{{url(sitePrefix().'banner/about')}}" class="nav-link {{ (Request::segment(3)=='about')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>About-us </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="{{url(sitePrefix().'banner/service')}}" class="nav-link {{ (Request::segment(3)=='service')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Service </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="{{url(sitePrefix().'banner/portfolio')}}" class="nav-link {{ (Request::segment(3)=='portfolio')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Portfolio </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="{{url(sitePrefix().'banner/blog')}}" class="nav-link {{ (Request::segment(3)=='blog')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Blog </p>
      </a>
    </li>  
    <li class="nav-item">
      <a href="{{url(sitePrefix().'banner/contact')}}" class="nav-link {{ (Request::segment(3)=='contact')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Contact</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'banner/privacy')}}" class="nav-link {{ (Request::segment(3)=='privacy')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Privacy Policy</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'banner/terms')}}" class="nav-link {{ (Request::segment(3)=='terms')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Terms & Conditions</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='tag')?'menu-is-opening menu-open':'' }}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-asterisk"></i>
    <p>
      Metatags
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='tag'|| Request::segment(2)=='other-meta-tag')?'block':'none' }}">
    <li class="nav-item">
      <a href="{{url(sitePrefix().'tag/home')}}" class="nav-link {{ (Request::segment(3)=='home')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Home</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'tag/about')}}" class="nav-link {{ (Request::segment(3)=='about')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>About</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'tag/service')}}" class="nav-link {{ (Request::segment(3)=='service')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Service </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="{{url(sitePrefix().'tag/portfolio')}}" class="nav-link {{ (Request::segment(3)=='portfolio')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Portfolio </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="{{url(sitePrefix().'tag/blog')}}" class="nav-link {{ (Request::segment(3)=='blog')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Blog</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'tag/contact')}}" class="nav-link {{ (Request::segment(3)=='contact')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Contact</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'tag/privacy')}}" class="nav-link {{ (Request::segment(3)=='privacy')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Privacy Policy</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'tag/terms')}}" class="nav-link {{ (Request::segment(3)=='terms')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Terms & Conditions</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'other-meta-tag/')}}" class="nav-link {{ (Request::segment(2)=='other-meta-tag')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Other Meta Tag</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item {{ (Request::segment(2)=='contact')?'menu-is-opening menu-open':'' }}">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-envelope"></i>
    <p>
      Contact
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: {{ (Request::segment(2)=='contact')?'block':'none' }}">
    <li class="nav-item">
      <a href="{{url(sitePrefix().'contact/list')}}" class="nav-link {{ (Request::segment(3)=='list')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Contact Request List </p>
      </a>
    </li> 
    <li class="nav-item">
      <a href="{{url(sitePrefix().'contact/quote_list')}}" class="nav-link {{ (Request::segment(3)=='quote_list')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Quote List </p>
      </a>
    </li>  
    <li class="nav-item">
      <a href="{{url(sitePrefix().'contact/page')}}" class="nav-link {{ (Request::segment(3)=='page')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Contact Page</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{url(sitePrefix().'contact/office-address')}}" class="nav-link {{ (Request::segment(3)=='office-address')?'active':'' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Office Address </p>
      </a>
    </li> 
  </ul>
</li>
<li class="nav-item">
    <a href="{{url(sitePrefix().'site-information')}}" class="nav-link {{ (Request::segment(2)=='site-information')?'active':'' }}">
        <i class="nav-icon fas fa-user-shield"></i>
        <p>
            Site Information             
        </p>
    </a>
</li>