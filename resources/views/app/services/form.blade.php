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
                        @if($type=="service")
                            <li class="breadcrumb-item"><a href="{{url(sitePrefix().'service')}}">Service</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="{{url(sitePrefix().'service/sub')}}">Sub-service</a></li>
                        @endif
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
                        <h3 class="card-title">{{ucfirst($type)}} Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        @if($type!="service")
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Parent Service*</label>
                                    <select class="form-control select2 required" id="parent_id" name="parent_id">
                                        <option value="">Select Option</option>
                                        @foreach($parentServices as $parent)
                                            <option value="{{$parent->id}}" {{($parent->id==@$service->parent_id)?'selected':''}}>{!!$parent->title.' '.$parent->second_title!!}</option>
                                        @endforeach
                                    </select>
                                    <div class="help-block with-errors" id="parent_id_error"></div>
                                </div>
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Title*</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control required for_canonical_url" autocomplete="off"  value="{{ isset($service)?$service->title:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Short URL *</label>
                                <input type="text" name="short_url" id="short_url" placeholder="Short URL" class="form-control required" autocomplete="off"  value="{{ isset($service)?$service->short_url:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="short_url_error"></div>
                            </div>
                        </div>
                        @if($type=="service")
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Home Description*</label>
                                    <textarea name="home_description" id="home_description" placeholder="Home Description" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($service)?$service->home_description:'' }}</textarea>
                                    <div class="help-block with-errors" id="home_description_error"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Description*</label>
                                    <textarea name="description" id="description" placeholder="Description" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($service)?$service->description:'' }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                </div>
                            </div>  
                        @else
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label> Description*</label>
                                    <textarea name="description" id="description" placeholder="Description" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($service)?$service->description:'' }}</textarea>
                                    <div class="help-block with-errors" id="description_error"></div>
                                </div>
                            </div>
                        @endif
                        @if($type=="service")
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label> Service Thumbnail Image</label>
                                    <div class="file-loading">
                                        <input id="thumbnail_image" name="thumbnail_image" type="file" accept="image/*">
                                    </div>
                                    <span class="caption_note">Note: Image size must be 966 x 600</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label> Service Thumbnail Attribute</label>
                                    <input type="text" name="thumbnail_image_meta_tag" id="thumbnail_image_meta_tag" placeholder="Alt='Service Attribute'" class="form-control placeholder-cls" autocomplete="off"  value="{{ isset($service)?$service->thumbnail_image_meta_tag:'' }}" maxlength="255">
                                </div>
                            </div>
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Image</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 966 x 600</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Image Attribute</label>
                                <input type="text" name="image_meta_tag" id="image_meta_tag" placeholder="Alt='Service Attribute'" class="form-control placeholder-cls" autocomplete="off"  value="{{ isset($service)?$service->image_meta_tag:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Banner</label>
                                <div class="file-loading">
                                    <input id="banner" name="banner" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 1651 X 390</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Banner Attribute</label>
                                <input type="text" name="banner_meta_tag" id="banner_meta_tag" placeholder="alt='alt Image'" class="form-control placeholder-cls" autocomplete="off" value="{{ isset($service)?$service->banner_meta_tag:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="banner_meta_tag_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Title</label>
                                <textarea class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title">{{ isset($service)?$service->meta_title:'' }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Meta Description">{{ isset($service)?$service->meta_description:'' }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Meta Keyword</label>
                                <textarea class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Meta Keyword">{{ isset($service)?$service->meta_keyword:'' }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Other Meta Tag</label>
                                <textarea class="form-control" id="other_meta_tag" name="other_meta_tag" placeholder="Other Meta Tag">{{ isset($service)?$service->other_meta_tag:'' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save" data-id="{{isset($service)?$service->id:''}}"value="Submit" class="btn btn-primary pull-left submitBtn">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <input type="hidden" name="id" id="id" value="{{ isset($service)?$service->id:'0' }}">
                        <input type="hidden" name="service_type" id="service_type" value="{{$type}}">
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>
<script type="text/javascript">
$(document).ready(function(){
    @if($type=="service")
        $("#thumbnail_image").fileinput({
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
            minImageWidth: 966,
            minImageHeight: 600,
            maxImageWidth: 966,
            maxImageHeight: 600,
            showRemove: true,
            @if(isset($service) && $service->thumbnail_image!=NULL)
                initialPreview: [
                    "{{asset($service->thumbnail_image)}}",
                ],
                initialPreviewConfig: [
                    {caption: "{{ ($service->thumbnail_image!=NULL)?$service->title:'';}}", width: "120px"}
                ]
            @endif
        });
    @endif
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
        minImageWidth: 966,
        minImageHeight: 600,
        maxImageWidth: 966,
        maxImageHeight: 600,
        showRemove: true,
        @if(isset($service) && $service->image!=NULL)
            initialPreview: [
                "{{asset($service->image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{{ ($service->image!=NULL)?$service->title:'';}}", width: "120px"}
            ]
        @endif
    });
    
    $("#banner").fileinput({
        'theme': 'explorer-fas',
        validateInitialCount: true,
        overwriteInitial: false,
        autoReplace: true,
        layoutTemplates: {actionDelete: ''},
        removeLabel: "Reset",
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        required: false, 
        showRemove: true,       
        minImageWidth: 1651,
        minImageHeight: 390,
        maxImageWidth: 1651,
        maxImageHeight: 390,
        <?php if(isset($service) && $service->banner!=NULL){?>
            initialPreview: ["{{asset($service->banner)}}"],
            initialPreviewConfig: [{
                caption: "{{ ($service->banner!=NULL)?$service->banner_title:''}}",
                width: "120px",
                key: "{{($service->banner)}}",
            }]
        <?php }?>
    });
});
</script>      
@endsection