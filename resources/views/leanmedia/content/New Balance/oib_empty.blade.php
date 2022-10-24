@extends('layouts/layouts_galery.app_leanmedia')

@section('head','navbar','sidebar')

@section('contentheader')
<div class="content-header">
      <div class="container-fluid">
        <div class="card-header">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="search_moving" id="search_oib" class="form-control" placeholder="Search OIB" /><br>
                    <ha>Total Data : <span id="total_records_oib"></span></ha>

                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
</div>
@endsection


@section('content')
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">

                    <div class="alert alert-danger">
                        <CENTER>
                            <h3>DATA OIB TIDAK DI TEMUKAN</h3>
                        </CENTER>
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

@endsection


@section('footer')

