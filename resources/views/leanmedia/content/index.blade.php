@extends('leanmedia.layouts.app')

@section('head','navbar','sidebar')

@section('contentheader')

<div class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">PT. Parkland World Indoensia</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i></button>
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
                    <div class="card-header border-transparent"><h5>SOP</h5></div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
                            <button class="btn btn-secondary" data-toggle="modal" onclick="FunctionAddSWCS()">Add SWCS</button>
                            <button class="btn btn-secondary" data-toggle="modal" onclick="FunctionAddVideo()">Add Video</button>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Model" />
                            </div>
                        </div>
                        <div class="card card-body">
                            <div style="overflow-x:auto;">
                                <table class="table table-striped table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="vertical-align:middle;text-align:center">No</th>
                                            <th style="vertical-align:middle;text-align:center">Area</th>
                                            <th style="vertical-align:middle;text-align:center">Model</th>
                                            <th style="vertical-align:middle;text-align:center">Image OIB</th>
                                            <th style="vertical-align:middle;text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <!-- /content-->
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
        </div>
    </div><!-- /.container-fluid -->
    {{-- modal update --}}
        <!-- Button trigger modal -->
            <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">View SOP <span id="view_sop"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div style="overflow-x:auto;">
                            <h3 align="center">Total Data : <span id="total_records_modal"></span></h3>
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>IMAGE</th>
                                    </tr>
                                </thead>
                                <tbody id="data_modal">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
        <!-- Button update gambar -->
            <div class="modal fade" id="FormUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-sd" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit SOP <span id="model_sepatu"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-header">
                        <h6 class="modal-title">Process : <span id="process"></span></h6>
                    </div>
                    <form action="#" id="form_update" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="cover">ID FOTO</label>
                                <input type="text" class="form-control" id="id_update" name="id">
                            </div>
                            <div class="form-group">
                                <label for="cover">Upload Update Image</label>
                                <input type="file" class="form-control" name="update_image" accept="image/x-png,image/gif,image/jpeg">
                            </div>
                            <div id="success">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
    {{-- .//modal update --}}
    {{-- modal Add Swcs --}}
        <!-- Button trigger modal -->
            <div class="modal fade" id="ModalAddData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add SWCS on :
                            <select name="area_add" id="area_id" onchange="$('#alert_selectArea').hide();$('#area').val(this.value);">
                                <option value="">-Select Area-</option>
                                @foreach ($location as $a)
                                    <option value="{{ $a->id }}">{{ $a->location }}</option>
                                @endforeach
                            </select>
                            <a style="color: red; font-size:15px; display:none" id="alert_selectArea">Please select area first!</a>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" id="form_inputSWCS" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Input model to?</label>
                                    <a style="color: red; font-size:15px; display:none" id="alert_model_sop">Please select model sop first!</a>
                                    <input type="text" class="form-control" id="model_sop" list="data_list_model_sop" name="model_sepatu" autocomplete="off"  onchange="$('#alert_model_sop').hide();">
                                    <input type="hidden" id="area" value="">
                                    <datalist id="data_list_model_sop">
                                    </datalist>
                                </div>
                                <div class="alert alert-danger" id="allert_error" role="alert">
                                    The model sepatu field is required
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Search SWCS By Model</label>
                                    <input type="text" class="form-control" id="model_on_swcs" onchange="searchSWCS(this)" name="model" list="data_list_model" autocomplete="off">
                                    <datalist id="data_list_model">
                                    </datalist>
                                </div>
                                {{-- <button type="button" onclick="functionInputList()" class="btn btn-primary">Input List</button> --}}
                            </div>
                        </div>
                        <div style="overflow-x:auto;">
                            <table class="table table-striped table-bordered" id="input_swcs">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center"><input type="checkbox" onchange="checkAll(this);" /> Check all?</th>
                                        <th class="text-center">Model Sepatu</th>
                                        <th class="text-center">Process</th>
                                        <th class="text-center">Image</th>
                                    </tr>
                                </thead>
                                {{ csrf_field() }}
                                <tbody id="tableFromSearchModel">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <button type="Submit" class="btn btn-primary btn-block" id="Save">Save</button>
                                </div>  
                                <div class="col-2">
                                    <button type="button" class="btn btn-secondary btn-block" id="Close" data-dismiss="modal">Close</button>
                                </div>  
                                <div class="col-4">
                                    <button type="button" style="display:none;" id="ButtonClose" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-primary btn-block" onclick="functionReset()">Reset</button>
                                </div>  
                            </div>
                        </div>
                        <div class="col-12">
                            <img id="loading" style="visibility: hidden;" src="/dist/img/ajax-loader.gif"/>
                        </div>

                        <br />
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                0%
                            </div>
                        </div>
                        <br />
                        <div id="success">
                        </div>
                        <br />
                    </div>

                    <div class="card-body">
                        <div style="overflow-x:auto;">
                            <button type="button" class="btn btn-secondary w-25 mb-2" onclick="DeleteData()">Delete</button> </br>

                            <table class="table table-striped table-bordered" id="input_swcs">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center"><input type="checkbox" onchange="checkAll(this);" /> Check all?</th>
                                        <th class="text-center">Model Sepatu</th>
                                        <th class="text-center">Process</th>
                                        <th class="text-center">Image</th>
                                    </tr>
                                </thead>
                                {{ csrf_field() }}
                                <tbody id="table_view_swcs">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="modal fade" id="ModalAddDataVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add SWCS on :
                            <select name="area_add" id="areaIdVideo" onchange="$('#alert_selectAreaVideo').hide();$('#area').val(this.value);">
                                <option value="">-Select Area-</option>
                                @foreach ($location as $a)
                                    <option value="{{ $a->id }}">{{ $a->location }}</option>
                                @endforeach
                            </select>
                            <a style="color: red; font-size:15px; display:none" id="alert_selectAreaVideo">Please select area first!</a>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" id="form_inputVideo" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Input model to?</label>
                                    <a style="color: red; font-size:15px; display:none" id="alert_model_sopVideo">Please select model sop first!</a>
                                    <input type="text" class="form-control" id="modelSopVideo" list="data_list_model_sop_video" name="model_sepatu" autocomplete="off"  onchange="$('#alert_model_sopVideo').hide();">
                                    <input type="hidden" id="areaVideo" value="">
                                    <datalist id="data_list_model_sop_video">
                                    </datalist>
                                </div>
                                <div class="alert alert-danger" id="allert_error_video" role="alert">
                                    The model sepatu field is required
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">Search SWCS By Model</label>
                                    <input type="text" class="form-control" id="model_on_video" onchange="searchVideo(this)" name="model" list="dataListModelVideo" autocomplete="off">
                                    <datalist id="dataListModelVideo">
                                    </datalist>
                                </div>
                                {{-- <button type="button" onclick="functionInputList()" class="btn btn-primary">Input List</button> --}}
                            </div>
                        </div>
                        <div style="overflow-x:auto;">
                            <table class="table table-striped table-bordered" id="inputSWCSVideo">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center"><input type="checkbox" onchange="checkAll(this);" /> Check all?</th>
                                        <th class="text-center">Model Sepatu</th>
                                        <th class="text-center">Process</th>
                                        <th class="text-center">Image</th>
                                    </tr>
                                </thead>
                                {{ csrf_field() }}
                                <tbody id="tableFromSearchModelVideo">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4">
                                    <button type="Submit" class="btn btn-primary btn-block">Save</button>
                                </div>  
                                <div class="col-2">
                                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
                                </div>  
                                <div class="col-4">
                                    <button type="button" style="display:none;" id="ButtonClose" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-primary btn-block" onclick="functionReset()">Reset</button>
                                </div>  
                            </div>
                        </div>
                        <div class="col-12">
                            <img id="loading" style="visibility: hidden;" src="/dist/img/ajax-loader.gif"/>
                        </div>

                        <br />
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                0%
                            </div>
                        </div>
                        <br />
                        <div id="success">
                        </div>
                        <br />
                    </div>
                    <div class="card-body">
                        <div style="overflow-x:auto;">
                            <button type="button" class="btn btn-secondary w-25 mb-2" onclick="DeleteData()">Delete</button> </br>

                            <table class="table table-striped table-bordered" id="input_swcs">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center"><input type="checkbox" onchange="checkAll(this);" /> Check all?</th>
                                        <th class="text-center">Model Sepatu</th>
                                        <th class="text-center">Process</th>
                                        <th class="text-center">Image</th>
                                    </tr>
                                </thead>
                                {{ csrf_field() }}
                                <tbody id="table_view_swcsVideo">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
{{-- .//modal Add Swcs --}}
    {{-- modal add --}}
        <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{url("/leanmedia/save")}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="model">Input Model</label>
                            <input type="text" class="form-control" name="model">
                        </div>
                        <div class="form-group">
                            <label for="location">Input Location</label>
                            <select name="location" class="form-control">
                                <option value="" disabled>Select Location</option>
                                @foreach ($location as $item)
                                 <option value="{{$item->id}}">{{$item->location}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand">Input Brand</label>
                            <input type="text" class="form-control" name="brand">
                        </div>
                        {{-- <div class="form-group">
                            <label for="cover">Upload Cover</label>
                            <input type="file" class="form-control" name="cover" accept="image/x-png,image/gif,image/jpeg">
                        </div> --}}
                        <div class="form-group">
                            <label for="cover">number of pages</label>
                            <input type="number" class="form-control" name="count">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    {{-- .//modal add --}}
</section>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    
    {{-- LIVE Search --}}
        <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
        <script>
            $(document).ready(function(){

                fetch_customer_data();

                function fetch_customer_data(query = '')
                {
                    $.ajax({
                        url:"{{ route('leanmedia.action_getData.sop') }}",
                        method:'GET',
                        data:{query:query},
                        dataType:'json',
                        success:function(data)
                        {
                            $('#data').html(data.table_data);
                            $('#total_records').text(data.total_data);
                        }
                    })
                }

                    $(document).on('keyup', '#search', function(){
                        var query = $(this).val();
                        fetch_customer_data(query);
                    });
            });
        </script>
        <script>
            function checkAll(ele) {
                var checkboxes = document.getElementsByTagName('input');
                if (ele.checked) {
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].type == 'checkbox' ) {
                            checkboxes[i].checked = true;
                        }
                    }
                } else {
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].type == 'checkbox') {
                            checkboxes[i].checked = false;
                        }
                    }
                }
            }
            function FunctionModal(model,location){
                $("#ModalUpdate").modal();
                        $.ajax({
                            url:"{{ route('leanmedia.action_modal_sop') }}",
                            method:'GET',
                            data:{model:model,location:location},
                            dataType:'json',
                            success:function(data)
                            {
                                $('#data_modal').html(data.table_data);
                                $('#total_records_modal').text(data.total_data);
                                $('#view_sop').text(model);
                           
                            }
                        })
            }
            function FunctionAddSWCS(model,id,id_area){
                functionReset();
                    $("#ModalAddData").modal();
                    $("select#area_id").prop('selectedIndex', 0);
                    $("#model_sop").val("");
                    $("#model_on_swcs").val("");
                    $("#tableFromSearchModel").empty();
                    var x = document.getElementById("allert_error");
                    x.style.display = "none";
                        $.ajax({
                            url:"{{ route('leanmedia.action_modal_addData') }}",
                            method:'GET',
                            dataType:'json',
                            data:{id_area:id_area,model:model},
                            success:function(data)
                            {
                                $('#data_list_model').html(data.model_swcs);
                                $('#table_view_swcs').html(data.view_swcs);
                                $('#data_list_model_sop').html(data.model_sop);
                            }
                        })
            }
            function FunctionAddVideo(model,id,id_area){
                functionReset();
                    $("#ModalAddDataVideo").modal();
                    $("select#areaIdVideo").prop('selectedIndex', 0);
                    $("#modelSopVideo").val("");
                    $("#model_on_video").val("");
                    $("#tableFromSearchModelVideo").empty();
                    var x = document.getElementById("allert_error_video");
                    x.style.display = "none";
                        $.ajax({
                            url:"{{ route('leanmedia.action_modal_addData') }}",
                            method:'GET',
                            dataType:'json',
                            data:{id_area:id_area,model:model},
                            success:function(data)
                            {
                                $('#dataListModelVideo').html(data.model_swcs);
                                $('#table_view_swcsVideo').html(data.view_swcs);
                                $('#data_list_model_sop_video').html(data.model_sop);
                            }
                        })
            }

            function functionReset(){
                    $('#table_add_new').empty();
                    $('#model_on_swcs').empty();
            }

            function searchSWCS(selectObject)
            {
                var model = selectObject.value;
                var model_sop = $("#model_sop").val();
                var area_id = $("#area_id").val();
                if (model_sop == "") {
                    $('#model_on_swcs').val("");
                    $('#alert_model_sop').show();
                }else if(area_id == ""){
                    $('#model_on_swcs').val("");
                    $('#alert_selectArea').show();
                }else{
                    $.ajax({
                        url:"{{ route('leanmedia.action_search_process') }}",
                        method:'GET',
                        data:{model:model,model_sop:model_sop,area_id:area_id},
                        dataType:'json',
                        success:function(data)
                        {
                            $('#tableFromSearchModel').html(data.view_swcs);
                            $('#table_view_swcs').html(data.view_swcs_2);
                        }
                    })
                }
            }
            function searchVideo(selectObject)
            {
                var model = selectObject.value;
                var model_sop = $("#modelSopVideo").val();
                var area_id = $("#areaIdVideo").val();
                if (model_sop == "") {
                    $('#model_on_video').val("");
                    $('#alert_model_sopVideo').show();
                }else if(area_id == ""){
                    $('#model_on_video').val("");
                    $('#alert_selectAreaVideo').show();
                }else{
                    $.ajax({
                        url:"{{ route('leanmedia.action_search_process2') }}",
                        method:'GET',
                        data:{model:model,model_sop:model_sop,area_id:area_id},
                        dataType:'json',
                        success:function(data)
                        {
                            $('#tableFromSearchModelVideo').html(data.view_swcs);
                            $('#table_view_swcsVideo').html(data.view_swcs_2);
                        }
                    })
                }
            }

            function resetSearchSWCS(selectObject)
            {
                var model = selectObject;
                var model_sop = $("#model_sop").val();
                var area_id = $("#area_id").val();
                if (model_sop == "") {
                    $('#model_on_swcs').val("");
                    $('#alert_model_sop').show();
                }else if(area_id == ""){
                    $('#model_on_swcs').val("");
                    $('#alert_selectArea').show();
                }else{
                    $.ajax({
                        url:"{{ route('leanmedia.action_search_process') }}",
                        method:'GET',
                        data:{model:model,model_sop:model_sop,area_id:area_id},
                        dataType:'json',
                        success:function(data)
                        {
                            $('#tableFromSearchModel').html(data.view_swcs);
                            $('#table_view_swcs').html(data.view_swcs_2);
                        }
                    })
                }
            }
                $(document).ready(function(){
                    // change model on swcs
                        // $("#model_on_swcs").change(function(){
                        //     var model = $(this).val();
                        //     var model_sop = $("#model_sop").val();
                        //     var area_id = $("#area_id").val();
                        //         // data_id_process="Ada";
                        //         $.ajax({
                        //             url:"{{ route('leanmedia.action_search_process') }}",
                        //             method:'GET',
                        //             data:{model:model,model_sop:model_sop,area_id:area_id},
                        //             dataType:'json',
                        //             success:function(data)
                        //             {
                        //                 $('#tableFromSearchModel').html(data.view_swcs);
                        //                 $('#table_view_swcs').html(data.view_swcs_2);
                        //                 // console.log(data.view_swcs);
                        //             }
                        //         })
                        // });
                    $('#form_inputSWCS').on('submit', function(event){
                        event.preventDefault();
                        $.ajax({
                            url:"{{ route('leanmedia.save_swcs') }}",
                            method:"POST",
                            data:new FormData(this),
                            dataType:'JSON',
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend:function(){
                                $('#success').empty();
                                // document.getElementById("loading").style.visibility = "visible";
                                document.getElementById("Save").disabled = true;
                                document.getElementById("Close").disabled = true;
                            },
                            uploadProgress:function(event, position, total, percentComplete)
                            {
                                $('.progress-bar').text(percentComplete + '%');
                                $('.progress-bar').css('width', percentComplete + '%');
                            },
                            success:function(data)
                            {
                                if(data.errors)
                                {
                                    $('.progress-bar').text('0%');
                                    $('.progress-bar').css('width', '0%');
                                    var x = document.getElementById("allert_error");
                                    x.style.display = "block";
                                    document.getElementById("loading").style.visibility = "hidden";
                                    document.getElementById("Save").disabled = false;
                                    document.getElementById("Close").disabled = false;
                                }
                                if(data.success)
                                {
                                    $('.progress-bar').text('Uploaded');
                                    $('.progress-bar').css('width', '100%');
                                    $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
                                    console.log("Hello world!");
                                    document.getElementById("loading").style.visibility = "hidden";
                                    document.getElementById("Save").disabled = false;
                                    document.getElementById("Close").disabled = false;
                                    $('#Close').hide();
                                    $('#ButtonClose').show();
                                    alert(data.success);
                                    resetSearchSWCS(data.model);
                                }
                            }
                        })
                    });
                    $('#form_inputVideo').on('submit', function(event){
                        event.preventDefault();
                        $.ajax({
                            url:"{{ route('leanmedia.save_video') }}",
                            method:"POST",
                            data:new FormData(this),
                            dataType:'JSON',
                            contentType: false,
                            cache: false,
                            processData: false,
                            beforeSend:function(){
                                $('#success').empty();
                                document.getElementById("Save").disabled = true;
                                document.getElementById("Close").disabled = true;
                            },
                            uploadProgress:function(event, position, total, percentComplete)
                            {
                                $('.progress-bar').text(percentComplete + '%');
                                $('.progress-bar').css('width', percentComplete + '%');
                            },
                            success:function(data)
                            {
                                if(data.errors)
                                {
                                    $('.progress-bar').text('0%');
                                    $('.progress-bar').css('width', '0%');
                                    var x = document.getElementById("allert_error");
                                    x.style.display = "block";
                                    document.getElementById("loading").style.visibility = "hidden";
                                    document.getElementById("Save").disabled = false;
                                    document.getElementById("Close").disabled = false;
                                }
                                if(data.success)
                                {
                                    $('.progress-bar').text('Uploaded');
                                    $('.progress-bar').css('width', '100%');
                                    $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
                                    console.log("Hello world!");
                                    document.getElementById("loading").style.visibility = "hidden";
                                    document.getElementById("Save").disabled = false;
                                    document.getElementById("Close").disabled = false;
                                    $('#Close').hide();
                                    $('#ButtonClose').show();
                                    alert(data.success);
                                    resetSearchSWCS(data.model);
                                }
                            }
                        })
                    });
                    $('#form_update').on('submit', function(event){
                        event.preventDefault();
                        $.ajax({
                            url:"{{ route('leanmedia.update_image') }}",
                            method:"POST",
                            data:new FormData(this),
                            dataType:'JSON',
                            contentType: false,
                            cache: false,
                            processData: false,
                            success:function(data)
                            {
                                if(data.errors)
                                {
                                    $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
                                }
                                if(data.success)
                                {
                                    $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
                                    alert(data.success);
                                    document.location.reload();
                                }
                            }
                        })
                    });
                });
             
        </script>
        <script>
                function FunctionDelete(model){
                    var r=confirm("Are you sure want delete this?")
                    if (r == true) {
                        var _token = "{{ csrf_token() }}";
                        $.ajax({
                            url:"{{ route('leanmedia.delete_model_all') }}",
                            method:'POST',
                            data:{model:model,_token:_token},
                            dataType:'json',
                            success:function(data)
                            {
                                alert(data);
                                location.reload();
                            }
                        })
                    }
                }
                function FunctionDelete2(id, model){
                    var r=confirm("Are you sure want delete this?")
                    if (r == true) {
                        var _token = "{{ csrf_token() }}";
                        $.ajax({
                            url:"{{ route('leanmedia.delete_model') }}",
                            method:'POST',
                            data:{id:id,_token:_token},
                            dataType:'json',
                            success:function(data)
                            {
                                alert(data);
                                FunctionModal(model);
                            }
                        })
                    }
                }
                function modalUpdate(id,modal,proses){
                    $('#ModalUpdate').modal('hide');
                    $('#FormUpdate').modal('show');
                    $('#process').text(proses);
                    $('#model_sepatu').text(modal);
                    $('#id_update').val(id);
                }
                
        </script>
   
    {{-- .//LIVE Search --}}
    
@endsection


@section('footer')

