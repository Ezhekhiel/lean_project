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
        .bold{
            font-weight: bold;
        }
        .subtitle{
            font-size: 110%
        }
    </style>
</head>
<body style='font-family: "Times New Roman", Times, serif;'>
    <p>Dear. {{ $details['name'] }}</p>
    <br>
    <p>Terkait dengan pelaksanaan psikotest online yang akan dimulai pada hari {{ $details['tanggal'] }}, dari PT. Parkland World Indonesia 2, berikut kami jabarkan beberapa informasi terbaru yang hendaknya dibaca dengan detail :</p>
    <br>
    <p class="bold subtitle">Langkah 1 :</p>
        <p class="bold">&#9679  Hari : Test dimulai pada, {{ date('Y-m-d', strtotime('-3 day', strtotime($details['tanggal']))) }} s/d {{ date('Y-m-d', strtotime('+3 day', strtotime($details['tanggal']))) }}</p>
        <p>&#9679 Login : <a href="<?php echo $details['link'] ?>">Link Click Di sini</a></p>
        <p>&#9679 Username: {{ $details['name'] }}</p>
        <p>&#9679 Password: {{ $details['password'] }}</p>
        <p>&#9679 Anda di minta untuk mengerjakan soal dengan subject</p>
        <p>        &#9679 English Test</p>
        <p>        &#9679 Mathematics Test</p>
        <p>        &#9679 Psychology Test</p>
        <p>        &#9679 Aritmatika Test</p>
    <br>
    <p class="bold subtitle">KETENTUAN TEST BIDANG ONLINE</p>
        <p>&#9679 Pastikan sebelum tanggal test anda, sudah melakukan testing log in terlebih dahulu.</p>
        <p>Tes menggunakan perangkat Laptop/ PC/ HP (lebih disarankan menggunakan laptop atau PC) dan hanya menggunakan browser Mozilla Firefox atau Google Chrome. Tidak disarankan menggunakan browser Internet Explorer, Opera Mini, Safari.</p>
        <p>Pastikan Anda mengerjakan tes ini secara individual tanpa bantuan dari pihak manapun.</p>
    <br>
    <p class="bold subtitle">Untuk memastikan proses tes yang berintegritas, valid, dan terukur dengan baik, Kami menghimbau selama proses tes agar dilakukan secara individual, jujur, dan tidak menggunakan bantuan orang lain.</p>
    <br>
    <br>
    <p>Title: Test Online - Recruitment PT. Parkland World Indonesia 2</p>
    <p>Time: {{$details['tanggal'] }} {{$details['time'] }}</p>
    {{-- <br> --}}
    {{-- <p style="font-size: 140%; font-weight:bold">Join Microsoft Teams Meeting, </p> --}}
    {{-- <p>Link URL <a href="">Click here to join the meeting</a></p> --}}
    {{-- <br> --}}
    <br>
    <p>Best Regards,</p>
    <p>Recruitment Teams.</p>
    <p>PT. Parkland World Indonesia 2.</p>
</body>
</html>