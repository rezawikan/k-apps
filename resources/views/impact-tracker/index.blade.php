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
            <h1 class="no-margins">{{ number_format($calculations['country'],0,',','.') }}</h1>
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
            <h1 class="no-margins">{{ number_format($calculations['reached'],0,',',',') }}</h1>
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
            <h1 class="no-margins">{{ number_format($calculations['distributed'],0,',',',') }}</h1>
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
              <a href="{{ route('impact-tracker.create') }}" class="btn btn-xs btn-primary">Add Project</a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="row">
              <form class="" action="{{ route('impact-tracker.index') }}" method="GET">
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="year">Year</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="year[]">
                        @foreach ($mappings['filters']['years'] as $value)
                            <option value="{{ $value['year'] }}" {{ convertSlug($value['year'], request('year')) }}>{{ $value['year'] }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="project_type">Project Type</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="project_type[]">
                        @foreach ($mappings['filters']['project_type'] as $value)
                            <option value="{{ str_slug($value['name']) }}" {{ convertSlugPlus($value['name'], request('project_type')) }}>{{ $value['name'] }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="country">Country</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="country[]">
                        @foreach ($mappings['filters']['countries'] as $value)
                          <option value="{{  str_slug($value['country']) }}" {{ convertSlugPlus($value['country'], request('country')) }}>{{ $value['country'] }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="officer">Officer</label>
                    <select data-placeholder="Choose one" class="chosen-select" name="officer">
                        <option value="">All</option>
                          @foreach ($mappings['filters']['officer'] as $value)
                            <option value="{{ str_slug($value['name']) }}" {{ convertSlugSingle($value['name'], request('officer')) }}>{{ $value['name'] }}</option>
                          @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="price_type">Price Type</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="price_type[]">
                        @foreach ($mappings['filters']['pricetype'] as $value)
                          <option value="{{ str_slug($value['name']) }}" {{ convertSlugPlus($value['name'], request('price_type')) }}>{{ $value['name'] }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="technology">Technology</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="technology[]">
                        @foreach ($mappings['filters']['technologies'] as $value)
                          <option value="{{ str_slug($value['name']) }}" {{ convertSlugPlus($value['name'], request('technology')) }}>{{ $value['name'] }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="technology">Technology Type</label>
                    <select data-placeholder="Choose one or more" class="chosen-select" multiple name="techtype[]">
                      @foreach ($mappings['filters']['techtype'] as $value)
                        <option value="{{ str_slug($value['name']) }}" {{ convertSlugPlus($value['name'], request('techtype')) }}>{{ $value['name'] }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 col-xs-12 m-b-sm">
                  <div class="form-group">
                    <label class="control-label" for="price_type">Search</label>
                    <div class="input-group">
                      <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request('search') }}">
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
                    <th data-sort-ignore="true" data-hide="phone,tablet">Total Reached</th>
                    <th data-sort-ignore="true" data-hide="phone,tablet">Total Distributed</th>
                    <th data-sort-ignore="true" data-hide="phone">Details</th>
                  </tr>
                </thead>
                <tbody>
                  {{-- {{ dd(request('techtype'))  }} --}}
                  @foreach ($projects as $key => $value)
                    <tr>
                      <td>{{ $value->project_name }}</td>
                      <td>{{ $value->project_type }}</td>
                      <td>{{ $value->additional_total_reached }}</td>
                      <td>{{ $value->additional_total_distributed }}</td>
                      <td>
                        <a href="{{ route('impact-tracker.show',$value->id) }}" class="btn btn-primary btn-xs">View</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5">
                      <div class="text-center">
                        {{ $projects->appends(request()->query())->links() }}
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
          $('.footable').footable({paginate: false});
          $('.chosen-select').chosen();
      });

  </script>
@endpush
