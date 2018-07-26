@extends('layouts.app')

@section('title', 'K-Feedback')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox-content">
        <h2><i class="fa fa-comments"></i> Kopernik Management Feedback</h2>
        <div class="row">
          <div class="col-md-12">
            <div class="ibox-content">
              <p>At Kopernik, constructive feedback is greatly encouraged. We believe that through honest feedback we can make our organization better and create a positive environment for all staff. Please use the form below to send us any suggestions for improvements or highlight areas of concern. If you would like to send it anonymously, please remember to select that option. Your feedback will be shared with the leadership team by default. If you would like to send it to a specific person instead of the entire leadership team, please select that option in the appropriate field below.</p>
              <form method="POST" action="{{ route('k-feedback.send') }}">
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Send As</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option value="anonymous">Anonymous</option>
                      <option value="{{ auth()->user()->email }}">{{auth()->user()->full_name}}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Feedback To</label>
                  <select class="form-control" id="exampleFormControlSelect1">
                    <option value="leadership@kopernik.info">Kopernik Leadership</option>
                    <option value="ewa.wojkowska@kopernik.info">Ewa</option>
                    <option value="toshi.nakamura@kopernik.info">Toshi</option>
                    <option value="tomohiro.hamakawa@kopernik.info">Tomo</option>
                    <option value="romy.tubagus@kopernik.info">Romy </option>
                    <option value="slamet.pribadi@kopernik.info">Slamet</option>
                    <option value="werner.brandt@kopernik.info">Werner</option>
                    <option value="nonie.kaban@kopernik.info">Nonie</option>
                    <option value="anna.baranova@kopernik.info">Anna</option>
                    <option value="sarah.wilson@kopernik.info">Sarah</option>
                    <option value="hiromi.tengeji@kopernik.info">Hiromi</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Your Feedback</label>
                  <textarea class="form-control" id="feedback" name="feedback" rows="4"></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary mb-2">Send Feedback</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="hr-line-dashed"></div>
      </div>
    </div>
  </div>
</div>
@endsection
