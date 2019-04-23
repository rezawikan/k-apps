@extends('layouts.app')

@section('title', 'Create User')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Create User</h5>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-lg-12">
                <form class="form-horizontal" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Photo Profile</label>
                    <div class="col-lg-8">
                      <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput">
                          <i class="glyphicon glyphicon-file fileinput-exists"></i>
                          <span class="fileinput-filename"></span>
                        </div>
                        <span class="input-group-addon btn btn-default btn-file">
                              <span class="fileinput-new">Select file</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="photo" accept="image/png"/>
                          </span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <span><img alt="image" class="img-circle img-sm" src="{{ asset('storage/images/default.png')}}"></span>
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                      <input type="text" name="email" placeholder="Email" class="form-control" value="{{ $data->email ?? old('email') }}">
                      @if ($errors->has('email'))
                      <span class="help-block m-b-none">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="form-group {{ $errors->has('nick_name') ? 'has-error' : '' }}">
                    <label class="col-lg-2 control-label">Nick Name</label>
                    <div class="col-lg-10">
                      <input type="text" name="nick_name" placeholder="Nick Name" class="form-control" value="{{ $data->nick_name ?? old('nick_name') }}">
                      @if ($errors->has('nick_name'))
                      <span class="help-block m-b-none">{{ $errors->first('nick_name') }}</span>
                      @endif
                    </div>
                  </div>
                  @include('users._form')
                  <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                    <label class="col-lg-2 control-label">Role</label>
                    <div class="col-lg-10">
                      <select name="role" class="form-control">
                        @foreach ($roles as $role )
                          <option value="{{ $role->id }}">{{ ucwords($role->name) }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
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

@push('b-scripts')
<script>
  $(document).ready(function() {
    $('.input-group.date').datepicker({
      format: 'yyyy-mm-dd',
      todayBtn: "linked",
      keyboardNavigation: false,
      forceParse: false,
      calendarWeeks: true,
      autoclose: true
    });
  });
</script>
@endpush
