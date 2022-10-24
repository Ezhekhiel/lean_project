<?php

namespace App\Imports;

use App\siperWeek;
use Maatwebsite\Excel\Concerns\ToModel;

class siperWeekImport implements ToModel
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
        return new siperWeek([
            'cell' => $row[0],
            'po' => $row[1],
            'market' => $row[2],
            'style' => $row[3],
            'width' => $row[4],
            'quantity' => $row[6],
            'balance' => $row[7],
            'exp' => $this->transformDate($row[5]),
            'status' => $row[8],
        ]);
    }
}
