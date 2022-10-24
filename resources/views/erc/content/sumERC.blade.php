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
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">
                        ERC
                        </h3>
                    </div>
                <!-- /.card-header -->
                <!-- .card-Body -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="col-md-12">
                            <!-- /.card-header -->
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">SUMMARY ERC</h3>
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
                            <!-- /.card-body -->
                                <div class="card-body">
                                    <div class="card">
                                        <input type="month" name="month" id="month" class="form-control">
                                    </div>
                                    <div id="tag_container">
                                        @include('erc.content.partial.presult')
                                    </div>
                                </div>
                            <!-- /.card-body -->
                            <!-- /.card-footer -->
                                <div class="card-footer clearfix">
                                </div>
                            <!-- /.card-footer -->
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <!-- /.card -->
            </section>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
    {{-- add modal --}}
        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title font-weight-bold" id="exampleModalLabel"> </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert" id="message" style="display: none"></div>
                    <form method="post" id="formInput" name="formInput" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h6 class="modal-title font-weight-bold">Form Add Data</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card card">
                                                    <div class="form-group">
                                                        <label for="date">Date</label>
                                                        <span id="span_date" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <input type="date" class="form-control" name="date" id="date" placeholder="Enter email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="market">Market</label>
                                                        <span id="span_market" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <input type="text" class="form-control" name="market" id="market" placeholder="Enter Market" style="text-transform:uppercase">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="model">Model</label>
                                                        <span id="span_model" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <input type="text" class="form-control" name="model" id="model" placeholder="Enter Model" style="text-transform:uppercase">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Style">Style</label> 
                                                        <span id="span_style" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <input type="text" class="form-control" name="style" id="style" placeholder="Enter Style" style="text-transform:uppercase">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Style">Initiator</label>
                                                        <span id="span_initiator" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <input type="text" class="form-control" name="initiator" id="initiator" placeholder="ENTER INITIATOR">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Style">Verification</label>
                                                        <span id="span_verification" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <input type="text" class="form-control" name="verifi" id="verifi" placeholder="ENTER VERIFICATION">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Style">Prevention</label>
                                                        <span id="span_prevention" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <input type="text" class="form-control" name="prevention" id="prevention" placeholder="ENTER VERIFICATION">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Style"># of Pair Inspected</label>
                                                        <span id="span_pair" class="badge badge-pill badge-danger" style="display: none">this form-group must be filled</span>
                                                        <input type="number" class="form-control" name="pair" id="pair">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="Style">B- grade</label>
                                                                <input type="number" class="form-control" name="b_grade" id="b_grade">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="Style">C- grade</label>
                                                                <input type="number" class="form-control" name="c_grade" id="c_grade">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="Style">Defect</label>
                                                                <div class="input-group mb-2">
                                                                    <div class="input-group-prepend">
                                                                        <input type="number" class="form-control" name="percent" id="percent" readonly>
                                                                        <div class="input-group-text">%</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="total_cost">Total Cost of all containment activities i.e. Labor, shipping. / Remark</label><br>
                                                        <span span id="span_total_cost" class="badge badge-pill badge-danger" style="display: none">this form-group must be filled</span>
                                                            <div class="input-group-prepend">
                                                                <input type="number" class="form-control" name="total_cost" id="total_cost" step="0.1">
                                                                <div class="input-group-text">$</div>
                                                            </div>
                                                                <textarea style="margin-top: 5px" type="text" placeholder="REMARK" class="form-control blok" name="remark" id="remark"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="total_cost">Chargeback amount back to Factory / Remark</label><br>
                                                        <span id=span_chargeback class="badge badge-pill badge-danger" style="display: none">this form-group must be filled</span>
                                                            <div class="input-group-prepend">
                                                                <input type="number" class="form-control" name="chargeback" id="chargeback" step="0.1">
                                                                <div class="input-group-text">$</div>
                                                            </div>
                                                                <textarea style="margin-top: 5px" type="text" placeholder="REMARK" class="form-control blok" name="remark2" id="remark2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card card">
                                                    <div class="form-group">
                                                        <label for="Why">Why</label>
                                                        <span id="span_why" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <textarea name="why" id="why" cols="10" class="form-control" placeholder="ENTER DESCRIPTION"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="defect">Defect</label>
                                                        <span id="span_defect_input" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <textarea name="defect_input" id="defect_input" cols="10" class="form-control" placeholder="ENTER DEFECT"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="efect">Efect</label>
                                                        <span id="span_efect" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <textarea name="efect" id="efect" cols="10" class="form-control" placeholder="ENTER DEFECT"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Point">Point of Detection</label>
                                                        <span id="span_point" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <textarea name="point" id="point" cols="10" class="form-control" placeholder="ENTER POINT OF DETECTION"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="efect">Correction Action</label>
                                                        <span id="span_correction" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <textarea name="correction" id="correction" cols="10" class="form-control" placeholder="ENTER CORRECTION ACTION"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="file">Upload File PDF</label><br>
                                                        <span id="span_file" class="badge badge-pill badge-danger" style="display: none">this data must be filled</span>
                                                        <input type="file" name="select_file" id="select_file" accept=".pdf,.doc" />
                                                    </div>
                                                    <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload">
                                                    {{-- <button type="button" class="btn btn-primary blok" id="save">Save changes</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span id="uploaded_image"></span>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    
@endsection
@include('erc.scripts.function_sum')
@section('footer')

