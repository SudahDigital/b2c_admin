@extends('clients.layouts.template-nobanner')
@section('content')
    <div class="container" style="margin-top: 100px;">
        <div id="card-login">
            <div id="card-content-login">
              <div id="card-title-login" class="login-label">
                <br><br>
                <h1>PASSWORD</h1>
                <div class="underline-title2"></div>
                <br><br>
                <p style="color: #336699;">Please Input your Password</p>
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('client.savePassword') }}">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="email_client" value="{{ $_GET['email']}}">
                                <input id="password_client" class="form-control" type="password" name="password_client" required />
                                <input type="checkbox" onclick="myPass()"><label for="ket_produk"><p style="color: #336699;">&nbsp;Show Password</p></label>
                                  <!-- <div class="form-border"></div> -->
                            </div>
                            <div class="col-md-12 mx-auto text-center">
                                <button id="submit-btn" type="submit" ><b>Save</b>
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
