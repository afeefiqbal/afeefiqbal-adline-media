@foreach($data as $blog)
    @include('web.render._blog_item', [
        'blog' => $blog,
        'appendClass' => $loop->last ? 'appendHere_'.$currentCount : '',
    ])
@endforeach
@if($currentCount < App\Models\Blog::where('status','Active')->count())
    <div class="col-12 d-flex justify-content-center mt-4">
        <button class="btn-default loadMoreBtn" id="loadMoreBtn_{{ $currentCount }}" data-take_count="3" data-type="blog">
            <span>Load More</span>
        </button>
        <input type="hidden" name="currentCount" id="currentCount" value="{{ $currentCount }}">
    </div>
@endif
