@extends('layouts.app_6s')

@section('head','navbar','sidebar')
<style>
    .thumbnail {
        float:left;
        position:relative;
        width: 80%;
        height: 80%;
    }
    .thumbnail img{
        width:100px;
        height:100px;
    }    

    .thumbnail:hover img {
        position:absolute;
        top:-105px;
        left:-150px;
        width:750px;
        height:680px;
        display:block;
        z-index:99999;
    }
</style>
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
            <!-- Main row -->
                <div class="row">
                    <!-- row -->
                        <section class="col-lg-12 connectedSortable">
                            <div class="card">
                                <!-- .card-header all -->
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Manage Audit 6S
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#rules"  data-whatever="@mdo">
                                                Rules
                                            </button>
                                        </div>
                                        <div class="card-tools"style="padding-right:15px">
                                            <form action="{{'/manage6s_index'}}">
                                                <input type="submit" value="Back" class="btn btn-outline-warning" />
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5 class="card-title"><b>{{$name_building}}</b></h5>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <!-- content-->
                                                            <div class="tab-content p-0">
                                                                @if (session('alert'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('alert') }}
                                                                    </div>
                                                                @endif
                                                                <div class="row">
                                                                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 mr-auto">
                                                                            <div class="card-header">
                                                                                <a class="card-title">Print PDF</a>
                                                                            </div>
                                                                            <form method="POST" id="FormCetak" action="{{url('/audit_pdf')}}" enctype="multipart/form-data">
                                                                                {{ csrf_field() }}
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-xl-10 col-lg-8 col-md-8 col-sm-12 mr-auto">
                                                                                        <input type="month" class="form-control" name="month" placeholder="Month Audit" required>
                                                                                        <input type="hidden" name="team" value="{{ Auth::user()->name }}">
                                                                                        <input type="hidden" class="form-control" name="building" value="{{ $name_building }}">
                                                                                    </div><br>
                                                                                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12 mr-auto">
                                                                                        <button class="btn btn-primary btn-block" type="submit">Cetak PDF</button>
                                                                                    </div>
                                                                                </div>
                                                                             </form>
                                                                            </div>
                                                                    </div>
                                                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mr-auto">
                                                                            <div class="card-header">
                                                                                <a class="card-title">Editor</a>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mr-auto">
                                                                                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalPreview"  data-whatever="@mdo">Preview</button>
                                                                                    </div>
                                                                                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 mr-auto">
                                                                                        <form method="POST" id="FormEdit" action="{{url('/manage_6s/edit/')}}" enctype="multipart/form-data">
                                                                                            {{ csrf_field() }}
                                                                                            <input type="hidden" name="building" value="{{$building}}">
                                                                                            <input type="hidden" name="month" value="{{$month}}">
                                                                                            <button class="btn btn-info btn-block" type="submit" disabled>Edit Data 6S Offline</button>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <a class="card-title"><b>Data Audit 6S</b></a>
                                                        </div>
                                                        <div class="card-body">
                                                            <form method="POST" action="manage/save" id="myForm" enctype="multipart/form-data">
                                                                {{ csrf_field() }}
                                                                <div>
                                                                    <button class="btn btn-primary btn-block" type="submit" onclick="test()">save</button><br>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="table-responsive">
                                                                        <table id="myTable5" class="table table-striped table-bordered myTable5" style="width:120%">
                                                                            <thead class="thead-dark">
                                                                                <tr style="font-size: 90%;">
                                                                                    <th width="2.5%"class="align-middle"><center>No</center></th>
                                                                                    <th width="2.5%"class="align-middle"><center><a id="action">Action</a>
                                                                                            <input type="button" class="btn btn-danger btn-block btn-sm" id="btnDelete" style="display: none" value="Delete">
                                                                                        </center>
                                                                                    </th>
                                                                                    <th class="align-middle"><center>Cell</center></th>
                                                                                    <th class="align-middle"><center>Area</center></th>
                                                                                    <th class="align-middle"><center>Date Input</center></th>
                                                                                    <th  class="align-middle"><center>Category</center></th>
                                                                                    <th  width="20%"class="align-middle"><center>Audit Point</center></th>
                                                                                    <th  class="align-middle"><center>Image</center></th>
                                                                                    <th  width="20%" class="align-middle"><center>Description</center></th>
                                                                                    <th  width="20%" class="align-middle"><center>PIC</center></th>
                                                                                    <th width="200px" class="align-middle"><center>Date Line</center></th>
                                                                                    <th width="20px" class="align-middle"><center>Action</center></th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody style="font-size: 90%;">
                                                                                @php $no=0; @endphp
                                                                                    @foreach($record as $result)
                                                                                @php $no++@endphp
                                                                                        {{ csrf_field() }}
                                                                                <tr>
                                                                                    
                                                                                    <td class="align-middle"><center>{{$no}}</center></td>
                                                                                    <td class="align-middle"><center><input type="checkbox" id="check{{ $no }}" name="select[]" value="{{$result->id_audit}}" onclick="MyFunction({{ $no }})"></center></td>
                                                                                    <td class="align-middle"><center>{{$result->cell}}</center></td>
                                                                                    <td class="align-middle"><center>{{$result->area}}</center></td>
                                                                                    <td class="align-middle"><center>{{date("Y-m-d",strtotime($result->created_at))}}</center></td>
                                                                                    <td class="align-middle">{{$result->category}}</td>
                                                                                    <td class="align-middle">{{$result->audit_point}}</td>
                                                                                    {{-- <td class="align-middle"><center><img class="thumbnail" src="/images/6s/{{ $result->image }}" height="80%" width="80%"/><br>{{ $result->image }}</center></td> --}}
                                                                                    <td>
                                                                                        <div class="thumbnail">
                                                                                            <a class="img-thumbnail" href="#">
                                                                                                <center><img class="thumbnail" src="/images/6s/{{ $result->image }}"/></center>
                                                                                            </a>
                                                                                            <br><center>{{ $result->image }}</center>
                                                                                        </div> 
                                                                                    </td>
                                                                                    <td class="align-middle">{{$result->description}}</td>
                                                                                    <td class="align-middle">
                                                                                        <input type='text' list='select2' value='' placeholder='{{ $result->name_employees }} - {{ $result->email }}' id='pic{{  $no  }}'onchange="AddPIC({{  $no  }})" class='form-control job_4' disabled autocomplete="off">
                                                                                            <datalist class='hide result' id='select2'>
                                                                                    </td>
                                                                                    <td class="align-middle">
                                                                                        <p style="font-size:15px; color:red;font-style: italic;">{{$result->date_line}}</p>
                                                                                        <input class='form-control' type='date' id="date_line{{ $no }}" disabled>
                                                                                        <input type="hidden" value="{{$result->id}}" id="id{{ $no }}">
                                                                                        <input type="hidden" value="{{$result->id_audit}}" id="id_audit{{ $no }}">
                                                                                    </td>
                                                                                    <td class="align-middle">
                                                                                        <center><a class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $result->id }}" href="#"  data-whatever="@mdo" role="button"><i class="fas fa-trash-alt"></center></i></a>
                                                                                    </td>
                                                                                </tr>
                                                                                    @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                <!-- /.card-Body All -->
                            </div>
                        </section>
                    <!-- /.row -->
                </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
