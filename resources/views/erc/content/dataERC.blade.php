@extends('erc.layouts.app')

@section('head','navbar','sidebar')

<style>
    .thumbnail {
        float:left;
        position:relative;
        width: 70px;
        margin-right: 10px;
    }
    .thumbnail img{
        width:450px;
        height:400px;
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
            <section class="col-lg-12 connectedSortable">
                <!-- Custom tabs (Charts with tabs)-->
                <!-- card-header -->
                <div class="card-header">
                    <h3 class="card-title">
                    ERC
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- .card-Body -->
                <div class="card-body">
                    <div class="tab-content p-0">
                            <div class="col-md-12">
                                <!-- /.card-header -->
                                        <div class="card-header border-transparent">
                                            <h3 class="card-title">SUMMARY ERC</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div><br>
                                            @guest
                                                @if (Route::has('register'))
                                                @endif
                                                @else 
                                                    @if (Auth::user()->role_id=="1")
                                                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#AddModal">Add Data</button>
                                                    @endif
                                            @endguest
                                        </div>
                                        @if (session('alert_delete'))
                                            <div class="alert alert-danger">
                                                {{ session('alert_delete') }}
                                            </div>
                                        @endif
                                <!-- /.card-header -->
                                <!-- /.card-body -->
                                        <div class="card-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <label for="years">Select Year <i style="color: red">for open data</i></label>
                                                    <input type="number" list="year_list" id="years" class="form-control year" name="xfd">
                                                    <datalist class="hide" id="year_list">
                                                    @foreach ($year as $a)
                                                        <option value="{{$a->year}}">
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="row" id="result">
                                            </div>
                                        </div>
                                <!-- /.card-body -->
                                <!-- /.card-footer -->
                                        <div class="card-footer clearfix">
                                        </div>
                                <!-- /.card-footer -->
                            </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <!-- /.card -->
            </section>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
    {{-- modal tambah --}}
        <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold" id="exampleModalLabel">ERC INPUT</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert" id="message" style="display: none"></div>
                <form method="post" id="formInput" name="formInput" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h6 class="modal-title font-weight-bold">Form Add Data 8D</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card card">
                                                <div class="form-group">
                                                    <label for="date">Year</label>
                                                    <input type="number" class="form-control" name="year" id="year" placeholder="Enter Year">
                                                </div>
                                                <div class="form-group">
                                                    <label for="desc">Description</label>
                                                    <textarea name="desc" class="form-control" id="desc"rows="5" placeholder="Description"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" name="image" id="image" accept="image/x-png,image/gif,image/jpeg">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button type="Submit" class="btn btn-primary btn-block" id="Save">Save</button>
                                            </div>  
                                            <div class="col-md-4">
                                                <button type="button" style="display:none;" id="ButtonClose" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-secondary" id="Close" data-dismiss="modal">Close</button>
                                            </div><br>
                                            <div class="col-md-2">
                                                <img id="loading" style="visibility: hidden;" src="/dist/img/ajax-loader.gif"/>
                                            </div>  
                                        </div>
                                        <div class="row" style="padding-top:10px">
                                            <div class="col-md-12">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                                        0%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div id="success"></div>
                                            </div>
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </form>
                </div>
            </div>
        </div>
    {{-- moda delete --}}
        @foreach ($data as $a)
            <div class="modal fade" id="delete{{$a->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title font-weight-bold" id="exampleModalLabel">Are you sure you want to delete this data?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert" id="message" style="display: none"></div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h6 class="modal-title font-weight-bold">Form Add Data 8D</h6>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <div class="card-body">
                                                <img class="card-img-top" alt="Card image"width="180px" src="{{url("/dataerc/data/".$a->image)}}"/>
                                            </div>
                                            <div class="card-footer">
                                                <a>{{$a->description}}</a><br/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <a type="Submit" class="btn btn-primary btn-block" href="{{url('erc/dataERC/delete/'.$a->id)}}">delete</a>
                                                </div>  
                                                <div class="col-md-4">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
    
    <!-- /.content -->
@endsection
@include('erc.scripts.function_dataERC')
@section('footer')

