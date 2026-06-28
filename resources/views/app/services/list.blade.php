@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> Manage {{ucfirst($type)}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">{{ucfirst($type)}} List</li>
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
                            @if($type=="service")
		                	     <a href="{{url(sitePrefix().'service/create')}}" class="btn btn-success pull-right">Add {{ucfirst($type)}} <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                                </a>
                            @else
                                <a href="{{url(sitePrefix().'service/sub/create')}}" class="btn btn-success pull-right">Add {{ucfirst($type)}} <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i>
                                </a>
                            @endif
		              	</div>
              			<div class="card-body">
                            <table class="table table-bordered table-hover dataTable" width="100%">    
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        @if($type!="service")
                                            <th>Parent Service</th>
                                        @else
                                            <th>Display to Home</th>
                                        @endif
                                        <th>Sort Order</th>
                                        <th>Status </th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1@endphp@foreach($serviceList as $service)
                                        <tr>
                                        <td>{{ $i }}</td>
                                        <td>{!! $service->title !!} {!!$service->second_title!!}</td>
                                        @if($type!="service")
                                            <td>{!!($service->parent)?$service->parent->title.' '.$service->parent->second_title:'-'!!}</td>
                                        @else
                                            <td><input id="switch-state-{{$i}}" type="checkbox" class="display_to_home" data-url="service/display-to-home" data-size="mini" title="Service" data-id="{{ $service->id}}" <?php if($service->display_to_home=="Yes"){ ?>checked="checked"<?php }?>></td>  
                                        @endif
                                        <td>
                                            <input type="text" name="sort_order" id="sort_order_{{$loop->iteration}}" data-extra="parent_id"
                                               data-extra_key="{{$service->parent_id}}" data-table="Service"
                                               data-id="{{ $service->id }}" class="common_sort_order" style="width:25%"
                                               value="{{$service->sort_order}}">
                                        </td>
                                        <td><input id="switch-state-{{$i}}" type="checkbox" class="status_check" data-size="mini" title="Service" ref="{{ $service->id}}" <?php if($service->status=="Active"){ ?>checked="checked"<?php }?>></td>
                                        <td>{{ date("d-M-Y", strtotime($service->created_at))  }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ url(sitePrefix().'service/faq/'.$service->id) }}" class="btn btn-info mr-2 tooltips" title="Manage FAQs"><i class="fas fa-question-circle"></i> FAQ</a>
                                                @if($type=="service")
                                                    <a href="{{url(sitePrefix().'service/edit/'.$service->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Service"><i class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" data-url="service/delete" data-id="{{$service->id}}" title="Delete Service"><i class="fas fa-trash"></i></a>
                                                @else
                                                    <a href="{{url(sitePrefix().'service/sub/edit/'.$service->id)}}" class="btn btn-success mr-2 tooltips" title="Edit Sub-service"><i class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" data-url="service/sub/delete" data-id="{{$service->id}}" title="Delete sub-service"><i class="fas fa-trash"></i></a>
                                                @endif
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