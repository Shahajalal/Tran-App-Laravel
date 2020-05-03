<?php

namespace App\Imports;

use App\Recipientlist;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUsers implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Recipientlist([
            'user_id'           => $row[0],
            'name'              => $row[1], 
            'father'            => $row[2], 
            'mother'            => $row[3],
            'mobile'            => $row[4],
            'national_id'       => $row[5],
            'occupation'        => $row[6],
            'family_member'     => $row[7],
            'jela'              => $row[8],
            'upojela'           => $row[9],
            'word'              => $row[10],
            'easy_way'          => $row[11],
            'permanent_address' => $row[12],
            'comment'           => $row[13],
            'status'            =>'0',
        ]);
    }
}
