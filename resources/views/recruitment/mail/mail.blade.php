<!DOCTYPE html>
<html>
<head>
    <title>Recruitment</title>
    <style>
        p {
                font-size: 15px;
                color: black;
                padding: -20px;
            }
    </style>
</head>
<body style='font-family: "Times New Roman", Times, serif;'>
    <p>No : {{ $details['letterNo'] }}</p>
    <p>Perihal : {{ $details['perihal'] }}</p>
    <br>
    <p>Yth. {{ $details['nama'] }}</p>
    <br>
    <p>Menanggapi surat lamaran kerja yang dikirimkan, maka dengan ini kami mengundang Saudara pada :</p>
    <table style="border:none;width: 90%;text-align:left">
        <colgroup>
            <col span="1" style="width: 25%;">
            <col span="1" style="width: 5%;">
            <col span="1" style="width: 70%;">
         </colgroup>
         <tbody style="margin-top:0">
            <tr>
                <th>Hari, Tanggal</th>
                <th>:</th>
                <th>{{ $details['tanggal'] }}</th>
            </tr>
            <tr>
                <th>Waktu</th>
                <th>:</th>
                <th>{{ $details['time'] }}</th>
            </tr>
            <tr>
                <th>Keperluan</th>
                <th>:</th>
                <th>{{ $details['keperluan'] }}</th>
            </tr>
            <tr>
                <th>Tempat</th>
                <th>:</th>
                <th>{{ $details['room'] }} @ Parkland World Indonesia - 2, Jl. Lanud Gorda km.68, Ds.Julang, Kec. Cikande, Banten 42186  </th>
            </tr>
         </tbody>
    </table>
    <br>
    <br>
    {{-- <img src="{{ public_path('dist/img/barcodeLocation.png') }}" alt="img"> --}}
    <img src="{{ $message->embed(public_path('dist/img/barcodeLocation.png')) }}" alt="logo" title="Logo" style="display:block">
    <br>
    <br>
    <br>
    <p>Saudara wajib membawa dan melengkapi hal-hal berikut:</p>
    <p>1. Salinan ijazah dan dokumen penunjang lainnya</p>
    <p>2. Alat tulis</p>
    <p>3. Berpakaian rapi dan formal</p>
    <p>4. Mematuhi protokol Covid-19</p>
    <p>5. Membawa sertifikat vaksin</p>
    <br>
    <p>Demikian surat pemanggilan ini dibuat. Harap konfirmasi kehadiran. Atas</p>
    <p>perhatian Saudara, saya ucapkan terima kasih.</p>
    <br>
    <p>--</p>
    <p>Regards.</p>
    <p>Team Recruitment</p>
</body>
</html>