<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="{{ public_path('dist/img/icon.ico') }}" type="image/ico" />
    <title>PT. Parkland World Indonesia 2</title>
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="{{ public_path('dist/css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 7pt;
            border: 1px solid black;
		}
        table {
        width: 100%;
        border-collapse: collapse;
        }
        @page { margin: 0px; }
        body { margin: 5px; }
        footer { margin: 5px; }
    </style>
</head>
<body  style="border: 1px solid #000000; background-color:#ffffff; padding: 5px; width: auto;">

    <div class="card-body">
        <table>
            <thead>
                <tr>
                    <th style="width: 20%;text-align: center; vertical-align: middle; padding-top:10px">
                        <img src="{{public_path('/images/Logo.png')}}" height="50px"/>
                    </th>
                    <th style="width: 80%;text-align: center; vertical-align: middle;">
                        <h5>INTERNAL AUDIT IMPROVEMENT</h5>
                    </th>
                </tr>
                <tr>
                    <th style="width: 35%;text-align: right; vertical-align: middle;">
                        Audit Date:
                    </th>
                    @foreach ($date as $item)
                        <th style="width: 65%;text-align: left; vertical-align: middle; padding-left:5px">
                            {{date("Y-m-d", strtotime($item->created_at))}}
                        </th>
                    @endforeach
                </tr>
                <tr>
                    <th style="width: 35%;text-align: right; vertical-align: middle;">
                        Finding:
                    </th>
                    <th style="width: 65%;text-align: left; vertical-align: middle; padding-left:5px">
                        {{$count_record}}
                    </th>
                </tr>
                <tr>
                    <th style="width: 35%;text-align: right; vertical-align: middle;">
                        Done:
                    </th>
                    <th style="width: 65%;text-align: left; vertical-align: middle; padding-left:5px">
                        {{$count_done}}
                    </th>
                </tr>
                <tr>
                    <th style="width: 35%;text-align: right; vertical-align: middle;">
                        Percentage:
                    </th>
                    <th style="width: 65%;text-align: left; vertical-align: middle; padding-left:5px">
                        @php
                            if($count_done==0 && $count_record==0)
                            {
                                $percentage="0";
                            }else{
                                $percentage=($count_done*100)/$count_record."%";
                            }
                        @endphp
                        {{ $percentage }}
                    </th>
                </tr>
            </thead>
        </table>
        <table>
            <thead>
                <tr>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">NO</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">Finder</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">Category</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">AREA (cell)</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#FF0000" colspan="2">BEFORE</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#00b050" colspan="2">AFTER IMPROVEMENT OR PROPOSE</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">STATUS</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">PIC</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" rowspan="2">DATE LINE</th>
                </tr>
                <tr>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" >Issue</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" >Picture</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" >Action Plan</th>
                    <th style="vertical-align:middle;text-align:center;background-color:#b7dee8" >Picture</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach($record as $p)
                <tr>
                    <td style="vertical-align:middle;text-align:center"class="align-middle">{{ $i++ }}</td>
                    <td style="vertical-align:middle;text-align:center"class="align-middle">{{$p->auditor}}</td>
                    <td style="vertical-align:middle;text-align:center"class="align-middle">{{$p->category}}</td>
                    <td style="vertical-align:middle;text-align:center"class="align-middle">{{$p->cell}}</td>
                    <td style="vertical-align:middle;text-align:center"class="align-middle">{{$p->description}}</td>
                    <td class="align-middle"><center><img src="{{public_path('/images/6s/'.$p->image)}}" height="100px" width="100px"/><br></center></td>
                    <td style="vertical-align:middle;text-align:center" class="align-middle">{{$p->action}}</td>
                        @php
                            if(empty($p->image2))
                            {
                                $image="Not Yet.png";
                            }else{
                                $image=$p->image2;
                            }
                            if ($p->status == "Not Yet") {
                                $status="bg-danger";
                            }elseif ($p->status == "Done") {
                                $status="bg-success";
                            }else{
                                $status="bg-primary";
                            }
                        @endphp
                    <td class="">
                        <center>
                            @if ($p->image2=="")
                            @else
                                <img src="{{public_path('images/6s/result/'.$p->image2)}}" height="100px" width="100px" style="padding-top: 15px"/>
                            @endif
                            <br>
                        </center>
                    </td>
                    <td style="vertical-align:middle;text-align:center" class="align-middle {{$status}}">{{$p->status}}</td>
                    <td style="vertical-align:middle;text-align:center" class="align-middle">{{$p->name_employees}}</td>
                    <td style="vertical-align:middle;text-align:center" class="align-middle">{{$p->date_line}}</td>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</body>
</html>
