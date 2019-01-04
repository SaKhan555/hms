<?php

namespace App\Imports;

use App\Renter;
use Maatwebsite\Excel\Concerns\ToModel;

class RenterImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Renter([
            //
        ]);
    }
}
