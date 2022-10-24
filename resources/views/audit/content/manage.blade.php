@extends('layouts.app_6s')

@section('head','navbar','sidebar')

@section('contentheader')
<div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
<!-- Pilih Search / Factory content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Pilih Area Management Audit
                </div>
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h1><b>F1</b></h1>

                                    <p>Area</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-industry"></i>
                                </div>
                                <form method="POST" action="{{url("/audit/manage")}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="team" value="{{ Auth::user()->name }}">
                                    <input type="month" name="month" class="form-control">
                                    <input type="hidden" name="building" value="1" class="form-control">
                                    <center><button type="submit" class="btn btn-info small-box-footer"  role="button" aria-expanded="true" aria-controls="cutting_target">More info
                                    <i class="fas fa-arrow-circle-right"></i></button></center>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h1><b>F2</b></h1>

                                    <p>Area</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-industry"></i>
                                </div>
                                <form method="POST" action="{{url("/audit/manage")}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="team" value="{{ Auth::user()->name }}">
                                    <input type="month" name="month" class="form-control">
                                    <input type="hidden" name="building" value="2" class="form-control">
                                    <center><button type="submit" class="btn btn-primary small-box-footer"  role="button" aria-expanded="true" aria-controls="cutting_target">More info
                                    <i class="fas fa-arrow-circle-right"></i></button></center>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h1><b>STOCKFIT</b></h1>

                                    <p>Area</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shoe-prints"></i>
                                </div>
                                <form method="POST" action="{{url("/audit/manage")}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="team" value="{{ Auth::user()->name }}">
                                    <input type="month" name="month" class="form-control">
                                    <input type="hidden" name="building" value="5" class="form-control">
                                    <center><button type="submit" class="btn btn-success small-box-footer"  role="button" aria-expanded="true" aria-controls="cutting_target">More info
                                    <i class="fas fa-arrow-circle-right"></i></button></center>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h1><b>Offline</b></h1>

                                    <p>Area</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-memory"></i>
                                </div>
                                <form method="POST" action="{{url("/audit/manage")}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="team" value="{{ Auth::user()->name }}">
                                    <input type="month" name="month" class="form-control">
                                    <input type="hidden" name="building" value="4" class="form-control">
                                    <center><button type="submit" class="btn btn-danger small-box-footer"  role="button" aria-expanded="true" aria-controls="cutting_target">More info
                                    <i class="fas fa-arrow-circle-right"></i></button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                            <!-- small box -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h1><b>MAIN OFFICE</b></h1>

                                    <p>Area</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-industry"></i>
                                </div>
                                <form method="POST" action="{{url("/audit/manage")}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="team" value="{{ Auth::user()->name }}">
                                    <input type="month" name="month" class="form-control">
                                    <input type="hidden" name="building" value="10" class="form-control">
                                    <center><button type="submit" class="btn btn-secondary small-box-footer"  role="button" aria-expanded="true" aria-controls="cutting_target">More info
                                    <i class="fas fa-arrow-circle-right"></i></button></center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
<!-- /Main content -->
    <!-- /.content -->
@endsection

@section('footer')


