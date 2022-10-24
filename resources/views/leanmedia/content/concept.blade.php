@extends('layouts.app_leanmedia')

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
                <!-- card-header -->
                    <div class="card-header border-transparent">
                        <h3 class="card-title">PT. Parkland World Indoensia</h3>
                        <div class="card-tools">
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
                    </div>
                <!-- /.card-header -->
                <!-- .card-Body -->
                <div class="card-body">
                    
                </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
        </div>
    </div><!-- /.container-fluid -->
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
                    $("#ModalAddSwcs").modal();
                        $.ajax({
                            url:"{{ route('leanmedia.action_modal_addSWCS') }}",
                            method:'GET',
                            dataType:'json',
                            data:{id_area:id_area,model:model},
                            success:function(data)
                            {
                                $('#model_sepatu').text(model);
                                $('#leanmedia_id').val(id);
                                $('#data_list_model').html(data.model_swcs);
                                $('#table_view_swcs').html(data.view_swcs);
                            }
                        })
            }
            function functionInputList(){
                    var model = $("#model_on_swcs").val();
                    var process = $("#process_on_swcs").val();
                    var id = $("#leanmedia_id").val();
                        $.ajax({
                            url:"{{ route('leanmedia.action_inputList') }}",
                            method:'GET',
                            data:{model:model,process:process,id:id},
                            dataType:'json',
                            success:function(data)
                            {
                                var table = document.getElementById("table_add_new");
                                var row = table.insertRow(0);
                                var cell_model = row.insertCell(0);
                                var cell_process = row.insertCell(1);
                                var cell_image = row.insertCell(2);
                                cell_model.innerHTML = model;
                                cell_process.innerHTML = process;
                                cell_image.innerHTML=data.image;
                                cell_model.setAttribute('class', 'text-center');
                                cell_process.setAttribute('class', 'text-center');
                                cell_image.setAttribute('class', 'text-center');
                                $("#model_on_swcs").val("");
                                $("#process_on_swcs").val("");
                            }
                        })
            }
            function functionReset(){
                    $('#table_add_new').empty();
            }
            $(document).ready(function(){
                $("#model_on_swcs").change(function(){
                    var model = $(this).val();
                    var id_process = document.querySelectorAll("#form_inputSWCS input[name='id_process[]']");
                    var leanmedia_id = $("#leanmedia_id").val();
                    if(id_process.length>0)
                    {
                        data_id_process="Ada";
                        var id_process_value=new Array();
                        for( var i = 0; i < id_process.length; i++)
                        {
                            values = id_process[i].value;
                            id_process_value.push(values);
                        }
                        $.ajax({
                            url:"{{ route('leanmedia.action_search_process') }}",
                            method:'GET',
                            data:{model:model,id_process:id_process_value,leanmedia_id:leanmedia_id},
                            dataType:'json',
                            success:function(data)
                            {
                                $('#data_list_process').html(data.process_swcs);
                            }
                        })
                    }else{
                        data_id_process="Tidak ada";
                        $.ajax({
                            url:"{{ route('leanmedia.action_search_process') }}",
                            method:'GET',
                            data:{model:model,id_process:data_id_process,leanmedia_id:leanmedia_id},
                            dataType:'json',
                            success:function(data)
                            {
                                $('#data_list_process').html(data.process_swcs);

                            }
                        })
                    }
                });
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
                                console.log("Hello world!");
                                document.getElementById("loading").style.visibility = "hidden";
                                document.getElementById("Save").disabled = false;
                                document.getElementById("Close").disabled = false;
                                $('#Close').hide();
                                $('#ButtonClose').show();
                                alert(data.success);
                                $('#table_add_new').empty();
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

