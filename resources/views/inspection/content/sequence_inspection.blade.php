<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sequence Inspection</title>
    <style>
        .circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            cursor: pointer;
        }
        .circle_seq {
            cursor: pointer;
            width: 20px;
            height: 20px;
            border-radius: 50%
        }
        .card-header{
            font-size: 60%;
            font-weight: bold;
        }
        span{
            cursor: pointer;
        }
        .card-title{
            font-size:90%;
            margin-top: 10px;
        }
        .font-footer{
            font-size: 60%;
            font-weight: bold;
        }
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <h3>Sequence Inspection</h3>
          </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <img src="{{ asset('dist\img\icon.ico') }}" style="width: 3vw" alt="description of myimage">
          {{-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
          </form>
      </div>
  </nav>
  <div class="container-fluid">
      <div class="row">
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="self(1)">
                    <div class="col-2">
                      <div class="circle c_self_1" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-7 text-right">
                      <span class="font-weight-bold" onclick="count(1)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
              <h5 class="card-title">
                  Jahit TIP ke Upper
              </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_1" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_1" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(2)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_2"style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(2)">
                    <div class="col-2">
                      <div class="circle c_self_2" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(2)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Jahit Zig-zag Heel & Toe
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_2" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_2" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(3)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(3)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(3)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Gauge Backtab
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_3" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_3" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(4)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(4)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(4)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Jahit Backtab Ke Vamp/Quarter
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_4" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_4" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(5)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(5)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(5)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Jahit Backtab Ke Vamp/Quarter
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_5" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_5" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(6)">
                    <div class="col-2">
                    <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(6)">
                    <div class="col-2">
                    <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(6)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Jahit Balik Collar Lining Ke Vamp/Quarter
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_6" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_6" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(7)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(7)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(7)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Hot Melt Spray Tempel Collar Foam
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_7" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_7" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(8)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(8)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(8)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Tonjok Balik Collar lining & Hammering
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_8" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_8" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(9)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(9)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(9)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Jahit Padding  (2)
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_9" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_9" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(10)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(10)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(10)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Jahit Foxing Ke Vamp/Quarter
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_10" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_10" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(11)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(11)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(11)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Pounching (8 Hole) 
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_11" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_11" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(12)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(12)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(12)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Jahit Under
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_12" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_12" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(13)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(13)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(13)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Jahit Tongue Ke Vamp/Quarter
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_13" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_13" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(14)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(14)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(14)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Output + Clean Upper
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_14" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_14" value="0">
                </div>
            </div>
        </div>
        <div class="col-md-offset-1 col-md-4 col-sm-3 col-xs-4 mt-4">
            <div class="card-header row">
                <div class="col-5 row" onclick="seq(15)">
                    <div class="col-2">
                      <div class="circle_seq c_seq_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Seq Inspection
                    </div>
                </div>
                <div class="col-5 row" onclick="self(15)">
                    <div class="col-2">
                      <div class="circle c_self_3" style="background: red"></div>
                    </div>
                    <div class="col-10">
                        Self Inspection
                    </div>
                </div>
                <div class="col-2 text-right">
                    <span class="font-weight-bold" onclick="count(15)">&#10003;</span>
                </div>
            </div>
            <div class="body text-center">
                <h5 class="card-title">
                    Insert Lace
                </h5>
            </div>
            <div class="font-footer row">
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Sukses</label>
                    <input type="number" class="form-control" id="c_process_15" value="0">
                </div>
                <div class="form-group col-6">
                    <label for="exampleFormControlInput1">Count Error</label>
                    <input type="number" class="form-control" id="c_error_15" value="0">
                </div>
            </div>
        </div>
      </div>
  </div>
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        setInterval(function(){
            // window.location.reload(1);
            $.ajax({ 
                url:"{{ route('seq_inspection.reload') }}",
                method:"GET",
                dataType:'JSON',
                success:function(data)
                {
                    if (data) {
                        for (let i = 0; i < data.id.length; i++) {
                            $('#c_process_'+data.id[i]).val(data.sukses[i]);
                            $('#c_error_'+data.id[i]).val(data.error[i]);
                        }
                        
                    }
                }
            })
        }, 2000);
        function count(x)
        {
            let number = x
            let kurangi = 1;
            number -= kurangi;
            let sukses_b = $('#c_process_'+number).val();
            let error_b = $('#c_error_'+number).val();
            let sukses = $('#c_process_'+x).val();
            let error = $('#c_error_'+x).val();
            var result = parseInt(sukses)+1;
            if (x!=1) {
                if (parseInt(sukses_b)<=(parseInt(sukses)+parseInt(error))) {
                    alert('Tidak Ada Input');
                    return false;
                }           
            }
            $.ajax({ 
                url:"{{ route('seq_inspection.save_count') }}",
                method:"GET",
                data:{id:x},
                dataType:'JSON',
                success:function(data)
                {
                    if (data) {
                        $('#c_process_'+x).val(data.sukses);
                        $('#c_error_'+x).val(data.error);
                    }
                }
            })
        }
        function seq(id)
        {
            var idMin = id-1;
            var sukses_b = $('#c_process_'+idMin).val();
            var error_b = $('#c_error_'+idMin).val();
            var sukses = $('#c_process_'+id).val();
            var error = $('#c_error_'+id).val();
            var result_sukses = parseInt(sukses_b)-1;
            var result_error = parseInt(error_b)+1;
            if (parseInt(sukses_b)<=parseInt(sukses)+parseInt(error)) {
                alert('Tidak Ada Input');
                return false;
            }else{
                alert('Inspection Proses ke '+idMin+' Error');
                $.ajax({ 
                url:"{{ route('seq_inspection.save_seq') }}",
                method:"GET",
                data:{id:id},
                dataType:'JSON',
                success:function(data)
                {
                    if (data) {
                        $('#c_process_'+idMin).val(data.sukses);
                        $('#c_error_'+idMin).val(data.error);
                    }
                }
            })
            }
        }
        function self(id)
        {
            var idMin = id-1;
            var sukses_b = $('#c_process_'+idMin).val();
            var error_b = $('#c_error_'+idMin).val();
            var sukses = $('#c_process_'+id).val();
            var error = $('#c_error_'+id).val();
            var result = parseInt(error)+1;
            if (id!=1) {
                if (parseInt(sukses_b)<=parseInt(sukses)+parseInt(error)) {
                    alert('Tidak Ada Input');
                    return false;
                }           
            }
            $.ajax({ 
                url:"{{ route('seq_inspection.save_self') }}",
                method:"GET",
                data:{id:id},
                dataType:'JSON',
                success:function(data)
                {
                    if (data) {
                        $('#c_process_'+id).val(data.sukses);
                        $('#c_error_'+id).val(data.error);
                    }
                }
            })
        }
    </script>
    {{-- <script>
        function self(id,group)
        {
            if ($(".group_"+group+" .c_self_"+id).css('background-color')==='rgb(0, 128, 0)') {
                $(".group_"+group+" .c_self_"+id).css({'background-color': 'red'});
            }else{
                $(".group_"+group+" .c_self_"+id).css({'background-color': 'green'});
                $(".group_"+group+" .c_seq_"+id).css({'background-color': 'green'});
            }
        }
        function seq(id,group)
        {
            var idS=id-1;
            var idT=id+1;
            
            if (group == 1) {
                if (id==2) {    
                    if ($('.group_'+group+' .c_self_'+idS).css('background-color')==='rgb(0, 128, 0)') {
                        $('.group_'+group+' .c_self_'+idS).css({'background-color': 'red'});
                        $('.group_'+group+' .c_seq_'+id).css({'background-color': 'red'});
                        $(".group_"+group+" .c_self_"+id).css({'background-color': 'red'});
                    }else{
                        alert('Proses sebelumnya bermasalah');
                        return false;
                    }
                }else if (!$('.group_'+group+' .c_seq_'+idT).css('background-color')) {
                    if ($('.group_'+group+' .c_self_1').css('background-color')==='rgb(0, 128, 0)') {
                        $('.group_'+group+' .c_self_1').css({'background-color': 'red'});
                    }else{
                        alert('Proses sebelumnya bermasalah');
                        return false;
                    }
                    for (let i = 2; i <= id; i++) {
                        if ($('.group_'+group+' .c_seq_'+i).css('background-color')==='rgb(0, 128, 0)') {
                            $('.group_'+group+' .c_seq_'+i).css({'background-color': 'red'});
                            $(".group_"+group+" .c_self_"+i).css({'background-color': 'red'});
                        }
                        else{
                            alert('Proses sebelumnya bermasalah');
                            return false;
                        }
                    }
                }else{
                    for (let i = 2; i <= id; i++) {
                        if ($('.group_'+group+' .c_seq_'+i).css('background-color')==='rgb(0, 128, 0)') {
                            $('.group_'+group+' .c_seq_'+i).css({'background-color': 'red'});
                            $(".group_"+group+" .c_self_"+i).css({'background-color': 'red'});
                        }
                        else{
                            alert('Proses sebelumnya bermasalah');
                            return false;
                        }
                    }
                }
            }else{
                $status='';
                for (let i = 1; i <= id; i++) {
                    if ($('.group_'+group+' .c_seq_'+i).css('background-color')==='rgb(0, 128, 0)') {
                        $status='green';
                    }else{
                        $status='red';
                    }
                }
                if (status='green') {
                    $('.group_'+group+' .c_seq_'+i).css({'background-color': 'red'});
                    $(".group_"+group+" .c_self_"+i).css({'background-color': 'red'});
                }else{
                    alert('Proses sebelumnya bermasalah');
                    return false;
                }
            }
        }
    </script> --}}
  </body>
</html>