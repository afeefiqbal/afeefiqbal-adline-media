@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-film"></i> Home Hero Section</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url(sitePrefix().loggedUserType().'dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Hero Section</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
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
                    <h3 class="card-title">Hero Content</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Heading, description, and call-to-action button shown over the hero video on the home page.</p>
                    <form action="{{ url(sitePrefix().'home/hero/content') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="hero_title">Title</label>
                                <input type="text" name="hero_title" id="hero_title" class="form-control" placeholder="Hero title" value="{{ old('hero_title', $homeSettings->hero_title ?? '') }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="hero_sub_title">Sub Title</label>
                                <textarea name="hero_sub_title" id="hero_sub_title" rows="3" class="form-control" placeholder="Short description below the title">{{ old('hero_sub_title', $homeSettings->hero_sub_title ?? '') }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="hero_button_text">Button Text</label>
                                <input type="text" name="hero_button_text" id="hero_button_text" class="form-control" placeholder="View Our Services" value="{{ old('hero_button_text', $homeSettings->hero_button_text ?? '') }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="hero_button_url">Button Link</label>
                                <input type="text" name="hero_button_url" id="hero_button_url" class="form-control" placeholder="service" value="{{ old('hero_button_url', $homeSettings->hero_button_url ?? '') }}" maxlength="255">
                                <small class="form-text text-muted">Relative path (e.g. service, about-us) or full URL.</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Hero Content</button>
                    </form>
                </div>
            </div>

            <div class="card card-info card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">Hero Background Video</h3>
                </div>
                <div class="card-body">
                    @if(isset($homeSettings) && $homeSettings && $homeSettings->hero_video)
                        <div class="mb-3">
                            <video controls style="max-width: 100%; max-height: 240px;">
                                <source src="{{ asset($homeSettings->hero_video) }}" type="video/mp4">
                            </video>
                            <p class="mt-2 mb-0"><small>Current file: {{ $homeSettings->hero_video }}</small></p>
                        </div>
                    @else
                        <p class="mb-3 text-muted">No video uploaded yet.</p>
                    @endif
                    <form action="{{ url(sitePrefix().'home/hero/video') }}" method="post" enctype="multipart/form-data">
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
                    <p class="text-muted">Shown in the contact section below the hero on the home page.</p>
                    <form action="{{ url(sitePrefix().'home/hero/working-hours') }}" method="post">
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
                    <form action="{{ url(sitePrefix().'home/hero/cta-icons') }}" method="post" enctype="multipart/form-data">
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
        </div>
    </section>
</div>
@endsection
