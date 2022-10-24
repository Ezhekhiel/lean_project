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
            <!-- Main row -->
                <div class="row">
                    <!-- row -->
                        <section class="col-lg-12 connectedSortable">
                            <div class="card">
                                <!-- .card-header all -->
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Register Auditor 6S Audit
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
                                <!-- /.card-header all -->
                                <!-- .card-Body All -->
                                    <div class="card-body">
                                       {{-- Offline --}}
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-md-12">
                                                <!-- card -->
                                                    <div class="card">
                                                        <!-- card-header Offline -->
                                                            <div class="card-header">
                                                                <div class="card-tools">
                                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                        <i class="fas fa-minus"></i>
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        <!-- /.card-header Offline-->
                                                        <!-- card-body Offline-->
                                                            <div class="card-body">
                                                                <!-- content-->
                                                                <div class="tab-content p-0">

                                                                    @if (session('alert'))
                                                                        <div class="alert alert-success">
                                                                            {{ session('alert') }}
                                                                        </div>
                                                                    @endif
                                                                    <div class="row">
                                                                        
                                                                        <div class="card col-12">
                                                                            <div class="card-header">
                                                                                <a class="card-title"><b>List Auditor 6S</b></a>
                                                                            </div>
                                                                            <div class="row p-2">
                                                                                <div class="col-4">
                                                                                    <input type="text" name="search_audit" id="search_audit" class="form-control" placeholder="Search Auditor" />
                                                                                </div>
                                                                                <div class="col-2">
                                                                                    <button type="button" class="btn btn-primary bt-block" data-toggle="modal" data-target="#register">
                                                                                        Register Auditor
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="col-md-12">
                                                                                    <div class="table-responsive">
                                                                                        <table class="table table-striped table-bordered" style="width:120%">
                                                                                            <thead class="thead-dark">
                                                                                                <tr style="font-size: 90%;">
                                                                                                    <th width="2.5%"class="align-middle"><center>No</center></th>
                                                                                                    <th width="2.5%"class="align-middle"><center>
                                                                                                            <input type="button" class="btn btn-danger btn-block btn-sm" id="btnDelete"  value="Delete">
                                                                                                            
                                                                                                    </th>
                                                                                                    <th class="align-middle"><center>Nik</center></th>
                                                                                                    <th class="align-middle"><center>Name</center></th>
                                                                                                    <th  class="align-middle"><center>Action</center></th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody id="form-auditor">
                                                                    
                                                                                            </tbody>
                                                                                                <input type="hidden" name="team" id="team" value="{{ Auth::user()->id }}">
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <!-- /content-->
                                                            </div>
                                                        <!-- ./card-body Offline-->
                                                        <!-- card-footer Offline-->
                                                            <div class="card-footer">
                                                            </div>
                                                        <!-- /.card-footer Offline-->
                                                    </div>
                                                <!-- /.card -->
                                                </div>
                                                <!-- /.col -->
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
    {{-- modal add job name code    --}}
        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST"action="#" id="form_register" name="form_register" enctype="multipart/form-data">
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
                            <select class="form-control" name="departemen" id="dropdown_departemen"></select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">NIK</label>
                            <input type="number" name="nik" placeholder="Input NIK" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" placeholder="Input Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Team</label>
                            <select class="form-control" name="team" id="dropdown_team"></select>
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
                        <div id="success_auditor">
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
    {{-- script back --}}
        <script>
            function Back()
            {
                $('#ModalAddJob').modal('hide'); 
                $('#ModalAddEmployees').modal('show'); 
            }
        </script>
    {{-- ./script back --}}
    {{-- script main script --}}
        <script  type="text/javascript">
            $(document).ready(function(){
                    
                fetch_auditor();
                
                //script search job per departemen
                        
                    function fetch_auditor(query = '')
                    {
                        var team = document.getElementById('team').value;
                        $.ajax({
                            url:"{{ route('audit.live_show.ShowAuditor') }}",
                            method:'get',
                            data:{"_token": "{{ csrf_token() }}",query:query,team:team},
                            dataType:'json',
                            success:function(data)
                            {
                                $('#form-auditor').html(data.table_data);
                            }
                        })
                    }
                $(document).on('input', '#search_audit', function(){
                    var query = $(this).val();
                    
                    fetch_auditor(query, team);
                });
                // function delete
                    $(document).on('click', '#btnDelete', function(){
                        var val = [];
                        $('input[name="select[]"]:checked').each(function(i){
                            val[i] = $(this).val();
                        });
                        $.ajax({
                            method:'POST',
                            url:"{{ route('audit.multiple_delete.auditor') }}",
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
                //function dropdown form register
                    $.ajax({
                        url:"{{ route('audit.live_show.form_register') }}",
                        method:'get',
                        dataType:'json',
                        success:function(data)
                        {
                            $('#dropdown_team').html(data.dropdown_team);
                            $('#dropdown_departemen').html(data.dropdown_departemen);
                        }
                    })
            });
        </script>
    {{-- save employees --}}
        <script>
            $(document).ready(function(){
                $('#form_register').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('audit.save_auditor') }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false, 
                        beforeSend:function(){
                            $('#success_auditor').empty();
                            document.getElementsByClassName("Save_4").disabled = true;
                            document.getElementsByClassName("Close_4").disabled = true;
                        },
                        success:function(data)
                        {
                            if(data.errors)
                            {
                                $('#success_auditor').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
                                document.getElementsByClassName("Save_4").disabled = false;
                                document.getElementsByClassName("Close_4").disabled = false;
                            }
                            if(data.success)
                            {
                                alert("DATA AUDITOR HAS BEEN SAVED!");
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
@endsection

@section('footer')


