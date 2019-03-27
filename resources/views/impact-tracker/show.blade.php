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
                @can('edit project')
                  <a href="{{ route('impact-tracker.edit',['id' => $project->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                @endcan
                @can('delete project')
                  <button type="submit" class="btn btn-sm btn-primary js-submit-confirm" data-confirm-message="You will be delete project {{$project->project_name}}">Delete</button>
                @endcan
              </form>
            </div>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-sm-12">
                <p><strong>Start Date :</strong> {{ $project->start_date }}</p>
                <p><strong>Country :</strong> {{ $project->country->name }}</p>
                <p><strong>Project Type :</strong> {{ $project->project_type->name }}</p>
                <p><strong>Price Type :</strong> {{ $project->price_type->name }}</p>
                <p><strong>Officer :</strong> {{ $project->officer }}</p>
                <p><strong>Funding Type :</strong> {{ funding_types_helper(convertModelToArray($project->funding_types())) }}</p>
              </div>
            </div>
          </div>
          <div class="ibox-content">
            <div class="m-b-xs">
              @can('create technology on project')
                <a href="{{ route('impact-tracker-tech.create',['id' => $project->id ]) }}" class="btn btn-sm btn-primary">Add Technology</a>
              @endcan
            </div>
            <table class="table table-bordered footable">
              <thead>
                <tr>
                  <th data-sort-ignore="true">Technology Name</th>
                  <th data-sort-ignore="true">Technology Type</th>
                  <th data-sort-ignore="true" data-hide="phone">Distribution Target</th>
                  <th data-sort-ignore="true" data-hide="phone">Distribution Unit</th>
                  <th data-sort-ignore="true" data-hide="phone">People Reach Multiplier</th>
                  <th data-sort-ignore="true" data-hide="phone">Total Reached</th>
                  <th data-sort-ignore="true" data-hide="phone, tablet">Year</th>
                  <th data-sort-ignore="true">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($technology as $value)
                  <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->technology_type->name }}</td>
                    <td>{{ $value->distribution_target()->name }}</td>
                    <td>{{ $value->pivot->distribution_unit }}</td>
                    <td>{{ $value->pivot->per_unit }}</td>
                    <td>{{ $value->pivot->total_reach }}</td>
                    <td>{{ $value->pivot->year ?? '' }}</td>
                    <td>
                      <form action="{{ route('impact-tracker-tech.destroy', ['id' => $project->id, 'pivotID' => $value->pivot->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        @can('edit technology on project')
                          <a href="{{ route('impact-tracker-tech.edit',['id' => $project->id, 'pivotID' => $value->pivot->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                        @endcan
                        @can('delete technology on project')
                          <input type="submit" value="Delete" class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete technology {{$value->name}}">
                        @endcan
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
                  <td></td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('b-scripts')
<!-- Page-Level Scripts -->
<script>
  $(document).ready(function() {
    $('.footable').footable({
      paginate: false
    });
    $('.chosen-select').chosen();

    $('.js-submit-confirm').click(function(e) {
      e.preventDefault();

      console.log('testing');

      var $form = $(this).closest('form')
      var $el = $(this)
      var text = $el.data('confirm-message') ? $el.data('confirm-message') : "You will delete this data"

      swal({
        title: 'Are you sure?',
        text: text,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $form.submit()
        }
      })
    })
  });
</script>
@endpush
