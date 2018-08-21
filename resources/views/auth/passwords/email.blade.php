@extends('layouts.auth')

@section('content')
  <div class="passwordBox animated fadeInDown">
      <div class="row">

          <div class="col-md-12">
              <div class="ibox-content">

                  <h2 class="font-bold">Forgot Password</h2>
                  <p>Enter your email address and you will get link to your email for updating your password.</p>
                  <div class="row">

                      <div class="col-lg-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                {{ session('status') }}
                            </div>
                        @endif
                          <form class="m-t" role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                  <input type="email" name="email" class="form-control" placeholder="Email address" required>
                              </div>
                              @if ($errors->has('email'))
                              <div class="form-group has-error">
                                  <span class="help-block m-b-none">{{ $errors->first('email') }}</span>
                              </div>
                              @endif
                              <button type="submit" class="btn btn-primary block full-width m-b">Reset Password</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <hr/>
      <div class="row">
          <div class="col-md-6">
          </div>
          <div class="col-md-6 text-right">
             <small>Kopernik © 2018</small>
          </div>
      </div>
  </div>
@endsection
