@foreach($services as $service)
    <li class="nav-item {{ $service->sub->isNotEmpty() ? 'submenu' : '' }}">
        @php
            $serviceUrl = $service->parent_id != 0 && $service->parent
                ? url('service/'.$service->parent->short_url.'/'.$service->short_url)
                : url('service/'.$service->short_url);
        @endphp
        <a class="nav-link" href="{{ $serviceUrl }}">
            {{ $service->title }}
            @if($service->sub->isNotEmpty())
                <svg class="arrowSub" width="5" height="9" viewBox="0 0 5 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.714843 0.996847L3.81961 4.00608C4.18627 4.36146 4.18627 4.943 3.81961 5.29838L0.714844 8.30762" stroke="#7B798C" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            @endif
        </a>
        @if($service->sub->isNotEmpty())
            <ul class="submenu-list">
                @include('web.includes._service_submenu', ['services' => $service->sub])
            </ul>
        @endif
    </li>
@endforeach
