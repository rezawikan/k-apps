@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="sidebar-panel">
    <div class="m-t-md">
      <h4>COMMS ASSETS</h4>
    </div>
    <div class="m-t-md">
      <div>
        <ul class="list-group">
          <li class="list-group-item">
            <a href="https://docs.google.com/document/d/1LLZNeQTL0i-74-mM4vpuqlgFkRQJ7fV9MmBMTmBVwGo/edit?usp=sharing" target="_blank">Kopernik Core Messaging (EN)</a>
          </li>
          <li class="list-group-item">
            <a href="https://docs.google.com/document/d/1WzYlBvFFchIpsW27HoTKNhECmgiUMNMqMj34aETHYhg/edit?usp=sharing" target="_blank">Kopernik Panduan Pesan Utama (IN)</a>
          </li>
          <li class="list-group-item">
            <a href="https://drive.google.com/file/d/1ASN3fMPOjnI90__g1VRp4CNH_rAfhOYO/view?usp=sharing" target="_blank">Kopernik brand guideline</a>
          </li>
          <li class="list-group-item ">
            <a href="https://drive.google.com/drive/folders/0B0x_sLzkBrpHQnlsNzJ4LUJrVnM?usp=sharing" target="_blank">Power Point</a>
          </li>
          <li class="list-group-item">
            <a href="https://drive.google.com/open?id=0B0x_sLzkBrpHYXhtX0x4aU4tcDA" target="_blank">Letter Head</a>
          </li>
          <li class="list-group-item">
            <a href="https://drive.google.com/open?id=0B0x_sLzkBrpHem9GWVBtV2V6RTQ" target="_blank">Logo</a>
          </li>
          <li class="list-group-item">
            <a href="https://drive.google.com/open?id=0B0x_sLzkBrpHT1VjN3JBN2JxeUU" target="_blank">Font</a>
          </li>
          <li class="list-group-item">
            <a href="https://drive.google.com/open?id=0B0x_sLzkBrpHc0NmcXZYQ2NiMTQ" target="_blank">Consent Form</a>
          </li>
          <li class="list-group-item">
            <a href="https://drive.google.com/open?id=0B0x_sLzkBrpHMXRjNDlkTkh6clE" target="_blank">Video</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="m-t-md">
    </div>
  </div>
  <div class="wrapper wrapper-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>Impact by Technology</h5>
            <div class="pull-right">
              <div class="btn-group">
                <button type="button" class="btn btn-xs btn-white active">Today</button>
                <button type="button" class="btn btn-xs btn-white">Monthly</button>
                <button type="button" class="btn btn-xs btn-white">Annual</button>
              </div>
            </div>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-lg-9">
                <div class="flot-chart">
                  <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                </div>
              </div>
              <div class="col-lg-3">
                <ul class="stat-list">
                  <li>
                    <h2 class="no-margins">2,346</h2>
                    <small>Total orders in period</small>
                    <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                    <div class="progress progress-mini">
                      <div style="width: 48%;" class="progress-bar"></div>
                    </div>
                  </li>
                  <li>
                    <h2 class="no-margins ">4,422</h2>
                    <small>Orders in last month</small>
                    <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                    <div class="progress progress-mini">
                      <div style="width: 60%;" class="progress-bar"></div>
                    </div>
                  </li>
                  <li>
                    <h2 class="no-margins ">9,180</h2>
                    <small>Monthly income from orders</small>
                    <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                    <div class="progress progress-mini">
                      <div style="width: 22%;" class="progress-bar"></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-lg-4">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <span class="label label-primary pull-right">Impact</span>
            <h5>#People</h5>
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
            <span class="label label-warning pull-right">Distributed</span>
            <h5>#Technology</h5>
          </div>
          <div class="ibox-content">
            <h1 class="no-margins">{{ number_format($calculations['reached'],0,',',',') }}</h1>

          </div>
        </div>
      </div>
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
         $('.chart').easyPieChart({
             barColor: '#f8ac59',
//                scaleColor: false,
             scaleLength: 5,
             lineWidth: 4,
             size: 80
         });

         $('.chart2').easyPieChart({
             barColor: '#1c84c6',
//                scaleColor: false,
             scaleLength: 5,
             lineWidth: 4,
             size: 80
         });

         var data2 = [
             [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
             [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
             [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
             [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
             [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
             [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
             [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
             [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
         ];

         var data3 = [
             [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
             [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
             [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
             [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
             [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
             [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
             [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
             [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
         ];


         var dataset = [
             {
                 label: "Number of orders",
                 data: data3,
                 color: "#1ab394",
                 bars: {
                     show: true,
                     align: "center",
                     barWidth: 24 * 60 * 60 * 600,
                     lineWidth:0
                 }

             }, {
                 label: "Payments",
                 data: data2,
                 yaxis: 2,
                 color: "#1C84C6",
                 lines: {
                     lineWidth:1,
                         show: true,
                         fill: true,
                     fillColor: {
                         colors: [{
                             opacity: 0.2
                         }, {
                             opacity: 0.4
                         }]
                     }
                 },
                 splines: {
                     show: false,
                     tension: 0.6,
                     lineWidth: 1,
                     fill: 0.1
                 },
             }
         ];


         var options = {
             xaxis: {
                 mode: "time",
                 tickSize: [3, "day"],
                 tickLength: 0,
                 axisLabel: "Date",
                 axisLabelUseCanvas: true,
                 axisLabelFontSizePixels: 12,
                 axisLabelFontFamily: 'Arial',
                 axisLabelPadding: 10,
                 color: "#d5d5d5"
             },
             yaxes: [{
                 position: "left",
                 max: 1070,
                 color: "#d5d5d5",
                 axisLabelUseCanvas: true,
                 axisLabelFontSizePixels: 12,
                 axisLabelFontFamily: 'Arial',
                 axisLabelPadding: 3
             }, {
                 position: "right",
                 clolor: "#d5d5d5",
                 axisLabelUseCanvas: true,
                 axisLabelFontSizePixels: 12,
                 axisLabelFontFamily: ' Arial',
                 axisLabelPadding: 67
             }
             ],
             legend: {
                 noColumns: 1,
                 labelBoxBorderColor: "#000000",
                 position: "nw"
             },
             grid: {
                 hoverable: false,
                 borderWidth: 0
             }
         };

         function gd(year, month, day) {
             return new Date(year, month - 1, day).getTime();
         }

         var previousPoint = null, previousLabel = null;

         $.plot($("#flot-dashboard-chart"), dataset, options);
    });
  </script>
@endpush
