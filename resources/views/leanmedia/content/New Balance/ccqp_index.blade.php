@extends('layouts/layouts_galery.app_leanmedia')

@section('head','sidebar')
    @include('leanmedia/partial/navbar_ccqp')

@section('contentheader')
<div class="content-header">
      <div class="container-fluid">
        <div class="card-header">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="text" name="search_moving" id="search_ccqp" class="form-control" placeholder="Search CCQP" /><br>

                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
</div>
@endsection


@section('content')

    {{-- main content --}}
        <div class="row" id="list_ccqp">

        </div>
    {{-- /main content --}}

    <!-- Modal -->
    {{-- live search --}}
        <script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
        <script>
            $(document).ready(function(){

            fetch_ccqp();
            function fetch_ccqp(query = '')
            {
            // console.log(url);
            $.ajax({
            url:"{{ route('leanmedia.live_search.ccqp') }}",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#list_ccqp').html(data.table_data);
                $('#total_records_ccqp').text(data.total_data);
            }
            })
            }

            $(document).on('keyup', '#search_ccqp', function(){
            var query = $(this).val();
            fetch_ccqp(query);
            });
            });
        </script>
    @foreach ($cover as $a)
            <div class="modal fade" id="ccqp_modal{{$a->leanmedia_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <h4><b>CCQP Image</b></h4>
                                        </div>
                                        <span class="info-box-icon bg-primary col-md-2 col-sm-2 col-2"><a href="{{url('/leanmedia/search_image/ccqp'.$a->leanmedia_id)}}"><i class="far fa-images"></i></a></span>
                                    <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

@endsection


@section('footer')

