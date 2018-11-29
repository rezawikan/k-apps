@extends('layouts.app')

@section('title', 'Technology Rules')

@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Technology Rules</h5>
            <div class="ibox-tools">
              <a href="{{ route('technology-rules.create') }}" class="btn btn-xs btn-primary">Add Technology Rules</a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="row">

            </div>
            <div class="table-responsive">
              <table class="footable table">
                <thead>
                  <tr>
                    <th data-sort-ignore="true">Technology Type</th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Distribution Target</th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Multiplier</th>
                    <th data-sort-ignore="true" data-hide="phone">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($results as $value)

                    <tr>
                      <td>{{ $value['type']}}</td>
                      <td>{{ $value['target'] }}</td>
                      <td>{{ $value['multiplier']}}</td>
                      <td>
                        <form class="" action="{{ route('technology-rules.destroy',['id' => $value['id']]) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        <a href="{{ route('technology-rules.edit',['id' => $value['id']]) }}" class="btn btn-primary btn-xs">Edit</a>
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
                        {{-- {{ $datas->appends(request()->query())->links() }} --}}
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
