@extends('layouts.app')

@section('content')

  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-4">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <span class="label label-success pull-right">All</span>
            <h5>Country</h5>
          </div>
          <div class="ibox-content">
            <h1 class="no-margins">{{ number_format($country,0,',','.') }}</h1>
            <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
            <small>Total Country</small>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <span class="label label-info pull-right">All</span>
            <h5>Reached</h5>
          </div>
          <div class="ibox-content">
            <h1 class="no-margins">{{ number_format($total_reach,0,',',',') }}</h1>
            <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
            <small>Total Reached</small>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <span class="label label-primary pull-right">All</span>
            <h5>Distributed</h5>
          </div>
          <div class="ibox-content">
            <h1 class="no-margins">{{ number_format($distributed,0,',',',') }}</h1>
            <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
            <small>Total Distributed</small>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Projects</h5>
            <div class="ibox-tools">
              <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              {{-- <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
              </ul>
              <a class="close-link"><i class="fa fa-times"></i></a> --}}
            </div>
          </div>
          <div class="ibox-content">
            <div class="row">
              <form class="" action="{{ route('default') }}" method="GET">
                <div class="col-sm-2 col-xs-12 m-b-xs">
                  <label class="control-label" for="year">Year</label>
                  <select class="input-sm form-control input-s-sm inline" name="year" onchange="this.form.submit()">
                      <option value="">None</option>
                      @foreach ($yearList as $value)
                        <option value="{{ $value->year }}" {{isQueryString(['year' => $value->year]) ? 'selected' : ''}}>{{ $value->year }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-sm-2 col-xs-12 m-b-xs">
                  <label class="control-label" for="project_type">Project Type</label>
                  <select class="input-sm form-control input-s-sm inline" name="project_type" onchange="this.form.submit()">
                      <option value="">None</option>
                      @foreach ($projectTypeList as $value)
                        <option value="{{ str_slug($value->name) }}" {{isQueryString(['name' => str_slug($value->name)]) ? 'selected' : ''}}>{{ $value->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-sm-2 col-xs-12 m-b-xs">
                  <label class="control-label" for="country">Country</label>
                  <select class="input-sm form-control input-s-sm inline" name="country" onchange="this.form.submit()">
                      <option value="">None</option>
                      @foreach ($countryList as $value)
                        <option value="{{ $value->country }}" {{ isQueryString(['country' => $value->country]) ? 'selected' : '' }}>{{ $value->country }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-sm-2 col-xs-12 m-b-xs">
                  <label class="control-label" for="officer">Officer</label>
                  <select class="input-sm form-control input-s-sm inline" name="officer" onchange="this.form.submit()">
                      <option value="">None</option>
                      @foreach ($officerList as $value)
                        <option value="{{ str_slug($value->name) }}" {{ isQueryString(['officer' => str_slug($value->name)]) ? 'selected' : '' }}>{{ $value->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-sm-2 col-xs-12 m-b-xs">
                  <label class="control-label" for="price_type">Price Type</label>
                  <select class="input-sm form-control input-s-sm inline" name="price_type" onchange="this.form.submit()">
                      <option value="">None</option>
                      @foreach ($priceTypeList as $value)
                        <option value="{{ $value->name }}" {{ isQueryString(['price_type' => $value->name]) ? 'selected' : '' }}>{{ $value->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="col-sm-2 col-xs-12 m-b-xs">
                  <label class="control-label" for="technology">Technology</label>
                  <select class="input-sm form-control input-s-sm inline" name="technology" onchange="this.form.submit()">
                      <option value="">None</option>
                      @foreach ($technologyList as $value)
                        <option value="{{ str_slug($value->name) }}" {{ isQueryString(['technology' => str_slug($value->name)]) ? 'selected' : '' }}>{{ $value->name }}</option>
                      @endforeach
                  </select>
                </div>
              </form>
            </div>
            <div class="table-responsive">
              <table class="footable table">
                <thead>
                  <tr>
                    <th data-sort-ignore="true">Project </th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Project Type </th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Officer</th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Total Reached</th>
                    <th data-sort-ignore="true" data-hide="phone">Details</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($projects as $key => $value)
                    <tr>
                      <td>{{ $value->project_name }}</td>
                      <td>{{ $value->project_type }}</td>
                      <td>{{ $value->officer }}</td>
                      <td>{{DB::table('project_technology')->whereIn('project_id',[$value->id])->sum('total_reach')}}</td>
                      <td>
                        <a href="#" class="btn btn-primary btn-xs">Edit</a>
                        <a href="#" class="btn btn-primary btn-xs">View</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5">
                      <div class="text-center">
                        {{ $projects->appends([
                        'year' => $getYear,
                        'project_type' => $getProjectType,
                        'country' => $getCountry,
                        'officer' => $getOfficer,
                        'price_type' => $getPriceType,
                        'technology' => $getTechnology,
                        ])->links() }}
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

{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

@push('b-scripts')
  <!-- Page-Level Scripts -->
  <script>
      $(document).ready(function() {
          $('.footable').footable({paginate: false});
      });

  </script>
@endpush
