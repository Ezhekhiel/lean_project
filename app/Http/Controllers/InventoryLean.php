<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
class InventoryLean extends Controller
{
    public function test()
    {
        $crypt_location = [Crypt::encryptString("pre-setting"),Crypt::encryptString("ready-setting")];
            $location= [['kode'=>$crypt_location[0],'location'=>"pre-setting"],['kode'=>$crypt_location[1],'location'=>"ready-setting"]];
            return view("test",['location'=>$location]);
    }
    public function index()
    {
        
        return view('InventoryLean.content.index');
    }
    public function show()
    {
        $data=db::table('lean__inventory')->get();
        $table="";
        $no=0;
        foreach ($data as $value) {
            $no++;
            $table.='
                    <tr onclick="showLocation('.$value->id.')">
                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$value->nama_material .'</td>
                        <td style="vertical-align:middle;text-align:center">'.$value->brand .'</td>
                        <td style="vertical-align:middle;text-align:center">'.$value->type .'</td>
                        <td style="vertical-align:middle;text-align:center">'.$value->quantity .'</td>
                        <td style="vertical-align:middle;text-align:center">'.$value->created_at .'</td>
                    </tr>
            ';
        }
        $data = array(
            'table'=>$table,
        );
        return response()->json($data);
    }
    public function show_location(Request $request)
    {
        $id_inventory = $request->id;
        $data_location = DB::table('lean__inventory_location')->where('id_inventory',$id_inventory)->get();
        $table="";
        $description="";
        $no=0;
        if (count($data_location)==0) {
            $table='<tr>
                <td colspan="4" style="vertical-align:middle;text-align:center">Not Found Area</td>
                </tr>';
            $data = array(
                'table'=>$table,
            );
            return response()->json($data);
        }
        foreach ($data_location as $value) {
            $no++;
            $table.='
                    <tr data-bs-placement="top"
                    data-bs-custom-class="custom-tooltip"
                    title="This top tooltip is themed via CSS variables.">
                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$value->location .'</td>
                        <td style="vertical-align:middle;text-align:center">'.$value->status .'</td>
                        <td style="vertical-align:middle;text-align:center">'.$value->description .'</td>
                    </tr>
            ';
        }
        $data = array(
            'table'=>$table,
        );
        return response()->json($data);
    }
    public function show_detail(Request $request)
    {
        $id_inventory = $request->id;
        $data_location = DB::table('lean__inventory_location as a')
                ->join('lean__inventory as b','a.id_inventory','=','b.id')
                ->where('a.id_inventory',$id_inventory)
                ->get();
        $data_invest = DB::table('lean__inventory')->where('id',$id_inventory)->get();
        $table="";
        $description="";
        $no=0;
        if (count($data_location)==0) {
            foreach ($data_invest as $a) {
                $qty=$a->quantity;
                $nama=$a->nama_material;
                $brand=$a->brand;
                $type=$a->type;
            }
            for ($i=0; $i < $qty ; $i++) { 
                $no++;
                $table.='
                    <tr>
                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$nama.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$brand.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$type .'</td>
                        <td style="vertical-align:middle;text-align:center"><input class="form-control" type="text" placeholder="Location" name="name_location[]"></td>
                        <td style="vertical-align:middle;text-align:center">
                            <select class="form-control" name="sname_tatus[]">
                                <option value="Broke">Broke</option>
                                <option value="Good">Good</option>
                            </select>
                        </td>
                        <td>
                            <textarea class="form-control" name="name_description" rows="3"></textarea>
                        </td>
                    </tr>
                    ';
            }
        }
        foreach ($data_location as $value) {
            foreach ($data_location as $a) {
                $qty=$a->quantity;
                $nama=$a->nama_material;
                $brand=$a->brand;
                $type=$a->type;
            }
            $no++;
            $table.='
                   <tr>
                        <td style="vertical-align:middle;text-align:center">'.$no.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$nama.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$brand.'</td>
                        <td style="vertical-align:middle;text-align:center">'.$type .'</td>
                        <td style="vertical-align:middle;text-align:center"><input class="form-control" type="text" name="name_location[]" onClick="updateData("name_location_id")" id="name_location_id" value="'.$a->location.'"></td>
                        <td style="vertical-align:middle;text-align:center"><input class="form-control" type="text" name="status[]" id="status_id" onClick="updateData("status_id")" value="'.$a->status.'"></td>
                        <td>
                            <textarea class="form-control" name="name_description" rows="3" id="description_id" onClick="updateData("description_id")">'.$a->description.'</textarea>
                        </td>
                    </tr>
            ';
        }
        $data = array(
            'table'=>$table,
        );
        return response()->json($data);
    }
    public function save_location(Request $request)
    {
        $name[]= $request->name_location;
        $valName=[];
        for ($i=0; $i < count($name); $i++) { 
            if($name[$i])
            {
            }
        }

        $data = array(
            'name'=>$name[0],
            'valName'=>$valName
        );
        return response()->json($data);
    }
}
