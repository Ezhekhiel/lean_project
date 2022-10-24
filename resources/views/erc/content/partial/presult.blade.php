<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#AddModal">Add Data</button>
<div style="overflow-x:auto;">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="vertical-align:middle;text-align:center" rowspan="2">No</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Formal / Informal</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Kaizen ID</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Month</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Model Name</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Model Picture</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Project Description</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Picture "Before" Improvement</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Picture "After" Improvement</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Category (E/C/R/S/I)</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Area</th>
            <th style="vertical-align:middle;text-align:center" rowspan="2">Project Status</th>
            <th style="vertical-align:middle;text-align:center" colspan="3">PPH</th>
            <th style="vertical-align:middle;text-align:center" colspan="3">TCT</th>
        </tr>
        <tr>
            <th style="vertical-align:middle;text-align:center">Before</th>
            <th style="vertical-align:middle;text-align:center">After</th>
            <th style="vertical-align:middle;text-align:center">Improve</th>
            <th style="vertical-align:middle;text-align:center">Before</th>
            <th style="vertical-align:middle;text-align:center">After</th>
            <th style="vertical-align:middle;text-align:center">Improve</th>
        </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach($data as $p)
                @php
                    $no++;
                    $monthNum  = $p->month;
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F');
                @endphp
                <tr>
                    <td style="vertical-align:middle;text-align:center">{{ $no }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->type_summary }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->kaizen_id }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $monthName }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->model_name }}</td>
                    <td style="vertical-align:middle;text-align:center"><img src="/dataerc/summary/{{ $p->model_picture }}" width="150" height="100"></td>
                    <td style="vertical-align:middle">{{ $p->project_description }}</td>
                    <td style="vertical-align:middle;text-align:center"><img src="/dataerc/summary/{{ $p->pic_b_improvement }}" width="150" height="100"></td>
                    <td style="vertical-align:middle;text-align:center"><img src="/dataerc/summary/{{ $p->pic_a_improvement }}" width="150" height="100"></td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->category }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->area }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->project_status }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->pph_before }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->pph_after }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->pph_improve }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->tct_before }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->tct_after }}</td>
                    <td style="vertical-align:middle;text-align:center">{{ $p->tct_improve }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{!! $data->render() !!}