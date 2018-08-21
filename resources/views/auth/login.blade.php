@extends('layouts.auth')

@section('content')
  <div class="middle-box text-center loginscreen animated fadeInDown">
      <div>
          <div>
              <img src="{{ asset('img/logo.png')}}" class="img-responsive" alt="">
          </div>
          <h4>Intranet System</h4>
          <p>Authorized Personnel Only</p>
          <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <input type="email" name="email" class="form-control" placeholder="Email" required>
              </div>
              <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              @if ($errors->has('email'))
              <div class="form-group has-error">
                  <span class="help-block m-b-none">{{ $errors->first('email') }}</span>
              </div>
              @endif
              {{-- @if ($errors->has('email')) --}}
              <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
              <a href="{{ route('password.request') }}"><small>Forgot password?</small></a>
          </form>
          <p class="m-t"> <small>Kopernik &copy; 2018</small> </p>
      </div>
  </div>
@endsection
