@extends('layouts.master')
@section('title') Edit Client @endsection
@section('content')

	@if(session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
	@endif
	<!-- Form Edit -->

    <form id="form_validation" method="POST" enctype="multipart/form-data" action="{{route('clients.update',[$client_id])}}">
    	@csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group form-float">
            <label class="form-label">Client Name</label>
            <div class="form-line">
                <input type="text" class="form-control" name="client_name" value="{{ $client_name }}" autocomplete="off" required>
                <input type="hidden" name="client_id" value="{{ $client_id }}">
            </div>
        </div>
        
        <div class="form-group form-float">
            <label class="form-label">Client Slug</label>
            <div class="form-line">
                <input type="text" class="form-control" name="client_slug" value="{{ $client_slug }}" autocomplete="off" required>
            </div>
        </div>

        <div class="form-group form-float">
            <label class="form-label">Email Verifikasi</label>
            <div class="form-line">
                <input type="text" class="form-control" name="email_verify" value="{{ $client_email_verify }}" autocomplete="off" required>
            </div>
        </div>

        <div class="form-group form-float">
            <div class="col-12">
                <div class="col-12 row">
                    <div class="col-sm-6">
                        <label class="form-label">Email Billing</label>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email_billing" value="{{ $client_email_billing }}"autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label">Attachment Billing</label>
                        <div class="form-line">
                             <input type="file" name="attach_email" class="form-control" id="attach_email" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary waves-effect" type="submit">EDIT</button>&nbsp;
        <a href="{{route('clients.index')}}" class="btn bg-deep-orange waves-effect" >&nbsp;CLOSE&nbsp;</a>
    </form>

    <!-- #END#  -->		

@endsection