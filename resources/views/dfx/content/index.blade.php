@extends('layouts.app_index')

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
          <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header">
                        <h3 class="card-title">
                            PWI DFX
                        </h3>
                </div>
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">Import DFX Data</h3>
                                    @if ($sukses = Session::get('sukses'))
                                        <div class="alert alert-success alert-block">
                                            <button type="button" class="close" data-dismiss="alert">×</button> 
                                            <strong>{{ $sukses }}</strong>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Imprt Database DFX
                                    </button>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">DFX DATA</h3>
                                    <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row p-4">
                                        <div class="col-md-4">
                                            <select name="season" id="season" class="form-control input-lg">
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="model_name" id="model_name" class="form-control input-lg dynamic" data-dependent="model">
                                                <option value="">Select Model</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="principle" id="principle"class="form-control input-lg dynamic">
                                                <option value="">Select Principle</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div style="overflow-x:auto;">
                                        <table id="datatable-keytable" class="table table-striped table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="span2"style="vertical-align:middle;text-align:center" rowspan="3">No</th>
                                                    <th style="vertical-align:middle;text-align:center" rowspan="3">DFX ID</th>
                                                    <th style="vertical-align:middle;text-align:center" rowspan="3">Category</th>
                                                    <th style="vertical-align:middle;text-align:center" rowspan="3">Model Name</th>
                                                    <th style="vertical-align:middle;text-align:center" rowspan="3">Model Picture</th>
                                                    <th style="vertical-align:middle;text-align:center" rowspan="3">DFX Short Description</th>
                                                    <th style="vertical-align:middle;text-align:center" colspan="3">DFX Principle #</th>
                                                    <th style="vertical-align:middle;text-align:center" rowspan="3">Season</th>
                                                    <th style="vertical-align:middle;text-align:center" rowspan="3">Approve Yes/No (Y/N)</th>
                                                    <th style="vertical-align:middle;text-align:center" rowspan="3">Explain why for "N" in approval</th>
                                                    <th style="vertical-align:middle;text-align:center" colspan="12">Impact</th>
                                                </tr>
                                                <tr>
                                                    <th style="vertical-align:middle;text-align:center"rowspan="2">Primary #</th>
                                                    <th style="vertical-align:middle;text-align:center"rowspan="2" colspan="2">Other Secondary #</th>
                                                    <th style="vertical-align:middle;text-align:center"colspan="3">PPH improve</th>
                                                    <th style="vertical-align:middle;text-align:center"colspan="3">Material Cost Saving</th>
                                                    <th style="vertical-align:middle;text-align:center"colspan="3">Other Benefits</th>
                                                    <th style="vertical-align:middle;text-align:center"rowspan="2">Forecasted Volume</th>
                                                    <th style="vertical-align:middle;text-align:center"colspan="3">Total Save Base On</th>
                                                </tr>
                                                <tr>
                                                    <th style="vertical-align:middle;text-align:center">Before</th>
                                                    <th style="vertical-align:middle;text-align:center">After</th>
                                                    <th style="vertical-align:middle;text-align:center">Improve</th>
                                                    <th style="vertical-align:middle;text-align:center">Before</th>
                                                    <th style="vertical-align:middle;text-align:center">After</th>
                                                    <th style="vertical-align:middle;text-align:center">Saving $/pair</th>
                                                    <th style="vertical-align:middle;text-align:center">Before</th>
                                                    <th style="vertical-align:middle;text-align:center">After</th>
                                                    <th style="vertical-align:middle;text-align:center">Improve</th>
                                                    <th style="vertical-align:middle;text-align:center">PPH</th>
                                                    <th style="vertical-align:middle;text-align:center">Cost$</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </section>
        </div>
      </div>
      <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="post" action="/dfx/upload" id="form_upload"  class="was-validated" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" aria-describedby="emailHelp" placeholder="Import Excel" accept=".pdf, .xls, .xlsx" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            url:"{{ route('dfx.main') }}",
            method:"get",
            dataType:'JSON',
            success:function(data)
            {
                $('#season').html(data.selectSeason);
            }
        });
        $('#season').on('change', function() {
            $.ajax({
                url:"{{ route('dfx.changeSeason') }}",
                data:{changeSeason : this.value},
                method:"get",
                dataType:'JSON',
                success:function(data)
                {
                    $('#model_name').html(data.model_name);
                    $('#table').html(data.table);
                }
            });
        });
        $('#model_name').on('change', function() {
            var season = $('#season').find(":selected").val();
            $.ajax({
                url:"{{ route('dfx.changeModel') }}",
                data:{model : this.value,season:season},
                method:"get",
                dataType:'JSON',
                success:function(data)
                {
                    $('#principle').html(data.principle);
                    $('#table').html(data.table);
                }
            });
        });
    });
</script>
@endsection


@section('footer')

