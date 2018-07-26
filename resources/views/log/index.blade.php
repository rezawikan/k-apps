@extends('layouts.app')

@section('title', 'Log')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Logging</h5>
        </div>
        <div class="ibox-content">
          <div class="row">

          </div>
          <div class="table-responsive">
            <table class="footable table">
              <thead>
                <tr>
                  <th data-sort-ignore="true">Page</th>
                  <th data-sort-ignore="true" data-hide="phone">Type</th>
                  <th data-sort-ignore="true" data-hide="phone">Old Value</th>
                  <th data-sort-ignore="true" data-hide="phone">New Value</th>
                  <th data-sort-ignore="true" data-hide="phone">Delete Value</th>
                  <th data-sort-ignore="true" data-hide="phone,tablet">Email</th>
                  <th data-sort-ignore="true" data-hide="phone,tablet">Time</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($logs as $key => $value)
                <tr>
                  <td>{{ $value->page}}</td>
                  <td>{{ $value->type }}</td>
                  <td>{{ $value->old_value }}</td>
                  <td>{{ $value->new_value }}</td>
                  <td>{{ $value->delete_value }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="7">
                    <div class="text-center">
                      {{ $logs->appends(request()->query())->links() }}
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
