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
                            <form method="POST" action="{{url("/ie_base/offline/save")}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="input_model">Model</label>
                                    <input type="text" name="model" id="model" class="form-control" placeholder="Input Model" required oninput="this.value = this.value.toUpperCase()">
                                    {{-- <a id="check_model" onclick="CheckFunction()" type="button" class="text-primary"><i>Check</i></a> --}}
                                </div>
                                <div class="form-group">
                                    <label for="input_artikel">Artikel</label>
                                    <textarea name="artikel" class="form-control" placeholder="Input Artikel" required oninput="this.value = this.value.toUpperCase()" maxlength="500"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="input_location">Lokasi</label>
                                    <div class="row">
                                        @foreach ($location as $a)
                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <div class="card">
                                                <label style="padding-left: 10px; padding-bottom:10px;" for="{{$a->location}}">{{$a->location}}
                                                    <input type="checkbox" name="check[]"id="{{$a->id}}" onclick="checkBox({{$a->id}},'{{$a->location}}')" class="form-control" value="{{$a->id}}">
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="CheckboxResult">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i></button>
                    </div>
                            </form>
                </div>
            </section>
        </div>
    </div>
        <!-- /.row (main row) -->

</section>
    <!-- /.content -->
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
            $("#dynamicTable"+id).append('<div id="delete'+id+'" class="card col-sm-12 col-md-12 col-lg-3 col-xl-3"><label for="input_artikel">Komponen</label><input type="hidden" value="'+id+'" name="location[]"><input type="text" name="komponen[]" placeholder="Enter Komponen" class="form-control" oninput="this.value = this.value.toUpperCase()"><button type="button" class="btn btn-danger" onClick="delete_click('+id+')" id="add'+id+'">Remove</button></div>');
    }

    function delete_click(id){
    // $(document).on('click', '.remove-tr', function(){
            $('#delete'+id).remove();
            --i;
    }

</script>
<script>
    function CheckFunction() {
        var model =document.getElementById('model').value;
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{ route('ie_base.live_search.action_offline_check_model') }}",
            method:"POST",
            data:{model:model,_token:_token},
            success:function(result)
            {
            // alert(result);
            }
        })
    }
</script>
@endsection


@section('footer')

