@extends('app.layouts.main')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user-shield"></i> Manage Portfolio</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url(sitePrefix().loggedUserType().'/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Portfolio List</li>
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
		                	<a href="{{url(sitePrefix().'portfolio/item/create/')}}" class="btn btn-success pull-right">Add Portfolio <i class="fa fa-plus-circle pull-right mt-1 ml-2"></i></a>
		              	</div>
              			<div class="card-body">
                            <table class="table table-bordered table-hover dataTable" width="100%">    
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Sort Order</th>
                                        <th>Gallery</th>
                                        <th>Status </th>
                                        <th>Display to Home </th>
                                        <th>Created Date</th>
                                        <th class="not-sortable">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1@endphp@foreach($portfolioList as $portfolio)
                                    
                                        <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $portfolio->title }}</td>
                                        <td>{{ ($portfolio->category)?$portfolio->category->title:'' }}</td>
                                        <td>
                                            <input type="text" name="sort_order"
                                                   id="sort_order_{{$loop->iteration}}"
                                                   data-url="/sort-order/" data-table="Portfolio"
                                                   data-id="{{ $portfolio->id }}" class="common_sort_order"
                                                   style="width:50%" value="{{$portfolio->sort_order}}">
                                        </td>
                                        <td><a href="{{url(sitePrefix().'portfolio/item/gallery/'.$portfolio->id)}}" class="btn btn-sm btn-primary mr-2 tooltips" title="Add Gallery">Gallery</a></td>
                                        <td><input id="switch-state-{{$i}}" type="checkbox" class="status_check" data-size="mini" title="Portfolio" ref="{{ $portfolio->id}}" <?php if($portfolio->status=="Active"){ ?>checked="checked"<?php }?>></td>
                                        <td><input id="switch-best-seller-{{$i}}" type="checkbox" class="display_to_home" data-size="mini" data-url="portfolio/item/display-to-home" title="Portfolio" data-id="{{ $portfolio->id}}" <?php if($portfolio->display_to_home=="Yes"){ ?>checked="checked"<?php }?>></td>
                                        <td>{{ date("d-M-Y", strtotime($portfolio->created_at))  }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{url(sitePrefix().'portfolio/item/edit/'.$portfolio->id)}}" class="btn btn-success mr-2 tooltips" title="Edit portfolio"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-danger mr-2 delete_entry tooltips" data-url="portfolio/item/delete" data-id="{{$portfolio->id}}" title="Delete portfolio"><i class="fas fa-trash"></i></a>
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