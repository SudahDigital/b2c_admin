@extends('layouts.master')
@section('title') Client List @endsection
@section('content')

@if(session('status'))
	<div class="alert alert-success">
		{{session('status')}}
	</div>
@endif

<form action="{{route('clients.index')}}">
	<div class="row">
		<div class="col-md-4">
			<ul class="nav nav-tabs tab-col-pink pull-left" >
				<li role="presentation" class="active">
					<a href="{{route('clients.index')}}" aria-expanded="true" >All</a>
				</li>
			</ul>
		</div>		
		<div class="col-md-8">
			<a href="{{route('clients.create')}}" class="btn btn-success pull-right">Create New Client</a>
		</div>
	</div>
</form>
<hr>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover dataTable js-basic-example">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Image</th>
				<th>Email Billing</th>
				<th>Email Verification</th>
				<th width="20%">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0;?>
			@foreach($client as $c)
			<?php $no++;?>
			<tr>
				<td>{{$no}}</td>
				<td>{{$c->client_name}}</td>
				<td>{{$c->client_slug}}</td>
				<td>{{$c->client_email_billing}}</td>
				<td>{{$c->client_email_verify}}</td>
				<td>
					<a class="btn btn-info btn-xs" href="{{route('clients.edit',[$c->client_id])}}"><i class="material-icons">edit</i></a>&nbsp;
					<button type="button" class="btn btn-danger btn-xs waves-effect" data-toggle="modal" data-target="#deleteModal{{$c->client_id}}"><i class="material-icons">delete</i></button>

					<!-- Modal Delete -->
		            <div class="modal fade" id="deleteModal{{$c->client_id}}" tabindex="-1" role="dialog">
		                <div class="modal-dialog" role="document">
		                    <div class="modal-content modal-col-red">
		                        <div class="modal-header">
		                            <h4 class="modal-title" id="deleteModalLabel">Delete Client</h4>
		                        </div>
		                        <div class="modal-body">
		                           Are you sure want to remove this client ..? 
		                        </div>
		                        <div class="modal-footer">
		                        	<form action="{{route('clients.destroy',[$c->client_id])}}" method="POST">
										@csrf
										<input type="hidden" name="_method" value="DELETE">
										<button type="submit" class="btn btn-link waves-effect">Delete</button>
										<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
									</form>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
	
</div>
@endsection