@extends('layouts.app')

@section('title', 'Create Funding Type')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Create Funding Type</h5>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-lg-12">
                <form class="form-horizontal" action="{{ route('funding-type.store') }}" method="POST">
                  @include('manage.funding-type._form')
                  <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                          <button class="btn btn-md btn-primary" type="submit">Save</button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
