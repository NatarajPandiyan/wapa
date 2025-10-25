<?php

namespace App\Imports;

use App\Models\customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PustomersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
      public function __construct($group_id)
    {
        $this->group_id = $group_id;
    }

    public function model(array $row)
    {
        return new customer([
            
            'name'=> $row['name'],
            'mobile'=> $row['mobile'],
            'email'=> $row['email'],
            'group_id'=> $this->group_id,
        ]);
    }
}
