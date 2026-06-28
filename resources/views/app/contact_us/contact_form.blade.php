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
                        <h3 class="card-title">Contact-us page Form</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                         </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Email ID*</label>
                                <input type="email" name="email_id" id="email_id" class="form-control required" placeholder="Email ID" value="{{ !empty($contact)?$contact->email_id:'' }}" maxlength="50">
                                <div class="help-block with-errors" id="email_id_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Email Recepient Name*</label>
                                <input type="text" name="email_recepient" id="email_recepient" class="form-control required" placeholder="Email Recepient Name" value="{{ !empty($contact)?$contact->email_recepient:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="email_recepient_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label> Phone Number*</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control required" placeholder="Phone Number" value="{{ !empty($contact)?$contact->phone_number:'' }}" maxlength="15">
                                <div class="help-block with-errors" id="phone_number_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Whatsapp Number</label>
                                <input type="text" name="whatsapp_number" id="whatsapp_number" class="form-control" placeholder="Whatsapp Number" value="{{ !empty($contact)?$contact->whatsapp_number:'' }}" maxlength="15">
                                <div class="help-block with-errors" id="whatsapp_number_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Contact form Title*</label>
                                <input type="text" name="contact_form_title" id="contact_form_title" placeholder="Contact Form Title" class="form-control required" autocomplete="off" value="{{ !empty($contact)?$contact->contact_form_title:'' }}" maxlength="255">
                                <div class="help-block with-errors" id="address_title_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Contact Page Image</label>
                                <div class="file-loading">
                                    <input id="contact_image" name="contact_image" type="file" accept="image/*">
                                </div>
                                <span class="caption_note">Recommended size: 506 x 630</span>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contact Image Attribute</label>
                                <input type="text" name="contact_image_attribute" id="contact_image_attribute" placeholder="Alt='Contact Us'" class="form-control placeholder-cls" autocomplete="off" value="{{ !empty($contact)?$contact->contact_image_attribute:'' }}" maxlength="255">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Form Captcha</label>
                                <select name="form_captcha_enabled" id="form_captcha_enabled" class="form-control">
                                    <option value="Yes" {{ (!empty($contact) && $contact->form_captcha_enabled === 'No') ? '' : 'selected' }}>Enabled</option>
                                    <option value="No" {{ (!empty($contact) && $contact->form_captcha_enabled === 'No') ? 'selected' : '' }}>Disabled</option>
                                </select>
                                <small class="form-text text-muted">Shows a math question on contact and quote forms.</small>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Captcha Type</label>
                                <select name="form_captcha_type" id="form_captcha_type" class="form-control">
                                    @php $captchaType = !empty($contact) ? ($contact->form_captcha_type ?? 'random') : 'random'; @endphp
                                    <option value="random" {{ $captchaType === 'random' ? 'selected' : '' }}>Random (Addition or Subtraction)</option>
                                    <option value="addition" {{ $captchaType === 'addition' ? 'selected' : '' }}>Addition Only</option>
                                    <option value="subtraction" {{ $captchaType === 'subtraction' ? 'selected' : '' }}>Subtraction Only</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Google Map Embed URL</label>
                                <textarea name="google_map" id="google_map" class="form-control" placeholder="Paste Google Maps embed URL or iframe src">{{ !empty($contact)?$contact->google_map:'' }}</textarea>
                                <span style="color:green;font-size:14px;">Paste the embed URL from Google Maps (Share → Embed a map → copy the src URL), or the full iframe code.</span>
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
    $("#contact_image").fileinput({
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
        @if(!empty($contact) && $contact->contact_image)
            initialPreview: [
                "{{ asset($contact->contact_image) }}",
            ],
            initialPreviewConfig: [
                {caption: "Contact page image", width: "120px"}
            ]
        @endif
    });
});
</script>
@endsection