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
                        <h3 class="card-title">DAILY SCHEDULE INSPECTIONE</h3>
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
                        <div class="row p-3">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Week</label>
                                    <select name="tWeek" id="tWeek" class="form-control">
                                        <option value="">Pilih Week</option>
                                        @foreach ($dataWeek as $key => $item)
                                            <optgroup label="{{ $key }}">
                                                @foreach ($item as $a)
                                                    <option value="{{ $key.'/'.$a }}">{{$a}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-header col-12 text-center">
                                <h2>SHIPMENT PLAN WEEK - <a id="title_week"></a> - <a id="title_bulan"></a></h2>
                            </div>
                            <div class="card-body" style="overflow-x:auto;">
                                    <table class="table">
                                        <thead class="table-primary">
                                            <tr class="bg-dark">
                                                <th></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search Cell" id="search_cell"></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search PO" id="search_po"></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search Market" id="search_market"></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search Order No" id="search_orderNo"></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search Customer" id="search_customer"></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search Style" id="search_style"></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search Color" id="search_color"></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search Quantity" id="search_quantity"></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search Balance" id="search_balance"></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search Exp or Act XFD" id="search_exp"></th>
                                                <th style="vertical-align:middle;text-align:center"><input type="text" placeholder="Search Status" id="search_status"></th>
                                            <tr>
                                                <th style="vertical-align:middle;text-align:center">No</th>
                                                <th style="vertical-align:middle;text-align:center">Cell</th>
                                                <th style="vertical-align:middle;text-align:center">PO No.</th>
                                                <th style="vertical-align:middle;text-align:center">Market</th>
                                                <th style="vertical-align:middle;text-align:center">Customer Order No.</th>
                                                <th style="vertical-align:middle;text-align:center">Customer</th>
                                                <th style="vertical-align:middle;text-align:center">Style / Part No.</th>
                                                <th style="vertical-align:middle;text-align:center">Color / Width</th>
                                                <th style="vertical-align:middle;text-align:center">Quantity</th>
                                                <th style="vertical-align:middle;text-align:center">Balance</th>
                                                <th style="vertical-align:middle;text-align:center">Exp or Act XFD</th>
                                                <th style="vertical-align:middle;text-align:center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="resultShipment"></tbody>
                                    </table>
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