<!-- /Main content -->
    <!-- /.content -->
    {{-- modal delete --}}
        @foreach ($delete as $result)
            <div class="modal fade bd-example-modal-lg" id="delete{{ $result->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda sudah yakin menghapus Audit 6s dengan data sebagai berikut:</h5>
                </div>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                <div class="modal-body">
                        <table class="table table-striped table-bordered" style="width 80%">
                            <thead>
                                <tr>
                                    <th>Cell</th>
                                    <th><center>Audit Point</center></th>
                                    <th><center>Image</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $result->cell }}</td>
                                    <td>{{ $result->audit_point }}</td>
                                    <td class="align-middle"><center><img  src="/images/lean/6s/{{ $result->image }}" height="150px" width="150px"/></center></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    Data ini akan di hapus?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>
                    <a id="btn-validate" class="btn btn-success" href="manage6s_index_hapus/{{ $result->id }}">Yes</a>
                </div>
                </div>
            </div>
            </div>
        @endforeach
    {{-- //modal delete --}}
    {{-- Modal Preview --}}
        <div class="modal fade" id="modalPreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 80% !important;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                            <h3 class="font-weight-bold">Preview {{$name_building}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_checklist" method="post" action="{{url('/action6s/update')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- <input type="hidden" name="status" value="Finish"> --}}
                            <div class="table-responsive">
                                <table style="border: 1px solid black;" id="myTable6" class="table table-striped" style="width:120%">
                                    <thead class="text-center">
                                        <tr style="border: 1px solid black;">
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">NO</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">AREA (cell)</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#FF0000" colspan="2">BEFORE</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#00b050" colspan="2">AFTER IMPROVEMENT OR PROPOSE</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">STATUS</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">PIC</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">DATE LINE</th>
                                        </tr>
                                        <tr style="border: 1px solid black;">
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" >Issue</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" >Picture</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" >Action Plan</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" >Picture</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @php $i=1 @endphp
                                        @foreach($preview as $result)
                                            <tr style="border: 1px solid black;">
                                                <td style="vertical-align:middle; border: 1px solid black;">{{ $i++ }}</td>
                                                <td style="vertical-align:middle; border: 1px solid black;">{{$result->cell}}</td>
                                                <td style="vertical-align:middle; border: 1px solid black;">{{$result->description}}</td>
                                                <td style="vertical-align:middle; border: 1px solid black;"><center><img  src="{{ url('/images/6s/'.$result->image) }}" height="150px" width="150px"/><br></center></td>
                                                <td style="vertical-align:middle; border: 1px solid black;">{{$result->action}}</td>
                                                <td style="vertical-align:middle; border: 1px solid black;">
                                                @php
                                                    if(empty($result->image2))
                                                    {
                                                        echo"-";
                                                    }else{
                                                        echo"<img src=".url('/images/6s/result/'.$result->image2)." height='150px' width='150px'/>";
                                                    }
                                                @endphp
                                                        {{-- <img src="{{ url('/images/lean/6s/result_6s/'.$result->image2) }}" height="150px" width="150px"/> --}}
                                                </td>
                                                @php
                                                    if($result->status=="Done")
                                                    {
                                                        $color="green";
                                                    }else {
                                                        $color="red";
                                                    }
                                                @endphp
                                                <td class="bg-{{$color}}" style="vertical-align:middle; border: 1px solid black;">{{$result->status}}</td>
                                                <td style="vertical-align:middle; border: 1px solid black;">{{$result->pic}} : {{ $result->name }}</td>
                                                <td style="vertical-align:middle; border: 1px solid black;">{{$result->date_line}}</td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="Submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    {{-- //Modal Preview --}}
    {{-- modal add Employees name code 4--}}
        <div class="modal fade" id="ModalAddEmployees" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST"action="#" id="form_employees" name="form_employees" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Employees</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Departemen</label>
                            <input type="text" list="departemen_list_4" class="form-control departemen" id="departemen_4" name="departemen_4" placeholder="Input Area"  autocomplete="off">
                            <datalist class="hide" id="departemen_list_4">
                            @foreach ($departemen as $a)
                                <option value="{{$a->name}}"></option>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="departement_form">Job Name</label>
                            <select name="job_4" class="form-control job" id="job_4" onchange="AddJob_4()" autocomplete="off">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departement_form">NIK</label>
                            <input type="number" class="form-control" id="nik_4" name="nik_4" placeholder="Enter Nik" autocomplete="off">
                            <small id="emailHelp" class="form-text text-muted">make sure nik has not been registered.</small>
                        </div>
                        <div class="form-group">
                            <label for="departement_form">Name</label>
                            <input type="text" class="form-control"name="name_4" placeholder="Enter Name" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="departement_form">Position</label>
                            <input type="text" list="jabatan_list" class="form-control" name="jabatan_4" placeholder="Enter Position" style="text-transform: uppercase;" autocomplete="off">
                            <datalist class="hide" id="jabatan_list">
                                        @foreach ($jabatan_data as $a)
                                            <option value="{{$a->jabatan}}">
                                        @endforeach
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" name="email_4" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-12">
                            <div class="row float-right">
                                <div class="col-md-6">
                                    <button type="Submit" class="btn btn-primary btn-block Save_4">Save</button>
                                </div>  
                                <div class="col-md-6">
                                    <button type="button" style="display:none;" class="btn btn-secondary ButtonClose_4" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-secondary Close_4"data-dismiss="modal">Back</button>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="success_employees">
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    {{-- modal add job name code    --}}
        <div class="modal fade" id="ModalAddJob" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST"action="#" name="form_job" id="form_job" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Job Employees</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Departemen</label>
                            <input type="text" list="departemen_list_3" class="form-control" id="departemen_3" name="departemen_3" placeholder="Input Area" style="text-transform: uppercase;" autocomplete="off">
                            <datalist class="hide" id="departemen_list_3">
                            @foreach ($departemen as $a)
                                <option value="{{$a->name}}"></option>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="departement_form">Job Name</label>
                            <input type="text" class="form-control" name="job_name_3" placeholder="Enter Job Name" style="text-transform: uppercase;" autocomplete="off">
                            <small id="emailHelp" class="form-text text-muted">make sure the job name are not the same.</small>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="departement_form">Area</label>
                                    <input type="text" list="area_list" class="form-control"name="cell_3[]" placeholder="Input Area"  autocomplete="off">
                                    <datalist class="hide" id="area_list">
                                    @foreach ($cell as $a)
                                        <option value="{{$a->cell}}"></option>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="departement_form">Sub Area</label>
                                    <input type="text" list="sub_area_list" class="form-control"name="area_3[]" placeholder="Input Sub Area"  autocomplete="off">
                                    <datalist class="hide" id="sub_area_list">
                                    @foreach ($area as $a)
                                        <option value="{{$a->nama}}"></option>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-2">
                                <label for="departement_form">Action</label>
                                <button type="button" class="btn-sm btn-primary btn-block" id="TambahArea">Add</button>
                            </div>
                        </div>
                        <div id="ResultTambah"></div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-12">
                            <div class="row float-right">
                                <div class="col-md-6">
                                    <button type="Submit" class="btn btn-primary btn-block Save_3">Save</button>
                                </div>  
                                <div class="col-md-6">
                                    <button type="button" style="display:none;" class="btn btn-secondary ButtonBack_3" data-dismiss="modal" onclick="Back()">Back</button>
                                    <button type="button" class="btn btn-secondary Back_3"data-dismiss="modal" onclick="Back()">Back</button>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="success_job">
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>

    <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript">
        function MyFunction(id)
        {
            var checkbox = document.getElementById("check"+id);
            if(checkbox.checked == true){
                document.getElementById("pic"+id).name="pic[]";
                document.getElementById("date_line"+id).name="date_line[]";
                document.getElementById("id"+id).name="id[]";
                document.getElementById("id_audit"+id).name="id_audit[]";

                document.getElementById("pic"+id).classList.add("pic");
                document.getElementById("date_line"+id).classList.add("date_line");

                document.getElementById("pic"+id).disabled = false;
                document.getElementById("date_line"+id).disabled = false;
                document.getElementById("action").style.display = "none";
                document.getElementById("btnDelete").style.display = "block";

                $.ajax({
                    url:"{{ route('6s.manage.data_pic') }}",
                    method:'get',
                    data:{id:id},
                    dataType:'json',
                    success:function(data)
                    {
                        $('.result').html(data.show_pic);
                    }
                })
                
            }else{

                document.getElementById("pic"+id).name="disable[]";
                document.getElementById("date_line"+id).name="disable[]";
                document.getElementById("id"+id).name="disable[]";
                document.getElementById("id_audit"+id).name="disable[]";

                document.getElementById("pic"+id).classList.remove("pic");
                document.getElementById("date_line"+id).classList.remove("date_line");

                document.getElementById("pic"+id).disabled = true;
                document.getElementById("date_line"+id).disabled = true;
                document.getElementById("action").style.display = "block";
                document.getElementById("btnDelete").style.display = "none";
            }
        }
    </script>
    {{-- script back --}}
        <script>
            function Back()
            {
                $('#ModalAddJob').modal('hide'); 
                $('#ModalAddEmployees').modal('show'); 
            }
        </script>
    {{-- ./script back --}}
    {{-- function validation Save --}}
        <script>
            function test(){
                var pic = document.querySelectorAll("#myForm input[name='pic[]']"); // untuk menghitung jumlah data yang di pilih
                var date_line = document.querySelectorAll("#myForm input[name='date_line[]']"); // untuk menghitung jumlah data yang di pilih
                var no = 1;
                
                for( var i = 0; i < pic.length; i++)
                {
                    ke = i+no;
                    p = pic[i].name;
                    date = date_line[i].name;
                    
                    pic_value = pic[i].value;
                    date_line_value = date_line[i].value;   

                    var array_alert=[];
                    if (pic_value[i]&&date_line_value[i]) {
                    }else{
                        if (!pic_value[i]) {
                            array_alert.push("Data "+p+" ke - "+ ke +"  belum terisi")
                        }
                        if (!date_line_value[i]) {
                            array_alert.push("Data "+date+" ke - "+ ke +"  belum terisi")
                        }
                        alert(array_alert.join("\n"));
                        event.preventDefault();
                    }
                }
            }
        </script>
        {{-- //function add pic --}}
            <script>
                function AddPIC(id)
                {
                    var job = document.getElementById('pic'+id).value;
                    if(job=="--Add Data--")        
                    {
                        // $('input[name=job_4').val('');
                        job.selected=false;
                        $('#ModalAddEmployees').modal('show'); 
                    }        
                }
            </script>
        {{-- //function add job --}}
            <script>
                function AddJob_4()
                {
                    var job = document.getElementById('job_4').value;
                    if(job=="--Add Data--")        
                    {
                        // $('input[name=job_4').val('');
                        job.selected=false;
                        $('#ModalAddEmployees').modal('hide'); 
                        $('#ModalAddJob').modal('show'); 
                    }        
                }
            </script>
    {{-- script search job per departemen --}}
        <script>
            $(document).ready(function(){
    
                fetch_departemen();
        
                //script search job per departemen
                    function fetch_departemen(query = '')
                    {
                    $.ajax({
                    url:"{{ route('employees.live_search.ShowJob') }}",
                    method:'post',
                    data:{"_token": "{{ csrf_token() }}",query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('.job').html(data.show_job);
                    }
                    })
                    }
                $(document).on('input', '.departemen', function(){
                    var query = $(this).val();
                    fetch_departemen(query);
                });
                // function delete
                    $(document).on('click', '#btnDelete', function(){
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
            });
        </script>
    {{-- ./script search job per departemen --}}
    {{-- save employees --}}
        <script>
            $(document).ready(function(){
                $('#form_employees').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('employees.save_employees') }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false, 
                        beforeSend:function(){
                            $('#success_employees').empty();
                            document.getElementsByClassName("Save_4").disabled = true;
                            document.getElementsByClassName("Close_4").disabled = true;
                        },
                        success:function(data)
                        {
                            if(data.errors)
                            {
                                $('#success_employees').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
                                document.getElementsByClassName("Save_4").disabled = false;
                                document.getElementsByClassName("Close_4").disabled = false;
                            }
                            if(data.success)
                            {
                                alert("DATA JOB EMPLOYEES HAS BEEN SAVED!");
                                location.reload();
                            }
                        }
                    })
                });
                $('.ButtonClose_4').on('click',function(){
                    window.location.reload();
                });
            });
        </script>
    {{-- save Job --}}
        <script>
            $(document).ready(function(){
                $('#form_job').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('employees.save_job') }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false, 
                        beforeSend:function(){
                            $('#success_job').empty();
                            document.getElementsByClassName("Save_3").disabled = true;
                            document.getElementsByClassName("Close_3").disabled = true;
                        },
                        success:function(data)
                        {
                            if(data.errors)
                            {
                                $('#success_job').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
                                document.getElementsByClassName("Save_3").disabled = false;
                                document.getElementsByClassName("Close_3").disabled = false;
                            }
                            if(data.success)
                            {
                                alert("DATA JOB EMPLOYEES HAS BEEN SAVED!");
                                location.reload();
                            }
                        }
                    })
                });
                $('.ButtonClose_4').on('click',function(){
                    // window.location.reload();
                });
            });
        </script>

    {{-- script action tambah area --}}
        <script>
            var i = 0;
            $("#TambahArea").click(function(){
                ++i;
                var urutan = 1 + i;
                $("#ResultTambah").append('<div class="row" id="baris'+i+'"><div class="col-5"><div class="form-group"><label for="departement_form">Area</label><input type="text" list="area_list" class="form-control" name="cell_3[]" placeholder="Input Area" autocomplete="off"><datalist class="hide" id="area_list">@foreach ($cell as $a)<option value="{{$a->cell}}"></option>@endforeach</div></div><div class="col-5"><div class="form-group"><label for="departement_form">Sub Area</label><input type="text" list="sub_area_list" class="form-control" name="area_3[]" placeholder="Input Sub Area"  autocomplete="off"><datalist class="hide" id="sub_area_list">@foreach ($area as $a)<option value="{{$a->nama}}"></option>@endforeach</div></div><div class="col-2"><label for="departement_form">Action</label><button type="button" onclick="deleteFunction('+i+')" class="btn-sm btn-danger btn-block">Remove</button></div></div>');
                x=document.querySelectorAll('.example');
                len=x.length;
            });

            function deleteFunction(id){
                $('#baris'+id).remove();
            }
        </script>
@endsection

@section('footer')


