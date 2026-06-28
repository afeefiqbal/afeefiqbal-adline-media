@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> Manage Slider</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                      <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                      </div>
                    @elseif(session('error'))
                      <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('error') }}
                      </div>
                    @endif
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Hero Background Video</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">This video plays behind the home page hero section, matching the new theme layout.</p>
                            @if(isset($homeSettings) && $homeSettings && $homeSettings->hero_video)
                                <div class="mb-3">
                                    <video controls style="max-width: 100%; max-height: 240px;">
                                        <source src="{{ asset($homeSettings->hero_video) }}" type="video/mp4">
                                    </video>
                                    <p class="mt-2 mb-0"><small>Current file: {{ $homeSettings->hero_video }}</small></p>
                                </div>
                            @else
                                <p class="mb-3">No custom video uploaded yet.</p>
                            @endif
                            <form action="{{ url(sitePrefix().'home/slider/hero-video') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="hero_video">Upload Video (MP4 or WebM, max 50MB)</label>
                                        <input type="file" name="hero_video" id="hero_video" class="form-control-file" accept="video/mp4,video/webm" required>
                                        @error('hero_video')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 d-flex align-items-end">
                                        <button type="submit" class="btn btn-primary">Upload Video</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Working Hours</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Shown in the home page hero contact section below the video.</p>
                            <form action="{{ url(sitePrefix().'home/slider/working-hours') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="working_hours">Working Hours</label>
                                    <textarea name="working_hours" id="working_hours" rows="4" class="form-control" placeholder="Monday - Friday : 9:00 am to 6:00 pm&#10;Saturday : 11:00 am to 5pm" required>{{ old('working_hours', $homeSettings->working_hours ?? '') }}</textarea>
                                    <small class="form-text text-muted">Enter one schedule per line.</small>
                                    @error('working_hours')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Save Working Hours</button>
                            </form>
                        </div>
                    </div>
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Home Section Icons</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Icons used on the home CTA blocks and testimonial quote mark.</p>
                            <form action="{{ url(sitePrefix().'home/slider/cta-icons') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    @foreach([
                                        'cta_contact_icon' => 'Contact CTA Icon',
                                        'cta_location_icon' => 'Location CTA Icon',
                                        'cta_working_hours_icon' => 'Working Hours Icon',
                                        'testimonial_quote_icon' => 'Testimonial Quote Icon',
                                    ] as $field => $label)
                                        @php $altField = $field.'_attribute'; @endphp
                                        <div class="form-group col-md-6">
                                            <label>{{ $label }}</label>
                                            <input type="file" name="{{ $field }}" class="form-control-file" accept="image/*,.svg">
                                            @if(isset($homeSettings) && $homeSettings && $homeSettings->$field)
                                                <div class="mt-2"><img src="{{ asset($homeSettings->$field) }}" alt="" style="max-height:40px"></div>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>{{ $label }} Alt Text</label>
                                            <input type="text" name="{{ $altField }}" class="form-control placeholder-cls" placeholder="Alt='{{ $label }}'" value="{{ old($altField, $homeSettings->$altField ?? '') }}" maxlength="255">
                                        </div>
                                    @endforeach
                                </div>
                                <button type="submit" class="btn btn-primary">Save Icons</button>
                            </form>
                        </div>
                    </div>
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <a href="{{url(sitePrefix().'home/slider/create')}}" class="btn btn-success pull-right">Add Slider <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
                        </div>
                        <div class="card-body">
                            <table class="dataTable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($sliderList as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! $slider->title !!}</td>
                                        <td>
                                            <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id"
                                                   data-extra_key="{{$slider->id}}" data-table="HomeBanner"
                                                   data-id="{{ $slider->id }}" class="common_sort_order" style="width:25%"
                                                   value="{{$slider->sort_order}}">
                                        </td>
                                        <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini"
                                                   title="HomeBanner" ref="{{ $slider->id }}"
                                                   @if($slider->status == "Active") checked="checked" @endif></td>
                                        <td>{{ date("d-M-Y", strtotime($slider->created_at)) }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(sitePrefix().'home/slider/edit/'.$slider->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Slider"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Slider" data-url="home/slider/delete" data-id="{{$slider->id}}"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection