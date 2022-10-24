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
                    <div class="card-header border-transparent"><h5>OIB</h5></div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahData">Tambah Data</button>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Model" />
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
                        <h5 class="modal-title">View OIB <span id="view_oib"></span></h5>
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
    {{-- .//modal update --}}
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
                        <input type="hidden" value="19" name="location">
                        <div class="form-group">
                            <label for="brand">Input Brand</label>
                            <input type="text" class="form-control" name="brand">
                        </div>
                        <div class="form-group">
                            <label for="cover">Upload Cover</label>
                            <input type="file" class="form-control" name="cover" accept="image/x-png,image/gif,image/jpeg">
                        </div>
                        <div class="form-group">
                            <label for="cover">number of pages</label>
                            <input type="number" class="form-control" name="count">
                        </div>
                        {{-- <div class="form-group">
                            <label for="image">Upload File</label>
                            <input type="file" class="form-control" name="image[]" accept="image/x-png,image/gif,image/jpeg" multiple>
                        </div> --}}
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
                        url:"{{ route('leanmedia.action_getData.oib') }}",
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
                function FunctionModal(model){
                    $("#ModalUpdate").modal();
                        $.ajax({
                            url:"{{ route('leanmedia.action_modal_oib') }}",
                            method:'GET',
                            data:{model:model},
                            dataType:'json',
                            success:function(data)
                            {
                                $('#data_modal').html(data.table_data);
                                $('#total_records_modal').text(data.total_data);
                                $('#view_oib').text(model);
                     
                            }
                        })
                }
                
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
                
        </script>
   
    {{-- .//LIVE Search --}}
    
@endsection


@section('footer')

