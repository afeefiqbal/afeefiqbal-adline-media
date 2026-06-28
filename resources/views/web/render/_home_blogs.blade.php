@if($blogs->isNotEmpty())
    <div class="our-blog">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-lg-12">
                    <div class="section-title section-title-center">
                        <h3 class="wow fadeInUp">Latest blog</h3>
                        <h2 class="text-anime-style-3">Read Our Latest Posts</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-slider">
                        <div class="swiper">
                            <div class="swiper-wrapper" data-cursor-text="Drag">
                                @foreach($blogs as $blog)
                                    <div class="swiper-slide">
                                        <div class="post-item wow fadeInUp">
                                            @if($blog->image)
                                            <div class="post-featured-image">
                                                <a href="{{ url('blog/'.$blog->short_url) }}" data-cursor-text="View">
                                                    <figure class="image-anime">
                                                        <img src="{{ asset($blog->image) }}" class="img-fluid" {!! imageAltAttr($blog->image_meta_tag, $blog->title) !!}>
                                                    </figure>
                                                </a>
                                            </div>
                                            @endif
                                            <div class="post-item-body">
                                                <div class="post-item-content">
                                                    <h2><a href="{{ url('blog/'.$blog->short_url) }}">{{ $blog->title }}</a></h2>
                                                </div>
                                                <div class="post-item-btn">
                                                    <a href="{{ url('blog/'.$blog->short_url) }}" class="readmore-btn">read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="blog-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
