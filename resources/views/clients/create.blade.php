@extends('layouts.master')
@section('title') Create New Client @endsection
@section('content')

	@if(session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
	@endif
	<!-- Form Create -->
    <form id="form_validation" method="POST" enctype="multipart/form-data" action="{{route('clients.store')}}">
    	@csrf
        <div class="form-group form-float">
            <label class="form-label">Client Name</label>
            <div class="form-line">
                <input type="text" class="form-control" name="client_name" autocomplete="off" required>
            </div>
        </div>
        
        <div class="form-group form-float">
            <label class="form-label">Client Slug</label>
            <div class="form-line">
                <input type="text" class="form-control" name="client_slug" autocomplete="off" required>
            </div>
        </div>

        <div class="form-group form-float">
            <label class="form-label">Email Verifikasi</label>
            <div class="form-line">
                <input type="text" class="form-control" name="email_verify" autocomplete="off" required>
            </div>
        </div>

        <div class="form-group form-float">
            <div class="col-12">
                <div class="col-12 row">
                    <div class="col-sm-6">
                        <label class="form-label">Email Billing</label>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email_billing" autocomplete="off" required>
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

        <!-- <div class="form-group form-float">
            <h2 class="card-inside-title">Attachment Billing</h2>
            <div class="form-group">
             <div class="form-line">
                 <input type="file" name="attach_email" class="form-control" id="attach_email" autocomplete="off">
                </div>
            </div>
        </div> -->
                        
        <button class="btn btn-primary waves-effect" type="submit">SAVE</button>
        <a href="{{route('clients.index')}}" class="btn bg-deep-orange waves-effect" >&nbsp;CLOSE&nbsp;</a>
    </form>
    <!-- #END#  -->		

@endsection