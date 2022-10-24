<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
class ercDataController extends Controller
{
    public function index()
    {
        $tahun=date('Y');
        $data_targetMP=DB::table('erc_progres')->select('target_mp')->where(DB::raw('year(date)'),$tahun)->orderBy('date')->get();
        $data_savingMP=DB::table('erc_progres')->select('saving_mp')->where(DB::raw('year(date)'),$tahun)->orderBy('date')->get();
        $data_savingCost=DB::table('erc_progres')->select('total_saving_cost')->where(DB::raw('year(date)'),$tahun)->orderBy('date')->get();
        $data_cumSaving=DB::table('erc_progres')->select('cum_saving_cost')->where(DB::raw('year(date)'),$tahun)->orderBy('date')->get();
        $data_month=DB::table('erc_progres')->select(DB::raw('month(date)as month'))->where(DB::raw('year(date)'),$tahun)->orderBy('date')->get();
        $data_target_pdp=DB::table('erc_progres')->select('target_pdp')->where(DB::raw('year(date)'),$tahun)->orderBy('date')->get();
        if (empty($data_targetMP->first()))
        {
            return view('erc.content.index',['targetMP_list'=>0, 'savingMP_list'=>0
                                        ,'savingCost_list'=>0,'cumSaving_list'=>0
                                        ,'month'=>0,'target_pdp_list'=>0,'target_pdp'=>0,'last_target_pdp'=>0])->with('alert_error','Data Tidak Di Temukan');
        }else{
            foreach($data_targetMP as $a)
            {
                $targetMP=$a->target_mp;
                $targetMP_list[]=$targetMP;
            }
            foreach($data_savingMP as $a)
            {
                $savingMP=$a->saving_mp;
                $savingMP_list[]=$savingMP;
            }
            foreach($data_savingCost as $a)
            {
                $savingCost=$a->total_saving_cost;
                $savingCost_list[]=$savingCost;
            }
            foreach($data_cumSaving as $a)
            {
                $cumSaving=$a->cum_saving_cost;
                $cumSaving_list[]=$cumSaving;
            }
            foreach($data_month as $a)
            {
                $monthNum  = $a->month;
                $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                $monthName = $dateObj->format('F');
                $month=$monthName;
                $month_list[]=$month;
            }
            foreach($data_target_pdp as $a)
            {
                $target_pdp=$a->target_pdp;
                $target_pdp_list[]=$target_pdp;
                
            }
                $last_target_pdp=end($target_pdp_list);
                // dd($month_list);
            return view('erc.content.index',['targetMP'=>$targetMP_list, 'savingMP'=>$savingMP_list
                                            ,'savingCost_list'=>$savingCost_list,'cumSaving_list'=>$cumSaving_list
                                            ,'month'=>$month_list,'target_pdp'=>$target_pdp_list,'last_target_pdp'=>$last_target_pdp]);
        }
    }
    public function dataERC()
    {
        $year=DB::table('erc_data')->select('year')->groupBy('year')->get();
        $data=DB::table('erc_data')->get();
        return view('erc.content.dataERC',['data'=>$data,'year'=>$year]);
    }
    public function sumERC(Request $request)
    {
        $data = db::table('erc_summary')->orderBy('year','DESC')->orderBy('id',"Desc")->paginate(5);
  
        if ($request->ajax()) {
            return view('erc.content.partial.presult', compact('data'));
        }
  
        return view('erc.content.sumERC',compact('data'));
    }
    public function action_summary(Request $request)
    {
        $x = $request->get('month');
        $month = date('m',strtotime($x));
        $year = date('Y',strtotime($x));
        $data = DB::table('erc_summary')
                ->where('year',$year)
                ->where('month',$month)
                ->paginate();
        if ($request->ajax()) {
            return view('erc.content.partial.presult', compact('data'));
        }
  
        return view('erc.content.sumERC',compact('data'));
    }
    public function action_data(Request $request)
    {
        $year = $request->get('year');
        $data = DB::table('erc_data')->where('year',$year)->get();
        $output = '';

        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 card">
                        <div class="card-header>
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#delete'.$row->id.'">
                                <span class="float-right" style="font-size: 1em; color: #808080;">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </button>
                        </div>
                        <div class="card-body thumbnail">
                            <a class="img-thumbnail" href="#">
                                    <img class="thumbnail" src="'.url("/dataerc/data/".$row->image).'"/></center>
                            </a>
                        </div>
                        <div class="card-footer">
                            <a>'.$row->description.'</a><br/>
                        </div>
                    </div>
                ';
            }
        }else{
            $output="Data Not Found!";
        }
        echo $output;
    }
    public function Save(Request $request)
    {
        $rules = array(
            "date" => "required",
            "target_mp" => "required",
            "saving_mp" => "required",
            "saving_cost" => "required",
            "cum_saving" => "required",
            "target_pdp" => "required",
        );
        $error = Validator::make($request->all(), $rules);
        if($error->fails())
        {
        return response()->json(['errors' => $error->errors()->all()]);
        }
        $date=$request->date.'-01';
        $target_mp=$request->target_mp;
        $saving_mp=$request->saving_mp;
        $saving_cost=$request->saving_cost;
        $cum_saving=$request->cum_saving;
        $target_pdp=$request->target_pdp;
        $id_progress = 'P-ERC'.$date.rand(1,9999);
        DB::table('erc_progres')->insert([
                'id_progress'=>$id_progress,
                'date'=>$date,
                'target_mp'=>$target_mp,
                'saving_mp'=>$saving_mp,
                'total_saving_cost'=>$saving_cost,
                'cum_saving_cost'=>$cum_saving,
                'target_pdp'=>$target_pdp,
        ]);
     
        $output = array(
            'success' => 'Data uploaded successfully',
            );
            return response()->json($output);
    }
    public function delete_dataERC($id)
    {
        $this->authorize('delete data medium');
            $text_hapus=DB::table('erc_data')->where('id', $id)->get();
            foreach($text_hapus as $a)
            {
                if($a->image!="")
                {
                    $destination_path=public_path().'/dataerc/data/'.$a->image;
                    if(file_exists($destination_path))
                    {
                        unlink($destination_path);
                    }
                }
            }
            DB::table('erc_data')->where('id', $id)->delete();
        return redirect()->back()->with('alert_delete', 'Deleted!'); 
    }
    public function data_Save(Request $request)
    {
        $rules = array(
            "year" => "required",
            "desc" => "required",
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
        return response()->json(['errors' => $error->errors()->all()]);
        }

        $year=$request->year;
        $desc=$request->desc;
        $image = $request->file('image');
        //manage image
        $new_image_name = rand(111,9999999).'-dataERC-'.$year.$image->getClientOriginalExtension();
        $destinationPath = public_path('/dataerc/data/');
        $img = Image::make($image->path());
        $img->rotate(0);
        $img->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$new_image_name);

        DB::table('erc_data')->insert([
                'year'=>$year,
                'description'=>$desc,
                'image'=>$new_image_name,
        ]);
     
        $output = array(
            'success' => 'Data uploaded successfully',
            );

            return response()->json($output);
    }
}
