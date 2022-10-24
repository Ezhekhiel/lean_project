<?php

namespace App\Imports;

use App\Models\Recruitment;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToArray;

class getArray implements ToArray
{
    private $data;

    public function __construct()
    {
        $this->data = [];
    }
    public function array(array $rows)
    {
        foreach ($rows as $row) {
            $this->data[] = [
                'nama_kampus'=>$row[13],
                'program_pendidikan'=>$row[14],
            ];
            // array('supplier_name' => $row[0], 'material_name' => $row[1], 'spec' => $row[2], 'color_name' => $row[3]);
        }
    }

    public function getArray(): array
    {
        return $this->data;
    }
}
