<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SequenceInspection;
use DB;
use Redirect;

class inspectionController extends Controller
{
    public function seq_inspection()
    {
        return view('inspection.content.sequence_inspection');
    }
    public function main()
    {
        return view('inspection.content.main');
    }
    public function save_count(Request $request)
    {
        $area = "I Tes Bed";
        $id = $request->id;
        $cek = SequenceInspection::where('id_proses',$id)->where('area',$area)->Get();
        if (count($cek)==0) {
            //insert
            $process = SequenceInspection::create(array(
                'id_proses' => $id,
                'area'=>$area,
                'sukses'=>1
                ));
            $alert ='Insert Sukses';
        }else{
            $process = SequenceInspection::where(['id_proses'=>$id,'area'=>$area])->increment('sukses',1);
            $alert ='Update Sukses';
        }
        $get = SequenceInspection::select('sukses','err')->where('id_proses',$id)->where('area',$area)->get();
        foreach ($get as $a ) {
            $sukses_last = $a->sukses;
            $error_last = $a->err;
        }
        $data = array(
            'get'=>$get,
            'alert'=>$alert,
            'sukses'=>$sukses_last,
            'error'=>$error_last
        );
        return response()->json($data);
    }
    public function save_self(Request $request)
    {
        $id = $request->id;
        $area = "I Tes Bed";

        $process = SequenceInspection::where(['id_proses'=>$id,'area'=>$area])->increment('err',1);
        $process2 = SequenceInspection::where(['id_proses'=>$id,'area'=>$area])->decrement('sukses');
        if ($process>0 && $process2>0) {
            $alert ='Update Sukses';
            $get = SequenceInspection::select('sukses','err')->where('id_proses',$id)->where('area',$area)->get();
            foreach ($get as $a ) {
                $sukses_last = $a->sukses;
                $error_last = $a->err;
            }
            $data = array(
                'alert'=>$alert,
                'sukses'=>$sukses_last,
                'error'=>$error_last,
            );
            return response()->json($data);
        }else{
            $data = array(
                'alert'=>'error',
            );
            return response()->json($data);
        }
    }
    public function save_seq(Request $request)
    {           
        $id = $request->id;
        $area = "I Tes Bed";

        $process = SequenceInspection::where(['id_proses'=>$id-1,'area'=>$area])->increment('err',1);
        $process2 = SequenceInspection::where(['id_proses'=>$id-1,'area'=>$area])->decrement('sukses');
        if ($process>0 && $process2>0) {
            $alert ='Update Sukses';
            $get = SequenceInspection::select('sukses','err')->where('id_proses',$id-1)->where('area',$area)->get();
            foreach ($get as $a ) {
                $sukses_last = $a->sukses;
                $error_last = $a->err;
            }
            $data = array(
                'alert'=>$alert,
                'sukses'=>$sukses_last,
                'error'=>$error_last,
            );
            return response()->json($data);
        }else{
            $data = array(
                'alert'=>'error',
            );
            return response()->json($data);
        }
    }
    public function reload(Request $request)
    {
        $get = SequenceInspection::get();
            foreach ($get as $a ) {
                $id[]=$a->id_proses;
                $sukses_last[] = $a->sukses;
                $error_last[] = $a->err;
            }
            $data = array(
                'get'=>$get,
                'id'=>$id,
                'sukses'=>$sukses_last,
                'error'=>$error_last,
            );
            return response()->json($data);
    }
    public function belajar(Request $request)
    {
        $tes ="aa";
        return $this->parseBelajar($tes);
    }
    function parseBelajar($id)
    {
        dd($id);

    }
}
