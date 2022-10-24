@extends('layouts.app_6s_user')

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
          <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><b>{{$name_employees}}</b></h5>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center"><b>FORM TEMUAN AUDIT 6S DEPARTEMENT</b></h2><h2 class="text-center" style="text-transform: uppercase"><b>{{$name_departemen}}</b></h2>
                        <div class="card-tools">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaldone"  data-whatever="@mdo">LIST DONE</button>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sopTutorial"  data-whatever="@mdo">SOP INPUT DATA</button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- .card-Body -->
                   <div class="card-body">
                        <!-- content-->
                        <label for="search">Search base on <u>Cell</u> <u>Area</u> <u>Category</u></label>
                        <input type="text" class="form-control col-6" name="search" id="search" placeholder="Cell / Area / Category"><br>
                        <input type="hidden" class="form-control col-6" name="departement" id="departement" value="{{$departement}}">
                        <h4 align="center">Total Data : <span id="total_record"></span></h4><br>
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
                                    {{ csrf_field() }}
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" style="width:120%">
                                            <thead class="thead-dark">
                                                <tr style="font-size: 90%;">
                                                    <th class="align-middle"><center>No</center></th>
                                                    <th class="align-middle"><center>Cell</center></th>
                                                    <th class="align-middle"><center>Area</center></th>
                                                    <th class="align-middle"><center>Category</center></th>
                                                    <th class="align-middle"><center>Audit Point</center></th>
                                                    <th class="align-middle"><center>Image</center></th>
                                                    <th class="align-middle"><center>Description</center></th>
                                                    <th class="align-middle"><center>PIC</center></th>
                                                    <th class="align-middle"><center>Date Line</center></th>
                                                    <th class="align-middle"><center>Status</center></th>
                                                    <th class="align-middle"><center>Action</center></th>
                                                </tr>
                                            </thead>
                                            <tbody id="data">
                                               
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        <!-- /content-->
                    </div>
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
    {{-- modal edit --}}
        @foreach($modal as $result)
            <div class="modal fade" id="modalupload{{$result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Upload Feedback</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <form method="post" action="{{url('/audit/action/save')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{-- <input type="hidden" name="status" value="Finish"> --}}
                                <h5 class="modal-title" id="exampleModalLabel">Result</h5>
                                <div class="table-responsive">
                                    <table id="myTable5" class="table table-striped" style="width:120%">
                                        <thead>
                                            <tr>
                                                <th class="w-50"><center>Upload Image Response</center></th>
                                                <th class="w-50"><center>Action Description</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="w-50"><center><input type="file" name="image2[]"></center></th>
                                                <th class="w-50"><center>
                                                    <input type="hidden" value="{{ $result->id_audit }}" name="id_audit[]">
                                                    <input type="hidden" value="{{$result->id}}" name="id[]">
                                                    <input type="hidden" value="{{$result->pic}}" name="pic">
                                                    <textarea class="form-control" name="action[]"></textarea></center></th>
                                            </tr>
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
        @endforeach
    {{-- ./modal edit --}}
    {{-- modal done --}}
        <div class="modal fade" id="modaldone" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 80% !important;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                            <h3 class="font-weight-bold">List Feedback {{$departement}}</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="search_done">Search base on <u>Cell</u> <u>Area</u></label>
                        <input type="text" class="form-control col-6" name="search_done" id="search_done" placeholder="Cell / Area / Category"><br>
                        <h4 align="center">Total Data : <span id="total_record_done"></span></h4><br>
                            {{-- <input type="hidden" name="status" value="Finish"> --}}
                            <div class="table-responsive">
                                <table style="border: 1px solid black;" class="table table-striped" style="width:120%">
                                    <thead class="text-center">
                                        <tr style="border: 1px solid black;">
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">NO</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">AREA (cell)</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#FF0000" colspan="2">BEFORE</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#00b050" colspan="2">AFTER IMPROVEMENT OR PROPOSE</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">STATUS</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">PIC</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">DATE LINE</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">Edit</th>
                                        </tr>
                                        <tr style="border: 1px solid black;">
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" >Issue</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" >Picture</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" >Action Plan</th>
                                            <th style="border: 1px solid black; vertical-align:middle;text-align:center;background-color:#b7dee8" >Picture</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" id="data_done">
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- ./modal done --}}
    {{-- modal sop tutorial --}}
        <div class="modal fade" id="sopTutorial" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" style="max-width: 80% !important;" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                            <h3 class="font-weight-bold">SOP INPUT DATA FEEDBACK</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <video width="100%" height="100%" controls>
                                <source src="{{ url('video\lean\6s\Tutorial\Tutorial Action 6S per Departemen.mp4') }}" type="video/mp4">
                                Your browser does not support the video tag.
                              </video>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- ./modal done --}}
    {{-- modal edit Done --}}
        @foreach($modal_done as $result)
            <div class="modal fade" id="Edit{{$result->id}}" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                                <h3>Edit Data Done</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{url('/audit/action/update')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$result->id}}">
                                <div class="form-group">
                                    <label for="area">Area</label><br>
                                    <a for="exampleInputFile" style="font-size: 70%; font-style: italic; color:red">{{$result->cell}}</a>
                                    <div class="input-group">
                                        <input type="hidden" name="id_audit" value="{{ $result->id_audit }}">
                                        <input type="text" name="area" class="form-control" placeholder="Input Area">
                                    </div>
                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('area') }}</i></b></p>
                                </div>
                                <div class="form-group">
                                    <label for="description">Issue</label><br>
                                    <a for="exampleInputFile" style="font-size: 70%;font-style: italic; color:red">{{$result->description}}</a>
                                    <div class="input-group">
                                        <input type="text" name="description" class="form-control" placeholder="Input Issue">
                                    </div>
                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('description') }}</i></b></p>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="old_picture">Old Picture</label><br>
                                            <input type="hidden" value="{{$result->image}}" name="old_image">
                                            <img  src="{{url('/images/6s/'.$result->image)}}" height="150px" width="170px"/><br>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="action">Action Plan</label><br>
                                            <a for="exampleInputFile" style="font-size: 70%;font-style: italic; color:red">{{$result->action}}</a>
                                            <div class="input-group">
                                                <input type="text" name="action" class="form-control" placeholder="Input Issue">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('action') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="old_picture2">Old Picture</label>
                                            <input type="hidden" value="{{$result->image2}}" name="old_image2">
                                            <img src="{{url('/images/6s/result/'.$result->image2)}}" height="150px" width="170px"/><br>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label for="image2">Picture Action Plan</label><br>
                                                <input type="file" name="image2" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image2') }}</i></b></p>
                                        </div>
                                    </div>
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
        @endforeach
    {{-- ./modal edit Done --}}
    {{-- script tampil  --}}
        <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                var x = document.getElementById('departement').value;
                fetch();

                function fetch(query = '', departement=x)
                {
                    $.ajax({
                    url:"{{ route('audit.live_search.show_action') }}",
                    method:'GET',
                    data:{query:query, departement:departement},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#data').html(data.table_data);
                        $('#total_record').text(data.total_data);
                    }
                    })
                }
                $(document).on('keyup', '#search', function(){
                    var query = $(this).val();
                    fetch(query,x);
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                var x = document.getElementById('departement').value;
                fetch();

                function fetch(query = '', departement=x)
                {
                    $.ajax({
                    url:"{{ route('audit.live_search.show_done_action') }}",
                    method:'GET',
                    data:{query:query, departement:departement},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#data_done').html(data.table_data);
                        $('#total_record_done').text(data.total_data);
                    }
                    })
                }
                $(document).on('keyup', '#search_done', function(){
                    var query = $(this).val();
                    fetch(query,x);
                });
                
            });
        </script>
        <script type="text/javascript">
            function ModalEdit(a)
            {
                $("#modaldone").modal('hide');
                $("#"+a).modal('show');
            }
        </script>
    {{-- ./script tampil  --}}
@endsection

@section('footer')


