@if($whyChooseUs->isNotEmpty())
    <section class="whyUs">
        <div class="container">
            @if($whyChooseHeading!=NULL)
                <div class="row position-relative">
                    <div class="col-lg-6">
                        @if($whyChooseHeading->title!=NULL)
                            <h6 class="subHead white_color">{{$whyChooseHeading->title}}</h6>
                        @endif
                        @if($whyChooseHeading->sub_title!=NULL)
                            <h2 class="mainHead white_color">{{$whyChooseHeading->sub_title}}</h2>
                        @endif
                    </div>
                    @if($whyChooseHeading->description!=NULL)
                        <div class="col-lg-6">
                            <p class="white_color">
                                {!!$whyChooseHeading->description!!}
                            </p>
                        </div>
                    @endif
                </div>
            @endif
            <div class="row position-relative mt-3">
                @foreach($whyChooseUs as $whyChoose)    
                    <div class="col-lg-3 col-md-6 mt-4">
                        <div class="whyUcCard">
                            @if($whyChoose->image!=NULL)
                            <div class="iconBox">
                                <img src="{{asset($whyChoose->image)}}" class="img-fluid" {!! imageAltAttr($whyChoose->image_attribute, $whyChoose->title) !!}>
                            </div>
                            @endif
                            <h4>{{$whyChoose->title}}</h4>
                            {!!$whyChoose->description!!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif