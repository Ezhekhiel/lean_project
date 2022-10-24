<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Recruitment;
Use Redirect;
use App\Mail\emailRecruitment;
use Illuminate\Support\Facades\Mail;
use App\Models\recruitment_email;
use App\Models\recruitment__soal;
use App\Models\recruitment__soal_jabawan;
use App\Models\recruitment__hasil_test;
use App\Models\recruitment__candidate_test_time;
use App\Imports\recruitmentImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Mail\emailInformation;
use App\Mail\emailRecruitmentOnline;
use PDF;
use QrCode;
use App\User;
use Response;
use Carbon\Carbon;
// use Illuminate\Support\Facades\Hash;


class recruitmentController extends Controller
{
    public function index()
    {
        return view('recruitment.content.index');
    }
    public function show()
    {
        $dataImport = DB::table('recruitment as a')
                        ->select('a.*',DB::raw('(case when b.status = "Accept" then "Accept" when b.status = "Reject" then "Reject" else 0 end) as status'),
                                DB::raw('(case when c.id is null then "Not Yet" else "Done" end) as status_email'))
                        ->leftJoin('recruitment__status as b','a.id','b.id_mt')
                        ->leftJoin('recruitment__email as c','a.id','c.id_mt')
                        ->get();
        $dataShowTable = $this->showTable($dataImport);
        $output = array(
            'success'=>"Update Data Successfull!",
            'tanggal'=>$dataShowTable['tanggal'],
            'tableImport'=>$dataShowTable['table'],
            'name'=>$dataShowTable['name'],
            'age'=>$dataShowTable['age'],
            'b_d'=>$dataShowTable['b_d'],
            'email'=>$dataShowTable['email'],
            'p_n'=>$dataShowTable['p_n'],
            'n_k'=>$dataShowTable['n_k'],
            'p_p'=>$dataShowTable['p_p'],
            'alamat'=>$dataShowTable['alamat'],
            'p_k'=>$dataShowTable['p_k'],
            'l_b'=>$dataShowTable['l_b'],
            'referensi'=>$dataShowTable['referensi'],
            'arr_checklist_status'=>$dataShowTable['arr_checklist_status'],
            'arr_checklist_status_email'=>$dataShowTable['arr_checklist_status_email'],

        );
        return response()->json($output);  
    }
    public function search(Request $request)
    {

        $data=[];
        if (isset($request->tanggal)) {$data=[ "a.tanggal" => $request->tanggal];}
        if (isset($request->name)) {$data=[ "a.name" => $request->name];}
        if (isset($request->age)) {$data=[ "a.age" => $request->age];}
        if (isset($request->bd)) {$data=[ "a.bachelors_degree" => $request->bd];}
        if (isset($request->email)) {$data=[ "a.email" => $request->email];}
        if (isset($request->phone)) {$data=[ "a.phone_number" => $request->phone];}
        if (isset($request->cn)) {$data=[ "a.nama_kampus" => $request->cn];}
        if (isset($request->ps)) {$data=[ "a.program_pendidikan" => $request->ps];}
        if (isset($request->address)) {$data=[ "a.alamat" => $request->address];}
        if (isset($request->experience)) {$data=[ "a.pengalaman_kerja" => $request->experience];}
        if (isset($request->loe)) {$data=[ "a.lama_bekerja" => $request->loe];}
        if (isset($request->referensi)) {$data=[ "a.referensi" => $request->referensi];}
            
        $dataImport = DB::table('recruitment as a')
                        ->select('a.*',DB::raw('(case when b.status = "Accept" then "Accept" when b.status = "Reject" then "Reject" else 0 end) as status'),
                        DB::raw('(case when c.id is null then "Not Yet" else "Done" end) as status_email'))
                        ->leftJoin('recruitment__status as b','a.id','b.id_mt')
                        ->leftJoin('recruitment__email as c','a.id','c.id_mt')
                        ->orwhere($data);
        if (isset($request->status)) {
            $dataImport->orwhere(db::raw('(case when b.status = "Accept" then "Accept" when b.status = "Reject" then "Reject" else 0 end)'),$request->status);
        }
        if (isset($request->se)) {
            $dataImport->orwhere(db::raw('(case when c.id is null then "Not Yet" else "Done" end)'),$request->se);
        }
        $dataQuery = $dataImport->get();
          
        $dataShowTable = $this->showTable($dataQuery);
        
        $output = array(
            'success'=>"Update Data Successfull!",
            // 'data'=>$dataQuery
            'tanggal'=>$dataShowTable['tanggal'],
            'tableImport'=>$dataShowTable['table'],
            'name'=>$dataShowTable['name'],
            'age'=>$dataShowTable['age'],
            'b_d'=>$dataShowTable['b_d'],
            'email'=>$dataShowTable['email'],
            'p_n'=>$dataShowTable['p_n'],
            'n_k'=>$dataShowTable['n_k'],
            'p_p'=>$dataShowTable['p_p'],
            'alamat'=>$dataShowTable['alamat'],
            'p_k'=>$dataShowTable['p_k'],
            'l_b'=>$dataShowTable['l_b'],
            'referensi'=>$dataShowTable['referensi'],
            'arr_checklist_status'=>$dataShowTable['arr_checklist_status'],
            'arr_checklist_status_email'=>$dataShowTable['arr_checklist_status_email'],
        );
        return response()->json($output); 
    }
    function showTable($dataImport)
    {
        $tableImport ='';
        $tanggal='<option></option>';
        $name= '<option></option>';
        $age= '<option></option>';
        $b_d= '<option></option>';
        $email= '<option></option>';
        $p_n= '<option></option>';
        $n_k= '<option></option>';
        $p_p= '<option></option>';
        $alamat= '<option></option>';
        $p_k= '<option></option>';
        $l_b= '<option></option>';
        $referensi= '<option></option>';
        $arr_checklist_status= '<option></option>';
        $arr_checklist_status_email= '<option></option>';
        
        foreach ($dataImport as $a) {
            # table
            // logika status
                if($a->status == "Accept")
                {
                    $checklist_status = '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>';
                    $val_status = "Accept";
                }else if ($a->status == "Reject") {
                    $checklist_status = '<i class="fa fa-times-circle text-danger" aria-hidden="true"></i>';
                    $val_status = "Reject";
                }else{
                    $val_status = "Not Yet";
                    $checklist_status = '<i class="fa fa-minus-circle" aria-hidden="true"></i>';
                }
            //logika status email
                if($a->status_email == "Not Yet")
                {
                    $checklist_status_email = '<i class="fa fa-times-circle text-danger" aria-hidden="true"></i>';
                }else{
                    $checklist_status_email = '<i class="fa fa-check-circle text-success" aria-hidden="true"></i>';
                }
            $tableImport .='<tr>
                            <th>'.$a->tanggal.'</th>
                            <th onclick="showMenuName(\''.$a->id.'\',\''.$a->name.'\',\''.$a->id_test.'\')">'.$a->name.'</th>
                            <th>'.$a->age.'</th>
                            <th>'.$a->bachelors_degree.'</th>
                            <th>'.$a->email.'</th>
                            <th>'.$a->phone_number.'</th>
                            <th>'.$a->nama_kampus.'</th>
                            <th>'.$a->program_pendidikan.'</th>
                            <th>'.$a->alamat.'</th>
                            <th>'.$a->pengalaman_kerja.'</th>
                            <th>'.$a->lama_bekerja.'</th>
                            <th>'.$a->referensi.'</th>
                            <th>'.$checklist_status.'</th>
                            <th>'.$checklist_status_email.'</th>
                        </tr>';
            $tanggal .= '<option value="'.$a->tanggal.'">'.$a->tanggal.'</option>';
            $name .= '<option value="'.$a->name.'">'.$a->name.'</option>';
            $age .= '<option value="'.$a->age.'">'.$a->age.'</option>';
            $b_d .= '<option value="'.$a->bachelors_degree.'">'.$a->bachelors_degree.'</option>';
            $email .= '<option value="'.$a->email.'">'.$a->email.'</option>';
            $p_n .= '<option value="'.$a->phone_number.'">'.$a->phone_number.'</option>';
            $n_k .= '<option value="'.$a->nama_kampus.'">'.$a->nama_kampus.'</option>';
            $p_p .= '<option value="'.$a->program_pendidikan.'">'.$a->program_pendidikan.'</option>';
            $alamat .= '<option value="'.$a->alamat.'">'.$a->alamat.'</option>';
            $p_k .= '<option value="'.$a->pengalaman_kerja.'">'.$a->pengalaman_kerja.'</option>';
            $l_b .= '<option value="'.$a->lama_bekerja.'">'.$a->lama_bekerja.'</option>';
            $referensi .= '<option value="'.$a->referensi.'">'.$a->referensi.'</option>';

            $shor_checklist_status[$a->status]=$a->status;
            $shor_checklist_status_email[$a->status_email]=$a->status_email;
            
        }
        foreach ($shor_checklist_status as $a) {
            $arr_checklist_status .= '<option value="'.$a.'">'.$a.'</option>';
        }
        foreach ($shor_checklist_status_email as $a) {
            $arr_checklist_status_email .= '<option value="'.$a.'">'.$a.'</option>';
        }
            
        return ['table'=>$tableImport,
                'tanggal'=>$tanggal,
                'name'=>$name,
                'age'=>$age,
                'b_d'=>$b_d,
                'email'=>$email,
                'p_n'=>$p_n,
                'n_k'=>$n_k,
                'p_p'=>$p_p,
                'alamat'=>$alamat,
                'p_k'=>$p_k,
                'l_b'=>$l_b,
                'referensi'=>$referensi,
                'arr_checklist_status'=>$arr_checklist_status,
                'arr_checklist_status_email'=>$arr_checklist_status_email,
                ];
    }
    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        // menangkap file excel
            $file = $request->file;
        // membuat nama file unik
            $nama_file = rand().'-'.$file->getClientOriginalName();
        // upload ke folder file_siswa di dalam folder public
            $file->move('file/excel/recruitment/',$nama_file);
        // import data ke database
            $import = new recruitmentImport;
            // Excel::import($import, public_path('file/excel/recruitment/'.$nama_file));
            $arrayExcel = Excel::toArray($import, public_path('file/excel/recruitment/'.$nama_file));
        
