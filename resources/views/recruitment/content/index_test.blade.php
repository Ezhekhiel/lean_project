@extends('recruitment.layouts.app_index_test')

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
                        <h3 class="card-title">Recruitment PT. Parkland World Indoensia</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container mt-5" id="alert_success" style="display: none">
                            <div class="alert alert-success" role="alert">
                               <span class="alert-body">
                                 <h4 class="alert-header alertSuccess">alert</h4>
                               </span>
                            </div>
                        </div>
                        <div class="container mt-5" id="alert_error" style="display: none">
                            <div class="alert alert-danger" role="alert">
                               <span class="alert-body">
                                 <h4 class="alert-header alertError">alert error</h4>
                               </span>
                            </div>
                        </div>
                        <div class="row mb-4" style="font-size: 1vw">
                            <div class="col-xl-3 col-lg-1 col-md-1 col-sm-1 text-center mt-auto mb-auto" style="cursor: pointer;">
                                <i class="fa-sharp fa-solid fa-angles-left" id="leftArrow"></i>
                            </div>
                            <div class="col-xl-6 col-lg-10 col-md-10 col-sm-10 card">
                                <div class="card-body">
                                    <div class="my-1">
                                        <label class="sr-only" for="inlineFormInputGroupUsername">Name</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                          </div>
                                          <select type="text" class="form-control"  id="IDsearchName" placeholder="Username"></select>
                                        </div>
                                      </div>
                                    <input type="hidden" id="pageKe" value="0">
                                    <table class="table">
                                        <tr>
                                            <td style="width: 35%">Nama</td>
                                            <td style="width: 5%">:</td>
                                            <td style="width: 60%" id="IDNama"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Education</td>
                                            <td style="width: 5%">:</td>
                                            <td style="width: 60%" id="IDEducation"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Age</td>
                                            <td style="width: 5%">:</td>
                                            <td style="width: 60%" id="IDAge"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Address</td>
                                            <td style="width: 5%">:</td>
                                            <td style="width: 60%" id="IDAddress"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 35%">Experience</td>
                                            <td style="width: 5%">:</td>
                                            <td style="width: 60%" id="IDExperience"></td>
                                        </tr>
                                    </table>
                                </div>
                                <div style="overflow-x:auto;">
                                    <table class="table table-striped table-hover mt-4">
                                        <thead class="bg-info">
                                            <tr>
                                                <td>Kode Test</td>
                                                <td>Number of questions</td>
                                                <td>Score / Question</td>
                                                <td>Number of correct answers</td>
                                                <td>Target</td>
                                                <td>Total Score</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyScore"></tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th id="totalScore"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="mt-4 mb-4">
                                    <canvas id="marksChart" width="1000" height="400"></canvas>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-1 col-md-1 col-sm-1 text-center mt-auto mb-auto">
                                <i class="fa-sharp fa-solid fa-angles-right" id="rightArrow" style="cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

@endsection


@section('footer')

