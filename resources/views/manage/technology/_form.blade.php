{{ csrf_field() }}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Name</label>
  <div class="col-lg-10">
    <input type="text" name="name" placeholder="Technology Name" class="form-control" value="{{ $data->name ?? old('name') }}">
    @if ($errors->has('name'))
    <span class="help-block m-b-none">{{ $errors->first('name') }}</span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Technology Type</label>
  <div class="col-lg-10">

    <select name="technology_types_id" class="form-control">
      @foreach ($techtype as $value)
        @if ($value['id'] == ($data->technology_types_id ?? ''))
          <option value="{{ $value['id'] }}" selected>{{ $value['name'] }}</option>
        @else
          <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
        @endif
      @endforeach
    </select>
  </div>
</div>
