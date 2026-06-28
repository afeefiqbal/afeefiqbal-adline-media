@if($clients->isNotEmpty())
    <section class="partnersSection">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md- text-center">
                    <h6 class="subHead">{{$clientHeading->title}}</h6>
                    @if($clientHeading->sub_title!=NULL)
                        <h2 class="mainHead">
                            {!!$clientHeading->sub_title!!}
                        </h2>
                    @endif
                    @if($clientHeading->description!=NULL)
                        {!!$clientHeading->description!!}
                    @endif
                </div>
            </div>
            <div class="row mt-50">
                <div class="col-12">
                    <div class="partnersSlider">
                        @foreach($clients as $client)
                            <div class="partnersCard">
                                <div class="item">
                                    <img src="{{asset($client->image)}}" class="img-fluid w-100" {!!$client->image_meta_tag!!}>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-50">
                        <div class="slick-slider-nav-partners"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif