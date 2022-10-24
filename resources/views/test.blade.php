<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        body{
        }
        .noText{
            height: 1px;
            text-align:center;
        }
        .white{
            color: white;
        }
        .noText .space{
            width: 1px;
            border: solid white thin;
            border-right: solid black thin;
        }
        .noText .no-border{
            border:solid white thin;
        }
        .border td{
            border:solid black thin;
            line-height: 20px;
        }
        .rectang{
            border:solid black thin;
        }
        .d_line{
            border: 1px solid red;
            position: relative;
            box-sizing: border-box;
            overflow: hidden;
        }
        div.line1{
            width: calc(1.414 * 200px);
            transform: rotate(16deg);
            transform-origin: top left;
            border-top: 1px solid rgb(0, 0, 0);
            position: absolute;
            top: -2px;
            left: -1px;
            box-sizing: border-box;
        }
        div.line2{
            width: calc(1.414 * 200px);
            transform: rotate(-16deg);
            transform-origin: bottom left;
            border-top: 1px solid rgb(0, 0, 0);
            position: absolute;
            bottom: -2px;
            left: -1px;
            box-sizing: border-box;
        }
      
    </style>
  </head>
  <body>
    <div class="row mt-2">
        <div class="col-2">
            <div class="card container-fluid p-2">
                <select name="location" id="id_location">
                    @foreach ($location as $item)
                        <option value="{{ $item['kode'] }}">{{ $item['location'] }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-secondary mt-4" data-toggle="modal" data-target="#loadingModal">
                    Loads
                  </button>
            </div>
        </div>
        <div class="col-10">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-2 mr-auto">
                        <table>
                            <tr class="noText border">
                                <td id="M-1-1">M-1-1</td>
                                <td id="M-1-2">M-1-2</td>
                                <td id="M-1-3">M-1-3</td>
                                <td id="M-1-4">M-1-4</td>
                                <td id="M-1-5">M-1-5</td>
                                <td id="M-1-6">M-1-6</td>
                            </tr>
                            {{-- Space --}}
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="L-2-1">L-2-1</td>
                                <td id="L-2-2">L-2-2</td>
                                <td id="L-2-3">L-2-3</td>
                                <td id="L-2-4">L-2-4</td>
                                <td id="L-2-5">L-2-5</td>
                                <td id="L-2-6">L-2-6</td>
                            </tr>
                            <tr class="noText border" id="L1">
                                <td id="L-1-1">L-1-1</td>
                                <td id="L-1-2">L-1-2</td>
                                <td id="L-1-3">L-1-3</td>
                                <td id="L-1-4">L-1-4</td>
                                <td id="L-1-5">L-1-5</td>
                                <td id="L-1-6">L-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border" id="K2">
                                <td id="K-2-1">K-2-1</td>
                                <td id="K-2-2">K-2-2</td>
                                <td id="K-2-3">K-2-3</td>
                                <td id="K-2-4">K-2-4</td>
                                <td id="K-2-5">K-2-5</td>
                                <td id="K-2-6">K-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="K-1-1">K-1-1</td>
                                <td id="K-1-2">K-1-2</td>
                                <td id="K-1-3">K-1-3</td>
                                <td id="K-1-4">K-1-4</td>
                                <td id="K-1-5">K-1-5</td>
                                <td id="K-1-6">K-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="J-2-1">J-2-1</td>
                                <td id="J-2-2">J-2-2</td>
                                <td id="J-2-3">J-2-3</td>
                                <td id="J-2-4">J-2-4</td>
                                <td id="J-2-5">J-2-5</td>
                                <td id="J-2-6">J-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="J-1-1">J-1-1</td>
                                <td id="J-1-2">J-1-2</td>
                                <td id="J-1-3">J-1-3</td>
                                <td id="J-1-4">J-1-4</td>
                                <td id="J-1-5">J-1-5</td>
                                <td id="J-1-6">J-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="I-2-1">I-2-1</td>
                                <td id="I-2-2">I-2-2</td>
                                <td id="I-2-3">I-2-3</td>
                                <td id="I-2-4">I-2-4</td>
                                <td id="I-2-5">I-2-5</td>
                                <td id="I-2-6">I-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="I-1-1">I-1-1</td>
                                <td id="I-1-2">I-1-2</td>
                                <td id="I-1-3">I-1-3</td>
                                <td id="I-1-4">I-1-4</td>
                                <td id="I-1-5">I-1-5</td>
                                <td id="I-1-6">I-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="H-2-1">H-2-1</td>
                                <td id="H-2-2">H-2-2</td>
                                <td id="H-2-3">H-2-3</td>
                                <td id="H-2-4">H-2-4</td>
                                <td id="H-2-5">H-2-5</td>
                                <td id="H-2-6">H-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="H-1-1">H-1-1</td>
                                <td id="H-1-2">H-1-2</td>
                                <td id="H-1-3">H-1-3</td>
                                <td id="H-1-4">H-1-4</td>
                                <td id="H-1-5">H-1-5</td>
                                <td id="H-1-6">H-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                        </table>
                        <table style="height: 410px;width:90%; margin-left:20px">
                            <tr class="rectang text-center">
                                <td><h1>Palet Area</h1></td>
                            </tr>
                        </table>
                        <table>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="G-2-1">G-2-1</td>
                                <td id="G-2-2">G-2-2</td>
                                <td id="G-2-3">G-2-3</td>
                                <td id="G-2-4">G-2-4</td>
                                <td id="G-2-5">G-2-5</td>
                                <td id="G-2-6">G-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="G-1-1">G-1-1</td>
                                <td id="G-1-2">G-1-2</td>
                                <td id="G-1-3">G-1-3</td>
                                <td id="G-1-4">G-1-4</td>
                                <td id="G-1-5">G-1-5</td>
                                <td id="G-1-6">G-1-6</td>
                            </tr>
                        </table>
                        <table class="mt-4">
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="F-2-1">F-2-1</td>
                                <td id="F-2-2">F-2-2</td>
                                <td id="F-2-3">F-2-3</td>
                                <td id="F-2-4">F-2-4</td>
                                <td id="F-2-5">F-2-5</td>
                                <td id="F-2-6">F-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="F-1-1">F-1-1</td>
                                <td id="F-1-2">F-1-2</td>
                                <td id="F-1-3">F-1-3</td>
                                <td id="F-1-4">F-1-4</td>
                                <td id="F-1-5">F-1-5</td>
                                <td id="F-1-6">F-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="E-2-1">E-2-1</td>
                                <td id="E-2-2">E-2-2</td>
                                <td id="E-2-3">E-2-3</td>
                                <td id="E-2-4">E-2-4</td>
                                <td id="E-2-5">E-2-5</td>
                                <td id="E-2-6">E-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="E-1-1">E-1-1</td>
                                <td id="E-1-2">E-1-2</td>
                                <td id="E-1-3">E-1-3</td>
                                <td id="E-1-4">E-1-4</td>
                                <td id="E-1-5">E-1-5</td>
                                <td id="E-1-6">E-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="D-2-1">D-2-1</td>
                                <td id="D-2-2">D-2-2</td>
                                <td id="D-2-3">D-2-3</td>
                                <td id="D-2-4">D-2-4</td>
                                <td id="D-2-5">D-2-5</td>
                                <td id="D-2-6">D-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="D-1-1">D-1-1</td>
                                <td id="D-1-2">D-1-2</td>
                                <td id="D-1-3">D-1-3</td>
                                <td id="D-1-4">D-1-4</td>
                                <td id="D-1-5">D-1-5</td>
                                <td id="D-1-6">D-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="C-2-1">C-2-1</td>
                                <td id="C-2-2">C-2-2</td>
                                <td id="C-2-3">C-2-3</td>
                                <td id="C-2-4">C-2-4</td>
                                <td id="C-2-5">C-2-5</td>
                                <td id="C-2-6">C-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="C-1-1">C-1-1</td>
                                <td id="C-1-2">C-1-2</td>
                                <td id="C-1-3">C-1-3</td>
                                <td id="C-1-4">C-1-4</td>
                                <td id="C-1-5">C-1-5</td>
                                <td id="C-1-6">C-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="B-2-1">B-2-1</td>
                                <td id="B-2-2">B-2-2</td>
                                <td id="B-2-3">B-2-3</td>
                                <td id="B-2-4">B-2-4</td>
                                <td id="B-2-5">B-2-5</td>
                                <td id="B-2-6">B-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="B-1-1">B-1-1</td>
                                <td id="B-1-2">B-1-2</td>
                                <td id="B-1-3">B-1-3</td>
                                <td id="B-1-4">B-1-4</td>
                                <td id="B-1-5">B-1-5</td>
                                <td id="B-1-6">B-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td id="A-2-1">A-2-1</td>
                                <td id="A-2-2">A-2-2</td>
                                <td id="A-2-3">A-2-3</td>
                                <td id="A-2-4">A-2-4</td>
                                <td id="A-2-5">A-2-5</td>
                                <td id="A-2-6">A-2-6</td>
                            </tr>
                            <tr class="noText border">
                                <td id="A-1-1">A-1-1</td>
                                <td id="A-1-2">A-1-2</td>
                                <td id="A-1-3">A-1-3</td>
                                <td id="A-1-4">A-1-4</td>
                                <td id="A-1-5">A-1-5</td>
                                <td id="A-1-6">A-1-6</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card col-4 mr-auto" style="margin-top: 85px">
                        <table>
                            <tr class="noText border">
                                <td style="width:80px" class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td style="width:65px" id="N-2-1">N-2-1</td>
                                <td class="space white">a</td>
                                <td style="width:67px" id="N-2-2">N-2-2</td>
                                <td style="width:67px" id="N-2-3">N-2-3</td>
                                <td style="width:67px" id="N-2-4">N-2-4</td>
                                <td style="width:67px" id="N-2-5">N-2-5</td>
                                <td style="width:67px" id="N-2-6">N-2-6</td>
                                <td style="width:67px" id="N-2-7">N-2-7</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="N-1-1">N-1-1</td>
                                <td class="space white">a</td>
                                <td id="N-1-2">N-1-2</td>
                                <td id="N-1-3">N-1-3</td>
                                <td id="N-1-4">N-1-4</td>
                                <td id="N-1-5">N-1-5</td>
                                <td id="N-1-6">N-1-6</td>
                                <td id="N-1-7">N-1-7</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText white">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="no-border">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="O-2-1">O-2-1</td>
                                <td class="space white">a</td>
                                <td id="0-2-2">0-2-2</td>
                                <td id="0-2-3">0-2-3</td>
                                <td id="0-2-4">0-2-4</td>
                                <td id="0-2-5">0-2-5</td>
                                <td id="0-2-6">0-2-6</td>
                                <td id="0-2-7">0-2-7</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="0-1-1">0-1-1</td>
                                <td class="space white">a</td>
                                <td id="0-1-2">0-1-2</td>
                                <td id="0-1-3">0-1-3</td>
                                <td id="0-1-4">0-1-4</td>
                                <td id="0-1-5">0-1-5</td>
                                <td id="0-1-6">0-1-6</td>
                                <td id="0-1-7">0-1-7</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="P-2-1">P-2-1</td>
                                <td class="space white">a</td>
                                <td id="P-2-2">P-2-2</td>
                                <td id="P-2-3">P-2-3</td>
                                <td id="P-2-4">P-2-4</td>
                                <td id="P-2-5">P-2-5</td>
                                <td id="P-2-6">P-2-6</td>
                                <td id="P-2-7">P-2-7</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="P-1-1">P-1-1</td>
                                <td class="space white">a</td>
                                <td id="P-1-2">P-1-2</td>
                                <td id="P-1-3">P-1-3</td>
                                <td id="P-1-4">P-1-4</td>
                                <td id="P-1-5">P-1-5</td>
                                <td id="P-1-6">P-1-6</td>
                                <td id="P-1-7">P-1-7</td>
                                <td class="no-border white">a</td>
                            </tr>
                        </table>
                        <table>
                            <tr class="noText white">
                                <td style="width:80px;">a</td>
                                <td style="width:65px;">a</td>
                                <td style="width:30px;">a</td>
                                <td style="width:65px;">a</td>
                                <td style="width:80px;">a</td>
                                <td style="width:80px;">a</td>
                                <td style="width:80px;">a</td>
                                <td style="width:80px;">a</td>
                                <td class="no-border">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="Q-2-1">Q-2-1</td>
                                <td class="space white">a</td>
                                <td id="Q-2-2">Q-2-2</td>
                                <td id="Q-2-3">Q-2-3</td>
                                <td id="Q-2-4">Q-2-4</td>
                                <td id="Q-2-5">Q-2-5</td>
                                <td id="Q-2-6">Q-2-6</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="Q-1-1">Q-1-1</td>
                                <td class="space white">a</td>
                                <td id="1-1-1">Q-1-1</td>
                                <td id="1-1-2">Q-1-2</td>
                                <td id="1-1-3">Q-1-3</td>
                                <td id="1-1-4">Q-1-4</td>
                                <td id="1-1-5">Q-1-5</td>
                                <td class="no-border white">a</td>
                            </tr>
                        </table>
                        <table class="mt-4">
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td style="width: 80px" id="R-2-1">R-2-1</td>
                                <td style="width: 80px" id="R-2-2">R-2-2</td>
                                <td style="width: 80px" id="R-2-3">R-2-3</td>
                                <td style="width: 80px" id="R-2-4">R-2-4</td>
                                <td style="width: 80px" id="R-2-5">R-2-5</td>
                                <td style="width: 80px" id="R-2-6">R-2-6</td>
                                <td class="no-border white">a</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="R-1-1">R-1-1</td>
                                <td id="R-1-2">R-1-2</td>
                                <td id="R-1-3">R-1-3</td>
                                <td id="R-1-4">R-1-4</td>
                                <td id="R-1-5">R-1-5</td>
                                <td id="R-1-6">R-1-6</td>
                                <td class="no-border white">a</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="S-2-1">S-2-1</td>
                                <td id="S-2-2">S-2-2</td>
                                <td id="S-2-3">S-2-3</td>
                                <td id="S-2-4">S-2-4</td>
                                <td id="S-2-5">S-2-5</td>
                                <td id="S-2-6">S-2-6</td>
                                <td class="no-border white">a</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="S-1-1">S-1-1</td>
                                <td id="S-1-2">S-1-2</td>
                                <td id="S-1-3">S-1-3</td>
                                <td id="S-1-4">S-1-4</td>
                                <td id="S-1-5">S-1-5</td>
                                <td id="S-1-6">S-1-6</td>
                                <td class="no-border white">a</td>
                                <td class="no-border white">a</td>
                            </tr><tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="T-2-1">T-2-1</td>
                                <td id="T-2-2">T-2-2</td>
                                <td id="T-2-3">T-2-3</td>
                                <td id="T-2-4">T-2-4</td>
                                <td id="T-2-5">T-2-5</td>
                                <td id="T-2-6">T-2-6</td>
                                <td class="no-border white">a</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="T-1-1">T-1-1</td>
                                <td id="T-1-1">T-1-1</td>
                                <td id="T-1-1">T-1-1</td>
                                <td id="T-1-1">T-1-1</td>
                                <td id="T-1-1">T-1-1</td>
                                <td id="T-1-1">T-1-1</td>
                                <td class="no-border white">a</td>
                                <td class="no-border white">a</td>
                            </tr><tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="U-2-1">U-2-1</td>
                                <td id="U-2-2">U-2-3</td>
                                <td id="U-2-3">U-2-3</td>
                                <td id="U-2-4">U-2-4</td>
                                <td id="U-2-5">U-2-5</td>
                                <td id="U-2-6">U-2-6</td>
                                <td class="no-border white">a</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="U-1-1">U-1-1</td>
                                <td id="U-1-2">U-1-2</td>
                                <td id="U-1-3">U-1-3</td>
                                <td id="U-1-4">U-1-4</td>
                                <td id="U-1-5">U-1-5</td>
                                <td id="U-1-6">U-1-6</td>
                                <td class="no-border white">a</td>
                                <td class="no-border white">a</td>
                            </tr><tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="V-2-1">V-2-1</td>
                                <td id="V-2-2">V-2-2</td>
                                <td id="V-2-3">V-2-3</td>
                                <td id="V-2-4">V-2-4</td>
                                <td id="V-2-5">V-2-5</td>
                                <td id="V-2-6">V-2-6</td>
                                <td class="no-border white">a</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="V-1-1">V-1-1</td>
                                <td id="V-1-2">V-1-2</td>
                                <td id="V-1-3">V-1-3</td>
                                <td id="V-1-4">V-1-4</td>
                                <td id="V-1-5">V-1-5</td>
                                <td id="V-1-6">V-1-6</td>
                                <td class="no-border white">a</td>
                                <td class="no-border white">a</td>
                            </tr>
                        </table>
                        <table class="mt-4">
                            <tr class="noText border">
                                <td style="width: 80px;" class="d_line">
                                        <div class="line1"></div>
                                        <div class="line2"></div>
                                </td>
                                <td style="width: 80px;" id="W-2-1">W-2-1</td>
                                <td style="width: 80px;" id="W-2-2">W-2-2</td>
                                <td style="width: 80px;" id="W-2-3">W-2-3</td>
                                <td style="width: 80px;" id="W-2-4">W-2-4</td>
                                <td style="width: 80px;" id="W-2-5">W-2-5</td>
                                <td style="width: 80px;" id="W-2-6">W-2-6</td>
                                <td style="width: 80px;" id="W-2-7">W-2-7</td>
                                <td class="no-border white">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="W-1-1">W-1-1</td>
                                <td id="W-1-2">W-1-2</td>
                                <td id="W-1-3">W-1-3</td>
                                <td id="W-1-4">W-1-4</td>
                                <td id="W-1-5">W-1-5</td>
                                <td id="W-1-6">W-1-6</td>
                                <td id="W-1-7">W-1-7</td>
                                <td class="no-border white">a</td>
                            </tr>
                        </table>
                        <table class="mt-4">
                            <tr class="noText border">
                                <td style="width: 100px;" class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td style="width:100px"id="X-2-1">X-2-1</td>
                                <td style="width:100px"id="X-2-2">X-2-2</td>
                                <td style="width:100px"id="X-2-3">X-2-3</td>
                                <td style="width:100px"id="X-2-4">X-2-4</td>
                                <td style="width:100px"id="X-2-5">X-2-5</td>
                                <td style="width:100px"id="X-2-6">X-2-6</td>
                                <td style="width:100px"id="X-2-7">X-2-7</td>
                                <td style="width:100px"id="X-2-8">X-2-8</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="X-1-1">X-1-1</td>
                                <td id="X-1-2">X-1-2</td>
                                <td id="X-1-3">X-1-3</td>
                                <td id="X-1-4">X-1-4</td>
                                <td id="X-1-5">X-1-5</td>
                                <td id="X-1-6">X-1-6</td>
                                <td id="X-1-7">X-1-7</td>
                                <td id="X-1-8">X-1-8</td>
                            </tr>
                        </table>
                        <table style="margin-top:60px">
                            <tr class="noText border">
                                <td style="width: 100px;" class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td class="space white">a</td>
                                <td style="width:85px;" id="Y-2-1">Y-2-1</td>
                                <td style="width:100px;" id="Y-2-2">Y-2-2</td>
                                <td style="width:100px;" id="Y-2-3">Y-2-3</td>
                                <td style="width:100px;" id="Y-2-4">Y-2-4</td>
                                <td style="width:100px;" id="Y-2-5">Y-2-5</td>
                                <td style="width:100px;" id="Y-2-6">Y-2-6</td>
                                <td style="width:100px;" id="Y-2-7">Y-2-7</td>
                                <td style="width:100px;" id="Y-2-8">Y-2-8</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td class="space white">a</td>
                                <td id="Y-1-1">Y-1-1</td>
                                <td id="Y-1-2">Y-1-2</td>
                                <td id="Y-1-3">Y-1-3</td>
                                <td id="Y-1-4">Y-1-4</td>
                                <td id="Y-1-5">Y-1-5</td>
                                <td id="Y-1-6">Y-1-6</td>
                                <td id="Y-1-7">Y-1-7</td>
                                <td id="Y-1-8">Y-1-8</td>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td class="space white">a</td>
                                <td id="Z-2-1">Z-2-1</td>
                                <td id="Z-2-2">Z-2-2</td>
                                <td id="Z-2-3">Z-2-3</td>
                                <td id="Z-2-4">Z-2-4</td>
                                <td id="Z-2-5">Z-2-5</td>
                                <td id="Z-2-6">Z-2-6</td>
                                <td id="Z-2-7">Z-2-7</td>
                                <td id="Z-2-8">Z-2-8</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td class="space white">a</td>
                                <td id="Z-1-1">Z-1-1</td>
                                <td id="Z-1-2">Z-1-2</td>
                                <td id="Z-1-3">Z-1-3</td>
                                <td id="Z-1-4">Z-1-4</td>
                                <td id="Z-1-5">Z-1-5</td>
                                <td id="Z-1-6">Z-1-6</td>
                                <td id="Z-1-7">Z-1-7</td>
                                <td id="Z-1-8">Z-1-8</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td class="space white">a</td>
                                <td id="AA-2-1">AA-2-1</td>
                                <td id="AA-2-2">AA-2-2</td>
                                <td id="AA-2-3">AA-2-3</td>
                                <td id="AA-2-4">AA-2-4</td>
                                <td id="AA-2-5">AA-2-5</td>
                                <td id="AA-2-6">AA-2-6</td>
                                <td id="AA-2-7">AA-2-7</td>
                                <td id="AA-2-8">AA-2-8</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td class="space white">a</td>
                                <td id="AA-1-1">AA-1-1</td>
                                <td id="AA-1-2">AA-1-2</td>
                                <td id="AA-1-3">AA-1-3</td>
                                <td id="AA-1-4">AA-1-4</td>
                                <td id="AA-1-5">AA-1-5</td>
                                <td id="AA-1-6">AA-1-6</td>
                                <td id="AA-1-7">AA-1-7</td>
                                <td id="AA-1-8">AA-1-8</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td class="space white">a</td>
                                <td id="AB-2-1">AB-2-1</td>
                                <td id="AB-2-2">AB-2-2</td>
                                <td id="AB-2-3">AB-2-3</td>
                                <td id="AB-2-4">AB-2-4</td>
                                <td id="AB-2-5">AB-2-5</td>
                                <td id="AB-2-6">AB-2-6</td>
                                <td id="AB-2-7">AB-2-7</td>
                                <td id="AB-2-8">AB-2-8</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td class="space white">a</td>
                                <td id="AB-1-1">AB-1-1</td>
                                <td id="AB-1-2">AB-1-2</td>
                                <td id="AB-1-3">AB-1-3</td>
                                <td id="AB-1-4">AB-1-4</td>
                                <td id="AB-1-5">AB-1-5</td>
                                <td id="AB-1-6">AB-1-6</td>
                                <td id="AB-1-7">AB-1-7</td>
                                <td id="AB-1-8">AB-1-8</td>
                            </tr>
                        </table>
                        <table>
                            <tr class="noText white">
                                <td style="width:80px">a</td>
                                <td style="width:80px">a</td>
                                <td style="width:80px">a</td>
                                <td style="width:80px">a</td>
                                <td style="width:80px">a</td>
                                <td style="width:80px">a</td>
                                <td style="width:80px">a</td>
                                <td style="width:80px">a</td>
                                <td style="width:80px">a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="AC-2-1">AC-2-1</td>
                                <td id="AC-2-2">AC-2-2</td>
                                <td id="AC-2-3">AC-2-3</td>
                                <td id="AC-2-4">AC-2-4</td>
                                <td id="AC-2-5">AC-2-5</td>
                                <td id="AC-2-6">AC-2-6</td>
                                <td id="AC-2-7">AC-2-7</td>
                                <td id="AC-2-8">AC-2-8</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="AC-1-1">AC-1-1</td>
                                <td id="AC-1-2">AC-1-2</td>
                                <td id="AC-1-3">AC-1-3</td>
                                <td id="AC-1-4">AC-1-4</td>
                                <td id="AC-1-5">AC-1-5</td>
                                <td id="AC-1-6">AC-1-6</td>
                                <td id="AC-1-7">AC-1-7</td>
                                <td id="AC-1-8">AC-1-8</td>
                            </tr>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="AD-2-1">AD-2-1</td>
                                <td id="AD-2-2">AD-2-2</td>
                                <td id="AD-2-3">AD-2-3</td>
                                <td id="AD-2-4">AD-2-4</td>
                                <td id="AD-2-5">AD-2-5</td>
                                <td id="AD-2-6">AD-2-6</td>
                                <td id="AD-2-7">AD-2-7</td>
                                <td id="AD-2-8">AD-2-8</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td id="AD-1-1">AD-1-1</td>
                                <td id="AD-1-2">AD-1-2</td>
                                <td id="AD-1-3">AD-1-3</td>
                                <td id="AD-1-4">AD-1-4</td>
                                <td id="AD-1-5">AD-1-5</td>
                                <td id="AD-1-6">AD-1-6</td>
                                <td id="AD-1-7">AD-1-7</td>
                                <td id="AD-1-8">AD-1-8</td>
                            </tr>
                        </table>
                        <table>
                            <tr class="noText white">
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                                <td>a</td>
                            </tr>
                            <tr class="noText border">
                                <td class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td class="space white">a</td>
                                <td id="AE-2-1">AE-2-1</td>
                                <td id="AE-2-2">AE-2-2</td>
                                <td id="AE-2-3">AE-2-3</td>
                                <td id="AE-2-4">AE-2-4</td>
                                <td id="AE-2-5">AE-2-5</td>
                                <td id="AE-2-6">AE-2-6</td>
                                <td id="AE-2-7">AE-2-7</td>
                                <td id="AE-2-8">AE-2-8</td>
                            </tr>
                            <tr class="noText border">
                                <td style="width:100px" class="d_line">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                </td>
                                <td style="width:40px"class="space white">a</td>
                                <td style="width:80px" id="AE-1-1">AE-1-1</td>
                                <td style="width:80px" id="AE-1-2">AE-1-2</td>
                                <td style="width:100px" id="AE-1-3">AE-1-3</td>
                                <td style="width:100px" id="AE-1-4">AE-1-4</td>
                                <td style="width:100px" id="AE-1-5">AE-1-5</td>
                                <td style="width:100px" id="AE-1-6">AE-1-6</td>
                                <td style="width:100px" id="AE-1-7">AE-1-7</td>
                                <td style="width:100px" id="AE-1-8">AE-1-8</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card col-5" style="margin-top:800px">
                        <table>
                            <tr class="noText border">
                                <td style="height: 60px"><h3>Setting Preparation</h3></td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-3" style="font-size:95%">
                                <table style="margin-top:30px;">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RB-2-1">RB-2-1</td>
                                        <td style="width: 100px" id="RB-2-2">RB-2-2</td>
                                        <td style="width: 100px" id="RB-2-3">RB-2-3</td>
                                        <td style="width: 100px" id="RB-2-4">RB-2-4</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RB-1-1">RB-1-1</td>
                                        <td style="width: 100px" id="RB-1-2">RB-1-2</td>
                                        <td style="width: 100px" id="RB-1-3">RB-1-3</td>
                                        <td style="width: 100px" id="RB-1-4">RB-1-4</td>
                                    </tr>
                                </table>
                                <table style="margin-top: 25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RA-2-1">RA-2-1</td>
                                        <td style="width: 100px" id="RA-2-2">RA-2-2</td>
                                        <td style="width: 100px" id="RA-2-3">RA-2-3</td>
                                        <td style="width: 100px" id="RA-2-4">RA-2-4</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RA-1-1">RA-1-1</td>
                                        <td style="width: 100px" id="RA-1-2">RA-1-2</td>
                                        <td style="width: 100px" id="RA-1-3">RA-1-3</td>
                                        <td style="width: 100px" id="RA-1-4">RA-1-4</td>
                                    </tr>
                                </table>
                                <table style="height: 490px; width:100%;margin-top:25px">
                                    <tr class="rectang text-center">
                                        <td><h1>Subcont Preparation</h1></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-5">
                                <table style="margin-top:30px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RC-2-1">RC-2-1</td>
                                        <td style="width: 100px" id="RC-2-2">RC-2-2</td>
                                        <td style="width: 100px" id="RC-2-3">RC-2-3</td>
                                        <td style="width: 100px" id="RC-2-4">RC-2-4</td>
                                        <td style="width: 100px" id="RC-2-5">RC-2-5</td>
                                        <td style="width: 100px" id="RC-2-6">RC-2-6</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RC-1-1">RC-1-1</td>
                                        <td style="width: 100px" id="RC-1-2">RC-1-2</td>
                                        <td style="width: 100px" id="RC-1-3">RC-1-3</td>
                                        <td style="width: 100px" id="RC-1-4">RC-1-4</td>
                                        <td style="width: 100px" id="RC-1-5">RC-1-5</td>
                                        <td style="width: 100px" id="RC-1-6">RC-1-6</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RD-2-1">RD-2-1</td>
                                        <td style="width: 100px" id="RD-2-2">RD-2-2</td>
                                        <td style="width: 100px" id="RD-2-3">RD-2-3</td>
                                        <td style="width: 100px" id="RD-2-4">RD-2-4</td>
                                        <td style="width: 100px" id="RD-2-5">RD-2-5</td>
                                        <td style="width: 100px" id="RD-2-6">RD-2-6</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RD-1-1">RD-1-1</td>
                                        <td style="width: 100px" id="RD-1-2">RD-1-2</td>
                                        <td style="width: 100px" id="RD-1-3">RD-1-3</td>
                                        <td style="width: 100px" id="RD-1-4">RD-1-4</td>
                                        <td style="width: 100px" id="RD-1-5">RD-1-5</td>
                                        <td style="width: 100px" id="RD-1-6">RD-1-6</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RE-2-1">RE-2-1</td>
                                        <td style="width: 100px" id="RE-2-2">RE-2-2</td>
                                        <td style="width: 100px" id="RE-2-3">RE-2-3</td>
                                        <td style="width: 100px" id="RE-2-4">RE-2-4</td>
                                        <td style="width: 100px" id="RE-2-5">RE-2-5</td>
                                        <td style="width: 100px" id="RE-2-6">RE-2-6</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RE-1-1">RE-1-1</td>
                                        <td style="width: 100px" id="RE-1-2">RE-1-2</td>
                                        <td style="width: 100px" id="RE-1-3">RE-1-3</td>
                                        <td style="width: 100px" id="RE-1-4">RE-1-4</td>
                                        <td style="width: 100px" id="RE-1-5">RE-1-5</td>
                                        <td style="width: 100px" id="RE-1-6">RE-1-6</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RF-2-1">RF-2-1</td>
                                        <td style="width: 100px" id="RF-2-2">RF-2-2</td>
                                        <td style="width: 100px" id="RF-2-3">RF-2-3</td>
                                        <td style="width: 100px" id="RF-2-4">RF-2-4</td>
                                        <td style="width: 100px" id="RF-2-5">RF-2-5</td>
                                        <td style="width: 100px" id="RF-2-6">RF-2-6</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RF-1-1">RF-1-1</td>
                                        <td style="width: 100px" id="RF-1-2">RF-1-2</td>
                                        <td style="width: 100px" id="RF-1-3">RF-1-3</td>
                                        <td style="width: 100px" id="RF-1-4">RF-1-4</td>
                                        <td style="width: 100px" id="RF-1-5">RF-1-5</td>
                                        <td style="width: 100px" id="RF-1-6">RF-1-6</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RG-2-1">RG-2-1</td>
                                        <td style="width: 100px" id="RG-2-2">RG-2-2</td>
                                        <td style="width: 100px" id="RG-2-3">RG-2-3</td>
                                        <td style="width: 100px" id="RG-2-4">RG-2-4</td>
                                        <td style="width: 100px" id="RG-2-5">RG-2-5</td>
                                        <td style="width: 100px" id="RG-2-6">RG-2-6</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RG-1-1">RG-1-1</td>
                                        <td style="width: 100px" id="RG-1-2">RG-1-2</td>
                                        <td style="width: 100px" id="RG-1-3">RG-1-3</td>
                                        <td style="width: 100px" id="RG-1-4">RG-1-4</td>
                                        <td style="width: 100px" id="RG-1-5">RG-1-5</td>
                                        <td style="width: 100px" id="RG-1-6">RG-1-6</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RH-2-1">RH-2-1</td>
                                        <td style="width: 100px" id="RH-2-2">RH-2-2</td>
                                        <td style="width: 100px" id="RH-2-3">RH-2-3</td>
                                        <td style="width: 100px" id="RH-2-4">RH-2-4</td>
                                        <td style="width: 100px" id="RH-2-5">RH-2-5</td>
                                        <td style="width: 100px" id="RH-2-6">RH-2-6</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RH-1-1">RH-1-1</td>
                                        <td style="width: 100px" id="RH-1-2">RH-1-2</td>
                                        <td style="width: 100px" id="RH-1-3">RH-1-3</td>
                                        <td style="width: 100px" id="RH-1-4">RH-1-4</td>
                                        <td style="width: 100px" id="RH-1-5">RH-1-5</td>
                                        <td style="width: 100px" id="RH-1-6">RH-1-6</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RI-2-1">RI-2-1</td>
                                        <td style="width: 100px" id="RI-2-2">RI-2-2</td>
                                        <td style="width: 100px" id="RI-2-3">RI-2-3</td>
                                        <td style="width: 100px" id="RI-2-4">RI-2-4</td>
                                        <td style="width: 100px" id="RI-2-5">RI-2-5</td>
                                        <td style="width: 100px" id="RI-2-6">RI-2-6</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RI-1-1">RI-1-1</td>
                                        <td style="width: 100px" id="RI-1-2">RI-1-2</td>
                                        <td style="width: 100px" id="RI-1-3">RI-1-3</td>
                                        <td style="width: 100px" id="RI-1-4">RI-1-4</td>
                                        <td style="width: 100px" id="RI-1-5">RI-1-5</td>
                                        <td style="width: 100px" id="RI-1-6">RI-1-6</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RJ-2-1">RJ-2-1</td>
                                        <td style="width: 100px" id="RJ-2-2">RJ-2-2</td>
                                        <td style="width: 100px" id="RJ-2-3">RJ-2-3</td>
                                        <td style="width: 100px" id="RJ-2-4">RJ-2-4</td>
                                        <td style="width: 100px" id="RJ-2-5">RJ-2-5</td>
                                        <td style="width: 100px" id="RJ-2-6">RJ-2-6</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RJ-1-1">RJ-1-1</td>
                                        <td style="width: 100px" id="RJ-1-2">RJ-1-2</td>
                                        <td style="width: 100px" id="RJ-1-3">RJ-1-3</td>
                                        <td style="width: 100px" id="RJ-1-4">RJ-1-4</td>
                                        <td style="width: 100px" id="RJ-1-5">RJ-1-5</td>
                                        <td style="width: 100px" id="RJ-1-6">RJ-1-6</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RK-2-1">RK-2-1</td>
                                        <td style="width: 100px" id="RK-2-2">RK-2-2</td>
                                        <td style="width: 100px" id="RK-2-3">RK-2-3</td>
                                        <td style="width: 100px" id="RK-2-4">RK-2-4</td>
                                        <td style="width: 100px" id="RK-2-5">RK-2-5</td>
                                        <td style="width: 100px" id="RK-2-6">RK-2-6</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RK-1-1">RK-1-1</td>
                                        <td style="width: 100px" id="RK-1-2">RK-1-2</td>
                                        <td style="width: 100px" id="RK-1-3">RK-1-3</td>
                                        <td style="width: 100px" id="RK-1-4">RK-1-4</td>
                                        <td style="width: 100px" id="RK-1-5">RK-1-5</td>
                                        <td style="width: 100px" id="RK-1-6">RK-1-6</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-4">
                                <table style="margin-top:30px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RT-2-1">RT-2-1</td>
                                        <td style="width: 100px" id="RT-2-2">RT-2-2</td>
                                        <td style="width: 100px" id="RT-2-3">RT-2-3</td>
                                        <td style="width: 100px" id="RT-2-4">RT-2-4</td>
                                        <td style="width: 100px" id="RT-2-5">RT-2-5</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RT-1-1">RT-1-1</td>
                                        <td style="width: 100px" id="RT-1-2">RT-1-2</td>
                                        <td style="width: 100px" id="RT-1-3">RT-1-3</td>
                                        <td style="width: 100px" id="RT-1-4">RT-1-4</td>
                                        <td style="width: 100px" id="RT-1-5">RT-1-5</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RS-2-1">RS-2-1</td>
                                        <td style="width: 100px" id="RS-2-2">RS-2-2</td>
                                        <td style="width: 100px" id="RS-2-3">RS-2-3</td>
                                        <td style="width: 100px" id="RS-2-4">RS-2-4</td>
                                        <td style="width: 100px" id="RS-2-5">RS-2-5</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RS-1-1">RS-1-1</td>
                                        <td style="width: 100px" id="RS-1-2">RS-1-2</td>
                                        <td style="width: 100px" id="RS-1-3">RS-1-3</td>
                                        <td style="width: 100px" id="RS-1-4">RS-1-4</td>
                                        <td style="width: 100px" id="RS-1-5">RS-1-5</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RQ-2-1">RQ-2-1</td>
                                        <td style="width: 100px" id="RQ-2-2">RQ-2-2</td>
                                        <td style="width: 100px" id="RQ-2-3">RQ-2-3</td>
                                        <td style="width: 100px" id="RQ-2-4">RQ-2-4</td>
                                        <td style="width: 100px" id="RQ-2-5">RQ-2-5</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RQ-1-1">RQ-1-1</td>
                                        <td style="width: 100px" id="RQ-1-2">RQ-1-2</td>
                                        <td style="width: 100px" id="RQ-1-3">RQ-1-3</td>
                                        <td style="width: 100px" id="RQ-1-4">RQ-1-4</td>
                                        <td style="width: 100px" id="RQ-1-5">RQ-1-5</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RP-2-1">RP-2-1</td>
                                        <td style="width: 100px" id="RP-2-2">RP-2-2</td>
                                        <td style="width: 100px" id="RP-2-3">RP-2-3</td>
                                        <td style="width: 100px" id="RP-2-4">RP-2-4</td>
                                        <td style="width: 100px" id="RP-2-5">RP-2-5</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RP-1-1">RP-1-1</td>
                                        <td style="width: 100px" id="RP-1-2">RP-1-2</td>
                                        <td style="width: 100px" id="RP-1-3">RP-1-3</td>
                                        <td style="width: 100px" id="RP-1-4">RP-1-4</td>
                                        <td style="width: 100px" id="RP-1-5">RP-1-5</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RO-2-1">RO-2-1</td>
                                        <td style="width: 100px" id="RO-2-2">RO-2-2</td>
                                        <td style="width: 100px" id="RO-2-3">RO-2-3</td>
                                        <td style="width: 100px" id="RO-2-4">RO-2-4</td>
                                        <td style="width: 100px" id="RO-2-5">RO-2-5</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RO-1-1">RO-1-1</td>
                                        <td style="width: 100px" id="RO-1-2">RO-1-2</td>
                                        <td style="width: 100px" id="RO-1-3">RO-1-3</td>
                                        <td style="width: 100px" id="RO-1-4">RO-1-4</td>
                                        <td style="width: 100px" id="RO-1-5">RO-1-5</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RN-2-1">RN-2-1</td>
                                        <td style="width: 100px" id="RN-2-2">RN-2-2</td>
                                        <td style="width: 100px" id="RN-2-3">RN-2-3</td>
                                        <td style="width: 100px" id="RN-2-4">RN-2-4</td>
                                        <td style="width: 100px" id="RN-2-5">RN-2-5</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RN-1-1">RN-1-1</td>
                                        <td style="width: 100px" id="RN-1-2">RN-1-2</td>
                                        <td style="width: 100px" id="RN-1-3">RN-1-3</td>
                                        <td style="width: 100px" id="RN-1-4">RN-1-4</td>
                                        <td style="width: 100px" id="RN-1-5">RN-1-5</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RM-2-1">RM-2-1</td>
                                        <td style="width: 100px" id="RM-2-2">RM-2-2</td>
                                        <td style="width: 100px" id="RM-2-3">RM-2-3</td>
                                        <td style="width: 100px" id="RM-2-4">RM-2-4</td>
                                        <td style="width: 100px" id="RM-2-5">RM-2-5</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RM-1-1">RM-1-1</td>
                                        <td style="width: 100px" id="RM-1-2">RM-1-2</td>
                                        <td style="width: 100px" id="RM-1-3">RM-1-3</td>
                                        <td style="width: 100px" id="RM-1-4">RM-1-4</td>
                                        <td style="width: 100px" id="RM-1-5">RM-1-5</td>
                                    </tr>
                                </table>
                                <table style="margin-top:25px">
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RL-2-1">RL-2-1</td>
                                        <td style="width: 100px" id="RL-2-2">RL-2-2</td>
                                        <td style="width: 100px" id="RL-2-3">RL-2-3</td>
                                        <td style="width: 100px" id="RL-2-4">RL-2-4</td>
                                        <td style="width: 100px" id="RL-2-5">RL-2-5</td>
                                    </tr>
                                    <tr class="noText border">
                                        <td style="width: 100px" id="RL-1-1">RL-1-1</td>
                                        <td style="width: 100px" id="RL-1-2">RL-1-2</td>
                                        <td style="width: 100px" id="RL-1-3">RL-1-3</td>
                                        <td style="width: 100px" id="RL-1-4">RL-1-4</td>
                                        <td style="width: 100px" id="RL-1-5">RL-1-5</td>
                                    </tr>
                                </table>
                                <table style="margin-top:10px; height:45px">
                                    <tr class="noText border">
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                        <td style="width: 33.3px">a</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Loads Warehouse Stockfit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Scan Hire</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                </div>
                <div class="col-6"></div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $( document ).ready(function() {
            for (let i = 1; i <= 2; i++) {
                // $("#L-1-"+i).css("border", "solid red 3px");
            }
        });
    </script>
  </body>
</html>