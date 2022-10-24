@extends('audit.content.layouts.app_6s')

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
                                        <input class="form-control" type="month" min="2020-01" name="bulan">
                                    </div>
                                    <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary" style="width:100%"value="Search">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sd-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title font-weight-bold">SUMMARY AUDIT 6S C2B</h5><br>
                                <h6 class="card-title font-weight-bold">Jun 2022</h6>
                                <div class="card-tools">
                                    <button onclick="OpenC2BChart()">
                                        <i class="fa fa-line-chart"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Area</th>
                                            <th class="text-center">Cutting</th>
                                            <th class="text-center">Sewing</th>
                                            <th class="text-center">Assy</th>
                                            <th class="text-center">Avg</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=0; @endphp
                                        @foreach ($result_c2b as $a)
                                        @php $no++@endphp
                                            <tr>
                                                <td class="text-center">{{ $no }}</td>
                                                <td class="text-center">{{ $a['cell'] }}</td>
                                                <td class="text-center">{{ number_format($a['avg_cutting'],2) }}</td>
                                                <td class="text-center">{{ number_format($a['avg_sewing'],2) }}</td>
                                                <td class="text-center">{{ number_format($a['avg_assy'],2) }}</td>
                                                <td class="text-center">{{ number_format(($a['avg_cutting']+$a['avg_sewing']+$a['avg_assy'])/3,2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sd-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sd-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title font-weight-bold">SUMMARY AUDIT 6S C2B ASSY ONLY</h5><br>
                                        <h6 class="card-title font-weight-bold">Jun 2022</h6>
                                        <div class="card-tools">
                                            <button onclick="OpenC2BAssyOnlyChart()">
                                                <i class="fa fa-line-chart"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Area</th>
                                                    <th class="text-center">Avg</th>
                                                </tr>
                                            </thead>    
                                            <tbody>
                                                @php $no=0; @endphp
                                                @foreach ($result_assy_only as $a)
                                                @php $no++@endphp
                                                    <tr>
                                                        <td class="text-center">{{ $no }}</td>
                                                        <td class="text-center">{{ $a['cell'] }}</td>
                                                        <td class="text-center">{{ number_format($a['avg'],2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sd-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title font-weight-bold">SUMMARY AUDIT 6S OFFLINE</h5><br>
                                        <h6 class="card-title font-weight-bold">Jun 2022</h6>
                                        <div class="card-tools">
                                            <button onclick="OpenOfflineChart()">
                                                <i class="fa fa-line-chart"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Area</th>
                                                    <th class="text-center">Avg</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no=0; @endphp
                                                @foreach ($result_offline as $a)
                                                @php $no++@endphp
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $a['cell'] }}</td>
                                                    <td class="text-center">{{ number_format($a['avg'],2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sd-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title font-weight-bold">SUMMARY AUDIT 6S STOCKFIT</h5><br>
                                        <h6 class="card-title font-weight-bold">Jun 2022</h6>
                                        <div class="card-tools">
                                            <button onclick="OpenStockfitChart()">
                                                <i class="fa fa-line-chart"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Area</th>
                                                    <th class="text-center">Avg</th>
                                                </tr>
                                            </thead>    
                                            <tbody>
                                                @php $no=0; @endphp
                                                @foreach ($result_stockfit as $a)
                                                @php $no++@endphp
                                                    <tr>
                                                        <td class="text-center">{{ $no }}</td>
                                                        <td class="text-center">{{ $a['cell'] }}</td>
                                                        <td class="text-center">{{ number_format($a['avg'],2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-md-12 col-sd-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sd-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title font-weight-bold">SUMMARY AUDIT 6S OFFICE</h5><br>
                                        <h6 class="card-title font-weight-bold">Jun 2022</h6>
                                        <div class="card-tools">
                                            <button onclick="OpenOfficeChart()">
                                                <i class="fa fa-line-chart"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Area</th>
                                                    <th class="text-center">Avg</th>
                                                </tr>
                                            </thead>    
                                            <tbody>
                                                @php $no=0; @endphp
                                                @foreach ($result_office as $a)
                                                @php $no++@endphp
                                                    <tr>
                                                        <td class="text-center">{{ $no }}</td>
                                                        <td class="text-center">{{ $a['cell'] }}</td>
                                                        <td class="text-center">{{ number_format($a['avg'],2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sd-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title font-weight-bold">SUMMARY AUDIT 6S LAMINATING</h5><br>
                                        <h6 class="card-title font-weight-bold">Jun 2022</h6>
                                        <div class="card-tools">
                                            <button onclick="OpenLaminatingChart()">
                                                <i class="fa fa-line-chart"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Area</th>
                                                    <th class="text-center">Avg</th>
                                                </tr>
                                            </thead>    
                                            <tbody>
                                                @php $no=0; @endphp
                                                @foreach ($result_laminating as $a)
                                                @php $no++@endphp
                                                    <tr>
                                                        <td class="text-center">{{ $no }}</td>
                                                        <td class="text-center">{{ $a['cell'] }}</td>
                                                        <td class="text-center">{{ number_format($a['avg'],2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-6 col-sd-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title font-weight-bold">SUMMARY AUDIT 6S Other</h5><br>
                                        <h6 class="card-title font-weight-bold">Jun 2022</h6>
                                        <div class="card-tools">
                                            <button onclick="OpenOtherChart()">
                                                <i class="fa fa-line-chart"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Area</th>
                                                    <th class="text-center">Avg</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no=0; @endphp
                                                @foreach ($result_other as $a)
                                                @php $no++@endphp
                                                <tr>
                                                    <td class="text-center">{{ $no }}</td>
                                                    <td class="text-center">{{ $a['cell'] }}</td>
                                                    <td class="text-center">{{ number_format($a['avg'],2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </section>
        </div>
    </div><!-- /.container-fluid -->
    {{-- modal c2b chart  --}}
        <div class="modal fade" id="c2bChart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Reporting Chart <br></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <canvas id="chart_c2b"></canvas>
                </div>
            </div>
            </div>
        </div>
    {{-- modal assy only chart  --}}
        <div class="modal fade" id="assyOnlyChart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Reporting Chart <br></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <canvas id="chart_assy_only"></canvas>
                </div>
            </div>
            </div>
        </div>
    {{-- modal stockfit chart  --}}
        <div class="modal fade" id="stockfitChart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Reporting Chart <br></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <canvas id="chart_stockfit"></canvas>
                </div>
            </div>
            </div>
        </div>
    {{-- modal laminating chart  --}}
        <div class="modal fade" id="laminatingChart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Reporting Chart <br></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <canvas id="chart_laminating"></canvas>
                </div>
            </div>
            </div>
        </div>
    {{-- modal office chart  --}}
        <div class="modal fade" id="officeChart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Reporting Chart <br></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <canvas id="chart_office"></canvas>
                </div>
            </div>
            </div>
        </div>
    {{-- modal offline chart  --}}
        <div class="modal fade" id="offlineChart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Reporting Chart <br></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <canvas id="chart_offline"></canvas>
                </div>
            </div>
            </div>
        </div>
    {{-- modal offline chart  --}}
        <div class="modal fade" id="otherChart" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Reporting Chart <br></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <canvas id="chart_other"></canvas>
                </div>
            </div>
            </div>
        </div>

</section>
@endsection

<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script>
    function OpenC2BChart()
    {
        $('#c2bChart').modal('toggle')
    }
    function OpenC2BAssyOnlyChart()
    {
        $('#assyOnlyChart').modal('toggle')
    }
    function OpenStockfitChart()
    {
        $('#stockfitChart').modal('toggle')
    }
    function OpenLaminatingChart()
    {
        $('#laminatingChart').modal('toggle')
    }
    function OpenOfficeChart()
    {
        $('#officeChart').modal('toggle')
    }
    function OpenOfflineChart()
    {
        $('#offlineChart').modal('toggle')
    }
    function OpenOtherChart()
    {
        $('#otherChart').modal('toggle')
    }
</script>
{{-- chart script  --}}
    {{-- c2b chart --}}
        <script>
            var chart_c2b = {
                labels: {!!json_encode($cell_c2b)!!},
                datasets: [{
                    type: 'bar',
                    label: 'Cutting',
                    backgroundColor: "#c71b00",
                    borderColor: "#c71b00",
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'A',
                    data: {!!json_encode($avg_cutting)!!}
                },{
                    type: 'bar',
                    label: 'Sewing',
                    backgroundColor: "#17a2b8",
                    borderColor: "#17a2b8",
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'A',
                    data: {!!json_encode($avg_sewing)!!}
                },{
                    type: 'bar',
                    label: 'Assy',
                    backgroundColor: "#000000",
                    borderColor: "#000000",
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'A',
                    data: {!!json_encode($avg_assy)!!}
                }]
            };
            var chart_assy_only = {
                labels: {!!json_encode($cell_assy_only)!!},
                datasets: [{
                    type: 'bar',
                    label: 'Assy Only',
                    backgroundColor: ["#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876"],
                    borderColor: "#000000",
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'A',
                    data: {!!json_encode($avg_assy_only)!!}
                }]
            };
            var chart_stockfit = {
                labels: {!!json_encode($cell_stockfit)!!},
                datasets: [{
                    type: 'bar',
                    label: 'Stockfit',
                    backgroundColor: ["#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5"],
                    borderColor: "#000000",
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'A',
                    data: {!!json_encode($avg_stockfit)!!}
                }]
            };
            var chart_laminating = {
                labels: {!!json_encode($cell_laminating)!!},
                datasets: [{
                    type: 'bar',
                    label: 'Laminating',
                    backgroundColor: ["#00c1a5","#364876"],
                    borderColor: "#dfe1e2",
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'A',
                    data: {!!json_encode($avg_laminating)!!}
                }]
            };
            var chart_office = {
                labels: {!!json_encode($cell_office)!!},
                datasets: [{
                    type: 'bar',
                    label: 'Office',
                    backgroundColor: ["#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876"],
                    borderColor: "#dfe1e2",
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'A',
                    data: {!!json_encode($avg_office)!!}
                }]
            };
            var chart_offline = {
                labels: {!!json_encode($cell_offline)!!},
                datasets: [{
                    type: 'bar',
                    label: 'Offline',
                    backgroundColor: ["#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5"],
                    borderColor: "#dfe1e2",
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'A',
                    data: {!!json_encode($avg_offline)!!}
                }]
            };
            var chart_other = {
                labels: {!!json_encode($cell_other)!!},
                datasets: [{
                    type: 'bar',
                    label: 'Other',
                    backgroundColor: ["#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876","#00c1a5","#364876"],
                    borderColor: "#dfe1e2",
                    borderWidth: 2,
                    fill: false,
                    yAxisID: 'A',
                    data: {!!json_encode($avg_other)!!}
                }]
            };chart_other
            window.onload = function () {
                var ctx_c2b = document.getElementById('chart_c2b').getContext('2d');
                window.myMixedChart = new Chart(ctx_c2b, {
                    type: 'bar',
                    data: chart_c2b,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'AVG C2B',
                            fontSize: 40
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                        scales: {
                            yAxes: [{
                                id: 'A',
                                position: 'left',
                                ticks: {
                                    suggestedMin: 0,
                                    stepSize: 1
                                },
                            }]
                        }
                    }
                });
                var ctx_assy_only = document.getElementById('chart_assy_only').getContext('2d');
                window.myMixedChart = new Chart(ctx_assy_only, {
                    type: 'bar',
                    data: chart_assy_only,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'AVG Assy Only',
                            fontSize: 40
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                        scales: {
                            yAxes: [{
                                id: 'A',
                                position: 'left',
                                ticks: {
                                    suggestedMin: 0,
                                    stepSize: 1
                                },
                            }]
                        }
                    }
                });
                var ctx_stockfit = document.getElementById('chart_stockfit').getContext('2d');
                window.myMixedChart = new Chart(ctx_stockfit, {
                    type: 'bar',
                    data: chart_stockfit,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'AVG Stockfit',
                            fontSize: 40
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                        scales: {
                            yAxes: [{
                                id: 'A',
                                position: 'left',
                                ticks: {
                                    suggestedMin: 0,
                                    stepSize: 1
                                },
                            }]
                        }
                    }
                });
                var ctx_laminating = document.getElementById('chart_laminating').getContext('2d');
                window.myMixedChart = new Chart(ctx_laminating, {
                    type: 'bar',
                    data: chart_laminating,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'AVG Laminating',
                            fontSize: 40
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                        scales: {
                            yAxes: [{
                                id: 'A',
                                position: 'left',
                                ticks: {
                                    suggestedMin: 0,
                                    stepSize: 1
                                },
                            }]
                        }
                    }
                });
                var ctx_office = document.getElementById('chart_office').getContext('2d');
                window.myMixedChart = new Chart(ctx_office, {
                    type: 'bar',
                    data: chart_office,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'AVG Office',
                            fontSize: 40
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                        scales: {
                            yAxes: [{
                                id: 'A',
                                position: 'left',
                                ticks: {
                                    suggestedMin: 0,
                                    stepSize: 1
                                },
                            }]
                        }
                    }
                });
                var ctx_offline = document.getElementById('chart_offline').getContext('2d');
                window.myMixedChart = new Chart(ctx_offline, {
                    type: 'bar',
                    data: chart_offline,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'AVG Offline',
                            fontSize: 40
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                        scales: {
                            yAxes: [{
                                id: 'A',
                                position: 'left',
                                ticks: {
                                    suggestedMin: 0,
                                    stepSize: 1
                                },
                            }]
                        }
                    }
                });
                var ctx_other = document.getElementById('chart_other').getContext('2d');
                window.myMixedChart = new Chart(ctx_other, {
                    type: 'bar',
                    data: chart_other,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'AVG Other',
                            fontSize: 40
                        },
                        tooltips: {
                            mode: 'index',
                            intersect: true
                        },
                        scales: {
                            yAxes: [{
                                id: 'A',
                                position: 'left',
                                ticks: {
                                    suggestedMin: 0,
                                    stepSize: 1
                                },
                            }]
                        }
                    }
                });chart_other
            };
            
        </script>
{{-- /chart script  --}}
@section('footer')


