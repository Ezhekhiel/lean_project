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
                        {{-- Report PerArea --}}
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
                                        @if (session('alert_save'))
                                            <div class="alert alert-success">
                                                {{ session('alert_save') }}
                                            </div>
                                        @endif
                                        @if (session('alert_delete'))
                                            <div class="alert alert-danger">
                                                {{ session('alert_delete') }}
                                            </div>
                                        @endif
                                        @if (session('alert_error'))
                                            <div class="alert alert-danger">
                                                {{ session('alert_error') }}
                                            </div>
                                        @endif
                                    <!-- /.card-header -->
                                    <!-- .card-Body -->
                                    <div id="accordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-4 col-12">
                                                    <!-- small box -->
                                                    <div class="small-box bg-info">
                                                        <div class="inner">
                                                            <h1><b>CUTTING</b></h1>

                                                            <p>Area</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fas fa-cut"></i>
                                                        </div>
                                                        <a href="#cutting_target" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="cutting_target">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col TOS -->
                                                <div class="col-lg-4 col-12">
                                                    <!-- small box -->
                                                    <div class="small-box bg-success">
                                                        <div class="inner">
                                                            <h1><b>SEWING</b></h1>

                                                            <p>Area</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fas fa-pen-fancy"></i>
                                                        </div>
                                                        <a href="#sewing_target" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="sewing_target">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col SWS-->
                                                <div class="col-lg-4 col-12">
                                                    <!-- small box -->
                                                    <div class="small-box bg-warning">
                                                        <div class="inner">
                                                            <h1><b>ASSEMBLING</b></h1>

                                                            <p>Area</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fas fa-route"></i>
                                                        </div>
                                                        <a href="#assembling_target" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="assembling_target">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- ./col SWCS-->
                                                <div class="col-lg-6 col-12">
                                                    <!-- small box -->
                                                    <div class="small-box bg-danger">
                                                        <div class="inner">
                                                            <h1><b>STOCKFIT</b></h3>

                                                            <p>Area</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fab fa-mizuni"></i>
                                                        </div>
                                                        <a href="#stockfit_area" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="stockfit_area">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col Stockfit-->
                                                <div class="col-lg-6 col-12">
                                                    <!-- small box -->
                                                    <div class="small-box bg-danger">
                                                        <div class="inner">
                                                            <h1><b>OFFLINE</b></h3>

                                                            <p>Area</p>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fab fa-accusoft"></i>
                                                        </div>
                                                        <a href="#offline_area" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="offline_area">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col Stockfit-->
                                            </div>

                                            {{-- CUTTING data collaps --}}
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="collapse" id="cutting_target" data-parent="#accordion">
                                                            <div class="card-header border-transparent"><h5>CUTTING AREA</h5></div>
                                                            <div class="card-header">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tambahData">Tambah Data</button>
                                                            </div>
                                                            <div class="card-header">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input type="text" name="search_cutting" id="search_cutting" class="form-control" placeholder="Search Process" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <h3 align="center">Total Data : <span id="total_records_cutting"></span></h3>
                                                                    <table class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                            <th style="vertical-align:middle;text-align:center">Action</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody id="cutting">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end CUTTING data collaps --}}
                                            {{-- SEWING data collaps --}}
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="collapse" id="sewing_target" data-parent="#accordion">
                                                            <div class="card-header border-transparent"><h5>SEWING AREA</h5></div>
                                                            <div class="card-header">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tambahData">Tambah Data</button>
                                                            </div>
                                                            <div class="card-header">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input type="text" name="search_sewing" id="search_sewing" class="form-control" placeholder="Search Process" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <h3 align="center">Total Data : <span id="total_records_sewing"></span></h3>
                                                                    <table class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                            <th style="vertical-align:middle;text-align:center">Action</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody id="sewing">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end SEWING data collaps --}}
                                            {{-- ASSEMBLING data collaps --}}
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="collapse" id="assembling_target" data-parent="#accordion">
                                                            <div class="card-header border-transparent"><h5>ASSEMBLING AREA</h5></div>
                                                            <div class="card-header">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tambahData">Tambah Data</button>
                                                            </div>
                                                            <div class="card-header">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input type="text" name="search_assembling" id="search_assembling" class="form-control" placeholder="Search Process" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <h3 align="center">Total Data : <span id="total_records_assembling"></span></h3>
                                                                    <table class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                            <th style="vertical-align:middle;text-align:center">Action</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody id="assembling">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end ASSEMBLING data collaps --}}
                                            {{-- STOCKFIT data collaps --}}
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="collapse" id="stockfit_area" data-parent="#accordion">
                                                            <div class="card-header border-transparent"><h5>STOCKFIT AREA</h5></div>
                                                            <div class="card-header">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tambahData">Tambah Data</button>
                                                            </div>
                                                            <div class="card-header">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input type="text" name="search_stockfit" id="search_stockfit" class="form-control" placeholder="Search Process" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                <h3 align="center">Total Data : <span id="total_records_stockfit"></span></h3>
                                                                <table class="table table-striped table-bordered">
                                                                    <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                            <th style="vertical-align:middle;text-align:center">Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="stockfit">

                                                                    </tbody>
                                                                </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end STOCKFIT data collaps --}}
                                            {{-- OFFLINE data collaps --}}
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="collapse" id="offline_area" data-parent="#accordion">
                                                            <div class="card-header border-transparent"><h5>OFFLINE AREA</h5></div>
                                                            <div class="card-header">
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tambahData">Tambah Data</button>
                                                            </div>
                                                            <div class="card-header">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <input type="text" name="search_offline" id="search_offline" class="form-control" placeholder="Search Process" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <h3 align="center">Total Data : <span id="total_records_offline"></span></h3>
                                                                    <table class="table table-striped table-bordered">
                                                                        <thead class="thead-dark">
                                                                        <tr>
                                                                            <th style="vertical-align:middle;text-align:center">No</th>
                                                                            <th style="vertical-align:middle;text-align:center">Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">Type of Process</th>
                                                                            <th style="vertical-align:middle;text-align:center">CT</th>
                                                                            <th style="vertical-align:middle;text-align:center">MTM Study</th>
                                                                            <th style="vertical-align:middle;text-align:center">Action</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody id="offline">

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end STOCKFIT data collaps --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{--  /.Report PerArea --}}
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
    {{-- modal-body --}}
    {{-- modal delete --}}
        @foreach ($cutting as $a)
            <div class="modal fade" id="{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pindahkan data ini ke arsip?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data Process {{$a->process}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal Delete</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/delete/'.$a->id_process)}}'">Hapus Pesan Saja</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/archive/'.$a->id_process)}}'">Ya</button>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($sewing as $a)
            <div class="modal fade" id="{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pindahkan data ini ke arsip?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data Process {{$a->process}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal Delete</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/delete/'.$a->id_process)}}'">Hapus Pesan Saja</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/archive/'.$a->id_process)}}'">Ya</button>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($assembling as $a)
            <div class="modal fade" id="{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda Sudah Yakin?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data Process {{$a->process}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal Delete</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/delete/'.$a->id_process)}}'">Hapus Pesan Saja</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/archive/'.$a->id_process)}}'">Ya</button>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($stockfit as $a)
            <div class="modal fade" id="{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda Sudah Yakin?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data Process {{$a->process}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal Delete</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/delete/'.$a->id_process)}}'">Hapus Pesan Saja</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/archive/'.$a->id_process)}}'">Ya</button>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($offline as $a)
            <div class="modal fade" id="{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Anda Sudah Yakin?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data Process {{$a->process}} akan di hapus?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal Delete</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/delete/'.$a->id_process)}}'">Hapus Pesan Saja</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/archive/'.$a->id_process)}}'">Ya</button>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach

    {{-- modal Update --}}
        @foreach ($cutting as $a)
            <div class="modal fade" id="update{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Update</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="FormUpdate{{$a->id_process}}" id="FormUpdate{{$a->id_process}}" action="{{url('/ie_base/update')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_process" value="{{$a->id_process}}">
                            <div class="form-group">
                                <label for="exampleInputModelName">Process <small><i>(old data = {{$a->process}})</i></small></label>
                                <input type="text" name="hidden_process" class="form-control" onfocus="this.value=''" value="{{$a->process}}" disabled>
                                <input type="hidden" name="process" value="{{$a->process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('process') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputModelName">Urutan Process</label>
                                <input type="number" name="hidden1" class="form-control" onfocus="this.value=''" value="{{$a->urutan_process}}" disabled>
                                <input type="hidden" name="urutan" value="{{$a->urutan_process}}">

                                <p class="text-danger mr-1"><b><i>{{ $errors->first('urutan') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSeason">Type Process</label>
                                <select name="hidden2" class="form-control" disabled>
                                        <option value="{{$a->type_process}}"><i><--- {{$a->type_process}} ---></i></option>
                                        <option value="Basic Process">Basic Process</option>
                                        <option value="Specific Process">Specific Process</option>
                                </select>
                                <input type="hidden" name="type_process" value="{{$a->type_process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('type_process') }}</i></b></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">Old Cycle Time</label>
                                        <input type="number" step="0.01" name="disabledCT" class="form-control" onfocus="this.value=''" value="{{$a->ct}}" disabled>
                                        <input type="hidden"name="old_ct"value="{{$a->ct}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">New Cycle Time</label>
                                        <input type="number" step="0.01" name="ct" class="form-control" value="" placeholder="Input New CT">
                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('ct') }}</i></b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSeason">MTM Study</label>
                                <select name="hidden3" class="form-control" disabled>
                                    <option value="{{$a->mtm_study}}"><i><--- {{$a->mtm_study}} ---></i></option>
                                    <option value="TOS">TOS</option>
                                    <option value="SWCS">SWCS</option>
                                    <option value="SWS">SWS</option>
                                </select>
                                <input type="hidden" name="mtm" value="{{$a->mtm_study}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('mtm') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSeason">Area</label>
                                <select name="hidden4" class="form-control" disabled>
                                    <option value="{{$a->area}}"><--- {{$a->area}} ---></option>
                                    <option value="Cutting">Cutting</option>
                                    <option value="Sewing">Sewing</option>
                                    <option value="Assembling">Assembling</option>
                                    <option value="Stockfit">Stockfit</option>
                                    <option value="Offline">Offline</option>
                                </select>
                                <input type="hidden" name="area" value="{{$a->area}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('area') }}</i></b></p>
                            </div>
                            {{-- ====row image swcs / tos==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            <a class="test-popup-link" href="/images/lean/ie_database/{{ $a->image }}">
                                                <td style="vertical-align:middle;text-align:center"><center><img src="/images/lean/ie_database/{{ $a->image }}" height="50%" width="50%" style="border: 5px solid #555;"/></center></td>
                                            </a>
                                            <input type="hidden" name="old_image" value="{{$a->image}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">New Image <small style="color: red"><i>TOS/SWCS</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg">

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image swcs / tos==== --}}
                            {{-- ====row image sws==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            @php
                                                if($a->image_sws!="-")
                                                {
                                                    echo"<a class='test-popup-link' href='/images/lean/ie_database/$a->image_sws'><td style='vertical-align:middle;text-align:center'><center><img src='/images/lean/ie_database/$a->image_sws' height='50%' width='50%' style='border: 5px solid #555;'/></center></td></a>";
                                                }else{
                                                    echo"<br><a>image tidak ada!</a>";
                                                }
                                            @endphp
                                            <input type="hidden" name="old_image_sws" value="{{$a->image_sws}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Image <small style="color: red"><i>SWS / MMC</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image_sws" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image_sws') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image sws==== --}}
                            {{-- ====row VIDEO==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Video</label>
                                            <video width="100%" height="100%" controls>
                                                <source src="{{url('/video/lean/ie_database/'.$a->video_process)}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            <input type="hidden" name="old_video" value="{{$a->video_process}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Video Process</label>
                                            <div class="input-group">
                                                <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('video') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputModelName">Remark</label>
                                    <textarea name="remark" class="form-control" placeholder="Input remark"></textarea>
                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('remark') }}</i></b></p>
                                </div>
                            {{-- ====//row VIDEO==== --}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($sewing as $a)
            <div class="modal fade" id="update{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Update</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="FormUpdate{{$a->id_process}}" id="FormUpdate{{$a->id_process}}" action="{{url('/ie_base/update')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_process" value="{{$a->id_process}}">
                            <div class="form-group">
                                <label for="exampleInputModelName">Process <small><i>(old data = {{$a->process}})</i></small></label>
                                <input type="text" name="hidden_process" class="form-control" onfocus="this.value=''" value="{{$a->process}}" disabled>
                                <input type="hidden" name="process" value="{{$a->process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('process') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputModelName">Urutan Process</label>
                                <input type="number" name="hidden1" class="form-control" onfocus="this.value=''" value="{{$a->urutan_process}}" disabled>
                                <input type="hidden" name="urutan" value="{{$a->urutan_process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('urutan') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSeason">Type Process</label>
                                <select name="hidden2" class="form-control" disabled>
                                        <option value="{{$a->type_process}}"><i><--- {{$a->type_process}} ---></i></option>
                                        <option value="Basic Process">Basic Process</option>
                                        <option value="Specific Process">Specific Process</option>
                                </select>
                                <input type="hidden" name="type_process" value="{{$a->type_process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('type_process') }}</i></b></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">Old Cycle Time</label>
                                        <input type="number" step="0.01" name="disabledCT" class="form-control" onfocus="this.value=''" value="{{$a->ct}}" disabled>
                                        <input type="hidden"name="old_ct"value="{{$a->ct}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">New Cycle Time</label>
                                        <input type="number" step="0.01" name="ct" class="form-control" value="" placeholder="Input New CT">
                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('ct') }}</i></b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSeason">MTM Study</label>
                                <select name="hidden3" class="form-control" disabled>
                                    <option value="{{$a->mtm_study}}"><i><--- {{$a->mtm_study}} ---></i></option>
                                    <option value="TOS">TOS</option>
                                    <option value="SWCS">SWCS</option>
                                    <option value="SWS">SWS</option>
                                </select>
                                <input type="hidden" name="mtm" value="{{$a->mtm_study}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('mtm') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSeason">Area</label>
                                <select name="hidden4" class="form-control" disabled>
                                    <option value="{{$a->area}}"><--- {{$a->area}} ---></option>
                                    <option value="Cutting">Cutting</option>
                                    <option value="Sewing">Sewing</option>
                                    <option value="Assembling">Assembling</option>
                                    <option value="Stockfit">Stockfit</option>
                                    <option value="Offline">Offline</option>
                                </select>
                                <input type="hidden" name="area" value="{{$a->area}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('area') }}</i></b></p>
                            </div>
                            {{-- ====row image swcs / tos==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            <a class="test-popup-link" href="/images/lean/ie_database/{{ $a->image }}">
                                                <td style="vertical-align:middle;text-align:center"><center><img src="/images/lean/ie_database/{{ $a->image }}" height="50%" width="50%" style="border: 5px solid #555;"/></center></td>
                                            </a>
                                            <input type="hidden" name="old_image" value="{{$a->image}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">New Image <small style="color: red"><i>TOS/SWCS</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg">

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image swcs / tos==== --}}
                            {{-- ====row image sws==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            @php
                                                if($a->image_sws!="-")
                                                {
                                                    echo"<a class='test-popup-link' href='/images/lean/ie_database/$a->image_sws'><td style='vertical-align:middle;text-align:center'><center><img src='/images/lean/ie_database/$a->image_sws' height='50%' width='50%' style='border: 5px solid #555;'/></center></td></a>";
                                                }else{
                                                    echo"<br><a>image tidak ada!</a>";
                                                }
                                            @endphp
                                            <input type="hidden" name="old_image_sws" value="{{$a->image_sws}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Image <small style="color: red"><i>SWS / MMC</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image_sws" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image_sws') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image sws==== --}}
                            {{-- ====row VIDEO==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Video</label>
                                            <video width="100%" height="100%" controls>
                                                <source src="{{url('/video/lean/ie_database/'.$a->video_process)}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            <input type="hidden" name="old_video" value="{{$a->video_process}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Video Process</label>
                                            <div class="input-group">
                                                <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('video') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputModelName">remark</label>
                                    <textarea name="remark" class="form-control" placeholder="Input remark"></textarea>
                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('remark') }}</i></b></p>
                                </div>
                            {{-- ====//row VIDEO==== --}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($assembling as $a)
            <div class="modal fade" id="update{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Update</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="FormUpdate{{$a->id_process}}" id="FormUpdate{{$a->id_process}}" action="{{url('/ie_base/update')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_process" value="{{$a->id_process}}">
                            <div class="form-group">
                                <label for="exampleInputModelName">Process <small><i>(old data = {{$a->process}})</i></small></label>
                                <input type="text" name="hidden_process" class="form-control" onfocus="this.value=''" value="{{$a->process}}" disabled>
                                <input type="hidden" name="process" value="{{$a->process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('process') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputModelName">Urutan Process</label>
                                <input type="number" name="hidden1" class="form-control" onfocus="this.value=''" value="{{$a->urutan_process}}" disabled>
                                <input type="hidden" name="urutan" value="{{$a->urutan_process}}">

                                <p class="text-danger mr-1"><b><i>{{ $errors->first('urutan') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSeason">Type Process</label>
                                <select name="hidden2" class="form-control" disabled>
                                        <option value="{{$a->type_process}}"><i><--- {{$a->type_process}} ---></i></option>
                                        <option value="Basic Process">Basic Process</option>
                                        <option value="Specific Process">Specific Process</option>
                                </select>
                                <input type="hidden" name="type_process" value="{{$a->type_process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('type_process') }}</i></b></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">Old Cycle Time</label>
                                        <input type="number" step="0.01" name="disabledCT" class="form-control" onfocus="this.value=''" value="{{$a->ct}}" disabled>
                                        <input type="hidden"name="old_ct"value="{{$a->ct}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">New Cycle Time</label>
                                        <input type="number" step="0.01" name="ct" class="form-control" value="" placeholder="Input New CT">
                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('ct') }}</i></b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSeason">MTM Study</label>
                                <select name="hidden3" class="form-control" disabled>
                                    <option value="{{$a->mtm_study}}"><i><--- {{$a->mtm_study}} ---></i></option>
                                    <option value="TOS">TOS</option>
                                    <option value="SWCS">SWCS</option>
                                    <option value="SWS">SWS</option>
                                </select>
                                <input type="hidden" name="mtm" value="{{$a->mtm_study}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('mtm') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSeason">Area</label>
                                <select name="hidden4" class="form-control" disabled>
                                    <option value="{{$a->area}}"><--- {{$a->area}} ---></option>
                                    <option value="Cutting">Cutting</option>
                                    <option value="Sewing">Sewing</option>
                                    <option value="Assembling">Assembling</option>
                                    <option value="Stockfit">Stockfit</option>
                                    <option value="Offline">Offline</option>
                                </select>
                                <input type="hidden" name="area" value="{{$a->area}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('area') }}</i></b></p>
                            </div>
                            {{-- ====row image swcs / tos==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            <a class="test-popup-link" href="/images/lean/ie_database/{{ $a->image }}">
                                                <td style="vertical-align:middle;text-align:center"><center><img src="/images/lean/ie_database/{{ $a->image }}" height="50%" width="50%" style="border: 5px solid #555;"/></center></td>
                                            </a>
                                            <input type="hidden" name="old_image" value="{{$a->image}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">New Image <small style="color: red"><i>TOS/SWCS</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg">

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image swcs / tos==== --}}
                            {{-- ====row image sws==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            @php
                                                if($a->image_sws!="-")
                                                {
                                                    echo"<a class='test-popup-link' href='/images/lean/ie_database/$a->image_sws'><td style='vertical-align:middle;text-align:center'><center><img src='/images/lean/ie_database/$a->image_swS' height='50%' width='50%' style='border: 5px solid #555;'/></center></td></a>";
                                                }else{
                                                    echo"<br><a>image tidak ada!</a>";
                                                }
                                            @endphp
                                            <input type="hidden" name="old_image_sws" value="{{$a->image_sws}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Image <small style="color: red"><i>SWS / MMC</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image_sws" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image_sws') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image sws==== --}}
                            {{-- ====row VIDEO==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Video</label>
                                            <video width="100%" height="100%" controls>
                                                <source src="{{url('/video/lean/ie_database/'.$a->video_process)}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            <input type="hidden" name="old_video" value="{{$a->video_process}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Video Process</label>
                                            <div class="input-group">
                                                <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('video') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputModelName">remark</label>
                                    <textarea name="remark" class="form-control" placeholder="Input remark"></textarea>
                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('remark') }}</i></b></p>
                                </div>
                            {{-- ====//row VIDEO==== --}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($offline as $a)
            <div class="modal fade" id="update{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Update</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="FormUpdate{{$a->id_process}}" id="FormUpdate{{$a->id_process}}" action="{{url('/ie_base/update')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_process" value="{{$a->id_process}}">
                            <div class="form-group">
                                <label for="exampleInputModelName">Process <small><i>(old data = {{$a->process}})</i></small></label>
                                <input type="text" name="hidden_process" class="form-control" onfocus="this.value=''" value="{{$a->process}}" disabled>
                                <input type="hidden" name="process" value="{{$a->process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('process') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputModelName">Urutan Process</label>
                                <input type="number" name="hidden1" class="form-control" onfocus="this.value=''" value="{{$a->urutan_process}}" disabled>
                                <input type="hidden" name="urutan" value="{{$a->urutan_process}}">

                                <p class="text-danger mr-1"><b><i>{{ $errors->first('urutan') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSeason">Type Process</label>
                                <select name="hidden2" class="form-control" disabled>
                                        <option value="{{$a->type_process}}"><i><--- {{$a->type_process}} ---></i></option>
                                        <option value="Basic Process">Basic Process</option>
                                        <option value="Specific Process">Specific Process</option>
                                </select>
                                <input type="hidden" name="type_process" value="{{$a->type_process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('type_process') }}</i></b></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">Old Cycle Time</label>
                                        <input type="number" step="0.01" name="disabledCT" class="form-control" onfocus="this.value=''" value="{{$a->ct}}" disabled>
                                        <input type="hidden"name="old_ct"value="{{$a->ct}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">New Cycle Time</label>
                                        <input type="number" step="0.01" name="ct" class="form-control" value="" placeholder="Input New CT">
                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('ct') }}</i></b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSeason">MTM Study</label>
                                <select name="hidden3" class="form-control" disabled>
                                    <option value="{{$a->mtm_study}}"><i><--- {{$a->mtm_study}} ---></i></option>
                                    <option value="TOS">TOS</option>
                                    <option value="SWCS">SWCS</option>
                                    <option value="SWS">SWS</option>
                                </select>
                                <input type="hidden" name="mtm" value="{{$a->mtm_study}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('mtm') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSeason">Area</label>
                                <select name="hidden4" class="form-control" disabled>
                                    <option value="{{$a->area}}"><--- {{$a->area}} ---></option>
                                    <option value="Cutting">Cutting</option>
                                    <option value="Sewing">Sewing</option>
                                    <option value="Assembling">Assembling</option>
                                    <option value="Stockfit">Stockfit</option>
                                    <option value="Offline">Offline</option>
                                </select>
                                <input type="hidden" name="area" value="{{$a->area}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('area') }}</i></b></p>
                            </div>
                            {{-- ====row image swcs / tos==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            <a class="test-popup-link" href="/images/lean/ie_database/{{ $a->image }}">
                                                <td style="vertical-align:middle;text-align:center"><center><img src="/images/lean/ie_database/{{ $a->image }}" height="50%" width="50%" style="border: 5px solid #555;"/></center></td>
                                            </a>
                                            <input type="hidden" name="old_image" value="{{$a->image}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">New Image <small style="color: red"><i>TOS/SWCS</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg">

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image swcs / tos==== --}}
                            {{-- ====row image sws==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            @php
                                                if($a->image_sws!="-")
                                                {
                                                    echo"<a class='test-popup-link' href='/images/lean/ie_database/$a->image_sws'><td style='vertical-align:middle;text-align:center'><center><img src='/images/lean/ie_database/$a->image_sws' height='50%' width='50%' style='border: 5px solid #555;'/></center></td></a>";
                                                }else{
                                                    echo"<br><a>image tidak ada!</a>";
                                                }
                                            @endphp
                                            <input type="hidden" name="old_image_sws" value="{{$a->image_sws}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Image <small style="color: red"><i>SWS / MMC</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image_sws" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image_sws') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image sws==== --}}
                            {{-- ====row VIDEO==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Video</label>
                                            <video width="100%" height="100%" controls>
                                                <source src="{{url('/video/lean/ie_database/'.$a->video_process)}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            <input type="hidden" name="old_video" value="{{$a->video_process}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Video Process</label>
                                            <div class="input-group">
                                                <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('video') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputModelName">remark</label>
                                    <textarea name="remark" class="form-control" placeholder="Input remark"></textarea>
                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('remark') }}</i></b></p>
                                </div>
                            {{-- ====//row VIDEO==== --}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach ($stockfit as $a)
            <div class="modal fade" id="update{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Update</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="FormUpdate{{$a->id_process}}" id="FormUpdate{{$a->id_process}}" action="{{url('/ie_base/update')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_process" value="{{$a->id_process}}">
                            <div class="form-group">
                                <label for="exampleInputModelName">Process <small><i>(old data = {{$a->process}})</i></small></label>
                                <input type="text" name="hidden_process" class="form-control" onfocus="this.value=''" value="{{$a->process}}" disabled>
                                <input type="hidden" name="process" value="{{$a->process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('process') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputModelName">Urutan Process</label>
                                <input type="number" name="hidden1" class="form-control" onfocus="this.value=''" value="{{$a->urutan_process}}" disabled>
                                <input type="hidden" name="urutan" value="{{$a->urutan_process}}">

                                <p class="text-danger mr-1"><b><i>{{ $errors->first('urutan') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSeason">Type Process</label>
                                <select name="hidden2" class="form-control" disabled>
                                        <option value="{{$a->type_process}}"><i><--- {{$a->type_process}} ---></i></option>
                                        <option value="Basic Process">Basic Process</option>
                                        <option value="Specific Process">Specific Process</option>
                                </select>
                                <input type="hidden" name="type_process" value="{{$a->type_process}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('type_process') }}</i></b></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">Old Cycle Time</label>
                                        <input type="number" step="0.01" name="disabledCT" class="form-control" onfocus="this.value=''" value="{{$a->ct}}" disabled>
                                        <input type="hidden"name="old_ct"value="{{$a->ct}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">New Cycle Time</label>
                                        <input type="number" step="0.01" name="ct" class="form-control" value="" placeholder="Input New CT">
                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('ct') }}</i></b></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputSeason">MTM Study</label>
                                <select name="hidden3" class="form-control" disabled>
                                    <option value="{{$a->mtm_study}}"><i><--- {{$a->mtm_study}} ---></i></option>
                                    <option value="TOS">TOS</option>
                                    <option value="SWCS">SWCS</option>
                                    <option value="SWS">SWS</option>
                                </select>
                                <input type="hidden" name="mtm" value="{{$a->mtm_study}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('mtm') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputSeason">Area</label>
                                <select name="hidden4" class="form-control" disabled>
                                    <option value="{{$a->area}}"><--- {{$a->area}} ---></option>
                                    <option value="Cutting">Cutting</option>
                                    <option value="Sewing">Sewing</option>
                                    <option value="Assembling">Assembling</option>
                                    <option value="Stockfit">Stockfit</option>
                                    <option value="Offline">Offline</option>
                                </select>
                                <input type="hidden" name="area" value="{{$a->area}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('area') }}</i></b></p>
                            </div>
                            {{-- ====row image swcs / tos==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            <a class="test-popup-link" href="/images/lean/ie_database/{{ $a->image }}">
                                                <td style="vertical-align:middle;text-align:center"><center><img src="/images/lean/ie_database/{{ $a->image }}" height="50%" width="50%" style="border: 5px solid #555;"/></center></td>
                                            </a>
                                            <input type="hidden" name="old_image" value="{{$a->image}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">New Image <small style="color: red"><i>TOS/SWCS</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg">

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image swcs / tos==== --}}
                            {{-- ====row image sws==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            @php
                                                if($a->image_sws!="-")
                                                {
                                                    echo"<a class='test-popup-link' href='/images/lean/ie_database/$a->image_sws'><td style='vertical-align:middle;text-align:center'><center><img src='/images/lean/ie_database/$a->image_sws' height='50%' width='50%' style='border: 5px solid #555;'/></center></td></a>";
                                                }else{
                                                    echo"<br><a>image tidak ada!</a>";
                                                }
                                            @endphp
                                            <input type="hidden" name="old_image_sws" value="{{$a->image_sws}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Image <small style="color: red"><i>SWS / MMC</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image_sws" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image_sws') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image sws==== --}}
                            {{-- ====row VIDEO==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Video</label>
                                            <video width="100%" height="100%" controls>
                                                <source src="{{url('/video/lean/ie_database/'.$a->video_process)}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            <input type="hidden" name="old_video" value="{{$a->video_process}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Video Process</label>
                                            <div class="input-group">
                                                <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('video') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputModelName">remark</label>
                                    <textarea name="remark" class="form-control" placeholder="Input remark"></textarea>
                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('remark') }}</i></b></p>
                                </div>
                            {{-- ====//row VIDEO==== --}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- modal input --}}
        <div class="modal fade tambahData" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert" id="message" style="display: none"></div>
                            <form method="POST" name="formInput" id="formInput" action="#" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">TAMBAH DATA</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputModelName">Process</label>
                                            <input type="text" name="process" id="process" class="form-control"placeholder="Enter Process">
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('process') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputModelName">Urutan Process</label>
                                            <input type="number" name="urutan" id="urutan" class="form-control"placeholder="Enter Process">
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('urutan') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Type Process</label>
                                            <select name="type_process" id="type_process" class="form-control">
                                                    <option value="">Select Type Process</option>
                                                    <option value="Basic Process">Basic Process</option>
                                                    <option value="Specific Process">Specific Process</option>
                                            </select>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('type_process') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputModelName">Cycle Time</label>
                                            <input type="number" step="0.01" name="ct" id="ct" class="form-control"placeholder="Enter Type Process">
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('ct') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputSeason">MTM Study</label>
                                            <select name="mtm" id="mtm" class="form-control">
                                                    <option value="">Select ..</option>
                                                    <option value="TOS">TOS</option>
                                                    <option value="SWCS">SWCS</option>
                                                    <option value="SWS">SWS</option>
                                            </select>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('mtm') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Area</label>
                                            <select name="area" id="area" class="form-control">
                                                    <option value="">Select Area</option>
                                                    <option value="Cutting">Cutting</option>
                                                    <option value="Sewing">Sewing</option>
                                                    <option value="Assembling">Assembling</option>
                                                    <option value="Stockfit">Stockfit</option>
                                                    <option value="Offline">Offline</option>
                                            </select>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('area') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Image <small style="color: red"><i>TOS/SWCS</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg">

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Image <small style="color: red"><i>SWS / MMC</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image_sws" id="image_sws" accept="image/x-png,image/gif,image/jpeg">

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image_sws') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Uploade Video Process <small style="color: red"><i>*required</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="video" id="video" accept="video/mp4,video/x-m4v,video/*" required>

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('video') }}</i></b></p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image Machine 1</label>
                                                    <div class="input-group">
                                                            <input type="file" name="i_machine_1" id="i_machine_1" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('i_machine_1') }}</i></b></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image Machine 2</label>
                                                    <div class="input-group">
                                                        <input type="file" name="i_machine_2" id="i_machine_2" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('i_machine_2') }}</i></b></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image Machine 3</label>
                                                    <div class="input-group">
                                                        <input type="file" name="i_machine_3" id="i_machine_3" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('i_machine_3') }}</i></b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Spec Machine 1</label>
                                                    <div class="input-group">
                                                        <input type="file" name="s_machine_1" id="s_machine_1" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('s_machine_1') }}</i></b></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Spec Machine 2</label>
                                                    <div class="input-group">
                                                        <input type="file" name="s_machine_2" id="s_machine_2" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('s_machine_2') }}</i></b></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Spec Machine 3</label>
                                                    <div class="input-group">
                                                        <input type="file" name="s_machine_3" id="s_machine_3" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('s_machine_3') }}</i></b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-4">
                                                    <button type="Submit" class="btn btn-primary btn-block" id="Save">Save</button>
                                                </div>  
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-secondary btn-block" id="Close" data-dismiss="modal">Close</button>
                                                    <button type="button" style="display:none;" id="ButtonClose" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
                                                </div>  
                                                <div class="col-4">
                                                    <img id="loading" style="visibility: hidden;" src="/dist/img/ajax-loader.gif"/>
                                                </div>  
                                            </div>
                                        </div>
                                        <br />
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                0%
                                            </div>
                                        </div>
                                        <br />
                                        <div id="success">
                                        </div>
                                        <br />
                                    </div>
                                </div>
                                <!-- /.card -->
                            </form>
                            
                        </div>
                </div>
            </div>
        </div>
        {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
        <script>
            $(document).ready(function(){

                function fetch_cutting(query = '')
                {
                    $.ajax({
                    url:"{{ route('ie_base.live_search.action_cutting') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#cutting').html(data.table_data);
                        $('#total_records_cutting').text(data.total_data);
                    }
                    })
                }
                fetch_sewing();
                function fetch_sewing(query = '')
                {
                    $.ajax({
                    url:"{{ route('ie_base.live_search.action_sewing') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#sewing').html(data.table_data);
                        $('#total_records_sewing').text(data.total_data);
                    }
                    })
                }
                fetch_assembling();
                function fetch_assembling(query = '')
                {
                    $.ajax({
                    url:"{{ route('ie_base.live_search.action_assembling') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#assembling').html(data.table_data);
                        $('#total_records_assembling').text(data.total_data);
                    }
                    })
                }
                fetch_stockfit();
                function fetch_stockfit(query = '')
                {
                    $.ajax({
                    url:"{{ route('ie_base.live_search.action_stockfit') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#stockfit').html(data.table_data);
                        $('#total_records_stockfit').text(data.total_data);
                    }
                    })
                }
                fetch_offline();
                function fetch_offline(query = '')
                {
                    $.ajax({
                    url:"{{ route('ie_base.live_search.action_offline') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#offline').html(data.table_data);
                        $('#total_records_offline').text(data.total_data);
                    }
                    })
                }

                $(document).on('keyup', '#search_cutting', function(){
                    var query = $(this).val();
                    fetch_cutting(query);
                });
                $(document).on('keyup', '#search_sewing', function(){
                    var query = $(this).val();
                    fetch_sewing(query);
                });
                $(document).on('keyup', '#search_assembling', function(){
                    var query = $(this).val();
                    fetch_assembling(query);
                });
                $(document).on('keyup', '#search_stockfit', function(){
                    var query = $(this).val();
                    fetch_stockfit(query);
                });
                $(document).on('keyup', '#search_offline', function(){
                    var query = $(this).val();
                    fetch_offline(query);
                });
            });
        </script>
        {{-- save action  --}}
           <script>
                $(document).ready(function(){

                     $('#formInput').on('submit', function(event){
                        event.preventDefault();
                        
                        $.ajax({
                            url:"{{ route('ie_base.save') }}",
                            method:"POST",
                            data:new FormData(this),
                            dataType:'JSON',
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend:function(){
                                $('#success').empty();
                                document.getElementById("loading").style.visibility = "visible";
                                document.getElementById("Save").disabled = true;
                                document.getElementById("Close").disabled = true;
                            },
                            uploadProgress:function(event, position, total, percentComplete)
                            {
                                $('.progress-bar').text(percentComplete + '%');
                                $('.progress-bar').css('width', percentComplete + '%');
                            },
                            success:function(data)
                            {
                                if(data.errors)
                                {
                                    $('.progress-bar').text('0%');
                                    $('.progress-bar').css('width', '0%');
                                    $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
                                    document.getElementById("loading").style.visibility = "hidden";
                                    document.getElementById("Save").disabled = false;
                                    document.getElementById("Close").disabled = false;
                                }
                                if(data.success)
                                {
                                    $('.progress-bar').text('Uploaded');
                                    $('.progress-bar').css('width', '100%');
                                    $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
                                    document.getElementById("loading").style.visibility = "hidden";
                                    document.getElementById("Save").disabled = false;
                                    document.getElementById("Close").disabled = false;
                                    document.getElementById("formInput").reset();
                                    $('#Close').hide();
                                    $('#ButtonClose').show();
                                }
                            }
                        })
                     });
                    $('#ButtonClose').on('click',function(){
                        window.location.reload();
                    });
                });
                
            </script>


    </section>
    <!-- /.content -->
@endsection


@section('footer')

