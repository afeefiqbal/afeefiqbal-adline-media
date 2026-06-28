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
                        <h3 class="card-title">Site information form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Facebook</label>
                                <input type="text" name="facebook_url" id="facebook_url" class="form-control" placeholder="Facebook" value="{{ !empty($contact)?$contact->facebook_url:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Instagram</label>
                                <input type="text" name="instagram_url" id="instagram_url" class="form-control" placeholder="Instagram" value="{{ !empty($contact)?$contact->instagram_url:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Twitter</label>
                                <input type="text" name="twitter_url" id="twitter_url" class="form-control" placeholder="Twitter" value="{{ !empty($contact)?$contact->twitter_url:'' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label> Linkedin</label>
                                <input type="text" name="linkedin_url" id="linkedin_url" class="form-control" placeholder="Linkedin" value="{{ !empty($contact)?$contact->linkedin_url:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Footer Description</label>
                                <textarea name="footer_description" id="footer_description" class="form-control" placeholder="Short footer about text">{{ !empty($contact)?$contact->footer_description:'' }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Site Logo (Header)</label>
                                <div class="file-loading">
                                    <input id="site_logo" name="site_logo" type="file" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Site Logo Alt Text</label>
                                <input type="text" name="site_logo_attribute" id="site_logo_attribute" placeholder="Alt='Site Logo'" class="form-control placeholder-cls" autocomplete="off" value="{{ !empty($contact)?$contact->site_logo_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Footer Logo</label>
                                <div class="file-loading">
                                    <input id="footer_logo" name="footer_logo" type="file" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Footer Logo Alt Text</label>
                                <input type="text" name="footer_logo_attribute" id="footer_logo_attribute" placeholder="Alt='Footer Logo'" class="form-control placeholder-cls" autocomplete="off" value="{{ !empty($contact)?$contact->footer_logo_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Favicon</label>
                                <div class="file-loading">
                                    <input id="favicon" name="favicon" type="file" accept="image/*,.ico">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Favicon Alt Text</label>
                                <input type="text" name="favicon_attribute" id="favicon_attribute" placeholder="Alt='Favicon'" class="form-control placeholder-cls" autocomplete="off" value="{{ !empty($contact)?$contact->favicon_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>404 Error Page Image</label>
                                <div class="file-loading">
                                    <input id="error_page_image" name="error_page_image" type="file" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>404 Error Page Image Alt Text</label>
                                <input type="text" name="error_page_image_attribute" id="error_page_image_attribute" placeholder="Alt='Page Not Found'" class="form-control placeholder-cls" autocomplete="off" value="{{ !empty($contact)?$contact->error_page_image_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Privacy Policy</label>
                                <textarea name="privacy_policy" id="privacy_policy" placeholder="Privacy Policy" class="form-control tinyeditor" autocomplete="off">{{ !empty($contact)?$contact->privacy_policy:'' }}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Terms & Conditions</label>
                                <textarea name="terms_conditions" id="terms_conditions" placeholder="Terms & Conditions" class="form-control tinyeditor" autocomplete="off">{{ !empty($contact)?$contact->terms_conditions:'' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn"> 
                        <input type="hidden" name="id" id="id" value="{{ !empty($contact)?$contact->id:'0' }}"> 
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>
<script type="text/javascript">
$(document).ready(function(){
    @foreach(['site_logo', 'footer_logo', 'favicon', 'error_page_image'] as $field)
    $("#{{ $field }}").fileinput({
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
        @if(!empty($contact) && $contact->$field)
            initialPreview: ["{{ asset($contact->$field) }}"],
            initialPreviewConfig: [{caption: "{{ $field }}", width: "120px"}]
        @endif
    });
    @endforeach
});
</script>
@endsection