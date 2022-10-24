@extends('layouts.app_leanmedia')

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
                    <h3 class="card-title">Event PT. Parkland World Indoensia</h3>
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
                @if (session('alert_error'))
                    <div class="alert alert-danger">
                        {{ session('alert_error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- /.card-header -->
                <!-- .card-Body -->
                <div class="card-body">
                    <!-- content-->
                        <div class="tab-content p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="accordion">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                                    <!-- small box -->
                                                    <div class="small-box bg-danger">
                                                        <div class="inner">
                                                            <h1><b>New Balance</b></h1>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fa fa-newbalance_2 fa-5x"></i>
                                                        </div>
                                                        <a href="#newbalance" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="newbalance">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col TOS -->
                                                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                                    <!-- small box -->
                                                    <div class="small-box bg-light">
                                                        <div class="inner">
                                                            <h1><b>Adidas</b></h1>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fa fa-adidas_1 fa-5x"></i>
                                                        </div>
                                                        <a href="#adidas" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="adidas">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- ./col SWS-->
                                                <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
                                                    <!-- small box -->
                                                    <div class="small-box bg-secondary">
                                                        <div class="inner">
                                                            <h1><b>Reebok</b></h1>
                                                        </div>
                                                        <div class="icon">
                                                            <i class="fa fa-reebok_2 fa-5x"></i>
                                                        </div>
                                                        <a href="#reebok" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="reebok">More info
                                                            <i class="fas fa-arrow-circle-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Walk Through data collaps --}}
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="collapse" id="newbalance" data-parent="#accordion">
                                                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                                                                <li class="nav-item dropdown">
                                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                                        SOP
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        @foreach ($list_area_sop as $a)
                                                                            <a class="dropdown-item" data-toggle="tab" href="#sop{{$a->id_area}}"><input type="hidden" id="value_sop{{$a->id_area}}" value="{{$a->id_area}}">{{$a->location}}</a>
                                                                        @endforeach
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                                        OIB
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        @foreach ($list_area_oib as $a)
                                                                            <a class="dropdown-item" href="#oib{{$a->id_area}}">{{$a->location}}</a>
                                                                        @endforeach
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                                        CCQP
                                                                    </a>
                                                                    <div class="dropdown-menu">
                                                                        @foreach ($list_area_ccqp as $a)
                                                                            <a class="dropdown-item" href="#ccqp{{$a->id_area}}">{{$a->location}}</a>
                                                                        @endforeach
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            {{-- end CUTTING data collaps --}}
                                            <div class="tab-content" id="custom-content-below-tabContent">
                                                {{-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~SOP~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ --}}
                                                    @foreach ($list_area_sop as $a)
                                                    <div id="sop{{$a->id_area}}" class="container tab-pane fade"><br>
                                                        <h3>SOP {{$a->location}}</h3>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input type="text" name="search_sop{{$a->id_area}}" id="search_sop{{$a->id_area}}" class="form-control" placeholder="Search {{$a->location}}" />
                                                            </div>
                                                        </div>
                                                        <div id="list_sop{{$a->id_area}}"></div>
                                                    </div>
                                                    @endforeach
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /content-->
                </div>
                @foreach ($list_area_sop as $a)
                    <input type="hidden" id="{{$a->location}}" value="{{$a->location}}">
                @endforeach
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
    <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
        <script>
     
            var tes={!!json_encode($area_sop)!!}
            var text = [];
            for (i = 0; i < tes.length; i++) {
                    text[i]= tes[i];
            }
                console.log(text);

        </script>

@endsection


@section('footer')

