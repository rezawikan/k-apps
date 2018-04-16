@extends('layouts.app')

@section('title', 'Edit Technology - {{ $project->project_name }}')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Edit Technology - {{ $project->project_name }}</h5>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-lg-12">
                <form class="form-horizontal" action="{{ route('impact-tracker-tech.update', ['id' => $project->id, 'idTech' => $technology->id ]) }}" method="POST">
                  @method('PUT')
                  @include('impact-tracker.partials._technology')
                  <div class="form-group">
                    <div class="col-lg-12 col-sm-12">
                      <button type="submit" class="btn btn-sm btn-primary">Update</button>
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
