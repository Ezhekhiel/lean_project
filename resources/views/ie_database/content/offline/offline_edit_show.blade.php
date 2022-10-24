@extends('ie_database/layouts.app')

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
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">IE Database Offline</h3>
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
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form method="POST" action="{{url("/ie_base/offline/edit_save")}}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="input_model">Model</label>
                                        <input type="text" name="model" class="form-control dynamic" id="model" placeholder="Input Model" value="{{$model}}" data-dependent="model" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_model">Artikel</label>
                                        <input type="text" name="artikel" class="form-control dynamic" id="artikel" placeholder="Input Model" value="{{$artikel}}" data-dependent="model" readonly>
                                    </div>
                                    <div class="form-group">
                                        <div class="row col-md-12">
                                            @foreach ($list as $key)
                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                    <div class="card-header">
                                                        <h3>{{$key['area']}}</h3>
                                                    </div>
                                                    <div class="card-body row" style="margin-bottom: -5%">
                                                        <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                            <center><label>Komponen</label></center>
                                                        </div>
                                                        <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
                                                            <center><label>CT</label></center>
                                                        </div>
                                                        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                            <center><label></label></center>
                                                        </div>
                                                    </div>
                                                    <div class="card-body row">
                                                        @foreach ($key['komponen'] as $item =>$value)
                                                            <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5" style="margin-bottom: 1%">
                                                                <input type="hidden" value="{{$value->id}}" name="id[]" class="form-control">
                                                                <input type="text" value="{{$value->komponen}}"name="komponen[]" class="form-control" readonly>
                                                            </div>
                                                            <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5" style="margin-bottom: 1%">
                                                                <input type="number" step="0.01" onfocus="this.value=''" value="{{$value->ct}}" name="ct[]" placeholder="" class="form-control" required>
                                                            </div>
                                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2" style="margin-bottom: 1%">
                                                                <center>
                                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delete{{$value->id}}"><i class="fas fa-trash"></i></button>
                                                                </center>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button"class="btn btn-danger btn-lg" onclick="goBack()"><i class="fas fa-chevron-left"></i></button>
                        <button class="btn btn-primary float-right btn-lg" type="submit" style="margin-left:10px"><i class="fas fa-save"></i></button>
                        <button type="button" class="btn btn-success float-right btn-lg" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i></button>
                                </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
        <!-- /.row (main row) -->

