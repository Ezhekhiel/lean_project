@extends('layouts.app_index')

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

                    </div><!-- /.card-header -->
                    <!-- .card-Body -->
                    <div class="card-body">
                        {{-- <h5 class="card-title">Cutting-Preperation</h5> --}}
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#view0"  data-whatever="@mdo">
                                    <i class="far fa-eye"></i>
                                    <i class="far fa-eye"></i>
                            </button>
                        </div>
                        <BR>
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
                                                        @foreach($data as $result)
                                                    @php $no++; @endphp
                                                    <tr>
                                                           <td class="text-center"><center>{{$no}}</center></td>
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
                                                           <td class="text-center"><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#guideModal{{$result['id_list']}}"  data-whatever="@mdo">Guide</button></td>
                                                           <td class="text-center"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$result['id_list']}}"  data-whatever="@mdo">+</button></td>
                                                    </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                        <!-- /content-->
                    </div><!-- /.card-body -->
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
@foreach($data as $result)
    <div class="modal fade" id="exampleModal{{$result['id_list']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Foto Not Reguler<br> <center><b>{{$result['audit_point']}}</b></center></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">
                        <form id="form_checklist{{$result['id_list']}}-b" method="post" action="{{url('/audit/save')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_cell" value="{{$result['id_cell']}}">
                        <input type="hidden" name="id_list" value="{{$result['id_list']}}">
                        {{-- <input type="hidden" name="id_auditor" value=""> --}}
                        {{-- <input type="hidden" name="team" value=""> --}}
                            <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label"><i>Pilih Auditor</i>*</label><br>
                                    <input type="text" name="auditor" class="form-control">
                                    {{-- <select class="form-control list_auditor" name="auditor" required>
                                    </select> --}}
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
                        @if ($result['id_list']==20||$result['id_list']==17||$result['id_list']==13)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">    
                                    <center>
                                            <div class='ChkSelect{{$result['id_list']}}-b'>
                                                <input type="checkbox" value="ya" name="result" class="ChkSelect{{$result['id_list']}}-b" ID="ChkSelect{{$result['id_list']}}-b"> Ya<br/>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                            <input type="checkbox" value="tidak" name="result" class="ChkSelect2{{$result['id_list']}}-b" ID="ChkSelect2{{$result['id_list']}}-b"> Tidak<br/>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        @elseif ($result['id_list']==15)
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <center>
                                            <div class='ChkSelect2{{$result['id_list']}}-b'>
                                                <input type="checkbox" name="stat" value="Noting" class="ChkSelect2{{$result['id_list']}}-b" ID="ChkSelect2{{$result['id_list']}}-b">
                                                Tidak ada<br/>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <center>
                                            <div class='ChkSelect3{{$result['id_list']}}-b'>
                                                <input type="checkbox" name="stat" value="Broke" class="ChkSelect3{{$result['id_list']}}-b" ID="ChkSelect3{{$result['id_list']}}-b">Rusak<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                        <div class='ChkSelect{{$result['id_list']}}-b'>
                                                <input type="checkbox" name="stat" value="Available" class="ChkSelect{{$result['id_list']}}-b" ID="ChkSelect{{$result['id_list']}}-b">Ada<br/>
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
                                            <div class='ChkSelect{{$result['id_list']}}-b'>
                                                <input type="checkbox" name="stat" value="Noting" class="ChkSelect2{{$result['id_list']}}-b" ID="ChkSelect2{{$result['id_list']}}-b">Tidak ada<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <center>
                                            <div class='ChkSelect3{{$result['id_list']}}-b'>
                                                <input type="checkbox" name="stat" value="Broke" class="ChkSelect3{{$result['id_list']}}-b" ID="ChkSelect3{{$result['id_list']}}-b">Tidak Mudah Terjangkau<br/>
                                                <div class="addme">
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <center>
                                        <div class='ChkSelect{{$result['id_list']}}-b'>
                                                <input type="checkbox" name="stat" value="Available" class="ChkSelect{{$result['id_list']}}-b" ID="ChkSelect{{$result['id_list']}}-b">Ada<br/>
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
@foreach($data as $result)
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
                        {{-- <table class="table">
                                <tr class="row m-0">
                                    <td class="col-2" rowspan="2"><center><img src="{{ asset('dist/img/AdminLTELogo v1.png') }}" alt=""></center></td>
                                    <td class="col-8"><center><a class="h4"><strong>PT PARKLAND WORLD INDONESIA</strong></a></center></td>
                                    <td class="col-2" rowspan="2"><center>image</center></td>
                                </tr>
                                <tr class="row m-0">
                                    <td class="col-8"><center><a class="h5"><strong>{{ $result['audit_point'] }}</strong></a></center></td>
                                </tr>
                        </table> --}}
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
                    {{-- <p>{{ $result['guide_true'] }}</p>
                    <p>{{ $result['guide_false'] }}</p> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach


{{-- modal --}}
    {{-- cutting view modal --}}
            <div class="modal fade" id="view0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">View Upload<br></h5>
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
                                                        <center><a id="action">Action</a>
                                                            <input type="button" class="btn btn-danger btn-block btn-sm btnDelete" id="btnDelete" style="display: none" value="Delete">
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
                                                    <td class="align-middle"><center><input type="checkbox" id="check{{ $no }}" name="select[]" value="{{$result->id_audit}}" onclick="MyFunction({{ $no }})">
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
{{-- Rules --}}
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
<script>
function goBack() {
  window.history.back();
}
</script>
<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
    {{-- script show auditor  --}}
    <script type="text/javascript">
        // $(document).ready(function(){
        //     var id = document.getElementsByName('id_auditor')[0].value;
        //     $.ajax({
        //         url:"{{ route('audit.show.list_cell') }}",
        //         method:'GET',
        //         data:{id:id},
        //         dataType:'json',
        //         success:function(data)
        //         {
        //             $('.list_auditor').html(data.list_auditor);
        //         }
        //     })
        // });
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
    <script>
        function MyFunction(id)
        {
            var checkbox = document.getElementById("check"+id);
            if(checkbox.checked == true){
                document.getElementById("action").style.display = "none";
                document.getElementById("btnDelete").style.display = "block";
            }else{
                document.getElementById("action").style.display = "block";
                document.getElementById("btnDelete").style.display = "none";
            }
        }
    </script>
@endsection

@section('footer')


