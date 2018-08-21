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
                  <th data-sort-ignore="true" data-hide="phone,tablet">Old Value</th>
                  <th data-sort-ignore="true" data-hide="phone,tablet">New Value</th>
                  <th data-sort-ignore="true" data-hide="phone,tablet">Delete Value</th>
                  <th data-sort-ignore="true" data-hide="phone">Email</th>
                  <th data-sort-ignore="true" data-hide="phone">Time</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($logs as $key => $value)
                <tr>
                  <td>{{ $value->page}}</td>
                  <td>{{ $value->type }}</td>
                  <td>
                    <table>
                      @forelse ($value->old_value ?: [] as $ovk => $ovv)
                      <tr>
                        <td>{{ title_case($ovk) }} &nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>&nbsp;{{ $ovv }}</td>
                      </tr>
                      @empty
                        -
                      @endforelse
                    </table>
                  </td>
                  <td>
                    <table>
                      @forelse ($value->new_value ?: [] as $nvk => $nvv)
                      <tr>
                        <td>{{ title_case($nvk) }} &nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>&nbsp;{{ $nvv }}</td>
                      </tr>
                      @empty
                        -
                      @endforelse
                    </table>
                  </td>
                  <td>
                    <table>
                      @forelse ($value->delete_value ?: [] as $dvk => $dvv)
                      <tr>
                        <td>{{ title_case($dvk) }} &nbsp;</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td>&nbsp;{{ $dvv }}</td>
                      </tr>
                      @empty
                        -
                      @endforelse
                    </table>
                  </td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->created_at->diffForHumans()}}</td>
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
