@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> Manage Address</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Address List</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<div class="col-12">
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
          			<div class="card card-success card-outline">
		              	<div class="card-header">
		                	<a href="{{url(sitePrefix().'contact/office-address/create')}}" class="btn btn-success pull-right">Add Address <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
		              	</div>
              			<div class="card-body">
                            <table class="table table-bordered table-hover dataTable" width="100%">    
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Sort Order</th>
                                        <th>Status </th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1@endphp@foreach($officeAddress as $service)
                                        <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>
                                            <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="id"
                                                   data-extra_key="{{$service->id}}" data-table="OfficeAddress"
                                                   data-id="{{ $service->id }}" class="common_sort_order" style="width:50%"
                                                   value="{{$service->sort_order}}">
                                        </td>
                                        <td><input id="switch-state-{{$i}}" type="checkbox" class="status_check" data-size="mini" title="OfficeAddress" ref="{{ $service->id}}" <?php if($service->status=="Active"){ ?>checked="checked"<?php }?>></td>
                                        <td>{{ date("d-M-Y", strtotime($service->created_at))  }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(sitePrefix().'contact/office-address/edit/'.$service->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Address"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" data-url="contact/office-address/delete" data-id="{{$service->id}}" title="Delete Address"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                        </tr>
                                    @php $i++@endphp@endforeach
                                </tbody>
                            </table>
              	        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection