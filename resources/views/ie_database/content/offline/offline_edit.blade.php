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
                        <div class="card-body">
                        <form method="POST" action="{{url("/ie_base/offline/edit_show")}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="input_model">Model</label>
                                <input type="text" name="model" class="form-control dynamic" id="model" placeholder="Input Model" required oninput="this.value = this.value.toUpperCase()" data-dependent="model">
                            </div>
                            <div class="form-group">
                                <label for="input_model">Artikel</label>
                                <select name="artikel" id="artikel" class="form-control dynamic" data-dependent="artikel" required>
                                    <option value="">Select Artikel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">search</button>
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
        $('#CheckboxResult').append('<div id="show'+id+'" class="card-header"><h3>'+building+'</h3><div class="row" id="dynamicTable'+id+'" class="card-body"><div class="card col-sm-12 col-md-12 col-lg-3 col-xl-3"><label for="input_artikel">Komponen</label><input type="hidden" value="'+id+'" name="location[]"><input type="text" name="komponen[]" placeholder="Enter Komponen" class="form-control" oninput="this.value = this.value.toUpperCase()"><button type="button" name="add" onClick="reply_click('+id+')" id="add'+id+'" class="btn btn-success">Tambah</button></div></div>');
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
<script type="text/javascript">
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
</script>
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

