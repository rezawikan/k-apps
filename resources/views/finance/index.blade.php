@extends('layouts.app')

@section('title', 'Finance')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-md-4">
        <div class="widget yellow-bg p-lg text-center" style="margin-top: 0px;">
          <div class="m-b-md">
            <i class="fa fa-money fa-3x"></i>
            <h3 class="m-xs">Fund Advance</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="widget navy-bg p-lg text-center" style="margin-top: 0px;">
          <div class="m-b-md">
            <i class="fa fa-file fa-3x"></i>
            <h3 class="m-xs">Incoming Payment</h3>
          </div>
        </div>

      </div>
      <div class="col-md-4">
        <div class="widget blue-bg p-lg text-center" style="margin-top: 0px;">
          <div class="m-b-md">
            <i class="fa fa-copy fa-3x"></i>
            <h3 class="m-xs">Lost/Missing Receipt</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="ibox-content">
          <h2><i class="fa fa-money"></i> Finance Activities</h2>
          <div class="row">
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">1</span> Fund Advance</h2>
                <ul class="todo-list m-t small-list">
                  <li><span class="m-l-xs">Filling out the procurement request form</span>
                  </li>
                  <li><span class="m-l-xs">Yayasan Kopernik procurement request form (IDR)</span> <a href="https://docs.google.com/spreadsheets/d/1pI22QXkforkZs955ZBgQSyH1REgtp79rGi5tPfIHbm0/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>
                  </li>
                  <li><span class="m-l-xs">Yayasan Kopernik procurement request form (USD)</span> <a href="https://docs.google.com/spreadsheets/d/1AYCJiqtkbpIQqWR1PuZ-BxbLXJeUNxwrVekaAElMEYo/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>
                  </li>
                  <li><span class="m-l-xs">PT Kopernik procurement request form (IDR)</span> <a href="https://docs.google.com/spreadsheets/d/1x9i8sMBjubRL_WbzeTtC2dXBRqBn59zAuBiUOcYBQF0/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>
                  </li>
                  <li><span class="m-l-xs">PT Kopernik procurement request form (USD)</span> <a href="https://docs.google.com/spreadsheets/d/1Y6K416GGhLiwQzUqTiMnU6gw721Q0-0nsO7iqwceMaA/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>
                  </li>
                  <li><span class="m-l-xs">Send the form to your supervisor to get approval and cc supply chain (supplychain@kopernik.info)</span> <a href="https://docs.google.com/spreadsheets/d/1Y6K416GGhLiwQzUqTiMnU6gw721Q0-0nsO7iqwceMaA/edit?usp=sharing"
                      target="_blank"><i class="fa fa-external-link"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">2</span> Incoming Payment</h2>
                <ul class="todo-list m-t small-list">
                  <li>
                    <span class="m-l-xs">Supervisor need to approved the request </span>
                  </li>
                  <li>
                    <span class="m-l-xs">Once approved, supply chain will provide 3 quotations from 3 different vendors </span>
                  </li>
                  <li>
                    <span class="m-l-xs">Supply Chain will send it to the supervisor to get approval (cc requestor)</span>
                  </li>
                  <li>
                    <span class="m-l-xs">Supervisor approval required</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">3</span> Lost/Missing Receipt</h2>
                <ul class="todo-list m-t small-list">
                  <li>
                    <span class="m-l-xs ">Supply chain will create and send the Purchase Order (PO) to vendor</span>
                  </li>
                  <li>
                    <span class="m-l-xs">Vendor will deliver the goods with invoice</span>
                  </li>
                  <li>
                    <span class="m-l-xs">Supply chain will received the goods and process the payment</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">4</span> Petty Cash</h2>
                <ul class="todo-list m-t small-list">
                  <li>
                    <span class="m-l-xs">Supply chain will create a payment request </span>
                  </li>
                  <li><span class="m-l-xs">Yayasan Kopernik payment request form (IDR)</span> <a href="https://docs.google.com/spreadsheets/d/1_G9l79YHn_t_GbHj9nDi1CUZ4wMygA2lbxYOi_sLhsE/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>
                  </li>
                  <li><span class="m-l-xs">Yayasan Kopernik payment request form (USD)</span> <a href="https://docs.google.com/spreadsheets/d/1iEurdggPAzeXuRYFOWg2virLmFFk_8v49tyl_nwEnTA/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>
                  </li>
                  <li><span class="m-l-xs">PT Kopernik payment request form (IDR)</span> <a href="https://docs.google.com/spreadsheets/d/1pkKafsTNNuipf_UFT3e-2eSpYxRq8upxGjqNgVM87O8/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>
                  </li>
                  <li><span class="m-l-xs">PT Kopernik payment request form (USD)</span> <a href="#" target="_blank"><i class="fa fa-external-link"></i></a>
                  </li>
                  <li>
                    <span class="m-l-xs">Supervisor must approved the payment request</span>
                  </li>
                  <li>
                    <span class="m-l-xs">Finance will make the payment to vendor</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="hr-line-dashed"></div>
        </div>
      </div>
    </div>
  </div>
@endsection
