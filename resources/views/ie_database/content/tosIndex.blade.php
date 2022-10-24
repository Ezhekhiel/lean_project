@extends('ie_database.layouts.app_ie_database')

@section('head','navbar','sidebar')

@section('contentheader')

<div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
@endsection
<style>
    body{
        font-size: 2vmin;
    }
    .inputSmall{
        width: 60px;
    }
    /* @media print {
        .noPrint{
            display:none;
        }
    } */
</style>

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
                        <div class="card-header border-transparent"><!-- .card-header -->
                            <h3 class="card-title">IE Database DATA</h3>
                        </div> <!-- /.card-header -->
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
                    </div>
                    <div class="card noPrint">
                        <div class="card-header border-transparent"><!-- .card-head -->
                            <h1 id="styledong"></h1>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row"> 
                                        <select class="form-control col-6" id="search">
                                            <option>Select Style</option>
                                            @foreach ($style as $styles)
                                                <option value="{{ $styles->style }}">{{ $styles->style }}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-control col-6 selectProcess" id="search_process">
                                            <option>Select Process</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-outline-secondary" data-toggle="modal"  data-target="#addData"><i class="fas fa-marker nav-icon"></i></button>
                                    <button class="btn btn-outline-secondary printPDF"><i class="fas fa-print nav-icon"></i></button>
                                    <button class="btn btn-outline-secondary" data-toggle="modal" data-target="#openMedia"><i class="fas fa-film nav-icon"></i></button>
                                </div>
                            </div>
                        </div><!-- /.card-head -->
                    </div>
                    <div class="card outputPrint">
                        <div class="card-body" style="font-family: 'Century Gothic'">
                            <form method="POST" name="formUpdateTOS" id="formUpdateTOS" action="" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <h2>Time Observation Sheet</h2> 
                                <button type="submit" class="btn btn-primary btn-block float-right mt-2 mb-4" style="display:none;" id="buttonSaveUpdateTOS">Save Update</button>
                                <div class="table-responsive">
                                    <table class="table table-bordered border-dark" style="text-align: center;margin-bottom: 0px;">
                                        <thead>
                                            <tr>
                                                <th class="h6 align-middle" style="width: 23.53%" colspan="2">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <strong>Process: </strong>
                                                        </div>
                                                        <div class="col-10">
                                                            <a id="hProcess">-</a>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th class="h6 align-middle" style="width: 8.82%" rowspan="2"><strong>Operation</strong></th>
                                                <th class="h6 align-middle" style="width: 35.29%;  text-transform: uppercase;" rowspan="2" colspan="7">
                                                    <strong>
                                                        <a id="hArea">-</a>
                                                    </strong>
                                                </th>
                                                <th class="h6 align-middle" style="width: 16.18%" rowspan="2" colspan="2">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <strong>Observer : </strong>
                                                        </div>
                                                        <div class="col-8">
                                                            <a id="hObserver">-</a>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th class="h6 align-middle" style="width: 16.18%" rowspan="2" colspan="2"><strong>Date : <a id="hDate">-</a></strong></th>
                                            </tr>
                                            <tr>
                                                <th class="h6 align-middle">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <strong>Style: </strong>
                                                        </div>
                                                        <div class="col-8">
                                                            <a id="hStyle">-</a>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th class="h6 align-middle">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <strong>Gender: </strong>
                                                        </div>
                                                        <div class="col-8">
                                                            <a id="hGender">-</a>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <table class="table table-bordered" style="text-align: center;">
                                        <thead>
                                            <tr>
                                                <th class="h6 align-middle" style="width: 2.94%" rowspan="2"><strong>No.</strong></th>
                                                <th class="h6 align-middle" style="width: 29.41%" rowspan="2"><strong>Elements</strong></th>
                                                <th class="h6 align-middle" style="width: 35.29%" colspan="7"><strong>Time Study</strong></th>
                                                <th class="h6 align-middle" style="width: 11.77%"><strong>Element Time</strong></th>
                                                <th class="h6 align-middle" style="width: 20.59%" rowspan="2"><strong>Point Observered</strong></th>
                                            </tr>
                                            <tr>
                                                <th class="h6 align-middle"><strong>1</strong></th>
                                                <th class="h6 align-middle"><strong>2</strong></th>
                                                <th class="h6 align-middle"><strong>3</strong></th>
                                                <th class="h6 align-middle"><strong>4</strong></th>
                                                <th class="h6 align-middle"><strong>5</strong></th>
                                                <th class="h6 align-middle" style="background-color: rgb(255, 255, 0)"><strong>Avg</strong></th>
                                                <th class="h6 align-middle" style="background-color: rgb(0, 176, 240)"><strong>Best Practice</strong></th>
                                                <th class="h6 align-middle"><strong>NVA, VA, NVAN</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody class="tableData">
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-bordered" style="text-align: center;">
                                                <tr>
                                                    <th style="width: 65">Cycle Time</th>
                                                    <th style="width: 35%"class="ct_summary"></th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 65%">Best Practice</th>
                                                    <th style="width: 35%" class="bp_summary"></th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 65%">Cycle Time + Allowance 15%</th>
                                                    <th style="width: 35%" class="ctAllowance"></th>
                                                </tr>
                                                <tr>
                                                    <th style="width: 65%">Capacity / Hour</th>
                                                    <th style="width: 35%" class="capacityHour"></th>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                            <div class="card-header text-center">
                                                <h4><b>Run Charts</b></h4>
                                            </div>
                                            <div id="stackedBar" style="height: 20vh">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card-header text-center">
                                                <h4><b>VA Ratio</b></h4>
                                            </div>
                                            <div id="pieChart_vaRatio" style="position: static;height:40vh;"></div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card-header text-center">
                                                <h4><b>Value Ratio</b></h4>
                                            </div>
                                            <div id="pieChart_valueRatio" style="position: static;height:40vh;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- /.card -->
                </section>
            <!-- /.Left col -->
            <!-- right col -->
            </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    <!-- Modal -->
        <div class="modal fade" id="openMedia" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Open Video <a id="styleVideo"></a></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="stopVideo">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="embed-responsive embed-responsive-16by9" id="openVideo"controls>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" type="button" value="stop" id="stopBtn" />
                </div>
            </div>
            </div>
        </div>
    {{-- Modal Input TOS --}}
        <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 90% !important;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                            <h3 class="font-weight-bold">TIME OBSERVATION SHEET (TOS)</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" name="formInputTOS" id="formInputTOS" action="#" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="modal-body">
                        {{-- video dan table --}}
                        <div class="row">
                            <div class="col-4 card">
                                <div class="card-body form-group">
                                    <label for="formFileSm" class="form-label">Search Video</label>
                                    <input class="form-control form-control-sm" onchange="filledInput('input-tag')" name="video" accept="video/*" id="input-tag" type="file">
                                    <a style="color: red; font-size:25px; margin-top:10px; font-style: italic; font-weight: bold;">Gunakan video dengan standar process</a>
                                    <video controls id="video-tag" style="width: 100%;height: auto;">
                                        <source id="video-source" src="#">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2" style="margin-right: 5px">
                                            <div class="card controls">
                                                <button type="button" class="btn btn-primary btn-sm" onclick="pause()"><i class="fa fa-play"></i><i class="fa fa-pause"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="stop()"><i class="fa fa-stop"></i></button>
                                            </div>
                                            <center>
                                                <div class="card stopwatch" id="fTime">
                                                    <div class="display text-center">
                                                        <a class="stopwatch">00:00:00</a>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                        <div class="card form-group col-2 pt-2"  style="margin-right: 5px">
                                            <label for="exampleInputLamaDowntime"><center>CT</center></label>
                                            <input type="text" class="form-control stopwatch2" id="stopwatch2" disabled>
                                        </div>
                                        <div class="card form-group col-3" style="margin-right: 5px">
                                            <label for="exampleInputLamaDowntime">No. Process</label>
                                            <div class="row">
                                                <div class="col-6 mt-2">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Input No.Process" id="countProcess" name="countProcess">
                                                </div>
                                                <div class="col-6 mt-2">
                                                    <center>
                                                        <button type="button" class="btn btn-primary btn-block btn-sm"onclick="SpliTos()" id="buttonSplit">Split</button>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-2" style="margin-right: 5px">
                                            <div class="row">
                                                <div class="col-12 pt-2">
                                                    <label for="exampleInputLamaDowntime"><center>Process Unit</center></label>
                                                    <select name="process_unit" class="form-control form-control-sm col-12" id="process_unit">
                                                        <option value="prs">Prs</option>
                                                        <option value="pcs">Pcs</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card col-2" style="margin-right: 5px">
                                            <div class="row">
                                                <div class="col-12 pt-4">
                                                    <button type="button" onclick="resetFormInput()" class="btn btn-primary btn-block">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-bordered" style="text-align: center;margin-bottom:5px;">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle" style="width: 23.41%;font-size: 15px;" colspan="2"><strong>Process: <a id="hProcess"></a></strong><input type="text" name="process" id="process" class="form-control form-control-sm" onchange="filledInput('process')"></th>
                                                        <th class="align-middle" style="width: 8.94%;  font-size: 15px;" rowspan="2"><strong>Operation</strong></th>
                                                        <th class="align-middle" style="width: 39.29%; font-size: 15px; text-transform: uppercase;" rowspan="2" colspan="7">
                                                            <strong>
                                                                <select name="area" class="form-control form-control-sm" id="area" onchange="filledInput('area')">
                                                                    <option value="--select area--">--Select Area--</option>
                                                                @foreach ($cell as $item)
                                                                    <option value="{{ $item->location }}">{{ $item->location }}</option>
                                                                @endforeach
                                                                </select>
                                                            </strong>
                                                        </th>
                                                        <th class="align-middle" style="width: 14.18%; font-size: 15px;" rowspan="2" colspan="2"><strong>Observer : <input type="text" class="form-control form-control-sm" name="observer" id="observer" onchange="filledInput('observer')"></strong></th>
                                                        <th class="align-middle" style="width: 14.18%; font-size: 15px;" rowspan="2" colspan="2"><strong>Date : <a id="hDate">{{ date("Y-m-d") }}</a></strong></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle" style="font-size: 12px;"><strong>Style: </strong> <input type="text" class="form-control form-control-sm" name="style" id="style" onchange="filledInput('style')"></th>
                                                        <th class="align-middle" style="font-size: 12px;"><strong>Gender: </strong> <input type="text" class="form-control form-control-sm" name="gender" id="gender" onchange="filledInput('gender')"></th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <div class="" style="max-height: 600px; overflow: auto;">
                                                <table class="table table-bordered" style="text-align: center; margin-bottom:0px;">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle" style="font-size: 11px; width: 2.94%" rowspan="2"><strong>No.</strong></th>
                                                            <th class="align-middle" style="font-size: 11px; width: 19.91%" rowspan="2"><strong>Elements</strong></th>
                                                            <th class="align-middle" style="font-size: 11px; width: 48.79%" colspan="7"><strong>Time Study</strong></th>
                                                            <th class="align-middle" style="font-size: 11px; width: 9.77%"><strong>Element Time</strong></th>
                                                            <th class="align-middle" style="font-size: 11px; width: 18.59%" rowspan="2"><strong>Point Observered</strong></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="align-middle" style="font-size: 12px; width: 5.88%"><strong>1</strong></th>
                                                            <th class="align-middle" style="font-size: 12px; width: 5.88%"><strong>2</strong></th>
                                                            <th class="align-middle" style="font-size: 12px; width: 5.88%"><strong>3</strong></th>
                                                            <th class="align-middle" style="font-size: 12px; width: 5.88%"><strong>4</strong></th>
                                                            <th class="align-middle" style="font-size: 12px; width: 5.88%"><strong>5</strong></th>
                                                            <th class="align-middle" style="background-color: rgb(255, 255, 0);font-size: 12px; width: 5.88%"><strong>Avg(MS)</strong></th>
                                                            <th class="align-middle" style="background-color: rgb(0, 176, 240);font-size: 12px; width: 13.01%"><strong>Best Practice(MS)</strong></th>
                                                            <th class="align-middle" style="font-size: 12px;"><strong>NVA, VA, NVAN</strong></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="" style="max-height: 300px; overflow: auto;">
                                                <table class="table table-bordered" style="text-align: center;" id="TableTos">
                                                    <tbody style="font-size:12px; text-align: center;" id="tableTOS">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 card">
                                <div class="row">
                                    <div class="col-12 card-body">
                                        <table class="table table-bordered" style="text-align: center;">
                                            <tr>
                                                <th style="width: 65">Cycle Time</th>
                                                <th style="width: 35%"><input type="text" class="form-control" name="CTSummary" id="CTSummary" value="" readonly></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 65%">Best Practice</th>
                                                <th style="width: 35%"><input type="text" class="form-control" name="sumBP" id="sumBP" value="" readonly></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 65%">Cycle Time + Allowance 15%</th>
                                                <th style="width: 35%"><input type="text" class="form-control" name="CTAllowance" id="CTAllowance" value="" readonly></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 65%">Capacity / Hour</th>
                                                <th style="width: 35%"><input type="text" class="form-control" name="CapaPerHour" id="CapaPerHour" value="" readonly></th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 card">
                                <div class="row">
                                    <div class="col-12 card-body">
                                        <table class="table table-bordered table-sm" style="text-align: center;">
                                            <tr>
                                                <th style="width: 65%">Total Time Study 1</th>
                                                <th style="width: 35%"><input type="text" class="form-control" name="tt1" id="idt1" value="" readonly></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 65%">Total Time Study 2</th>
                                                <th style="width: 35%"><input type="text" class="form-control" name="tt2" id="idt2" value="" readonly></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 65%">Total Time Study 3</th>
                                                <th style="width: 35%"><input type="text" class="form-control" name="tt3" id="idt3" value="" readonly></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 65%">Total Time Study 4</th>
                                                <th style="width: 35%"><input type="text" class="form-control" name="tt4" id="idt4" value="" readonly></th>
                                            </tr>
                                            <tr>
                                                <th style="width: 65%">Total Time Study 5</th>
                                                <th style="width: 35%"><input type="text" class="form-control" name="tt5" id="idt5" value="" readonly></th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="row">
                                    <div class="col-12 card-body">
                                        <table class="table table-sm table-striped table-bordered" style="text-align: center; margin-bottom:5px">
                                            <thead class="thead-dark">
                                                <th>No</th>
                                                <th>Keyword</th>
                                                <th>Function</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>P/p</td>
                                                    <td>Play/Pause</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Space</td>
                                                    <td>Split</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>S/s</td>
                                                    <td>Stop</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>R/r</td>
                                                    <td>Reset</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-sm table-striped table-bordered" style="text-align: center;">
                                            <thead class="thead-dark">
                                                <th>Rules Keyword</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Make sure the pointer is not in the textbox</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-warning" onclick="reload()" data-dismiss="modal">Show Data</button>
                                <button type="Submit" class="btn btn-primary">Save</button>
                                
                            </div>
                            <div class="col-8">
                                <img id="loading" style="visibility: hidden;" src="/dist/img/ajax-loader.gif"/>
                            </div>  
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-12">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        0%
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div id="success">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    
{{-- //Modal Preview --}}
    <!-- /.content -->
    <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/jquery.min.js') }}"></script>
    <script>
        const videoSrc = document.querySelector("#video-source");
        const videoTag = document.querySelector("#video-tag");
        const inputTag = document.querySelector("#input-tag");

        inputTag.addEventListener('change',  readVideo)

        function readVideo(event) {
        if (event.target.files && event.target.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            console.log('loaded')
            videoSrc.src = e.target.result
            videoTag.load()
            }.bind(this)
                reader.readAsDataURL(event.target.files[0]);
            }
        }
        $(document).ready(function(){
            $(document).on('change', '#search', function(){
                var style = $(this).val();
                $.ajax({
                url:"{{ route('ie_base.live_search.tos.search') }}",
                method:'GET',
                data:{style:style},
                dataType:'json',
                    success:function(data)
                    {
                        // console.log(data.databasepie);
                        $('.tableData').html(data.table_data);
                        $('.selectProcess').html(data.selectProcess);
                        $('.ct_summary').html(data.ct);
                        $('.bp_summary').html(data.bp);
                        $('.ctAllowance').html(data.ct_standar);
                        $('.capacityHour').html(data.capacity);
                        $('#hProcess').html('<input type="text" value="'+data.hProcess+'" onClick="openFormEditTOS()" id="showProcess" name="process" class="form-control">');
                        $('#hStyle').html('<input type="text" value="'+data.hStyle+'" onClick="openFormEditTOS()" id="showStyle" name="style" class="form-control">');
                        $('#hGender').html('<input type="text" value="'+data.hGender+'" onClick="openFormEditTOS()" id="showGender" name="gender" class="form-control">');
                        $('#hObserver').html('<input type="text" value="'+data.hObserver+'" onClick="openFormEditTOS()" id="showObserver" name="observer" class="form-control">');
                        $('#hDate').html(data.hDate);
                        $('#hArea').html('<input type="text" value="'+data.hArea+'" onClick="openFormEditTOS()" id="showArea" name="value" class="form-control">');
                        $('#openVideo').html(data.openVideo);
                        $('#styleVideo').html(data.styleVideo);
                        pieChartVaRatio(data.pieChartVaRatio,data.pieChartVaRatioColor);
                        pieChartValueRatio(data.pieChartValueRatio,data.pieChartVaRatioColor);
                        stackedData(data.stackedData,data.stackedDataSeries_field,data.stackedDataSeries_percentage,data.stackedDataSeries_color,data.stackedDataSeries_fontColor);
                        enableReadonly();
                    }
                 })
            });
            $(document).on('change', '#search_process', function(){
                var process = $(this).val();
                var style = document.getElementById('search').value;
                $.ajax({
                url:"{{ route('ie_base.live_search.tos.searchProcess') }}",
                method:'GET',
                data:{process:process,style:style},
                dataType:'json',
                    success:function(data)
                    {
                        $('.tableData').html(data.table_data);
                        $('.ct_summary').html(data.ct);
                        $('.bp_summary').html(data.bp);
                        $('.ctAllowance').html(data.ct_standar);
                        $('.capacityHour').html(data.capacity);
                        $('#hProcess').html('<input type="text" value="'+data.hProcess+'" onClick="openFormEditTOS()" id="showProcess" name="process" class="form-control">');
                        $('#hStyle').html('<input type="text" value="'+data.hStyle+'" onClick="openFormEditTOS()" id="showStyle" name="style" class="form-control">');
                        $('#hGender').html('<input type="text" value="'+data.hGender+'" onClick="openFormEditTOS()" id="showGender" name="gender" class="form-control">');
                        $('#hObserver').html('<input type="text" value="'+data.hObserver+'" onClick="openFormEditTOS()" id="showObserver" name="observer" class="form-control">');
                        $('#hDate').html(data.hDate);
                        $('#hArea').html('<input type="text" value="'+data.hArea+'" onClick="openFormEditTOS()" id="showArea" name="value" class="form-control">');
                        $('#openVideo').html(data.openVideo);
                        pieChartVaRatio(data.pieChartVaRatio,data.pieChartVaRatioColor);
                        pieChartValueRatio(data.pieChartValueRatio,data.pieChartVaRatioColor);
                        stackedData(data.stackedData,data.stackedDataSeries_field,data.stackedDataSeries_percentage,data.stackedDataSeries_color,data.stackedDataSeries_fontColor);
                        enableReadonly();
                    }
                 })
            });
            $(".printPDF").click(function(e){
                e.preventDefault();
                var style=$("#showProcess").val();
                var process=$("#showStyle").val();
                if (style=="-") {
                    alert("You must select Style first!")
                }else{
                    $.ajax({
                        type:'POST',
                        url:"{{ route('ie_base.tos.index.print_pdf') }}",
                        data:{"_token": "{{ csrf_token() }}",style:style, process:process},
                        success:function(data){
                            alert(data.success);
                        }
                    });
                }
            });
        });
        function enableReadonly()
        {
            document.getElementById("showProcess").readOnly = true;
            document.getElementById("showStyle").readOnly = true;
            document.getElementById("showGender").readOnly = true;
            document.getElementById("showArea").readOnly = true;
            document.getElementById("showObserver").readOnly = true;
            $('.tdElement').attr('readonly', true);
            $('.tdValue').attr('readonly', true);
            $('.tdPointObserver').attr('readonly', true);
        }
        function openFormEditTOS()
        {
            if (confirm('Are you sure want to Update it?')) {
                var showProcess = document.getElementById("showProcess");
                var showStyle = document.getElementById("showStyle");
                var showGender = document.getElementById("showGender");
                var showObserver = document.getElementById("showObserver");

                showProcess.readOnly=false;
                showStyle.readOnly=false;
                showGender.readOnly=false;
                showObserver.readOnly=false;

                showProcess.setAttribute('onclick',  '');
                showStyle.setAttribute('onclick',  '');
                showGender.setAttribute('onclick',  '');
                showObserver.setAttribute('onclick',  '');

                $('.tdElement').attr('readonly', false);
                $('.tdValue').attr('readonly', false);
                $('.tdPointObserver').attr('readonly', false);

                $('.tdElement').attr('onclick', '');
                $('.tdValue').attr('onclick', '');
                $('.tdPointObserver').attr('onclick', '');

                $.ajax({
                    url:"{{ route('ie_base.live_search.optionArea') }}",
                    method:'GET',
                    dataType:'json',
                        success:function(data)
                        {
                            $('#hArea').html(data.dataLocation);
                        }
                 })
                 // show button save
                 var x = document.getElementById("buttonSaveUpdateTOS");
                 x.style.display = "block";
            } else {
                // Do nothing!
            }
        }
    </script>
    <script>
        function stackedData(stackedData, stackedDataSeries_field,stackedDataSeries_percentage,stackedDataSeries_color,stackedDataSeries_fontColor)
        {
            am4core.ready(function() {
            
                // Themes begin
                am4core.useTheme(am4themes_animated);
                // Themes end
                
                // Create chart instance
                var chart = am4core.create("stackedBar", am4charts.XYChart);
                chart.data = stackedData
                chart.responsive.enabled = true;
                // chart.legend = new am4charts.Legend();
                // chart.legend.position = "bottom";
                // chart.legend.fontSize=14;
                // chart.dispose();
                // Create axes
                var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
                categoryAxis.dataFields.category = "unit";
                categoryAxis.renderer.grid.template.opacity = 0;
                
                var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
                valueAxis.min = 0;
                valueAxis.renderer.grid.template.opacity = 0;
                valueAxis.renderer.ticks.template.strokeOpacity = 0.5;
                valueAxis.renderer.ticks.template.stroke = am4core.color("#495C43");
                valueAxis.renderer.ticks.template.length = 10;
                valueAxis.renderer.line.strokeOpacity = 0.5;
                valueAxis.renderer.baseGrid.disabled = true;
                valueAxis.renderer.minGridDistance = 40;
                valueAxis.fontSize=10;
                
                    // Create series
                    function createSeries(field,percents, color,fontColor) {
                        var series = chart.series.push(new am4charts.ColumnSeries());
                        series.dataFields.valueX = field;
                        series.dataFields.categoryY = "unit";
                        series.stacked = true;
                        // series.name=field;
                        series.columns.template.height = am4core.percent(100);
                        series.sequencedInterpolation = true;
                        series.columns.template.fill = color;
                        series.columns.template.stroke = am4core.color("#fff");
                        series.calculatePercent = true;
                        series.columns.template.hoverOnFocus = true;
                        series.columns.template.tooltipText = field;
                        series.tooltip.getFillFromObject = true;
                        series.tooltip.label.propertyFields.fill = "color";
                        series.tooltip.background.propertyFields.stroke = "color";
                        
                        // series.columns.template.fill = am4core.color("#00ff00"); // green fill

                        var labelBullet = series.bullets.push(new am4charts.LabelBullet());
                        labelBullet.locationX = 0.5;
                        labelBullet.label.text = "{valueX}("+percents+"%)";
                        labelBullet.label.fill = fontColor;
                        labelBullet.label.fontSize=12;
                    }
                    for (let index = 0; index < stackedDataSeries_field.length; index++) {
                        createSeries(stackedDataSeries_field[index],stackedDataSeries_percentage[index],stackedDataSeries_color[index],stackedDataSeries_fontColor[index]);
                    }
            }); // end am4core.ready()
        }
    </script>
    <script>
        function pieChartVaRatio(pieChartVaRatio,pieChartVaRatioColor)
        {
            am4core.ready(function() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end
            var chart = am4core.create("pieChart_vaRatio", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
            chart.data = pieChartVaRatio
            // chart.dispose();
            var colorSet = new am4core.ColorSet();
                colorSet.list = pieChartVaRatioColor.map(function(color) {
                return new am4core.color(color);
            });
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "countValue";
            series.dataFields.category = "valueChart";
            series.ticks.template.disabled = true;
            series.alignLabels = false;
            series.colors = colorSet;
            series.labels.template.text = "{category} - {value}";
            series.labels.template.radius = am4core.percent(-40);
            series.labels.template.fill = am4core.color("black");
            }
            );
        }
    </script>
     <script>
        function pieChartValueRatio(pieChartValueRatio,pieChartVaRatioColor)
        {
            am4core.ready(function() {
            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end
            var chart = am4core.create("pieChart_valueRatio", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
            // chart.dispose();
            chart.data = pieChartValueRatio
            var colorSet = new am4core.ColorSet();
                colorSet.list = pieChartVaRatioColor.map(function(color) {
                return new am4core.color(color);
            });
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "sumValue";
            series.dataFields.category = "valueChart";
            series.ticks.template.disabled = true;
            series.alignLabels = false;
            series.colors = colorSet;
            series.labels.template.text = "{category} - {value}";
            series.labels.template.radius = am4core.percent(-40);
            series.labels.template.fill = am4core.color("black");
            }); // end am4core.ready()
        }
    </script>
    

@endsection


@section('footer')

