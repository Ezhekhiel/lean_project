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
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                    <!-- .card-head -->
                        <div class="card-header">
                            <h3 class="card-title">
                                AUDIT 6S
                            </h3>
                        </div>
                    <!-- /.card-header -->
                    <!-- .card-Body -->
                        <div class="card-body">
                            <!-- content-->
                                <div class="tab-content p-0">
                                    @php
                                        $rowid = 0;
                                        $rowspan = 0;
                                    @endphp
                                    @if (session('alert'))
                                        <div class="alert alert-success">
                                            {{ session('alert') }}
                                        </div>
                                    @endif
                                    <form id="form_checklist" method="POST" action="{{ url('/audit/form') }}">
                                    {{ csrf_field() }}
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="col-md-5">
                                                <!-- select -->
                                                    <div class="form-group">
                                                        <select name="cell" id="cell" class="form-control input-lg dynamic" data-dependent="area">
                                                            <option name="">Pilih Cell / Line</option>
                                                            <?php foreach($cell as $u){ ?>
                                                                <option value='<?php echo $u->id_cell ?>'><?php echo $u->cell ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <input type="submit" class="btn btn-primary" style="width:100%"value="Cari">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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


@endsection

@section('footer')