</section>
    <!-- /.content -->
{{-- modal  --}}
    <!-- Modal add -->
        <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url("/ie_base/offline/additional_save")}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="input_model">Model</label>
                        <input type="text" name="model" class="form-control dynamic" id="model" placeholder="Input Model" value="{{$model}}" data-dependent="model" readonly>
                    </div>
                    <div class="form-group">
                        <label for="input_model">Artikel</label>
                        <input type="text" name="artikel" class="form-control dynamic" id="artikel" placeholder="Input Model" value="{{$artikel}}" data-dependent="model" readonly>
                    </div>
                    <div class="form-group">
                        <label for="input_location">Lokasi</label>
                        <div class="row">
                            @foreach ($location as $a)
                            <div class="card col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                <label for="{{$a->location}}">{{$a->location}}
                                    <input type="checkbox" name="check[]"id="{{$a->id}}" onclick="checkBox({{$a->id}},'{{$a->location}}')" class="form-control" value="{{$a->id}}">
                                </label><br>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="CheckboxResult">

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    <!-- Modal delete-->
        @foreach ($list as $key)
            @foreach ($key['komponen'] as $item =>$value)
                <div class="modal fade" id="delete{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data ini?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row card-body" style="margin-bottom: -7%">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <center><label>Komponen</label></center>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <center><label>CT</label></center>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{url("/ie_base/offline/edit_show/delete/")}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                            <input type="hidden" value="{{$value->id}}" name="id" class="form-control">
                                            <input type="text" value="{{$value->komponen}}" class="form-control" readonly>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                            <input type="text" step="0.01" value="{{$value->ct}}" placeholder="" class="form-control" readonly>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
{{-- script --}}
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript">
        var a = 0;
        function checkBox(id, building) {
            ++a;
            var checkBox=document.getElementById(id);
            if(checkBox.checked==true)
            {
            $('#CheckboxResult').append('<div id="show'+id+'" class="card-header"><h3>'+building+'</h3><div class="row" id="dynamicTable'+id+'" class="card-body"><div class="card col-sm-12 col-md-12 col-lg-3 col-xl-3"><label for="input_artikel">Komponen</label><input type="hidden" value="'+id+'" name="location[]"><input type="text" name="komponen[]" placeholder="Enter Komponen" class="form-control" oninput="this.value = this.value.toUpperCase()" required><button type="button" name="add" onClick="reply_click('+id+')" id="add'+id+'" class="btn btn-success">Tambah</button></div></div>');
            }else{
                $('#show'+id).remove();
            }
        }
        var i = 1;
        function reply_click(id){
            ++i;
                $("#dynamicTable"+id).append('<div id="delete'+id+'" class="card col-sm-12 col-md-12 col-lg-3 col-xl-3"><label for="input_artikel">Komponen</label><input type="hidden" value="'+id+'" name="location[]"><input type="text" name="komponen[]" placeholder="Enter Komponen" class="form-control" oninput="this.value = this.value.toUpperCase()" required><button type="button" class="btn btn-danger" onClick="delete_click('+id+')" id="add'+id+'">Remove</button></div>');
        }

        function delete_click(id){
        // $(document).on('click', '.remove-tr', function(){
                $('#delete'+id).remove();
                --i;
        }

    </script>
    <script type="text/javascript">
        var a = 0;
        function checkBox(id, building) {
            ++a;
            var checkBox=document.getElementById(id);
            if(checkBox.checked==true)
            {
            $('#CheckboxResult').append('<div id="show'+id+'" class="card-header"><h3>'+building+'</h3><div class="row" id="dynamicTable'+id+'" class="card-body"><div class="card col-sm-12 col-md-12 col-lg-3 col-xl-3"><label for="input_artikel">Komponen</label><input type="hidden" value="'+id+'" name="location[]"><input type="text" name="komponen[]" placeholder="Enter Komponen" class="form-control" oninput="this.value = this.value.toUpperCase()" required><button type="button" name="add" onClick="reply_click('+id+')" id="add'+id+'" class="btn btn-success">Tambah</button></div></div>');
            }else{
                $('#show'+id).remove();
            }
        }
        var i = 1;
        function reply_click(id){
            ++i;
                $("#dynamicTable"+id).append('<div id="delete'+id+'" class="card col-sm-12 col-md-12 col-lg-3 col-xl-3"><label for="input_artikel">Komponen</label><input type="hidden" value="'+id+'" name="location[]"><input type="text" name="komponen[]" placeholder="Enter Komponen" class="form-control" oninput="this.value = this.value.toUpperCase()" required><button type="button" class="btn btn-danger" onClick="delete_click('+id+')" id="add'+id+'">Remove</button></div>');
        }

        function delete_click(id){
        // $(document).on('click', '.remove-tr', function(){
                $('#delete'+id).remove();
                --i;
        }

    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('#model').keyup(function(){
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    // alert(_token);
                    $.ajax({
                        url:"{{ route('ie_base.live_search.action_offline_show_artikel') }}",
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                        $('#artikel').html(result);
                        }

                    })
                }
            });

            $('#model').keyup(function(){
                $('#artikel').val('');
            });

        });
    </script> --}}
    {{-- <script type="text/javascript">
        $(document).ready(function(){
            $('#artikel').change(function(){
                if($(this).val() != '')
                {
                    var model =document.getElementById('model').value;
                    var artikel =document.getElementById('artikel').value;
                    var _token = $('input[name="_token"]').val();
                    // alert(artikel);
                    $.ajax({
                        url:"{{ route('ie_base.live_search.action_offline_show_lokasi') }}",
                        method:"POST",
                        data:{model:model, artikel:artikel, _token:_token},
                        success:function(data)
                        {
                            $('#record').html(data);
                        }

                    })
                }
            });
        });
    </script> --}}
    {{-- <script>
            $(document).ready(function(){

                fetch_offline();

                function fetch_offline(artikel = '')
                {
                    $.ajax({
                        url:"{{ route('ie_base.live_search.action_offline_show_lokasi') }}",
                        method:'GET',
                        data:{artikel:artikel,model:model},
                        dataType:'json',
                        success:function(data)
                        {
                            $('#record').html(data.table_data);
                    }
                    })
                }

                $(document).on('change', '#artikel', function(){
                    var artikel = document.getElementById('artikel').value;
                    var model = document.getElementById('model').value;
                    fetch_offline(artikel,model);
                });
            });
    </script> --}}
@endsection


@section('footer')

