<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="{{ public_path('dist/img/icon.ico') }}" type="image/ico" />
    <title>PT. Parkland World Indonesia 2</title>
  <link rel="stylesheet" href="{{ public_path('dist/css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		table tr th{
            border: 1px solid black;
		}
        table {
        width: 100%;
        border-collapse: collapse;
        }
        @page { margin: 1px; }
        body { margin: 5px; }
        footer { margin: 5px; }
    </style>
    
</head>
<body style="border: 1px solid #000000; background-color:#ffffff; padding: 5px; width: auto;">
    <div class="header">
        <h2>Time Observation Sheet</h2> 
    </div>
    <div class="card-body" style="font-family: 'Century Gothic';">
        <div class="table-responsive">
            <table class="table table-bordered" style="text-align: center;margin-bottom: 0px;">
                <thead>
                    <tr>
                        <th class="align-middle" style="width: 23.53%; font-size: 11px; padding-top: 3px;padding-bottom:3px" colspan="2"><strong>Process: {{ $hProcess }}</strong></th>
                        <th class="align-middle" style="width: 8.82% ; font-size: 12px; padding-top: 6px;padding-bottom:6px" rowspan="2"><strong>Operation</strong></th>
                        <th class="align-middle" style="width: 37.29%; font-size: 15px; padding-top: 6px;padding-bottom:6px; text-transform: uppercase;" rowspan="2" colspan="7"><strong>{{ $hArea }}</strong></th>
                        <th class="align-middle" style="width: 16.18%; font-size: 12px; padding-top: 6px;padding-bottom:6px" rowspan="2" colspan="2"><strong>Observer : {{ $hObserver }}</strong></th>
                        <th class="align-middle" style="width: 16.18%; font-size: 12px; padding-top: 6px;padding-bottom:6px" rowspan="2" colspan="2"><strong>Date : {{ $hDate }}</strong></th>
                    </tr>
                    <tr>
                        <th class="align-middle" style="font-size: 11px; padding-top: 3px; padding-bottom:3px"><strong>Style: {{ $hStyle }}</strong></th>
                        <th class="align-middle" style="font-size: 11px; padding-top: 3px; padding-bottom:3px"><strong>Gender: <{{ $hGender }}</strong></th>
                    </tr>
                </thead>
            </table>
            <table class="table table-bordered" style="text-align: center; margin-bottom: 10px;">
                <thead>
                    <tr>
                        <th class="align-middle" style="font-size: 11px; padding-top: 6px;padding-bottom:6px; width: 2.94%" rowspan="2"><strong>No.</strong></th>
                        <th class="align-middle" style="font-size: 11px; padding-top: 6px;padding-bottom:6px; width: 27.81%" rowspan="2"><strong>Elements</strong></th>
                        <th class="align-middle" style="font-size: 11px; padding-top: 4px;padding-bottom:4px; width: 32.89%" colspan="7"><strong>Time Study</strong></th>
                        <th class="align-middle" style="font-size: 11px; padding-top: 6px;padding-bottom:6px; width: 15.77%"><strong>Element Time</strong></th>
                        <th class="align-middle" style="font-size: 11px; padding-top: 6px;padding-bottom:6px; width: 20.59%" rowspan="2"><strong>Point Observered</strong></th>
                    </tr>
                    <tr>
                        <th class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px"><strong>1</strong></th>
                        <th class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px"><strong>2</strong></th>
                        <th class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px"><strong>3</strong></th>
                        <th class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px"><strong>4</strong></th>
                        <th class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px"><strong>5</strong></th>
                        <th class="align-middle" style="font-size: 9px; background-color: rgb(255, 255, 0); padding-top: 2px;padding-bottom:2px"><strong>Avg</strong></th>
                        <th class="align-middle" style="font-size: 9px; background-color: rgb(0, 176, 240); padding-top: 2px;padding-bottom:2px"><strong>Best Practice</strong></th>
                        <th class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px"><strong>NVA, VA, NVAN</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=0;
                    @endphp
                    @foreach ($data as $row)
                        @php
                            $no++
                        @endphp
                        <tr>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px" rowspan="2">{{ $no }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px" rowspan="2">{{ $row->elements }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->ct1 }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->ct2 }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->ct3 }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->ct4 }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->ct5 }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->avg }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->bp }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px" rowspan="2">{{ $row->value }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px" rowspan="2"></td>
                        </tr>
                        <tr>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->t1 }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->t2 }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->t3 }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->t4 }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px">{{ $row->t5 }}</td>
                            <td class="align-middle" style="font-size: 9px; padding-top: 2px;padding-bottom:2px" colspan="2"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table  class="table table-bordered" style="text-align: center;">
                <tr>
                    <th class="align-middle" style="font-size: 11px; padding-top: 2px;padding-bottom:2px; width:295px; height:30px">Cycle Time</th>
                    <th class="align-middle" style="font-size: 11px; padding-top: 2px;padding-bottom:2px; width:125px">{{ $sumCT }}</th>
                    {{-- <th class="align-middle" rowspan="5" style="padding: 0px 0px 0px 0px;border:0;"><img src="{{public_path('\images\lean\ie_database\TOS'.$imageVaPie.'.png')}}" style="width: 280px;"/></th> --}}
                    {{-- <th class="align-middle" rowspan="5" style="padding: 0px 0px 0px 0px;border:0;"><img src="{{public_path('\images\lean\ie_database\TOS'.$imageValuePie.'.png')}}" style="width: 280px;"/></th> --}}
                </tr>
                <tr>
                    <th class="align-middle" style="font-size: 11px; padding-top: 2px;padding-bottom:2px; width:295px; height:30px">Best Practice</th>
                    <th class="align-middle" style="font-size: 11px; padding-top: 2px;padding-bottom:2px; width:125px">{{ $sumBP }}</th>
                </tr>
                <tr>
                    <th class="align-middle" style="font-size: 11px; padding-top: 2px;padding-bottom:2px; width:295px; height:30px">Cycle Time + Allowance 15%</th>
                    <th class="align-middle" style="font-size: 11px; padding-top: 2px;padding-bottom:2px; width:125px">{{ $sumCT_standar }}</th>
                </tr>
                <tr>
                    <th class="align-middle" style="font-size: 11px; padding-top: 2px;padding-bottom:2px; width:295px; height:30px">Capacity / Hour</th>
                    <th class="align-middle" style="font-size: 11px; padding-top: 2px;padding-bottom:2px; width:125px">{{ $sumCapacity }}   </th>
                </tr>
                {{-- < id="chartdiv"> --}}
                    {{-- <th class="align-middle" colspan="2"><img src="{{public_path('\images\lean\ie_database\TOS'.$imageStackedChart.'.png')}}" style="height:90px"/></th> --}}
                {{-- </
                    tr> --}}
            </table>
        </div>
    </div>
