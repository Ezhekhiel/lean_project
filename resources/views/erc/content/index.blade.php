@extends('erc.layouts.app')

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

                  PT. Parkland World Indonesia
                </h3>
                <div class="container mt-5" id="alert_success" style="display: none">
                    <div class="alert alert-success" role="alert">
                       <span class="alert-body">
                         <h4 class="alert-header alertSuccess"></h4>
                       </span>
                    </div>
                </div>
                <div class="container mt-5" id="alert_error" style="display: none">
                    <div class="alert alert-danger" role="alert">
                       <span class="alert-body">
                         <h4 class="alert-header alertError"></h4>
                       </span>
                    </div>
                </div>
              </div><!-- /.card-header -->
              <!-- .card-Body -->
                <div class="card-body">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#AddModal">Add Data</button>
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="card-body p-0">
                                <div style="width: 95%">
                                    <canvas id="chart_progress"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    {{-- modal tambah --}}
        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold" id="exampleModalLabel">ERC INPUT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert" id="message" style="display: none"></div>
                <form method="post" action="#" id="formInput" name="formInput" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h6 class="modal-title font-weight-bold">Form Input Data ERC</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card">
                                                <div class="form-group">
                                                    <label for="date">Date</label>
                                                    <input type="month" class="form-control" name="date" id="date" placeholder="Enter Date">
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="target_mp">Target MP</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">$</div>
                                                                    <input type="number" class="form-control" name="target_mp" id="target_mp">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="saving_mp">Saving MP</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">$</div>
                                                                    <input type="number" class="form-control" name="saving_mp" id="saving_mp">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="saving_cost">Total Saving Cost</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">$</div>
                                                                    <input type="number" class="form-control" name="saving_cost" id="saving_cost">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="cum_saving">Cumulative Saving Cost</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text">$</div>
                                                                    <input type="number" class="form-control" name="cum_saving" id="cum_saving">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="target_pdp">Target PDP</label>
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend col-12">
                                                            <div class="input-group-text">$</div>
                                                            <input type="number" class="form-control" name="target_pdp" id="target_pdp" value="{{$last_target_pdp}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button type="Submit" class="btn btn-primary btn-block" id="Save">Save</button>
                                            </div>  
                                            <div class="col-md-4">
                                                <button type="button" style="display:none;" id="ButtonClose" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-secondary" id="Close" data-dismiss="modal">Close</button>
                                            </div><br>
                                            <div class="col-md-4">
                                                <img id="loading" style="visibility: hidden;" src="/dist/img/ajax-loader.gif"/>
                                            </div>  
                                        </div>
                                        <div class="row" style="padding-top:10px">
                                            <div class="col-md-12">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                        0%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div id="success"></div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </form>
                </div>
            </div>
        </div>
    {{-- /modal tambah --}}
@endsection
@include('erc.scripts.function')
@section('footer')

