@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Edit User</h5>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-lg-12">
                <form class="form-horizontal" action="{{ route('users.update', ['id' => $data->id]) }}" method="POST">
                  @method('PUT')
                  @include('users._form')
                  <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
                    <label class="col-lg-2 control-label">Role</label>
                    <div class="col-lg-10">
                      <select name="role" class="form-control">
                        @foreach ($roles as $role )
                          <option value="{{ $role->id }}" {{ $data->roles->first()->id == $role->id ? 'selected' : '' }}>{{ ucwords($role->name) }}</option>
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
