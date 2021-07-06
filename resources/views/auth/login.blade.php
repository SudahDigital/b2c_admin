@extends('clients.layouts.template-nobanner')
@section('content')
    <div class="container" style="margin-top: 100px;">
        <!-- <div class="col-md-12 login-label">
            <h1>Sign In</h1>
            <p> Your Account</p>
        </div>
            
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card mx-auto contact_card" style="border-radius:15px;">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control contact_input @error('email') is-invalid @enderror" placeholder="Email" id="email" required autocomplete="off" autofocus value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr style="border:1px solid rgba(116, 116, 116, 0.507);">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control contact_input @error('password') is-invalid @enderror" placeholder="Kata Sandi" id="password" required autocomplete="off" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback mx-auto" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-12 login-label" style="margin-top:20px;">
                        @if (Route::has('password.request'))
                            <a  href="{{ route('password.request') }}">
                              <p>{{ __('Forgot Your Password?') }}</p>
                            </a>
                        @endif
                    </div>
                    <div class="col-md-12 mx-auto text-center">
                        <button type="submit" class="btn btn_login_form" >{{ __('Sign In') }}
                        </button>
                    </div>
                </form>
            </div>
        </div> -->

        <div id="card-login">
            <div id="card-content-login">
              <div id="card-title-login" class="login-label">
                <h1>LOGIN</h1>
                <div class="underline-title"></div>
                <p style="color: #336699;">Sign In Your Account</p>
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <p for="user-email" style="padding-top:12px; color: #336699;">Email</p>
                                  <input id="user-email" class="form-control" type="email" name="email" autocomplete="on" required />
                                  <!-- <div class="form-border"></div> -->
                                <p for="user-password" style="padding-top:20px; color: #336699;">Password</p>
                                  <input id="user-password" class="form-control" type="password" name="password" required />
                                  <!-- <div class="form-border"></div> -->
                                <!-- <a href="{{ route('password.request') }}"><p id="forgot-pass">Forgot password?</p></a> -->
                            </div>
                            <div class="col-md-12 mx-auto text-center">
                                <button id="submit-btn" type="submit" ><b>{{ __('Sign In') }}</b>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <br>
    <br>
@endsection
