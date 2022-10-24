<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('dist/img/icon.ico') }}" type="image/ico" />
    <title>PT. Parkland World Indonesia 2</title>

   <!-- Font -->
    <link href="{{ asset('dist/css/font/CS_FAMILY_FONT.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/fonts/icomoon/style.css') }}">

   <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/lightgallery.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-datepicker.css') }}">

    <link href="{{ asset('dist/css/font/flaticon/font/flaticon.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dist/css/swiper.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/style_cr/style.css') }}">


    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Font Custome -->
    <link rel="stylesheet" href="{{ asset('plugins/FontMoreAwesome/font-more-awesome.css') }}">
    <style>
        body{
            font-family:sans-serif;
            font-weight:bold;
        }
        .img_logo{
            width: 70%;
            height: 70%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .card{
            margin-top: -10px;
            margin-left: -10px
        }
        .table_sop,tr{
            vertical-align: top;
        }
        .desc{
            font-size: 0.6vw;
            letter-spacing: 1px;
        }
        .desc,.card-header{
            margin-left: -5px
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <section class="col-lg-12 connectedSortable">
                <div class="card p-2">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Repeat</label>
                        <input type="number" class="form-control mb-1" id="id_repeat">
                        <button class="btn btn-primary" onclick="repeat()">Action</button>
                    </div>
                </div>
            </section>
            <div id="main_sop">
                <section class="col-lg-12 connectedSortable body-sop" id="id_real">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">SOP</h5>
                            <div class="card-tools" id="navi">
                                <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-plus" id="icons"></i>
                                </button>
                            </div>
                        </div><!-- /.card-header all -->
                        <div class="collapse show" id="collapseExample">
                            <div class="card-body">
                                @foreach ($data as $a)
                                    <div class="card">
                                        <div class="row m-4">
                                            <div class="col-2">
                                                <div class="card" style="height: 100%">
                                                    <img class="img_logo mt-auto mb-auto" src="{{ asset('images\lean\leanmedia\make_sop\Logo NB.png') }}" alt="Card image cap">
                                                </div>
                                            </div>
                                            <div class="col-7 ml-0">
                                                <div class="card" style="height: 100%">
                                                    <div class="row mt-auto mb-auto">
                                                        <div class="col-1 p-3">
                                                            <img class="img_logo" style="height: 50px; width:50px" src="{{ asset('images\lean\leanmedia\make_sop\parkland2.png') }}" alt="Card image cap">
                                                        </div>
                                                        <div class="col-11 text-center pt-3">
                                                            <p style="font-size: 150%;">PT. PARKLAND WORLD INDONESIA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 ml-0">
                                                <div class="card" style="height: 100%">
                                                        <p class="mb-auto mt-auto ml-auto mr-auto" style="letter-spacing: -1px; font-size:100%;">Predetermined</p>
                                                        <p class="mb-auto mt-auto ml-auto mr-auto" style="font-size:120%">TT : 30.00 <sup style="font-size:50%">Detik</sup></p>
                                                        <p class="mb-auto mt-auto ml-auto mr-auto" style="letter-spacing: -0.7px; font-size:50%;">Waktu maximal produksi 1 pasang</p>
                                                </div>
                                            </div>
                                            <div class="col ml-0">
                                                <div class="card" style="height: 100%">
                                                        <p class="mb-auto mt-1 ml-auto mr-auto" style="letter-spacing: -1px; font-size:90%;">Actual</p>
                                                        <p class="mb-auto mt-1 mr-auto" style="font-size:80%;letter-spacing: -1.5px;">CT1:</p>
                                                        
                                                </div>
                                            </div>
                                            <div class="col-2 mt-1">
                                                <div class="card text-center h-100">
                                                    <p class="mb-auto mt-auto" style="font-size: 1.5vw;letter-spacing: 10px;">SOP</p>
                                                </div>
                                            </div>
                                            <div class="col-7 ml-0 mt-1">
                                                <div class="card h-100">
                                                    <div class="row mt-auto mb-auto ml-2">
                                                        <div class="col-4">
                                                            <p class="mb-auto" style="font-size: 120%">NAMA MODEL : </p>
                                                        </div>
                                                        <div class="col-8">
                                                            <p class="mb-auto" style="font-size: 120%;">{{ $a->model_sepatu }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 mt-1">
                                                <div class="card text-center h-100">
                                                    <p class="mb-auto mt-auto" style="font-size: 120%;">CT : 20.35 <sup style="font-size:50%">Detik</sup></p>
                                                </div>
                                            </div>
                                            <div class="col ml-0 mt-1">
                                                <div class="card" style="height: 150%">
                                                        <p class="mb-auto mt-auto mr-auto" style="font-size:80%;letter-spacing: -1.5px;">CT2:</p>
                                                </div>
                                            </div>
                                            <div class="col-2 mt-1">
                                                <div class="card text-center">
                                                    <p class="mb-auto mt-auto" id="cell_area_sop_1" style="font-size: 120%;">Area</p>
                                                    <input type="hidden" id="id_cell_area_sop_1">
                                                </div>
                                            </div>
                                            <div class="col-7 ml-0 mt-1">
                                                <div class="card h-70">
                                                    <div class="row mt-auto mb-auto ml-2">
                                                        <div class="col-2">
                                                            <p class="mb-auto" style="font-size: smaller;">PROSES : </p>
                                                        </div>
                                                        <div class="col-10">
                                                            <p class="mb-auto" style="font-size: smaller;">{{ $a->proses }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 mt-1">
                                                <div class="card text-center" style="height: 85%">
                                                    <p class="mb-auto mt-auto" style="font-size:70%;">Waktu Setiap Proses Kerja</p>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="card text-center" style="height: 100%">
                                                    <p class="mb-auto mt-auto" style="font-size:1vw;">PROSEDUR STANDAR OPERASI</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="card text-center" style="height: 100%">
                                                    <p class="mb-auto mt-auto" style="font-size:1vw;">FOKUS KUALITAS</p>
                                                </div>
                                            </div>
                                            <div class="col-8 mt-1">
                                                <div class="card" style="height: 100%">
                                                    <div class="row mt-0 ml-2">
                                                        <table class="table_sop m-1">
                                                            <tr>
                                                                <td style="width: 5%;">1</td>
                                                                <td style="width: 95%">
                                                                    SIAPKAN PRODUK YANG AKAN DIKERJAKAN PASTIKAN SEMUANYA DALAM KONDISI BEST QUALITY / TIDAK REJECT
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 5%">2</td>
                                                                <td style="width: 95%">
                                                                    LAKUKAN PROSES PRIMMER OUTSOLE, OLESKAN PRIMMER MULAI DARI BAGIAN TOE KIRI ATAS KE BAWAH DENGAN SEDIKIT TEKANAN KE SELURUH BAGIAN PINGGIR OUTSOLE OLESKAN SISA LEM PADA LASTING STROBEL (MAX 2 KALI CELUPAN)
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 5%">3</td>
                                                                <td style="width: 95%">
                                                                    MASUKKAN KEMBALI UPPER KEDALAM CONVEYOR UNTUK PROSES DRIYING
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <div class="w-100" style="margin-top: 5%;">
                                                            <img class="img_logo h-100" src="{{ asset('images\lean\leanmedia\make_sop\Logo NB.png') }}" alt="Card image cap">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 mt-1">
                                                <div class="card" style="height: 100%">
                                                    <div class="row mt-1 mb-auto ml-2">
                                                        <table class="table_sop m-1">
                                                            <tr>
                                                                <td style="width: 5%;">1</td>
                                                                <td style="width: 95%">
                                                                    PERHATIKAN 6S & QUALITY KOMPONEN
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 5%;">2</td>
                                                                <td style="width: 95%">
                                                                    JENIS PRIMMER : LB 8010 TF + LB 120
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 5%;"></td>
                                                                <td style="width: 95%">
                                                                    TEMPERATUR : 47 - 52 &deg;C
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 5%;"></td>
                                                                <td style="width: 95%">
                                                                    TIMER : 1'25" - 1' 30"
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <div class="w-100 mt-auto mb-auto">
                                                            <img src="{{ asset('images\lean\leanmedia\make_sop\Self_Inspection.png') }}" class="img_logo"alt="Card image cap">
                                                        </div>
                                                        <div class="row p-2 m-1">
                                                            <div class="card col-6 desc" style="font-size: 80%">
                                                                <div class="card-header">
                                                                    MESIN TOOL
                                                                </div>
                                                                <div class="card-body">
                                                                    TES
                                                                    TES
                                                                    TES 
                                                                    TES
                                                                </div>
                                                            </div>
                                                            <div class="card ml-1 col-6 desc" style="font-size: 80%">
                                                                <div class="card-header">
                                                                    SPESIFIKASI
                                                                </div>
                                                                <div class="card-body">
                                                                    TES
                                                                    TES
                                                                    TES
                                                                    TES
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8 mt-1">
                                                <div class="card text-center">
                                                    <p class="mb-auto mt-auto border" style="font-size:1.2vw;">HSE POINT</p>
                                                    <div class="row p-2">
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <img class="img_logo" src="{{ asset('images\lean\leanmedia\make_sop\GUNAKAN TUTUP KEPALA ATAU SLAYER.png') }}" alt="Card image cap">
                                                                </div>
                                                                <div class="col-9">
                                                                    GUNAKAN TUTUP KEPALA / SLAYER
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <img class="img_logo" src="{{ asset('images\lean\leanmedia\make_sop\GUNAKAN TUTUP KEPALA ATAU SLAYER.png') }}" alt="Card image cap">
                                                                </div>
                                                                <div class="col-9">
                                                                    GUNAKAN TUTUP KEPALA / SLAYER
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="row">
                                                                <div class="col-3">
                                                                    <img class="img_logo" src="{{ asset('images\lean\leanmedia\make_sop\GUNAKAN TUTUP KEPALA ATAU SLAYER.png') }}" alt="Card image cap">
                                                                </div>
                                                                <div class="col-9">
                                                                    GUNAKAN TUTUP KEPALA / SLAYER
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mt-1">
                                                <div class="card text-center" style="height:120%">
                                                    <div class="row">
                                                        <div class="col-5">
                                                            <div class="text-center border rounded m-1" style="height: 120%;">
                                                                TTD
                                                            </div>
                                                        </div>
                                                        <div class="col-7" style="width:100%;margin-left: -5%">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="text-center border rounded ml-1 mt-1 w-100" style="height: 120%;">
                                                                        <div class="card-header">
                                                                            <p style="font-size: 75%; margin-top:-5px; margin-bottom:-10px; margin-left:-5px">Manager</p>
                                                                        </div>
                                                                        <div class="card-body">TTD</div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="text-center border rounded mt-1 w-100" style="height: 120%;">
                                                                        <div class="card-header">
                                                                            <p style="font-size: 75%; margin-top:-5px; margin-bottom:-10px; margin-left:-5px">Manager</p>
                                                                        </div>
                                                                        <div class="card-body">TTD</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="card text-center">
                                                    <div class="row">
                                                        <div class="col-3 mt-auto mb-auto">
                                                            <a>Edisi :</a>
                                                        </div>
                                                        <div class="col-4 mt-auto mb-auto">
                                                            <a>Tanggal :</a>
                                                        </div>
                                                        <div class="col-4 mt-auto mb-auto">
                                                            <a>Manager IE :</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
                <form>
                    <div class="form-group">
                      <label>Choice <a id="title"></a></label>
                      <div id="value_form">
                            
                      </div>
                      <datalist id="id_list"></datalist>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
          </div>
        </div>
      </div>
<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $("#navi button i").click(function (event) {
            if (this.className=="fas fa-plus") {
                $('#icons').attr('class','fas fa-minus')
            }else{
                $('#icons').attr('class','fas fa-plus')
            }
        })
        $('#cell_area_sop_1').on('click',function()
        {
            $("#modal_form").modal('show');
            $("#title").text('Area SOP');
            $.ajax({
                url:"{{ route('leanmedia.cell_area_sop') }}",
                method:'GET',
                dataType:'json',
                success:function(data)
                {
                    $('#value_form').html('<input type="text" class="form-control" list="id_list" placeholder="Enter Area">');
                    $('#id_list').html(data.option);
                }
            })
        })
    });
    function repeat()
    {
    }

</script>
</body>
</html>