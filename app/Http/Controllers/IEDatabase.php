<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use PDF;

class IEDatabase extends Controller
{
        public function man_separation()
        {
                $data=DB::table('ied_process')
                    ->where('status','Available')
                    ->get();
                    $tos_cutting=[];
                    $tos_sewing=[];
                    $tos_Assembling=[];
                    $tos_stockfit=[];
                    $tos_Offline=[];
                    $swcs_cutting=[];
                    $swcs_sewing=[];
                    $swcs_Assembling=[];
                    $swcs_Computer=[];
                    $swcs_Stockfit=[];
                    $swcs_Offline=[];
                    $sws_cutting=[];
                    $sws_sewing=[];
                    $sws_Assembling=[];
                    $sws_Stockfit=[];
                    $sws_Offline=[];
                    $mmc=[];

                foreach ($data as $a) {
                    if ($a->mtm_study=="TOS"&& $a->area=="Cutting") {
                        $tos_cutting[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="TOS"&& $a->area=="Sewing") {
                        $tos_sewing[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="TOS"&& $a->area=="Assembling") {
                        $tos_Assembling[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="TOS"&& $a->area=="Stockfit") {
                        $tos_stockfit[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="TOS"&& $a->area=="Offline") {
                        $tos_Offline[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="SWCS"&& $a->area=="Cutting") {
                        $swcs_cutting[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="SWCS"&& $a->area=="Sewing") {
                        $swcs_sewing[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="SWCS"&& $a->area=="Assembling") {
                        $swcs_Assembling[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="SWCS"&& $a->area=="Stockfit") {
                        $swcs_Stockfit[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="SWCS"&& $a->area=="Offline") {
                        $swcs_Offline[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="SWS"&& $a->area=="Cutting") {
                        $sws_cutting[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="SWS"&& $a->area=="Sewing") {
                        $sws_sewing[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="SWS"&& $a->area=="Assembling") {
                        $sws_Assembling[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="SWS"&& $a->area=="Stockfit") {
                        $sws_Stockfit[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_study=="SWS"&& $a->area=="Offline") {
                        $sws_Offline[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                    if ($a->mtm_cs=="MMC") {
                        $sws_Offline[]=[
                            'process'=>$a->process,
                            'type_process'=>$a->type_process,
                            'ct'=>$a->ct,
                            'mtm_study'=>$a->mtm_study
                        ];
                    }
                }
            return view('ie_database.content.manseparation',['tos_cutting' => $tos_cutting,'tos_sewing'=>$tos_sewing,'tos_assembling'=>$tos_Assembling,'tos_stockfit'=>$tos_stockfit,'tos_offline'=>$tos_Offline
                                                            ,'swcs_cutting'=>$swcs_cutting,'swcs_sewing'=>$swcs_sewing,'swcs_assembling'=>$swcs_Assembling,'swcs_stockfit'=>$swcs_Stockfit,'swcs_offline'=>$swcs_Offline,'swcs_computer'=>$swcs_Computer
                                                            ,'sws_cutting'=>$sws_cutting,'sws_sewing'=>$sws_sewing,'sws_assembling'=>$sws_Assembling,'sws_stockfit'=>$sws_Stockfit,'sws_offline'=>$sws_Offline
                                                            ,'mmc'=>$mmc]);
        }
        public function computer_stitching()
        {
            $cs_data=DB::table('ied_process')
                    ->where('area','Computer Stitching')
                    ->where('model','!=','-')
                        ->where('status','Available')
                    ->orderBy('model','ASC')
                    ->orderBy('updated_at','ASC')
                    ->get();
            return view('ie_database.content.cs',['cs_data'=>$cs_data]);
        }
        function action_cs(Request $request)
        {
            $no=0;
            if($request->ajax())
            {
                $output = '';
                $tfoot = '';
                $query = $request->get('query');
                if($query != '')
                {
                    $data = DB::table('ied_process')
                        ->where('area','Computer Stitching')
                            ->where('status','Available')
                        ->where('process', 'like', '%'.$query.'%')
                        ->orWhere('model', 'like', '%'.$query.'%')
                        ->orderBy('model','ASC')
                        ->orderBy('updated_at','ASC')
                        ->get();
                }else
                {
                    $data = DB::table('ied_process')
                                ->where('area','Computer Stitching')
                                ->where('model','!=','-')
                                    ->where('status','Available')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                }
                $total_row = $data->count();
                
                if($total_row > 0)
                {
                    foreach($data as $row)
                    {
                        $no++;
                            if($row->image!="-")
                            {
                                    $image='<a class="test-popup-link" href="'.url('/images/lean/ie_database/'.$row->image).'">
                                                <img src="'.url('/images/lean/ie_database/'.$row->image).'" height="100px" width="120px"/></center>
                                            </a>';
                            }else{
                                    $image="<strong style='color: red'><center>Data Tidak Ada!</center></strong>";
                            }
                        $button='<td>
                                        <div class="card">
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#'.$row->id_process.'">Delete</button>
                                        </div>
                                        <div class="card">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#update'.$row->id_process.'">Update</button>
                                        </div>
                                            <form>
                                        <div class="card">
                                                <button type="submit" class="btn btn-primary" formaction="'.url('ie_base/history/'.$row->id_process).'">History</button>
                                        </div>
                                            </form>
                                    </td>
                                    ';
                        $output .= '
                            <tr>
                                <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                                <td style="vertical-align:middle;text-align:center"><a href="'.url('/Ie_base/search/'.$row->id_process).'">'.$row->model.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->ct.'</td>
                                <td style="vertical-align:middle;text-align:center">
                                    <a class="test-popup-link" href="'.url('/images/lean/ie_database/'.$row->image_cs).'">
                                        <img src="'.url('/images/lean/ie_database/'.$row->image_cs).'" height="100px" width="120px"/></center>
                                    </a>
                                </td>
                                <td style="vertical-align:middle;text-align:center">'.$image.'</td>
                                <td style="vertical-align:middle;text-align:center">
                                    <video width="100px" height="120px" controls>
                                        <source src="'.url('/video/lean/ie_database/'.$row->video_process).'" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                '.$button.'
                            </tr>  
                            ';
                    }
                }else{
                    $output = '
                    <tr>
                        <td align="center" colspan="5">No Data Found</td>
                    </tr>
                    ';
                }
                $res = array(
                'table_data'  => $output,
                'total_data'  => $total_row
                );
                echo json_encode($res);
            }
        }
        public function main_cell()
        {
            $cutting=DB::table('ied_process')
                        ->where('area',db::raw('"Cutting"'))
                        ->where('status','Available')
                        ->where('model','-')
                        ->orderBy('urutan_process','ASC')
                        ->get();
            $sewing=DB::table('ied_process')
                        ->where('area',db::raw('"Sewing"'))
                        ->where('status','Available')
                        ->where('model','-')
                        ->orderBy('urutan_process','ASC')
                        ->get();
            $assemlbing=DB::table('ied_process')
                        ->where('area',db::raw('"Assembling"'))
                        ->where('status','Available')
                        ->where('model','-')
                        ->orderBy('urutan_process','ASC')
                        ->get();
            $stockfit=DB::table('ied_process')
                        ->where('area',db::raw('"Stockfit"'))
                        ->where('status','Available')
                        ->where('model','-')
                        ->orderBy('urutan_process','ASC')
                        ->get();
            $offline=DB::table('ied_process')
                        ->where('area',db::raw('"Offline"'))
                        ->where('status','Available')
                        ->where('model','-')
                        ->orderBy('urutan_process','ASC')
                        ->get();

            return view('ie_database.content.mainCell',['cutting' => $cutting,'sewing'=>$sewing,'assembling'=>$assemlbing,'stockfit'=>$stockfit,'offline'=>$offline]);
        }
        function action_cutting(Request $request)
        {
            $no=0;
            if($request->ajax())
            {
                $output = '';
                $query = $request->get('query');
                    if($query != '')
                    {
                        $data = DB::table('ied_process')
                                ->where('status','Available')
                                    ->where('area','Cutting')
                                ->where('process', 'like', '%'.$query.'%')
                                ->orderBy('urutan_process','ASC')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                    }else
                    {
                        $data = DB::table('ied_process')
                                ->where('area','Cutting')
                                    ->where('status','Available')
                                ->orderBy('urutan_process','ASC')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                    }
                $total_row = $data->count();
                    if($total_row > 0)
                    {
                        foreach($data as $row)
                        {
                            $no++;
                                    $button='<td>
                                                <div class="card">
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#'.$row->id_process.'">Delete</button>
                                                </div>
                                                <div class="card">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#update'.$row->id_process.'">Update</button>
                                                </div>
                                                    <form>
                                                <div class="card">
                                                        <button type="submit"class="btn btn-primary" formaction="'.url('ie_base/history/'.$row->id_process).'">History</button>
                                                </div>
                                                    </form>
                                            </td>
                                            ';
                            $output .= '
                            <tr>
                                <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                                <td style="vertical-align:middle;text-align:center"><a href="'.url('/Ie_base/search/'.$row->id_process).'">'.$row->process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->type_process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->ct.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->mtm_study.'</td>
                                '.$button.'
                            </tr>
                            ';
                        }
                    }else
                    {
                        $output = '
                        <tr>
                            <td align="center" colspan="5">No Data Found</td>
                        </tr>
                        ';
                    }
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
                );

                echo json_encode($data);
            }
        }
        function action_sewing(Request $request)
        {
            $no=0;
            if($request->ajax())
            {
                $output = '';
                $query = $request->get('query');
                    if($query != '')
                    {
                        $data = DB::table('ied_process')
                                ->where('status','Available')
                                    ->where('area','Sewing')
                                ->where('process', 'like', '%'.$query.'%')
                                ->orderBy('urutan_process','ASC')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                    }else
                    {
                        $data = DB::table('ied_process')
                                ->where('area','Sewing')
                                    ->where('status','Available')
                                ->orderBy('urutan_process','ASC')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                    }
                $total_row = $data->count();
                    if($total_row > 0)
                    {
                        foreach($data as $row)
                        {
                            $no++;
                                    $button='<td>
                                                <div class="card">
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#'.$row->id_process.'">Delete</button>
                                                </div>
                                                <div class="card">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#update'.$row->id_process.'">Update</button>
                                                </div>
                                                    <form>
                                                <div class="card">
                                                        <button type="submit"class="btn btn-primary" formaction="'.url('ie_base/history/'.$row->id_process).'">History</button>
                                                </div>
                                                    </form>
                                            </td>
                                            ';
                            $output .= '
                            <tr>
                                <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                                <td style="vertical-align:middle;text-align:center"><a href="'.url('/Ie_base/search/'.$row->id_process).'">'.$row->process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->type_process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->ct.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->mtm_study.'</td>
                                '.$button.'
                            </tr>
                            ';
                        }
                    }else
                    {
                        $output = '
                        <tr>
                            <td align="center" colspan="5">No Data Found</td>
                        </tr>
                        ';
                    }
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
                );

                echo json_encode($data);
            }
        }
        function action_Assembling(Request $request)
        {
            $no=0;
            if($request->ajax())
            {
                $output = '';
                $query = $request->get('query');
                    if($query != '')
                    {
                        $data = DB::table('ied_process')
                                ->where('status','Available')
                                    ->where('area','Assembling')
                                ->where('process', 'like', '%'.$query.'%')
                                ->orderBy('urutan_process','ASC')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                    }else
                    {
                        $data = DB::table('ied_process')
                                ->where('area','Assembling')
                                    ->where('status','Available')
                                ->orderBy('urutan_process','ASC')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                    }
                $total_row = $data->count();
                    if($total_row > 0)
                    {
                        foreach($data as $row)
                        {
                            $no++;
                                    $button='<td>
                                                <div class="card">
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#'.$row->id_process.'">Delete</button>
                                                </div>
                                                <div class="card">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#update'.$row->id_process.'">Update</button>
                                                </div>
                                                    <form>
                                                <div class="card">
                                                        <button type="submit"class="btn btn-primary" formaction="'.url('ie_base/history/'.$row->id_process).'">History</button>
                                                </div>
                                                    </form>
                                            </td>
                                            ';
                            $output .= '
                            <tr>
                                <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                                <td style="vertical-align:middle;text-align:center"><a href="'.url('/Ie_base/search/'.$row->id_process).'">'.$row->process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->type_process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->ct.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->mtm_study.'</td>
                                '.$button.'
                            </tr>
                            ';
                        }
                    }else
                    {
                        $output = '
                        <tr>
                            <td align="center" colspan="5">No Data Found</td>
                        </tr>
                        ';
                    }
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
                );

                echo json_encode($data);
            }
        }
        function action_Stockfit(Request $request)
        {
            $no=0;
            if($request->ajax())
            {
                $output = '';
                $query = $request->get('query');
                    if($query != '')
                    {
                        $data = DB::table('ied_process')
                                ->where('status','Available')
                                    ->where('area','Stockfit')
                                ->where('process', 'like', '%'.$query.'%')
                                ->orderBy('urutan_process','ASC')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                    }else
                    {
                        $data = DB::table('ied_process')
                                ->where('area','Stockfit')
                                    ->where('status','Available')
                                ->orderBy('urutan_process','ASC')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                    }
                $total_row = $data->count();
                    if($total_row > 0)
                    {
                        foreach($data as $row)
                        {
                            $no++;
                                    $button='<td>
                                                <div class="card">
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#'.$row->id_process.'">Delete</button>
                                                </div>
                                                <div class="card">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#update'.$row->id_process.'">Update</button>
                                                </div>
                                                    <form>
                                                <div class="card">
                                                        <button type="submit"class="btn btn-primary" formaction="'.url('ie_base/history/'.$row->id_process).'">History</button>
                                                </div>
                                                    </form>
                                            </td>
                                            ';
                            $output .= '
                            <tr>
                                <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                                <td style="vertical-align:middle;text-align:center"><a href="'.url('/Ie_base/search/'.$row->id_process).'">'.$row->process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->type_process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->ct.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->mtm_study.'</td>
                                '.$button.'
                            </tr>
                            ';
                        }
                    }else
                    {
                        $output = '
                        <tr>
                            <td align="center" colspan="5">No Data Found</td>
                        </tr>
                        ';
                    }
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
                );

                echo json_encode($data);
            }
        }
        function action_Offline(Request $request)
        {
            $no=0;
            if($request->ajax())
            {
                $output = '';
                $query = $request->get('query');
                    if($query != '')
                    {
                        $data = DB::table('ied_process')
                                ->where('status','Available')
                                    ->where('area','Offline')
                                ->where('process', 'like', '%'.$query.'%')
                                ->orderBy('urutan_process','ASC')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                    }else
                    {
                        $data = DB::table('ied_process')
                                ->where('area','Offline')
                                    ->where('status','Available')
                                ->orderBy('urutan_process','ASC')
                                ->orderBy('model','ASC')
                                ->orderBy('updated_at','ASC')
                                ->get();
                    }
                $total_row = $data->count();
                    if($total_row > 0)
                    {
                        foreach($data as $row)
                        {
                            $no++;
                                    $button='<td>
                                                <div class="card">
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#'.$row->id_process.'">Delete</button>
                                                </div>
                                                <div class="card">
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#update'.$row->id_process.'">Update</button>
                                                </div>
                                                    <form>
                                                <div class="card">
                                                        <button type="submit"class="btn btn-primary" formaction="'.url('ie_base/history/'.$row->id_process).'">History</button>
                                                </div>
                                                    </form>
                                            </td>
                                            ';
                            $output .= '
                            <tr>
                                <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                                <td style="vertical-align:middle;text-align:center"><a href="'.url('/Ie_base/search/'.$row->id_process).'">'.$row->process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->type_process.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->ct.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$row->mtm_study.'</td>
                                '.$button.'
                            </tr>
                            ';
                        }
                    }else
                    {
                        $output = '
                        <tr>
                            <td align="center" colspan="5">No Data Found</td>
                        </tr>
                        ';
                    }
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
                );

                echo json_encode($data);
            }
        }
        // additional route
        public function Archive($id)
        {
            $this->authorize('archive medium');
            $status="Archive";
            DB::table('ied_process')
                        ->where('id_process',$id)
                        ->update([
                            'status' => $status,
                        ]);
            DB::table('ied_history')
                        ->where('id_process',$id)
                        ->update([
                            'status' => $status,
                        ]);
            return back()->with('alert_delete', 'Data Terlah Ter Arsip!');
        }
        public function cellSearch($id)
        {
            $cek_mtm=DB::table('ied_process')
                ->where('id_process',$id)
                ->where('status','Available')
                ->get();

            return view('ie_database.content.search',['data'=>$cek_mtm]);
        }
        public function history($id)
        {
            $history=DB::table('ied_history')
                        ->where('id_process',$id)
                        ->where('status','Available')
                        ->orderBy('updated_at','DESC')
                        ->limit(3)
                        ->get();
            if(count($history)==0)
            {
                return redirect('/Ie_base/area')->with('alert_delete', 'Data Tidak Di Temukan!');
            }else{
                foreach($history as $a)
                {
                    $record[]=$a->updated_at;
                    $string_ct[]=$a->ct;
                }
                $ct = array_map('floatval', $string_ct);
            return view('ie_database.content.history',['history'=>$history,'updated_at'=>$record,'ct'=>$ct]);
            }
        }
     //TOS
        public function tosIndex()
        {
            $style=DB::table('ied_tos')
                ->groupBy('style')
                ->orderBy('urutan')
                ->get();
                // dd($piChartValue);
            $cell=DB::table('cell_area_sop')->select('location')->get();
            return view('ie_database.content.tosIndex',['style'=>$style, 'cell'=>$cell]);
        }
     function searchTOS(Request $request)
     {
         $no=0;
         if($request->ajax())
         {
             $output = '';
             $selectProcess ='';
             $elementChart=[];
             $query = $request->get('style');
             if($query!=null&&$query!='Select Style')//notnull
             {
                 //dataTable
                     $data = DB::table('ied_tos')
                             ->where('style',$query)
                             ->orderBy('urutan','ASC')
                             ->get();
                 foreach($data as $row)
                 {
                     $no++;
                     $avgArr=round($row->avg,0);
                     $uSecAvg = $avgArr % 1000;
                     $avgArr = floor($avgArr / 1000);

                     $secondsAvg = $avgArr % 60;
                     $avgArr = floor($avgArr / 60);

                     $minutesAvg = $avgArr % 60;
                     $avgArr = floor($avgArr / 60); 
                     $resultAvg=$minutesAvg.":".$secondsAvg.":".$uSecAvg;

                     $avgMin=round($row->bp,0);
                     $uSecMin = $avgMin % 1000;
                     $avgMin = floor($avgMin / 1000);

                     $secondsMin = $avgMin % 60;
                     $avgMin = floor($avgMin / 60);

                     $minutesMin = $avgMin % 60;
                     $avgMin = floor($avgMin / 60); 
                     $resultMin=$minutesMin.":".$secondsMin.":".$uSecMin;


                     $output .='
                             <tr>
                                 <td class="h6 align-middle" rowspan="2">
                                     '.$no.'
                                     <input type="hidden" value="'.$row->id.'" name="id_process[]">
                                     <input type="hidden" value="'.$row->video.'" name="video">
                                 </td>
                                 <td class="h6 align-middle" rowspan="2"><input type="text" value="'.$row->elements.'" onClick="openFormEditTOS()" name="element[]" class="form-control tdElement"></td>
                                 <td class="h6 align-middle">'.$row->ct1.'</td>
                                 <td class="h6 align-middle">'.$row->ct2.'</td>
                                 <td class="h6 align-middle">'.$row->ct3.'</td>
                                 <td class="h6 align-middle">'.$row->ct4.'</td>
                                 <td class="h6 align-middle">'.$row->ct5.'</td>
                                 <td class="h6 align-middle">'.$resultAvg.'</td>
                                 <td class="h6 align-middle">'.$resultMin.'</td>
                                 <td class="h6 align-middle" rowspan="2"><input type="text" value="'.$row->value.'" onClick="openFormEditTOS()" name="value[]" class="form-control tdValue"></td>
                                 <td class="h6 align-middle" rowspan="2"><input type="text" value="'.$row->pointObserver.'" onClick="openFormEditTOS()" name="pointObserver[]" class="form-control tdPointObserver"></td>
                             </tr>
                             <tr>
                                 <td class="h6 align-middle">'.$row->t1.'</td>
                                 <td class="h6 align-middle">'.$row->t2.'</td>
                                 <td class="h6 align-middle">'.$row->t3.'</td>
                                 <td class="h6 align-middle">'.$row->t4.'</td>
                                 <td class="h6 align-middle">'.$row->t5.'</td>
                                 <td class="h6 align-middle" colspan="2"></td>
                             </tr>
                                 ';
                     $hProcess= $row->process;
                     $hStyle = $row->style;
                     $hGender= $row->gender;
                     $hObserver= $row->observer;
                     $hDate= $row->created_at;
                     $hArea = $row->area;
                     $elementChart[]=$row->elements;
                     $openVideo ='<video class="embed-responsive-item openVideo" id="openVideo" controls><source src="'.url('/video/lean/ie_database/TOS/'.$row->video).'" type="video/mp4">Your browser does not support the video tag.</video>';
                 }
                 //search Process
                     $dataProcess = DB::table('ied_tos')
                         ->where('style',$query)
                         ->orderBy('urutan','ASC')
                         ->groupBy('process')
                         ->get();
                         $selectProcess='<option value="">Select Process</option>';
                         foreach($dataProcess as $row)
                         {
                             $selectProcess .='<option value="'.$row->process.'">'.$row->process.'</option>';
                         }
                 //data summary
                     $dataSummary = DB::table('ied_tos')
                             ->where('style',$query)
                             ->orderBy('urutan','ASC')
                             ->groupBy('process')
                             ->groupBy('style')
                             ->get();
                         foreach($dataSummary as $rowSummary)
                         {
                             $ct=$rowSummary->sumCT;
                             $bp=$rowSummary->MinBp;
                             $ct_standar=$rowSummary->ct_standar;
                             $capacity=$rowSummary->capacity;
                         }
                 //data stackedChart
                     $stackedChart_data=DB::table("ied_tos")
                         ->select("ied_tos.value","ied_tos.id","ied_tos.avg","ied_tos.style","ied_tos.process",DB::raw("FORMAT((sum(ied_tos.avg) / tmp.TOTAL * 100),2) AS percentage"))
                         ->join(DB::raw("(
                             SELECT
                             SUM(avg) AS TOTAL,
                             style,process
                             FROM ied_tos GROUP BY ied_tos.style,ied_tos.process
                         ) AS tmp"),db::raw("tmp.style"),"=",db::raw("ied_tos.style"))
                         ->where('ied_tos.style',$query)
                         ->groupBy("ied_tos.avg")
                         ->orderBy('urutan','ASC')->get();
                     foreach($stackedChart_data as $record)
                     {
                         $avgString=$request->avg;
                         $arr_avg[]=(float)$record->avg;
                         $arr_value[]=$record->value;
                         $arr_percentage[]=$record->percentage;
                     }
                         $stackedData[0]=array("unit"=>"Mili Secound");
                     for ($i=0; $i < count($arr_avg); $i++) { 
                         $elementKe=$i+1;
                         $stackedData[0][$elementKe."-".$elementChart[$i]." ".$arr_value[$i]]=$arr_avg[$i];
                     }
                     for ($i=0; $i < count($arr_avg); $i++) { 
                         $elementKe=$i+1;
                         $stackedDataSeries_field[$i]=$elementKe."-".$elementChart[$i]." ".$arr_value[$i];
                         $stackedDataSeries_percentage[$i]=$arr_percentage[$i];
                         if ($arr_value[$i]=="VA") {
                             $stackedDataSeries_color[$i]="#a1d9f4";
                             $stackedDataSeries_fontColor[$i]="000000";
                         }elseif ($arr_value[$i]=="NVA") {
                             $stackedDataSeries_color[$i]="#e17474";
                             $stackedDataSeries_fontColor[$i]="000000";
                         }else{
                             $stackedDataSeries_color[$i]="#727272";
                             $stackedDataSeries_fontColor[$i]="ffffff";
                         }
                     }
                 //pie chart data
                     $piChartValue=DB::table('ied_tos')
                             ->select('value',db::raw('count(value) as countValue'),db::raw('sum(avg) as sumAvg'))
                             ->where('ied_tos.style',$query)
                             ->groupBy('value')
                             ->get();
                     foreach($piChartValue as $row)
                     {
                         $pieValue[]=$row->value;
                         $pieCountValue[]=$row->countValue;
                         $pieSumAvg[]=$row->sumAvg;
                     }
                     $pieChartVaRatioColor=array();
                     for ($i=0; $i < count($pieValue) ; $i++) { 
                         $pieChartVaRatio[$i]=[
                                                 "valueChart"=>$pieValue[$i],
                                                 "countValue"=>$pieCountValue[$i]
                                             ];
                         $pieChartValueRatio[$i]=[
                                                 "valueChart"=>$pieValue[$i],
                                                 "sumValue"=>$pieSumAvg[$i]
                                             ];
                         if ($pieValue[$i]=="VA") {
                             $pieColors[$i]="#a1d9f4";
                         }elseif ($pieValue[$i]=="NVA") {
                             $pieColors[$i]="#e17474";
                         }elseif ($pieValue[$i]=="NVAN") {
                             $pieColors[$i]="#727272";
                         }
                         array_push($pieChartVaRatioColor,$pieColors[$i]);
                     }
             }else{//null
                 $output = '
                     <tr>
                         <td align="center" colspan="5">No Data Found</td>
                     </tr>
                     ';
                 $ct="-";
                 $bp="-";
                 $ct_standar="-";
                 $capacity="-";
             }
             $data = array(
                 'table_data'  => $output,
                 'selectProcess' => $selectProcess,
                 'ct'  => $ct,
                 'bp' => $bp,
                 'ct_standar' => $ct_standar,
                 'capacity' => $capacity,
                 "stackedData"=>$stackedData,
                 'stackedDataSeries_field'=>$stackedDataSeries_field,
                 'stackedDataSeries_percentage'=>$stackedDataSeries_percentage,
                 'stackedDataSeries_color'=>$stackedDataSeries_color,
                 'stackedDataSeries_fontColor'=>$stackedDataSeries_fontColor,
                 'pieChartVaRatio'=>$pieChartVaRatio,
                 'pieChartValueRatio'=>$pieChartValueRatio,
                 'pieChartVaRatioColor'=>$pieChartVaRatioColor,
                 'hProcess'=>$hProcess,
                 'hStyle'=>$hStyle,
                 'hGender'=>$hGender,
                 'hObserver'=>$hObserver,
                 'hDate'=>$hDate,
                 'hArea'=>$hArea,
                 'openVideo'=>$openVideo,
                 'arrSplit'=>$avgString,
             );
             // $data = array(
             //     'databasepie'=>$pieColors
             // );
             echo json_encode($data);
         }
     }
     function searchProcessTOS(Request $request)
     {
         $no=0;
         if($request->ajax())
         {
             $output = '';
             $selectProcess ='';
             $style = $request->get('style');
             $process = $request->get('process');
             if($style!=null && $style!='Select Style' && $process!=null && $process!='Select Process')//notnull
             {
                 //dataTable
                     $data = DB::table('ied_tos')
                             ->where('style',$style)
                             ->where('process',$process)
                             ->orderBy('urutan','ASC')
                             ->get();
                         foreach($data as $row)
                         {
                             $no++;
                             $avgArr=round($row->avg,0);
                             $uSecAvg = $avgArr % 1000;
                             $avgArr = floor($avgArr / 1000);

                             $secondsAvg = $avgArr % 60;
                             $avgArr = floor($avgArr / 60);

                             $minutesAvg = $avgArr % 60;
                             $avgArr = floor($avgArr / 60); 
                             $resultAvg=$minutesAvg.":".$secondsAvg.":".$uSecAvg;

                             $avgMin=round($row->bp,0);
                             $uSecMin = $avgMin % 1000;
                             $avgMin = floor($avgMin / 1000);

                             $secondsMin = $avgMin % 60;
                             $avgMin = floor($avgMin / 60);

                             $minutesMin = $avgMin % 60;
                             $avgMin = floor($avgMin / 60); 
                             $resultMin=$minutesMin.":".$secondsMin.":".$uSecMin;

                             $output .='
                                         <tr>
                                             <td class="h6 align-middle" rowspan="2">
                                                 '.$no.'
                                                 <input type="hidden" value="'.$row->id.'" name="id_process[]">
                                                 <input type="hidden" value="'.$row->video.'" name="video">
                                             </td>
                                             <td class="h6 align-middle" rowspan="2"><input type="text" value="'.$row->elements.'" onClick="openFormEditTOS()" name="element[]" class="form-control tdElement"></td>
                                             <td class="h6 align-middle">'.$row->ct1.'</td>
                                             <td class="h6 align-middle">'.$row->ct2.'</td>
                                             <td class="h6 align-middle">'.$row->ct3.'</td>
                                             <td class="h6 align-middle">'.$row->ct4.'</td>
                                             <td class="h6 align-middle">'.$row->ct5.'</td>
                                             <td class="h6 align-middle">'.$resultAvg.'</td>
                                             <td class="h6 align-middle">'.$resultMin.'</td>
                                             <td class="h6 align-middle" rowspan="2"><input type="text" value="'.$row->value.'" onClick="openFormEditTOS()" name="value[]" class="form-control tdValue"></td>
                                             <td class="h6 align-middle" rowspan="2"><input type="text" value="'.$row->pointObserver.'" onClick="openFormEditTOS()" name="pointObserver[]" class="form-control tdPointObserver"></td>
                                         </tr>
                                         <tr>
                                             <td class="h6 align-middle">'.$row->t1.'</td>
                                             <td class="h6 align-middle">'.$row->t2.'</td>
                                             <td class="h6 align-middle">'.$row->t3.'</td>
                                             <td class="h6 align-middle">'.$row->t4.'</td>
                                             <td class="h6 align-middle">'.$row->t5.'</td>
                                             <td class="h6 align-middle" colspan="2"></td>
                                         </tr>
                                             ';
                             $hProcess= $row->process;
                             $hStyle= $row->style;
                             $hGender= $row->gender;
                             $hObserver= $row->observer;
                             $hDate= $row->created_at;
                             $hArea= $row->area;
                             $openVideo ='<video class="embed-responsive-item openVideo" id="openVideo" controls><source src="'.url('/video/lean/ie_database/TOS/'.$row->video).'" type="video/mp4">Your browser does not support the video tag.</video>';
                         }
                     $dataSummary = DB::table('ied_tos')
                             ->where('style',$style)
                             ->where('process',$process)
                             ->orderBy('urutan','ASC')
                             ->groupBy('process')
                             ->groupBy('style')
                             ->get();
                         foreach($dataSummary as $rowSummary)
                         {
                             $ct=$rowSummary->MinBp;
                             $bp=$rowSummary->MinBp;
                             $ct_standar=$rowSummary->ct_standar;
                             $capacity=$rowSummary->capacity;
                         }
                 //data stackedChart
                     $stackedChart_data=DB::table("ied_tos")
                             ->select("ied_tos.value","ied_tos.id","ied_tos.avg","ied_tos.style","ied_tos.process",DB::raw("FORMAT((sum(ied_tos.avg) / tmp.TOTAL * 100),2) AS percentage"))
                             ->join(DB::raw("(
                                 SELECT
                                 SUM(avg) AS TOTAL,
                                 style,process
                                 FROM ied_tos GROUP BY ied_tos.style,ied_tos.process
                             ) AS tmp"),db::raw("tmp.style"),"=",db::raw("ied_tos.style"))
                             ->where('ied_tos.style',$style)
                             ->where('ied_tos.process',$process)
                             ->groupBy("ied_tos.avg")
                             ->orderBy('urutan','ASC')->get();
                         foreach($stackedChart_data as $record)
                         {
                         $arr_avg[]=(float)$record->avg;
                         $arr_value[]=$record->value;
                         $arr_percentage[]=$record->percentage;
                         }
                         $stackedData[0]=array("unit"=>"Mili Secound");
                         for ($i=0; $i < count($arr_avg); $i++) { 
                             $elementKe=$i+1;
                             $stackedData[0]["Element-".$elementKe." ".$arr_value[$i]]=$arr_avg[$i];
                         }
                         for ($i=0; $i < count($arr_avg); $i++) {
                             $elementKe=$i+1; 
                             $stackedDataSeries_field[$i]="Element-".$elementKe." ".$arr_value[$i];
                             $stackedDataSeries_percentage[$i]=$arr_percentage[$i];
                             if ($arr_value[$i]=="VA") {
                                 $stackedDataSeries_color[$i]="#a1d9f4";
                                 $stackedDataSeries_fontColor[$i]="000000";
                             }elseif ($arr_value[$i]=="NVA") {
                                 $stackedDataSeries_color[$i]="#e17474";
                                 $stackedDataSeries_fontColor[$i]="000000";
                             }else{
                                 $stackedDataSeries_color[$i]="#727272";
                                 $stackedDataSeries_fontColor[$i]="ffffff";
                             }
                         }
                 //pie chart data
                     $piChartValue=DB::table('ied_tos')
                             ->select('value',db::raw('count(value) as countValue'),db::raw('sum(avg) as sumAvg'))
                             ->where('ied_tos.style',$style)
                             ->where('ied_tos.process',$process)
                             ->groupBy('value')
                             ->get();
                         foreach($piChartValue as $row)
                         {
                             $pieValue[]=$row->value;
                             $pieCountValue[]=$row->countValue;
                             $pieSumAvg[]=$row->sumAvg;
                         }
                         $pieChartVaRatioColor=array();
                         for ($i=0; $i < count($pieValue) ; $i++) { 
                             $pieChartVaRatio[$i]=[
                                                     "valueChart"=>$pieValue[$i],
                                                     "countValue"=>$pieCountValue[$i]
                                                 ];
                             $pieChartValueRatio[$i]=[
                                                     "valueChart"=>$pieValue[$i],
                                                     "sumValue"=>$pieSumAvg[$i]
                                                 ];
                             if ($pieValue[$i]=="VA") {
                                 $pieColors[$i]="#a1d9f4";
                             }elseif ($pieValue[$i]=="NVA") {
                                 $pieColors[$i]="#e17474";
                             }elseif ($pieValue[$i]=="NVAN") {
                                 $pieColors[$i]="#727272";
                             }
                             array_push($pieChartVaRatioColor,$pieColors[$i]);
                         }
             }else{//null
                 $output = '
                     <tr>
                         <td align="center" colspan="5">No Data Found</td>
                     </tr>
                     ';
                 $ct="-";
                 $bp="-";
                 $ct_standar="-";
                 $capacity="-";
             }
             $data = array(
                 'table_data'  => $output,
                 'ct'  => $ct." Sec",
                 'bp' => $bp." Sec",
                 'ct_standar' => $ct_standar." Sec",
                 'capacity' => $capacity." Prs",
                 "stackedData"=>$stackedData,
                 'stackedDataSeries_field'=>$stackedDataSeries_field,
                 'stackedDataSeries_percentage'=>$stackedDataSeries_percentage,
                 'stackedDataSeries_color'=>$stackedDataSeries_color,
                 'stackedDataSeries_fontColor'=>$stackedDataSeries_fontColor,
                 'pieChartVaRatio'=>$pieChartVaRatio,
                 'pieChartValueRatio'=>$pieChartValueRatio,
                 'pieChartVaRatioColor'=>$pieChartVaRatioColor,
                 'hProcess'=>$hProcess,
                 'hStyle'=>$hStyle,
                 'hGender'=>$hGender,
                 'hObserver'=>$hObserver,
                 'hDate'=>$hDate,
                 'hArea'=>$hArea,
                 'openVideo'=>$openVideo
             );
             echo json_encode($data);
         }
     }
     public function optionArea(Request $request)
     {
         if($request->ajax())
         {
             $output = '';
             $dataLocation='';
                 //dataTable
                     $data = DB::table('cell_area_sop')->get();
                 foreach($data as $a)
                 {
                     $dataLocation .='<option value="'.$a->location.'">'.$a->location.'</option>';
                 }
                 $dataOption='<select class="form-control" name="area" id="areaOption">'.$dataLocation.'</select>';
                 $data = array(
                     'dataLocation'  => $dataOption,
                 );
             echo json_encode($data);
         }
     }
     public function SaveTOS(Request $request)
     {
         $rules = array(
             'process' => 'required',
             'style' => 'required',
             'gender' => 'required',
             'area' => 'required',
             'observer' => 'required',
             'name_element' => 'required',
             't1' => 'required',
             'ct1' => 'required',
             'avg' => 'required',
             'min' => 'required',
             'CTSummary' => 'required',
             'sumBP' => 'required',
             'value' => 'required',
             'countProcess' => 'required',
             'video' => 'required',
             'pointObserver' => 'required'
         );

         $error = Validator::make($request->all(), $rules);

         if($error->fails())
         {
             return response()->json(['errors' => $error->errors()->all()]);
         }
         $process=$request->process;
         $style=$request->style;
         $gender=$request->gender;
         $area=$request->area;
         $observer=$request->observer;
         $elements=$request->name_element;
         $t1=$request->t1;
         $t2=$request->t2;
         $t3=$request->t3;
         $t4=$request->t4;
         $t5=$request->t5;
         $ct1=$request->ct1;
         $ct2=$request->ct2;
         $ct3=$request->ct3;
         $ct4=$request->ct4;
         $ct5=$request->ct5;
         $avg=$request->avg;
         $min=$request->min;
         //convert string time to decimal avg
         $avgDecimal=[];
         $minDecimal=[];
             foreach($avg as $avgArr)
             {
                 $time   = explode(":", $avgArr);

                 $minute = $time[0] * 6000;
                 $second = $time[1] * 1000;
                 $milisec = $time[2] ;

                 $avgDecimal[] = $minute + $second + $milisec;
             }
             //convert string time to decimal avg
             foreach($min as $minArr)
             {
                 $time   = explode(":", $minArr);

                 $minute = $time[0] * 6000;
                 $second = $time[1] * 1000;
                 $milisec = $time[2] ;

                 $minDecimal[] = $minute + $second + $milisec;
             }

         $sumCT=$request->CTSummary;
         $MinBp=$request->sumBP;
         $ct_standar=$request->CTAllowance;
         $capacity=$request->CapaPerHour;
         $value=$request->value;
           
         $count_process=$request->countProcess;
         if (empty($request->pointObserver)) {
             $pointObserver="-";
         }else{
             $pointObserver=$request->pointObserver;
         }
         $queryState=0;
         $video = $request->file('video');
         $ext=$video->getClientOriginalExtension();
         // //manage video
             $new_video_name=$process.'-'.$style.'-'.rand(1, 99999).'.'.$video->getClientOriginalExtension();
             $destination_path_video = public_path('/video/lean/ie_database/TOS');
             $video->move($destination_path_video,$new_video_name);

         for ($i=0; $i < (int)$count_process; $i++) { 
             $urutan=$i+1;
             $data[$i]=[
                 'id' => $urutan."-".$process.'-'.$style.'-'.$elements[$i]."-".rand(1, 9999),
                 'urutan' => $urutan,
                 'process' => $process,
                 'style' => $style,
                 'gender' => $gender,
                 'area' => $area,
                 'observer' => $observer,
                 'elements' => $elements[$i],
                 't1' => $t1[$i],
                 'ct1' => $ct1[$i],
                 'avg' => $avgDecimal[$i],
                 'bp' => $minDecimal[$i],
                 'sumCT' => $sumCT,
                 'MinBp' => $MinBp,
                 'ct_standar' => $ct_standar,
                 'capacity' => $capacity,
                 'value' => $value[$i],
                 'video' => $new_video_name,
             ];
           
             if (isset($t2[$i])) {
                 $data[$i]['t2']=$t2[$i];
             }else{
                 $data[$i]['t2']="-";
             }
             if (isset($t3[$i])) {
                 $data[$i]['t3']=$t3[$i];
             }else{
                 $data[$i]['t3']="-";
             }
             if (isset($t4[$i])) {
                 $data[$i]['t4']=$t4[$i];
             }else{
                 $data[$i]['t4']="-";
             }
             if (isset($t5[$i])) {
                 $data[$i]['t5']=$t5[$i];
             }else{
                 $data[$i]['t5']="-";
             }
             if (isset($ct2[$i])) {
                 $data[$i]['ct2']=$ct2[$i];
             }else{
                 $data[$i]['ct2']="-";
             }
             if (isset($ct3[$i])) {
                 $data[$i]['ct3']=$ct3[$i];
             }else{
                 $data[$i]['ct3']="-";
             }
             if (isset($ct4[$i])) {
                 $data[$i]['ct4']=$ct4[$i];
             }else{
                 $data[$i]['ct4']="-";
             }
             if (isset($ct5[$i])) {
                 $data[$i]['ct5']=$ct5[$i];
             }else{
                 $data[$i]['ct5']="-";
             }
             if (isset($pointObserver[$i])) {
                 $data[$i]['pointObserver']=$pointObserver[$i];
             }
             $queryState = DB::table('ied_tos')->insert($data[$i]);
         }
         if ($queryState!=0) {
             $output = array(
                 'success' => "Save Sukses!",
             );
             return response()->json($output); 
         }else{
             $output = array(
                 'success' => "Save Failled!",
             );
             return response()->json($output);
         }
        
     }
     public function UpdateTOS(Request $request)
     {
         $rules = array(
             'process' => 'required',
             'style' => 'required',
             'gender' => 'required',
             'area' => 'required',
             'observer' => 'required',
             'element' => 'required',
             'value' => 'required',
             'pointObserver' => 'required',
         );

         $error = Validator::make($request->all(), $rules);

         if($error->fails())
         {
             return response()->json(['errors' => $error->errors()->all()]);
         }
         $process=$request->process;
         $style=$request->style;
         $gender=$request->gender;
         $area=$request->area;
         $observer=$request->observer;
         $elements=$request->element;
         $value=$request->value;
         $pointObserver=$request->pointObserver;
         $id_process=$request->id_process;
         $old_video = $request->video;
         $queryState=0;

         for ($i=0; $i < count($id_process); $i++) { 
             $output = DB::table('ied_tos')
                 ->where('id',$id_process[$i])
                 ->update([
                     'process' => $process,
                     'style' => $style,
                     'gender' => $gender,
                     'area' => $area,
                     'observer' => $observer,
                     'elements' => $elements[$i],
                     'value' => $value[$i],
                     'pointObserver'=> $pointObserver[$i]
                 ]);
                 /* Existing File name */
                 // $filePath = url('/video/lean/ie_database/TOS/'.$old_video);
                 
                 /* New File name */
                 // $arrSplitVideo = explode("-", $old_video); 
                 // $nomerVideo=$arrSplitVideo[2];
                 // $new_video_name=$process.'-'.$style.'-'.$nomerVideo;
                 // $newFileName = url('/video/lean/ie_database/TOS/'.$new_video_name);

                 // Storage::move( url('/video/lean/ie_database/TOS/'.$old_video), $url('/video/lean/ie_database/TOS/'.$new_video_name));
         }
             $output = array(
                 'success' => "Update Sukses!",
             );
             return response()->json($output); 
     }
     public function cetak_pdf(Request $request)
     {
         $dataProcess=$request->process;
         $dataStyle=$request->style;
         $data = DB::table('ied_tos')
             ->where('style',$dataStyle)
             ->where('process',$dataProcess)
             ->orderBy('urutan','ASC')
             ->get();
             foreach($data as $row)
             {
                 $hProcess= $row->process;
                 $hStyle= $row->style;
                 $hGender= $row->gender;
                 $hObserver= $row->observer;
                 $hDate= $row->created_at;
                 $hArea= $row->area;
                 $imageStackedChart = $row->image_chart;
                 $imageVaPie = $row->image_va_ratio;
                 $imageValuePie = $row->image_value_ratio;
             }
         $dataSummary = DB::table('ied_tos')
             ->where('style',$dataStyle)
             ->where('process',$dataProcess)
             ->orderBy('elements','ASC')
             ->groupBy('process')
             ->groupBy('style')
             ->get();
         foreach($dataSummary as $rowSummary)
         {
             $ct=$rowSummary->MinBp;
             $bp=$rowSummary->MinBp;
             $ct_standar=$rowSummary->ct_standar;
             $capacity=$rowSummary->capacity;
         }
         
         $pdf = PDF::loadview('ie_database.content.printPDF',['data'=>$data,
                                                                 'hProcess'=>$hProcess,'hStyle'=>$hStyle,'hGender'=>$hGender,'hObserver'=>$hObserver,'hDate'=>$hDate,'hArea'=>$hArea,
                                                                 'sumCT'=>$ct,'sumBP'=>$bp,'sumCT_standar'=>$ct_standar,'sumCapacity'=>$capacity,
                                                                 'imageStackedChart'=>$imageStackedChart,'imageVaPie'=>$imageVaPie,'imageValuePie'=>$imageValuePie
                                                             ])->setPaper('a4', 'landscape');
         return $pdf->download('TOS-'.$dataProcess.'-'.$dataStyle.'-'.rand(1,100).'.pdf');
     }
     public function tesCanvas()
     {
         return view('ie_database.content.tesCanvas');
     }
     public function tesCanvasControll(Request $request)
     {
         $image = $request->image;
         dd($image);
     }
}
