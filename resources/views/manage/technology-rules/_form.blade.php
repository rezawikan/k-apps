{{ csrf_field() }}
<div class="form-group {{ $errors->has('technology_type_id') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Technology Type</label>
  <div class="col-lg-10">
    <select data-placeholder="Choose one" class="form-control chosen-select" name="technology_type_id">
      <option value="">Select</option>
      @foreach ($mappings['filters']['techtype'] as $value)
        <option value="{{ $value['id'] }}" {{ checkOldValue($data->technology_type_id ?? null, $value['id'], 'technology_type_id') }}>{{ $value['name'] }}</option>
      @endforeach
    </select>
    @if ($errors->has('technology_type_id'))
      <span class="help-block m-b-none">{{ $errors->first('technology_type_id') }}</span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('distribution_target_id') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Distribution Target</label>
  <div class="col-lg-10">
    <select data-placeholder="Choose one" class="form-control chosen-select" name="distribution_target_id">
      <option value="">Select</option>
      @foreach ($mappings['filters']['distributions'] as $value)
        <option value="{{ $value['id'] }}" {{ checkOldValue($data->distribution_target_id ?? null, $value['id'], 'distribution_target_id') }}>{{ $value['name'] }}</option>
      @endforeach
    </select>
    @if ($errors->has('name'))
      <span class="help-block m-b-none">{{ $errors->first('distribution_target_id') }}</span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('multiplier') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Multipliert</label>
  <div class="col-lg-10">
    <input type="text" name="multiplier" placeholder="Multiplier" class="form-control" value="{{ $data->multiplier ?? old('multiplier') }}">
    @if ($errors->has('name'))
      <span class="help-block m-b-none">{{ $errors->first('multiplier') }}</span>
    @endif
  </div>
</div>
