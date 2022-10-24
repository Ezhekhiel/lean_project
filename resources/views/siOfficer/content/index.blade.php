@extends('siOfficer.layouts.app')

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
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title"><i>DAILY SCHEDULE INSPECTIONE</i></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    {{-- notifikasi form validasi --}}
                    @if ($errors->has('file'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
            
                    {{-- notifikasi sukses --}}
                    @if ($sukses = Session::get('sukses'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $sukses }}</strong>
                        </div>
                    @endif
                    <div class="container mt-5" id="alert_success" style="display: none">
                        <div class="alert alert-success">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                           <span class="alert-body">
                             <h4 class="alert-header">Success Update</h4>
                           </span>
                        </div>
                      </div>
                    <!-- /.card-header -->
                    <!-- .card-Body -->
                    <div class="card-body">
                        <div class="card-group">
                            <div class="card p-2">
                                <form method="post" action="/SI_/upload" id="form_upload"  class="was-validated" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-row align-items-center">
                                        <div class="col-sm-11 my-1">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="importExcel" name="file" aria-describedby="emailHelp" placeholder="Import Excel" accept=".pdf, .xls, .xlsx" required>
                                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            </div>
                                        </div>
                                        <div class="col-auto my-1">
                                            {{-- <span class="fa-stack fa-1x" style="color:rgb(18, 204, 95)">
                                              <i class="fas fa-square fa-stack-2x"></i>
                                              <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
                                            </span> --}}
                                            <button class="btn btn-primary" type="submit">upload</button>
                                        </div>
                                      </div>
                                </form>
                            </div>
                            <div class="card text-center">
                                <div class="card-header" style="font-size: 25px;font-weight:bold">Pengaturan <i>Import</i></div>
                                <div class="card-body">
                                    <a>- Pastikan tidak ada header di file Excel</a><br>
                                    <a>- Ganti nomor menjadi week</a><br>
                                    <a>- Hapus Total pada baris paling bawah</a><br>
                                    <a>- Pastikan tidak ada column <b style="color: red">*null</b></a>
                                </div>
                            </div>
                        </div>
                        <div class="row p-3">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Month</label>
                                    <select name="Smonth" id="Smonth" class="form-control">
                                        <option value="">Pilih Bulan</option>
                                        @foreach ($exp as $key => $item)
                                           <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Month</label>
                                    <select name="sExp" id="sExp" class="form-control">
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Search PO</label>
                                    <input type="text" placeholder="Search PO" class="form-control" id="searchAll" disabled>
                                    <input type="hidden" id="week_bulan" name="week_bulan">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-header col-12 text-center">
                                <h2>SHIPMENT PLAN</a></h2>
                            </div>
                            <div class="card-body">
                                <div style="overflow-x:auto;">
                                    <table class="table">
                                        <thead class="table-primary">
                                            <tr>
                                                <th style="vertical-align:middle;text-align:center">No</th>
                                                <th style="vertical-align:middle;text-align:center">Exp or Act XFD</th>
                                                <th style="vertical-align:middle;text-align:center">Cell</th>
                                                <th style="vertical-align:middle;text-align:center">PO No.</th>
                                                <th style="vertical-align:middle;text-align:center">Market</th>
                                                <th style="vertical-align:middle;text-align:center">Style / Part No.</th>
                                                <th style="vertical-align:middle;text-align:center">Color / Width</th>
                                                <th style="vertical-align:middle;text-align:center">Quantity</th>
                                                <th style="vertical-align:middle;text-align:center">Balance</th>
                                                <th style="vertical-align:middle;text-align:center" colspan="3">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="resultShipment"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
        <!-- /.row (main row) -->
        <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Input Inspection</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post" action="#" id="inputInspection" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <h3>Po Nomer : <a id="modal_po"></a></h3><br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity Inspection</label>
                            <input type="number" class="form-control" id="quantityInspection" name="quantityInspection" aria-describedby="quantityHelp" placeholder="Enter Quantity">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select name="statusInspection" id="statusInspection" class="form-control">
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="modal_balance" name="modal_balance">
                    <input type="hidden" id="modal_id" name="modal_id">
                    <input type="hidden" id="modal_week" name="modal_week">
                    <input type="hidden" id="modal_bulan" name="modal_bulan">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
</section>
    <style>
        .hide{
            display:none;
        }
        .input_kecil{
            height:25px;
            width:87px;
            margin-left:10px;
            margin-bottom:2px;
            font-size:14px
        }
    </style>
@endsection


@section('footer')

