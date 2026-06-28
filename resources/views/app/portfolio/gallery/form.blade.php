@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().'portfolio/')}}">Portfolio</a></li>
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().'portfolio/gallery/gallery/'.$portfolio->id)}}">Gallery</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}          
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Gallery Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" user_type="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger" user_type="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Type*</label>
                                <select class="form-control gallery-form-type" name="type" id="type">
                                    <option value="Photo" {{(@$gallery->type=='Photo')?'selected':''}}>Photo</option>
                                    <option value="Video" {{(@$gallery->type=='Video')?'selected':''}}>Video</option>
                                </select>
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                        </div>
                        <div class="form-row {{(@$gallery->type=='Video')?'':'d-none'}}" id="video-url-element">
                            <div class="form-group col-md-12">
                                <label> Video URL*</label>
                                <input type="text" name="video_url" id="video_url" placeholder="Video URL" class="form-control" autocomplete="off" value="{{ @$gallery->video_url }}">
                                <div class="help-block with-errors" id="video_url_error"></div>
                                @error('video_url')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Image*</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 900 x 600</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Image Attribute *</label>
                                <input type="text" class="form-control required placeholder-cls" id="image_attribute" name="image_attribute" placeholder="Alt='Banner Attribute'" value="{{ isset($gallery)?$gallery->image_attribute:'' }}">
                                <div class="help-block with-errors" id="image_attribute_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <input type="hidden" name="portfolio_id" id="portfolio_id" value="{{$portfolio->id}}">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        minImageWidth: 900,
        minImageHeight: 600,
        maxImageWidth: 900,
        maxImageHeight: 600,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: true, 
        allowedFileTypes: ['image'],
        allowedFileExtensions: ["svg"],
        showRemove: true,
        @if(isset($gallery) && $gallery->image!=NULL)
            initialPreview: [
                "{{asset($gallery->image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{{ ($gallery->image!=NULL)?$gallery->package->title:'';}}", width: "120px"}
            ]
        @endif
    });
});
</script>      
@endsection