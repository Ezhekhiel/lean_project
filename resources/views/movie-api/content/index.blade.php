@extends('movie-api.layouts.app_index')

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
            <section class="col-lg-12 connectedSortable">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h1 class="card-title">Movie - List</h1>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    {{-- <div class="card-body col-8 m-3">
                        <label for="search-movie" class="col-form-label">SEARCH - MOVIE</label>
                        <div class="input-group">
                            <span class="input-group-text" id="srachID"><i class="fa-solid fa-magnifying-glass"></i></span>
                            <input type="text" class="form-control"  id="search-input">
                        </div>
                    </div>
                </div>
                <div class="row" id="result-movie"></div> --}}
                <div class="control-group">
                    <label class="control-label">Perguruan Tinggi</label>
                    <div class="controls">
                        <input type="text" name="dummy" id="unit" class="span9" placeholder="Kata kunci nama perguruan tinggi" autocomplete="off">
                        <input type="hidden" name="id_sp" id="id_sp" value="" onChange="loadProdi(this.value)">
                        {{-- <span class='help-inline'> <button type='button' class='btn' onclick="del_pt();" ><i class='icon-remove'></i></button></span> --}}
                            </div>
                </div>
            </section>
        </div>
    </div>
</section>
   
@endsection


@section('footer')

