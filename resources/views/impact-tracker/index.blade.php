@extends('layouts.app')

@section('title', 'Impact Tracker')

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
              <form class="" action="{{ route('dashboard') }}" method="GET">
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="year">Year</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="year[]">
                        @foreach ($yearList as $value)
                          @if (in($value->year, $getYear))
                            <option value="{{ $value->year }}" selected>{{ $value->year }}</option>
                          @else
                            <option value="{{ $value->year }}">{{ $value->year }}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="project_type">Project Type</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="project_type[]">
                        @foreach ($projectTypeList as $value)
                          @if (in($value->name, $getProjectType))
                            <option value="{{ str_slug($value->name) }}" selected>{{ $value->name }}</option>
                          @else
                            <option value="{{ str_slug($value->name) }}">{{ $value->name }}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="country">Country</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="country[]">
                        @foreach ($countryList as $value)
                          @if (in($value->country, $getCountry))
                            <option value="{{ $value->country}}" selected>{{ $value->country }}</option>
                          @else
                            <option value="{{ $value->country }}">{{ $value->country }}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="officer">Officer</label>
                    <select data-placeholder="Choose one" class="chosen-select" name="officer">
                        <option value="">
                        @foreach ($officerList as $value)
                          @if (in($value->name, $getOfficer))
                            <option value="{{ str_slug($value->name) }}" selected >{{ $value->name }}</option>
                          @else
                            <option value="{{ str_slug($value->name) }}" >{{ $value->name }}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="price_type">Price Type</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="price_type[]">
                        @foreach ($priceTypeList as $value)
                          @if (ins($value->name, $getPriceType))
                            <option value="{{ str_slug($value->name) }}" selected >{{ $value->name }}</option>
                          @else
                            <option value="{{ str_slug($value->name) }}" >{{ $value->name }}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="technology">Technology</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="technology[]">
                        @foreach ($technologyList as $value)
                          @if (in($value->name, $getTechnology))
                            <option value="{{ str_slug($value->name) }}" selected >{{ $value->name }}</option>
                          @else
                            <option value="{{ str_slug($value->name) }}" >{{ $value->name }}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="technology">Technology Type</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="typetech[]">

                        @foreach ($technologyType as $value)
                          @if (in($value->type, $getTypeTech))
                            <option value="{{ str_slug($value->type) }}" selected >{{ $value->type }}</option>
                          @else
                            <option value="{{ str_slug($value->type) }}" >{{ $value->type }}</option>
                          @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="price_type">Search</label>
                    <div class="input-group">
                      <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ $search }}">
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Search</button>
                      </span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="table-responsive">
              <table class="footable table">
                <thead>
                  <tr>
                    <th data-sort-ignore="true">Project </th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Project Type</th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Total Distributed</th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Total Reached</th>
                    <th data-sort-ignore="true" data-hide="phone">Details</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($projects as $key => $value)
                    <tr>
                      <td>{{ $value->project_name }}</td>
                      <td>{{ $value->project_type }}</td>
                      <td>{{ DB::table('project_technology')->whereIn('project_id',[$value->id])->sum('distribution_unit') }}</td>
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
                        'typetech' => $getTypeTech,
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
          $('.chosen-select').chosen();
      });

  </script>
@endpush
