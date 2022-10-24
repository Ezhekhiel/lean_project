@extends('ie_database.layouts.app_ie_database')

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
                                {{-- left main body --}}
                                    <div class="col-md-8">
                                        <div class="card card-body">
                                            @foreach($data as $p)
                                            <tr>
                                                <a class="test-popup-link" href="{{url('/images/lean/ie_database/'.$p->image )}}">
                                                    <td style="vertical-align:middle;text-align:center"><center><img src="{{url('/images/lean/ie_database/'.$p->image)}}" height="100%" width="100%"/></center></td>
                                                </a>
                                            </tr>
                                            @endforeach
                                        </div>
                                    </div>
                                {{--  /.left main body  --}}
                                {{-- left main body --}}
                                    <div class="col-md-4">
                                        <div class="row">
                                            @foreach($data as $p)
                                                @if ($p->image_sws!="-")
                                                    <div class="col-md-12">
                                                        <div class="card card-body">
                                                            <tr>
                                                                <a class="test-popup-link" href="{{url('/images/lean/ie_database/'.$p->image_sws )}}">
                                                                    <td style="vertical-align:middle;text-align:center"><center><img  src="{{url('/images/lean/ie_database/'.$p->image_sws)}}" height="100%" width="100%"/></center></td>
                                                                </a>
                                                            </tr>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <div class="col-md-12">
                                                <div class="card card-primary card-tabs">
                                                    <div class="card-header p-0 pt-1">
                                                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                            <li class="nav-item">
                                                            <a class="nav-link active" id="custom-tabs-one-video-tab" data-toggle="pill"
                                                                href="#custom-tabs-one-video" role="tab" aria-controls="custom-tabs-one-video"
                                                                aria-selected="true">Video</a>
                                                            </li>
                                                            <li class="nav-item">
                                                            <a class="nav-link" id="custom-tabs-one-machine-tab" data-toggle="pill"
                                                                href="#custom-tabs-one-machine" role="tab" aria-controls="custom-tabs-one-machine"
                                                                aria-selected="false">machine</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content" id="custom-tabs-one-tabContent">
                                                            <div class="tab-pane fade show active" id="custom-tabs-one-video" role="tabpanel"aria-labelledby="custom-tabs-one-video-tab">
                                                                <video width="100%" height="100%" controls>
                                                                    @foreach($data as $p)
                                                                        <source src="{{url('/video/lean/ie_database/'.$p->video_process)}}" type="video/mp4">
                                                                    @endforeach
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            </div>
                                                            <div class="tab-pane fade" id="custom-tabs-one-machine" role="tabpanel"aria-labelledby="custom-tabs-one-machine-tab">
                                                                <div class="card card-body">
                                                                <div style="overflow-x:auto;">
                                                                    <div class="row">
                                                                        {{-- image machine --}}
                                                                            <div class="col-md-6">
                                                                                <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>Mesin</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            @foreach ($data as $a)
                                                                                                @if ($a->image_machine_1!="-"&&$a->image_machine_1!="")
                                                                                                    <td style='vertical-align:middle;text-align:center'>
                                                                                                        <a class='test-popup-link' href='{{url('/images/lean/ie_database/machine/'.$p->image_machine_1)}}'>
                                                                                                            <img  src='{{url('/images/lean/ie_database/machine/'.$p->image_machine_1)}}' height='70px' width='120px'/>
                                                                                                        </a>
                                                                                                    </td>
                                                                                                @else
                                                                                                    <td style='vertical-align:middle;text-align:center'>
                                                                                                        <a class='test-popup-link' href='{{url('/images/lean/ie_database/spec machine/'.$p->image_machine_1)}}.PNG'>
                                                                                                            <img  src='{{url('/images/lean/ie_database/spec machine/'.$p->image_machine_1)}}.PNG' height='70px' width='120px'/>
                                                                                                        </a>
                                                                                                    </td>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </tr>
                                                                                        <tr>
                                                                                            @foreach ($data as $a)
                                                                                                @if ($a->image_machine_2!="-"&&$a->image_machine_2!="")
                                                                                                    <td style='vertical-align:middle;text-align:center'>
                                                                                                        <a class='test-popup-link' href='{{url('/images/lean/ie_database/machine/'.$p->image_machine_2)}}'>
                                                                                                            <img  src='{{url('/images/lean/ie_database/machine/'.$p->image_machine_2)}}' height='70px' width='120px'/>
                                                                                                        </a>
                                                                                                    </td>
                                                                                                @else
                                                                                                    <td style='vertical-align:middle;text-align:center'>
                                                                                                        <a class='test-popup-link' href='{{url('/images/lean/ie_database/spec machine/'.$p->image_machine_2)}}.PNG'>
                                                                                                            <img  src='{{url('/images/lean/ie_database/spec machine/'.$p->image_machine_2)}}.PNG' height='70px' width='120px'/>
                                                                                                        </a>
                                                                                                    </td>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </tr>
                                                                                        <tr>
                                                                                            @foreach ($data as $a)
                                                                                                @if ($a->image_machine_3!="-"&&$a->image_machine_3!="")
                                                                                                    <td style='vertical-align:middle;text-align:center'>
                                                                                                        <a class='test-popup-link' href='{{url('/images/lean/ie_database/machine/'.$p->image_machine_3)}}'>
                                                                                                            <img  src='{{url('/images/lean/ie_database/machine/'.$p->image_machine_3)}}' height='70px' width='120px'/>
                                                                                                        </a>
                                                                                                    </td>
                                                                                                @else
                                                                                                    <td style='vertical-align:middle;text-align:center'>
                                                                                                        <a class='test-popup-link' href='{{url('/images/lean/ie_database/spec machine/'.$p->image_machine_3)}}.PNG'>
                                                                                                            <img  src='{{url('/images/lean/ie_database/spec machine/'.$p->image_machine_3)}}.PNG' height='70px' width='120px'/>
                                                                                                        </a>
                                                                                                    </td>
                                                                                                @endif
                                                                                            @endforeach
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        {{-- image spec machine --}}
                                                                        <div class="col-md-6">
                                                                            <table id="datatable-keytable" class="table table-striped table-striped">
                                                                                <thead>
                                                                                        <tr>
                                                                                            <th>Spec</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        @foreach ($data as $a)
                                                                                            @if ($a->image_spec_1!="-"&&$a->image_spec_1="")
                                                                                                <td style='vertical-align:middle;text-align:center'>
                                                                                                    <a class='test-popup-link' href='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_1)}}'>
                                                                                                        <img  src='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_1)}}' height='70px' width='120px'/>
                                                                                                    </a>
                                                                                                </td>
                                                                                            @else
                                                                                                <td style='vertical-align:middle;text-align:center'>
                                                                                                    <a class='test-popup-link' href='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_1)}}.PNG'>
                                                                                                        <img  src='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_1)}}.PNG' height='70px' width='120px'/>
                                                                                                    </a>
                                                                                                </td>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </tr>
                                                                                    <tr>
                                                                                        @foreach ($data as $a)
                                                                                            @if ($a->image_spec_2!="-"&&$a->image_spec_2!="")
                                                                                                <td style='vertical-align:middle;text-align:center'>
                                                                                                    <a class='test-popup-link' href='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_2)}}'>
                                                                                                        <img  src='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_2)}}' height='70px' width='120px'/>
                                                                                                    </a>
                                                                                                </td>
                                                                                            @else
                                                                                                <td style='vertical-align:middle;text-align:center'>
                                                                                                    <a class='test-popup-link' href='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_2)}}.PNG'>
                                                                                                        <img  src='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_2)}}.PNG' height='70px' width='120px'/>
                                                                                                    </a>
                                                                                                </td>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </tr>
                                                                                    <tr>
                                                                                        @foreach ($data as $a)
                                                                                            @if ($a->image_spec_3!="-"&&$a->image_spec_3!="")
                                                                                                <td style='vertical-align:middle;text-align:center'>
                                                                                                    <a class='test-popup-link' href='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_3)}}'>
                                                                                                        <img  src='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_3)}}' height='70px' width='120px'/>
                                                                                                    </a>
                                                                                                </td>
                                                                                            @else
                                                                                                <td style='vertical-align:middle;text-align:center'>
                                                                                                    <a class='test-popup-link' href='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_3)}}.PNG'>
                                                                                                        <img  src='{{url('/images/lean/ie_database/spec machine/'.$p->image_spec_3)}}.PNG' height='70px' width='120px'/>
                                                                                                    </a>
                                                                                                </td>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="form-control btn-danger" onclick="goBack()">Go Back</button>
                                                {{-- @if (empty(Auth::user()->role_id))
                                                    <form action='{{url('/ie_base/cs/ie')}}'>
                                                @else
                                                    <form action='{{url('/ie_base/cs')}}'>
                                                @endif
                                                    <button type="submit" class="form-control btn-danger">Back</button>
                                                </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                {{--  /.left main body  --}}
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
@endsection


@section('footer')

