@extends('layouts.app')

@section('title',  'Dashboard')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <h2>Kopernik Impact</h2>
  <div class="row">
    <div class="col-lg-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <span class="label label-primary pull-right">Distributed</span>
          <h5>#Technology</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{ number_format($calculations['distributed'],0,',',',') }}</h1>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <span class="label label-info pull-right">Location</span>
          <h5>#Country</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{ number_format($calculations['country'],0,',','.') }}</h1>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <span class="label label-warning pull-right">Impact</span>
          <h5>#People</h5>
        </div>
        <div class="ibox-content">
          <h1 class="no-margins">{{ number_format($calculations['reached'],0,',',',') }}</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <h2><a href="https://docs.google.com/spreadsheets/d/1zq_JeP7-JRITbhbOzhPCUVenCq78TJZO94dJAYq6rJ8/edit?usp=sharing">2018 Organizational KPI's</a></h2>
      <h2>Kopernik Culture</h2>
        <p>Our culture shapes the way we work. The problems we are attempting to solve are massive therefore we want Kopernik to be a great organisation that attracts, develops and excites exceptional people who want to play a part in solving some of the biggest challenges facing the world today.
        </p>
        <br>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="panel-group" id="k-culture1">
        <div class="panel panel-default" style="background: #ff9900;">
          <div class="panel-heading" style="background: #ff9900;text-align: center;margin: 20px auto;font-size: 20px;">
            <h5 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">WE VALUE THE BOLD IDEAS THAT CHALLENGE THE STATUS QUO</a>
                </h5>
          </div>
          <div id="collapse1" class="panel-collapse collapse">
            <div class="panel-body" style="background: #fff;">
              <ul>
                <li>We are constantly seeking and experimenting with bold, impactful solutions to people’s real needs
                </li>
                <li>We demonstrate and communicate the impact of our work with evidence</li>
                <li>We value action and learn from our successes and from our failures
                </li>
              </ul>
              <strong>In Action:</strong>
              <ul>
                <li>Each one of us (regardless of position) proactively share ideas and potential solutions with the rest of the team at the Friday afternoon sharing sessions
                </li>
                <li>We regularly network, attend events and share our learnings and insights with the development sector, companies and individual supporters (successes and failures)
                </li>
                <li>We use engaging and innovative communications methods which include data and evidence, together with heartwarming and interesting Astories to communicate our work
                </li>
                <li>We follow through on things - ideas are not enough
                </li>
                <li>We are not afraid to speak up or take risks</li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="panel-group" id="k-culture2">
        <div class="panel panel-default" style="background: #ff9900;">
          <div class="panel-heading" style="background: #ff9900;text-align: center;margin: 20px auto;font-size: 20px;">
            <h5 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">WE HAVE THE HIGHEST PROFESSIONAL STANDARD</a>
                </h5>
          </div>
          <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body" style="background: #fff;">
              <ul>
                <li> We take pride in our work and value the highest standards in everything we do
                </li>
                <li> We seek to stretch and grow ourselves so that we can make a real and lasting impact for people living in the last mile
                </li>
                <li> We can all take initiative – titles don’t matter. If we see a problem, rather than complainingabout it we will suggest and take action on a better way to do things
                </li>
                <li> We are always honest, ethical and fully transparent
                </li>
              </ul>
              <strong>In Action:</strong>
              <ul>
                <li> We are responsible for meeting our deadlines and delivering our work on time
                </li>
                <li> We make sure our work is accurate and always double check it before submission
                </li>
                <li> We are proactive and take initiative
                </li>
                <li> We practice our presentations to make sure we perform to the best of our ability
                </li>
                <li> We take personal responsibility for our learning and we push ourselves to be better</li>
                <li> We say what we mean and mean what we say
                </li>
                <li> We embrace and keep up with change
                </li>
                <li> We admit our mistakes and we learn from them</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <div class="panel-group" id="k-culture3">
        <div class="panel panel-default" style="background: #ff9900;">
          <div class="panel-heading" style="background: #ff9900;text-align: center;margin: 30px auto;font-size: 20px;">
            <h5 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">WE > I</a>
                </h5>
          </div>
          <div id="collapse3" class="panel-collapse collapse">
            <div class="panel-body" style="background: #fff;">
              <ul>
                <li>We support and help each other and all contribute to Kopernik’s impact – no matter our position, team or title.
                </li>
                <li>We celebrate different perspectives with an open-mind and respect
                </li>
                <li>We give and receive feedback with continuous improvement and learning as the objective
                </li>
                <li> We treat others how we would like to be treated. This means we never raise our voices, we don't talk down to each other, we don't talk behind people's backs and we don’t send rude messages. No jerks allowed.
                </li>
              </ul>
              <strong>In Action:</strong>
              <ul>
                <li>We are responsible for meeting our deadlines and delivering our work on time
                </li>
                <li>We make sure our work is accurate and always double check it before submission
                </li>
                <li>We are proactive and take initiative
                <li>We practice our presentations to make sure we perform to the best of our ability.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="panel-group" id="k-culture4">
        <div class="panel panel-default" style="background: #ff9900;">
          <div class="panel-heading" style="background: #ff9900;text-align: center;margin: 30px auto;font-size: 20px;">
            <h5 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">WE ARE LEAN AND COST EFFECTIVE</a>
                </h5>
          </div>
          <div id="collapse4" class="panel-collapse collapse">
            <div class="panel-body" style="background: #fff;">
              <ul>
                <li> We value lean and cost-effective, implementation and evidence collection methods. This also applies to our internal operations - we want to avoid unnecessary bureaucracies while maintaining rigor</li>
                <li> Scaling for us does not necessarily mean more or bigger. It’s about the influence we can have on the development system to solve poverty more effectively
                </li>
              </ul>
              <strong>In Action:</strong>
              <ul>
                <li> We plan in advance as much as possible and book our flights and accommodation early to save costs. We identify the best value for money service providers</li>
                <li> We collaborate with others when going on field trips to save time and resources</li>
                <li> We make sure our meetings are efficient, have a clear agenda and that we stick to the agenda and time. We respect other people and their time by arriving on time</li>
                <li> We use appropriate technology where possible to save time and resources</li>
                <li> We reuse and recycle paper. New paper is used only for official correspondence</li>
                <li> We respect the environment in our day to day work and are conscious to not be wasteful</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-9">
    <h2>Birthday</h2>
  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    @foreach ($birthday as $value)
      <div class="col-lg-4">
        <div class="contact-box">
          <a href="#">
            <div class="col-sm-4">
                <div class="text-center">
                    <img alt="image" class="img-circle m-t-xs img-responsive" src="{{asset('storage/'.$value['photo'])}}">
                    {{-- <div class="m-t-xs font-bold">Graphics designer</div> --}}
                </div>
            </div>
            <div class="col-sm-8">
                <h3><strong>{{ $value['first_name'] . ' ' .$value['last_name'] }}</strong></h3>
                {{-- <p><i class="fa fa-map-marker"></i> Riviera State 32/106</p> --}}
                <p>{{ date("d-M-Y",strtotime($value['dob'])) }}</p>
                {{-- <address>
                    <strong>Twitter, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">P:</abbr> (123) 456-7890
                </address> --}}
            </div>
            <div class="clearfix"></div>
          </a>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection

