@extends('layouts.app')

@section('title', 'Human Resources')

@section('content')
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>HR Related</h5>
            <div class="ibox-tools">
              <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-md-4">
                <div class="widget navy-bg p-lg text-center">
                  <div class="m-b-md">
                    <i class="fa fa-shield fa-4x"></i>
                    <h1 class="m-xs">BPJS</h1>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="widget yellow-bg p-lg text-center">
                  <div class="m-b-md">
                    <i class="fa fa-user-md fa-4x"></i>
                    <h1 class="m-xs">Manulife</h1>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="widget red-bg p-lg text-center">
                  <div class="m-b-md">
                    <i class="fa fa-bell fa-4x"></i>
                    <h1 class="m-xs">Leave</h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="ibox-content">
                  <h2>Templates</h2>
                  <small>Kopernik's templates</small>
                  <ul class="todo-list m-t">
                    <li>
                      <span class="m-l-xs">Buy a milk</span>
                      <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>
                    </li>
                    <li>
                      <span class="m-l-xs">Go to shop and find some products.</span>
                      <small class="label label-info"><i class="fa fa-clock-o"></i> 3 mins</small>
                    </li>
                    <li>
                      <span class="m-l-xs">Send documents to Mike</span>
                      <small class="label label-warning"><i class="fa fa-clock-o"></i> 2 mins</small>
                    </li>
                    <li>
                      <span class="m-l-xs">Go to the doctor dr Smith</span>
                      <small class="label label-danger"><i class="fa fa-clock-o"></i> 42 mins</small>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6">
                <div class="ibox-content">
                  <h2>Policy</h2>
                  <small>Kopernik's Policy</small>
                  <ul class="todo-list m-t">
                    <li>
                      <span class="m-l-xs">Buy a milk</span>
                      <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>
                    </li>
                    <li>
                      <span class="m-l-xs">Go to shop and find some products.</span>
                      <small class="label label-info"><i class="fa fa-clock-o"></i> 3 mins</small>
                    </li>
                    <li>
                      <span class="m-l-xs">Send documents to Mike</span>
                      <small class="label label-warning"><i class="fa fa-clock-o"></i> 2 mins</small>
                    </li>
                    <li>
                      <span class="m-l-xs">Go to the doctor dr Smith</span>
                      <small class="label label-danger"><i class="fa fa-clock-o"></i> 42 mins</small>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
