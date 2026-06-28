@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> About Us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">About-us</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
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
                        <h3 class="card-title">About-us Form</h3>
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
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control required" autocomplete="off" value="{{ isset($about)?$about->title:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Count*</label>
                                <input type="text" name="count" id="count" placeholder="Count" class="form-control required" autocomplete="off" value="{{ isset($about)?$about->count:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="count_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Description*</label>
                                <textarea name="description" id="description" class="form-control tinyeditor required" placeholder="Description">{{ isset($about)?$about->description:'' }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Image*</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Primary image (about-image-1)</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Image Attribute *</label>
                                <input type="text" class="form-control placeholder-cls" id="image_attribute" name="image_attribute" placeholder="Alt='Home Image Attribute'" value="{{ isset($about)?$about->image_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Secondary Image</label>
                                <div class="file-loading">
                                    <input id="image_2" name="image_2" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Overlapping image (about-image-2)</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Secondary Image Attribute</label>
                                <input type="text" class="form-control placeholder-cls" id="image_2_attribute" name="image_2_attribute" placeholder="Alt='Secondary Image Attribute'" value="{{ isset($about)?$about->image_2_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Mission Section Label</label>
                                <input type="text" name="mv_section_title" id="mv_section_title" placeholder="Our Mission / Vision" class="form-control" autocomplete="off" value="{{ isset($about)?$about->mv_section_title:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-8">
                                <label>Mission Section Heading</label>
                                <input type="text" name="mv_section_sub_title" id="mv_section_sub_title" placeholder="Section heading" class="form-control" autocomplete="off" value="{{ isset($about)?$about->mv_section_sub_title:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Mission Section Description</label>
                                <textarea name="mv_section_description" id="mv_section_description" placeholder="Short intro above mission blocks" class="form-control" autocomplete="off">{{ isset($about)?$about->mv_section_description:'' }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Mission Title</label>
                                <input type="text" name="mission_title" id="mission_title" placeholder="Mission Title" class="form-control" autocomplete="off" value="{{ isset($about)?$about->mission_title:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Vision Title</label>
                                <input type="text" name="vision_title" id="vision_title" placeholder="Vision Title" class="form-control" autocomplete="off" value="{{ isset($about)?$about->vision_title:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Mission</label>
                                <textarea name="mission" id="mission" placeholder="Mission" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($about)?$about->mission:'' }}</textarea>
                                <div class="help-block with-errors" id="mission_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Vision</label>
                                <textarea name="vision" id="vision" placeholder="Vision" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($about)?$about->vision:'' }}</textarea>
                                <div class="help-block with-errors" id="vision_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Mission Image*</label>
                                <div class="file-loading">
                                    <input id="mission_image" name="mission_image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 63 X 63</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Vision Image*</label>
                                <div class="file-loading">
                                    <input id="vision_image" name="vision_image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 63 X 63</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Mission Image Attribute*</label>
                                <input type="text" class="form-control placeholder-cls" id="mission_image_meta_tag" name="mission_image_meta_tag" placeholder="Alt='Mission Image Attribute'" value="{{ isset($about)?$about->mission_image_meta_tag:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Vision Image Attribute*</label>
                                <input type="text" class="form-control placeholder-cls" id="vision_image_meta_tag" name="vision_image_meta_tag" placeholder="Alt='Vision Image Attribute'" value="{{ isset($about)?$about->vision_image_meta_tag:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Our Values Title</label>
                                <input type="text" name="values_title" id="values_title" placeholder="Our Values Title" class="form-control" autocomplete="off" value="{{ isset($about)?$about->values_title:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Our Goal Title</label>
                                <input type="text" name="goal_title" id="goal_title" placeholder="Our Goal Title" class="form-control" autocomplete="off" value="{{ isset($about)?$about->goal_title:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Our Values</label>
                                <textarea name="values" id="values" placeholder="Our Values" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($about)?$about->values:'' }}</textarea>
                                <div class="help-block with-errors" id="values_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Our Goal</label>
                                <textarea name="goal" id="goal" placeholder="Our Goal" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($about)?$about->goal:'' }}</textarea>
                                <div class="help-block with-errors" id="goal_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Our Values Image*</label>
                                <div class="file-loading">
                                    <input id="values_image" name="values_image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 63 X 63</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Our Goal Image*</label>
                                <div class="file-loading">
                                    <input id="goal_image" name="goal_image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 63 X 63</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Our Values Image Attribute*</label>
                                <input type="text" class="form-control placeholder-cls" id="values_image_meta_tag" name="values_image_meta_tag" placeholder="Alt='Our Values Image Attribute'" value="{{ isset($about)?$about->values_image_meta_tag:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Our Goal Image Attribute*</label>
                                <input type="text" class="form-control placeholder-cls" id="goal_image_meta_tag" name="goal_image_meta_tag" placeholder="Alt='Our Goal Image Attribute'" value="{{ isset($about)?$about->goal_image_meta_tag:'' }}" maxlength="255">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="id" id="id" value="{{ !empty($about)?$about->id:'0' }}">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">  
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
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: true, 
        allowedFileTypes: ['image'],
        minImageWidth: 1044,
        minImageHeight: 607,
        maxImageWidth: 1044,
        maxImageHeight: 607,
        showRemove: true,
        @if(isset($about) && $about->image!=NULL)
            initialPreview: [
                "{{asset($about->image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{!! ($about->image!=NULL)?$about->title:'';!!}", width: "120px"}
            ]
        @endif
    });

    $("#image_2").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false,
        allowedFileTypes: ['image'],
        showRemove: true,
        @if(isset($about) && $about->image_2!=NULL)
            initialPreview: [
                "{{asset($about->image_2)}}",
            ],
            initialPreviewConfig: [
                {caption: "{!! ($about->image_2!=NULL)?$about->title:'';!!}", width: "120px"}
            ]
        @endif
    });

    $("#mission_image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        allowedFileTypes: ['image'],
        minImageWidth: 63,
        minImageHeight: 63,
        maxImageWidth: 63,
        maxImageHeight: 63,
        showRemove: true,
        @if(isset($about) && $about->mission_image!=NULL)
            initialPreview: [
                "{{asset($about->mission_image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{!! ($about->mission_image!=NULL)?$about->title:'';!!}", width: "120px"},
            ]
        @endif
    });
    $("#vision_image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        allowedFileTypes: ['image'],
        minImageWidth: 63,
        minImageHeight: 63,
        maxImageWidth: 63,
        maxImageHeight: 63,
        showRemove: true,
        @if(isset($about) && $about->vision_image!=NULL)
            initialPreview: [
                "{{asset($about->vision_image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{!! ($about->vision_image!=NULL)?$about->title:'';!!}", width: "120px"},
            ]
        @endif
    });
    $("#values_image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        allowedFileTypes: ['image'],
        minImageWidth: 63,
        minImageHeight: 63,
        maxImageWidth: 63,
        maxImageHeight: 63,
        showRemove: true,
        @if(isset($about) && $about->values_image!=NULL)
            initialPreview: [
                "{{asset($about->values_image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{!! ($about->values_image!=NULL)?$about->title:'';!!}", width: "120px"},
            ]
        @endif
    });
    $("#goal_image").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Remove",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        allowedFileTypes: ['image'],
        minImageWidth: 63,
        minImageHeight: 63,
        maxImageWidth: 63,
        maxImageHeight: 63,
        showRemove: true,
        @if(isset($about) && $about->goal_image!=NULL)
            initialPreview: [
                "{{asset($about->goal_image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{!! ($about->goal_image!=NULL)?$about->title:'';!!}", width: "120px"},
            ]
        @endif
    });
});
</script>       
@endsection