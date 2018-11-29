@extends('layouts.app')

@section('title', 'Add Technology')

@section('content')
  {{-- <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Add Technology - {{ $project->project_name }}</h5>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-lg-12">
                <form class="form-horizontal" action="{{ route('impact-tracker-tech.store', ['id' => $project->id]) }}" method="POST">
                  @include('impact-tracker.partials._technology') --}}
                  <router-view></router-view>
                  {{-- <div class="form-group">
                    <div class="col-lg-12 col-sm-12">
                      <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
@endsection
