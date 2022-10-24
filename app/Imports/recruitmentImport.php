<?php

namespace App\Imports;

use App\Models\Recruitment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class recruitmentImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
    public function model(array $row)
    {
        // isset condition
            if(isset($row['tanggal']))
            {
                $row0=$this->transformDate($row['tanggal']);
            }else{
                $row0="";
            }
            if(isset($row['name']))
            {
                $row1=$row['name'];
            }else{
                $row1="";
            }
            if(isset($row['age']))
            {
                $row2=$row['age'];
            }else{
                $row2="";
            }
            if(isset($row['bachelors_degree']))
            {
                $row3=$row['bachelors_degree'];
            }else{
                $row3="";
            }
            if(isset($row['email']))
            {
                $row4=$row['email'];
            }else{
                $row4="";
            }
            if(isset($row['phone_number']))
            {
                $row5=$row['phone_number'];
            }else{
                $row5="";
            }
            if(isset($row['cv']))
            {
                $row6=$row['cv'];
            }else{
                $row6="";
            }
            if(isset($row['ijazah']))
            {
                $row7=$row['ijazah'];
            }else{
                $row7="";
            }
            if(isset($row['kk']))
            {
                $row8=$row['kk'];
            }else{
                $row8="";
            }
            if(isset($row['ktp']))
            {
                $row9=$row['ktp'];
            }else{
                $row9="";
            }
            if(isset($row['skck']))
            {
                $row10=$row['skck'];
            }else{
                $row10="";
            }
            if(isset($row['kartu_sehat']))
            {
                $row11=$row['kartu_sehat'];
            }else{
                $row11="";
            }
            if(isset($row['transkrip_nilai']))
            {
                $row12=$row['transkrip_nilai'];
            }else{
                $row12="";
            }
            if(isset($row['vaksin_1']))
            {
                $row13=$row['vaksin_1'];
            }else{
                $row13="";
            }
            if(isset($row['vaksin_2']))
            {
                $row14=$row['vaksin_2'];
            }else{
                $row14="";
            }
            if(isset($row['nama_kampus']))
            {
                $row15=$row['nama_kampus'];
            }else{
                $row15="";
            }
            if(isset($row['program_pendidikan']))
            {
                $row16=$row['program_pendidikan'];
            }else{
                $row16="";
            }
            if(isset($row['alamat']))
            {
                $row17=$row['alamat'];
            }else{
                $row17="";
            }
            if(isset($row['pengalaman_kerja']))
            {
                $row18=$row['pengalaman_kerja'];
            }else{
                $row18="";
            }
            if(isset($row['lama_bekerja']))
            {
                $row19=$row['lama_bekerja'];
            }else{
                $row19="";
            }
            if(isset($row['referesnsi']))
            {
                $row20=$row['referesnsi'];
            }else{
                $row20="";
            }

        return new Recruitment([
            'tanggal'=>$row0,
            'name'=>$row1,
            'age'=>$row2,
            'bachelors_degree'=>$row3,
            'email'=>$row4,
            'phone_number'=>$row5,
            'cv'=>$row6,
            'ijazah'=>$row7,
            'kk'=>$row8,
            'ktp'=>$row9,
            'skck'=>$row10,
            'kartu_sehat'=>$row11,
            'transkrip_nilai'=>$row12,
            'vaksin_1'=>$row13,
            'vaksin_2'=>$row14,
            'nama_kampus'=>$row15,
            'program_pendidikan'=>$row16,
            'alamat'=>$row17,
            'pengalaman_kerja'=>$row18,
            'lama_bekerja'=>$row19,
            'referesnsi'=>$row20,
        ]);
    }
    
}
