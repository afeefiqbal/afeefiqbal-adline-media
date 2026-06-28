@extends('web.layouts.main')
@section('content')
    @include('web.render._page_header', ['pageTitle' => 'Latest blog'])

    <div class="page-blog">
        <div class="container">
            <div class="row">
                @forelse($blogs as $blog)
                    @include('web.render._blog_item', ['blog' => $blog])
                @empty
                    <div class="col-12"><p class="text-center">No blog posts available.</p></div>
                @endforelse

                @if($currentCount < App\Models\Blog::where('status','Active')->count())
                    <div class="col-lg-12 d-flex justify-content-center mt-5">
                        <button class="btn-default loadMoreBtn" id="loadMoreBtn_{{ $currentCount }}" data-take_count="3" data-type="blog">Load More</button>
                        <input type="hidden" name="currentCount" id="currentCount" value="{{ $currentCount }}">
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
