@extends('clients.layouts.template-nobanner')
@section('content')
	<div class="container" style="margin-top: 100px;">
		<div id="card-login">
            <div id="card-content-login">
              <div id="card-title-login" class="login-label">
                <br><br>
                <h1>PASSWORD SUCCESSFULLY SAVED</h1>
                <div class="underline-title2"></div>
                <br><br>
                <p id="label-url">If you want to login, click <a href="{{ route('password.request') }}" style="color: red; text-decoration: underline;">here.</a></p>
              </div>
            </div>
        </div>
	</div>
@endsection