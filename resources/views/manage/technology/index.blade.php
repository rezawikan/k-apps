@extends('layouts.app')

@section('title',  'Technology')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Technology</h5>
          <a href="{{ route('technology.create') }}" class="btn btn-xs btn-primary pull-right">Add Tehnology</a>
        </div>
        <div class="ibox-title">
          <div class="ibox-tools">
            <form class="" action="{{ route('technology.index') }}" method="GET">
              <div class="form-group" style="max-width:400px;">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search by name" value="{{ request('q') }}">
                  <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary">Search</button>
                  </span>
                  @if (request('q'))
                    <span class="input-group-btn">
                        <a href="{{ route('technology.index') }}" class="btn">Reset</a>
                    </span>
                  @endif
                </div>
              </div>
            </form>
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
                  <th data-sort-ignore="true" data-hide="phone,tablet">Type</th>
                  <th data-sort-ignore="true" data-hide="phone,tablet">Updated At</th>
                  <th data-sort-ignore="true" data-hide="phone,tablet">Created At</th>
                  <th data-sort-ignore="true" data-hide="phone">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse  ($technologies as $key => $value)
                <tr>
                  <td>{{ $value->name}}</td>
                  <td>{{ $value->technology_types->name }}</td>
                  <td>{{ $value->updated_at }}</td>
                  <td>{{ $value->created_at}}</td>
                  <td>
                    <form class="" action="{{ route('technology.destroy', ['id' => $value->id]) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <a href="{{ route('technology.edit',['id' => $value->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                      <input type="submit" value="Delete"class="btn btn-primary btn-xs js-submit-confirm data" data-confirm-message="You will be delete technology  {{strtolower($value->name)}}">
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="text-center"><h4>Not Found</h4>
                  </td>
                </tr>
                @endforelse
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5">
                    <div class="text-center">
                      {{ $technologies->appends(request()->query())->links() }}
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
