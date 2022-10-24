<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\LeanMediaModel;

class LeanMediaController extends Controller
{
    public function index()
    {
        $location=db::table('cell_area_sop')->where('id','!=','19')->get();
        return view('leanmedia.content.index',['location'=>$location]);
    }
    function action_getDatasop(Request $request)
    {
        $no=0;
        if($request->ajax())
        {
             $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data=db::table('leanmedia as a')
                            ->select('a.*','b.location')
                            ->join('cell_area_sop as b','a.id_area','=','b.id')
                            ->where('a.type','sop')
                            ->where(function($a) use($query){
                                $a->orwhere('b.location', 'like', '%'.$query.'%')
                                ->orwhere('a.model_sepatu', 'like', '%'.$query.'%');
                            })
                            
                            ->where('a.brand','New Balance')
                            ->groupBy('a.cover')
                            ->get();
            }else
            {
                $data=db::table('leanmedia as a')
                            ->select('a.*','b.location')
                            ->join('cell_area_sop as b','a.id_area','=','b.id')
                            ->where('a.type','sop')
                            ->where('a.brand','New Balance')
                            ->groupBy('a.cover')
                            ->get();
            }
               
            $total_row = $data->count();
            if($total_row > 0)
                {
                    foreach($data as $row)
                    {
                        $no++;
                        $output .= '
                                    <tr>
                                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                                        <td style="vertical-align:middle;text-align:center">'.$row->location.'</td>
                                        <td style="vertical-align:middle;text-align:center">'.$row->model_sepatu.'</td>
                                        <td style="vertical-align:middle;text-align:center">
                                            <a>
                                                <img src="'.url('/images/lean/leanmedia/sop/cover/'.$row->cover).'" height="200px" width="300px"/></center>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-block" data-toggle="modal" onclick="FunctionDelete(\''.$row->model_sepatu.'\')">Delete</button><br>
                                            <button class="btn btn-primary btn-block" data-toggle="modal" onclick="FunctionModal(\''.$row->model_sepatu.'\',\''.$row->location.'\')">Update</button>
                                        </td>
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
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
                );

            echo json_encode($data);
            }
    }
    function save(Request $request)
    {
        $request->validate([
            'model'=>'required',
            'location'=>'required',
            'brand'=>'required',
            'count'=>'required',
        ]);
        $model=$request->model;
        $brand=$request->brand;
        $location=$request->location;
        $count=$request->count;
        if ($location == 19) 
        {
            // input image cover to file
                $destination_cover=public_path('/images/lean/leanmedia/oib/cover/');
                $image_ext_cover=$cover->getClientOriginalExtension();
                $image_resize_cover = Image::make($cover->getRealPath());
                $image_resize_cover->resize(500, 500);
                $new_image_name_cover=$model."-Image Cover-".rand(1111,999999).".png";
                $cover->move($destination_cover,$new_image_name_cover,$image_resize_cover);
            for ($i=1;$i<=$count;$i++)
            {
                $data[$i]=[
                    'type'=>'OIB',
                    'id_area'=>$location,
                    'brand'=>$brand,
                    'model_sepatu'=>$model,
                    'cover'=>$new_image_name_cover,
                    'image'=>$model."-OIB (".$i.").png"
                ];
            }
        }else{
            $no_rand=rand(1111,999999);
            for ($i=1;$i<=$count;$i++)
            {
                $data[$i]=[
                    'type'=>'SOP',
                    'id_area'=>$location,
                    'brand'=>$brand,
                    'model_sepatu'=>$model,
                    'cover'=>$model."-Image Cover-".$no_rand.".png",
                    'image'=>$location.'-'.$model."-SOP (".$i.").png"
                ];
            }
        }
        
        
        $insert=LeanMediaModel::insert($data);
         if (!$insert) {
            return redirect()->back()->with('alert_error','Data Failed to Save!');
        }else{
            return redirect()->back()->with('alert_save','Save Data Successful!');
        }
    }
    //sop
        public function sop($id)
        {
            $cover=db::table('leanmedia as a')
                    ->select('a.*','b.location')
                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                    ->where('a.type','sop')
                    ->where('b.location',$id)
                    ->where('a.brand','New Balance')
                    ->groupBy('a.cover')
                    ->get();
            $navbar=db::table('leanmedia as a')
                    ->select('a.*','b.location')
                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                    ->where('a.type','sop')
                    ->where('b.location',$id)
                    ->where('a.brand','New Balance')
                    ->groupBy('a.type')
                    ->get();
            $cek=db::table('leanmedia as a')
                    ->select('a.*','b.location')
                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                    ->where('a.type','sop')
                    ->where('b.location',$id)
                    ->where('a.brand','New Balance')
                    ->first();
            $list_video=db::table('leanmedia as a')
                    ->select('a.model_sepatu')
                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                    ->where('a.video','!=','-')
                    ->where('a.type','sop')
                    ->where('b.location',$id)
                    ->where('a.brand','New Balance')
                    ->groupBy('a.model_sepatu')
                    ->get();
            // if($cover==null)
            if($cek===NULL)
            {
                return view('leanmedia.content.New Balance.sop_empty',['navbar'=>$navbar]);
            }else {
                return view('leanmedia.content.New Balance.sop_index',['cover'=>$cover,'navbar'=>$navbar,'location'=>$id,'list_video'=>$list_video]);
            }
        }
        function action_sop(Request $request)
        {
                $no=0;
                if($request->ajax())
                {
                    $output = '';
                    $query = $request->get('query');
                    $location = $request->get('location');
                    if($query != '')
                    {
                            $data=db::table('leanmedia as a')
                                ->select('a.*','b.location')
                                ->join('cell_area_sop as b','a.id_area','=','b.id')
                                ->where('a.type','sop')
                                ->where('b.location',$location)
                                ->where('model_sepatu', 'like', '%'.$query.'%')
                                ->where('a.brand','New Balance')
                                ->groupBy('a.cover')
                                ->get();
                    }
                    else
                    {
                            $data=db::table('leanmedia as a')
                                    ->select('a.*','b.location')
                                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                                    ->where('a.type','sop')
                                    ->where('b.location',$location)
                                    ->where('a.brand','New Balance')
                                    ->groupBy('a.cover')
                                    ->get();
                                    }
                $total_row = $data->count();
                if($total_row > 0)
                {
                    foreach($data as $row)
                    {
                        $destination_path_video = public_path('/video/lean/leanmedia/sop/'.$row->model_sepatu.'/'.$row->video);
                        if(file_exists($destination_path_video))
                        {
                            $output .= '
                                    <div class="card col-sm-6 col-md-6 col-lg-3 col-xl-3 item" style="border: 1px solid;padding: 10px;box-shadow: 5px 10px 18px red;">
                                        <div class="card-head">
                                            <center><h3 class="card-text">'.$row->model_sepatu.'</h3></center>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#sop_modal'.$row->leanmedia_id.'" class="btn btn-outline-white py-2 px-4">
                                            <img src="'.url('images/lean/leanmedia/sop/cover/'.$row->cover).'" alt="IMage" class="img-fluid">
                                        </a>
                                    </div>
                                ';
                        }else{
                            $output .= '
                                    <div class="card col-sm-6 col-md-6 col-lg-3 col-xl-3 item">
                                        <div class="card-head">
                                            <center><h3 class="card-text">'.$row->model_sepatu.'</h3></center>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#sop_modal'.$row->leanmedia_id.'" class="btn btn-outline-white py-2 px-4">
                                            <img src="'.url('images/lean/leanmedia/sop/cover/'.$row->cover).'" alt="IMage" class="img-fluid">
                                        </a>
                                    </div>
                                ';
                        }
                    }
                }
                else
                {
                    $output = '
                                <div class="card col-sm-12 col-md-12 col-lg-12 col-xl-12 item">
                                    <div class="alert alert-danger">
                                        <center><h2>Data tidak ada!</h2></center>
                                    </div>
                                </div>
                                ';
                }
                    $data = array(
                    'table_data'  => $output,
                    'total_data'  => $total_row
                    );
                echo json_encode($data);
                }
        }
        public function make_sop()
        {
            $data = DB::table('leanmedia')->where('model_sepatu','FLASH V4')->get();
            return view("leanmedia.content.make_sop",['data'=>$data]);
        }
        function search_image($id)
        {
            $cari_model=db::table('leanmedia as a')
                    ->select('a.*','b.location')
                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                    ->where('a.leanmedia_id',$id)
                    ->where('a.type','sop')
                    ->get();
                    foreach($cari_model as $a)
                    {
                        $model=$a->model_sepatu;
                        $location=$a->id_area;
                    }
            $data=db::table('leanmedia as a')
                    ->select('a.*','b.location')
                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                    ->where('a.model_sepatu',$model)
                    ->where('a.id_area',$location)
                    ->where('a.type','sop')
                    ->get();
            return view('leanmedia.content.search_image',['data'=>$data,'location'=>$location,'model'=>$model]);
        }
        function search_swcs($id)
        {
            $cari_model=db::table('leanmedia as a')
                    ->select('a.*','b.location')
                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                    ->where('a.swcs',$id)
                    ->where('a.type','sop')
                    ->get();
                    foreach($cari_model as $a)
                    {
                        $model=$a->model_sepatu;
                        $location=$a->id_area;
                    }
            $navbar=db::table('leanmedia as a')
                    ->select('a.*','b.location')
                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                    ->where('a.model_sepatu',$model)
                    ->where('a.type','sop')
                    ->groupBy('type')
                    ->get();
            $data=db::table('leanmedia_swcs as a')
                    ->select('c.process','b.model_sepatu','c.image')
                    ->join('leanmedia as b','a.id_swcs','=','b.swcs')
                    ->join('ied_process as c','a.id_process','=','c.id_process')
                    ->where('a.id_swcs',$id)
                    ->GroupBy('c.image')
                    ->get();
            return view('leanmedia.content.search_swcs',['navbar'=>$navbar,'data'=>$data,'location'=>$location]);
        }
        function search_video($id)
        {
            $cari_model=db::table('leanmedia as a')
                    ->select('a.*','b.location')
                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                    ->where('a.model_sepatu',$id)
                    ->where('a.type','sop')
                    ->get();
                    foreach($cari_model as $a)
                    {
                        $model=$a->model_sepatu;
                        $location=$a->id_area;
                    }
            $navbar=db::table('leanmedia as a')
                    ->select('a.*','b.location')
                    ->join('cell_area_sop as b','a.id_area','=','b.id')
                    ->where('a.model_sepatu',$model)
                    ->where('a.type','sop')
                    ->groupBy('type')
                    ->get();
            $data=db::table('leanmedia as a')
                    ->where('a.model_sepatu',$id)
                    ->GroupBy('video')
                    ->get();
                    // dd($data);
                return view('leanmedia.content.search_video',['navbar'=>$navbar,'data'=>$data]);
        }
        function action_modal_sop(Request $request)
        {
            $no=0;
            if($request->ajax())
            {
                 $output = '';
                $model = $request->get('model');
                $location = $request->get('location');
                    $data=db::table('leanmedia as a')
                                ->select('a.*','b.location')
                                ->join('cell_area_sop as b','a.id_area','=','b.id')
                                ->where('a.type','sop')
                                ->where('b.location', 'like', '%'.$location.'%')
                                ->where('a.model_sepatu', 'like', '%'.$model.'%')
                                ->where('a.brand','New Balance')
                                ->get();
                   
                $total_row = $data->count();
                if($total_row > 0)
                    {
                        foreach($data as $row)
                        {
                            $no++;
                             
                            $output .= '
                                        <tr>
                                            <td style="vertical-align:middle;text-align:center">
                                                <div class="card-body">
                                                    <div class="float-right">
                                                        <span style="font-size: 2em; color: Dodgerblue;" onclick="modalUpdate(\''.$row->leanmedia_id.'\',\''.$row->model_sepatu.'\',\''.$row->proses.'\')">
                                                            <i class="far fa-edit"></i>
                                                        </span>
                                                        <span style="font-size: 2em; color: Tomato;" onclick="FunctionDelete2(\''.$row->leanmedia_id.'\',\''.$row->model_sepatu.'\')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>  
                                                    <img src="'.url('/images/lean/leanmedia/sop/image/'.$row->model_sepatu.'/'.$row->image).'" height="600px" width="850px"/></center>
                                                <div class="card-footer">
                                                    <p style="font-weight: bold;">'.$no.'/'.$total_row.'</p>
                                                </div>
                                            </td>
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
                    $data = array(
                    'table_data'  => $output,
                    'total_data'  => $total_row,
                    );
                echo json_encode($data);
                }
        }
        function action_model_addData(Request $request)
            {
                $no=0;
                if($request->ajax())
                {
                    $id_area=$request->id_area;
                    $model=$request->model;
                    $model_swcs = '';
                    $model_sop = '';
                    $model = $request->get('model');
                        $data_swcs = db::table('ied_process')->where('model','!=','-')->groupBy('model')->get();
                        $data_leanmedia=db::table('leanmedia')->where('id_area','20')->groupBy('model_sepatu')->get();
                    foreach($data_swcs as $a)
                    {
                        $model_swcs .='<option value="'.$a->model.'">';
                    }
                    foreach($data_leanmedia as $a)
                    {
                        $model_sop .='<option value="'.$a->model_sepatu.'">';
                    }
                    $view_swcs ='<td style="vertical-align:middle;text-align:center" colspan="2">Select Model First!</td>';
                    $data = array(
                        'model_swcs'  => $model_swcs,
                        'view_swcs'  => $view_swcs,
                        'model' => $model,
                        'model_sop' => $model_sop
                    );

                    echo json_encode($data);
                    }
            }
    // OIB
    public function oib()
    {
        $cover=db::table('leanmedia as a')
                ->select('a.*','b.location')
                ->join('cell_area_sop as b','a.id_area','=','b.id')
                ->where('a.type','oib')
                ->where('a.brand','New Balance')
                ->groupBy('a.cover')
                ->get();
        $navbar=db::table('leanmedia as a')
                ->select('a.*','b.location')
                ->join('cell_area_sop as b','a.id_area','=','b.id')
                ->where('a.type','oib')
                ->where('a.brand','New Balance')
                ->groupBy('a.type')
                ->get();
        $cek=db::table('leanmedia as a')
                ->select('a.*','b.location')
                ->join('cell_area_sop as b','a.id_area','=','b.id')
                ->where('a.type','oib')
                ->where('a.brand','New Balance')
                ->first();
        // if($cover==null)
        if($cek===NULL)
        {
            return view('leanmedia.content.New Balance.oib_empty',['navbar'=>$navbar]);
        }else {
            return view('leanmedia.content.New Balance.oib_index',['cover'=>$cover,'navbar'=>$navbar]);
        }
    }
    function action_oib(Request $request)
    {
        $no=0;
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                    $data=db::table('leanmedia as a')
                        ->select('a.*','b.location')
                        ->join('cell_area_sop as b','a.id_area','=','b.id')
                        ->where('a.type','oib')
                        ->where('model_sepatu', 'like', '%'.$query.'%')
                        ->where('a.brand','New Balance')
                        ->groupBy('a.cover')
                        ->get();
            }
            else
            {
                $data=db::table('leanmedia as a')
                        ->select('a.*')
                        ->where('a.type','oib')
                        ->where('a.brand','New Balance')
                        ->groupBy('a.cover')
                        ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                                <div class="card col-sm-3 col-md-3 col-lg-3 col-xl-3 item">
                                    <a href="#" data-toggle="modal" data-target="#oib_modal'.$row->leanmedia_id.'" class="btn btn-outline-white py-2 px-4">
                                        <img src="'.url('images/lean/leanmedia/oib/cover/'.$row->cover).'" alt="IMage" class="img-fluid">
                                    </a>
                                    <div class="card-body">
                                        <center><h2 class="card-text">'.$row->model_sepatu.'</h2></center>
                                    </div>
                                </div>
                            ';
                }
            }
            else
            {
                $output = '
                            <div class="card col-sm-12 col-md-12 col-lg-12 col-xl-12 item">
                                <div class="alert alert-danger">
                                    <center><h2>Data tidak ada!</h2></center>
                                </div>
                            </div>
                            ';
            }
            $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
    function action_getDataoib(Request $request)
    {
        $no=0;
        if($request->ajax())
        {
             $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data=db::table('leanmedia')
                ->where('type','OIB')
                ->where('brand','New Balance')
                ->where('model_sepatu', 'like', '%'.$query.'%')
                ->groupBy('model_sepatu')
                ->get();
            }else
            {
                $data=db::table('leanmedia as a')
                        ->where('type','OIB')
                        ->where('brand','New Balance')
                        ->groupBy('model_sepatu')
                        ->get();
            }
               
            $total_row = $data->count();
            if($total_row > 0)
                {
                    foreach($data as $row)
                    {
                        $no++;
                        $output .= '
                                    <tr>
                                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                                        <td style="vertical-align:middle;text-align:center">'.$row->model_sepatu.'</td>
                                        <td style="vertical-align:middle;text-align:center">
                                            <a>
                                                <img src="'.url('/images/lean/leanmedia/oib/cover/'.$row->cover).'" height="200px" width="300px"/></center>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-block" data-toggle="modal" onclick="FunctionDelete(\''.$row->model_sepatu.'\')">Delete</button><br>
                                            <button class="btn btn-primary btn-block" data-toggle="modal" onclick="FunctionModal(\''.$row->model_sepatu.'\')">Update</button>
                                        </td>
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
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
                );

            echo json_encode($data);
            }
    }
    function action_modal_oib(Request $request)
    {
        $no=0;
        if($request->ajax())
        {
             $output = '';
            $model = $request->get('model');
                $data=db::table('leanmedia')
                        ->where('type','OIB')
                        ->where('model_sepatu',$model)
                        ->where('brand','New Balance')
                        ->get();
               
            $total_row = $data->count();
            if($total_row > 0)
                {
                    foreach($data as $row)
                    {
                        $no++;
                         
                        $output .= '
                                    <tr>
                                        <td style="vertical-align:middle;text-align:center">
                                            <div class="card-body">
                                                <div class="float-right">
                                                    <span style="font-size: 2em; color: Tomato;" onclick="FunctionDelete2(\''.$row->leanmedia_id.'\',\''.$row->model_sepatu.'\')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </span>
                                                </div>
                                                <img src="'.url('/images/lean/leanmedia/oib/image/'.$row->model_sepatu.'/'.$row->image).'" height="650px" width="800px"/></center>
                                            </div>  
                                            <div class="card-footer">
                                                <p style="font-weight: bold;">'.$no.'/'.$total_row.'</p>
                                            </div>
                                        </td>
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
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row,
                );

            echo json_encode($data);
            }
    }
    function search_image_oib($id)
    {
        $cari_model=db::table('leanmedia as a')
                ->select('a.*','b.location')
                ->join('cell_area_sop as b','a.id_area','=','b.id')
                ->where('a.oib',$id)
                ->where('a.type','sop')
                ->get();
                foreach($cari_model as $a)
                {
                    $model=$a->model_sepatu;
                    $location=$a->id_area;
                }
        $data = db::table('leanmedia__oib as a')
                ->where('a.model_sepatu',$model)
                ->where('a.id_area',$location)
                ->where('a.type','oib')
                ->get();
        return view('leanmedia.content.search_image',['data'=>$data,'location'=>$location,'model'=>$model]);
    }
    
    
// ccqp
    public function ccqp()
    {
        $cover=db::table('leanmedia as a')
                ->select('a.*','b.location')
                ->join('cell_area_sop as b','a.id_area','=','b.id')
                ->where('a.type','ccqp')
                ->where('a.brand','New Balance')
                ->groupBy('a.cover')
                ->get();
        $navbar=db::table('leanmedia as a')
                ->select('a.*','b.location')
                ->join('cell_area_sop as b','a.id_area','=','b.id')
                ->where('a.type','ccqp')
                ->where('a.brand','New Balance')
                ->groupBy('a.type')
                ->get();
        $cek=db::table('leanmedia as a')
                ->select('a.*','b.location')
                ->join('cell_area_sop as b','a.id_area','=','b.id')
                ->where('a.type','ccqp')
                ->where('a.brand','New Balance')
                ->first();
        // if($cover==null)
        if($cek===NULL)
        {
            return view('leanmedia.content.New Balance.ccqp_empty',['navbar'=>$navbar]);
        }else {
            return view('leanmedia.content.New Balance.ccqp_index',['cover'=>$cover,'navbar'=>$navbar]);
        }
    }
    function action_ccqp(Request $request)
    {
        $no=0;
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                    $data=db::table('leanmedia as a')
                        ->select('a.*','b.location')
                        ->join('cell_area_sop as b','a.id_area','=','b.id')
                        ->where('a.type','ccqp')
                        ->where('model_sepatu', 'like', '%'.$query.'%')
                        ->where('a.brand','New Balance')
                        ->groupBy('a.cover')
                        ->get();
            }
            else
            {
                $data=db::table('leanmedia as a')
                        ->select('a.*')
                        ->where('a.type','ccqp')
                        ->where('a.brand','New Balance')
                        ->groupBy('a.cover')
                        ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                                <div class="card col-sm-3 col-md-3 col-lg-3 col-xl-3 item">
                                    <a href="#" data-toggle="modal" data-target="#ccqp_modal'.$row->leanmedia_id.'" class="btn btn-outline-white py-2 px-4">
                                        <img src="'.url('images/lean/leanmedia/ccqp/cover/'.$row->cover).'" alt="IMage" class="img-fluid">
                                    </a>
                                    <div class="card-body">
                                        <center><h2 class="card-text">'.$row->model_sepatu.'</h2></center>
                                    </div>
                                </div>
                            ';
                }
            }
            else
            {
                $output = '
                            <div class="card col-sm-12 col-md-12 col-lg-12 col-xl-12 item">
                                <div class="alert alert-danger">
                                    <center><h2>Data tidak ada!</h2></center>
                                </div>
                            </div>
                            ';
            }
            $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
    function action_getDataccqp(Request $request)
    {
        $no=0;
        if($request->ajax())
        {
            $output = '';
            $type = $request->get('type');
                $data=db::table('leanmedia')
                    ->where('type',$type)
                    ->orderBy('model_sepatu')
                    ->get();
            $total_row = $data->count();
            if($total_row > 0)
                {
                    foreach($data as $row)
                    {
                        $no++;
                        $output .= '
                                    <tr>
                                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                                        <td style="vertical-align:middle;text-align:center">'.$row->model_sepatu.'</td>
                                        <td style="vertical-align:middle;text-align:center">
                                            <a class="test-popup-link" href="'.url('/images/lean/leanmedia/ccqp/image/'.$row->model_sepatu.'/'.$row->image).'">
                                                <img src="'.url('/images/lean/leanmedia/ccqp/image/'.$row->model_sepatu.'/'.$row->image).'" height="120%" width="80%"/></center>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="card">
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#delete'.$row->leanmedia_id.'">Delete</button>
                                            </div>
                                        </td>
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
                $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
                );

            echo json_encode($data);
            }
    }
    function search_image_ccqp($id)
    {
        $cari_model=db::table('leanmedia as a')
            ->select('a.*','b.location')
            ->join('cell_area_sop as b','a.id_area','=','b.id')
            ->where('a.ccqp',$id)
            ->where('a.type','sop')
            ->get();
        foreach($cari_model as $a)
        {
            $model=$a->model_sepatu;
            $location=$a->id_area;
        }

        $data = db::table('leanmedia__ccqp as a')
                ->where('a.model_sepatu',$model)
                ->where('a.id_area',$location)
                ->where('a.type','ccqp')
                ->get();
        return view('leanmedia.content.search_image',['data'=>$data,'location'=>$location,'model'=>$model]);
    }

    //cr
    function search_image_cr($id)
    {
        $cari_model=db::table('leanmedia as a')
                ->select('a.*','b.location')
                ->join('cell_area_sop as b','a.id_area','=','b.id')
                ->where('a.oib',$id)
                ->where('a.type','sop')
                ->get();
                foreach($cari_model as $a)
                {
                    $model=$a->model_sepatu;
                    $location=$a->id_area;
                }
        $data = db::table('leanmedia__cr as a')
                ->where('a.model_sepatu',$model)
                ->where('a.id_area',$location)
                ->where('a.type','cr')
                ->get();
        return view('leanmedia.content.search_image',['data'=>$data,'location'=>$location,'model'=>$model]);
    }
    public function find_cell_area_sop()
    {
        $data = db::table('cell_area_sop')->get();
        $option="";
        foreach ($data as $a) {
            $option.='<option>'.$a->location.'</option>';
        }
        $data = array(
            'option'  => $option,
        );

        echo json_encode($data);
    }
}
