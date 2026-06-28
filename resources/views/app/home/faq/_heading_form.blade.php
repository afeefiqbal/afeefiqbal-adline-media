@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-question-circle"></i> {{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url(sitePrefix().loggedUserType().'dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
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
                    <a href="{{ url(sitePrefix().'home/faq/list') }}" class="btn btn-success pull-right">Manage FAQs <i class="fa fa-list pull-right mt-1 ml-2"></i></a>
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
            <form role="form" id="formWizard" class="form--wizard" method="post">
                {{ csrf_field() }}
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">FAQ Section</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Label*</label>
                                <input type="text" name="title" id="title" placeholder="e.g. Frequently Asked Questions" class="form-control required" autocomplete="off" value="{{ isset($faqHeading) ? $faqHeading->title : '' }}" maxlength="255">
                                <div class="help-block with-errors" id="title_error"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Heading*</label>
                                <input type="text" name="sub_title" id="sub_title" placeholder="Main heading" class="form-control required" autocomplete="off" value="{{ isset($faqHeading) ? $faqHeading->sub_title : '' }}" maxlength="255">
                                <div class="help-block with-errors" id="sub_title_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Description</label>
                                <textarea name="description" id="description" placeholder="Short description" class="form-control" autocomplete="off">{{ isset($faqHeading) ? $faqHeading->description : '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Button Text</label>
                                <input type="text" name="button_text" id="button_text" placeholder="e.g. View All FAQs" class="form-control" autocomplete="off" value="{{ isset($faqHeading) ? $faqHeading->button_text : '' }}" maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Button URL</label>
                                <input type="text" name="button_url" id="button_url" placeholder="e.g. /faqs" class="form-control" autocomplete="off" value="{{ isset($faqHeading) ? $faqHeading->button_url : '' }}" maxlength="255">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" id="btn_save" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
                        <input type="hidden" name="id" id="id" value="{{ isset($faqHeading) ? $faqHeading->id : 0 }}">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <img class="animation__shake loadingImg" src="{{ url('app/dist/img/loading.gif') }}" style="display:none;">
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
