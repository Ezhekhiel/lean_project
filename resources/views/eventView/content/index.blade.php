@extends('eventView.layouts.app_index')

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
                        <h3 class="card-title">Event PT. Parkland World Indoensia</h3>
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
                                 <h4 class="alert-header">Image uploaded successfully</h4>
                               </span>
                            </div>
                        </div>
                        <div class="container mt-5" id="alert_error" style="display: none">
                            <div class="alert alert-danger" role="alert">
                               <span class="alert-body">
                                 <h4 class="alert-header">Image uploaded failed</h4>
                               </span>
                            </div>
                        </div>
                        <div class="container mt-5" id="alert_success_update" style="display: none">
                            <div class="alert alert-success" role="alert">
                               <span class="alert-body">
                                 <h4 class="alert-header">Update successfully</h4>
                               </span>
                            </div>
                        </div>
                        <div class="container mt-5" id="alert_error_update" style="display: none">
                            <div class="alert alert-danger" role="alert">
                               <span class="alert-body">
                                 <h4 class="alert-header">Update failed</h4>
                               </span>
                            </div>
                        </div>
                        <div class="container mt-5" id="alert_success_delete" style="display: none">
                            <div class="alert alert-success" role="alert">
                               <span class="alert-body">
                                 <h4 class="alert-header">Delete successfully</h4>
                               </span>
                            </div>
                        </div>
                        <div class="container mt-5" id="alert_error_delete" style="display: none">
                            <div class="alert alert-danger" role="alert">
                               <span class="alert-body">
                                 <h4 class="alert-header">Delete failed</h4>
                               </span>
                            </div>
                        </div>
                        <div class="tab-content p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div id="accordion">
                                        <div class="row">
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-info">
                                                    <div class="inner">
                                                        <h1><b>Walk Through</b></h1>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-walking"></i>
                                                    </div>
                                                    <a href="#walk_through" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="walk_through">More info
                                                        <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col TOS -->
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-success">
                                                    <div class="inner">
                                                        <h1><b>Lean Assessment</b></h1>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-chalkboard-teacher"></i>
                                                    </div>
                                                    <a href="#lean_assessment" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="lean_assessment">More info
                                                        <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col SWS-->
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-warning">
                                                    <div class="inner">
                                                        <h1><b>Coming Soon..</b></h1>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-meteor"></i>
                                                    </div>
                                                    <a href="#coming_soon" class="small-box-footer" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="coming_soon">More info
                                                        <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="collapse" id="walk_through" data-parent="#accordion">
                                                    <div class="card-header border-transparent"><h5>Walk Through Event</h5></div>
                                                    <div class="card-header">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".tambahDataWT">Tambah Data</button>
                                                    </div>
                                                    <div class="card-header">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <input type="text" name="search_wt" id="search_wt" class="form-control" placeholder="Search Process" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card card-body">
                                                        <span id="result"></span>
                                                        <div style="overflow-x:auto;">
                                                            <table id="datatable-keytable" class="table table-striped table-bordered">
                                                                <thead class="thead-dark">
                                                                <tr>
                                                                    <th style="vertical-align:middle;text-align:center" colspan="2">
                                                                        <a id="no">No</a>
                                                                        <input type="button" class="btn btn-danger btn-block btn-sm" id="btnDelete" style="display: none" value="Delete">
                                                                        <input type="button" class="btn btn-primary btn-block btn-sm" id="btnUnchecked" style="display: none" value="Unchecked">
                                                                    </th>
                                                                    <th style="vertical-align:middle;text-align:center">Tanggal Walk Through</th>
                                                                    <th style="vertical-align:middle;text-align:center">Jenis Event</th>
                                                                    <th style="vertical-align:middle;text-align:center">Nama Event</th>
                                                                    <th style="vertical-align:middle;text-align:center">Auditor</th>
                                                                    <th style="vertical-align:middle;text-align:center">Area</th>
                                                                    <th style="vertical-align:middle;text-align:center">Foto Temuan</th>
                                                                    <th style="vertical-align:middle;text-align:center">Description</th>
                                                                    <th style="vertical-align:middle;text-align:center">Due Date</th>
                                                                    <th style="vertical-align:middle;text-align:center">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="wt">
                                                                </tbody>
                                                            </table>
                                                            <div class="tampildata"></div>
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
            </section>
        </div>
    </div>
    {{-- modal input --}}
        {{-- add --}}
            <div class="modal fade tambahDataWT" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Input Data Event</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-md-12">
                                    <form method="post" action="#" id="form_input" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <table class="table table-bordered" id="dynamicTable"> --}}
                                    <div style="overflow-x:auto;">
                                        <table id="dynamicTable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>image</th>
                                                    <th>cell</th>
                                                    <th>Auditor</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="example">
                                                    <td><input type="file" name="image[]" id="tambahImage" placeholder="Enter Image" accept="image/x-png,image/gif,image/jpeg" /></td>
                                                    <td>
                                                        <select name="cell[]" id="tambahSelect" class="form-control" >
                                                                <option value="">Select Cell</option>
                                                            @foreach ($list_cell as $a)
                                                                <option value="{{$a->id_cell}}">{{$a->cell}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="auditor[]" id="tambahAuditor" placeholder="Enter Auditor" class="form-control" /></td>
                                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <td><button type="submit" class="btn btn-success">Save</button></td>
                        </div>
                                </form>
                    </div>
                </div>
            </div>
        {{-- update --}}
            <div class="modal fade updateModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Data Event</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-6 card" style="margin-right: 50px;">
                                <form method="post" action="#" id="form_update" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="updateID" name="id">
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forArea">Tanggal</label>
                                    <input type="date" class="form-control" id="updateTanggal" name="tanggal">
                                </div>
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forJenisEvent">Jenis Event</label>
                                    <input type="text" class="form-control" id="updateJenisEvent" name="jenisevent">
                                </div>
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forNamaEvent">Nama Event</label>
                                    <input type="text" class="form-control" id="updateNamaEvent" name="namaevent">
                                </div>
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forAuditor">Auditor</label>
                                    <input type="text" class="form-control" id="updateAuditor" name="auditor">
                                </div>
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forArea">Area</label>
                                    <select class="form-control" id="selectArea" name="selectarea">
                                    </select>
                                </div>
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forImage">Image</label>
                                    <img id="updateImage" style="border: 5px solid #555; display:block; margin-left:auto; margin-right:auto" height="150px" width="250px"/>
                                </div>
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forDescription">Description</label>
                                    <textarea class="form-control" id="updateDescription" name="description" rows="3"></textarea>
                                </div>
                                <div class="form-group" style="padding: 20px;">
                                    <label for="forArea">Due Date</label>
                                    <input type="date" class="form-control" id="updateDueDate" name="duedate">
                                </div>
                            </div>
                            <div class="col-5 card">
                                <hr style="border: 1px solid grey;">
                                <center><h5 style="font-weight: bold">Response Event</h5></center>
                                <hr style="border: 1px solid grey;">
                                <br>
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forJenisEvent">Image Response</label>
                                    <input type="file" class="form-control" id="updateImageResponse" name="imageresponse">
                                </div>
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forDescription">Description</label>
                                    <textarea class="form-control" id="updateDescription2" name="description2" rows="3"></textarea>
                                </div>
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forJenisEvent">Reason</label>
                                    <input type="text" class="form-control" id="updateReason" name="reason">
                                </div>
                                <div class="form-group" style="padding: 20px; padding-bottom:0">
                                    <label for="forJenisEvent">PIC</label>
                                    <input type="text" class="form-control" id="updatePIC" name="pic">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <td><button type="submit" class="btn btn-success">Save</button></td>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- delete --}}
            <div class="modal fade deleteModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Data Event</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="#" id="form_delete" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" style="padding: 20px; padding-bottom:0">
                                <label for="forArea">Are you sure for delete this finding?</label>
                                <img id="deleteImage" style="border: 5px solid #555; display:block; margin-left:auto; margin-right:auto" height="350px" width="550px"/>
                                <input type="hidden" id="deleteID" name="id">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <td><button type="submit" class="btn btn-danger">Delete</button></td>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- delete --}}
            <div class="modal fade deleteSelectModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Select Data Event</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="#" id="form_deleteSelect" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" style="padding: 20px; padding-bottom:0">
                                <label for="forArea">Are you sure for delete this finding?</label>
                                <div id="imageSelectDelete"></div>
                                <div id="idSelectDelete"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <td><button type="submit" class="btn btn-danger">Delete</button></td>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</section>
   
@endsection


@section('footer')

