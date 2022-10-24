@extends('recruitment.layouts.app_index')

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
                                 <h4 class="alert-header alertSuccess"></h4>
                               </span>
                            </div>
                        </div>
                        <div class="container mt-5" id="alert_error" style="display: none">
                            <div class="alert alert-danger" role="alert">
                               <span class="alert-body">
                                 <h4 class="alert-header alertError"></h4>
                               </span>
                            </div>
                        </div>
                        <div style="overflow-x:scroll;width:100%">
                            <form method="GET" action='/recruitment/download_file_excel' class="mb-2">
                                <button class="btn btn-primary">Download Master Excel</button>
                            </form>
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr onclick="openMenu()">
                                        <th style="min-width: 100px;">Time Stamp</th>
                                        <th style="min-width: 200px;">Name</th>
                                        <th>Age</th>
                                        <th style="min-width: 200px;">Bachelors Degree</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th style="min-width: 250px;">Campus Name</th>
                                        <th>Study program</th>
                                        <th style="min-width: 300px;">Address</th>
                                        <th>Experience</th>
                                        <th>Length of Experience</th>
                                        <th>Reference</th>
                                        <th>Status</th>
                                        <th>Status Email</th>
                                    </tr>
                                    <tr>
                                        <th><select type="text" class="filterSelect" name="tanggal" id="id_ts"></select></th>
                                        <th><select type="text" class="filterSelect" name='name' id="id_name"></select></th>
                                        <th><select type="text" class="filterSelect" name='age' id="id_age"></select></th>
                                        <th><select type="text" class="filterSelect" name='bachelors_degree' id="id_bd"></select></th>
                                        <th><select type="text" class="filterSelect" name='email' id="id_email"></select></th>
                                        <th><select type="text" class="filterSelect" name='phone_number' id="id_phone"></select></th>
                                        <th><select type="text" class="filterSelect" name='nama_kampus' id="id_cn"></select></th>
                                        <th><select type="text" class="filterSelect" name='program_pendidikan' id="id_ps"></select></th>
                                        <th><select type="text" class="filterSelect" name='alamat' id="id_address"></select></th>
                                        <th><select type="text" class="filterSelect" name='pengalaman_kerja' id="id_experience"></select></th>
                                        <th><select type="text" class="filterSelect" name='lama_bekerja' id="id_loe"></select></th>
                                        <th><select type="text" class="filterSelect" name='referensi' id="id_reference"></select></th>
                                        <th><select type="text" class="filterSelect" name='status' id="id_status"></select></th>
                                        <th><select type="text" class="filterSelect" name='status_email' id="id_se"></select></th>
                                    </tr>
                                </thead>
                                <tbody id="tableRecruitment" style="font-size: 15px;">
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-secondary" id="resetshow">Reset</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="modal fade modalOpenMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <button class="btn btn-primary btn-block" onclick="modalOpenImport()">Import Data Reqruitment</button>
                <button class="btn btn-success btn-block" onclick="modalPrint()">Print Data Reqruitment</button>
                <button class="btn btn-success btn-block" onclick="modalEmail()">Send Email</button>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade modalOpenImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" action="#" id="importExcel" class="was-validated" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="importFile" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Import must be file excel</div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade shoMenuName" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <button class="btn btn-primary btn-block" id="btnStatusCandidate">Status Candidate</button>
                <button class="btn btn-danger btn-block" id="btnDeleteCandidate">Delete Candidate</button>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade modalStatusCandidate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Status Candidate</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form method="post" action="#" id="statusCandidate" enctype="multipart/form-data">
                    @csrf
                    <h3 id="transfer_nama_candidate" style="text-align: center"></h3> <br>
                    <div class="form-group">
                        <label for="">Status Candidate</label>
                        <select class="form-control" name="status" id="selectStatusCandidate" required>
                            <option value="">Select Hire</option>
                            <option value="Accept">Acccept</option>
                            <option value="Reject">Reject</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" id="candidateID">
                        <label>Date Accept Candidate</label>
                        <input type="date" class="form-control" name="date" id="candidateDateAccept" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade modalDeleteCandidate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Candidate</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5>Are your sure for delete this candidate?</h5><br>
                <form method="post" action="#" id="deleteCandidate" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" id="deleteID">
                        <input type="hidden" name="id_test" id="id_test">
                        <h3 id="delete_name_candidate" style="text-align: center"></h3> <br>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
          </div>
        </div>
    </div>
    <div class="modal fade modalEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row p-2">
                        <div class="card col-6 rounded-top">
                            <div class="row mb-3 mt-4 ml-4">
                                {{-- <div class="col-2">
                                    <button class="btn btn-secondary" onclick="emailInvitation()">Email Invitation</button>
                                </div> --}}
                                <div class="col-2">
                                    <button class="btn btn-secondary" onclick="emailOnlineTest()">Online Test</button>
                                </div>
                                {{-- <div class="col-2">
                                    <button class="btn btn-secondary" onclick="emailInformation()">Email Information</button>
                                </div> --}}
                            </div>
                            <hr>
                            <div class="form" id="formEmailInvitation">
                                <div class="form-row mb-3">
                                    <div class="col-2 text-center mt-2">
                                        <label>Letter Number</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" id="letterNumberEmail" value="" placeholder="Input Letter Numbber">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                  <div class="col-2 text-center mt-2">
                                      <label>Perihal</label>
                                  </div>
                                  <div class="col-8">
                                      <input type="text" class="form-control" id="perihalEmail" value="" placeholder="Input Perihal">
                                  </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-2 text-center mt-2">
                                        <label>Date</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="date" class="form-control" value="" id="dateEmail">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-2 text-center mt-2">
                                        <label>Time</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="time" class="form-control" value="" id="timeEmail">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-2 text-center mt-2">
                                        <label>Necessities</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" value="" id="keperluanEmail" placeholder="Input Necessities">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-2 text-center mt-2">
                                        <label>Room</label>
                                    </div>
                                    <div class="col-8">
                                        <select id="roomEmail" class="form-control">
                                            <option value="Jawa Meeting Room">Jawa Meeting Room</option>
                                            <option value="Pacific Meeting Room">Pacific Meeting Room</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-2 text-center mt-2">
                                        <label>To</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-check">
                                            <input class="form-check-input radioEmail" name="toName" type="radio" value="Haven't received an invite" id="notyet">
                                            <label class="form-check-label" for="defaultCheck1">
                                            Haven't received an invite
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radioEmail" name="toName" type="radio" value="All" id="allEmail">
                                            <label class="form-check-label" for="defaultCheck1">
                                                All
                                            </label>
                                        </div>
                                    </div>
                                </div>
                              <div class="form-row mt-5">
                                  <button class="btn btn-secondary btn-block" onclick="generateEmail()">Generate</button>
                              </div>
                            </div>
                            <div class="form" id="emailOnlineTest">
                                <div class="form-row mb-3">
                                    <div class="col-2 text-center mt-2">
                                        <label>Date</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="date" class="form-control" value="" id="dateEmailOnline">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-2 text-center mt-2">
                                        <label>Time</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="time" class="form-control" value="" id="timeEmailOnline">
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="col-2 text-center mt-2">
                                        <label>Link MS Teams</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea type="text" class="form-control" value="" id="linkOnline"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-2 text-center mt-2">
                                        <label>To</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-check">
                                            <input class="form-check-input radioEmail" name="toName" type="radio" value="Haven't received an invite" id="notyet">
                                            <label class="form-check-label" for="defaultCheck1">
                                            Haven't received an invite
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radioEmail" name="toName" type="radio" value="All" id="allEmail">
                                            <label class="form-check-label" for="defaultCheck1">
                                                All
                                            </label>
                                        </div>
                                    </div>
                                </div>
                              <div class="form-row mt-5">
                                  <button class="btn btn-secondary btn-block" onclick="generateEmail3()">Generate</button>
                              </div>
                            </div>
                            <div class="form" id="formEmailInformation">
                                <div class="form-row">
                                    <div class="col-2 text-center mt-2">
                                        <label>To</label>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-check">
                                            <input class="form-check-input radioEmail2" name="toNameInformation" type="radio" value="All" id="allEmail">
                                            <label class="form-check-label" for="defaultCheck1">
                                                All
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radioEmail2" name="toNameInformation" type="radio" value="Accepted" id="acceptedEmail">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Candidate has accepted
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input radioEmail2" name="toNameInformation" type="radio" value="Select" id="selectCandidate">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Select Candidate
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-3" id="selectCandidateInformation" style="display: none">
                                    <div class="col-2 text-center mt-2">
                                        <label>Select Candidate</label>
                                    </div>
                                    <div class="col-6">
                                        <select class="form-control" name="selectCandidate" id="selectCandidateID">
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <button class="btn btn-primary btn-block" onclick="addEmailCandidate()">Add</button>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-2 text-center mt-2">
                                        <label>Input Text Email</label>
                                    </div>
                                    <div class="col-8">
                                        <textarea style="text-align: left" class="form-control" name="textEmail" id="textEmailID" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <button class="btn btn-secondary btn-block" onclick="generateEmail2()">Generate</button>
                                </div>
                            </div>
                        </div>
                        <div class="card col-6 rounded-top">
                            <div class="card-header bg-dark rounded-top">
                                Send Email
                            </div>
                            <form method="post" action="#" id="sendEmail" enctype="multipart/form-data">
                              @csrf
                                <div class="card-body">
                                    <div class="col-auto">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">To  :</div>
                                                    </div>
                                                    <input type="text" class="form-control" name="toEmail" id="valueTo" style="text-align: left; pointer-events: none;"> <br>
                                                    <input type="hidden" id="menuID" name="menuID">
                                                    <input type="hidden" id="tanggalSend" name="tanggalEmail">
                                                    <input type="hidden" id="timeSend" name="timeEmail">
                                                    <input type="hidden" id="linkSend" name="linkSend">
                                                    <input type="hidden" id="letterNoSend" name="letterNoEmail">
                                                    <input type="hidden" id="perihalSend" name="perihalEmail">
                                                    <input type="hidden" id="keperluanSend" name="keperluanEmail">
                                                    <input type="hidden" id="roomEmailSend" name="roomEmail">
                                                </div>
                                            </div>
                                            <div class="col-3 row">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-danger btn-block" onclick="deleteTo()">Delete To</button>
                                                </div>
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-warning btn-block" onclick="deleteAllTo()">Delete All To</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea rows="25" style="text-align: left; pointer-events: none;" class="form-control" name="emailValue" id="valueEmail"></textarea>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right ml-2">Send Email</button>
                                    <button type="button" class="btn btn-danger float-right" onclick="resetAll()">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</section>
   
@endsection


@section('footer')

