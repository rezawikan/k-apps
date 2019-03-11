@extends('layouts.app')

@section('title', 'Project Type')

@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Project Type</h5>
            <div class="ibox-tools">
              <a href="{{ route('project-type.create') }}" class="btn btn-xs btn-primary">Add Project Type</a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="row">

            </div>
            <div class="table-responsive">
              <table class="footable table">
                <thead>
                  <tr>
                    <th data-sort-ignore="true">Name</th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Updated At</th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Created At</th>
                    <th data-sort-ignore="true" data-hide="phone">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($datas as $key => $value)
                    <tr>
                      <td>{{ $value->name}}</td>
                      <td>{{ $value->updated_at }}</td>
                      <td>{{ $value->created_at}}</td>
                      <td>
                        <form class="" action="{{ route('project-type.destroy', ['id' => $value->id]) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        <a href="{{ route('project-type.edit',['id' => $value->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                        <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete project type {{strtolower($value->name)}}">
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5">
                      <div class="text-center">
                        {{ $datas->appends(request()->query())->links() }}
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
  })
  </script>
@endpush
