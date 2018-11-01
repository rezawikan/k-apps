@extends('layouts.app')

@section('title',  'Impact Tracker')

@section('content')
{{-- {{ dd($calculations) }} --}}
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <span class="label label-success pull-right">All</span>
          <h5>Countries</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{ number_format($calculations['country'],0,',','.') }}</h1>
          <small>Total Countries</small>
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
          <small>Total People Reached</small>
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
            @can('create project')
            <a href="{{ route('impact-tracker.create') }}" class="btn btn-xs btn-primary">Add Project</a>
            @endcan
          </div>

        </div>
        <div class="ibox-content">
          <div class="row">
            <form class="" action="{{ route('impact-tracker.index') }}" method="GET">
              <div class="col-sm-4 col-xs-12 m-b-sm">
                <div class="form-group">
                  <label class="control-label" for="year">Start Date</label>
                  <select data-placeholder="Choose one or more" class="chosen-select" multiple name="start_date[]">
                        @foreach ($mappings['filters']['start_date'] as $value)
                            <option value="{{ $value['start_date'] }}" {{ convertSlug($value['start_date'], request('start_date')) }}>{{ $value['start_date'] }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-sm-4 col-xs-12 m-b-sm">
                <div class="form-group">
                  <label class="control-label" for="project_type">Project Type
                    @can('manage project')
                    - <a href="{{ route('project-type.index') }}">manage</a>
                    @endcan
                  </label>
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
                          <option value="{{  str_slug($value['code']) }}" {{ convertSlugPlus($value['code'], request('country')) }}>{{ $value['name'] }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-sm-4 col-xs-12 m-b-sm">
                <div class="form-group">
                  <label class="control-label" for="officer">Officer
                    @can('hide')
                    - <a href="{{ route('officer.index') }}">manage</a>
                    @endcan
                  </label>
                  <select data-placeholder="Choose one" class="chosen-select" name="officer">
                        <option value="">All</option>
                          @foreach ($mappings['filters']['officer'] as $value)
                            <option value="{{ str_slug($value['officer']) }}" {{ convertSlugSingle($value['officer'], request('officer')) }}>{{ $value['officer'] }}</option>
                          @endforeach
                    </select>
                </div>
              </div>
              <div class="col-sm-4 col-xs-12 m-b-sm">
                <div class="form-group">
                  <label class="control-label" for="price_type">Price Type
                    @can('manage project')
                    - <a href="{{ route('price-type.index') }}">manage</a>
                    @endcan
                  </label>
                  <select data-placeholder="Choose one or more" class="chosen-select" multiple name="price_type[]">
                        @foreach ($mappings['filters']['pricetype'] as $value)
                          <option value="{{ str_slug($value['name']) }}" {{ convertSlugPlus($value['name'], request('price_type')) }}>{{ $value['name'] }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-sm-4 col-xs-12 m-b-sm">
                <div class="form-group">
                  <label class="control-label" for="technology">Technology
                    @can('manage project')
                    - <a href="{{ route('technology.index') }}">manage</a>
                    @endcan
                  </label>
                  <select data-placeholder="Choose one or more" class="chosen-select" multiple name="technology[]">
                        @foreach ($mappings['filters']['technologies'] as $value)
                          <option value="{{ str_slug($value['name']) }}" {{ convertSlugPlus($value['name'], request('technology')) }}>{{ $value['name'] }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-sm-4 col-xs-12 m-b-sm">
                <div class="form-group">
                  <label class="control-label" for="technology">Technology Type
                    @can('manage project')
                    - <a href="{{ route('technology-type.index') }}">manage</a>
                    @endcan
                  </label>
                  <select data-placeholder="Choose one or more" class="chosen-select" multiple name="techtype[]">
                      @foreach ($mappings['filters']['techtype'] as $value)
                        <option value="{{ str_slug($value['name']) }}" {{ convertSlugPlus($value['name'], request('techtype')) }}>{{ $value['name'] }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="col-sm-4 col-xs-12 m-b-sm">
                <div class="form-group">
                  <label class="control-label" for="year">Year Technology</label>
                  <select data-placeholder="Choose one or more" class="chosen-select" multiple name="years[]">
                        @foreach ($mappings['filters']['years'] as $value)
                            <option value="{{ $value->year }}" {{ convertSlug($value->year, request('years')) }}>{{ $value->year }}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-sm-4 col-xs-12 m-b-sm">
                <div class="form-group">
                  <label class="control-label" for="price_type">Search</label>
                    <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request('search') }}">
                </div>
              </div>
              <div class="col-sm-4 col-xs-12 m-b-sm">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
          <div class="table-responsive">
            <table class="footable table">
              <thead>
                <tr>
                  <th data-sort-ignore="true">Project </th>
                  <th data-sort-ignore="true" data-hide="phone">Project Type</th>
                  <th data-sort-ignore="true" data-hide="phone">Total Reached</th>
                  <th data-sort-ignore="true" data-hide="phone">Total Distributed</th>
                  <th data-sort-ignore="true" data-hide="phone">Details</th>
                </tr>
              </thead>
              <tbody>

                @foreach  ($projects as $key => $value)
                <tr>
                  <td>{{ $value->project_name }}</td>
                  <td>{{ $value->project_type->name }}</td>
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
            <div class="btn-group pull-right">
              <a href="{{ route('impact-tracker.export_project',request()->all()) }}" class="btn btn-xs btn-info">Export Project</a>
              <a href="{{ route('impact-tracker.export_technology',request()->all()) }}" class="btn btn-xs btn-danger">Export Technology</a>
            </div>
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
