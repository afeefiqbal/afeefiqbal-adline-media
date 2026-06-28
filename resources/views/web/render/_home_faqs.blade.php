@if($faqs->isNotEmpty())
    <div class="our-faqs bg-section dark-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="our-faqs-content">
                        @if(isset($faqHeading) && $faqHeading)
                            <div class="section-title">
                                @if($faqHeading->title)
                                    <h3 class="wow fadeInUp">{{ $faqHeading->title }}</h3>
                                @endif
                                @if($faqHeading->sub_title)
                                    <h2 class="text-anime-style-3">{{ $faqHeading->sub_title }}</h2>
                                @endif
                                @if($faqHeading->description)
                                    <p class="wow fadeInUp" data-wow-delay="0.2s">{{ $faqHeading->description }}</p>
                                @endif
                            </div>
                            @if($faqHeading->button_text && $faqHeading->button_url)
                                <div class="faq-button wow fadeInUp" data-wow-delay="0.4s">
                                    <a href="{{ $faqHeading->button_url }}" class="btn-default btn-highlighted">{{ $faqHeading->button_text }}</a>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="faq-accordion" id="faqaccordion">
                        @foreach($faqs as $faq)
                            @php
                                $headingId = 'heading'.$faq->id;
                                $collapseId = 'collapse'.$faq->id;
                                $isFirst = $loop->first;
                            @endphp
                            <div class="accordion-item wow fadeInUp" @if(!$isFirst) data-wow-delay="{{ number_format($loop->index * 0.2, 1) }}s" @endif>
                                <h2 class="accordion-header" id="{{ $headingId }}">
                                    <button class="accordion-button {{ $isFirst ? '' : 'collapsed' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#{{ $collapseId }}"
                                            aria-expanded="{{ $isFirst ? 'true' : 'false' }}" aria-controls="{{ $collapseId }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="{{ $collapseId }}" class="accordion-collapse collapse {{ $isFirst ? 'show' : '' }}"
                                     aria-labelledby="{{ $headingId }}" data-bs-parent="#faqaccordion">
                                    <div class="accordion-body">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
