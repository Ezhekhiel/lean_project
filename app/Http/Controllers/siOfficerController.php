<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\siperWeekImport;
use Session;

class siOfficerController extends Controller
{
    public function index()
    {
        $dataSi = DB::table('si_per_week')->select('exp',db::raw('DATE_FORMAT(exp, "%M - %Y") as month'))->groupBy('exp')->get();
        foreach($dataSi as $a)
        {
            $exp[$a->month]=$a->month;
        }
        if (count($dataSi)==0) {
            $exp=[];
        }
                return view('siOfficer.content.index',['exp'=>$exp]);
    }
    public function searchEXP(Request $request)
    {
        $data = $request->data;
        $dataSi = DB::table('si_per_week')->select('exp')->where(db::raw('DATE_FORMAT(exp, "%M - %Y")'),$data)->groupBy('exp')->get();
        $option = '';
        foreach ($dataSi as $key => $value) {
            $option.='
                        <option value="'.$value->exp.'">'.$value->exp.'</option>
                    ';
        }
        $data = array(
            'option'  => $option,
        );
        echo json_encode($data);
    }
    public function dashboard()
    {
        $dataSi = DB::table('si_per_week')->select('*',db::raw('DATE_FORMAT(exp, "%M - %Y") as bulan'))->orderBy('created_at')->groupBy('week','bulan')->get();
        foreach($dataSi as $a)
        {
            $dataWeek[$a->week][]=$a->bulan;
        }
        if(empty($dataWeek))
        {
            $dataWeek=[];
        }
        return view('siOfficer.content.dashboard',['dataWeek'=>$dataWeek]);
    }
    public function upload(Request $request)
    {
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file_si',$nama_file);
 
		// import data
		Excel::import(new siperWeekImport, public_path('/file_si/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data SI Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/SI_');
    }
    public function colorSet($po,$dup,$stat)
    {
        if($dup==2)
        {
            if($stat == "Passed")
            {
                $color="#f2f21d ";
                $font="#000000";
            }else if($stat == "Reject")
            {
                $color="#dc3545 ";
                $font="#ffffff";
            }else if($stat == "On Progress")
            {
                $color="#f2f21d ";
                $font="#000000";
            }else{
                $color="#000000";
                $font="#ffffff";
            }
        }else{
            if($stat == "Passed")
            {
                $color="#007bff";
                $font="#ffffff";
            }else if($stat == "Reject")
            {
                $color="#dc3545";
                $font="#ffffff";
            }else if($stat == "On Progress")
            {
                $color="#f2f21d";//biru
                $font="#000000";
            }else{
                $color="#000000";
                $font="#ffffff";
            }
        }
        $data = [
                    'stat'=>$stat,
                    'color'=>$color,
                    'font'=>$font
                ];
        return $data;
    }
    public function searchData(Request $request)
    {
        $data = $request->data;
        $table = '';
        $color = '';
        $no = 0;
        $dataSearch = db::table('si_per_week')->where('exp',$data)->get();

        foreach($dataSearch as $a)
        {
            $duplicatePO[]= DB::table('si_per_week as a')
                        ->select('a.po')
                        ->where('po',$a->po)->groupBy('a.po')->having(DB::raw('count(*)'),'>',1)->get();
         
            if (count($duplicatePO)==0) {
                $duplicate = 1;
            }else{
                foreach($duplicatePO as $key => $b)
                {
                    $duplicateList[]=$b;
                }
                for ($i=0; $i < count($duplicateList) ; $i++) { 
                    if ($a->po==$duplicateList[$i]) {
                        $duplicate = 2;
                    }else{
                        $duplicate = 1;
                    }
                }
            }
                $color = $this->colorSet($a->po,$duplicate,$a->status);
            $percentage = (($a->quantity-$a->balance)/$a->quantity)*100;
            $percentage = number_format($percentage);
            $table .='<tr>
                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->exp.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->cell.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->po.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->market.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->style.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->width.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->quantity.'</td>
                        <td style="vertical-align:middle;text-align:center" onclick="tambahModal(\''.$a->id.'\',\''.$a->po.'\',\''.$a->balance.'\')">'.$a->balance.'</td>
                        <td style="vertical-align:middle;text-align:center" style="width:5%"><i class="fa-solid fa-circle" style="color:'.$color['color'].'"></i></td>
                        <td style="vertical-align:middle;text-align:center" style="width:10%">'.$a->status.'</td>
                        <td style="vertical-align:middle;text-align:center" sty>
                            <div class="progress" style="height:30px">
                                <div class="progress-bar" role="progressbar" style="color:'.$color['font'].';background: '.$color['color'].';width: '.$percentage.'%;" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100">'.$percentage.'%</div>
                            </div>
                        </td>
                    </tr>';
        }
        $data = array(
            'table'  => $table,
            'duplicateList'  => $duplicateList,
            'dataSearch'  => $dataSearch,
        );
        echo json_encode($data);
    }
    public function searchAll(Request $request)
    {
        $bulan = $request->bulan;
        $data_search = $request->data_search;
        $table = '';
        $color = '';
        $no = 0;
        if($data_search==""){
            $dataSearch = db::table('si_per_week')->where(db::raw('DATE_FORMAT(exp, "%M - %Y")'),$bulan)
                    ->get();
        }else{
            $dataSearch = db::table('si_per_week')->where(db::raw('DATE_FORMAT(exp, "%M - %Y")'),$bulan)
                    ->where(function($a) use($data_search){
                        $a->orwhere('cell', 'like', '%'.$data_search.'%')
                        ->orwhere('po', 'like', '%'.$data_search.'%')
                        ->orwhere('market', 'like', '%'.$data_search.'%')
                        ->orwhere('style', 'like', '%'.$data_search.'%')
                        ->orwhere('customer', 'like', '%'.$data_search.'%')
                        ->orwhere('order_no', 'like', '%'.$data_search.'%')
                        ->orwhere('width', 'like', '%'.$data_search.'%')
                        ->orwhere('status', 'like', '%'.$data_search.'%');
                    })
                    ->orderBy('id')
                    ->get();
        }
        foreach($dataSearch as $a)
        {
            $duplicatePO = DB::table('si_per_week as a')
                        ->select('a.po')
                        ->where('po',$a->po)->groupBy('a.po')->having(DB::raw('count(*)'),'>',1)->get();
                foreach($duplicatePO as $b)
                {
                    $duplicateList[]=$b->po;
                }
                for ($i=0; $i < count($duplicateList) ; $i++) { 
                    if ($a->po==$duplicateList[$i]) {
                        $color = $this->colorSet($a->po,$duplicateList[$i],$a->status);
                    }
                }
            $no++;
            $table .='<tr style="background-color:'.$color.'">
                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->cell.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->po.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->market.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->style.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->width.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->quantity.'</td>
                        <td style="vertical-align:middle;text-align:center" onclick="tambahModal(\''.$a->id.'\',\''.$a->po.'\',\''.$a->balance.'\')">'.$a->balance.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->exp.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->status.'</td>
                    </tr>';
        }
        $data = array(
            'table'  => $table,
            'duplicateList'  => $duplicateList,
            'dataSearch'  => $dataSearch,
        );
        echo json_encode($data);
    }
    public function updateInspection(Request $request)
    {
        $id = $request->modal_id;
        $qty = $request->quantityInspection;
        $status = $request->statusInspection;
        $week = $request->modal_week;
        $bulan = $request->modal_bulan;
        $quantity = 0;
        $ambilQuantity = DB::table('si_per_week')->where('id',$id)->get();

        foreach($ambilQuantity as $a)
        {
            $quantity = $a->quantity;
            $balance = $a->balance;
        }
        $balanceResult = $balance-$qty;
            DB::table('si_per_week')
                    ->where('id',$id)
                    ->update([
                        'balance' => $balanceResult,
                        'status' => $status,
                    ]);
            //==========tampil data ulang
                $table = '';
                $color = '';
                $no = 0;
                $dataSearch = db::table('si_per_week')->where('week',$week)->where(db::raw('DATE_FORMAT(exp, "%M - %Y")'),$bulan)->get();

                $duplicatePO = DB::table('si_per_week as a')
                                ->select('a.po')
                                ->where('a.week',$week)->where(db::raw('DATE_FORMAT(a.exp, "%M - %Y")'),$bulan)->groupBy('a.po')->having(DB::raw('count(*)'),'>',1)->get();
                                
                foreach($duplicatePO as $a)
                {
                    $duplicateList[]=$a->po;
                }
                foreach($dataSearch as $a)
                {
                    for ($i=0; $i < count($duplicateList) ; $i++) { 
                        $color = $this->colorSet($a->po,$duplicateList[$i],$a->status);
                    }
                    
                    $no++;
                    $table .='<tr style="background-color:'.$color.';color:'.$font.'">
                                <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$a->cell.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$a->po.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$a->market.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$a->style.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$a->width.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$a->quantity.'</td>
                                <td style="vertical-align:middle;text-align:center" onclick="tambahModal(\''.$a->id.'\',\''.$a->po.'\',\''.$a->balance.'\')">'.$a->balance.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$a->exp.'</td>
                                <td style="vertical-align:middle;text-align:center">'.$a->status.'</td>
                            </tr>';
                }
        $output = array(
            'table'=>$table,
            'success'=>"Update Data Successfull!",
        );
        return response()->json($output); 
    }
}
