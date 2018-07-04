@extends('layouts.app')

@section('title', 'Technology')

@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Technology</h5>
            <div class="ibox-tools">
              <a href="{{ route('technology.create') }}" class="btn btn-xs btn-primary">Add Tehnology</a>
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
                  @foreach ($technologies as $key => $value)
                    <tr>
                      <td>{{ $value->name}}</td>
                      <td>{{ $value->updated_at }}</td>
                      <td>{{ $value->created_at}}</td>
                      <td>
                        <form class="" action="{{ route('technology.destroy', ['id' => $value->id]) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        <a href="{{ route('technology.edit',['id' => $value->id]) }}" class="btn btn-primary btn-xs">Edit</a>
                        <input type="submit" value="Delete"class="btn btn-primary btn-xs">
                        </form>
                      </td>
                    </tr>
                  @endforeach
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
