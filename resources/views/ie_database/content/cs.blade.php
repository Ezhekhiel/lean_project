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
                <div class="card-header border-transparent">
                    <h3 class="card-title">IE Database DATA</h3>
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                                            </div>
                </div>
                @if (session('alert_save'))
                    <div class="alert alert-success">
                        {{ session('alert_save') }}
                    </div>
                @endif
                @if (session('alert_delete'))
                    <div class="alert alert-danger">
                        {{ session('alert_delete') }}
                    </div>
                @endif
                @if (session('alert_error'))
                    <div class="alert alert-danger">
                        {{ session('alert_error') }}
                    </div>
                @endif
                <!-- /.card-header -->
                <!-- .card-Body -->
                <div class="card-body">
                    <!-- content-->
                        <div class="tab-content p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-header border-transparent"><h5>COMPUTER STITCHING AREA</h5></div>
                                    <div class="card-header">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tambahData">Tambah Data</button>
                                    </div>
                                    <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Model / Process" />
                                            </div>
                                        </div>
                                    <div class="card card-body">
                                        <div style="overflow-x:auto;">
                                            <h3 align="center">Total Data : <span id="total_records"></span></h3>
                                            <table class="table table-striped table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th style="vertical-align:middle;text-align:center">No</th>
                                                        <th style="vertical-align:middle;text-align:center">Model</th>
                                                        <th style="vertical-align:middle;text-align:center">Process</th>
                                                        <th style="vertical-align:middle;text-align:center">CT (sec)</th>
                                                        <th style="vertical-align:middle;text-align:center">Foto MMC</th>
                                                        <th style="vertical-align:middle;text-align:center">Foto SWCS</th>
                                                        <th style="vertical-align:middle;text-align:center">Video Process</th>
                                                        <th style="vertical-align:middle;text-align:center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td id="tfoot" colspan="8">
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
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
    {{-- modal delete --}}
        @foreach ($cs_data as $a)
            <div class="modal fade" id="{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pindahkan data ini ke arsip?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data Process {{$a->process}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal Delete</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/delete_cs/'.$a->id_process)}}'">Hapus Pesan Saja</button>
                        <button class="btn btn-primary" onclick="location.href='{{url('ie_base/archive/'.$a->id_process)}}'">Ya</button>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- modal Update --}}
        @foreach ($cs_data as $a)
            <div class="modal fade" id="update{{$a->id_process}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data Update</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" name="FormUpdate{{$a->id_process}}" id="FormUpdate{{$a->id_process}}" action="{{url('/ie_base/updateCS/')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_process" value="{{$a->id_process}}">
                            <div class="form-group">
                                <label for="exampleInputModelName">Process</label>
                                <input type="text" name="hidden_process" class="form-control" onfocus="this.value=''" value="{{$a->process}}" disabled>
                                <input type="hidden" name="process" value="{{$a->process}}">
                                <input type="hidden" name="area" value="{{$a->area}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('process') }}</i></b></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputModelName">Model</label>
                                <input type="text" name="hidden_model" class="form-control" onfocus="this.value=''" value="{{$a->model}}" disabled>
                                <input type="hidden" name="model" value="{{$a->model}}">
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('model') }}</i></b></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">Old Cycle Time</label>
                                        <input type="number" step="0.01" name="disabledCT" class="form-control" onfocus="this.value=''" value="{{$a->ct}}" disabled>
                                        <input type="hidden"name="old_ct"value="{{$a->ct}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputModelName">New Cycle Time</label>
                                        <input type="number" step="0.01" name="ct" class="form-control" value="" placeholder="Input New CT">
                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('ct') }}</i></b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                    @php
                                        if($a->mtm_cs!="-")
                                        {
                                            echo "
                                                <label for='exampleInputSeason'>MTM MMC</label>
                                                <input type='text' class='form-control' name='mtm_cs' value='$a->mtm_cs'>
                                            ";
                                        }
                                        if($a->mtm_study!="-")
                                        {
                                            echo "
                                                <label for='exampleInputSeason'>MTM SWCS</label>
                                                <input type='text' class='form-control' name='mtm_study' value='$a->mtm_study'>
                                            ";
                                        }
                                    @endphp
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('mtm') }}</i></b></p>
                            </div>
                            <div cl0ass="form-group">
                                    @php
                                        if($a->mtm_study=="-")
                                        {
                                            echo "
                                                <label for='exampleInputSeason'>MTM SWCS</label>
                                                <input type='checkbox' class='form-check' id='swcs2' name='mtm_study' value='-'>
                                            ";
                                        }
                                    @endphp
                                <p class="text-danger mr-1"><b><i>{{ $errors->first('mtm') }}</i></b></p>
                            </div>
                            {{-- ====row image CS==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                                <td style="vertical-align:middle;text-align:center"><center><img src="{{url('/images/lean/ie_database/'.$a->image_cs)}}" height="50%" width="50%" style="border: 5px solid #555;"/></center></td>
                                            <input type="hidden" name="old_image_cs" value="{{$a->image_cs}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">New Image <small style="color: red"><i>MMC</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image_cs" accept="image/x-png,image/gif,image/jpeg">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image_sws') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image cs==== --}}
                            {{-- ====row image swcs==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Image</label>
                                            @php
                                                if($a->image!="-")
                                                {
                                                    echo'<td style="vertical-align:middle;text-align:center"><center><img src="'.url('/images/lean/ie_database/'.$a->image).'" height="50%"" width="50%" style="border: 5px solid #555;"/></center></td>';
                                                }else{
                                                    echo'<br><a>image tidak ada!</a>';
                                                }
                                            @endphp
                                            <input type="hidden" name="old_image" value="{{$a->image}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">New Image <small style="color: red"><i>SWCS</i></small></label>
                                            <div class="input-group">
                                                @php
                                                    if($a->mtm_study=="-")
                                                    {
                                                        echo "
                                                            <input type='file' name='image' class='image_swcs_update' accept='image/x-png,image/gif,image/jpeg' disabled>
                                                        ";
                                                    }else{
                                                        echo "
                                                            <input type='file'class='image_swcs_update' name='image' accept='image/x-png,image/gif,image/jpeg'>
                                                        ";
                                                    }
                                                @endphp
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                            {{-- ====//row image swcs / tos==== --}}

                            {{-- ====row VIDEO==== --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputSeason">Old Video</label>
                                            <video width="100%" height="100%" controls>
                                                <source src="{{url('/video/lean/ie_database/'.$a->video_process)}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                            <input type="hidden" name="old_video" value="{{$a->video_process}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">New Video Process</label>
                                            <div class="input-group">
                                                <input type="file" name="video" accept="video/mp4,video/x-m4v,video/*">
                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('video') }}</i></b></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputModelName">Remark</label>
                                    <textarea name="remark" class="form-control" placeholder="Input Additional Information"></textarea>
                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('remark') }}</i></b></p>
                                </div>
                            {{-- ====//row VIDEO==== --}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    {{-- modal input --}}
        <div class="modal fade tambahData" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert" id="message" style="display: none"></div>
                            <form method="POST" name="formInput" id="formInput" action="#" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">TAMBAH DATA COMPUTER STITCHING</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputModelName">Process</label>
                                            <input type="text" name="process" id="process" class="form-control"placeholder="Input Process">
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('process') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputModelName">Model</label>
                                            <input type="text" name="model" id="model" class="form-control"placeholder="Input Model">
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('model') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputModelName">Cycle Time</label>
                                            <input type="number" step="0.01" name="ct" id="ct" class="form-control"placeholder="Input Cycle Time">
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('ct') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <label for="exampleInputSeason">MMC</label>
                                                        <input type="checkbox" class="form-check" id="mmc" name="mmc" value="MMC">
                                                    </div>
                                                    <div class="col-2">
                                                        <label for="exampleInputSeason">SWCS</label>
                                                        <input type="checkbox" class="form-check" id="swcs" name="swcs" value="SWCS">
                                                    </div>
                                                </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('mtm') }}</i></b></p>
                                        </div>
                                        <input type="hidden" name="area" value="Computer Stitching">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Upload Image <small style="color: red"><i>MMC</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image_mmc" id="image_mmc" accept="image/x-png,image/gif,image/jpeg">

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image_sws') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Upload Image <small style="color: red"><i>SWCS</i></small></label>
                                            <div class="input-group">
                                                <input type="file" name="image_swcs" id="image_swcs" accept="image/x-png,image/gif,image/jpeg" disabled>

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('image') }}</i></b></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Upload Video Process</label>
                                            <div class="input-group">
                                                <input type="file" name="video" id="video" accept="video/mp4,video/x-m4v,video/*">

                                            </div>
                                            <p class="text-danger mr-1"><b><i>{{ $errors->first('video') }}</i></b></p>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image Machine 1</label>
                                                    <div class="input-group">
                                                            <input type="file" name="i_machine_1" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('i_machine_1') }}</i></b></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image Machine 2</label>
                                                    <div class="input-group">
                                                        <input type="file" name="i_machine_2" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('i_machine_2') }}</i></b></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Image Machine 3</label>
                                                    <div class="input-group">
                                                        <input type="file" name="i_machine_3" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('i_machine_3') }}</i></b></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Spec Machine 1</label>
                                                    <div class="input-group">
                                                        <input type="file" name="s_machine_1" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('s_machine_1') }}</i></b></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Spec Machine 2</label>
                                                    <div class="input-group">
                                                        <input type="file" name="s_machine_2" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('s_machine_2') }}</i></b></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Spec Machine 3</label>
                                                    <div class="input-group">
                                                        <input type="file" name="s_machine_3" accept="image/x-png,image/gif,image/jpeg">

                                                    </div>
                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('s_machine_3') }}</i></b></p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-4">
                                                    <button type="Submit" class="btn btn-primary btn-block" id="Save">Save</button>
                                                </div>  
                                                <div class="col-4">
                                                    <button type="button" style="display:none;" id="ButtonClose" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-secondary" id="Close" data-dismiss="modal">Close</button>
                                                </div>  
                                                <div class="col-4">
                                                    <img id="loading" style="visibility: hidden;" src="/dist/img/ajax-loader.gif"/>
                                                </div>  
                                            </div>
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
                                </div>
                                <!-- /.card -->
                            </form>
                        </div>
                </div>
            </div>
        </div>
