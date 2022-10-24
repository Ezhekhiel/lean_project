<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class eventController extends Controller
{
    public function index()
    {
        $list_cell=DB::table('cell_info')->get();
        return view('eventView.content.index',['list_cell'=>$list_cell]);
    }
    public function show()
    {
        $table="";
        $event=DB::table('event_databases as a')
            ->select('a.*','b.cell')
            ->join('cell_info as b','a.id_area','=','b.id_cell')
            ->orderBy('a.due_date','DESC')
            ->get();
        $no=0;
        foreach ($event as $a)
        {
            $no++;
            $table.='
                <tr>
                    <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                    <td style="vertical-align:middle;text-align:center">
                        <input type="checkbox" class="checkbox" name="select[]" value="'.$a->id.'">
                    </td>
                    <td style="vertical-align:middle;text-align:center">'.$a->tanggal.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->jenis_event.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->nama_event.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->auditor.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->cell.'</td>
                    <td style="vertical-align:middle;text-align:center"><img src="'.url('/images/event/wt/'.$a->image).'" height="100px" width="120px"/></td>
                    <td style="vertical-align:middle;text-align:center">'.$a->description.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->due_date.'</td>
                    <td style="vertical-align:middle;text-align:center">
                        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="updateFunction(\''.$a->id.'\')">Update</button>
                        <button type="button" class="btn btn-danger btn-lg btn-block" onclick="deleteFunction(\''.$a->id.'\')">Delete</button>
                    </td>
                </tr>
            ';
        }
        $output = array(
            'table' => $table,
        );

            return response()->json($output);   
    }
    public function area()
    {
        $option="";
        $list_cell=DB::table('cell_info')->get();
        foreach($list_cell as $a)
        {
            $option.='<option value="'.$a->id_cell.'">'.$a->cell.'</option>';
        }
        $output = array(
            'option' => $option,
        );

            return response()->json($output);   
    }
    public function save(Request $request)
    {
        $image=$request->image;
            $count = count($image);
        $cell=$request->cell;
        $auditor=$request->auditor;
        $id=uniqid();
        for($i=0;$i<$count;$i++)
        {
            $image_ext=$image[$i]->getClientOriginalExtension();
            $new_image_name[$i]=rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/images/event/wt');
            $image[$i]->move($destination_path,$new_image_name[$i]);

        }
        for ($i=0; $i < count($cell) ; $i++) {
            $data[$i]=[
                'id_event'=>$id.'-'.$cell[$i],
                'auditor'=>$auditor[$i],
                'id_area'=>$cell[$i],
                'image'=>$new_image_name[$i]
            ];
        }
        $insert = DB::table('event_databases')->insert($data); 

        //show data
            $table="";
            $event=DB::table('event_databases as a')
                ->select('a.*','b.cell')
                ->join('cell_info as b','a.id_area','=','b.id_cell')
                ->orderBy('a.due_date','DESC')
                ->get();
            $no=0;
            foreach ($event as $a) {
                $no++;
                $table.='
                    <tr>
                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                        <td style="vertical-align:middle;text-align:center">
                            <input type="checkbox" class="checkbox" name="select[]" value="'.$a->id.'">
                        </td>
                        <td style="vertical-align:middle;text-align:center">'.$a->tanggal.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->jenis_event.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->nama_event.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->auditor.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->cell.'</td>
                        <td style="vertical-align:middle;text-align:center"><img src="'.url('/images/event/wt/'.$a->image).'" height="100px" width="120px"/></td>
                        <td style="vertical-align:middle;text-align:center">'.$a->description.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->due_date.'</td>
                        <td style="vertical-align:middle;text-align:center">
                            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="updateFunction(\''.$a->id.'\')">Update</button>
                            <button type="button" class="btn btn-danger btn-lg btn-block" onclick="deleteFunction(\''.$a->id.'\')">Delete</button>
                        </td>
                    </tr>
                ';
            }
        if($insert=="true")
        {
            $alert = "Image uploaded successfully";
        }else{
            $alert = "Image uploaded failed";
        }
        $output = array(
            'alert' => $alert,
            'table' => $table
        );

            return response()->json($output);   
    }
    public function update(Request $request)
    {
        $id = $request->id;
        $tanggal = $request->tanggal;
        $jenisEvent = $request->jenisevent;
        $namaEvent = $request->namaevent;
        $auditor = $request->auditor;
        $selectarea = $request->selectarea;
        $description = $request->description;
        $duedate = $request->duedate;
        //response
        $imageresponse = $request->imageresponse;
        $description2 = $request->description2;
        $reason = $request->reason;
        $pic = $request->pic;
        
        $data=[];
            if (isset($tanggal))
            {
                $data['tanggal']=$tanggal;
            }
            if (isset($jenisEvent))
            {
                $data['jenis_event']=$jenisEvent;
            }
            if (isset($namaEvent))
            {
                $data['nama_event']=$namaEvent;
            }
            if (isset($auditor)) {
                $data['auditor']=$auditor;
            }
            if (isset($selectarea)) {
                $data['id_area']=$selectarea;
            }
            if (isset($description)) {
                $data['description']=$description;
            }
            if (isset($duedate)) {
                $data['due_date']=$duedate;
            }
            if (isset($imageresponse)) {
                $image_ext=$imageresponse->getClientOriginalExtension();
                $new_image_name=rand(123456,999999).".".$image_ext;
                $destination_path = public_path('/images/event/wt/response');
                $imageresponse->move($destination_path,$new_image_name);
                $data['image2']=$new_image_name;
            }
            if (isset($description2)) {
                $data['description2']=$description2;
            }
            if (isset($reason)) {
                $data['reason']=$reason;
            }
            if (isset($pic)) {
                $data['pic']=$pic;
            }
            $updateData = DB::table('event_databases')
                ->where('id', $id)
                ->update($data);
        //show data
            $table="";
            $event=DB::table('event_databases as a')
                ->select('a.*','b.cell')
                ->join('cell_info as b','a.id_area','=','b.id_cell')
                ->orderBy('a.due_date','DESC')
                ->get();
            $no=0;
            foreach ($event as $a) {
                $no++;
                $table.='
                    <tr>
                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                        <td style="vertical-align:middle;text-align:center">
                            <input type="checkbox" class="checkbox" name="select[]" value="'.$a->id.'">
                        </td>
                        <td style="vertical-align:middle;text-align:center">'.$a->tanggal.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->jenis_event.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->nama_event.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->auditor.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->cell.'</td>
                        <td style="vertical-align:middle;text-align:center"><img src="'.url('/images/event/wt/'.$a->image).'" height="100px" width="120px"/></td>
                        <td style="vertical-align:middle;text-align:center">'.$a->description.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$a->due_date.'</td>
                        <td style="vertical-align:middle;text-align:center">
                            <button type="button" class="btn btn-primary btn-lg btn-block" onclick="updateFunction(\''.$a->id.'\')">Update</button>
                            <button type="button" class="btn btn-danger btn-lg btn-block" onclick="deleteFunction(\''.$a->id.'\')">Delete</button>
                        </td>
                    </tr>
                ';
            }
        if(!$updateData)
        {
            $alert = "Image uploaded failed";
        }else{
            $alert = "Image uploaded successfully";
        }
        $output = array(
            'alert' => $alert,
            'table' => $table,
        );

            return response()->json($output);   
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        //get image for delete image on localdisc
            $getImage = DB::table('event_databases')->where('id',$id)->get();
            foreach($getImage as $a)
            {
                $image_path = public_path().'/images/event/wt/'.$a->image;
                $image_path2 = public_path().'/images/event/wt/response/'.$a->image2;
                if($a->image!="unidentified")
                {
                    unlink($image_path);
                }
                if($a->image2!="unidentified")
                {
                    unlink($image_path2);
                }
            }
        $deleted = DB::table('event_databases')->where('id', $id)->delete();

        //show data
        $table="";
        $event=DB::table('event_databases as a')
            ->select('a.*','b.cell')
            ->join('cell_info as b','a.id_area','=','b.id_cell')
            ->orderBy('a.due_date','DESC')
            ->get();
        $no=0;
        foreach ($event as $a) {
            $no++;
            $table.='
                <tr>
                    <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                    <td style="vertical-align:middle;text-align:center">
                        <input type="checkbox" class="checkbox" name="select[]" value="'.$a->id.'">
                    </td>
                    <td style="vertical-align:middle;text-align:center">'.$a->tanggal.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->jenis_event.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->nama_event.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->auditor.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->cell.'</td>
                    <td style="vertical-align:middle;text-align:center"><img src="'.url('/images/event/wt/'.$a->image).'" height="100px" width="120px"/></td>
                    <td style="vertical-align:middle;text-align:center">'.$a->description.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->due_date.'</td>
                    <td style="vertical-align:middle;text-align:center">
                        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="updateFunction(\''.$a->id.'\')">Update</button>
                        <button type="button" class="btn btn-danger btn-lg btn-block" onclick="deleteFunction(\''.$a->id.'\')">Delete</button>
                    </td>
                </tr>
            ';
        }
        if(!$deleted)
        {
            $alert = "Delete failed";
        }else{
            $alert = "Delete successfully";
        }
        $output = array(
            'alert' => $alert,
            'table' => $table,
        );

        return response()->json($output);
    }
    public function deleteCheckbox(Request $request)
    {
        $id_delete = $request->id;
        //get image for delete image on localdisc
            $getImage = DB::table('event_databases')->whereIn('id',$id_delete)->get();
            foreach($getImage as $a)
            {
                $image_path = public_path().'/images/event/wt/'.$a->image;
                $image_path2 = public_path().'/images/event/wt/response/'.$a->image2;
                if($a->image!="unidentified")
                {
                    unlink($image_path);
                }
                if($a->image2!="unidentified")
                {
                    unlink($image_path2);
                }
            }
        $deleted = DB::table('event_databases')->whereIn('id', $id_delete)->delete();

        //show data
        $table="";
        $event=DB::table('event_databases as a')
            ->select('a.*','b.cell')
            ->join('cell_info as b','a.id_area','=','b.id_cell')
            ->orderBy('a.due_date','DESC')
            ->get();
        $no=0;
        foreach ($event as $a) {
            $no++;
            $table.='
                <tr>
                    <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                    <td style="vertical-align:middle;text-align:center">
                        <input type="checkbox" class="checkbox" name="select[]" value="'.$a->id.'">
                    </td>
                    <td style="vertical-align:middle;text-align:center">'.$a->tanggal.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->jenis_event.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->nama_event.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->auditor.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->cell.'</td>
                    <td style="vertical-align:middle;text-align:center"><img src="'.url('/images/event/wt/'.$a->image).'" height="100px" width="120px"/></td>
                    <td style="vertical-align:middle;text-align:center">'.$a->description.'</td>
                    <td style="vertical-align:middle;text-align:center">'.$a->due_date.'</td>
                    <td style="vertical-align:middle;text-align:center">
                        <button type="button" class="btn btn-primary btn-lg btn-block" onclick="updateFunction(\''.$a->id.'\')">Update</button>
                        <button type="button" class="btn btn-danger btn-lg btn-block" onclick="deleteFunction(\''.$a->id.'\')">Delete</button>
                    </td>
                </tr>
            ';
        }
        if(!$deleted)
        {
            $alert = "Delete failed";
        }else{
            $alert = "Delete successfully";
        }
        $output = array(
            'alert' => $alert,
            'table' => $table,
        );

        return response()->json($output);
    }
    public function showUpdate(Request $request)
    {
        $id=$request->id;
        $optionArea="";
        $event=DB::table('event_databases as a')
            ->select('a.*','b.cell')
            ->join('cell_info as b','a.id_area','=','b.id_cell')
            ->where('a.id',$id)
            ->orderBy('updated_at')
            ->orderBy('created_at')
            ->get();
        foreach($event as $a)
        {
            $optionArea='<option value="'.$a->id_area.'">-- '.$a->cell.' --</option>';
            $updateID=$a->id;
            $updateTanggal=$a->tanggal;
            $jenisEvent=$a->jenis_event;
            $updateNamaEvent=$a->nama_event;
            $updateAuditor=$a->auditor;
            $updateImage=url('/images/event/wt/'.$a->image);
            $updateDescription=$a->description;
            $updateDueDate=$a->due_date;
        }
        $list_cell=DB::table('cell_info')->get();
        foreach($list_cell as $a)
        {
            $optionArea.='<option value="'.$a->id_cell.'">'.$a->cell.'</option>';
        }
        $output = array(
            'updateID' => $updateID,
            'updateTanggal' => $updateTanggal,
            'updateJenisEvent' => $jenisEvent,
            'updateNamaEvent' => $updateNamaEvent,
            'updateAuditor' => $updateAuditor,
            'updateArea' => $optionArea,
            'updateImage' => $updateImage,
            'updateDescription' => $updateDescription,
            'updateDueDate' => $updateDueDate,
        );

            return response()->json($output);  
    }
    public function showSelectDelete(Request $request)
    {
        $id=$request->id;
        $idSelectDelete= "";
        $imageSelectDelete = "";
        $event=DB::table('event_databases')
            ->whereIn('id',$id)
            ->orderBy('updated_at')
            ->orderBy('created_at')
            ->get();
        foreach($event as $a)
        {
            $idSelectDelete.='<input type="hidden" name="id[]" value="'.$a->id.'">';
            $imageSelectDelete.='<img src="'.url('/images/event/wt/'.$a->image).'" style="border: 5px solid #555; margin-bottom:20px; display:block; margin-left:auto; margin-right:auto" height="350px" width="550px"/>';
        }
        $output = array(
            'id'=>$id,
            'idSelectDelete' => $idSelectDelete,
            'imageSelectDelete' => $imageSelectDelete,
        );

            return response()->json($output);  
    }
}
