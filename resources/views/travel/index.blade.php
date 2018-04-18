@extends('layouts.app')

@section('title', 'Travel')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-md-4">
        <div class="widget yellow-bg p-lg text-center" style="margin-top: 0px;">
          <div class="m-b-md">
            <i class="fa fa-plane fa-3x"></i>
            <h3 class="m-xs">Flight Booking</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="widget navy-bg p-lg text-center" style="margin-top: 0px;">
          <div class="m-b-md">
            <i class="fa fa-file fa-3x"></i>
            <h3 class="m-xs">Travel Advance Request</h3>
          </div>
        </div>

      </div>
      <div class="col-md-4">
        <div class="widget blue-bg p-lg text-center" style="margin-top: 0px;">
          <div class="m-b-md">
            <i class="fa fa-copy fa-3x"></i>
            <h3 class="m-xs">Travel Advance Reconciliation</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="ibox-content">
          <h2><i class="fa fa-plane"></i> How to book your flight</h2>
          <div class="row">
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">1</span> Request Quotation</h2>
                <ul class="todo-list m-t small-list">
                  <li><span class="m-l-xs">Traveller filling out the quotation form</span> <a href="https://docs.google.com/spreadsheets/d/1SMQWlzHxUeKB27G0R3wdBp4FYaEgUuUMsIV_d4rm-us/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>

                  </li>
                  <li><span class="m-l-xs">Send completed Flight Quotation Form
                                      two travel agents (Bali Joy & Anatavaya)
                                      and cc: Budget holder & Kopernik Travel)</span>

                  </li>
                  <li><span class="m-l-xs">If Traveler choose Trave Agent other than
                                      the 2 Kopernik Official Agents. Please
                                      read the T&C applies</span>

                  </li>

                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">2</span> Flight Selection</h2>
                <ul class="todo-list m-t small-list">
                  <li>
                    <span class="m-l-xs">Traveler will select the flight by highlighting the
                                    preferred flight on the Flight Quotation form and
                                    make the booking to the Travel agent</span>

                  </li>
                  <li>

                    <span class="m-l-xs">Submit the flight selection to Budget Holder and
                                    Kopernik Travel by email (in this process Kopernik
                                    Travel will review the selected flight from the travel
                                    agent’s quotation)</span>

                  </li>
                  <li>
                    <span class="m-l-xs">If Kopernik Travel agrees with the selected flight, the Budget Holder can approve on the Approval column
                                    in the Flight Quotation Form</span>

                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">3</span> Issuing Ticket</h2>
                <ul class="todo-list m-t small-list">
                  <li>
                    <span class="m-l-xs ">Kopernik Travel will send confirmation to the travel agent to issue the ticket</span>

                  </li>
                  <li>
                    <span class="m-l-xs">Go to shop and find some products.</span>

                  </li>
                  <li>
                    <span class="m-l-xs">Travel agent will send invoice, E-ticket and Travel insurance (If any)</span>
                  </li>

                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">4</span> Payment</h2>
                <ul class="todo-list m-t small-list">
                  <li>
                    <span class="m-l-xs">Kopernik Travel will collect all invoices and billing statement from each travel agent
                                          every two weeks</span>

                  </li>
                  <li>
                    <span class="m-l-xs">Kopernik Travel will make and send Payment Request to Finance Team enclosed with
                                          hardcopy of invoice, e-ticket and quotation</span>

                  </li>
                  <li>
                    <span class="m-l-xs">Finance will make the payment to each travel
                                          agents</span>
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="hr-line-dashed"></div>
          <div class="row">
            <div class="col-md-12">
              <h2><i class="fa fa-certificate"></i> Official Travel Guide </h2>
              <ul>
                <li><b>BOARDING PASS</b> – staff traveling should submit the boarding pass to finance for their Travel Advance reconciliaEon.
                </li>
                <li>Staff who wants to travel are inclined to send quotaEon request to 2 kopernik’s Travel Agents (Bali Joy & Antavaya) by separate email to see which Agent offers the best price</li>
                <li>Travel Agents are given the 30 minutes window to respond to Kopernik request. If only one Agent responded then Staff may just go with the one who send the quote first</li>
                <li><b>ONLINE TICKET AGENT</b> – purchase via ONLINE AGENT like Traveloka, Ticket.com, etc is allowed if Staff feels that the price is lower than the 2 Travel Agent T&C applies:</li>
                <ol>
                  <li>Quotation from Bali Joy and Antavaya should accompanied the Quotation from Online Agent</li>
                  <li>Payment to Online Agent will be done by Staff directly – then staff could ask for reimbursement (attaching Ticket, Proof of Payment, Flight Quotation from Antavaya & Bali Joy – payment request approved by Manager)</li>
                  <li>In case of cancellation – Staff is responsible to process the refund request to Online Agent directly and dully inform finance and Travel team if the fund has been transferred back to Kopernik</li>
                </ol>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p>&nbsp;</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="ibox-content">
          <h2><i class="fa fa-file"></i> How to create a Travel Advance Request</h2>
          <div class="row">
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">1</span> Domestic Travel (IDR)</h2>
                <ul class="todo-list m-t small-list">
                  <li>
                    <span class="m-l-xs">Download Travel Advance Request PT Kopernik</span> <a href="https://docs.google.com/spreadsheets/d/1dwUq4AF4TYEq-pYptavMAkHxv5_YInMlplv6jFEd2xw/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>

                  </li>
                  <li>
                    <span class="m-l-xs">Download Travel Advance Request Yayasan Kopernik</span> <a href="https://docs.google.com/spreadsheets/d/1cYXCMElg3FmPT9NX_mAQBtvEHGNZ1GOHV70tCRtIxjE/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>

                  </li>
                  <li>
                    <span class="m-l-xs">Fill out the form with your forcasting travel expenses</span>

                  </li>
                  <li>
                    <span class="m-l-xs">Send documents to your supervisor to get approval</span>

                  </li>
                  <li>
                    <span class="m-l-xs">Finance will transfer the fund once you got approval</span>

                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">2</span> International Travel (USD)</h2>
                <ul class="todo-list m-t small-list">
                  <li>
                    <span class="m-l-xs">Download Travel Advance Request PT Kopernik</span> <a href="https://docs.google.com/spreadsheets/d/1K-spt4_IBlpZMI73LLkmPA-p7-Qzhmc9TcEfHtHVSWE/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>

                  </li>
                  <li>
                    <span class="m-l-xs">Download Travel Advance Request Yayasan Kopernik</span> <a href="https://docs.google.com/spreadsheets/d/1JBrf5Fr83O2kWy-xTLa-sEISZxkWUu6GP_eokLPgv3g/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>

                  </li>
                  <li>
                    <span class="m-l-xs">Fill out the form with your forcasting travel expenses</span>

                  </li>
                  <li>
                    <span class="m-l-xs">Send documents to your supervisor to get approval</span>

                  </li>
                  <li>
                    <span class="m-l-xs">Finance will transfer the fund once you got approval</span>

                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p>&nbsp;</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="ibox-content">
          <h2><i class="fa fa-copy"></i> How to do a Travel Advance Reconciliation </h2>
          <div class="row">
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">1</span> Domestic Travel (IDR)</h2>
                <ul class="todo-list m-t small-list">
                  <li>
                    <span class="m-l-xs">According to OPS Manual, travel advance reconsiliation need to be done within 7 days after your arrival in the office</span>

                  </li>
                  <li>
                    <span class="m-l-xs">Download Travel Advance Reconciliation PT Kopernik</span> <a href="https://docs.google.com/spreadsheets/d/18-KI5yqyuQ785T9YxhIt96b12dyxQ8gWKLpvgn6ZGS0/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>

                  </li>
                  <li>
                    <span class="m-l-xs">Download Travel Advance Reconciliation Yayasan Kopernik</span> <a href="https://docs.google.com/spreadsheets/d/1S9uigzWsPffAwJln92w0oI6wfM8gRGcF6U9TdyQantg/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>

                  </li>

                  <li>
                    <span class="m-l-xs">Send documents and all your prove of transaction documents to finance (finance@kopernik.info)</span>

                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">2</span> International Travel (USD)</h2>
                <ul class="todo-list m-t small-list">
                  <li>
                    <span class="m-l-xs">According to OPS Manual, travel advance reconsiliation need to be done within 7 days after your arrival in the office</span>

                  </li>
                  <li>
                    <span class="m-l-xs">Download Travel Advance Reconciliation PT Kopernik</span> <a href="https://docs.google.com/spreadsheets/d/1Spza1Q20Ep1MVPocg2lce5zln4HuEZJxcGnnf0GwAh8/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>

                  </li>
                  <li>
                    <span class="m-l-xs">Download Travel Advance Reconciliation Yayasan Kopernik</span> <a href="https://docs.google.com/spreadsheets/d/1Tuze4j0-Sk7dU-NtJT7WvzqzKKsm55_1IblGq-9yYxg/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a>

                  </li>

                  <li>
                    <span class="m-l-xs">Send documents and all your prove of transaction documents to finance (finance@kopernik.info)</span>

                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p>&nbsp;</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="ibox-content">
          <h2><i class="fa fa-paper-plane"></i> Kopernik Japan  </h2>
          <div class="row">
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">1</span> Travel in Indonesia under YK <a href="https://docs.google.com/document/d/1kTGwkAg4Ju_Vcu_uBbaPKkt9SPLFEo9FfS53U-CUBdc/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a></h2>
              </div>
            </div>
            <div class="col-md-6">
              <div class="ibox-content">
                <h2><span class="badge badge-warning">2</span> Travel in Indonesia under PTK <a href="https://docs.google.com/document/d/1jxFdYAP16H06ajCKX_3lC6IoAsM8inYDdTkphQlCbAI/edit?usp=sharing" target="_blank"><i class="fa fa-external-link"></i></a></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p>&nbsp;</p>
      </div>
    </div>
  </div>
@endsection
