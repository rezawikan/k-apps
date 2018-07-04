{{ csrf_field() }}
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Name</label>
  <div class="col-lg-10">
    <input type="text" name="name" placeholder="Price Type Name" class="form-control" value="{{ $data->name ?? old('name') }}">
    @if ($errors->has('name'))
      <span class="help-block m-b-none">{{ $errors->first('name') }}</span>
    @endif
  </div>
</div>
