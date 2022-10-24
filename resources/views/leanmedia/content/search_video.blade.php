@extends('leanmedia.layouts.app_leanmedia')

@section('head','navbar','sidebar')

@section('contentheader')
<div class="content-header">
      <div class="container-fluid">
        <h1 class="mb-0"><a onclick="history.back()" class="text-black h2 mb-0">BACK</a></h1>
      </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<!-- Main content -->
    <div class="site-section" data-aos="fade">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                @foreach ($navbar as $a)
                    <h2 class="site-section-heading text-center">{{$a->model_sepatu}}</h2>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="video-gallery">
            @php
            $i=0;
            @endphp
            @foreach ($data as $a)
            @php
            $i++;
            @endphp
                  <!-- Hidden video div -->
                <div class="card col-sm-6 col-md-4 col-lg-3 col-xl-4 item">
                    <div class="card-body">
                    <video width="100%" height="100%" controls controlsList="nodownload">
                        <source src="{{url('video/lean/leanmedia/sop/'.$a->model_sepatu.'/'.$a->video)}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    </div>
                    <div class="card-footer">
                        <a class="card-text">{{$a->proses}}</a>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
    <!-- /.content -->
@endsection


@section('footer')

