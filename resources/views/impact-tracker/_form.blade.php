{{ csrf_field() }}
<div class="form-group {{ $errors->has('project_name') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Project Name</label>
  <div class="col-lg-10">
    <input type="text" name="project_name" placeholder="Project Name" class="form-control" value="{{ $project->project_name ?? old('project_name') }}">
    @if ($errors->has('project_name'))
      <span class="help-block m-b-none">{{ $errors->first('project_name') }}</span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Start Date</label>
  <div class="col-lg-10 input-group date">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    <input type="text" name="start_date" placeholder="Start Date" class="form-control" value="{{ $project->start_date ?? old('start_date') }}">
  </div>
</div>
{{-- <div class="form-group {{ $errors->has('year') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Year</label>
  <div class="col-lg-10">
    <input type="integer" name="year" placeholder="Year" class="form-control" value="{{ $project->year ?? old('year') }}">
    @if ($errors->has('year'))
      <span class="help-block m-b-none">{{ $errors->first('year') }}</span>
    @endif
  </div>
</div> --}}

{{-- {{dd($mappings['filters']['countries'])}} --}}
<div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Country</label>
  <div class="col-lg-10">
    <select data-placeholder="Choose one" class="form-control chosen-select" name="country_id">
      <option value="">Select</option>
      @foreach ($mappings['filters']['countries'] as $value)
        <option value="{{ $value['id'] }}" {{ checkOldValue($project->country_id ?? null, $value['id'], 'country_id') }}>{{ $value['name'] }}</option>
      @endforeach
    </select>
    @if ($errors->has('country_id'))
      <span class="help-block m-b-none">{{ $errors->first('country_id') }}</span>
    @endif
  </div>
</div>

<div class="form-group {{ $errors->has('price_type_id') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Price Type</label>
  <div class="col-lg-10">
    <select data-placeholder="Choose one" class="form-control chosen-select" name="price_type_id">
      <option value="">Select</option>
      @foreach ($mappings['filters']['pricetype'] as $value)
        <option value="{{ $value['id'] }}" {{ checkOldValue($project->price_type_id ?? null, $value['id'], 'price_type_id') }}>{{ $value['name'] }}</option>
      @endforeach
    </select>
    @if ($errors->has('price_type_id'))
      <span class="help-block m-b-none">{{ $errors->first('price_type_id') }}</span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('project_type_id') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Project Type</label>
  <div class="col-lg-10">

    <select data-placeholder="Choose one" class="form-control chosen-select" name="project_type_id" value="{{ $project->project_type_id ?? old('project_type_id') }}">
      <option value="">Select</option>

      @foreach ($mappings['filters']['project_type'] as $value)
          <option value="{{ $value['id'] }}" {{ checkOldValue($project->project_type_id ?? null, $value['id'], 'project_type_id') }}>{{ $value['name'] }}</option>
      @endforeach
    </select>
    @if ($errors->has('project_type_id'))
      <span class="help-block m-b-none">{{ $errors->first('project_type_id') }}</span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('officer') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Officer</label>
  <div class="col-lg-10">
    <select data-placeholder="Choose one" class="form-control chosen-select" name="officer">
      <option value="">Select</option>
      @foreach ($mappings['filters']['users'] as $value)
        <option value="{{ $value['first_name'].' '.$value['last_name'] }}" {{  checkOldValue($project->officer ?? null, $value['first_name'] .' '. $value['last_name'], 'officer') }} >{{ $value['first_name'].' '.$value['last_name'] }}</option>
      @endforeach
    </select>
    @if ($errors->has('officer'))
      <span class="help-block m-b-none">{{ $errors->first('officer') }}</span>
    @endif
  </div>
</div>
{{-- {{dd($project->funding_types()->get()->map())}} --}}
{{-- {{ dd($project->funding_types_list())}} --}}
<div class="form-group {{ $errors->has('funding_type_id') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Funding Type</label>
  <div class="col-lg-10">
    <select data-placeholder="Choose one" class="form-control chosen-select" multiple name="funding_type_id[]">
      <option value="">Select</option>
      @foreach ($mappings['filters']['funding_type'] as $value)
        <option value="{{ $value['id'] }}" {{ convertSlug($value['id'], funding_types_list($project->funding_types ?? null)) }}>{{ $value['name']}}</option>
      @endforeach
    </select>
    @if ($errors->has('funding_type_id'))
      <span class="help-block m-b-none">{{ $errors->first('funding_type_id') }}</span>
    @endif
  </div>
</div>
