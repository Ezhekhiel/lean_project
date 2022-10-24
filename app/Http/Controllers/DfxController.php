<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DfxController extends Controller
{
    public function index()
    {
    	return view('dfx.content.index');
    }
    public function main()
    {
        $season = DB::table('dfx_data')
                ->distinct()
                ->select('season')
                ->orderBy('season')
                ->get();
        $selectSeason = '<option value="">Select Season</option>';
        foreach($season as $row)
        {
            $selectSeason .= '<option value="'.$row->season.'">'.$row->season.'</option>';
        }
        $data = array(
            'selectSeason'  => $selectSeason,
        );
            echo json_encode($data);
    }
    public function changeSeason(Request $request)
    {
        $season = $request->changeSeason;
        $data = DB::table('dfx_data')
            ->where('season', $season)
            ->orderBy('season')
            ->groupBy('model_name')
            ->get();
        $dataTable = DB::table('dfx_data')
            ->where('season', $season)
            ->orderBy('season')
            ->get();
        
        $model_name = '<option value="">Select Model</option>';
        foreach($data as $row)
        {
            $model_name .= '<option value="'.$row->model_name.'">'.$row->model_name.'</option>';
        }
        $table = "";
        $no=0;
        foreach ($dataTable as $row) {
            $no++;
            $table.='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$row->dfx_id.'</td>
                    <td>'.$row->category.'</td>
                    <td>'.$row->model_name.'</td>
                    <td>
                        <a class="test-popup-link" href="'.url("/images/development/dfx/".$row->model_picture).'">
                            <img src="'.url("/images/development/dfx/".$row->model_picture).'" height="100%" width="100%"/></center>
                        </a>
                    </td>
                    <td>'.$row->dfx_description.'</td>
                    <td>'.$row->dfx_principle_primary.'</td>
                    <td>'.$row->dfx_principle_secondery_1.'</td>
                    <td>'.$row->dfx_principle_secondery_2.'</td>
                    <td>'.$row->season.'</td>
                    <td>'.$row->status_approve.'</td>
                    <td>'.$row->explain_status_no.'</td>
                    <td>'.$row->pph_improve_before.'</td>
                    <td>'.$row->pph_improve_after.'</td>
                    <td>'.$row->pph_improve.'</td>
                    <td>'.$row->material_cost_saving_before.'</td>
                    <td>'.$row->material_cost_saving_after.'</td>
                    <td>'.$row->material_cost_saving.'</td>
                    <td>'.$row->other_benefits_before.'</td>
                    <td>'.$row->other_benefits_after.'</td>
                    <td>'.$row->other_benefits_improve.'</td>
                    <td>'.$row->forecasted_volume_prs.'</td>
                    <td>'.$row->total_save_pph.'</td>
                    <td>'.$row->total_save_cost.'</td>
                </tr>
            ';
        }
        $data = array(
            'model_name'  => $model_name,
            'table'  => $table
        );

            echo json_encode($data);
    }
    public function changeModel(Request $request)
    {
        $season = $request->season;
        $model = $request->model;
        $data = DB::table('dfx_data')
            ->where('season', $season)
            ->where('model_name', $model)
            ->orderBy('season')
            ->groupBy('model_name')
            ->get();
        $dataTable = DB::table('dfx_data')
            ->where('season', $season)
            ->where('model_name', $model)
            ->orderBy('season')
            ->get();
        
        $principle = '<option value="">Select Principle</option>';
        foreach($data as $row)
        {
            $principle .= '<option value="'.$row->model_name.'">'.$row->model_name.'</option>';
        }
        $table = "";
        $no=0;
        foreach ($dataTable as $row) {
            $no++;
            $table.='
                <tr>
                    <td>'.$no.'</td>
                    <td>'.$row->dfx_id.'</td>
                    <td>'.$row->category.'</td>
                    <td>'.$row->model_name.'</td>
                    <td>
                        <a class="test-popup-link" href="'.url("/images/development/dfx/".$row->model_picture).'">
                            <img src="'.url("/images/development/dfx/".$row->model_picture).'" height="100%" width="100%"/></center>
                        </a>
                    </td>
                    <td>'.$row->dfx_description.'</td>
                    <td>'.$row->dfx_principle_primary.'</td>
                    <td>'.$row->dfx_principle_secondery_1.'</td>
                    <td>'.$row->dfx_principle_secondery_2.'</td>
                    <td>'.$row->season.'</td>
                    <td>'.$row->status_approve.'</td>
                    <td>'.$row->explain_status_no.'</td>
                    <td>'.$row->pph_improve_before.'</td>
                    <td>'.$row->pph_improve_after.'</td>
                    <td>'.$row->pph_improve.'</td>
                    <td>'.$row->material_cost_saving_before.'</td>
                    <td>'.$row->material_cost_saving_after.'</td>
                    <td>'.$row->material_cost_saving.'</td>
                    <td>'.$row->other_benefits_before.'</td>
                    <td>'.$row->other_benefits_after.'</td>
                    <td>'.$row->other_benefits_improve.'</td>
                    <td>'.$row->forecasted_volume_prs.'</td>
                    <td>'.$row->total_save_pph.'</td>
                    <td>'.$row->total_save_cost.'</td>
                </tr>
            ';
        }
        $data = array(
            'principle'  => $principle,
            'table'  => $table
        );

            echo json_encode($data);
    }
    public function importexcel(Request $request){
        // menangkap file excel
		$file = $request->file('file');
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder FILE SI di dalam folder public
		$file->move('file/file_dfx',$nama_file);

		// import data
        $getArray = new dfxImport;
		Excel::import($getArray, public_path('file/file_dfx/'.$nama_file));
		// notifikasi dengan session
		Session::flash('sukses','Data Output dan PPH Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect()->back()->with('message','Import Database Works');
    }
    public function form_input()
    {
        // $this->authorize('create data medium');
        return view('dfx.content.form_input');
    }
    public function save_dfx(Request $request)
    {
        $this->authorize('create data medium');
        $this->validate($request,[
            'dfx_id' => 'required|min:4|max:50',
            'model_name' => 'required|min:4|max:50',
            'category' => 'required|min:4|max:50',
            'description' => 'required|min:4',
            'season' => 'required|min:4|max:50',
            'validate'=> 'required|in:Yes,No',
            'primary' => 'required',
        ]);
        $dfx_id=$request->dfx_id;
        $model=$request->model_name;
        $category=$request->category;
        $description=$request->description;
        $validate=$request->validate;
        $explain=$request->explain;
            if(empty($explain))
            {
                $explain="-";
            }
        $primary=$request->primary;
        $secondary1=$request->secondary1;
            if(empty($secondary1))
            {
                $secondary1="0";
            }
        $secondary2=$request->secondary2;
            if(empty($secondary2))
            {
                $secondary2="0";
            }
        $season=$request->season;
        $pph_improve_before=$request->pph_improve_before;
            if(empty($pph_improve_before))
            {
                $pph_improve_before="0";
            }
        $pph_improve_after=$request->pph_improve_after;
            if(empty($pph_improve_after))
            {
                $pph_improve_after="0";
            }
        $pph_improve_improve=$request->pph_improve_improve;
            if(empty($pph_improve_improve))
            {
                $pph_improve_improve="0";
            }
        $material_cost_before=$request->material_cost_before;
            if(empty($material_cost_before))
            {
                $material_cost_before="0";
            }
        $material_cost_after=$request->material_cost_after;
            if(empty($material_cost_after))
            {
                $material_cost_after="0";
            }
        $material_cost_saving=$request->material_cost_saving;
            if(empty($material_cost_saving))
            {
                $material_cost_saving="0";
            }
        $other_benefits_before=$request->other_benefits_before;
            if(empty($other_benefits_before))
            {
                $other_benefits_before="0";
            }
        $other_benefits_after=$request->other_benefits_after;
            if(empty($other_benefits_after))
            {
                $other_benefits_after="0";
            }
        $other_benefits_improve=$request->other_benefits_improve;
            if(empty($other_benefits_improve))
            {
                $other_benefits_improve="0";
            }
        $forecasted=$request->forecasted;
            if(empty($forecasted))
            {
                $forecasted="0";
            }
        $save_pph=$request->save_pph;
            if(empty($save_pph))
            {
                $save_pph="0";
            }
        $cost=$request->cost;
            if(empty($cost))
            {
                $cost="0";
            }
        $image=$request->image;
            $image_ext=$image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(500, 500);
            $new_image_name=$model.".png";
            $destination_path = public_path('/images/development/dfx');
            //insert ke database
        DB::table('dfx_data')->insert([
            'dfx_id' => $dfx_id,
            'category' => $category,
            'model_name' => $model,
            'model_picture' => $new_image_name,
            'dfx_description' => $description,
            'dfx_principle_primary' => $primary,
            'dfx_principle_secondery_1' => $secondary1,
            'dfx_principle_secondery_2' => $secondary2,
            'season' => $season,
            'status_approve' => $validate,
            'explain_status_no' => $explain,
            'pph_improve_before' => $pph_improve_before,
            'pph_improve_after' => $pph_improve_after,
            'pph_improve' => $pph_improve_improve,
            'material_cost_saving_before' => $material_cost_before,
            'material_cost_saving_after' => $material_cost_after,
            'material_cost_saving' => $material_cost_saving,
            'other_benefits_before' => $other_benefits_before,
            'other_benefits_after' => $other_benefits_after,
            'other_benefits_improve' => $other_benefits_improve,
            'forecasted_volume_prs' => $forecasted,
            'total_save_pph' => $save_pph,
            'total_save_cost' => $cost,
        ]);
        $image->move($destination_path,$new_image_name,$image_resize);
        return redirect(Auth::user()->role.'/dfx/input')->with('alert_save', 'Saved!');
    }
}
