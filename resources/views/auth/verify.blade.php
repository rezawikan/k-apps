@extends('layouts.app')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-content">
          <h2><i class="fa fa-copyright"></i> {{ __('Verify Your Email Address') }}</h2>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  @if (session('resent'))
                  <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                  </div>
                  @endif

                  {{ __('Before proceeding, please check your email for a verification link.') }}
                  {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
