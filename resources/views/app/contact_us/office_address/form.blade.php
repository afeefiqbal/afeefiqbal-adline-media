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
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().'contact/office-address')}}">Address</a></li>
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
            <form role="form" id="formWizard" class="form--wizard" enctype="multipart/form-data" method="post">
                {{csrf_field()}}          
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Address Form</h3>
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
                                <label> Title*</label>
                                <input type="text" name="title" id="title" placeholder="Title" class="form-control required" autocomplete="off"  value="{{ isset($office_address)?$office_address->title:'' }}">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label> Mobile</label>
                                <input type="text" name="mobile" id="mobile" placeholder="Mobile" class="form-control " autocomplete="off"  value="{{ isset($office_address)?$office_address->mobile:'' }}">
                                <div class="help-block with-errors" id="mobile_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label> Address*</label>
                                <textarea name="address" id="address" placeholder="Address" class="form-control required" autocomplete="off">{{ isset($office_address)?$office_address->address:'' }}</textarea>
                                <div class="help-block with-errors" id="address_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save" data-id="{{isset($office_address)?$office_address->id:''}}"value="Submit" class="btn btn-primary pull-left submitBtn">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <input type="hidden" name="id" id="id" value="{{ isset($office_address)?$office_address->id:'0' }}">
                        <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>  
</div>
@endsection