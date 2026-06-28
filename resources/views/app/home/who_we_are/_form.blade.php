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
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}          
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Who we are</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Title*</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control required" autocomplete="off"  value="{{ isset($who_we_are)?$who_we_are->title:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Sub Title</label>
                                <input type="text" name="sub_title" id="sub_title" placeholder="Sub Title" class="form-control" autocomplete="off"  value="{{ isset($who_we_are)?$who_we_are->sub_title:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Description*</label>
                                <textarea name="description" id="description" placeholder="Description" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($who_we_are)?$who_we_are->description:'' }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Team Member Count*</label>
                                <input type="text" name="count" id="count" placeholder="7+" class="form-control required" autocomplete="off" value="{{ isset($who_we_are)?$who_we_are->count:'' }}" maxlength="255">
                                <small class="form-text text-muted">Shown in the red team members box on the home page. Use format like 7+</small>
                                <div class="help-block with-errors" id="count_error"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label> Button Text</label>
                                <input type="text" name="button_text" id="button_text" placeholder="Button Text" class="form-control" autocomplete="off"  value="{{ isset($who_we_are)?$who_we_are->button_text:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-4">
                                <label> Button Url</label>
                                <input type="text" name="button_url" id="button_url" placeholder="Button URL" class="form-control" autocomplete="off"  value="{{ isset($who_we_are)?$who_we_are->button_url:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Team Count Icon</label>
                                <div class="file-loading">
                                    <input id="count_icon" name="count_icon" type="file" accept="image/*,.svg">
                                </div>
                                <span class="caption_note">Icon shown in the team members box</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Team Count Icon Alt Text</label>
                                <input type="text" name="count_icon_attribute" id="count_icon_attribute" placeholder="Alt='Team Members Icon'" class="form-control placeholder-cls" autocomplete="off" value="{{ isset($who_we_are)?$who_we_are->count_icon_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Primary Image</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Large background image (about-img-1). Recommended size: 1044 x 607</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Primary Image Attribute</label>
                                <input type="text" name="image_meta_tag" id="image_meta_tag" placeholder="Alt='About Us Image'" class="form-control placeholder-cls" autocomplete="off" value="{{ isset($who_we_are)?$who_we_are->image_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Secondary Image</label>
                                <div class="file-loading">
                                    <input id="image_2" name="image_2" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Overlapping image (about-img-2). Recommended size: 1044 x 607</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Secondary Image Attribute</label>
                                <input type="text" name="image_2_meta_tag" id="image_2_meta_tag" placeholder="Alt='About Us Image 2'" class="form-control placeholder-cls" autocomplete="off" value="{{ isset($who_we_are)?$who_we_are->image_2_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <input type="hidden" name="id" id="id" value="{{isset($who_we_are)?$who_we_are->id:''}}">
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
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        allowedFileTypes: ['image'],
        minImageWidth: 1044,
        minImageHeight: 607,
        maxImageWidth: 1044,
        maxImageHeight: 607,
        showRemove: true,
        @if(isset($who_we_are) && $who_we_are->image!=NULL)
            initialPreview: [
                "{{asset($who_we_are->image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{{ ($who_we_are->image!=NULL)?$who_we_are->title:'';}}", width: "120px"}
            ]
        @endif
    });
    $("#image_2").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false,
        allowedFileTypes: ['image'],
        minImageWidth: 1044,
        minImageHeight: 607,
        maxImageWidth: 1044,
        maxImageHeight: 607,
        showRemove: true,
        @if(isset($who_we_are) && $who_we_are->image_2!=NULL)
            initialPreview: [
                "{{asset($who_we_are->image_2)}}",
            ],
            initialPreviewConfig: [
                {caption: "{{ ($who_we_are->image_2!=NULL)?$who_we_are->title:'';}}", width: "120px"}
            ]
        @endif
    });
    $("#count_icon").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false,
        allowedFileTypes: ['image'],
        showRemove: true,
        @if(isset($who_we_are) && $who_we_are->count_icon)
            initialPreview: ["{{ asset($who_we_are->count_icon) }}"],
            initialPreviewConfig: [{caption: "Count icon", width: "120px"}]
        @endif
    });
});
</script>      
@endsection