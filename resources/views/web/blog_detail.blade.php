@extends('web.layouts.main')
@section('content')
    @include('web.render._page_header', [
        'pageTitle' => $blog->title,
        'banner' => $pageBanner ?? null,
        'headerClass' => 'fontSize40',
        'pageMeta' => '<ol class="breadcrumb"><li><i class="fa-regular fa-user"></i> Admin</li><li><i class="fa-regular fa-clock"></i> '.date('d M Y', strtotime($blog->posted_date)).'</li></ol>'
    ])

    <div class="page-single-post">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8">
                    @if($blog->image)
                        <div class="post-image">
                            <figure class="image-anime reveal">
                                <img src="{{ asset($blog->image) }}" class="img-fluid" {!! imageAltAttr($blog->image_meta_tag, $blog->title) !!}>
                            </figure>
                        </div>
                    @endif
                    <div class="post-content">
                        <h2>{{ $blog->title }}</h2>
                        <div class="post-entry mt-3">{!! $blog->description !!}</div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-5 sticky-lg-top">
                    @if($recentBlogs->isNotEmpty())
                        <h4>Recent Blogs</h4>
                        <ul class="recentList">
                            @foreach($recentBlogs as $recentBlog)
                                <li>
                                    <a href="{{ url('blog/'.$recentBlog->short_url) }}">
                                        @if($recentBlog->image)
                                        <div class="imgBox">
                                            <img src="{{ asset($recentBlog->image) }}" class="img-fluid" {!! imageAltAttr($recentBlog->image_meta_tag, $recentBlog->title) !!}>
                                        </div>
                                        @endif
                                        <div class="w-100">
                                            <p>{{ date('M-d-Y', strtotime($recentBlog->posted_date)) }}</p>
                                            <h6>{{ $recentBlog->title }}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
