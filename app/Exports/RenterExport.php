<?php

namespace App\Exports;

use App\Renter;
use Maatwebsite\Excel\Concerns\FromCollection;

class RenterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Renter::all();
    }
}
