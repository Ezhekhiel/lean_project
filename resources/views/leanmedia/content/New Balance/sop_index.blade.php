@extends('leanmedia.layouts.app_leanmedia')

@section('head','sidebar')

<style>
    .thumbnail {
        float:left;
        position:relative;
        width: 70px;
        margin-right: 10px;
    }
    .thumbnail img{
        width:450px;
        height:200px;
    }    

    .thumbnail:hover img {
        position: fixed;
        vertical-align: middle;
        left: 0px;
        top: 0px;
        width:90%;
        height:90%;
        z-index:1;
    }
</style>

    @include('leanmedia.partial.navbar')

@section('contentheader')
<div class="content-header">
      <div class="container-fluid">
        <div class="card-header">
            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <input type="text" name="search_moving" id="search_sop" class="form-control" placeholder="Search SOP" /><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
</div>
@endsection


@section('content')

    {{-- main content --}}
        <div class="row" id="list_sop">

        </div>
    {{-- /main content --}}

    <!-- Modal -->
        @foreach ($cover as $a)
            <div class="modal fade" id="sop_modal{{$a->leanmedia_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">PILIH MEDIA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="info-box">
                                        <div class="info-box-content col-md-10 col-sm-10 col-10">
                                            <h4><b>SOP Image</b></h4>
                                        </div>
                                        <span class="info-box-icon bg-primary col-md-2 col-sm-2 col-2"><a href="{{url('/leanmedia/search_image/sop/'.$a->leanmedia_id)}}"><i class="far fa-images"></i></a></span>
                                    <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                {{-- @php
                                    if($a->video!="-")
                                    {
                                        echo "
                                        <div class='col-md-12 col-sm-12 col-12'>
                                            <div class='info-box'>
                                                <div class='info-box-content col-md-10 col-sm-10 col-10'>
                                                    <h4><b>SOP Video</b></h4>
                                                </div>
                                                <span class='info-box-icon bg-danger col-md-2 col-sm-2 col-2'>
                                                    <a href='".url('/leanmedia/search_video/sop/'.$a->model_sepatu)."'>
                                                    <i class='fas fa-film'></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        ";
                                    }else{
                                        echo "";
                                    }
                                    if($a->oib!="-")
                                    {
                                        echo "
                                        <div class='col-md-12 col-sm-12 col-12'>
                                            <div class='info-box'>
                                                <div class='info-box-content col-md-10 col-sm-10 col-10'>
                                                    <h4><b>SOP OIB</b></h4>
                                                </div>
                                                <span class='info-box-icon bg-secondary col-md-2 col-sm-2 col-2'>
                                                    <a href='".url('/leanmedia/search_image/oib/'.$a->oib)."'>
                                                    <i class='fa fa-book' aria-hidden='true'></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        ";
                                    }else{
                                        echo "";
                                    }
                                    if($a->ccqp!="-")
                                    {
                                        echo "
                                        <div class='col-md-12 col-sm-12 col-12'>
                                            <div class='info-box'>
                                                <div class='info-box-content col-md-10 col-sm-10 col-10'>
                                                    <h4><b>SOP CCQP</b></h4>
                                                </div>
                                                <span class='info-box-icon bg-warning col-md-2 col-sm-2 col-2'>
                                                    <a href='".url('/leanmedia/search_image/ccqp/'.$a->ccqp)."'>
                                                    <i class='fas fa-thumbs-up' aria-hidden='true'></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        ";
                                    }else{
                                        echo "";
                                    }
                                    if($a->swcs!="-")
                                    {
                                        echo '
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <div class="info-box">
                                                    <div class="info-box-content col-md-10 col-sm-10 col-10">
                                                        <h4><b>SWCS Image</b></h4>
                                                    </div>
                                                    <span class="info-box-icon bg-secondary col-md-2 col-sm-2 col-2"><a href="'.url('/leanmedia/search/swcs/'.$a->swcs).'"><i class="far fa-images"></i></a></span>
                                                <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                        ';
                                    }else{
                                        echo "";
                                    }
                                @endphp --}}
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="modal fade" id="ListSopVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LIST SOP Video</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Model</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @php
                                            $no=0;
                                        @endphp
                                        @forelse ($list_video as $a)
                                            @php
                                                $no++;
                                            @endphp
                                            <th scope="row">{{$no}}</th>
                                            <td>{{$a->model_sepatu}}</td>
                                        @empty
                                            <th>Video Tidak Tersedia di Lokasi ini</th>
                                        @endforelse
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class="modal-footer">
                </div>
                <input type="hidden" value="{{$location}}" id="location">
                <input type="hidden" value="{{url('leanmedia/live_search/sop/'.$location)}}" id="link">
                </div>
            </div>
        </div>
    {{-- live search --}}
        <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
        <script>
            $(document).ready(function(){

            fetch_wt();
            function fetch_wt(query = '')
            {
            var url = document.getElementById("link").value;
            var location = document.getElementById("location").value;
            console.log(url);
            $.ajax({
            url:url,
            method:'GET',
            data:{query:query,location:location},
            dataType:'json',
            success:function(data)
            {
                $('#list_sop').html(data.table_data);
                $('#total_records_sop').text(data.total_data);
            }
            })
            }

            $(document).on('keyup', '#search_sop', function(){
            var query = $(this).val();
            fetch_wt(query);
            });
            });
        </script>


@endsection


@section('footer')

