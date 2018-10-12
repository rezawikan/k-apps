@extends('layouts.app')

@section('title', 'Edit Project - {{ $project->project_name }}')


@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Edit Project - {{ $project->project_name }}</h5>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-lg-12">
                <form class="form-horizontal" action="{{ route('impact-tracker.update',['id' => $project->id ]) }}" method="POST">
                  @method('PUT')
                  @include('impact-tracker._form', ['project' => $project])
                  <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                          <button class="btn btn-md btn-primary" type="submit">Update</button>
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
    $('.chosen-select').chosen();
    
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
