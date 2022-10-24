@extends('layouts.app_6s')

@section('head','navbar','sidebar')

@section('contentheader')
<div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
<style>
    .horizontal-scroll {
        overflow: hidden;
        overflow-x: auto;
        clear: both;
        width: 100%;
    }

    .my-table {
        min-width: rem-calc(640);
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            AUDIT 6S
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#rules"  data-whatever="@mdo">
                                Rules
                            </button>
                        </div>
                        <div class="card-tools"style="padding-right:15px">
                            <button type="button" class="btn btn-outline-warning" onclick="goBack()">
                                Back
                            </button>
                        </div>
                    </div><!-- /.card-header all -->
                    <!-- .card-Body All -->
                    <div class="card-body">
                        {{-- cutting --}}
                            <div class="row">
                                <!-- col -->
                                    <div class="col-md-12">
                                    <!-- card -->
                                        <div class="card">
                                            <!-- card-header cutting -->
                                                <div class="card-header">
                                                    <h5 class="card-title">Cutting-Preperation</h5>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#view"  data-whatever="@mdo">
                                                              <i class="far fa-eye"></i>
                                                              <i class="far fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <!-- /.card-header Cutting-->
                                            <!-- card-body Cutting-->
                                                <div class="card-body">
                                                    <!-- content-->
                                                    <div class="tab-content p-0">

                                                        @if (session('alert'))
                                                            <div class="alert alert-success">
                                                                {{ session('alert') }}
                                                            </div>
                                                        @endif
                                                        @if (session('alert_error'))
                                                            <div class="alert alert-danger">
                                                                {{ session('alert_error') }}
                                                            </div>
                                                        @endif
                                                            <div class="col-md-12">
                                                                <div class="horizontal-scroll">
                                                                    <table class="my-table table-striped">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th><center>No</center></th>
                                                                                <th><center>Cell</center></th>
                                                                                <th><center>Category</center></th>
                                                                                <th><center>Audit Point</center></th>
                                                                                <th colspan="3"><center>Point</center></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php $no=0; @endphp
                                                                                @foreach($result as $result)
                                                                            @php $no++ @endphp
                                                                            <tr>
                                                                                <td class="text-center">{{$no}}</td>
                                                                                <td class="text-center px-4 ">{{$result['cell']}}</td>
                                                                                <td class="text-center px-4">{{$result['category']}}</td>
                                                                                <td class="text-center">{{$result['audit_point']}}</td>
                                                                                @php
                                                                                    if ($result['jumlah']<1) {
                                                                                        $point=4;
                                                                                    }elseif ($result['jumlah']<4) {
                                                                                        $point=3;
                                                                                    }elseif ($result['jumlah']<7) {
                                                                                        $point=2;
                                                                                    }elseif ($result['jumlah']<=10) {
                                                                                        $point=1;
                                                                                    }else{
                                                                                        $point=0;
                                                                                    }
                                                                                @endphp
                                                                                <td class="text-center"><input type="text" name="point" class="form-control" value="{{$point}}" readonly></td>
                                                                                <td class="text-center"><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#guideModal{{$result['id_list']}}"  data-whatever="@mdo">Guide</button></td>
                                                                                <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$result['id_list']}}-cutting"  data-whatever="@mdo">+</button></td>
                                                                            </tr>
                                                                                @endforeach
                                                                        </tbody>
                                                                        <tfoot>
                                                                            <tr>
                                                                                <th colspan="4"><center>Rata-Rata</center></th>
                                                                            <th colspan="3"><center></center></th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                    </div>
                                                <!-- /content-->
                                                </div>
                                            <!-- ./card-body Cutting-->
                                            <!-- card-footer Cutting-->
                                                <div class="card-footer">
                                                </div>
                                            <!-- /.card-footer Cutting-->
                                        </div>
                                    <!-- /.card -->
                                    </div>
                                <!-- /.col -->
                            </div>
                        {{-- /cutting --}}
                        {{-- Sewing --}}
                            <div class="row">
                                <!-- col -->
                                    <div class="col-md-12">
                                    <!-- card -->
                                        <div class="card">
                                            <!-- card-header Sewing -->
                                                <div class="card-header">
                                                    <h5 class="card-title">Sewing</h5>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#view2"  data-whatever="@mdo">
                                                              <i class="far fa-eye"></i>
                                                              <i class="far fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <!-- /.card-header Sewing-->
                                            <!-- card-body Sewing-->
                                                <div class="card-body">
                                                    <!-- content-->
                                                    <div class="tab-content p-0">

                                                        @if (session('alert'))
                                                            <div class="alert alert-success">
                                                                {{ session('alert') }}
                                                            </div>
                                                        @endif
                                                            <div class="col-md-12">
                                                                <div class="horizontal-scroll">
                                                                    <table class="my-table table-striped">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th><center>No</center></th>
                                                                                <th><center>Cell</center></th>
                                                                                <th><center>Category</center></th>
                                                                                <th><center>Audit Point</center></th>
                                                                                <th colspan="3"><center>Point</center></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php $no=0; @endphp
                                                                                @foreach($result2 as $result)
                                                                            @php $no++ @endphp
                                                                            <tr>
                                                                                <td class="text-center">{{$no}}</td>
                                                                                <td class="text-center px-4 ">{{$result['cell']}}</td>
                                                                                <td class="text-center px-4 ">{{$result['category']}}</td>
                                                                                @php
                                                                                    if ($result['jumlah']<1) {
                                                                                        $point=4;
                                                                                    }elseif ($result['jumlah']<4) {
                                                                                        $point=3;
                                                                                    }elseif ($result['jumlah']<7) {
                                                                                        $point=2;
                                                                                    }elseif ($result['jumlah']<=10) {
                                                                                        $point=1;
                                                                                    }else{
                                                                                        $point=0;
                                                                                    }
                                                                                @endphp
                                                                                <td class="text-center">{{$result['audit_point']}}</td>
                                                                                <td class="text-center"><input type="text" name="point" class="form-control" value="{{$point}}" readonly></td>
                                                                                {{--  {{$result['jumlah']}} --}}
                                                                                <td class="text-center"><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#guideModal{{$result['id_list']}}"  data-whatever="@mdo">Guide</button></td>
                                                                                <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$result['id_list']}}-sewing"  data-whatever="@mdo">+</button></td>

                                                                            </tr>
                                                                                @endforeach
                                                                        </tbody>

                                                                    </table>
                                                                </div>
                                                            </div>
                                                    </div>
                                                <!-- /content-->
                                                </div>
                                            <!-- ./card-body Sewing-->
                                            <!-- card-footer Sewing-->
                                                <div class="card-footer">
                                                </div>
                                            <!-- /.card-footer Sewing-->
                                        </div>
                                    <!-- /.card -->
                                    </div>
                                <!-- /.col -->
                            </div>
                        {{-- /Sewing --}}
                        {{-- Assembling --}}
                            <div class="row">
                                <!-- col -->
                                    <div class="col-md-12">
                                    <!-- card -->
                                        <div class="card">
                                            <!-- card-header Assembling -->
                                                <div class="card-header">
                                                    <h5 class="card-title">Assembling</h5>
                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#view3"  data-whatever="@mdo">
                                                              <i class="far fa-eye"></i>
                                                              <i class="far fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <!-- /.card-header Assembling-->
                                            <!-- card-body Assembling-->
                                                <div class="card-body">
                                                    <!-- content-->
                                                    <div class="tab-content p-0">

                                                        @if (session('alert'))
                                                            <div class="alert alert-success">
                                                                {{ session('alert') }}
                                                            </div>
                                                        @endif
                                                            <div class="col-md-12">
                                                                <div class="horizontal-scroll">
                                                                    <table class="my-table table-striped">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th><center>No</center></th>
                                                                                <th><center>Cell</center></th>
                                                                                <th><center>Category</center></th>
                                                                                <th><center>Audit Point</center></th>
                                                                                <th colspan="3"><center>Point</center></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @php $no=0; @endphp
                                                                                @foreach($result3 as $result)
                                                                            @php $no++ @endphp
                                                                            <tr>
                                                                                <td class="text-center">{{$no}}</td>
                                                                                <td class="text-center px-4">{{$result['cell']}}</td>
                                                                                <td class="text-center px-4">{{$result['category']}}</td>
                                                                                <td class="text-center">{{$result['audit_point']}}</td>
                                                                                @php
                                                                                    if ($result['jumlah']<1) {
                                                                                        $point=4;
                                                                                    }elseif ($result['jumlah']<4) {
                                                                                        $point=3;
                                                                                    }elseif ($result['jumlah']<7) {
                                                                                        $point=2;
                                                                                    }elseif ($result['jumlah']<=10) {
                                                                                        $point=1;
                                                                                    }else{
                                                                                        $point=0;
                                                                                    }
                                                                                @endphp
                                                                                <td class="text-center"><input class="form-control" type="text" name="point" value="{{$point}}" readonly></td>
                                                                                {{--  {{$result['jumlah']}} --}}
                                                                                <td class="text-center"><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#guideModal{{$result['id_list']}}"  data-whatever="@mdo">Guide</button></td>
                                                                                <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$result['id_list']}}-assy"  data-whatever="@mdo">+</button></td>
                                                                            </tr>
                                                                                @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                    </div>
                                                <!-- /content-->
                                                </div>
                                            <!-- ./card-body Assembling-->
                                            <!-- card-footer Assembling-->
                                                <div class="card-footer">
                                                </div>
                                            <!-- /.card-footer Assembling-->
                                        </div>
                                    <!-- /.card -->
                                    </div>
                                <!-- /.col -->
                            </div>
                        {{-- /Assembling --}}
                    </div><!-- /.card-body -->
                </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
    <!-- /.content -->
{{-- Tambah data modal --}}
    {{-- cutting modal --}}
        @foreach($modal as $key=>$a)
        <div class="modal fade" id="exampleModal{{$a['id_list']}}-cutting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Foto<br> <center><b>{{$a['audit_point']}}</b></center></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_checklist{{$a['id_list']}}-{{$a['id_area']}}" method="post" action="{{url('/audit/save')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_cell" value="{{$a['id_cell']}}">
                            <input type="hidden" name="status" value="Not Yet">
                            <input type="hidden" name="id_area" value="{{$a['id_area']}}">
                            <input type="hidden" name="id_list" value="{{$a['id_list']}}">
                            <input type="hidden" name="id_auditor" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="team" value="{{ Auth::user()->name }}">
                    <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"><i>Pilih Auditor</i>*</label><br>
                                    <select class="form-control list_auditor" name="auditor" required>
                                            {{-- <option value="{{$a->nik}}">{{$a->nama_auditor}}</option> --}}
                                            <option value=""><i>--------------</i></option>
                                            
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    @php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $tanggal=date("Y-m-d H:i:s");
                                    @endphp
                                    <label for="recipient-name" class="col-form-label"><i>Tanggal Audit</i>*</label><br>
                                    <input type="date" class="form-control" name="tanggal" required>
                                </div>
                            </div>
                        </div>
                        @if ($a['id_list']==20||$a['id_list']==17||$a['id_list']==13)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                            <div class='ChkSelect{{$a['id_list']}}-{{$a['id_area']}}'>
                                            <input type="checkbox" value="ya" name="result" class="ChkSelect{{$a['id_list']}}-{{$a['id_area']}}" ID="ChkSelect{{$a['id_list']}}-{{$a['id_area']}}">Ya<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                                <input type="checkbox" value="tidak" name="result" class="ChkSelect2{{$a['id_list']}}-{{$a['id_area']}}" ID="ChkSelect2{{$a['id_list']}}-{{$a['id_area']}}">Tidak<br/>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        @elseif ($a['id_list']==15)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                            <div class='ChkSelect2{{$a['id_list']}}-{{$a['id_area']}}'>
                                                <input type="checkbox" name="stat" value="Noting" class="ChkSelect2{{$a['id_list']}}-{{$a['id_area']}}" ID="ChkSelect2{{$a['id_list']}}-{{$a['id_area']}}">Tidak ada<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <center>
                                            <div class='ChkSelect3{{$a['id_list']}}-{{$a['id_area']}}'>
                                                <input type="checkbox" name="stat" value="Broke" class="ChkSelect3{{$a['id_list']}}-{{$a['id_area']}}" ID="ChkSelect3{{$a['id_list']}}-{{$a['id_area']}}">Rusak<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                        <div class='ChkSelect{{$a['id_list']}}-{{$a['id_area']}}'>
                                                <input type="checkbox" name="stat" value="Available" class="ChkSelect{{$a['id_list']}}-{{$a['id_area']}}" ID="ChkSelect{{$a['id_list']}}-{{$a['id_area']}}">Ada<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>

                            </div>
                        @elseif ($a['id_list']==11)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                            <div class='ChkSelect2{{$a['id_list']}}-{{$a['id_area']}}'>
                                                <input type="checkbox" name="stat" value="Noting" class="ChkSelect2{{$a['id_list']}}-{{$a['id_area']}}" ID="ChkSelect2{{$a['id_list']}}-{{$a['id_area']}}">Tidak ada<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <center>
                                            <div class='ChkSelect3{{$a['id_list']}}-{{$a['id_area']}}'>
                                                <input type="checkbox" name="stat" value="Broke" class="ChkSelect3{{$a['id_list']}}-{{$a['id_area']}}" ID="ChkSelect3{{$a['id_list']}}-{{$a['id_area']}}">Tidak Mudah Terjangkau<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                        <div class='ChkSelect{{$a['id_list']}}-{{$a['id_area']}}'>
                                                <input type="checkbox" name="stat" value="Available" class="ChkSelect{{$a['id_list']}}-{{$a['id_area']}}" ID="ChkSelect{{$a['id_list']}}-{{$a['id_area']}}">Ada<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>

                            </div>
                        @else
                            {{-- =======================================================SOAL UNTUK PERTANYAAN BIASA========================================================== --}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                            <input type="file" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input class="form-control" name="description[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                            <input type="file" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input class="form-control" name="description[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                            <input type="file" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input class="form-control" name="description[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                            <input type="file" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input class="form-control" name="description[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                            <input type="file" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input class="form-control" name="description[]">
                                        </div>
                                    </div>
                                </div>
                            {{-- =======================================================/SOAL UNTUK PERTANYAAN BIASA========================================================== --}}
                        @endif
                    </div>
                        <div class="modal-footer">
                            <p style="font-family:'Courier New';color:red;font-style: italic;">Image harus berorientasi landscape.</p>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="Submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    {{-- sewing modal --}}
        @foreach($modal2 as $result)
        <div class="modal fade" id="exampleModal{{$result['id_list']}}-sewing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Foto<br> <center><b>{{$result['audit_point']}}</b></center></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_checklist{{$result['id_list']}}-{{$result['id_area']}}" method="post" action="{{url('/audit/save')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_cell" value="{{$result['id_cell']}}">
                            <input type="hidden" name="id_area" value="{{$result['id_area']}}">
                            <input type="hidden" name="id_list" value="{{$result['id_list']}}">
                            <input type="hidden" name="id_auditor" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="team" value="{{ Auth::user()->name }}">
                    <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"><i>Pilih Auditor</i>*</label><br>
                                    <select class="form-control list_auditor" name="auditor" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    @php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $tanggal=date("yyyy-mm-dd");
                                    @endphp
                                    <label for="recipient-name" class="col-form-label"><i>Tanggal Audit</i>*</label><br>
                                    <input type="date" class="form-control" name="tanggal" value="{{$tanggal}}" required>
                                </div>
                            </div>
                        </div>
                        @if ($result['id_list']==20||$result['id_list']==17||$result['id_list']==13)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                            <div class='ChkSelect{{$result['id_list']}}-{{$result['id_area']}}'>
                                                <input type="checkbox" value="ya" name="result" class="ChkSelect{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect{{$result['id_list']}}-{{$result['id_area']}}">Ya<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                                <input type="checkbox" value="tidak" name="result" class="ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}">Tidak<br/>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        @elseif ($result['id_list']==15 || $result['id_list']==11)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                            <div class='ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}'>
                                                <input type="checkbox" name="stat" value="Noting" class="ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}">Tidak ada<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <center>
                                            <div class='ChkSelect3{{$result['id_list']}}-{{$result['id_area']}}'>
                                                <input type="checkbox" name="stat" value="Broke" class="ChkSelect3{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect3{{$result['id_list']}}-{{$result['id_area']}}">Rusak<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                        <div class='ChkSelect{{$result['id_list']}}-{{$result['id_area']}}'>
                                                <input type="checkbox" name="stat" value="Available" class="ChkSelect{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect{{$result['id_list']}}-{{$result['id_area']}}">Ada<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- =======================================================SOAL UNTUK PERTANYAAN BIASA========================================================== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                            <input type="file" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input class="form-control" name="description[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                            <input type="file" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input class="form-control" name="description[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                            <input type="file" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input class="form-control" name="description[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                            <input type="file" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input class="form-control" name="description[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                            <input type="file" name="image[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input class="form-control" name="description[]">
                                        </div>
                                    </div>
                                </div>
                            {{-- =======================================================/SOAL UNTUK PERTANYAAN BIASA========================================================== --}}
                        @endif
                    </div>
                            <div class="modal-footer">
                            <p style="font-family:'Courier New';color:red;font-style: italic;">Image harus berorientasi landscape.</p>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="Submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        @endforeach
    {{-- assembling modal --}}
        @foreach($modal3 as $result)
            <div class="modal fade" id="exampleModal{{$result['id_list']}}-assy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Audit<br> <center><b>{{$result['audit_point']}}</b></center></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="form_checklist{{$result['id_list']}}-{{$result['id_area']}}" method="post" action="{{url('/audit/save')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id_cell" value="{{$result['id_cell']}}">
                                <input type="hidden" name="id_area" value="{{$result['id_area']}}">
                                <input type="hidden" name="id_list" value="{{$result['id_list']}}">
                                <input type="hidden" name="id_auditor" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="team" value="{{ Auth::user()->name }}">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label"><i>Pilih Auditor</i>*</label><br>
                                        <select class="form-control list_auditor" name="auditor" required>
                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        @php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $tanggal=date("Y-m-d H:i:s");
                                        @endphp
                                        <label for="recipient-name" class="col-form-label"><i>Tanggal Audit</i>*</label><br>
                                        <input type="date" class="form-control" name="tanggal" value="{{$tanggal}}" required>
                                    </div>
                                </div>
                            </div>
                            @if ($result['id_list']==20||$result['id_list']==17||$result['id_list']==13)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <center>
                                                <div class='ChkSelect{{$result['id_list']}}-{{$result['id_area']}}'>
                                                    <input type="checkbox" value="ya" name="result" class="ChkSelect{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect{{$result['id_list']}}-{{$result['id_area']}}">Ya<br/>
                                                    <div class="addme">
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <center>
                                                    <input type="checkbox" value="tidak" name="result" class="ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}">Tidak<br/>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($result['id_list']==15)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <center>
                                                <div class='ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}'>
                                                    <input type="checkbox" name="stat" value="Noting" class="ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}">Tidak ada<br/>
                                                    <div class="addme">
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <center>
                                                <div class='ChkSelect3{{$result['id_list']}}-{{$result['id_area']}}'>
                                                    <input type="checkbox" name="stat" value="Broke" class="ChkSelect3{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect3{{$result['id_list']}}-{{$result['id_area']}}">Rusak<br/>
                                                    <div class="addme">
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <center>
                                            <div class='ChkSelect{{$result['id_list']}}-{{$result['id_area']}}'>
                                                    <input type="checkbox" name="stat" value="Available" class="ChkSelect{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect{{$result['id_list']}}-{{$result['id_area']}}">Ada<br/>
                                                    <div class="addme">
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            @elseif ($result['id_list']==11)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <center>
                                                <div class='ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}'>
                                                    <input type="checkbox" name="stat" value="Noting" class="ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect2{{$result['id_list']}}-{{$result['id_area']}}">Tidak ada<br/>
                                                    <div class="addme">
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <center>
                                                <div class='ChkSelect3{{$result['id_list']}}-{{$result['id_area']}}'>
                                                    <input type="checkbox" name="stat" value="Broke" class="ChkSelect3{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect3{{$result['id_list']}}-{{$result['id_area']}}">Tidak Mudah Terjangkau<br/>
                                                    <div class="addme">
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <center>
                                            <div class='ChkSelect{{$result['id_list']}}-{{$result['id_area']}}'>
                                                    <input type="checkbox" name="stat" value="Available" class="ChkSelect{{$result['id_list']}}-{{$result['id_area']}}" ID="ChkSelect{{$result['id_list']}}-{{$result['id_area']}}">Ada<br/>
                                                    <div class="addme">
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>

                                </div>
                            @else
                                {{-- =======================================================SOAL UNTUK PERTANYAAN BIASA========================================================== --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                                <input type="file" name="image[]">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Description</label>
                                                <input class="form-control" name="description[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                                <input type="file" name="image[]">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Description</label>
                                                <input class="form-control" name="description[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                                <input type="file" name="image[]">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Description</label>
                                                <input class="form-control" name="description[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                                <input type="file" name="image[]">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Description</label>
                                                <input class="form-control" name="description[]">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Ambil foto dengan landscape</label><br>
                                                <input type="file" name="image[]">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Description</label>
                                                <input class="form-control" name="description[]">
                                            </div>
                                        </div>
                                    </div>
                                {{-- =======================================================/SOAL UNTUK PERTANYAAN BIASA========================================================== --}}
                            @endif
                        </div>
                            <div class="modal-footer">
                                <p style="font-family:'Courier New';color:red;font-style: italic;">Image harus berorientasi landscape.</p>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="Submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
{{-- modal guide --}}
    @foreach($modal as $result)
        <div class="modal fade" id="guideModal{{$result['id_list']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Guide<br></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div style="overflow-x:auto;">
                            <table class="table table-bordered" style="margin-bottom: 0px">
                                    <tr>
                                        <td rowspan="2"><center><img src="{{ asset('dist/img/AdminLTELogo v1.png') }}" height="100px" width="100px"></center></td>
                                        <td colspan="2"><center><strong><a class="h3"><strong>PARKLAND WORLD INDONESIA</strong></center></a></td>
                                        <td rowspan="2"><center><img src="{{ asset('images/6s/notyet.png') }}" height="100px" width="100px"></center></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><center><strong>Prosedur Standar Operasi</strong></center></td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle"><center><a class="h4"><strong>{{ $result['category'] }}</strong></a></center></td>
                                        <td class="align-middle" colspan="2"><center><a class="h4"><strong>{{ $result['audit_point'] }}</strong></a></center></td>
                                        <td class="align-middle"><center><img src="{{ asset('images/6s/logo/'.$result['category'].'.png') }}" height="100px" width="100px"></center></td>
                                    </tr>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td class="align-middle"><center><img src="{{ asset('images/6s/guide/'.$result['guide_false'].'.png') }}" style="width:300px; height:auto;"></center></td>
                                    <td class="align-middle"><center><img src="{{ asset('images/6s/guide/'.$result['guide_true'].'.png') }}" style="width:300px; height:auto;"></center></td>
                                </tr>
                                <tr>
                                    <td class="align-middle"><center><a class="text-danger font-weight-bold h3">FALSE</a></center></td>
                                    <td class="align-middle"><center><a class="text-success font-weight-bold h3">TRUE</a></center></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
{{-- /Tambah data modal --}}
{{-- view modal --}}
    {{-- cutting view modal --}}
         <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Upload Cutting<br></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="#" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered" style="width:100%, height=100%">
                                        <thead class="thead-dark">
                                            <tr style="font-size: 90%;">
                                                <th width="2.5%"class="align-middle">
                                                    <center><a id="action_cutting">Action</a>
                                                        <input type="button" class="btn btn-danger btn-block btn-sm btnDelete" id="btnDelete_cutting" style="display: none" value="Delete">
                                                    </center>
                                                </th>
                                                <th class="align-middle"><center>No</center></th>
                                                <th class="align-middle"><center>Audit Point</center></th>
                                                <th class="align-middle"><center>Image</center></th>
                                                <th class="align-middle"><center>Description</center></th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 90%;">
                                            @php $no=0; @endphp
                                            @foreach($modal_view as $result)
                                            @php $no++@endphp
                                        {{ csrf_field() }}
                                            <tr>
                                                <input type="hidden" name="id_cell" value="{{$result->id_cell}}">
                                                <td class="align-middle"><center><input type="checkbox" id="check_cutting{{ $no }}" name="select[]" value="{{$result->id_audit}}" onclick="MyFunctionCutting({{ $no }})">
                                                </center></td>
                                                <td class="align-middle"><center>{{$result->id_list}}</center></td>
                                                <td class="align-middle"><center>{{$result->audit_point}}</center></td>
                                                <td class="align-middle"><center><img src="/images/6s/{{ $result->image }}" height="150px" width="150px"/>
                                                <input type="hidden" name="image[]" value="{{ $result->image }}">
                                                <input type="hidden" name="id_list[]" value="{{$result->id_list}}">
                                                </center></td>
                                                <td class="align-middle"><center>{{$result->description}}</center></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button class="btn btn-secondary">Delete Select</button> --}}
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{-- sewing view modal --}}
         <div class="modal fade" id="view2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Upload Sewing<br></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="#" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered" style="width:100%, height=100%">
                                        <thead class="thead-dark">
                                            <tr style="font-size: 90%;">
                                                <th width="2.5%"class="align-middle">
                                                    <center><a id="action_sewing">Action</a>
                                                        <input type="button" class="btn btn-danger btn-block btn-sm btnDelete" id="btnDelete_sewing" style="display: none" value="Delete">
                                                    </center>
                                                </th>
                                                <th class="align-middle"><center>No</center></th>
                                                <th class="align-middle"><center>Audit Point</center></th>
                                                <th class="align-middle"><center>Image</center></th>
                                                <th class="align-middle"><center>Description</center></th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 90%;">
                                            @php $no=0; @endphp
                                            @foreach($modal_view2 as $result)
                                            @php $no++@endphp
                                            {{ csrf_field() }}
                                            <tr>
                                                <input type="hidden" name="id_cell" value="{{$result->id_cell}}">
                                                <td class="align-middle"><center><input type="checkbox" id="check_sewing{{ $no }}" name="select[]" value="{{$result->id_audit}}" onclick="MyFunctionSewing({{ $no }})">
                                                </center></td>
                                                <td class="align-middle"><center>{{$result->id_list}}</center></td>
                                                <td class="align-middle"><center>{{$result->audit_point}}</center></td>
                                                <td class="align-middle"><center><img src="/images/6s/{{ $result->image }}" height="150px" width="150px"/>
                                                <input type="hidden" name="image[]" value="{{ $result->image }}">
                                                <input type="hidden" name="id_list[]" value="{{$result->id_list}}">
                                                </center></td>
                                                <td class="align-middle"><center>{{$result->description}}</center></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button class="btn btn-secondary">Delete Select</button> --}}
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    {{-- assembling view modal --}}
        <div class="modal fade" id="view3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View Upload Assembling<br></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="#" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered" style="width:100%, height=100%">
                                        <thead class="thead-dark">
                                            <tr style="font-size: 90%;">
                                                <th width="2.5%"class="align-middle">
                                                    <center><a id="action_assy">Action</a>
                                                        <input type="button" class="btn btn-danger btn-block btn-sm btnDelete" id="btnDelete_assy" style="display: none" value="Delete">
                                                    </center>
                                                </th>
                                                <th class="align-middle"><center>No</center></th>
                                                <th class="align-middle"><center>Audit Point</center></th>
                                                <th class="align-middle"><center>Image</center></th>
                                                <th class="align-middle"><center>Description</center></th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 90%;">
                                            @php $no=0; @endphp
                                            @foreach($modal_view3 as $result)
                                            @php $no++@endphp
                                            {{ csrf_field() }}
                                            <tr>
                                                <input type="hidden" name="id_cell" value="{{$result->id_cell}}">
                                                <td class="align-middle"><center><input type="checkbox" id="check_assy{{ $no }}" name="select[]" value="{{$result->id_audit}}" onclick="MyFunctionAssy({{ $no }})">
                                                </center></td>
                                                <td class="align-middle"><center>{{$result->id_list}}</center></td>
                                                <td class="align-middle"><center>{{$result->audit_point}}</center></td>
                                                <td class="align-middle"><center><img src="/images/6s/{{ $result->image }}" height="150px" width="150px"/>
                                                <input type="hidden" name="image[]" value="{{ $result->image }}">
                                                <input type="hidden" name="id_list[]" value="{{$result->id_list}}">
                                                </center></td>
                                                <td class="align-middle"><center>{{$result->description}}</center></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{-- <button class="btn btn-secondary">Delete Select</button> --}}
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
{{-- view modal --}}
{{-- rules modal --}}
    <div class="modal fade" id="rules" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rules 6s Audit<br></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <a>1. Audit di ulang bila audit di lakukan lebih dari 1 hari.</a><br>
                    <a>2. Ambil atau upload foto harus berbentuk <i><b>landscape.</b></i></a><br>
                    <a>3. Berikan kritik dan saran dengan <a href="#">cick link berikut ini</a>.</a><br>
            </div>
        </div>
    </div>
{{-- rules modal --}}
<script> //script back
    function goBack() {
    window.history.back();
    }
</script>

<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
{{-- script show auditor  --}}
    <script type="text/javascript">
            $(document).ready(function(){
                var id = document.getElementsByName('id_auditor')[0].value;
                $.ajax({
                        url:"{{ route('audit.show.list_cell') }}",
                        method:'GET',
                        data:{id:id},
                        dataType:'json',
                        success:function(data)
                        {
                            $('.list_auditor').html(data.list_auditor);
                        }
                    })
            });
            $(document).on('click', '.btnDelete', function(){
                var val = [];
                $('input[name="select[]"]:checked').each(function(i){
                    val[i] = $(this).val();
                });
                $.ajax({
                    method:'POST', 
                    url:"{{ route('audit.multiple_delete.manage') }}",
                    data:{val:val,"_token": "{{ csrf_token() }}"},
                    dataType:'json',
                    success:function(data)
                    {
                        // $('#tes').html(data.success);
                        alert(data.success);
                        location.reload();
                    }
                })
            });
    </script>
    <script type="text/javascript">
        function MyFunctionCutting(id)
        {
            var checkbox = document.getElementById("check_cutting"+id);
            if(checkbox.checked == true){
                document.getElementById("action_cutting").style.display = "none";
                document.getElementById("btnDelete_cutting").style.display = "block";
            }else{
                document.getElementById("action_cutting").style.display = "block";
                document.getElementById("btnDelete_cutting").style.display = "none";
            }
        }
        function MyFunctionSewing(id)
        {
            var checkbox = document.getElementById("check_sewing"+id);
            if(checkbox.checked == true){
                document.getElementById("action_sewing").style.display = "none";
                document.getElementById("btnDelete_sewing").style.display = "block";
            }else{
                document.getElementById("action_sewing").style.display = "block";
                document.getElementById("btnDelete_sewing").style.display = "none";
            }
        }
        function MyFunctionAssy(id)
        {
            var checkbox = document.getElementById("check_assy"+id);
            if(checkbox.checked == true){
                document.getElementById("action_assy").style.display = "none";
                document.getElementById("btnDelete_assy").style.display = "block";
            }else{
                document.getElementById("action_assy").style.display = "block";
                document.getElementById("btnDelete_assy").style.display = "none";
            }
        }
    </script>
    

@endsection

@section('footer')