</body>
<!-- Styles -->
{{-- <style>
    #chartdiv {
      width: 100%;
      height: 500px;
    }
    </style>
    
    <!-- Resources -->
    <script src="{{ asset('plugins/amchart/core.js') }}"></script>
    <script src="{{ asset('plugins/amchart/charts.js') }}"></script>
    <script src="{{ asset('plugins/amchart/themes/animated.js') }}"></script>
    
    <!-- Chart code -->
    <script>
        am4core.ready(function() {
        
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end
        
        // Create chart instance
        var chart = am4core.create("chartdiv", am4charts.XYChart);
        
        // Add data
        chart.data = [{
        "year": "2016",
        "europe": 2.5,
        "namerica": 2.5,
        "asia": 2.1,
        "lamerica": 0.3,
        "meast": 0.2,
        "africa": 0.1
        }, {
        "year": "2017",
        "europe": 2.6,
        "namerica": 2.7,
        "asia": 2.2,
        "lamerica": 0.3,
        "meast": 0.3,
        "africa": 0.1
        }, {
        "year": "2018",
        "europe": 2.8,
        "namerica": 2.9,
        "asia": 2.4,
        "lamerica": 0.3,
        "meast": 0.3,
        "africa": 0.1
        }];
        
        // Create axes
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "year";
        categoryAxis.renderer.grid.template.location = 0;
        
        
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.inside = true;
        valueAxis.renderer.labels.template.disabled = true;
        valueAxis.min = 0;
        
        // Create series
        function createSeries(field, name) {
        
        // Set up series
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.name = name;
        series.dataFields.valueY = field;
        series.dataFields.categoryX = "year";
        series.sequencedInterpolation = true;
        
        // Make it stacked
        series.stacked = true;
        
        // Configure columns
        series.columns.template.width = am4core.percent(60);
        series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";
        
        // Add label
        var labelBullet = series.bullets.push(new am4charts.LabelBullet());
        labelBullet.label.text = "{valueY}";
        labelBullet.locationY = 0.5;
        labelBullet.label.hideOversized = true;
        
        return series;
        }
        
        createSeries("europe", "Europe");
        createSeries("namerica", "North America");
        createSeries("asia", "Asia-Pacific");
        createSeries("lamerica", "Latin America");
        createSeries("meast", "Middle-East");
        createSeries("africa", "Africa");
        
        // Legend
        chart.legend = new am4charts.Legend();
        
        }); // end am4core.ready()
</script> --}}
</html>
