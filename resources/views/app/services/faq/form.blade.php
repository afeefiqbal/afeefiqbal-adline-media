@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-question-circle"></i> {{ $title }} FAQ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url(sitePrefix().loggedUserType().'dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url(sitePrefix().'service'.($service->parent_id ? '/sub' : '')) }}">{{ $service->parent_id ? 'Sub-service' : 'Service' }} List</a></li>
                        <li class="breadcrumb-item"><a href="{{ url(sitePrefix().'service/faq/'.$service->id) }}">FAQs - {!! $service->title !!}</a></li>
                        <li class="breadcrumb-item active">{{ $title }} FAQ</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <form role="form" id="formWizard" class="form--wizard" method="post">
                {{ csrf_field() }}
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">FAQ for: {!! $service->title !!}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
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
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="question">Question*</label>
                                <input type="text" name="question" id="question" placeholder="Question" class="form-control required" autocomplete="off" value="{{ isset($faq) ? $faq->question : '' }}" maxlength="500">
                                <div class="help-block with-errors" id="question_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="answer">Answer*</label>
                                <textarea class="form-control tinyeditor required" id="answer" name="answer">{!! isset($faq) ? $faq->answer : '' !!}</textarea>
                                <div class="help-block with-errors" id="answer_error"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="submit" class="btn btn-primary pull-left submitBtn" value="Submit">
                                <a href="{{ url(sitePrefix().'service/faq/'.$service->id) }}" class="btn btn-default">Cancel</a>
                                <img class="animation__shake loadingImg" src="{{ url('app/dist/img/loading.gif') }}" style="display:none;">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
