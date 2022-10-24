@extends('layouts.app_dfx')

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
        <!-- Small boxes (Stat box) -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    PWI DFX
                </h3>
              </div><!-- /.card-header -->
              <!-- .card-Body -->
              <div class="card-body">
                <!-- content-->
                    <div class="tab-content p-0">
                        {{-- Report PerCell --}}
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- /.card-header -->
                                        <div class="card-header border-transparent">
                                            <h3 class="card-title">DFX DATA</h3>
                                            <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            </div>
                                        </div>
                                            @if (session('alert'))
                                                <div class="alert alert-danger">
                                                    {{ session('alert') }}
                                                </div>
                                            @endif
                                    <!-- /.card-header -->
                                    <form method="POST" action="/dfx/search" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                        <!-- /.card-body -->
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <select name="season" id="season" class="form-control input-lg dynamic" data-dependent="model_name">
                                                            <option value="">Select Season</option>
                                                            @foreach($season as $item)
                                                            <option value="{{ $item->season}}">{{ $item->season }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="model_name" id="model_name" class="form-control input-lg dynamic" data-dependent="city">
                                                            <option value="">Select Model</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="principle" class="form-control input-lg dynamic">
                                                            <option value="">Select Principle</option>
                                                            <option value="1">DFX Principle 1</option>
                                                            <option value="2">DFX Principle 2</option>
                                                            <option value="3">DFX Principle 3</option>
                                                            <option value="4">DFX Principle 4</option>
                                                            <option value="5">DFX Principle 5</option>
                                                            <option value="6">DFX Principle 6</option>
                                                            <option value="7">DFX Principle 7</option>
                                                            <option value="8">DFX Principle 8</option>
                                                            <option value="9">DFX Principle 9</option>
                                                            <option value="10">DFX Principle 10</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- /.card-body -->
                                        <!-- /.card-footer -->
                                            <div class="card-footer clearfix">
                                                <input type="submit" class="btn btn-secondary" style="width:30%"value="Cari">
                                            </div>
                                        <!-- /.card-footer -->
                                    </form>
                                </div>
                                <div class="card">
                                    <!-- /.card-header -->
                                        <div class="card-header border-transparent">
                                            <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            </div>
                                        </div>
                                    <!-- /.card-header -->
                                    <!-- /.card-body -->
                                        <div class="card-body">
                                            <div style="overflow-x:auto;">
                                                <table id="datatable-keytable" class="table table-striped table-bordered">
                                                    <thead class="thead-dark">
                                                    <tr>
                                                        <th class="span2"style="vertical-align:middle;text-align:center" rowspan="3">No</th>
                                                        <th style="vertical-align:middle;text-align:center" rowspan="3">DFX ID</th>
                                                        <th style="vertical-align:middle;text-align:center" rowspan="3">Category</th>
                                                        <th style="vertical-align:middle;text-align:center" rowspan="3">Model Name</th>
                                                        <th style="vertical-align:middle;text-align:center" rowspan="3">Model Picture</th>
                                                        <th style="vertical-align:middle;text-align:center" rowspan="3">DFX Short Description</th>
                                                        <th style="vertical-align:middle;text-align:center" colspan="3">DFX Principle #</th>
                                                        <th style="vertical-align:middle;text-align:center" rowspan="3">Season</th>
                                                        <th style="vertical-align:middle;text-align:center" rowspan="3">Approve Yes/No (Y/N)</th>
                                                        <th style="vertical-align:middle;text-align:center" rowspan="3">Explain why for "N" in approval</th>
                                                        <th style="vertical-align:middle;text-align:center" colspan="12">Impact</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align:middle;text-align:center"rowspan="2">Primary #</th>
                                                        <th style="vertical-align:middle;text-align:center"rowspan="2" colspan="2">Other Secondary #</th>
                                                        <th style="vertical-align:middle;text-align:center"colspan="3">PPH improve</th>
                                                        <th style="vertical-align:middle;text-align:center"colspan="3">Material Cost Saving</th>
                                                        <th style="vertical-align:middle;text-align:center"colspan="3">Other Benefits</th>
                                                        <th style="vertical-align:middle;text-align:center"rowspan="2">Forecasted Volume</th>
                                                        <th style="vertical-align:middle;text-align:center"colspan="3">Total Save Base On</th>
                                                    </tr>
                                                    <tr>
                                                        <th style="vertical-align:middle;text-align:center">Before</th>
                                                        <th style="vertical-align:middle;text-align:center">After</th>
                                                        <th style="vertical-align:middle;text-align:center">Improve</th>
                                                        <th style="vertical-align:middle;text-align:center">Before</th>
                                                        <th style="vertical-align:middle;text-align:center">After</th>
                                                        <th style="vertical-align:middle;text-align:center">Saving $/pair</th>
                                                        <th style="vertical-align:middle;text-align:center">Before</th>
                                                        <th style="vertical-align:middle;text-align:center">After</th>
                                                        <th style="vertical-align:middle;text-align:center">Improve</th>
                                                        <th style="vertical-align:middle;text-align:center">PPH</th>
                                                        <th style="vertical-align:middle;text-align:center">Cost$</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $no=0; @endphp
                                                        @foreach($data as $a)
                                                        @php $no++; @endphp
                                                        <tr>
                                                           <td><center>{{$no}}</center></td>
                                                           <td><center>{{$a->dfx_id}}</center></td>
                                                           <td><center>{{$a->category}}</center></td>
                                                           <td><center>{{$a->model_name}}</center></td>
                                                           <td><center>
                                                               <a class="test-popup-link" href="{{url('/images/development/dfx/'.$a->model_picture)}}">
                                                                    <img src="{{url('/images/development/dfx/'.$a->model_picture)}}" height="100%" width="100%"/></center>
                                                                </a>
                                                            </center></td>
                                                           <td><center>{{$a->dfx_description}}</center></td>
                                                           <td><center>{{$a->dfx_principle_primary}}</center></td>
                                                           <td><center>{{$a->dfx_principle_secondery_1}}</center></td>
                                                           <td><center>{{$a->dfx_principle_secondery_2}}</center></td>
                                                           <td><center>{{$a->season}}</center></td>
                                                           <td><center>{{$a->status_approve}}</center></td>
                                                           <td><center>{{$a->explain_status_no}}</center></td>
                                                           <td><center>{{$a->pph_improve_before}}</center></td>
                                                           <td><center>{{$a->pph_improve_after}}</center></td>
                                                           <td><center>{{$a->pph_improve}}</center></td>
                                                           <td><center>{{$a->material_cost_saving_before}}</center></td>
                                                           <td><center>{{$a->material_cost_saving_after}}</center></td>
                                                           <td><center>{{$a->material_cost_saving}}</center></td>
                                                           <td><center>{{$a->other_benefits_before}}</center></td>
                                                           <td><center>{{$a->other_benefits_after}}</center></td>
                                                           <td><center>{{$a->other_benefits_improve}}</center></td>
                                                           <td><center>{{$a->forecasted_volume_prs}}</center></td>
                                                           <td><center>{{$a->total_save_pph}}</center></td>
                                                           <td><center>{{$a->total_save_cost}}</center></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <!-- /.card-body -->
                                    <!-- /.card-footer -->
                                        <div class="card-footer clearfix">
                                        </div>
                                    <!-- /.card-footer -->
                                    </form>
                                </div>
                            </div>
                        {{--  /.Report PerCell --}}
                        <br>
                    </div>
                <!-- /content-->
              </div><!-- /.card-body -->

            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
{{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $('.dynamic').change(function(){
            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('dfx_data.fetch') }}",
                    method:"POST",
                    data:{select:select, value:value, _token:_token, dependent:dependent},
                    success:function(result)
                    {
                    $('#'+dependent).html(result);
                    }

                })
            }
        });

    $('#season').change(function(){
    $('#modal').val('');
    $('#principle').val('');
    });

    $('#modal').change(function(){
    $('#principle').val('');
    });


    });
</script>

@endsection


@section('footer')

