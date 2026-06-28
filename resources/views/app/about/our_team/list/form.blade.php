@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> {{$title}} Team</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{url(sitePrefix().'about-us/our-team/list')}}">Team</a></li>
                      <li class="breadcrumb-item active">{{$title}} Team member</li>
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
                    <h3 class="card-title">Basic Informations</h3>
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
                        <div class="form-group col-md-6">
                            <label for="title">Name*</label>
                            <input type="text" name="title" id="title" placeholder="Name" class="form-control required for_canonical_url" autocomplete="off" value="{{ isset($list)?$list->title:'' }}" maxlength="255">
                            <div class="help-block with-errors" id="title_error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="short_url">Canonical URL</label>
                            <input type="text" name="short_url" id="short_url" placeholder="team-member-url" class="form-control" autocomplete="off" value="{{ isset($list)?$list->short_url:'' }}" maxlength="255">
                            <small class="form-text text-muted">Leave blank to auto-generate from name.</small>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Designation*</label>
                            <input type="text" name="designation" id="designation" placeholder="Designation" class="form-control required" autocomplete="off" value="{{ isset($list)?$list->designation:'' }}" maxlength="255">
                            <div class="help-block with-errors" id="designation_error"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Experience</label>
                            <input type="text" name="experience" id="experience" placeholder="e.g. 12 years" class="form-control" autocomplete="off" value="{{ isset($list)?$list->experience:'' }}" maxlength="255">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="email" name="email" id="email" placeholder="info@domain.com" class="form-control" autocomplete="off" value="{{ isset($list)?$list->email:'' }}" maxlength="255">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone</label>
                            <input type="text" name="phone" id="phone" placeholder="+91 123 456 789" class="form-control" autocomplete="off" value="{{ isset($list)?$list->phone:'' }}" maxlength="255">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>About</label>
                            <textarea name="description" id="description" placeholder="About team member" class="form-control tinyeditor" autocomplete="off">{{ isset($list)?$list->description:'' }}</textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="image">Image{{ isset($list) ? '' : '*' }}</label>
                            <div class="file-loading">
                                <input id="image" name="image" type="file" accept="image/*">
                            </div>
                            <span class="caption_note">Note: Image size must be 315 x 317</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="image_attribute">Image Attribute</label>
                            <input type="text" name="image_attribute" id="image_attribute" placeholder="Image Alternate Text" class="form-control placeholder-cls" autocomplete="off" value="{{ isset($list)?$list->image_attribute:'' }}" maxlength="255">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="submit" class="btn btn-primary pull-left submitBtn" value="Submit">
                            <input type="reset" class="btn btn-default" value="Reset">
                            <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                        </div>
                    </div>
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
        required: {{ isset($list) && $list->image ? 'false' : 'true' }},
        allowedFileTypes: ['image'],
        minImageWidth: 315,
        minImageHeight: 317,
        maxImageWidth: 315,
        maxImageHeight: 317,
        showRemove: true,
        @if(isset($list) && $list->image!=NULL)
          initialPreview: ["{{asset($list->image)}}"],
          initialPreviewConfig: [{
              caption: "{{ $list->title }}",
              width: "120px",
              key: "{{ $list->image }}",
          }]
        @endif
    });
});
</script>      
@endsection
