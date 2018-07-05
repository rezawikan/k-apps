@extends('layouts.app')

@section('title', 'K-nowledge')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>{{ $project->project_name }}</h5>
            <div class="ibox-tools">
              <form class="form-inline" action="{{  route('impact-tracker.destroy',['id' => $project->id]) }}" method="POST" style="display: inline-block;">
                {{ method_field('DELETE') }} {{ csrf_field() }}
                <a href="{{ route('impact-tracker.edit',['id' => $project->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                <button type="submit" class="btn btn-sm btn-primary">Delete Forever</button>
              </form>
            </div>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-sm-3">
                <p><strong>Start Date :</strong> {{ $project->start_date }}</p>
                <p><strong>Year :</strong> {{ $project->year }}</p>
                <p><strong>Country :</strong> {{ $project->country }}</p>
                <p><strong>Project Type :</strong> {{ $project->project_type }}</p>
                <p><strong>Price Type :</strong> {{ $project->price_type }}</p>
                <p><strong>Officer :</strong> {{ $project->officer }}</p>
              </div>
            </div>
          </div>
          <div class="ibox-content">
            <div class="m-b-xs">
              <a href="{{ route('impact-tracker-tech.create',['id' => $project->id ]) }}" class="btn btn-sm btn-primary">Add Technology</a>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Technology Name</th>
                  <th>Technology Type</th>
                  <th>Distribution Target</th>
                  <th>Distribution Unit</th>
                  <th>People Reach</th>
                  <th>Total Reached</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($technology as $value)
                  <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->type }}</td>
                    <td>{{ $value->pivot->distribution_target }}</td>
                    <td>{{ $value->pivot->distribution_unit }}</td>
                    <td>{{ $value->pivot->per_unit }}</td>
                    <td>{{ $value->pivot->total_reach }}</td>
                    <td>
                      <form class="" action="{{ route('impact-tracker-tech.destroy', ['id' => $project->id, 'idTech' => $value->pivot->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      <a href="{{ route('impact-tracker-tech.edit',['id' => $project->id, 'idTech' => $value->pivot->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                      <input type="submit" value="Delete"class="btn btn-primary btn-xs">
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3"><strong>TOTAL</strong></td>
                  <td><strong>{{ sumProjects($technology,'distribution_unit')}}</strong></td>
                  <td><strong>{{ sumProjects($technology,'per_unit')}}</strong></td>
                  <td><strong>{{ sumProjects($technology,'total_reach')}}</strong></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