</section>
    <!-- /.content -->
    <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
        {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}
    {{-- script back --}}
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    {{-- /script back --}}
   
    {{-- script Live Search --}}
        <script>
            $(document).ready(function(){

                fetch_customer_data();

                function fetch_customer_data(query = '')
                {
                    $.ajax({
                        url:"{{ route('ie_base.live_search.action_cs') }}",
                        method:'GET',
                        data:{query:query},
                        dataType:'json',
                        success:function(data)
                        {
                            $('tbody').html(data.table_data);
                            $('#total_records').text(data.total_data);
                            $('#tfoot').text(data.table_foot);
                        }
                    })
                }

                    $(document).on('keyup', '#search', function(){
                        var query = $(this).val();
                        fetch_customer_data(query);
                    });
            });
        </script>
    {{-- /script Live Search --}}
    {{-- script Save --}}
        <script>
            $(document).ready(function(){
                 $('#formInput').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('ie_base.save_cs') }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend:function(){
                            $('#success').empty();
                            document.getElementById("loading").style.visibility = "visible";
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
                                $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
                                document.getElementById("loading").style.visibility = "hidden";
                                document.getElementById("Save").disabled = false;
                                document.getElementById("Close").disabled = false;
                            }
                            if(data.success)
                            {
                                $('.progress-bar').text('Uploaded');
                                $('.progress-bar').css('width', '100%');
                                $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
                                document.getElementById("loading").style.visibility = "hidden";
                                document.getElementById("Save").disabled = false;
                                document.getElementById("Close").disabled = false;
                                document.getElementById("formInput").reset();
                                $('#Close').hide();
                                $('#ButtonClose').show();
                            }
                        }
                    })
                 });
                $('#ButtonClose').on('click',function(){
                    window.location.reload();
                });
            });
            
        </script>
    {{-- /script Save --}}
    {{-- script Checkbox --}}
        <script>
            document.getElementById('swcs').onchange = function() {
                document.getElementById('image_swcs').disabled = !this.checked;
            };
            document.getElementById('swcs2').onchange = function() {
                document.getElementsByClassName('image_swcs_update').disabled = !this.checked;
            };
        </script>
    {{-- /script Checkbox --}}
@endsection


@section('footer')

