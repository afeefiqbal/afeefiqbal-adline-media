<div class="col-lg-4 col-md-6 {{ $appendClass ?? '' }}">
    <div class="post-item wow fadeInUp" @if(isset($loop) && !$loop->first) data-wow-delay="{{ $loop->index * 0.2 }}s" @endif>
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
