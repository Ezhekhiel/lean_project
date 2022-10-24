@extends('layouts.app_index')

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
                                            <h3 class="card-title">FORM INPUT DFX DATA</h3>

                                        </div>
                                            @if (session('alert'))
                                                <div class="alert alert-danger">
                                                    {{ session('alert') }}
                                                </div>
                                            @endif
                                            @if (session('alert_save'))
                                                <div class="alert alert-success">
                                                    {{ session('alert_save') }}
                                                </div>
                                            @endif
                                        <div class="card-body">
                                            <form method="POST" name="myform" id="myform" action="{{url('/dfx/save')}}" enctype="multipart/form-data">
                                                <div class="card-tools">
                                                    <input type="submit" class="btn btn-success" value="Save">
                                                </div>
                                                    <br>
                                                <div class="row">
                                                        {{ csrf_field() }}
                                                    <!-- left column -->
                                                    <div class="col-md-6">
                                                        <!-- general form elements -->
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">General</h3>
                                                            </div>

                                                            <!-- /.card-header -->
                                                            <!-- form start -->
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputModelName">DFX ID</label>
                                                                        <input type="text" name="dfx_id" class="form-control"placeholder="Enter Model Name">
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('dfx_id') }}</i></b></p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputModelName">Model Name</label>
                                                                        <input type="text" name="model_name" class="form-control"placeholder="Enter Model Name">
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('model_name') }}</i></b></p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputFile">Model Picture</label>
                                                                        <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                        </div>
                                                                        </div>
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('image') }}</i></b></p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputCategory">Shoe Category</label>
                                                                        <input type="text" name="category" class="form-control"placeholder="Enter Category">
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('category') }}</i></b></p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputDescription">DFX Short Description</label>
                                                                        <textarea class="form-control" rows="4" name="description" placeholder="Enter ..."></textarea>
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('description') }}</i></b></p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSeason">Season </label>
                                                                        {{-- <small class="text-danger mr-1"><i>*(Format input season - year) Ex:</i></small>
                                                                        <i class="text-danger mr-1"><b>S1-2020</b></i>
                                                                        <input type="text" name="season"  class="form-control"placeholder="Enter Season"> --}}
                                                                        <select name="season" class="form-control">
                                                                            <option value="">Select Season</option>
                                                                            <option value="S1-20">S1-20</option>
                                                                            <option value="S2-20">S2-20</option>
                                                                            <option value="S1-21">S1-21</option>
                                                                            <option value="S2-21">S2-21</option>
                                                                            <option value="S1-22">S1-22</option>
                                                                            <option value="S2-22">S2-22</option>
                                                                            <option value="S1-23">S1-23</option>
                                                                            <option value="S2-23">S2-23</option>
                                                                            <option value="S1-24">S1-24</option>
                                                                            <option value="S2-24">S2-24</option>
                                                                            <option value="S1-25">S1-25</option>
                                                                            <option value="S2-25">S2-25</option>
                                                                        </select>
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('season') }}</i></b></p>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                        </div>
                                                        <!-- /.card -->
                                                        <!-- general form elements -->
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Validate</h3>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <!-- form start -->
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="validate" value="Yes">
                                                                        <label class="form-check-label">Yes</label>
                                                                        </div>
                                                                        <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="validate" value="No" checked>
                                                                        <label class="form-check-label">No</label>
                                                                        </div>
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('validate') }}</i></b></p>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputExplain">Explain Why for "N" in Approvel</label>
                                                                        <textarea class="form-control" rows="4" name="explain"placeholder="Enter ..."></textarea>
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('explain') }}</i></b></p>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                        </div>
                                                        <!-- /.card -->
                                                        <!-- general form elements disabled -->
                                                        <div class="card card-warning">
                                                        <div class="card-header">
                                                            <h3 class="card-title">DFX Principles #</h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                <!-- Select multiple-->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputPrimary">Primary #</label>
                                                                        <select multiple size="5"class="form-control" name="primary">
                                                                        <option value="1">#1. Reduce the total number of parts (upper and sole)</option>
                                                                        <option value="2">#2. Reduce the total number of materials & colors</option>
                                                                        <option value="3">#3. Reduce the total number of suppliers</option>
                                                                        <option value="4">#4. Maximize the use of common parts and materials</option>
                                                                        <option value="5">#5. Introduce or maximize the use of standardized and modular components</option>
                                                                        <option value="6">#6. Minimize the complexity of matching parts (upper/sole and color matching)</option>
                                                                        <option value="7">#7. Minimize all tooling costs (upper and bottom)</option>
                                                                        <option value="8">#8. Minimize use of different treatment types on one product</option>
                                                                        <option value="9">#9. Design for ease of fabrication, process and waste elimination </option>
                                                                        <option value="10">#10. Learn from the past – current manufacturing problems and best practices</option>
                                                                        </select>
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('primary') }}</i></b></p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputSecondary">Other Secondary #</label>
                                                                    <select multiple size="5"class="form-control" name="secondary1">
                                                                    <option value="1">#1. Reduce the total number of parts (upper and sole)</option>
                                                                        <option value="2">#2. Reduce the total number of materials & colors</option>
                                                                        <option value="3">#3. Reduce the total number of suppliers</option>
                                                                        <option value="4">#4. Maximize the use of common parts and materials</option>
                                                                        <option value="5">#5. Introduce or maximize the use of standardized and modular components</option>
                                                                        <option value="6">#6. Minimize the complexity of matching parts (upper/sole and color matching)</option>
                                                                        <option value="7">#7. Minimize all tooling costs (upper and bottom)</option>
                                                                        <option value="8">#8. Minimize use of different treatment types on one product</option>
                                                                        <option value="9">#9. Design for ease of fabrication, process and waste elimination </option>
                                                                        <option value="10">#10. Learn from the past – current manufacturing problems and best practices</option>
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('secondary1') }}</i></b></p>
                                                                    </select>
                                                                    <a>------</a>
                                                                    <select multiple size="5"class="form-control" name="secondary2">
                                                                    <option value="1">#1. Reduce the total number of parts (upper and sole)</option>
                                                                        <option value="2">#2. Reduce the total number of materials & colors</option>
                                                                        <option value="3">#3. Reduce the total number of suppliers</option>
                                                                        <option value="4">#4. Maximize the use of common parts and materials</option>
                                                                        <option value="5">#5. Introduce or maximize the use of standardized and modular components</option>
                                                                        <option value="6">#6. Minimize the complexity of matching parts (upper/sole and color matching)</option>
                                                                        <option value="7">#7. Minimize all tooling costs (upper and bottom)</option>
                                                                        <option value="8">#8. Minimize use of different treatment types on one product</option>
                                                                        <option value="9">#9. Design for ease of fabrication, process and waste elimination </option>
                                                                        <option value="10">#10. Learn from the past – current manufacturing problems and best practices</option>
                                                                        <p class="text-danger mr-1"><b><i>{{ $errors->first('secondary2') }}</i></b></p>
                                                                    </select>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                    <!--/.col (left) -->
                                                    <!-- right column -->
                                                    <div class="col-md-6">
                                                        <div class="card card-secondary">
                                                        <div class="card-header">
                                                            <h3 class="card-title">IMPACT</h3>
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">PPH IMPROVE</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputEmail1">Before</label>
                                                                                    <input type="number" step="any" name="pph_improve_before"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('pph_improve_before') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label for="examplePph_improve_before">After</label>
                                                                                    <input type="number" step="any" name="pph_improve_after"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('pph_improve_before') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputPph_improve_before">Improve</label>
                                                                                    <input type="number" step="any" name="pph_improve_improve"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('pph_improve_before') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Material Cost Saving</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputMaterial_cost_before">Before</label>
                                                                                    <input type="number" step="any" name="material_cost_before"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('material_cost_before') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputMaterial_cost_after">After</label>
                                                                                    <input type="number" step="any" name="material_cost_after"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('material_cost_after') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputMaterial_cost_saving">Saving</label>
                                                                                    <input type="number" step="any" name="material_cost_saving"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('material_cost_saving') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Other Benefits</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputOther_benefits_before">Before</label>
                                                                                    <input type="number" step="any" name="other_benefits_before"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('other_benefits_before') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputOther_benefits_after">After</label>
                                                                                    <input type="number" step="any" name="other_benefits_after"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('other_benefits_after') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputother_benefits_improve">Improve</label>
                                                                                    <select class="form-control" name="other_benefits_improve">
                                                                                        <option value="">Choice Improve</option>
                                                                                        <option value="Safety">Safety</option>
                                                                                        <option value="RFT%">RFT%</option>
                                                                                        <option value="Good Quality">Good Quality</option>
                                                                                        <option value="Innovative Process">Innovative Process</option>
                                                                                        <option value="Good for Environment">Good for Environment</option>
                                                                                    </select>
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('other_benefits_improve') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Forecasted Volume / prs</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <input type="number" step="any" name="forecasted"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('forecasted') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="card-header">
                                                                        <h4 class="card-title">Total save base on forecasted volume</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputSave_pph">PPH</label>
                                                                                    <input type="number" step="any" name="save_pph"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('save_pph') }}</i></b></p>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label for="exampleInputCost">COST $</label>
                                                                                    <input type="number" step="any" name="cost"class="form-control"placeholder="Enter Number">
                                                                                    <p class="text-danger mr-1"><b><i>{{ $errors->first('cost') }}</i></b></p>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        </div>
                                                        <!-- /.card -->
                                                        <div class="card-footer clearfix">
                                                        </div>
                                                    </div>
                                                    <!--/.col (right) -->
                                                </div>
                                            </form>
                                        </div>
                                    <!-- /.card-header -->
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
<script>
    (function () {
        var form = document.forms['myform'];
        form.validate[1].onfocus = function () {
            form.explain.disabled = false;
        }
        form.validate[0].onfocus = function () {
            form.explain.disabled = true;
        }
    })();
</script>
@endsection


@section('footer')

