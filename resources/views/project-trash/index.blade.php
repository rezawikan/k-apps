@extends('layouts.app')

@section('title',  'Project Trash')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Project Trash</h5>
        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="footable table">
              <thead>
                <tr>
                  <th data-sort-ignore="true">Project </th>
                  <th data-sort-ignore="true" data-hide="phone">Project Type</th>
                  <th data-sort-ignore="true" data-hide="phone">Total Reached</th>
                  <th data-sort-ignore="true" data-hide="phone">Total Distributed</th>
                  <th data-sort-ignore="true" data-hide="phone">Details</th>
                </tr>
              </thead>
              <tbody>

                @foreach  ($projects as $key => $value)
                <tr>
                  <td>{{ $value->project_name }}</td>
                  <td>{{ $value->project_type->name }}</td>
                  <td>{{ $value->additional_total_reached }}</td>
                  <td>{{ $value->additional_total_distributed }}</td>
                  <td>

                    <form action="{{ route('project-trash.destroy', ['id' => $value->id]) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                        <input type="submit" value="Delete" class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete project forever {{$value->name}}">
                    </form>

                    <form action="{{ route('project-trash.restore', ['id' => $value->id]) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                        <input type="submit" value="Restore" class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be restore project on impact tracker {{$value->name}}">
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5">
                    <div class="text-center">
                      {{ $projects->links() }}
                    </div>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
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
