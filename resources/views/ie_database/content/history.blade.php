@extends('ie_database.layouts.app')

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
                        PWI IE Database
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- .card-Body -->
                <div class="card-body">
                    <!-- content-->
                        <div class="tab-content p-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th style="vertical-align:middle;text-align:center">No</th>
                                                        <th style="vertical-align:middle;text-align:center">Tanggal Update</th>
                                                        <th style="vertical-align:middle;text-align:center">Foto TOS / CSCW</th>
                                                        <th style="vertical-align:middle;text-align:center">Video Process</th>
                                                        <th style="vertical-align:middle;text-align:center">CT / s</th>
                                                        <th style="vertical-align:middle;text-align:center">Remark</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 0;
                                                    @endphp
                                                    @foreach($history as $p)
                                                    @php
                                                        $no++;
                                                    @endphp
                                                        <tr>
                                                            <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                                                            <td style="vertical-align:middle;text-align:center">{{ date('j-M-y', strtotime($p->updated_at)) }}</td>
                                                            <td style="vertical-align:middle;text-align:center">
                                                                <a class="test-popup-link" href="{{url('/images/lean/ie_database/'.$p->image)}}">
                                                                    <img src="{{url('/images/lean/ie_database/'.$p->image)}}" height="100px" width="120px"/></center>
                                                                </a>
                                                            </td>
                                                            <td style="vertical-align:middle;text-align:center">
                                                                <video width="100px" height="120px" controls>
                                                                    <source src="{{url('/video/lean/ie_database/'.$p->video)}}" type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                                {{-- {{$p->video}} --}}
                                                            </td>
                                                            <td style="vertical-align:middle;text-align:center">{{ $p->ct }}</td>
                                                            <td style="vertical-align:middle;text-align:center">{{ $p->remark }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body p-0">
                                        <div style="width: 100%">
                                            <canvas id="HistoryCT"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button class="form-control btn-danger" onclick="goBack()">Go Back</button>
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
<script>
    var chartData_r = {
			labels: {!!json_encode($updated_at)!!},
			datasets: [{
				type: 'bar',
				label: 'Point Cicle Time',
				backgroundColor: "#4444444",
				data: {!!json_encode($ct)!!},
				borderColor: 'white',
				borderWidth: 2
			}]

    };
    window.onload = function () {
            var ctx_r = document.getElementById('HistoryCT').getContext('2d');

        window.myMixedChart = new Chart(ctx_r, {
			type: 'bar',
			data: chartData_r,
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Chart History Cicle Time'
				},
				tooltips: {
					mode: 'index',
					intersect: true
				},
                scales: {
                    yAxes: [{
                        ticks: {
                        }
                    }]
                }
			}
        });
    }
</script>
@endsection


@section('footer')