            foreach ($arrayExcel as $key => $value) {
                foreach ($value as $v ) {
                    if(!empty($value)){
                        $name[] =$v['name'];
                        $age[] =$v['age'];
                        $bachelors_degree[] =$v['bachelors_degree'];
                        $email[] =$v['email'];
                        $phone_number[] =$v['phone_number'];
                        $nama_kampus[] =$v['nama_kampus'];
                        $program_pendidikan[] =$v['program_pendidikan'];
                    }
                }
            }

            $countvalueRecruitment = 0;
            $countName=count($name);
            for ($i=0; $i < $countName ; $i++) { 
                $value[$i] = db::table('recruitment')
                        ->where('name',$name[$i])
                        ->where('age',$age[$i])
                        ->where('bachelors_degree',$bachelors_degree[$i])
                        ->where('email',$email[$i])
                        ->where('phone_number',$phone_number[$i])
                        ->where('nama_kampus',$nama_kampus[$i])
                        ->where('program_pendidikan',$program_pendidikan[$i])->count();
            }
            if (array_sum($value)>0) {
                unlink(public_path('file/excel/recruitment/'.$nama_file));
                $output = array(
                    'success'=>"Update Data Error (Duplicate Candidate)!",
                );
            }else{
                Excel::import($import, public_path('file/excel/recruitment/'.$nama_file));
                $output = array(
                    'success'=>"Update Data Successfull!",
                );
            }
        return response()->json($output);  
    }
    public function statusCandidate(Request $request)
    {
        $id = $request->id;
        $date = $request->date; 
        $status = $request->status; 
            DB::table('recruitment__status')->updateOrInsert(
                ['id_mt'=>$id],[
                'id_mt'=>$id,
                'status'=>$status,
                'tanggal_terima'=>$date
                ]
            );
        
        //shpw data
        $dataImport = DB::table('recruitment as a')
                        ->select('a.*',DB::raw('(case when b.status = "Accept" then "Accept" when b.status = "Reject" then "Reject" else 0 end) as status'),
                                DB::raw('(case when c.id is null then 0 else 1 end) as status_email'))
                        ->leftJoin('recruitment__status as b','a.id','b.id_mt')
                        ->leftJoin('recruitment__email as c','a.id','c.id_mt')
                        ->get();
        $tableImport = $this->showTable($dataImport);
        $output = array(
            'success'=>"Update Data Successfull!",
            'tableImport'=>$tableImport
        );
        return response()->json($output);  
    }
    public function deleteCandidate(Request $request)
    {
        $id = $request->id;
        $id_test = $request->id_test;
        $dataRoom = DB::table('recruitment')->where('id_test',$id_test)->count();
        $deleteCandidate = DB::table('recruitment')->where('id',$id)->delete();
        DB::table('recruitment__status')->where('id_mt',$id)->delete();
        DB::table('recruitment__email')->where('id_mt',$id)->delete();
        if($id_test!="-")
        {
            if ($dataRoom == 1) {
                DB::table('recruitment__test')->where('id',$id_test)->delete();
            }
        }
        // table
        $dataImport = DB::table('recruitment as a')
                        ->select('a.*',DB::raw('(case when b.status = "Accept" then "Accept" when b.status = "Reject" then "Reject" else 0 end) as status'),
                                DB::raw('(case when c.id is null then 0 else 1 end) as status_email'))
                        ->leftJoin('recruitment__status as b','a.id','b.id_mt')
                        ->leftJoin('recruitment__email as c','a.id','c.id_mt')
                        ->get();
            $tableImport = $this->showTable($dataImport);
            
        if($deleteCandidate)
        {
            $output = array(
                'alert'=>"Delete Data Successfull!",
                'tableImport'=>$tableImport
            );
        }else{
            $output = array(
                'alert'=>"Delete Data Failled!",
                'tableImport'=>$tableImport
            );
        }
        return response()->json($output);  
    }
    public function sendEmail(Request $request)
    {
        $toEmail = $request->toEmail;
        $tanggal = $request->tanggalEmail;
        $time = $request->timeEmail;
        $letterNo = $request->letterNoEmail;
        $perihal = $request->perihalEmail;
        $keperluan = $request->keperluanEmail;
        $room = $request->roomEmail;
        $mailValue = $request->emailValue;
        $link = $request->linkSend;
        $menuID = $request->menuID;
        $tanggal_test = $tanggal.' '.$time;
        $link_test = 'http://10.2.14.175:5050/recruitment/test';
        // logic send email
            if ($toEmail == "All") {
                $details = [
                    'tanggal' => $tanggal,
                    'time' => $time,
                    'link' => $link,
                    'mailValue' => $mailValue
                ];
                $idTest = uniqid();
                //get emails all
                $emails = DB::table('recruitment as a')
                        ->select(db::raw('a.id, a.email,a.name, case when b.id != "" then b.id else 0 end as id_email'))
                        ->leftJoin('recruitment__email as b','a.id','=','b.id_mt')
                        ->get();
                foreach ($emails as $value) {
                    if ($value->id_email=="0") {
                        $email=$value->email;
                        $users=$value->name;
                        $password=substr(md5($users, false), 0, 12);
                        $details['name']= $users;
                        $details['link']= $link_test;
                        $details['password']= $password;
                        DB::table('recruitment__email')
                                ->insert(['id'=>uniqid()
                                            ,'id_mt'=>$value->id
                                            ,'link'=>$link_test
                                            ,'link_ms_teams'=>$link                                    
                                            ,'user'=>$users
                                            ,'password'=>$password
                                            ,'time'=>$tanggal_test
                                            ,'status'=>1]);
                        DB::table('recruitment')
                                    ->where('id',$value->id)
                                            ->update(['id_test'=>$idTest]);
                        $output = array(
                            'alert'=>"Email Data Success!",
                            'detail'=>$details
                        );
                    }else{
                        $email=$value->email;
                        $details['name']= $value->name;
                        DB::table('recruitment__email')
                                ->where('id',$value->id_email)
                                ->update(['id'=>uniqid()]);
                        $output = array(
                            'alert'=>"Email Data Success!",
                        );
                    }
                    Mail::to($email)->send(new emailRecruitmentOnline($details));
                }
            }else if ($toEmail == "Haven't received an invite") {
                $details = [
                    'tanggal' => $tanggal,
                    'time' => $time,
                    'link' => $link,
                    'mailValue' => $mailValue
                    ];
                $idTest = uniqid();
                //get emails all
                $emails = DB::table('recruitment as a')
                            ->select(db::raw('a.id, a.email,a.name, case when a.id=b.id_mt then 0 else 1 end as emails'))
                            ->leftJoin('recruitment__email as b','a.id','=','b.id_mt')
                            ->get();
                if($emails)
                {
                    foreach ($emails as $value) {
                        if ($value->emails=="1") {
                            $email=$value->email;
                            $users=$value->name;
                            $password=substr(md5($users, false), 0, 12);
                            $details['name']= $value->name;
                            $details['link']= $link_test;
                            $details['password']= $password;
                            DB::table('recruitment__email')
                                    ->insert(['id'=>uniqid()
                                            ,'id_mt'=>$value->id
                                            ,'link'=>$link_test
                                            ,'link_ms_teams'=>$link                                    
                                            ,'user'=>$users
                                            ,'password'=>$password
                                            ,'time'=>$tanggal_test
                                            ,'status'=>1]);
                            DB::table('recruitment')->where('id',$value->id)
                                                ->update(['id_test'=>$idTest]);
                            $output = array(
                                'alert'=>"Email Data Success!",
                            );
                            Mail::to($email)->send(new emailRecruitmentOnline($details));
                        }else{
                            $output = array(
                                'alert'=>"All Email have email recruitment!",
                            );
                        }
                    }
                }else{
                    $output = array(
                        'alert'=>"Empty Data",
                    );
                }
            }
        //
        // table
        $dataImport = DB::table('recruitment as a')
            ->select('a.*',DB::raw('(case when b.status = "Accept" then "Accept" when b.status = "Reject" then "Reject" else 0 end) as status'),
                    DB::raw('(case when c.id is null then 0 else 1 end) as status_email'))
            ->leftJoin('recruitment__status as b','a.id','b.id_mt')
            ->leftJoin('recruitment__email as c','a.id','c.id_mt')
            ->get();
            $tableImport = $this->showTable($dataImport);
            $output['tableImport']=$tableImport;
        return response()->json($output);  

    }
    /*public function sendEmail(Request $request)
    {
        $toEmail = $request->toEmail;
        $tanggal = $request->tanggalEmail;
        $time = $request->timeEmail;
        $letterNo = $request->letterNoEmail;
        $perihal = $request->perihalEmail;
        $keperluan = $request->keperluanEmail;
        $room = $request->roomEmail;
        $mailValue = $request->emailValue;
        $link = $request->linkSend;
        $menuID = $request->menuID;
        $tanggal_test = $tanggal.' '.$time;
        // logic send email
            if ($menuID == "1") {
                if ($toEmail == "All") {
                    $details = [
                        'tanggal' => $tanggal,
                        'time' => $time,
                        'letterNo' => $letterNo,
                        'perihal' => $perihal,
                        'keperluan' => $keperluan,
                        'room' => $room,
                        'mailValue' => $mailValue
                    ];
                    $idTest = uniqid();
                    //get emails all
                    $emails = DB::table('recruitment as a')
                            ->select(db::raw('a.id, a.email,a.name, case when b.id != "" then b.id else 0 end as id_email'))
                            ->leftJoin('recruitment__email as b','a.id','=','b.id_mt')
                            ->get();
                    foreach ($emails as $value) {
                        if ($value->id_email=="0") {
                            $users=$value->email;
                            $details['nama']= $value->name;
                            DB::table('recruitment__email')
                                    ->insert(['id'=>uniqid()
                                                ,'id_mt'=>$value->id
                                                ,'status'=>1]);
                            DB::table('recruitment')
                                        ->where('id',$value->id)
                                                ->update(['id_test'=>$idTest]);
                            $output = array(
                                'alert'=>"Email Data Success!",
                            );
                        }else{
                            $users=$value->email;
                            $details['nama']= $value->name;
                            DB::table('recruitment__email')
                                    ->where('id',$value->id_email)
                                    ->update(['id'=>uniqid()]);
                            $output = array(
                                'alert'=>"Email Data Success!",
                            );
                        }
                        Mail::to($users)->send(new emailRecruitment($details));
                    }
                }else if ($toEmail == "Haven't received an invite") {
                    $details = [
                        'tanggal' => $tanggal,
                        'time' => $time,
                        'letterNo' => $letterNo,
                        'perihal' => $perihal,
                        'keperluan' => $keperluan,
                        'room' => $room
                        ];
                    $idTest = uniqid();
                    //get emails all
                    $emails = DB::table('recruitment as a')
                                ->select(db::raw('a.id, a.email,a.name, case when a.id=b.id_mt then 0 else 1 end as emails'))
                                ->leftJoin('recruitment__email as b','a.id','=','b.id_mt')
                                ->get();
                    if($emails)
                    {
                        foreach ($emails as $value) {
                            if ($value->emails=="1") {
                                $users=$value->email;
                                $details['nama']= $value->name;
                                DB::table('recruitment__email')
                                        ->insert(['id'=>uniqid()
                                                    ,'id_mt'=>$value->id
                                                    ,'status'=>1]);
                                DB::table('recruitment')->where('id',$value->id)
                                                    ->update(['id_test'=>$idTest]);
                                $output = array(
                                    'alert'=>"Email Data Success!",
                                );
                                Mail::to($users)->send(new emailRecruitment($details));
                            }else{
                                $output = array(
                                    'alert'=>"All Email have email recruitment!",
                                );
                            }
                        }
                        //make databaset test
                            DB::table('recruitment__test')
                                ->insert(['id'=>$idTest,
                                        'ruangan'=>$room,
                                        'tanggal_test'=>$tanggal_test
                                    ]);
                    }else{
                        $output = array(
                            'alert'=>"Empty Data",
                        );
                    }
                }
            }else if ($menuID == "2") {
                if ($toEmail == "All") {
                    $details = [
                        'tanggal'=> $tanggal,
                        'time' => $time,
                        'link'=> $link
                    ];
                    //get emails all
                    $emails = DB::table('recruitment as a')
                                ->select(db::raw('a.*'))
                                ->get();
                    foreach ($emails as $value) {
                            $users=$value->email;
                            $details['nama']= $value->name;
                            $output = array(
                                'alert'=>"Email Data Success!",
                            );
                        Mail::to($users)->send(new emailInformation($details));
                    }
                }else if ($toEmail == "Candidate has accepted") {
                    $details = [
                        'mailValue' => $mailValue
                    ];
                    //get emails all
                    $emails = DB::table('recruitment as a')
                                ->select('a.name','b.status','a.email')
                                ->leftJoin('recruitment__status as b','a.id','=','b.id_mt')
                                ->whereNotNull('b.status')
                                ->get();
                    foreach ($emails as $value) {
                            $users=$value->email;
                            $details['nama']= $value->name;
                            $output = array(
                                'alert'=>"Email Data Success!",
                            );
                        Mail::to($users)->send(new emailInformation($details));
                    }
                }else{
                    $details = [
                        'mailValue' => $mailValue
                    ];
                    $arrayToEmail= explode(", ", $toEmail);
                    //get emails all
                    $emails = DB::table('recruitment as a')
                                ->select('a.name','a.email')
                                ->leftJoin('recruitment__status as b','a.id','=','b.id_mt')
                                ->whereIn('a.name',$arrayToEmail)
                                ->get();
                    foreach ($emails as $value) {
                            $users=$value->email;
                            $details['nama']= $value->name;
                            $output = array(
                                'alert'=>"Email Data Success!",
                            );
                        Mail::to($users)->send(new emailInformation($details));
                    }
                }
            }else{
                if ($toEmail == "All") {
                    $details = [
                        'tanggal' => $tanggal,
                        'time' => $time,
                        'link' => $link,
                        'mailValue' => $mailValue
                    ];
                    $idTest = uniqid();
                    //get emails all
                    $emails = DB::table('recruitment as a')
                            ->select(db::raw('a.id, a.email,a.name, case when b.id != "" then b.id else 0 end as id_email'))
                            ->leftJoin('recruitment__email as b','a.id','=','b.id_mt')
                            ->get();
                    foreach ($emails as $value) {
                        if ($value->id_email=="0") {
                            $email=$value->email;
                            $users=$value->name;
                            $password=substr(md5($users, false), 0, 12);
                            $details['name']= $users;
                            $details['password']= $password;
                            DB::table('recruitment__email')
                                    ->insert(['id'=>uniqid()
                                                ,'id_mt'=>$value->id
                                                ,'link'=>$link
                                                ,'user'=>$users
                                                ,'password'=>$password
                                                ,'status'=>1]);
                            DB::table('recruitment')
                                        ->where('id',$value->id)
                                                ->update(['id_test'=>$idTest]);
                            $output = array(
                                'alert'=>"Email Data Success!",
                                'detail'=>$details
                            );
                        }else{
                            $email=$value->email;
                            $details['name']= $value->name;
                            DB::table('recruitment__email')
                                    ->where('id',$value->id_email)
                                    ->update(['id'=>uniqid()]);
                            $output = array(
                                'alert'=>"Email Data Success!",
                            );
                        }
                        // Mail::to($email)->send(new emailRecruitmentOnline($details));
                    }
                }else if ($toEmail == "Haven't received an invite") {
                    $details = [
                        'tanggal' => $tanggal,
                        'time' => $time,
                        'link' => $link,
                        'mailValue' => $mailValue
                        ];
                    $idTest = uniqid();
                    //get emails all
                    $emails = DB::table('recruitment as a')
                                ->select(db::raw('a.id, a.email,a.name, case when a.id=b.id_mt then 0 else 1 end as emails'))
                                ->leftJoin('recruitment__email as b','a.id','=','b.id_mt')
                                ->get();
                    if($emails)
                    {
                        foreach ($emails as $value) {
                            if ($value->emails=="1") {
                                $email=$value->email;
                                $users=$value->name;
                                $password=substr(md5($users, false), 0, 12);
                                $details['name']= $value->name;
                                $details['password']= $password;
                                DB::table('recruitment__email')
                                        ->insert(['id'=>uniqid()
                                                    ,'id_mt'=>$value->id
                                                    ,'link'=>$link
                                                    ,'user'=>$users
                                                    ,'password'=>$password
                                                    ,'status'=>1]);
                                DB::table('recruitment')->where('id',$value->id)
                                                    ->update(['id_test'=>$idTest]);
                                $output = array(
                                    'alert'=>"Email Data Success!",
                                );
                                Mail::to($email)->send(new emailRecruitmentOnline($details));
                            }else{
                                $output = array(
                                    'alert'=>"All Email have email recruitment!",
                                );
                            }
                        }
                    }else{
                        $output = array(
                            'alert'=>"Empty Data",
                        );
                    }
                }
            }
        //
        // table
        $dataImport = DB::table('recruitment as a')
            ->select('a.*',DB::raw('(case when b.status = "Accept" then "Accept" when b.status = "Reject" then "Reject" else 0 end) as status'),
                    DB::raw('(case when c.id is null then 0 else 1 end) as status_email'))
            ->leftJoin('recruitment__status as b','a.id','b.id_mt')
            ->leftJoin('recruitment__email as c','a.id','c.id_mt')
            ->get();
            $tableImport = $this->showTable($dataImport);
            $output['tableImport']=$tableImport;
        return response()->json($output);  

    }*/
    public function showSelectCandidate(Request $request)
    {
        $select = DB::table('recruitment')->orderBy('name','ASC')->get();
        $option="<option>Select Candidate</option>";
        foreach($select as $a)
        {
            $option.='<option value="'.$a->name.'">'.$a->name.'</option>';
        }
        $output = array(
            'option'=>$option,
        );
        return response()->json($output);  
    }

    //test recruitment
        public function recruitment_index()
        {
            return view('recruitment.content.index_test');
        }
        public function result_index(Request $request)
        {
            if ($request->id_mt) {
                $data = db::table('recruitment__hasil_test as a')
                        ->select('a.*','b.name','b.age','b.nama_kampus','b.alamat','b.pengalaman_kerja')
                        ->join('recruitment as b','a.id_mt','=','b.id')
                        ->where('b.id',$request->id_mt)
                        ->get();
                $dataNilai = recruitment__hasil_test::select('id_mt','bagian',db::raw('sum(nilai) as nilai'))
                        ->where('id_mt',$request->id_mt)
                        ->orderBy('bagian')
                        ->groupBy('id_mt')
                        ->groupBy('bagian')->get();
            }else{
                $data = db::table('recruitment__hasil_test as a')
                    ->select('a.*','b.name','b.age','b.nama_kampus','b.alamat','b.pengalaman_kerja')
                    ->join('recruitment as b','a.id_mt','=','b.id')
                    ->get();
                $dataNilai = recruitment__hasil_test::select('id_mt','bagian',db::raw('sum(nilai) as nilai'))
                    ->orderBy('bagian')
                    ->groupBy('id_mt')
                    ->groupBy('bagian')->get();
            }
            //biodata
               
                foreach ($data as $a ) {
                    $id_mt[$a->id_mt]=$a->id_mt;
                    $name[$a->id_mt]=$a->name;
                    $age[$a->id_mt]=$a->age;
                    $nama_kampus[$a->id_mt]=$a->nama_kampus;
                    $alamat[$a->id_mt]=$a->alamat;
                    $pengalaman_kerja[$a->id_mt]=$a->pengalaman_kerja;
                }
                    foreach ($id_mt as $a) {
                        $id_mtArr[]=$a;
                    }
                    foreach ($name as $a) {
                        $nameArr[]=$a;
                    }
                    foreach ($age as $a) {
                        $ageArr[]=$a;
                    }
                    foreach ($nama_kampus as $a) {
                        $nama_kampusArr[]=$a;
                    }
                    foreach ($alamat as $a) {
                        $alamatArr[]=$a;
                    }
                    foreach ($pengalaman_kerja as $a) {
                        $pengalaman_kerjaArr[]=$a;
                    }
            //table
                //data soal
                    $dataSoal = recruitment__soal::select('bagian',db::raw('count(bagian) as countBagian'))
                                            ->orderBy('bagian')
                                            ->groupBy('bagian')->get();
                    $arrSoal=[];
                    foreach ($dataSoal as $a ) {
                        $arrSoal['kode_test'][]=$a->bagian;
                        $arrSoal['countBagian'][]=$a->countBagian;
                    }
                    $arrSoal['score_per_quetion'][]=1.25;
                    $arrSoal['score_per_quetion'][]=1.25;
                    $arrSoal['score_per_quetion'][]=3.125;
                    $arrSoal['score_per_quetion'][]=1;

                    $arrSoal['target'][]=25;
                    $arrSoal['target'][]=25;
                    $arrSoal['target'][]=25;
                    $arrSoal['target'][]=25;

                    foreach ($dataNilai as $a ) {
                        $resultTest[$a->id_mt][]=$a->nilai;
                    }
                    //change index resultTest
                        $index = 0;
                        foreach ($resultTest as $key => $a) {
                            foreach ($a as $key2 => $b) {
                                $arrSoal['resultTest'][$index][]=$b;
                            }
                            $index ++;
                        }
                    $scalarScore=0;
                    for ($y=0; $y < count($arrSoal['resultTest']); $y++) { 
                        $table = '';
                        for ($i=0; $i < count($arrSoal['kode_test']); $i++) { 
                            $arrTotal[$y][]=$arrSoal['score_per_quetion'][$i]*$arrSoal['resultTest'][$y][$i];
                            $scalarScore += $arrTotal[$y][$i];
                            $kode_test_chart[$y][]=$arrSoal['kode_test'][$i];
                            $target_chart[$y][]=$arrSoal['target'][$i];
                            $result_chart[$y][]=$arrSoal['resultTest'][$y][$i];
                            $table .='<tr>
                                    <td>'.$arrSoal['kode_test'][$i].'</td>
                                    <td>'.$arrSoal['countBagian'][$i].'</td>
                                    <td>'.$arrSoal['score_per_quetion'][$i].'</td>
                                    <td>'.$arrSoal['resultTest'][$y][$i].'</td>
                                    <td>'.$arrSoal['target'][$i].'</td>
                                    <td>'.$arrTotal[$y][$i].'</td>
                                </tr>';
                        }
                        $arrTable[]=$table;
                        $totalScore[]=$scalarScore;
                    }
                    

            $output = array(
                'arrTotal'=>$arrTotal,
                'table'=>$arrTable,
                'totalScore'=>$totalScore,
                'arrSoal'=>$arrSoal,
                'id_mt'=>$id_mtArr,
                'name'=>$nameArr,
                'age'=>$ageArr,
                'nama_kampus'=>$nama_kampusArr,
                'alamat'=>$alamatArr,
                'pengalaman_kerja'=>$pengalaman_kerjaArr,
                'kode_test_chart'=>$kode_test_chart,
                'target_chart'=>$target_chart,
                'result_chart'=>$result_chart,
            );
            return response()->json($output);
        }
        public function result_search(Request $request)
        {
            $name = $request->name;
             //biodata
                $data = db::table('recruitment__hasil_test as a')
                        ->select('a.*','b.name','b.age','b.nama_kampus','b.alamat','b.pengalaman_kerja')
                        ->join('recruitment as b','a.id_mt','=','b.id')
                        ->get();
                foreach ($data as $a ) {
                    $id_mt[$a->id_mt]=$a->id_mt;
                    $name[$a->id_mt]=$a->name;
                    $age[$a->id_mt]=$a->age;
                    $nama_kampus[$a->id_mt]=$a->nama_kampus;
                    $alamat[$a->id_mt]=$a->alamat;
                    $pengalaman_kerja[$a->id_mt]=$a->pengalaman_kerja;
                }
                    foreach ($id_mt as $a) {
                        $id_mtArr[]=$a;
                    }
                    foreach ($name as $a) {
                        $nameArr[]=$a;
                    }
                    foreach ($age as $a) {
                        $ageArr[]=$a;
                    }
                    foreach ($nama_kampus as $a) {
                        $nama_kampusArr[]=$a;
                    }
                    foreach ($alamat as $a) {
                        $alamatArr[]=$a;
                    }
                    foreach ($pengalaman_kerja as $a) {
                        $pengalaman_kerjaArr[]=$a;
                    }
                //table
                //data soal
                    $dataSoal = recruitment__soal::select('bagian',db::raw('count(bagian) as countBagian'))
                                            ->orderBy('bagian')
                                            ->groupBy('bagian')->get();
                    $arrSoal=[];
                    foreach ($dataSoal as $a ) {
                        $arrSoal['kode_test'][]=$a->bagian;
                        $arrSoal['countBagian'][]=$a->countBagian;
                    }
                    $arrSoal['score_per_quetion'][]=1.25;
                    $arrSoal['score_per_quetion'][]=1.25;
                    $arrSoal['score_per_quetion'][]=3.125;
                    $arrSoal['score_per_quetion'][]=1;

                    $arrSoal['target'][]=25;
                    $arrSoal['target'][]=25;
                    $arrSoal['target'][]=25;
                    $arrSoal['target'][]=25;

                    $dataNilai = recruitment__hasil_test::select('id_mt','bagian',db::raw('sum(nilai) as nilai'))
                                            ->orderBy('bagian')
                                            ->groupBy('id_mt')
                                            ->groupBy('bagian')->get();
                    foreach ($dataNilai as $a ) {
                        $resultTest[$a->id_mt][]=$a->nilai;
                    }
                    //change index resultTest
                        $index = 0;
                        foreach ($resultTest as $key => $a) {
                            foreach ($a as $key2 => $b) {
                                $arrSoal['resultTest'][$index][]=$b;
                            }
                            $index ++;
                        }
                    $scalarScore=0;
                    for ($y=0; $y < count($arrSoal['resultTest']); $y++) { 
                        $table = '';
                        for ($i=0; $i < count($arrSoal['kode_test']); $i++) { 
                            $arrTotal[$y][]=$arrSoal['score_per_quetion'][$i]*$arrSoal['resultTest'][$y][$i];
                            $scalarScore += $arrTotal[$y][$i];
                            $kode_test_chart[$y][]=$arrSoal['kode_test'][$i];
                            $target_chart[$y][]=$arrSoal['target'][$i];
                            $result_chart[$y][]=$arrSoal['resultTest'][$y][$i];
                            $table .='<tr>
                                    <td>'.$arrSoal['kode_test'][$i].'</td>
                                    <td>'.$arrSoal['countBagian'][$i].'</td>
                                    <td>'.$arrSoal['score_per_quetion'][$i].'</td>
                                    <td>'.$arrSoal['resultTest'][$y][$i].'</td>
                                    <td>'.$arrSoal['target'][$i].'</td>
                                    <td>'.$arrTotal[$y][$i].'</td>
                                </tr>';
                        }
                        $arrTable[]=$table;
                        $totalScore[]=$scalarScore;
                    }
                    

                $output = array(
                'arrTotal'=>$arrTotal,
                'table'=>$arrTable,
                'totalScore'=>$totalScore,
                'arrSoal'=>$arrSoal,
                'name'=>$nameArr,
                'age'=>$ageArr,
                'nama_kampus'=>$nama_kampusArr,
                'alamat'=>$alamatArr,
                'pengalaman_kerja'=>$pengalaman_kerjaArr,
                'kode_test_chart'=>$kode_test_chart,
                'target_chart'=>$target_chart,
                'result_chart'=>$result_chart,
                );
                return response()->json($output);

        }
    public function tanggalTest()
    {
        $dateDB = DB::table('recruitment__test')->where('tanggal_test','>=',DB::raw('curdate()'))->get();
        $selectDateTest = "<option>Select Date Test</option>";
        foreach ($dateDB as $key => $a) {
            $selectDateTest.='<option value="'.$a->tanggal_test.'">'.$a->tanggal_test.'</option>';
        }
        $output = array(
            'success'=>"Update Data Successfull!",
            'selectDateTest'=>$selectDateTest,
        );
        return response()->json($output); 
    }
    public function searchDataCandidate(Request $request)
    {
        $tanggal_test=$request->tanggal;
        $dataCandidate = DB::table('recruitment as a')
                            ->join('recruitment__test as b','a.id_test','=','b.id')
                            ->where('b.tanggal_test',$tanggal_test)
                            ->get();
        $tableCandidate = "";
        foreach ($dataCandidate as $key => $a) {
            $tableCandidate .= '<tr>
                                    <th>'.$a->name.'</th>
                                    <th>'.$a->nama_kampus.'</th>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input radioCandidate" name="present" type="radio" value="present">
                                            <label class="form-check-label" for="defaultCheck1">
                                                Present
                                            </label>
                                        </div>
                                    </th>
                                </tr>';
        }
    }
    public function download_file_excel()
    {
        $file= public_path('file/excel/recruitment/Master.xlsx');

        $headers = array(
                'Content-Type: application/excel',
                );

        return Response::download($file, 'Master.xlsx', $headers);
    }
    public function test()
    {
        return view('recruitment.test.index');
    }
    public function test_main(Request $request)
    {
        if (empty($request->userName)) {
            return redirect('/recruitment/test');
        }
        $validated = $request->validate([
            'userName' => 'required',
            'password' => 'required',
        ]);
        $user = $request->userName;
        $password = $request->password;
        $data = recruitment_email::where('user',$user)->where('password',$password)->first();
        if (!$data) {
            return Redirect::back()->withErrors(['msg' => 'Email / Password Wrong!']);
        }
        return view('recruitment.test.main',['user'=>$user,'id_mt'=>$data->id_mt]);
    }
    public function show_quis(Request $request)
    {
        $test = $request->test;
        $id_mt = $request->id_mt;
        $noSoal='';
        $timeTest = Carbon::now();
        //check candidate test atau belum
            $check_status_test = recruitment__candidate_test_time::where('bagian',$test)->where('id_mt',$id_mt)->get();
            if (empty($check_status_test)) {
                $output = array(
                    'alert'=>'no',
                    'check_status_test'=>$check_status_test
                );
                return response()->json($output);
            }
        $data = recruitment__soal::where('bagian',$test)->get();
        foreach ($data as $a ) {
            $noSoal.='<li class="page-item"><a class="page-link collapsePage" id="page-no-'.$a->id.'" href="#">'.$a->id.'</a></li>';
        }
        $start_timer = recruitment__candidate_test_time::insert(['id_mt'=>$id_mt,'bagian'=>$test,'created_at'=>$timeTest]);
        $output = array(
            'noSoal'=>$noSoal,
        );
        return response()->json($output);
    }
    public function soal_jawaban(Request $request)
    {
        $test = $request->test;
        $no = $request->no;
        $id_mt = $request->id_mt;
        $jawaban = '';
        $pilihan = "";
        $data = DB::table('recruitment__soal as a')
                    ->select('a.*','b.pilihan','b.jawaban','b.type as type_jawaban')
                    ->join('recruitment__soal_jabawan as b','a.id','b.id_soal')
                    ->where('a.bagian',$test)
                    ->where('b.id_soal',$no)
                    ->inRandomOrder()->GET();
        $data_hasil = recruitment__hasil_test::where('id_mt',$id_mt)->where('id_soal',$no)->get();
        foreach ($data_hasil as $a ) {
            $jawaban = $a->jawaban;
        }
        foreach ($data as $a ) {
            if ($a->type == 'image') {
                $soal='<img src="'.asset($a->soal).'" class="rounded mx-auto d-block" alt="...">';
            }else{
                $soal = '<h3>'.$a->soal.'</h3>';
            }
            if ($a->type_jawaban=='image') {
                $pilihan .= '<div class="form-check">
                                <input class="form-check-input jawaban" type="radio" name="jawaban" value="'.$a->jawaban.'">
                                <img src="'.asset($a->pilihan).'" class="rounded mx-auto d-block" alt="...">
                            </div>';
            }else{
                $pilihan .= '<div class="form-check">
                                <input class="form-check-input jawaban" type="radio" name="jawaban" value="'.$a->jawaban.'">
                                <label class="form-check-label" for="flexRadioDefault1">
                                '.$a->pilihan.'
                                </label>
                            </div>';
            }
        }

        $output = array(
            'soal'=>$soal,
            'pilihan'=>$pilihan,
            'jawaban'=>$jawaban
        );
        return response()->json($output);
    }
    public function save_test(Request $request)
    {
         $id_mt=$request->id_mt;
         $no = $request->no;
         $val = $request->val;

         //cek bener atau ga jawaban 
         $hasil = recruitment__soal::where('id',$no)->where('jawaban',$val)->get();
         $cekBagian = recruitment__soal::where('id',$no)->get();
         if (count($hasil)>0) {
            $nilai = 1;
         }else{
            $nilai = 0;
         }
         foreach ($cekBagian as $a ) {
             $bagian = $a->bagian;
         }
         $save = recruitment__hasil_test::updateOrCreate(
            ['id_mt' => $id_mt, 'id_soal' => $no , 'bagian'=>$bagian],
            ['nilai' => $nilai, 'jawaban' => $val, 'created_at'=>Carbon::now()]
         );
         if ($save) {
            $alert = 'the Answer is saved';
         }else{
            $alert = 'Failed';
         }
         $output = array(
            'alert'=>$alert
            );
        return response()->json($output);
    }
    public function check_done(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        $id_mt=$request->id_mt;
        $done = [];
        $bagian = '';
        $noSoal = '';
        $doneBagian=[];
        //cek limit time test
            $limit_time = recruitment_email::where('id_mt',$id_mt)->get();
            foreach ($limit_time as $a ) {
                $time_limit = strtotime($a->time);
            }
            $date_now = strtotime(date("Y-m-d h:i:s"));
            if ($date_now>=$time_limit) {
                $alert = "expired";
                $output = array(
                    'limit_time'=>date("Y-m-d h:i:s",$time_limit),
                    'date_now'=>date("Y-m-d h:i:s",$date_now),
                    'finish'=>$alert
                );
                return response()->json($output);
            } 
        //check hasil test
            $data = recruitment__hasil_test::where('id_mt',$id_mt)->get();
            foreach ($data as $a ) {
                $done[]=$a->id_soal;
                $doneBagian[$a->bagian]=$a->bagian;
            }
        //checkTest time
            $checkTest = recruitment__candidate_test_time::where('id_mt',$id_mt)->get();
            foreach($checkTest as $a)
            {
                $bagian = $a->bagian;
            }
            if ($bagian!='') {
                $data = recruitment__soal::where('bagian',$bagian)->get();
                foreach ($data as $a ) {
                    $noSoal.='<li class="page-item"><a class="page-link collapsePage" id="page-no-'.$a->id.'" href="#">'.$a->id.'</a></li>';
                }
                $output = array(
                    'bagian'=>$bagian,
                    'noSoal'=>$noSoal,
                    'done'=>$done
                );
                return response()->json($output);
            }
        //check test bagian yang sudah di kerjakan
            foreach($doneBagian as $key => $value)
            {
                $doneBagianArr[]=$value;
            }
        $output = array(
            'bagian'=>$bagian,
            'done'=>$done,
            'doneBagian'=>$doneBagianArr
        );
        return response()->json($output);
    }
    public function check_time(Request $request)        
    {
        $id_mt = $request->id_mt;
        $test = $request->test;
        $check = recruitment__candidate_test_time::where('id_mt',$id_mt)->where('bagian',$test)->get();
        foreach($check as $a){
            $timeTest = $a->created_at;
        }
        $output = array(
            'timeTest'=>$timeTest,
        );
        return response()->json($output);
    }
    public function remove_time(Request $request)
    {
        $id_mt = $request->id_mt;
        recruitment__candidate_test_time::where('id_mt',$id_mt)->delete();
    }
    public function show_testOnline(Request $request)
    {
        $data = recruitment_email::where('id_mt',$request->id_mt)->get();
        foreach ($data as $a ) {
            $time = $a->time;
            $link = $a->link_ms_teams;
        }
        $output = array(
            'time'=> date('l jS \of F Y h:i:s A',strtotime($time)),
            'link'=>$link
        );
        return response()->json($output);
    }
}
