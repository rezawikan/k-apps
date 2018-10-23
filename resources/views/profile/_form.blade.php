{{ csrf_field() }}
<div class="form-group">
  <label class="col-lg-2 control-label">Photo Profile</label>
  <div class="col-lg-8">
    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
      <div class="form-control" data-trigger="fileinput">
        <i class="glyphicon glyphicon-file fileinput-exists"></i>
        <span class="fileinput-filename"></span>
      </div>
      <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Select file</span>
      <span class="fileinput-exists">Change</span>
      <input type="file" name="photo" accept="image/png"/>
        </span>
      <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
    </div>
  </div>
  <div class="col-lg-2">
    <span><img alt="image" class="img-circle img-sm" src="{{ asset('storage/'.auth()->user()->photo)}}"></span>
  </div>
</div>
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">First Name</label>
  <div class="col-lg-10">
    <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{ $data->first_name ?? old('first_name') }}">
    @if  ($errors->has('first_name'))
    <span class="help-block m-b-none">{{ $errors->first('first_name') }}</span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Last Name</label>
  <div class="col-lg-10">
    <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{ $data->last_name ?? old('last_name') }}">
    @if  ($errors->has('last_name'))
    <span class="help-block m-b-none">{{ $errors->first('last_name') }}</span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('nick_name') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Nick Name</label>
  <div class="col-lg-10">
    <input type="text" name="nick_name" placeholder="Nick Name" class="form-control" value="{{ $data->nick_name ?? old('nick_name') }}">
    @if  ($errors->has('nick_name'))
    <span class="help-block m-b-none">{{ $errors->first('nick_name') }}</span>
    @endif
  </div>
</div>
<div class="form-group {{ $errors->has('dob') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Date of Birth</label>
  <div class="col-lg-10 input-group date">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    <input type="text" name="dob" placeholder="Start Date" class="form-control" value="{{ $data->dob ?? old('dob') }}">
  </div>
</div>
<div class="form-group {{ $errors->has('entity') ? 'has-error' : '' }}">
  <label class="col-lg-2 control-label">Company</label>
  <div class="col-lg-10">
    <select name="entity" class="form-control">
      <option value="PT Kopernik" {{ ($data->entity ?? '') == 'PT Kopernik' ? 'selected' : '' }}>PT Kopernik</option>
      <option value="Yayasan Kopernik" {{ ($data->entity ?? '')  == 'Yayasan Kopernik' ? 'selected' : '' }}>Yayasan Kopernik</option>
    </select>
  </div>
</div>