@push('b-scripts')
<!-- Flot -->
<script src="{{ asset('js/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.spline.js')}}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.symbol.js')}}"></script>
<script src="{{ asset('js/plugins/flot/jquery.flot.time.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    // $('.chart').easyPieChart({
    //   barColor: '#f8ac59',
    //   //                scaleColor: false,
    //   scaleLength: 5,
    //   lineWidth: 4,
    //   size: 80
    // });
    //
    // $('.chart2').easyPieChart({
    //   barColor: '#1c84c6',
    //   //                scaleColor: false,
    //   scaleLength: 5,
    //   lineWidth: 4,
    //   size: 80
    // });
    //
    // var data2 = [
    //   [gd(2012, 1, 1), 7],
    //   [gd(2012, 1, 2), 6],
    //   [gd(2012, 1, 3), 4],
    //   [gd(2012, 1, 4), 8],
    //   [gd(2012, 1, 5), 9],
    //   [gd(2012, 1, 6), 7],
    //   [gd(2012, 1, 7), 5],
    //   [gd(2012, 1, 8), 4],
    //   [gd(2012, 1, 9), 7],
    //   [gd(2012, 1, 10), 8],
    //   [gd(2012, 1, 11), 9],
    //   [gd(2012, 1, 12), 6],
    //   [gd(2012, 1, 13), 4],
    //   [gd(2012, 1, 14), 5],
    //   [gd(2012, 1, 15), 11],
    //   [gd(2012, 1, 16), 8],
    //   [gd(2012, 1, 17), 8],
    //   [gd(2012, 1, 18), 11],
    //   [gd(2012, 1, 19), 11],
    //   [gd(2012, 1, 20), 6],
    //   [gd(2012, 1, 21), 6],
    //   [gd(2012, 1, 22), 8],
    //   [gd(2012, 1, 23), 11],
    //   [gd(2012, 1, 24), 13],
    //   [gd(2012, 1, 25), 7],
    //   [gd(2012, 1, 26), 9],
    //   [gd(2012, 1, 27), 9],
    //   [gd(2012, 1, 28), 8],
    //   [gd(2012, 1, 29), 5],
    //   [gd(2012, 1, 30), 8],
    //   [gd(2012, 1, 31), 25]
    // ];
    //
    // var data3 = [
    //   [gd(2012, 1, 1), 800],
    //   [gd(2012, 1, 2), 500],
    //   [gd(2012, 1, 3), 600],
    //   [gd(2012, 1, 4), 700],
    //   [gd(2012, 1, 5), 500],
    //   [gd(2012, 1, 6), 456],
    //   [gd(2012, 1, 7), 800],
    //   [gd(2012, 1, 8), 589],
    //   [gd(2012, 1, 9), 467],
    //   [gd(2012, 1, 10), 876],
    //   [gd(2012, 1, 11), 689],
    //   [gd(2012, 1, 12), 700],
    //   [gd(2012, 1, 13), 500],
    //   [gd(2012, 1, 14), 600],
    //   [gd(2012, 1, 15), 700],
    //   [gd(2012, 1, 16), 786],
    //   [gd(2012, 1, 17), 345],
    //   [gd(2012, 1, 18), 888],
    //   [gd(2012, 1, 19), 888],
    //   [gd(2012, 1, 20), 888],
    //   [gd(2012, 1, 21), 987],
    //   [gd(2012, 1, 22), 444],
    //   [gd(2012, 1, 23), 999],
    //   [gd(2012, 1, 24), 567],
    //   [gd(2012, 1, 25), 786],
    //   [gd(2012, 1, 26), 666],
    //   [gd(2012, 1, 27), 888],
    //   [gd(2012, 1, 28), 900],
    //   [gd(2012, 1, 29), 178],
    //   [gd(2012, 1, 30), 555],
    //   [gd(2012, 1, 31), 993]
    // ];
    //
    //
    // var dataset = [{
    //   label: "Number of orders",
    //   data: data3,
    //   color: "#1ab394",
    //   bars: {
    //     show: true,
    //     align: "center",
    //     barWidth: 24 * 60 * 60 * 600,
    //     lineWidth: 0
    //   }
    //
    // }, {
    //   label: "Payments",
    //   data: data2,
    //   yaxis: 2,
    //   color: "#1C84C6",
    //   lines: {
    //     lineWidth: 1,
    //     show: true,
    //     fill: true,
    //     fillColor: {
    //       colors: [{
    //         opacity: 0.2
    //       }, {
    //         opacity: 0.4
    //       }]
    //     }
    //   },
    //   splines: {
    //     show: false,
    //     tension: 0.6,
    //     lineWidth: 1,
    //     fill: 0.1
    //   },
    // }];
    //
    //
    // var options = {
    //   xaxis: {
    //     mode: "time",
    //     tickSize: [3, "day"],
    //     tickLength: 0,
    //     axisLabel: "Date",
    //     axisLabelUseCanvas: true,
    //     axisLabelFontSizePixels: 12,
    //     axisLabelFontFamily: 'Arial',
    //     axisLabelPadding: 10,
    //     color: "#d5d5d5"
    //   },
    //   yaxes: [{
    //     position: "left",
    //     max: 1070,
    //     color: "#d5d5d5",
    //     axisLabelUseCanvas: true,
    //     axisLabelFontSizePixels: 12,
    //     axisLabelFontFamily: 'Arial',
    //     axisLabelPadding: 3
    //   }, {
    //     position: "right",
    //     clolor: "#d5d5d5",
    //     axisLabelUseCanvas: true,
    //     axisLabelFontSizePixels: 12,
    //     axisLabelFontFamily: ' Arial',
    //     axisLabelPadding: 67
    //   }],
    //   legend: {
    //     noColumns: 1,
    //     labelBoxBorderColor: "#000000",
    //     position: "nw"
    //   },
    //   grid: {
    //     hoverable: false,
    //     borderWidth: 0
    //   }
    // };
    //
    // function gd(year, month, day) {
    //   return new Date(year, month - 1, day).getTime();
    // }
    //
    // var previousPoint = null,
    //   previousLabel = null;
    //
    // $.plot($("#flot-dashboard-chart"), dataset, options);
  });
</script>
@endpush
