@extends('layouts.app_6s')

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
                            AUDIT 6S
                        </h3>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        @if (session('alert'))
                            <div class="alert alert-danger">
                                {{ session('alert') }}
                            </div>
                        @endif
                        {{-- <form method="post" action="/report6s_index/search" enctype="multipart/form-data"> --}}
                        <form id="form_checklist" method="POST" action="/report6s_index/search">
                            {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ url('report6s_index/report_year') }}" class="btn btn-info" role="button">Year Presentation</a>
                                    </div>
                                    <div class="col-md-4">
                                        {{-- <select class="form-control" name="tahun">
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select> --}}
                                        <input class="form-control" type="month" min="2020-01" name="bulan">
                                    </div>
                                    <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary" style="width:100%"value="Search">
                                    </div>
                                </div>
                        </form>

                    </div>
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-4 col-6">
                                <div class="table-responsive">
                                    @php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $bulan=date("M");
                                        $tahun=date("Y");
                                    @endphp

                                    <table id="example1" class="table table-bordered table-striped" style="width: 50%;">
                                        <thead>
                                            <th colspan="8">
                                                <a><center><b>SUMMARY AUDIT 6S C2B</b></center></a>
                                                <a><center><b>{{$bulan}} {{$tahun}}</b></center></a>
                                            </th>
                                        </thead>
                                        <thead class="thead-dark">
                                            <tr style="font-size: 80%;">
                                                <th width="5%"class="align-middle"><center>No</center></th>
                                                <th class="align-middle"><center>Cell</center></th>
                                                <th class="align-middle"><center>Cutting</center></th>
                                                <th class="align-middle"><center>Sewing</center></th>
                                                <th class="align-middle"><center>Assy</center></th>
                                                <th class="align-middle"><center>Average</center></th>
                                                <th class="align-middle"><center>Rank</center></th>
                                                <th class="align-middle"><center>Remark</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no=0;
                                            @endphp
                                                    @foreach ($record_reguler as $value)
                                                    @php
                                                        $no++;
                                                        if ($value['avg_all']==0) {
                                                            $ket_c2b="Belum Audit";
                                                            }else{
                                                                $ket_c2b="Sudah Audit";
                                                        }
                                                    @endphp
                                            <tr style="font-size: 80%;">
                                                    <th>{{$no}}</th>
                                                    <th><center>{{$value['cell']}}</center></th>
                                                    <th>{{number_format($value['avg_cutting'],2)}}</th>
                                                    <th>{{number_format($value['avg_sewing'],2)}}</th>
                                                    <th>{{number_format($value['avg_assembling'],2)}}</th>
                                                    <th>{{number_format($value['avg_all'],2)}}</th>
                                                    <th></th>
                                                    <th>{{$ket_c2b}}</th>
                                                    @endforeach

                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr style="font-size: 80%;">
                                                <th colspan="2"><center>Average</center></th>
                                                @foreach ($average_area as $value)
                                                <th>{{number_format($value['average_cutting'],2)}}</th>
                                                <th>{{number_format($value['average_sewing'],2)}}</th>
                                                <th>{{number_format($value['average_assembling'],2)}}</th>
                                                <th>{{number_format($value['average_al'],2)}}</th>
                                                @endforeach
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                               <div class="table-responsive">

                                    <table id="example1" class="table table-bordered table-striped" style="width: 50%;">
                                        <thead>
                                            <th colspan="8">
                                                <a><center><b>SUMMARY AUDIT 6S STOCKFITING</b></center></a>
                                                <a><center><b>{{$bulan}} {{$tahun}}</b></center></a>
                                            </th>
                                        </thead>
                                        <thead class="thead-dark">
                                            <tr style="font-size: 80%;">
                                                <th width="5%"class="align-middle"><center>No</center></th>
                                                <th class="align-middle"><center>Area</center></th>
                                                <th class="align-middle"><center>Average</center></th>
                                                <th class="align-middle"><center>Rank</center></th>
                                                <th class="align-middle"><center>Remark</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no=0;
                                            @endphp
                                            @foreach ($result_stockfiting as $key=> $value)
                                                @php
                                                    $no++;

                                                    if ($value['avg_stockfit']==0) {
                                                            $ket_stockfit="Belum Audit";
                                                            }else{
                                                                $ket_stockfit="Sudah Audit";
                                                        }
                                                @endphp
                                                <tr style="font-size: 80%;">
                                                    <th>{{$no}}</th>
                                                    <th><center>{{$value['cell']}}</center></th>
                                                    <th>{{number_format($value['avg_stockfit'],2)}}</th>
                                                    <th></th>
                                                    <th>{{$ket_stockfit}}</th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                             <tr style="font-size: 80%;">
                                                <th colspan="2"><center>Average</center></th>
                                                @foreach ($result_stockfit2 as $value)
                                                <th>{{number_format($value['average_stockfit'],2)}}</th>
                                                @endforeach
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped" style="width: 50%;">
                                        <thead>
                                            <th colspan="8">
                                                <a><center><b>SUMMARY AUDIT 6S OFFLINE</b></center></a>
                                                <a><center><b>{{$bulan}} {{$tahun}}</b></center></a>
                                            </th>
                                        </thead>
                                        <thead class="thead-dark">
                                            <tr style="font-size: 70%;">
                                                <th width="5%"class="align-middle"><center>No</center></th>
                                                <th class="align-middle"><center>Area</center></th>
                                                <th class="align-middle"><center>Average</center></th>
                                                <th class="align-middle"><center>Rank</center></th>
                                                <th class="align-middle"><center>Remark</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no=0;
                                            @endphp
                                            @foreach ($result_offline as $key=> $value)
                                                @php
                                                    $no++;
                                                @endphp
                                                <tr style="font-size: 80%;">
                                                    <th>{{$no}}</th>
                                                    <th><center>{{$value['cell']}}</center></th>
                                                    <th>{{number_format($value['avg_offline'],2)}}</th>
                                                    @php
                                                        if($value['avg_offline']==0)
                                                        {
                                                            $keterangan="Belum Audit";
                                                        }else{
                                                            $keterangan="Sudah Audit";
                                                        }
                                                    @endphp
                                                    <th></th>
                                                    <th>{{$keterangan}}</th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr style="font-size: 80%;">
                                                <th colspan="2"><center>Average</center></th>
                                                @foreach ($result_offline3 as $value)
                                                <th>{{number_format($value['average_offline'],2)}}</th>
                                                @endforeach
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-body p-0">

                                </div>
                            </div>
                            <div class="col-lg-5 col-6">
                               <div class="col-lg-12 col-4">
                                    <div class="card-body p-0">
                                        <div style="width: 100%">
                                            <canvas id="chart_c2b"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-4">
                                    <div class="card-body p-0">
                                        <div style="width: 100%">
                                            <canvas id="chart_stockfitting"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-4">
                                    <div class="card-body p-0">
                                        <div style="width: 100%">
                                            <canvas id="chart_offline"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-4">
                                    <div class="card-body p-0">
                                        <div style="width: 100%">
                                            <canvas id="summary_all"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->

                        </div>
                        <!-- /.row -->
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
		var chartData_r = {
			labels: {!!json_encode($chartc2b_name)!!},
			datasets: [{
				type: 'line',
				label: 'Target C2B',
				borderColor: "black",
				borderWidth: 2,
				fill: false,
				data: [5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5]
			}, {
				type: 'bar',
				label: 'Point Audit',
				backgroundColor: "#4444444",
				data: {!!json_encode($chartc2b)!!},
				borderColor: 'white',
				borderWidth: 2
			}]

        };
        var chartData_s = {
			labels: {!!json_encode($chartstockfit_name)!!},
			datasets: [{
				type: 'line',
				label: 'Target Stockfit',
				borderColor: "black",
				borderWidth: 5,
				fill: false,
				data: [5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5]
			}, {
				type: 'bar',
				label: 'Point Audit',
				backgroundColor: "#4444444",
				data: {!!json_encode($chartstockfit)!!},
				borderColor: 'white',
				borderWidth: 2
			}]

        };
        var chartData_o = {
			labels: {!!json_encode($chartoffline_name)!!},
			datasets: [{
				type: 'line',
				label: 'Target Stockfit',
				borderColor: "black",
				borderWidth: 5,
				fill: false,
				data: [5,5,5,5,5,5]
			}, {
				type: 'bar',
				label: 'Point Audit',
				backgroundColor: "#4444444",
				data: {!!json_encode($chartoffline)!!},
				borderColor: 'white',
				borderWidth: 2
			}]

        };
       var cell = {!!json_encode($chart_cell_top3)!!};
		var horizontalBarChartData = {
			labels: {!!json_encode($chart_cell_top3)!!},
			datasets: [{
				label: 'Jumlah Defect',
				backgroundColor: "#4444444",
				borderColor: "black",
				borderWidth: 2,
				data: {!!json_encode($chart_top3)!!}
			}]

		};

		window.onload = function () {
            var ctx_r = document.getElementById('chart_c2b').getContext('2d');
			var ctx_s = document.getElementById('chart_stockfitting').getContext('2d');
            var ctx_o = document.getElementById('chart_offline').getContext('2d');
			var ctx = document.getElementById('summary_all').getContext('2d');

            window.myHorizontalBar = new Chart(ctx, {
				type: 'horizontalBar',
				data: horizontalBarChartData,
				options: {
					// Elements options apply to all of the options unless overridden in a dataset
					// In this case, we are setting the border of each horizontal bar to be 2px wide
					elements: {
						rectangle: {
							borderWidth: 1,
						}
					},
					responsive: true,
					legend: {
						position: 'right',
					},
					title: {
						display: true,
						text: 'Chart Hasil AUDIT 6S Offline'
					},
					scales: {
						xAxes: [{
							ticks: {
								min: 0 // Edit the value according to what you need
							}
						}],
						yAxes: [{
							stacked: true
						}]
					}
				}
			});
			window.myMixedChart = new Chart(ctx_r, {
				type: 'bar',
				data: chartData_r,
				options: {
					responsive: true,
					title: {
						display: true,
						text: 'Chart Hasil AUDIT 6S C2B'
					},
					tooltips: {
						mode: 'index',
						intersect: true
					},
                    scales: {
                        yAxes: [{
                            ticks: {
                                max: 5,
                                min: 0,
                                stepSize: 0.5
                            }
                        }]
                    }
				}
            });
            window.myMixedChart = new Chart(ctx_s, {
				type: 'bar',
				data: chartData_s,
				options: {
					responsive: true,
					title: {
						display: true,
						text: 'Chart Hasil AUDIT 6S Stockfit'
					},
					tooltips: {
						mode: 'index',
						intersect: true
					},
                    scales: {
                        yAxes: [{
                            ticks: {
                                max: 5,
                                min: 0,
                                stepSize: 0.5
                            }
                        }]
                    }
				}
            });
            window.myMixedChart = new Chart(ctx_o, {
				type: 'bar',
				data: chartData_o,
				options: {
					responsive: true,
					title: {
						display: true,
						text: 'Chart Hasil AUDIT 6S Offline'
					},
					tooltips: {
						mode: 'index',
						intersect: true
					},
                    scales: {
                        yAxes: [{
                            ticks: {
                                max: 5,
                                min: 0,
                                stepSize: 0.5
                            }
                        }]
                    }
				}
			});

		};
    </script>
{{-- @include('6s/partial/chart') --}}


@endsection

@section('footer')


