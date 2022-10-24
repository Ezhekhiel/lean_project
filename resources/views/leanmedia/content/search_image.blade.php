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
                    <h2 class="site-section-heading text-center">{{$model}}</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="lightgallery">
            @foreach ($data as $a)
                    <div class="card-body col-sm-6 col-md-4 col-lg-3 col-xl-4 item" data-aos="fade"
                        data-src="{{url('images/lean/leanmedia/'.$a->type.'/image/'.$a->model_sepatu.'/'.$a->image)}}"
                        data-sub-html="<h4>{{$a->model_sepatu}}</h4">
                        <a href="#"><img src="{{url('images/lean/leanmedia/'.$a->type.'/image/'.$a->model_sepatu.'/'.$a->image)}}" alt="IMage" class="img-fluid"></a>
                        <div class="card-footer">
                            <a class="card-text"></a>
                        </div>
                    </div>
            @endforeach

        </div>
      </div>
    </div>
    <!-- /.content -->
@endsection


@section('footer')

