@extends('layouts.app_ie_database')

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
                                                <div class="col-md-4 col-12">
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
                                                <div class="col-md-4 COL-12">
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
                                                <div class="col-md-4 col-12">
                                                    <!-- small box -->
                                                    <div class="small-box bg-warning">
                                                        <div class="inner">
                                                            <h1><b>Assembling</b></h1>

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
                                                            <h1><b>Stockfit</b></h3>

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
                                                            <h1><b>Offline</b></h3>

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

    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
    <script>
        $(document).ready(function(){

            fetch_cutting();

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
    </section>
    <!-- /.content -->
@endsection


@section('footer')

