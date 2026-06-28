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
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().'portfolio/')}}">Portfolio</a></li>
                        <li class="breadcrumb-item active"> Gallery</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<div class="col-12">
          			@if (session('message'))
		                <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
		                    {{ session('message') }}
		                </div>
		            @elseif(session('error'))
		                <div class="alert alert-danger" role="alert">
		                    <button type="button" class="close" data-dismiss="alert">×</button>
		                    {{ session('error') }}
		                </div>
		            @endif
          			<div class="card card-success card-outline">
		              	<div class="card-header">
		                	<a href="{{url(sitePrefix().'portfolio/item/gallery/create/'.$portfolio->id)}}" class="btn btn-success pull-right">Add Media <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
		              	</div>
              			<div class="card-body">
                			<table class="table table-bordered table-hover dataTable">
                            <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @php $i=1 @endphp @foreach($galleriesList as $portfolio)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{$portfolio->type}}</td>
                                            <td><input id="switch-state" type="checkbox" class="status_check" data-size="mini" title="PortfolioGallery" ref="{{ $portfolio->id}}" <?php if($portfolio->status=="Active"){ ?>checked="checked"<?php }?>></td>
                                            <td>{{ date("d-M-Y", strtotime($portfolio->created_at))  }}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                <a href="{{url(sitePrefix().'portfolio/item/gallery/edit/'.$portfolio->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Media"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" title="Delete Gallery" data-url="portfolio/item/gallery/delete" data-id="{{$portfolio->id}}"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @php $i++;@endphp@endforeach
                                </tbody>
                    </table>
              	</div>
            </div>
        </div>
    </section>
</div>    
@endsection