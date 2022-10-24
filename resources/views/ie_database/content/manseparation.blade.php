@extends('ie_database.layouts.app')

@section('head','navbar','sidebar')

@section('contentheader')

<div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    PWI IE Database
                </h3>
              </div><!-- /.card-header -->
              <!-- .card-Body -->
              <div class="card-body">
                <!-- content-->
                    <div class="tab-content p-0">
                        {{-- Report PerCell --}}
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- /.card-header -->
                                        <div class="card-header border-transparent">
                                            <h3 class="card-title">IE Database DATA</h3>
                                            <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            </div>
                                        </div>
                                            @if (session('alert'))
                                                <div class="alert alert-danger">
                                                    {{ session('alert') }}
                                                </div>
                                            @endif
                                    <!-- /.card-header -->
                                    <!-- .card-Body -->
                                    <div id="accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-3 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-info">
                                                        <div class="inner">
                                                            <h1><b>TOS</b></h1>

                                                            <p>Time Observation Sheet</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="far fa-clock"></i>
                                                        </div>
                                                        <a href="#Tos_Target" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="Tos_Target">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col TOS -->
                                                <div class="col-lg-3 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-success">
                                                        <div class="inner">
                                                            <h1><b>SWCS</b></h1>

                                                            <p>Standard Work Combination Sheet</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fab fa-battle-net"></i>
                                                        </div>
                                                        <a href="#SWCS_Target" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="SWS_Target">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col SWS-->
                                                <div class="col-lg-3 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-warning">
                                                        <div class="inner">
                                                            <h1><b>SWS</b></h1>

                                                            <p>Standard Work Sheet</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fas fa-business-time"></i>
                                                        </div>
                                                        <a href="#SWS_Target" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="SWCS_Target">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col SWCS-->
                                                <div class="col-lg-3 col-6">
                                                    <!-- small box -->
                                                    <div class="small-box bg-danger">
                                                        <div class="inner">
                                                            <h1><b>MMC</b></h3>

                                                            <p>Man Machine Chart</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fas fa-hdd"></i>
                                                        </div>
                                                        <a href="#MMC_Target" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="MMC_Target">More info</a>
                                                    </div>
                                                </div>
                                                <!-- ./col MMC-->
                                            </div>
                                            {{-- TOS data collaps --}}
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="collapse" id="Tos_Target" data-parent="#accordion">
                                                            <div class="card-header border-transparent"><h5>CUTTING AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($tos_cutting as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>SEWING AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($tos_sewing as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>ASSEMBLING AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($tos_assembling as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>STOCKFIT AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($tos_stockfit as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>OFFLINE AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($tos_offline as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end TOS data collaps --}}
                                            {{-- SWS data collaps --}}
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="collapse" id="SWS_Target" data-parent="#accordion">
                                                            <div class="card-header border-transparent"><h5>CUTTING AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($sws_cutting as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>SEWING AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($sws_sewing as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>ASSEMBLING AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($sws_assembling as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>STOCKFIT AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($sws_stockfit as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>OFFLINE AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($sws_offline as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end SWS data collaps --}}
                                            {{-- SWCS data collaps --}}
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="collapse" id="SWCS_Target" data-parent="#accordion">
                                                            <div class="card-header border-transparent"><h5>CUTTING AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($swcs_cutting as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>SEWING AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($swcs_sewing as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>ASSEMBLING AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($swcs_assembling as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>STOCKFIT AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($swcs_stockfit as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>OFFLINE AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($swcs_offline as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="card-header border-transparent"><h5>COMPUTER AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Model</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($swcs_computer as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['model'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end SWCS data collaps --}}
                                            {{-- MMC data collaps --}}
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="collapse" id="MMC_Target" data-parent="#accordion">
                                                            <div class="card-header border-transparent"><h5>COMPUTER AREA</h5></div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Model</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php
                                                                                $no = 0;
                                                                            @endphp
                                                                            @foreach($mmc as $p)
                                                                            @php
                                                                                $no++;
                                                                            @endphp
                                                                            <tr>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['type_process'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['model'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['ct'] }}</td>
                                                                                <td style="vertical-align:middle;text-align:center">{{ $p['mtm_study'] }}</td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end SWCS data collaps --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {{--  /.Report PerCell --}}
                        <br>
                    </div>
                <!-- /content-->
              </div><!-- /.card-body -->

            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
@endsection


@section('footer')

