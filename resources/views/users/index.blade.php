@extends('layouts.app')

@section('title', 'Users')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h2><i class="fa fa-user-circle-o"></i> Users</h2>
          @can('create user')
          <div class="ibox-tools">
            <a href="{{ route('users.create') }}" class="btn btn-xs btn-primary">Add User</a>
          </div>
          @endcan
        </div>
        <div class="ibox-title">
          <div class="ibox-tools">
            <form class="" action="{{ route('users.index') }}" method="GET">
              <div class="form-group" style="max-width:400px;">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search by name" value="{{ request('q') }}">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Search</button>
                  </span>
                  @if (request('q'))
                  <span class="input-group-btn">
                    <a href="{{ route('users.index') }}" class="btn">Reset</a>
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
                  <th data-sort-ignore="true">Full Name</th>
                  <th data-sort-ignore="true" data-hide="phone,tablet">Email</th>
                  <th data-sort-ignore="true" data-hide="phone,tablet">Company</th>
                  @can(['edit user','delete user'])
                  <th data-sort-ignore="true" data-hide="phone">Action</th>
                  @endcan
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $key => $value)
                <tr>
                  <td>{{ $value->full_name}}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->entity }}</td>
                  @can(['edit user','delete user'])
                  <td>
                    <form class="" action="{{ route('users.destroy', ['id' => $value->id]) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      @can('edit user')
                      <a href="{{ route('users.edit',['id' => $value->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                      @endcan
                      @can('delete user')
                      <input type="submit" value="Delete" class="btn btn-primary btn-xs">
                      @endcan
                    </form>
                  </td>
                  @endcan
                </tr>
                @empty
                <tr>
                  <td colspan="4" class="text-center">
                    <h4>Not Found</h4>
                  </td>
                </tr>
                @endforelse
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="5">
                    <div class="text-center">
                      {{ $users->appends(request()->query())->links() }}
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
  });
</script>
@endpush
