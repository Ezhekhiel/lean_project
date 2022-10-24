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
                <div class="card-body">
                    <!-- content-->
                        <div class="tab-content p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header border-transparent"><h5>COMPUTER STITCHING AREA</h5></div>
                                    <div class="card-header">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tambahData">Tambah Data</button>
                                    </div>
                                    <div class="card-header">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Model / Process" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-body">
                                        <div class="table-responsive">
                                           <h3 align="center">Total Data : <span id="total_records"></span></h3>
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align:middle;text-align:center">No</th>
                                                        <th style="vertical-align:middle;text-align:center">Model</th>
                                                        <th style="vertical-align:middle;text-align:center">Process</th>
                                                        <th style="vertical-align:middle;text-align:center">CT (sec)</th>
                                                        <th style="vertical-align:middle;text-align:center">Foto MMC</th>
                                                        <th style="vertical-align:middle;text-align:center">Foto SWCS</th>
                                                        <th style="vertical-align:middle;text-align:center">Video Process</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /content-->
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
    <!-- /.content -->
<script>
    function goBack() {
        window.history.back();
    }
</script>
{{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function(){

            fetch_customer_data();

            function fetch_customer_data(query = '')
            {
                $.ajax({
                url:"{{ route('ie_base.live_search.action_cs') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                    success:function(data)
                    {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                 })
            }

        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_customer_data(query);
            });
        });
    </script>


@endsection


@section('footer')

