<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\lean6S;
use Illuminate\Support\Facades\Mail;
use Validator;
use Auth;
use Illuminate\Support\Facades\Storage;
use File;
use PDF;
use DateTime;
use Intervention\Image\ImageManagerStatic as Image;

class auditController extends Controller
{
    public function index()
    {
        $cell=DB::table('cell_info')
                ->select('*')
                ->groupBy('id_cell')
                ->get();
      
        return view('audit.content.list',['cell'=>$cell]);
    }
    public function form(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal=date("Y-m-d");
        $tanggal_a=date("d");
        $id_cell=$request->cell;
        if (empty($id_cell)) {
            return redirect()->back()->with('alert_error', 'Area not selected!');
        }

            $list=db::table('6s_list')->get();
            $building=db::table('cell_info')->where('id_cell',$id_cell)->pluck('id_building')[0];
            $character=db::table('cell_info')->where('id_cell',$id_cell)->pluck('id_character')[0];
            $cell=db::table('cell_info')->where('id_cell',$id_cell)->pluck('cell')[0];
        if($building=="1"||$building=="2") 
        {
            if ($character=="1") 
            {
                $list_soal_cutting=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id_cell." and b.id_area=1)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_cutting=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id_cell)
                                ->where('a.id_area','=','1')
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                $list_soal_sewing=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id_cell." and b.id_area=2)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_sewing=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id_cell)
                                ->where('a.id_area','=','2')
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                $list_soal_assy=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id_cell." and b.id_area=3)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_assy=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id_cell)
                                ->where('a.id_area','=','3')
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                    foreach ($list_soal_cutting as $a)
                    {
                            $data_cutting[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id_cell,
                                'id_area'=>"1",
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                    foreach($list_soal_sewing as $a)
                    {
                            $data_sewing[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id_cell,
                                'id_area'=>"2",
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                    foreach($list_soal_assy as $a)
                    {
                            $data_assy[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id_cell,
                                'id_area'=>"3",
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                return view('audit/content/list_6s',['result'=>$data_cutting,'modal'=>$data_cutting,'modal_view'=>$modal_view_cutting,
                                                    'result2'=>$data_sewing,'modal2'=>$data_sewing,'modal_view2'=>$modal_view_sewing,
                                                        'result3'=>$data_assy,'modal3'=>$data_assy,'modal_view3'=>$modal_view_assy,]);
            }elseif($character=="2"){
                $list_assy_only=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id_cell." and b.id_area=4)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_except=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id_cell)
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                    foreach($list_assy_only as $a)
                    {
                        $data_assy[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id_cell,
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                return view('audit/content/list_6s_except',['data'=>$data_assy,'modal_view'=>$modal_view_except]);
            }else{
                $list_assy_only=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id_cell." and b.id_area=8)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_except=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id_cell)
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                    foreach($list_assy_only as $a)
                    {
                        $data_assy[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id_cell,
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                return view('audit/content/list_6s_except',['data'=>$data_assy,'modal_view'=>$modal_view_except]);
            }
        }elseif($building=="10"){
            if($character=="3"){
                $list_assy_only=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id_cell." and b.id_area=8)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_except=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id_cell)
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                    foreach($list_assy_only as $a)
                    {
                        $data_assy[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id_cell,
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                return view('audit/content/list_6s_except',['data'=>$data_assy,'modal_view'=>$modal_view_except]);
            }else{
                 $list_assy_only=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id_cell." and b.id_area=6)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_except=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id_cell)
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                    foreach($list_assy_only as $a)
                    {
                        $data_assy[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id_cell,
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                return view('audit/content/list_6s_except',['data'=>$data_assy,'modal_view'=>$modal_view_except]);
            }
        }else{
            $list_except_f=DB::table('6s_list as a')
                            ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id_cell.")THEN 1 ELSE 0 END) as jumlah"))
                            ->leftjoin('audit as b','a.id_list','=','b.id_list')
                            ->groupby('a.id_list')
                            ->get();
            $modal_view_except=DB::table('audit as a')
                            ->select('b.id_list', 'b.audit_point','a.*')
                            ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                            ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                            ->where('a.id_cell','=',$id_cell)
                            ->groupby('a.image')
                            ->orderby('b.id_list')
                            ->get();
                foreach($list_except_f as $a)
                {
                    $data_except[]=[
                            'no'=>$a->id_list,
                            'id_cell'=>$id_cell,
                            'cell'=>$cell,
                            'building'=>$building,
                            'id_list'=>$a->id_list,
                            'category'=>$a->category,
                            'audit_point'=>$a->audit_point,
                            'guide_true'=>$a->guide_true,
                            'guide_false'=>$a->guide_false,
                            'jumlah'=>$a->jumlah
                        ];
                }
            return view('audit/content/list_6s_except',['data'=>$data_except,'modal_view'=>$modal_view_except]);
        }
    }
    public function form_id($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal=date("Y-m-d");
        $tanggal_a=date("d");
        if (empty($id)) {
            return redirect()->back()->with('alert_error', 'Area not selected!');
        }

            $list=db::table('6s_list')->get();
            $building=db::table('cell_info')->where('id_cell',$id)->pluck('id_building')[0];
            $character=db::table('cell_info')->where('id_cell',$id)->pluck('id_character')[0];
            $cell=db::table('cell_info')->where('id_cell',$id)->pluck('cell')[0];
        if($building=="1"||$building=="2") 
        {
            if ($character=="1") 
            {
                $list_soal_cutting=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id." and b.id_area=1)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_cutting=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id)
                                ->where('a.id_area','=','1')
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                $list_soal_sewing=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id." and b.id_area=2)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_sewing=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id)
                                ->where('a.id_area','=','2')
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                $list_soal_assy=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id." and b.id_area=3)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_assy=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id)
                                ->where('a.id_area','=','3')
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                    foreach ($list_soal_cutting as $a)
                    {
                            $data_cutting[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id,
                                'id_area'=>"1",
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                    foreach($list_soal_sewing as $a)
                    {
                            $data_sewing[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id,
                                'id_area'=>"2",
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                    foreach($list_soal_assy as $a)
                    {
                            $data_assy[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id,
                                'id_area'=>"3",
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                return view('audit/content/list_6s',['result'=>$data_cutting,'modal'=>$data_cutting,'modal_view'=>$modal_view_cutting,
                                                    'result2'=>$data_sewing,'modal2'=>$data_sewing,'modal_view2'=>$modal_view_sewing,
                                                        'result3'=>$data_assy,'modal3'=>$data_assy,'modal_view3'=>$modal_view_assy,]);
            }elseif($character=="2"){
                $list_assy_only=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id." and b.id_area=4)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_except=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id)
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                    foreach($list_assy_only as $a)
                    {
                        $data_assy[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id,
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                return view('audit/content/list_6s_except',['data'=>$data_assy,'modal_view'=>$modal_view_except]);
            }else{
                $list_assy_only=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id." and b.id_area=8)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_except=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id)
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                    foreach($list_assy_only as $a)
                    {
                        $data_assy[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id,
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                return view('audit/content/list_6s_except',['data'=>$data_assy,'modal_view'=>$modal_view_except]);
            }
        }elseif($building=="10"){
            if($character=="3"){
                $list_assy_only=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id." and b.id_area=8)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_except=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id)
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                    foreach($list_assy_only as $a)
                    {
                        $data_assy[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id,
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                return view('audit/content/list_6s_except',['data'=>$data_assy,'modal_view'=>$modal_view_except]);
            }else{
                 $list_assy_only=DB::table('6s_list as a')
                                ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id." and b.id_area=6)THEN 1 ELSE 0 END) as jumlah"))
                                ->leftjoin('audit as b','a.id_list','=','b.id_list')
                                ->groupby('a.id_list')
                                ->get();
                $modal_view_except=DB::table('audit as a')
                                ->select('b.id_list', 'b.audit_point','a.*')
                                ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                                ->where('a.id_cell','=',$id)
                                ->groupby('a.image')
                                ->orderby('b.id_list')
                                ->get();
                    foreach($list_assy_only as $a)
                    {
                        $data_assy[]=[
                                'no'=>$a->id_list,
                                'id_cell'=>$id,
                                'cell'=>$cell,
                                'building'=>$building,
                                'id_list'=>$a->id_list,
                                'category'=>$a->category,
                                'audit_point'=>$a->audit_point,
                                'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                                'jumlah'=>$a->jumlah
                            ];
                    }
                return view('audit/content/list_6s_except',['data'=>$data_assy,'modal_view'=>$modal_view_except]);
            }
        }else{
            $list_except_f=DB::table('6s_list as a')
                            ->select('a.*',DB::raw("SUM(CASE WHEN(DATE_FORMAT(b.created_at,'%Y-%m-%d')=DATE_FORMAT(CURRENT_TIMESTAMP,'%Y-%m-%d') AND b.id_cell=".$id.")THEN 1 ELSE 0 END) as jumlah"))
                            ->leftjoin('audit as b','a.id_list','=','b.id_list')
                            ->groupby('a.id_list')
                            ->get();
            $modal_view_except=DB::table('audit as a')
                            ->select('b.id_list', 'b.audit_point','a.*')
                            ->leftjoin('6s_list as b','a.id_list','=','b.id_list')
                            ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m-%d')"),$tanggal)
                            ->where('a.id_cell','=',$id)
                            ->groupby('a.image')
                            ->orderby('b.id_list')
                            ->get();
                foreach($list_except_f as $a)
                {
                    $data_except[]=[
                            'no'=>$a->id_list,
                            'id_cell'=>$id,
                            'cell'=>$cell,
                            'building'=>$building,
                            'id_list'=>$a->id_list,
                            'category'=>$a->category,
                            'audit_point'=>$a->audit_point,
                            'guide_true'=>$a->guide_true,
                                'guide_false'=>$a->guide_false,
                            'jumlah'=>$a->jumlah
                        ];
                }
            return view('audit/content/list_6s_except',['data'=>$data_except,'modal_view'=>$modal_view_except]);
        }
    }
    public function register_auditor()
    {
        return view('audit/content/form_register');
    }
    public function manage_index()
    {
        return view('audit/content/manage');
    }
    public function manage(Request $request)
    {
        $month=$request->month;
        // $team=$request->team;
        $building=$request->building;
        $list=DB::table('audit as a')
            ->select('b.cell','b.id_cell')
            ->Join('cell_info as b','a.id_cell','=','b.id_cell')
            ->where('b.id_building',$building)
            // ->where('a.team',$team)
            ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m')"),$month)
            ->orderBy('b.id_cell')
            ->groupBy('b.cell')->get();
        $record=DB::table('audit as a')
            ->select('a.*','b.cell','d.category','d.audit_point','e.name as name_employees','e.email', 'f.nama as area')
            ->Join('cell_info as b','a.id_cell','=','b.id_cell')
            ->Join('6s_list as d','a.id_list','=','d.id_list')
            ->Join('cell_area as f','a.id_area','=','f.id_area')
            ->leftjoin('employees as e','a.pic','=','e.nik')
            ->groupby('a.id_audit')
            ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m')"),$month)
            ->where('a.status','!=','Done')
            // ->where('a.team',$team)
            ->where('b.id_building',$building)
            ->orderBy('a.id_cell')
            ->get();
        $departemen_list=db::table('departemen')->groupby('name')->get();
        $preview=DB::table('audit as a')
            ->select('a.*','b.cell','d.category','d.audit_point','e.name')
            ->Join('cell_info as b','a.id_cell','=','b.id_cell')
            ->Join('6s_list as d','a.id_list','=','d.id_list')
            ->Join('employees as e','a.pic','=','e.nik')
            ->groupby('a.image')
            ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m')"),$month)
            // ->where('a.team',$team)
            ->where('b.id_building',$building)
            ->orderBy('a.id_list')
            ->get();
        $edit=db::table('cell_info as a')
                ->distinct()
                ->select('b.name','a.id_building')
                ->Join('area_building as b','a.id_building','=','b.id_building')
                ->where('a.id_building',$building)
                ->get();
            foreach($edit as $a)
            {
                $name_building=$a->name;
                $building=$a->id_building;
            }
        $list_employees=db::table('employees')->get();
        $jabatan_data=db::table('employees')->groupBy('jabatan')->get();
        $cell_list=db::table('cell_info')->get();
        $area_list=db::table('cell_area')->get();

            return view('audit/content/manage_list',['record'=>$record,'preview'=>$preview,'building'=>$building,
                                                'name_building'=>$name_building,
                                                'delete'=>$record,'list'=>$list,'month'=>$month,'employees'=>$list_employees,
                                                'departemen'=>$departemen_list,'jabatan_data'=>$jabatan_data,
                                                'cell'=>$cell_list,'area'=>$area_list]);
    }
    public function report()
    {
        $data_cell=db::table('cell_info')->get();
        foreach($data_cell as $a)
        {
            if($a->id_character==2)//assy only
            {
                $record_assembling_only=DB::table("audit")
                    ->select(DB::raw("avg(case when jumlah_assy_only>10 then 0 when jumlah_assy_only>6 then 1 when jumlah_assy_only>3 then 2 when jumlah_assy_only>0 then 3 else 4 end) as avg_assy_only"))
                    ->from(DB::raw("(select 
                                        SUM(CASE 
                                            WHEN(
                                                month(b.created_at)=5
                                                AND year(b.created_at)=year(CURRENT_TIMESTAMP) 
                                                AND b.id_cell=$a->id_cell
                                                )THEN 1 ELSE 0 END
                                    )AS jumlah_assy_only
                                                        from `6s_list` as `a` left join `audit` as `b` on `a`.`id_list` = `b`.`id_list`GROUP BY a.id_list)audit"))
                    ->get();
                foreach($record_assembling_only as $b)
                {
                    $data_avg_assy=$b->avg_assy_only;
                    $recording_2=array();
                    $recording_2['cell']=$a->cell;
                    $recording_2['avg']=$data_avg_assy;
                    $result_avg_assy_only[]=$recording_2;
                    //cell chart
                    $record_chart_cell_2=array();
                    $record_chart_cell_2=$a->cell;
                    $cell_assy_only[]=$record_chart_cell_2;
                    // avg
                    $record_chart_assy_c2b=array();
                    $record_chart_assy_c2b=$b->avg_assy_only;
                    $avg_assy_only[]=number_format($record_chart_assy_c2b,2);
                }
            }elseif($a->id_character==1){//reguler c2b
                $record_reguler=DB::table("audit")
                                ->select(DB::raw("avg(case when jumlah_cutting>10 then 0 when jumlah_cutting>6 then 1 when jumlah_cutting>3 then 2 when jumlah_cutting>0 then 3 else 4 end) as avg_cutting,
                                                    avg(case when jumlah_sewing>10 then 0 when jumlah_sewing>6 then 1 when jumlah_sewing>3 then 2 when jumlah_sewing>0 then 3 else 4 end) as avg_sewing,
                                                    avg(case when jumlah_assembling>10 then 0 when jumlah_assembling>6 then 1 when jumlah_assembling>3 then 2 when jumlah_assembling>0 then 3 else 4 end) as avg_assy
                                                "))
                                ->from(DB::raw("(select SUM(CASE WHEN(month(b.created_at)=5 AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=$a->id_cell AND b.id_area=1)THEN 1 ELSE 0 END)AS jumlah_cutting,
                                                        SUM(CASE WHEN(month(b.created_at)=5 AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=$a->id_cell AND b.id_area=2)THEN 1 ELSE 0 END)AS jumlah_sewing,
                                                        SUM(CASE WHEN(month(b.created_at)=5 AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=$a->id_cell AND b.id_area=3)THEN 1 ELSE 0 END)AS jumlah_assembling
                                                                    from `6s_list` as `a` left join `audit` as `b` on `a`.`id_list` = `b`.`id_list`GROUP BY a.id_list)audit"))
                                ->get();
                foreach($record_reguler as $b)
                {
                    $recording_1=array();
                    $recording_1['cell']=$a->cell;
                    $recording_1['avg_cutting']=$b->avg_cutting;
                    $recording_1['avg_sewing']=$b->avg_sewing;
                    $recording_1['avg_assy']=$b->avg_assy;
                    $result_avg_c2b[]=$recording_1;
                    //cell chart
                        $record_chart_cell_1=array();
                        $record_chart_cell_1=$a->cell;
                        $cell_c2b[]=$record_chart_cell_1;
                    //cutting avg
                        $record_chart_cutting_c2b=array();
                        $record_chart_cutting_c2b=$b->avg_cutting;
                        $avg_cutting[]=number_format($record_chart_cutting_c2b,2);
                    //sewing avg
                        $record_chart_sewing_c2b=array();
                        $record_chart_sewing_c2b=$b->avg_sewing;
                        $avg_sewing[]=number_format($record_chart_sewing_c2b,2);
                    //assy avg
                        $record_chart_assy_c2b=array();
                        $record_chart_assy_c2b=$b->avg_assy;
                        $avg_assy[]=number_format($record_chart_assy_c2b,2);
                }
            }elseif($a->id_character==4){
                if($a->id_building==5){//stockfit
                    $record_stockfit=DB::table("audit")
                                                ->select(DB::raw("avg(case when jumlah_stockfit>10 then 0 when jumlah_stockfit>6 then 1 when jumlah_stockfit>3 then 2 when jumlah_stockfit>0 then 3 else 4 end) as avg_stockfit"))
                                                ->from(DB::raw("(select SUM(CASE WHEN(month(b.created_at)=5 AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=$a->id_cell)THEN 1 ELSE 0 END)AS jumlah_stockfit from `6s_list` as `a` left join `audit` as `b` on `a`.`id_list` = `b`.`id_list`GROUP BY a.id_list)audit"))
                                                ->get();
                    foreach($record_stockfit as $b)
                    {
                        $recording_4_5=array();
                        $recording_4_5['cell']=$a->cell;
                        $recording_4_5['avg']=$b->avg_stockfit;
                        $result_avg_stockfit[]=$recording_4_5;
                        //cell chart
                        $record_chart_cell_4_5=array();
                        $record_chart_cell_4_5=$a->cell;
                        $cell_stockfit[]=$record_chart_cell_4_5;
                        //assy avg
                        $record_chart_stockfit=array();
                        $record_chart_stockfit=$b->avg_stockfit;
                        $avg_stockfit[]=number_format($record_chart_stockfit,2);
                    }
                }elseif($a->id_building==4||$a->id_building==10){//offline
                    $record_offline=DB::table("audit")
                                                ->select(DB::raw("avg(case when jumlah_offline>10 then 0 when jumlah_offline>6 then 1 when jumlah_offline>3 then 2 when jumlah_offline>0 then 3 else 4 end) as avg_offline"))
                                                ->from(DB::raw("(select SUM(CASE WHEN(month(b.created_at)=5 AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=$a->id_cell)THEN 1 ELSE 0 END)AS jumlah_offline from `6s_list` as `a` left join `audit` as `b` on `a`.`id_list` = `b`.`id_list`GROUP BY a.id_list)audit"))
                                                ->get();
                    foreach($record_offline as $b)
                    {
                        $recording_4_4=array();
                        $recording_4_4['cell']=$a->cell;
                        $recording_4_4['avg']=$b->avg_offline;
                        $result_avg_offline[]=$recording_4_4;
                        //cell chart
                        $record_chart_cell_44=array();
                        $record_chart_cell_44=$a->cell;
                        $cell_offline[]=$record_chart_cell_44;
                        //assy avg
                        $record_chart_offline=array();
                        $record_chart_offline=$b->avg_offline;
                        $avg_offline[]=number_format($record_chart_offline,2);
                    }
                }elseif($a->id_building==8){//lamination
                    $record_laminating=DB::table("audit")
                                                ->select(DB::raw("avg(case when jumlah_laminating>10 then 0 when jumlah_laminating>6 then 1 when jumlah_laminating>3 then 2 when jumlah_laminating>0 then 3 else 4 end) as avg_laminating"))
                                                ->from(DB::raw("(select SUM(CASE WHEN(month(b.created_at)=5 AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=$a->id_cell)THEN 1 ELSE 0 END)AS jumlah_laminating from `6s_list` as `a` left join `audit` as `b` on `a`.`id_list` = `b`.`id_list`GROUP BY a.id_list)audit"))
                                                ->get();
                    foreach($record_laminating as $b)
                    {
                        $recording_4_8=array();
                        $recording_4_8['cell']=$a->cell;
                        $recording_4_8['avg']=$b->avg_laminating;
                        $result_avg_laminating[]=$recording_4_8;
                        //cell chart
                        $record_chart_cell_48=array();
                        $record_chart_cell_48=$a->cell;
                        $cell_laminating[]=$record_chart_cell_48;
                        //assy avg
                        $record_chart_laminating=array();
                        $record_chart_laminating=$b->avg_laminating;
                        $avg_laminating[]=number_format($record_chart_laminating,2);
                    }
                }else{//other
                    $record_laminating=DB::table("audit")
                                        ->select(DB::raw("avg(case when jumlah_other>10 then 0 when jumlah_other>6 then 1 when jumlah_other>3 then 2 when jumlah_other>0 then 3 else 4 end) as avg_other"))
                                        ->from(DB::raw("(select SUM(CASE WHEN(month(b.created_at)=5 AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=$a->id_cell)THEN 1 ELSE 0 END)AS jumlah_other from `6s_list` as `a` left join `audit` as `b` on `a`.`id_list` = `b`.`id_list`GROUP BY a.id_list)audit"))
                                        ->get();
                    foreach($record_laminating as $b)
                    {
                        $recording_other=array();
                        $recording_other['cell']=$a->cell;
                        $recording_other['avg']=$b->avg_other;
                        $result_avg_other[]=$recording_other;
                    //cell chart
                        $record_chart_cell_other=array();
                        $record_chart_cell_other=$a->cell;
                        $cell_other[]=$record_chart_cell_other;
                    //assy avg
                        $record_chart_other=array();
                        $record_chart_other=$b->avg_other;
                        $avg_other[]=number_format($record_chart_other,2);
                    } 
                }
            }elseif($a->id_character==3){
                $record_office=DB::table("audit")
                                                ->select(DB::raw("avg(case when jumlah_office>10 then 0 when jumlah_office>6 then 1 when jumlah_office>3 then 2 when jumlah_office>0 then 3 else 4 end) as avg_office"))
                                                ->from(DB::raw("(select SUM(CASE WHEN(month(b.created_at)=5 AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=$a->id_cell)THEN 1 ELSE 0 END)AS jumlah_office from `6s_list` as `a` left join `audit` as `b` on `a`.`id_list` = `b`.`id_list`GROUP BY a.id_list)audit"))
                                                ->get();
                    foreach($record_office as $b)
                    {
                        $recording_3=array();
                        $recording_3['cell']=$a->cell;
                        $recording_3['avg']=$b->avg_office;
                        $result_avg_office[]=$recording_3;
                        //cell chart
                        $record_chart_cell_3=array();
                        $record_chart_cell_3=$a->cell;
                        $cell_office[]=$record_chart_cell_3;
                        //assy avg
                        $record_chart_office=array();
                        $record_chart_office=$b->avg_office;
                        $avg_office[]=number_format($record_chart_office,2);
                    }
            }
        }

        return view('audit.content.report',['result_c2b'=>$result_avg_c2b,'result_assy_only'=>$result_avg_assy_only,'result_office'=>$result_avg_office,'result_stockfit'=>$result_avg_stockfit,'result_offline'=>$result_avg_offline,'result_laminating'=>$result_avg_laminating
                                                ,'cell_c2b'=>$cell_c2b,'avg_cutting'=>$avg_cutting,'avg_sewing'=>$avg_sewing,'avg_assy'=>$avg_assy,'cell_assy_only'=>$cell_assy_only,'avg_assy_only'=>$avg_assy_only,'cell_stockfit'=>$cell_stockfit,'avg_stockfit'=>$avg_stockfit
                                                ,'cell_offline'=>$cell_offline,'avg_offline'=>$avg_offline,'cell_laminating'=>$cell_laminating,'avg_laminating'=>$avg_laminating,'cell_office'=>$cell_office,'avg_office'=>$avg_office,'result_other'=>$result_avg_other,'cell_other'=>$cell_other,'avg_other'=>$avg_other
                                            ]);
    }
    
    public function report_ex()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal=date("Y-m-d");
        $month=date('m');
        $cell_reguler=DB::table('cell_info')
            ->select('*')
            ->where('id_character','1')
            ->get();
        $cell_stockfit=DB::table('cell_info')
            ->select('*')
            ->where('id_building','5')
            ->get();
        $cell_offline=DB::table('cell_info')
            ->select('*')
            ->where('id_building','4')
            ->get();
        $top_3=DB::table('6s_hasil as a')
            ->select('b.cell',DB::raw("COUNT(a.id_cell) as counts"))
            ->join('cell_info  as b','a.id_cell','=','b.id_cell')
            ->where(DB::raw('month(a.created_at)'),$month)
            ->groupBy('a.id_cell')
            ->orderBy('counts','DESC')
            ->take(3)
            ->get();
        
        if(count($top_3)==0)
        {
            $top3_alert=1;
            $array_top3=[0,0,0];
            $array_cell_top3 = ['-','-','-'];
        }else{
            $top3_alert=1;
            foreach($top_3 as $a)
            {
                $recording=array();
                $recording['counts']=$a->counts;
                $result_top3[]=$recording;
                $recording_cell=array();
                $recording_cell['cell']=$a->cell;
                $result_cell_top3[]=$recording_cell;
            }
            $array_top3 = array_map('current', $result_top3);
            $array_cell_top3 = array_map('current',$result_cell_top3);
        }
        foreach($cell_reguler as $a)
        {
            $b=$a->id_cell;
            $record_reguler=DB::table("6s_hasil")
                ->select(DB::raw("AVG(jumlah_cutting) as avg_cutting"),
                            DB::raw("AVG(jumlah_sewing) as avg_sewing"),
                                DB::raw("AVG(jumlah_assembling) as avg_assembling"))
                ->from(DB::raw("(select
                                    IF(5-(SUM(CASE WHEN(month(b.created_at)=month(CURRENT_TIMESTAMP) AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=".$b." AND b.id_area=1)THEN 1 ELSE 0 END))<0,0,
                                            5-(SUM(CASE WHEN(month(b.created_at)=month(CURRENT_TIMESTAMP) AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=".$b." AND b.id_area=1)THEN 1 ELSE 0 END)))AS jumlah_cutting,
                                        IF(5-(SUM(CASE WHEN(month(b.created_at)=month(CURRENT_TIMESTAMP) AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=".$b." AND b.id_area=2)THEN 1 ELSE 0 END))<0,0,
                                                5-(SUM(CASE WHEN(month(b.created_at)=month(CURRENT_TIMESTAMP) AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=".$b." AND b.id_area=2)THEN 1 ELSE 0 END)))AS jumlah_sewing,
                                            IF(5-(SUM(CASE WHEN(month(b.created_at)=month(CURRENT_TIMESTAMP) AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=".$b." AND b.id_area=3)THEN 1 ELSE 0 END))<0,0,
                                                    5-(SUM(CASE WHEN(month(b.created_at)=month(CURRENT_TIMESTAMP) AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=".$b." AND b.id_area=3)THEN 1 ELSE 0 END)))AS jumlah_assembling
                                                    from `6s_list` as `a` left join `audit` as `b` on `a`.`id_list` = `b`.`id_list`GROUP BY a.id_list)6s_hasil"))
                ->get();
            foreach($record_reguler as $b)
            {
                if($b->avg_cutting == 5)
                {
                    $average_cutting=0;
                    $average_sewing=0;
                    $average_assembling=0;
                }else{
                    $average_cutting=$b->avg_cutting;
                    $average_sewing=$b->avg_sewing;
                    $average_assembling=$b->avg_assembling;
                }
                $recording=array();
                    $recording['avg_cutting']=$average_cutting;
                    $recording['avg_sewing']=$average_sewing;
                    $recording['avg_assembling']=$average_assembling;
                    $recording['avg_all']=($average_cutting+$average_sewing+$average_assembling)/3;
                    $recording['cell']=$a->cell;
                $result[]=$recording;
                    $result_cutting[]=$recording['avg_cutting'];
                    $result_sewing[]=$recording['avg_sewing'];
                    $result_assembling[]=$recording['avg_assembling'];
                    $result_all[]=$recording['avg_all'];
                $result_cell=array();
                    $result_cell=$a->cell;
                    $chart_nama_cell[]=$result_cell;
            }
        }
        foreach($cell_stockfit as $a)
        {
            $b=$a->id_cell;
            $record_stockfit=DB::table("6s_hasil")
                ->select(DB::raw("AVG(jumlah_stockfiting) as avg_stockfit"))
                ->from(DB::raw("(select
                                    IF(5-(SUM(CASE WHEN(month(b.created_at)=month(CURRENT_TIMESTAMP) AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=".$b.")THEN 1 ELSE 0 END))<0,0,
                                            5-(SUM(CASE WHEN(month(b.created_at)=month(CURRENT_TIMESTAMP) AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=".$b.")THEN 1 ELSE 0 END)))AS jumlah_stockfiting
                                                    from `6s_list` as `a` left join `6s_hasil` as `b` on `a`.`id_list` = `b`.`id_list`GROUP BY a.id_list)6s_hasil"))
                ->get();
                foreach($record_stockfit as $b)
                {
                    if($b->avg_stockfit == 5)
                    {
                        $average_stockfit=0;
                    }else{
                        $average_stockfit=$b->avg_stockfit;
                    }
                    $recording=array();
                        $recording['avg_stockfit']=$average_stockfit;
                        $recording['cell']=$a->cell;
                    $result_stockfit[]=$recording;
                        $result_stockfiting[]=$recording['avg_stockfit'];
                    $result_cell2=array();
                        $result_cell2=$a->cell;
                        $chart_nama_cell2[]=$result_cell2;
                }
        }
        foreach($cell_offline as $a)
        {
            $b=$a->id_cell;
             $record_offline=DB::table("6s_hasil")
                    ->select(DB::raw("AVG(jumlah_offline) as avg_offline"))
                    ->from(DB::raw("(select
                                        IF(5-(SUM(CASE WHEN(month(b.created_at)=month(CURRENT_TIMESTAMP) AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND  b.id_cell=".$b.")THEN 1 ELSE 0 END))<0,0,
                                                5-(SUM(CASE WHEN(month(b.created_at)=month(CURRENT_TIMESTAMP) AND year(b.created_at)=year(CURRENT_TIMESTAMP) AND b.id_cell=".$b.")THEN 1 ELSE 0 END)))AS jumlah_offline
                                                        from `6s_list` as `a` left join `6s_hasil` as `b` on `a`.`id_list` = `b`.`id_list`GROUP BY a.id_list)6s_hasil"))
                    ->get();
                foreach($record_offline as $b)
                {
                    if($b->avg_offline == 5)
                    {
                        $average_offline=0;
                    }else{
                        $average_offline=$b->avg_offline;
                    }
                    $recording=array();
                        $recording['avg_offline']=$average_offline;
                        $recording['cell']=$a->cell;
                    $result_offline[]=$recording;
                        $result_offliner[]=$recording['avg_offline'];
                    $result_cell3=array();
                        $result_cell3=$a->cell;
                        $chart_nama_cell3[]=$result_cell3;
                }
        }
        // function count Reguler
            if (in_array(0, $result_cutting))
            {
                function countCutting($result_cutting) {
                    return count($result_cutting) - array_count_values(array_map('strval', $result_cutting))['0'];
                }
            }else{
                function countCutting($result_cutting) {
                    return count($result_cutting);
                }
            }
            if (in_array(0, $result_sewing))
            {
                function countSewing($result_sewing) {
                    return count($result_sewing) - array_count_values(array_map('strval', $result_sewing))['0'];
                }
            }else{
                function countSewing($result_sewing) {
                    return count($result_sewing);
                }
            }
            if(in_array(0, $result_assembling))
            {
                function countAssembling($result_assembling) {
                    return count($result_assembling) - array_count_values(array_map('strval', $result_assembling))['0'];
                }
            }else{
                function countAssembling($result_assembling) {
                    return count($result_assembling);
                }
            }
            if(in_array(0,$result_all))
            {
                function countAll($result_all) {
                    return count($result_all) - array_count_values(array_map('strval', $result_all))['0'];
                }
            }else{
                function countAll($result_all) {
                    return count($result_all);
                }
            }
        // function count Stockfit
            if (in_array(0, $result_stockfiting))
            {
                function countStockfit($result_stockfiting) {
                    return count($result_stockfiting) - array_count_values(array_map('strval', $result_stockfiting))['0'];
                }
            }else{
                function countStockfit($result_stockfiting) {
                    return count($result_stockfiting);
                }
            }
        // function count offline
            if (in_array(0,$result_offliner))
            {
                function countOffline($result_offliner) {
                    return count($result_offliner) - array_count_values(array_map('strval', $result_offliner))['0'];
                }
            }else{
                function countOffline($result_offliner) {
                    return count($result_offliner);
                }
            }
        // /function count
            if(array_sum($result_cutting)==0 || array_sum($result_sewing)==0 || array_sum($result_assembling)==0 || array_sum($result_stockfiting)|| array_sum($result_offliner)==0 || array_sum($result_all)==0)
            {
                // average total on reguler cell if sum = 0
                    $average_area['average_cutting']=0;
                    $average_area['average_sewing']=0;
                    $average_area['average_assembling']=0;
                    $average_area['average_al']=0;
                    $result2[]=$average_area;
                // average total on stockfit if sum = 0
                    $average_area2['average_stockfit']=0;
                    $result_stockfit2[]=$average_area2;
                // average total on offline
                    $average_area3['average_offline']=0;
                    $result_offline3[]=$average_area3;
            }else{
                // average total on reguler cell
                    $average_area['average_cutting']=array_sum($result_cutting)/countCutting($result_cutting);
                    $average_area['average_sewing']=array_sum($result_sewing)/countSewing($result_sewing);
                    $average_area['average_assembling']=array_sum($result_assembling)/countAssembling($result_assembling);
                    $average_area['average_al']=array_sum($result_all)/countAll($result_all);
                    $result2[]=$average_area;
                // average total on stockfit
                    $average_area2['average_stockfit']=array_sum($result_stockfiting)/countStockfit($result_stockfiting);
                    $result_stockfit2[]=$average_area2;
                // average total on offline
                    $average_area3['average_offline']=array_sum($result_offliner)/countOffline($result_offliner);
                    $result_offline3[]=$average_area3;
            }
        // average rekap all
            $average_all[]=$result_all;
            $average_all[]=$result_stockfiting;
            $average_all[]=$result_offliner;
            $average_summary_all=$average_all;
        // average rekap reguler
            $average_area_reguler=$result_all;
                $count_reguler=count($average_area_reguler);
                        for ($x = 0; $x < $count_reguler; $x++) {
                            if($average_area_reguler[$x]==5)
                            {
                                $hasil_reguler=0;
                            }else{
                                $hasil_reguler=$average_area_reguler[$x];
                            }
                            $finish_chart_reguler[]=$hasil_reguler;
                    }
        // average rekap stockfit
            $average_area_stockfit=array_map('intval',$result_stockfiting);
                $count_stockfitting=count($average_area_stockfit);
                    for ($x = 0; $x < $count_stockfitting; $x++) {
                        if($average_area_stockfit[$x]==5)
                        {
                            $hasil_stockfit=0;
                        }else{
                            $hasil_stockfit=$average_area_stockfit[$x];
                        }
                        $finish_chart_stockfit[]=$hasil_stockfit;
                    }
        // average rekap offline
            $average_area_offline=array_map('floatval',$result_offliner);
                $count_offline=count($average_area_offline);
                for ($x = 0; $x < $count_offline; $x++) {
                    if($average_area_offline[$x]==5)
                    {
                        $hasil_offline=0;
                    }else{
                        $hasil_offline=$average_area_offline[$x];
                    }
                    $finish_chart_offline[]=$hasil_offline;
                }
        return view('audit/content/report_example',['record_reguler'=>$result,'average_area'=>$result2,
                                                        'result_stockfiting'=>$result_stockfit,'result_stockfit2'=>$result_stockfit2,
                                                        'result_offline'=>$result_offline,'result_offline3'=>$result_offline3,
                                                        'chart_average_summary_all'=>$average_summary_all,
                                                        'chartc2b_name'=>$chart_nama_cell,
                                                            'chartc2b'=>$finish_chart_reguler,
                                                        'chartstockfit_name'=>$chart_nama_cell2,
                                                            'chartstockfit'=>$finish_chart_stockfit,
                                                        'chartoffline_name'=>$chart_nama_cell3,
                                                            'chartoffline'=>$finish_chart_offline,
                                                            'chart_top3'=>$array_top3,'chart_cell_top3'=>$array_cell_top3,
                                                            'top3_alert'=>$top3_alert
                                                            ]);
    }




    //crud
    public function save_audit(Request $request)
    {   
        $id_cell=$request->id_cell;
        $id_list=$request->id_list;
        $auditor=$request->auditor;
        $tanggal=$request->tanggal;
        $hasil=$request->result;
        $id_audit=rand(111,999999);
        $cek_area=db::table('cell_info')->where('id_cell',$id_cell)->get();
            foreach($cek_area as $a)
            {
                $building=$a->id_building;
                $character=$a->id_character;
                if ($building=="1" || $building=="2") {
                    if ($character=="2") { // I-C Assembling Only
                        $result="Ini Gedung 1 / 2 Assembling Only";
                        $id_area=4;
                    }elseif($character=="1"){// $result="Ini Gedung 1 / 2";
                        $result="Ini Gedung 1 / 2 Reguler";
                        $id_area=$request->id_area;
                    }
                    else{
                        $result="Ini Gedung 1 / 2 Office";
                        $id_area=8;
                    }
                }elseif ($building=="5") {// $result="Ini Stockfit";
                    if($character=="3")
                    {
                        $id_area=8;
                    }else{
                    $id_area=7;
                    }
                }elseif($building=="10"){//ini main office
                    if($character=="3")
                    {
                        $id_area=8;
                    }else{
                        $id_area=7;
                    }
                }else{// $result="Ini Offline";
                    $id_area=6;
                }
            }
        $cek_database=db::table('audit')
            ->where('id_cell',$id_cell)
            ->where('id_area',$id_area) 
            ->where('created_at',$tanggal)
            ->where('id_list',$id_list)
            ->get();
        if ($id_list==20||$id_list==17||$id_list==13) 
        { //soal tanpa upload foto
            if (count($cek_database)>0) 
            {//cek takut double upload
                echo '<script type="text/javascript">';
                echo 'alert("Data ini tidak boleh di input lebih dari 2 kali");';
                echo 'window.history.back();';
                echo '</script>';
            }else{
                if($hasil!="tidak")
                {
                    for($i=0;$i<11;$i++)
                    {
                        $data[$i]=[
                            'id_audit'=>$id_audit,
                            'id_area'=>$id_area,
                            'id_cell'=>$id_cell,
                            'id_list'=>$id_list,
                            'auditor'=>$auditor,
                            'created_at'=>$tanggal,
                            'image'=>"notyet.png",
                        ];
                    }
                    db::table('audit')->insert($data);
                    return redirect('audit/form/'.$id_cell)->with('alert', 'Saved!');
                }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Jika Audit Point di pilih No / Tidak memilih maka tidak perlu di save! tolong untuk Di Refresh Kembali");';
                    echo 'window.history.back();';
                    echo '</script>';
                }
            }
        }elseif ($id_list==15||$id_list==11) 

        { // soal dengan upload foto tetapi bisa tanpa foto
            $images=$request->images;
            $stat=$request->stat;
            if (count($cek_database)>0) 
            { //cek double input
                echo '<script type="text/javascript">';
                echo 'alert("Data ini tidak boleh di input lebih dari 2 kali");';
                echo 'window.history.back();';
                echo '</script>';
            }else{
                if ($stat=="Noting") 
                {
                    for($i=0;$i<11;$i++)
                    {
                        $data[$i]=[
                            'id_audit'=>$id_audit,
                            'id_area'=>$id_area,
                            'id_cell'=>$id_cell,
                            'id_list'=>$id_list,
                            'auditor'=>$auditor,
                            'created_at'=>$tanggal,
                            'image'=>"notyet.png"
                        ];
                    }
                    db::table('audit')->insert($data);
                    return redirect('/audit/form/'.$id_cell)->with('alert', 'Saved!');
                }elseif ($stat=="Broke") {
                    $image=$request->image;
                    if(empty($image))
                    {
                        echo '<script type="text/javascript">';
                        echo 'alert("Bila anda memilih point ini, anda harus upload Image dan isi Description");';
                        echo 'window.history.back();';
                        echo '</script>';
                    }
                    $description=$request->description;
                    list($width, $height) = getimagesize($image);
                    $input= rand(111,999999).'.'.$image->extension();
                    $destinationPath = public_path('/images/6s');
                    $img = Image::make($image->path());
                    $img->rotate(0);
                    $img->resize(500, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$input);
                    for($i=0;$i<4;$i++)
                    {
                        $data[$i]=[
                            'id_audit'=>$id_audit,
                            'id_area'=>$id_area,
                            'id_cell'=>$id_cell,
                            'id_list'=>$id_list,
                            'auditor'=>$auditor,
                            'created_at'=>$tanggal,
                            'image'=>$input,
                            'description'=>$description
                        ];
                    }
                    db::table('audit')->insert($data);
                    return redirect('/audit/form/'.$id_cell)->with('alert', 'Saved!');
                }else{
                    echo '<script type="text/javascript">';
                    echo 'alert("Jika Audit Point di pilih Ada / Tidak memilih maka tidak perlu di save! harap Di Refresh Kembali");';
                    echo 'window.history.back();';
                    echo '</script>';
                }
            }
        }else
        { //upload harus ada foto / normal
            $image=$request->image;
            $description=$request->description;
            $count_description=count(array_filter($description, function($x) { return !empty($x); }));
            $count_image=count(array_filter($image, function($x) { return !empty($x); }));
            if ($count_description!=$count_image) 
            {
                    echo '<script type="text/javascript">';
                    echo 'alert("Jumlah Image dan Description harus sesuai");';
                    echo 'window.history.back();';
                    echo '</script>';
            }else{
                    for($i=0;$i<$count_description;$i++)
                    {
                            $data[$i]=[
                                'id_audit'=>rand(111,999999),
                                'id_area'=>$id_area,
                                'id_cell'=>$id_cell,
                                'id_list'=>$id_list,
                                'auditor'=>$auditor,
                                'created_at'=>$tanggal,
                            ];
                            if (isset($image[$i])) {
                                $input[$i]= rand(111,999999).'.'.$image[$i]->extension();
                                $destinationPath = public_path('/images/6s');
                                $img = Image::make($image[$i]->path());
                                $img->rotate(0);
                                $img->resize(500, 500, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->save($destinationPath.'/'.$input[$i]);
                                $data[$i]['image']=$input[$i];
                            }
                            if (isset($description[$i])) {
                                $data[$i]['description']=$description[$i];
                            }
                    }
                    db::table('audit')->insert($data);
                    return redirect('/audit/form/'.$id_cell)->with('alert', 'Saved!');
            }
        }            
    }
    // public function save_audit(Request $request)
    // {   
    //     $auditor=$request->auditor;
    //     $id_cell=$request->id_cell;
    //     $tanggal=$request->tanggal;
    //     $id_list=$request->id_list;
    //     $team=$request->team;
    //     $hasil=$request->result;
    //     $id_audit=rand(111,999999);
    //     $cek_area=db::table('cell_info')->where('id_cell',$id_cell)->get();
    //         foreach($cek_area as $a)
    //         {
    //             $building=$a->id_building;
    //             $character=$a->id_character;
    //             if ($building=="1" || $building=="2") {
    //                 if ($character=="2") { // I-C Assembling Only
    //                     $result="Ini Gedung 1 / 2 Assembling Only";
    //                     $id_area=4;
    //                 }elseif($character=="1"){// $result="Ini Gedung 1 / 2";
    //                     $result="Ini Gedung 1 / 2 Reguler";
    //                     $id_area=$request->id_area;
    //                 }
    //                 else{
    //                     $result="Ini Gedung 1 / 2 Office";
    //                     $id_area=8;
    //                 }
    //             }elseif ($building=="5") {// $result="Ini Stockfit";
    //                 if($character=="3")
    //                 {
    //                     $id_area=8;
    //                 }else{
    //                 $id_area=7;
    //                 }
    //             }elseif($building=="10"){//ini main office
    //                 if($character=="3")
    //                 {
    //                     $id_area=8;
    //                 }else{
    //                     $id_area=7;
    //                 }
    //             }else{// $result="Ini Offline";
    //                 $id_area=6;
    //             }
    //         }
    //     $cek_database=db::table('audit')
    //         ->where('id_cell',$id_cell)
    //         ->where('id_area',$id_area) 
    //         ->where('created_at',$tanggal)
    //         ->where('id_list',$id_list)
    //         ->get();
    //     if ($id_list==20||$id_list==17||$id_list==13) 
    //     { //soal tanpa upload foto
    //         if (count($cek_database)>0) 
    //         {//cek takut double upload
    //             echo '<script type="text/javascript">';
    //             echo 'alert("Data ini tidak boleh di input lebih dari 2 kali");';
    //             echo 'window.history.back();';
    //             echo '</script>';
    //         }else{
    //             if($hasil!="tidak")
    //             {
    //                 for($i=0;$i<11;$i++)
    //                 {
    //                     $data[$i]=[
    //                         'id_audit'=>$id_audit,
    //                         'id_area'=>$id_area,
    //                         'id_cell'=>$id_cell,
    //                         'id_list'=>$id_list,
    //                         'team'=>$team,
    //                         'auditor'=>$auditor,
    //                         'created_at'=>$tanggal,
    //                         'image'=>"notyet.png",
    //                     ];
    //                 }
    //                 db::table('audit')->insert($data);
    //                 return redirect('audit/form/'.$id_cell)->with('alert', 'Saved!');
    //             }else{
    //                 echo '<script type="text/javascript">';
    //                 echo 'alert("Jika Audit Point di pilih No / Tidak memilih maka tidak perlu di save! tolong untuk Di Refresh Kembali");';
    //                 echo 'window.history.back();';
    //                 echo '</script>';
    //             }
    //         }
    //     }elseif ($id_list==15||$id_list==11) 
    //     { // soal dengan upload foto tetapi bisa tanpa foto
    //         $images=$request->images;
    //         $stat=$request->stat;
    //         if (count($cek_database)>0) 
    //         { //cek double input
    //             echo '<script type="text/javascript">';
    //             echo 'alert("Data ini tidak boleh di input lebih dari 2 kali");';
    //             echo 'window.history.back();';
    //             echo '</script>';
    //         }else{
    //             if ($stat=="Noting") 
    //             {
    //                 for($i=0;$i<11;$i++)
    //                 {
    //                     $data[$i]=[
    //                         'id_audit'=>$id_audit,
    //                         'id_area'=>$id_area,
    //                         'id_cell'=>$id_cell,
    //                         'id_list'=>$id_list,
    //                         'team'=>$team,
    //                         'auditor'=>$auditor,
    //                         'created_at'=>$tanggal,
    //                         'image'=>"notyet.png"
    //                     ];
    //                 }
    //                 db::table('audit')->insert($data);
    //                 return redirect('/audit/form/'.$id_cell)->with('alert', 'Saved!');
    //             }elseif ($stat=="Broke") {
    //                 $image=$request->image;
    //                 if(empty($image))
    //                 {
    //                     echo '<script type="text/javascript">';
    //                     echo 'alert("Bila anda memilih point ini, anda harus upload Image dan isi Description");';
    //                     echo 'window.history.back();';
    //                     echo '</script>';
    //                 }
    //                 $description=$request->description;
    //                 list($width, $height) = getimagesize($image);
    //                 $input= rand(111,999999).'.'.$image->extension();
    //                 $destinationPath = public_path('/images/6s');
    //                 $img = Image::make($image->path());
    //                 $img->rotate(0);
    //                 $img->resize(500, 500, function ($constraint) {
    //                     $constraint->aspectRatio();
    //                 })->save($destinationPath.'/'.$input);
    //                 for($i=0;$i<4;$i++)
    //                 {
    //                     $data[$i]=[
    //                         'id_audit'=>$id_audit,
    //                         'id_area'=>$id_area,
    //                         'id_cell'=>$id_cell,
    //                         'id_list'=>$id_list,
    //                         'team'=>$team,
    //                         'auditor'=>$auditor,
    //                         'created_at'=>$tanggal,
    //                         'image'=>$input,
    //                         'description'=>$description
    //                     ];
    //                 }
    //                 db::table('audit')->insert($data);
    //                 return redirect('/audit/form/'.$id_cell)->with('alert', 'Saved!');
    //             }else{
    //                 echo '<script type="text/javascript">';
    //                 echo 'alert("Jika Audit Point di pilih Ada / Tidak memilih maka tidak perlu di save! harap Di Refresh Kembali");';
    //                 echo 'window.history.back();';
    //                 echo '</script>';
    //             }
    //         }
    //     }else
    //     { //upload harus ada foto / normal
    //         $image=$request->image;
    //         $description=$request->description;
    //         $count_description=count(array_filter($description, function($x) { return !empty($x); }));
    //         $count_image=count(array_filter($image, function($x) { return !empty($x); }));
    //         if ($count_description!=$count_image) 
    //         {
    //                 echo '<script type="text/javascript">';
    //                 echo 'alert("Jumlah Image dan Description harus sesuai");';
    //                 echo 'window.history.back();';
    //                 echo '</script>';
    //         }else{
    //                 for($i=0;$i<$count_description;$i++)
    //                 {
    //                         $data[$i]=[
    //                             'id_audit'=>rand(111,999999),
    //                             'id_area'=>$id_area,
    //                             'id_cell'=>$id_cell,
    //                             'team'=>$team,
    //                             'id_list'=>$id_list,
    //                             'auditor'=>$auditor,
    //                             'created_at'=>$tanggal,
    //                         ];
    //                         if (isset($image[$i])) {
    //                             $input[$i]= rand(111,999999).'.'.$image[$i]->extension();
    //                             $destinationPath = public_path('/images/6s');
    //                             $img = Image::make($image[$i]->path());
    //                             $img->rotate(0);
    //                             $img->resize(500, 500, function ($constraint) {
    //                                 $constraint->aspectRatio();
    //                             })->save($destinationPath.'/'.$input[$i]);
    //                             $data[$i]['image']=$input[$i];
    //                         }
    //                         if (isset($description[$i])) {
    //                             $data[$i]['description']=$description[$i];
    //                         }
    //                 }
    //                 db::table('audit')->insert($data);
    //                 return redirect('/audit/form/'.$id_cell)->with('alert', 'Saved!');
    //         }
    //     }            
    // }
    public function save_manage(Request $request)
    {
        $date=$request->date_line;
        $pic=$request->pic;
        $id_audit=$request->id_audit;
        if (empty($partner)&&empty($date)&&empty($pic)) {
            return redirect('manage6s_index/')->with('alert_error', 'Tidak ada data yang di save!'); 
        }
        $count_pic=count(array_filter($pic, function($x) { return !empty($x); }));
        $count_date=count(array_filter($date, function($x) { return !empty($x); }));
        $max=max($count_pic,$count_date);
        if($count_pic+$count_date>0)
        {
            $id = array_map('intval', $request->id);
            $count=count($pic);
            date_default_timezone_set('Asia/Jakarta');
            $tanggal=date("Y-m-d H:i:s"); 

                for($i=0;$i<$count;$i++)
                {
                    $data[$i]=[
                    ];
                    if(isset($pic[$i])||isset($date[$i]))
                    {
                        if (empty($pic[$i])||empty($date[$i])) {
                            echo '<script type="text/javascript">';
                            echo 'alert("Pengisian data belum lengkap!");';
                            echo 'window.history.back();';
                            echo '</script>';
                            return false;
                        }else{
                            $data[$i]['updated_at']=$tanggal;
                            $data[$i]['status_email']="Not Yet";
                        }
                    }
                    if (isset($pic[$i])) {
                        $data[$i]['pic']=$pic[$i];
                    }
                    if (isset($date[$i])) {
                        $data[$i]['date_line']=$date[$i];
                    }
                    DB::table('audit')->where('id_audit', $id_audit)->update($data[$i]);
                }

        }else{
            return redirect('manage/')->with('alert_error', 'Tidak ada data yang di save!');
        }
        for ($i=0; $i < count($pic); $i++) { 
            return redirect('audit/manage/send');
        }
    }
    public function save_action(Request $request)
    {
        $image=$request->image2;
        $action=$request->action;
        $id_audit=$request->id_audit;
        $status="Done";
        $pic=$request->pic;
        $id = array_map('intval', $request->id);
        // $count_date=count(array_filter($date, function($x) { return !empty($x); }));
        $count=count($id);
        date_default_timezone_set('Asia/Jakarta');
        $tanggal=date("Y-m-d H:i:s");

        for($i=0;$i<$count;$i++)
        {
            $input[$i] = rand(111,999999).'.'.$image[$i]->extension();
        
            $destinationPath = public_path('/images/6s/result');
            $img = Image::make($image[$i]->path());
            $img->rotate(0);
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input[$i]);

           $data[$i]=[
                "updated_at" => $tanggal,
                "status" => $status
            ];

            if (isset($image[$i])) {
                $data[$i]['image2']=$input[$i];
            }

            if (isset($action[$i])) {
                $data[$i]['action']=$action[$i];
            }
        DB::table('audit')->where('id_audit', $id_audit)->update($data[$i]);
        }
        return redirect('/audit/action/'.$pic)->with('alert', 'Saved!');
    }
    public function update_action(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $tanggal=date("Y-m-d H:i:s");
        $old_image=$request->old_image;
        $id_audit=$request->id_audit;
        $old_image2=$request->old_image2;
        if (empty($request->area) && empty($request->description) && empty($request->image) && empty($request->image2)) {
            return redirect()->back()->with('alert_error', 'The input failed because the data is empty');
        }
        $data=['updated_at'=>$tanggal];
        if (isset($request->area)) {
            $data['area']=$request->area;
        }
        if (isset($request->description)) {
            $data['description']=$request->description;
        }
        if (isset($request->image2)) {
            //hapus image lama
                if($old_image2!="")
                {
                    $image_path2 = public_path().'/images/lean/6s/result/'.$old_image2;
                    if(isset($image_path2))
                    {
                        unlink($image_path2);
                    }
                }
            //save image baru
                $input2 = rand(111,999999).'.'.$request->image2->extension();
                $destinationPath = public_path('/images/6s/result');
                $img = Image::make($request->image2->path());
                $img->rotate(0);
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input2);
            $data['image2']=$input2;
        }
        DB::table('audit')->where('id_audit', $id_audit)->update($data);
        return redirect()->back()->with('alert', 'Saved!');
        // return redirect('/action6s_index/'.$pic)->with('alert', 'Saved!');
    }
    



    //action
    public function send()
    {
        $status="Done";
        date_default_timezone_set('Asia/Jakarta');
        $tanggal=date("Y-m-d");
        $record=DB::table('audit as a')
            ->select('a.pic','a.id','b.id_building','c.name as name_employees','c.email','c.nik')
            ->join('cell_info as b','a.id_cell','=','b.id_cell')
            ->leftJoin('employees as c','a.pic','=','c.nik')
            // ->join('area_building as d','b.id_departemen','c.id_departemen')
            ->where('a.status', '!=', "done")
            ->where('a.status_email', '!=', "done")
            ->where(DB::RAW('date(a.updated_at)'),$tanggal)
            ->groupBy('c.nik')
            ->get();
        foreach($record as $i => $val)
        {
            $pic[]=$val->pic;
            $id[]=$val->id;

            $data[$i]=[
                'updated_at'=> $tanggal
            ];

            if ($val->pic!="") {
                $data[$i]['status_email']=$status;
            }
            DB::table('audit')->where('id', $id[$i])->update($data[$i]);
        }
            try{
                foreach($record as $record)
                {
                    $email=$record->email;
                    Mail::send('/audit/content/email/Email',['pic'=>$record->name_employees,'nik'=>$record->nik],
                    function($record)use ($email){
                    $record->to($email)->subject('Temuan Audit 6s PT. Parkland World Indonesia 2');
                    $record->from(env('MAIL_USERNAME','lean_pwi2@gmail.com'),'Please Noted');
                    });
                }
            }catch (Exception $e){
                return response (['status' => false,'errors' => $e->getMessage()]);
            }
            return redirect('audit/manage_index')->with('alert', 'Saved!');
    }
    public function js_show_list_auditor(Request $request)
    {
        $no=0;
            if($request->ajax())
            {
                $dropdown_cell = '';
                $id = $request->get('id');
                    if($id != '')
                    {
                        $data=DB::table('auditor as a')
                            ->where('id_user',$id)
                            ->orderBy('name')
                            ->get();
                    }
                $total_row = $data->count();
                    if($total_row > 0)
                    {
                        $dropdown_cell='<option value=""><i>--------------</i></option>';
                        foreach($data as $row)
                        {
                            $dropdown_cell .='
                                <option value="'.$row->nik.'">'.$row->name.'</option>
                            ';
                        }
                    }else
                    {
                        $dropdown_cell = '
                            <option value="#">Data tidak ada!</option>
                        ';
                    }
                $data = array(
                'list_auditor'  => $dropdown_cell
                );

                echo json_encode($data);
            }
    }
    public function action($id)
    {
        $record=DB::table('audit as a')
                ->select('a.*','b.cell','c.nama','d.category','d.audit_point')
                ->Join('cell_info as b','a.id_cell','=','b.id_cell')
                ->Join('cell_area as c','a.id_area','=','c.id_area')
                ->Join('6s_list as d','a.id_list','=','d.id_list')
                ->where('pic',$id)
                ->where('status','!=','Done')
                ->orderBy('b.cell','ASC')
                ->get();
        $record_done=DB::table('audit as a')
                ->select('a.*','b.cell','c.nama','d.category','d.audit_point')
                ->Join('cell_info as b','a.id_cell','=','b.id_cell')
                ->Join('cell_area as c','a.id_area','=','c.id_area')
                ->Join('6s_list as d','a.id_list','=','d.id_list')
                ->where('pic',$id)
                ->where('status','=','Done')
                ->orderBy('b.cell','ASC')
                ->get();
        $record_employees=db::table('employees as a')
                ->select('a.name as name_employees','b.name as name_departemen')
                ->join('departemen as b','a.id_departemen','=','b.id_departemen')
                ->where('nik',$id)->get();
            foreach ($record_employees as $a) {
                $name_employees = $a->name_employees;
                $name_departemen = $a->name_departemen;
            }
        return view('audit.content.action',['record'=>$record,'modal'=>$record,'done'=>$record_done,'modal_done'=>$record_done,'departement'=>$id, 'name_employees'=>$name_employees,'name_departemen'=>$name_departemen]);
    }
    public function js_audit_action_show(Request $request)
    {
        $no=0;
            if($request->ajax())
            {
                $output = '';
                $query = $request->get('query');
                // $departemen = $request->get('departemen');
                $departemen = $request->departement;
                    if($query != '')
                    {
                        $data=DB::table('audit as a')
                            ->select('a.*','b.cell','c.nama','d.category','d.audit_point')
                            ->Join('cell_info as b','a.id_cell','=','b.id_cell')
                            ->Join('cell_area as c','a.id_area','=','c.id_area')
                            ->Join('6s_list as d','a.id_list','=','d.id_list')
                            ->where('pic',$departemen)
                            ->where('status','!=','Done')
                            ->where(function($a) use($query) {
                                $a->where('b.cell', 'like', '%'.$query.'%')
                                    ->orwhere('c.nama', 'like', '%'.$query.'%')
                                    ->orwhere('d.category', 'like', '%'.$query.'%');
                            })
                            ->orderBy('b.cell','ASC')
                            ->orderBy('c.nama','ASC')
                            ->groupBy('a.id_audit')
                            ->get();
                    }else
                    {
                        $data=DB::table('audit as a')
                            ->select('a.*','b.cell','c.nama','d.category','d.audit_point')
                            ->Join('cell_info as b','a.id_cell','=','b.id_cell')
                            ->Join('cell_area as c','a.id_area','=','c.id_area')
                            ->Join('6s_list as d','a.id_list','=','d.id_list')
                            ->where('pic',$departemen)
                            ->where('status','!=','Done')
                            ->orderBy('b.cell','ASC')
                            ->orderBy('c.nama','ASC')
                            ->groupBy('a.id_audit')
                            ->get();
                    }
                $total_row = $data->count();
                    if($total_row > 0)
                    {
                        foreach($data as $row)
                        {
                            $no++;
                            $terakhir = strtoTime($row->date_line);  
                            $sekarang = time(); // Waktu sekarang
                            $diff  = $terakhir - $sekarang;
                            if (floor($diff / (60 * 60 * 24))<0) {
                                $sisa='Anda Sudah Terlambat ' . floor($diff / (60 * 60 * 24)) . ' hari';
                            }else{
                                $sisa='Sisa Waktu Anda ' . floor($diff / (60 * 60 * 24)) . ' hari';
                            }
                            $hari=floor($diff / (60 * 60 * 24));
                            if ($hari<0) {
                                $color="bg-dark";
                            }elseif ($hari <=1) {
                                $color="bg-danger";
                            }elseif ($hari <=3) {
                                $color="bg-primary";
                            }elseif ($hari <=4) {
                                $color="bg-info";
                            }else{
                                $color="bg-success";
                            }
                            
                            if ($row->status == "Not Yet") {
                                $waktu="Sisa dateline: ".$sisa;
                                $action="upload";
                                $status="bg-danger";
                            }elseif ($row->status == "Done") {
                                $waktu="-";
                                $action="view";
                                $status="bg-success";
                            }else{
                                $status="bg-primary";
                            }
                                    $button='<td class="align-middle">
                                                <center>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal'.$action.$row->id.'" data-whatever="@mdo">+</button>
                                                </center>
                                            </td>
                                            ';
                            $output .= '
                                <tr style="font-size: 90%;">
                                    <td class="align-middle"><center>'.$no.'</center></td>
                                    <td class="align-middle"><center>'.$row->cell.'</center></td>
                                    <td class="align-middle"><center>'.$row->nama.'</center></td>
                                    <td class="align-middle">'.$row->category.'</td>
                                    <td class="align-middle"><center>'.$row->audit_point.'</center></td>
                                    <td class="align-middle"><center><img src="'.url('/images/6s/'.$row->image).'" height="150px" width="150px"/></center></td>
                                    <td class="align-middle"><center>'.$row->description.'</center></td>
                                    <td class="align-middle"><center>'.$row->pic.'</center></td>
                                    <td class="align-middle '.$color.'"><center>'.$sisa.'</center>
                                    <td class="align-middle '.$status.'"><center>'.$row->status.'</center></td>
                                    '.$button.'
                                </tr>
                            ';
                        }
                    }else
                    {
                        $output = '
                        <tr>
                            <td align="center" colspan="11">No Data Found</td>
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
    public function js_audit_action_show_done(Request $request)
    {
        $no=0;
            if($request->ajax())
            {
                $output = '';
                $query = $request->get('query');
                // $departemen = $request->get('departemen');
                $departemen = $request->departement;
                    if($query != '')
                    {
                        $data=DB::table('audit as a')
                            ->select('a.*','b.cell','c.nama','d.category','d.audit_point')
                            ->Join('cell_info as b','a.id_cell','=','b.id_cell')
                            ->Join('cell_area as c','a.id_area','=','c.id_area')
                            ->Join('6s_list as d','a.id_list','=','d.id_list')
                            ->where('a.pic',$departemen)
                            ->where('a.status','=','Done')
                            ->where(function($a) use($query) {
                                $a->where('b.cell', 'like', '%'.$query.'%')
                                    ->orwhere('c.nama', 'like', '%'.$query.'%');
                            })
                            ->where('status','=','Done')
                            ->orderBy('b.cell','ASC')
                            ->orderBy('c.nama','ASC')
                            ->groupBy('a.id_audit')
                            ->get();
                    }else
                    {
                        $data=DB::table('audit as a')
                            ->select('a.*','b.cell','c.nama','d.category','d.audit_point')
                            ->Join('cell_info as b','a.id_cell','=','b.id_cell')
                            ->Join('cell_area as c','a.id_area','=','c.id_area')
                            ->Join('6s_list as d','a.id_list','=','d.id_list')
                            ->where('a.pic',$departemen)
                            ->where('a.status','=','Done')
                            ->orderBy('b.cell','ASC')
                            ->groupBy('a.id_audit')
                            ->get();
                    }
                $total_row = $data->count();
                    if($total_row > 0)
                    {
                        foreach($data as $row)
                        {
                            $no++;
                            $button='<td style="vertical-align:middle; border: 1px solid black;">
                                        <center>
                                            <input type="button" class="btn btn-primary" onClick="ModalEdit(\'Edit'.$row->id.'\')" id="ModalEdit'.$row->id.'" value="Edit"></input>
                                        </center>
                                    </td>
                                    ';
                            $output .= '
                                <tr style="border: 1px solid black;">
                                    <td style="vertical-align:middle; border: 1px solid black;">'.$no.'</td>
                                    <td style="vertical-align:middle; border: 1px solid black;">'.$row->cell.'</td>
                                    <td style="vertical-align:middle; border: 1px solid black;">'.$row->description.'</td>
                                    <td style="vertical-align:middle; border: 1px solid black;">
                                        <center>
                                            <img  src="'.url('/images/6s/'.$row->image).'" height="150px" width="150px"/><br>
                                        </center>
                                    </td>
                                    <td style="vertical-align:middle; border: 1px solid black;">'.$row->action.'</td>
                                    <td style="vertical-align:middle; border: 1px solid black;">
                                        <center>
                                            <img  src="'.url('/images/6s/result/'.$row->image2).'" height="150px" width="150px"/>
                                        </center>
                                    </td>
                                    <td class="bg-green" style="vertical-align:middle; border: 1px solid black;">'.$row->status.'</td>
                                    <td style="vertical-align:middle; border: 1px solid black;">'.$row->pic.'</td>
                                    <td style="vertical-align:middle; border: 1px solid black;">'.$row->date_line.'</td>
                                    '.$button.'
                                </tr>
                            ';
                        }
                    }else
                    {
                        $output = '
                        <tr>
                            <td align="center" colspan="10">No Data Found</td>
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
    public function js_DeleteMultiple_manage(Request $request)
    {
        $val = $request->input('val');
        $data_hapus=array();
        foreach ($val as $id) {
            $text_hapus=DB::table('audit as a')
                    ->select('a.*')
                    ->where('a.id_audit', $id)->get();
            $data_hapus[]=$text_hapus;
            DB::table('audit')->where('id_audit', $id)->delete();
        }
        foreach($data_hapus as $key => $a)
        {
            foreach ($a as $b) {
                if($b->image!="notyet.png")
                {
                    $destination_path=public_path().'/images/6s/'.$b->image;
                    if(file_exists($destination_path))
                    {
                        unlink($destination_path);
                    }
                }
            }
        }
            $output = array(
            'success' => 'Data has been successfully deleted!',
            );

            return response()->json($output);   
    }
    public function js_form_auditor(Request $request)
    {
        $no=0;
            if($request->ajax())
            {
                $output = '';
                $query = $request->get('query');
                $team = $request->get('team');
                // $departemen = $request->get('departemen');
                    if($query != '')
                    {
                        $data=DB::table('auditor')
                            ->select('*')
                            ->where('name',$query)
                            ->where('id_user',$team)
                            ->orderBy('name')
                            ->get();
                    }else
                    {
                        $data=DB::table('auditor')
                            ->select('*')
                            ->where('id_user',$team)
                            ->orderBy('name')
                            ->get();
                    }
                $total_row = $data->count();
                    if($total_row > 0)
                    {
                        foreach($data as $row)
                        {
                            $no++;
                            $button='<td style="vertical-align:middle; border: 1px solid black;">
                                        <center>
                                            <input type="button" class="btn btn-primary" onClick="ModalEdit(\'Edit'.$row->nik.'\')" id="ModalEdit'.$row->nik.'" value="Edit"></input>
                                        </center>
                                    </td>
                                    ';
                            $output .= '
                                <tr style="border: 1px solid black;">
                                    <td style="vertical-align:middle; border: 1px solid black;">'.$no.'</td>
                                    <td style="vertical-align:middle; border: 1px solid black;">
                                        <center>
                                            <input type="checkbox" id="check'.$row->nik.'" name="select[]" value="'.$row->nik.'">
                                        </center>
                                    </td>
                                    <td style="vertical-align:middle; border: 1px solid black;">'.$row->nik.'</td>
                                    <td style="vertical-align:middle; border: 1px solid black;">'.$row->name.'</td>
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
                'table_data'  => $output
                );

                echo json_encode($data);
            }
    }
    public function js_form_register()
    {
        $team=db::table('users')->where('role_id','7')->get();
        $departemen=db::table('departemen')->orderBy('name')->get();
        $dropdown_departemen="";
        $dropdown_team="";
        foreach ($team as $a)
        {
            $dropdown_team .='
                            <option value="'.$a->id.'">'.$a->name.'</option>
                        ';
        }
        foreach($departemen as $a)
        {
            $dropdown_departemen .='
                            <option value="'.$a->id_departemen.'">'.$a->name.'</option>
                        ';
        }
        $data = array(
            'dropdown_team'  => $dropdown_team,
            'dropdown_departemen'  => $dropdown_departemen
            );

            echo json_encode($data);
    }
    public function js_save_auditor(Request $request)
    {
        $rules = array(
            "departemen" => "required",
            "nik" => "required",
            "nama" => "required",
            "team"=>"required",
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $departemen=$request->departemen;
        $nik=$request->nik;
        $name=$request->nama;
        $team=$request->team;

        $random=rand(1,99999);
        $data=[
            'id_departemen'=>$departemen,
            'nik'=>$nik,
            'name'=>$name,
            'id_user'=>$team,
        ];
        
        // dd($data);
        DB::table('auditor')->insert($data);
        $output = array(
            'success' => 'Data uploaded successfully',
            );

            return response()->json($output);   
    }
    public function js_DeleteMultiple_auditor(Request $request)
    {
        $val = $request->input('val');
        $data_hapus=array();
        foreach ($val as $id) {
            DB::table('auditor')->where('nik', $id)->delete();
        }
            $output = array(
            'success' => 'Data has been successfully deleted!',
            );

            return response()->json($output);   
    }
    public function cetak_pdf(Request $request)
    {
        $month=$request->month;
        $building=$request->building;
        $name_building=$building;
        $team=$request->team;
        $id_bulding=db::table('area_building')->select('id_building')->where('name',$building)->get();
        foreach($id_bulding as $a)
        {
            $idBuilding=$a->id_building;
        }
            $record=DB::table('audit as a')
                ->select('a.*','b.cell','c.name as name_employees','d.category')
                ->Join('cell_info as b','a.id_cell','=','b.id_cell')
                ->Join('employees as c','a.pic','=','c.nik')
                ->leftJoin('6s_list as d','a.id_list','=','d.id_list')
                ->groupby('a.image')
                ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m')"),$month)
                ->where('b.id_building',$idBuilding)
                ->where('a.team',$team)
                ->orderBy('a.created_at')
                ->get();
                if(empty($record->first()))
                {
                    $record=DB::table('audit as a')
                        ->select('a.*','b.cell',db::raw("'-' as name_employees"),'d.category')
                        ->Join('cell_info as b','a.id_cell','=','b.id_cell')
                        ->leftJoin('6s_list as d','a.id_list','=','d.id_list')
                        ->groupby('a.image')
                        ->where(db::raw("DATE_FORMAT(a.created_at, '%Y-%m')"),$month)
                        ->where('b.id_building',$idBuilding)
                        ->where('a.team',$team)
                        ->orderBy('a.created_at')
                        ->get();
                }

            $building=DB::table('cell_info')->take(1)->get();
            $done=DB::table('audit')
                ->where(db::raw("DATE_FORMAT(created_at, '%Y-%m')"),$month)
                ->where('status','=','Done')
                ->get();
                // ->where('id_cell',$cell)->get();
            $date=DB::table('audit')
                ->where(db::raw("DATE_FORMAT(created_at, '%Y-%m')"),$month)
                ->orderBy('created_at', 'ASC')
                ->take(1)->get();
            $count_record=count($record);
                $count_done=count($done);

            $pdf = PDF::loadview('audit.content.myPDF',['date'=>$date,
                                                        'record'=>$record,
                                                                'count_done'=>$count_done,
                                                                'count_record'=>$count_record,
                                                                    'building'=>$building])->setPaper('a4');
        return $pdf->download('6s_audit-'.$month.'-'.$name_building.'-'.rand(1,100).'.pdf');
    }
    
    
}
