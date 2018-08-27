{{ csrf_field() }}
<input type="hidden" name="project_id" value="{{ $project->id }}">
<div class="form-group">
  <div class="col-lg-4 col-sm-4 {{ $errors->has('technology_id') ? 'has-error' : '' }}">
    <label class="m-t">Technology Name</label>
    <select data-placeholder="Choose one" class="form-control chosen-select" name="technology_id">
      <option value="">Select</option>
      @foreach ($mappings['filters']['technologies'] as $value)
        <option value="{{ $value['id'] }}" {{ checkOldValue($technology->technology_id ?? null, $value['id'], 'technology_id') }}>{{ $value['name'] }}</option>
      @endforeach
    </select>
    @if ($errors->has('technology_id'))
      <span class="help-block m-b-none">{{ $errors->first('technology_id') }}</span>
    @endif
  </div>
  <div class="col-lg-4 col-sm-4 {{ $errors->has('distribution_target') ? 'has-error' : '' }}">
    <label class="m-t">Distribution Target</label>
    <select data-placeholder="Choose one" class="form-control chosen-select" name="distribution_target">
      <option value="">Select</option> --}}
      @foreach ($mappings['filters']['distributions'] as $value)
        <option value="{{ $value['name'] }}" {{ checkOldValue($technology->distribution_target ?? null, $value['name'], 'distribution_target') }}>{{ $value['name'] }}</option>
      @endforeach
    </select>
    @if ($errors->has('distribution_target'))
      <span class="help-block m-b-none">{{ $errors->first('distribution_target') }}</span>
    @endif
  </div>
  <div class="col-lg-4 col-sm-4 {{ $errors->has('distribution_unit') ? 'has-error' : '' }}">
    <label class="m-t">Distribution Unit</label>
    <input id="distribution_unit" type="text" name="distribution_unit" placeholder="Distribution Unit" class="form-control" value="{{ $technology->distribution_unit ?? old('distribution_unit') }}" >
    @if ($errors->has('distribution_unit'))
      <span class="help-block m-b-none">{{ $errors->first('distribution_unit') }}</span>
    @endif
  </div>
  <div class="col-lg-4 col-sm-4 {{ $errors->has('per_unit') ? 'has-error' : '' }}">
    <label class="m-t">People Reached</label>
    <input id="per_unit" type="text" name="per_unit" placeholder="People Reached" class="form-control" value="{{ $technology->per_unit ?? old('per_unit') }}">
    @if ($errors->has('per_unit'))
      <span class="help-block m-b-none">{{ $errors->first('per_unit') }}</span>
    @endif
  </div>
  <div class="col-lg-4 col-sm-4 {{ $errors->has('total_reach') ? 'has-error' : '' }}">
    <label class="m-t">Total Reached Multiplier</label>
    <input id="total_reach" type="text" name="total_reach" placeholder="Total Reached Multiplier" class="form-control" value="{{ $technology->total_reach ?? old('total_reach') }}" readonly="readonly">
    @if ($errors->has('total_reach'))
      <span class="help-block m-b-none">{{ $errors->first('total_reach') }}</span>
    @endif
  </div>
  <div class="col-lg-4 col-sm-4 {{ $errors->has('year') ? 'has-error' : '' }}">
    <label class="m-t">Year</label>
    <input type="text" name="year" placeholder="Year" class="form-control" value="{{ $technology->year ?? old('year') }}">
    @if ($errors->has('year'))
      <span class="help-block m-b-none">{{ $errors->first('year') }}</span>
    @endif
  </div>
</div>


@push('b-scripts')
<!-- Page-Level Scripts -->
<script>
  $(document).ready(function() {

    $('#distribution_unit').on('change', function(){
        $('#total_reach').val($('#per_unit').val() * $('#distribution_unit').val());
    });

    $('#per_unit').on('change', function(){
        $('#total_reach').val($('#per_unit').val() * $('#distribution_unit').val());
    });

  });
</script>
@endpush
