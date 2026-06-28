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
              <li class="breadcrumb-item"><a href="{{url(sitePrefix().'administration')}}">Admin list</a></li>
              <li class="breadcrumb-item active">Reset Password</li>
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
            <h3 class="card-title">Reset Password</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Password*</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" min="8" maxlength="20">
                    @error('password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label>Confirm Password*</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" min="8" maxlength="20">
                    @error('confirm_password')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
            </div>
          </div>
          <div class="card-footer">
            <input type="submit" name="btn_save" value="Submit" class="btn btn-primary pull-left submitBtn">
            <button type="reset" class="btn btn-default">Cancel</button>
            <img class="animation__shake loadingImg" src="{{url('app/dist/img/loading.gif')}}" style="display:none;">
          </div>
        </div>
        </form>
      </div>
    </section>  
</div>    
@endsection