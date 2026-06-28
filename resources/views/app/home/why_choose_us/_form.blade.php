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
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <a href="{{url(sitePrefix().'home/why-choose-us/list')}}" class="btn btn-success pull-right">Why choose us item<i class="fa fa-list pull-right mt-1 ml-2"></i></a>
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
                        <h3 class="card-title">Why Choose Us</h3>
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
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control required for_canonical_url" autocomplete="off"  value="{{ isset($why_choose_us)?$why_choose_us->title:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Sub Title</label>
                                <input type="text" name="sub_title" id="sub_title" placeholder="Second Title" class="form-control" autocomplete="off"  value="{{ isset($why_choose_us)?$why_choose_us->sub_title:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Description*</label>
                                <textarea name="description" id="description" placeholder="Description" class="form-control required tinyeditor" autocomplete="off"  >{{ isset($why_choose_us)?$why_choose_us->description:'' }}</textarea>
                                <div class="help-block with-errors" id="description_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Image</label>
                                <div class="file-loading">
                                    <input id="image" name="image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Note: Image size must be 1242 x 777</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Image Attribute</label>
                                <input type="text" name="image_attribute" id="image_attribute" placeholder="Alt='Why choose us image'" class="form-control placeholder-cls" autocomplete="off" value="{{ isset($why_choose_us)?$why_choose_us->image_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <input type="hidden" name="id" id="id" value="{{ isset($why_choose_us)?$why_choose_us->id:0 }}">
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
        minImageWidth: 1242,
        minImageHeight: 777,
        maxImageWidth: 1242,
        maxImageHeight: 777,
        showRemove: true,
        @if(isset($why_choose_us) && $why_choose_us->image!=NULL)
            initialPreview: [
                "{{asset($why_choose_us->image)}}",
            ],
            initialPreviewConfig: [
                {caption: "{{ ($why_choose_us->image!=NULL)?$why_choose_us->sub_title:'';}}", width: "120px"}
            ]
        @endif
    });
});
</script>
@endsection