<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML5 Canvas to Image</title>
</head>
<body>
    <h1>HTML 5 TES PRINT</h1>
    <button type="button" id="btnDisplay">Display</button>
    <button type="button" id="btnDownload">Download</button>
    <canvas id="myCanvas" width="400" height="250" style="border:2px solid #000: float: left;"></canvas>
    <img src="" id="imgConverted" style="float: left; border: 2px solid #00f; margin-left : 10px;">

    <script>
        const btnDisplay = document.querySelector("#btnDisplay");
        const btnDownload = document.querySelector("#btnDownload");
        const imgConverted = document.querySelector("#imgConverted");
        const myCanvas = document.querySelector("#myCanvas");
        const ctx = myCanvas.getContext("2d");

        ctx.font = "50px Roboto";
        ctx.fillStyle = "red";
        ctx.fillText("dcode", 100, 100);
        ctx.fillRect(200, 150, 150, 75);
        
        btnDisplay.addEventListener("click", function(){
            const dataURI = myCanvas.toDataURL();
        })
    </script>
</body>
</html>