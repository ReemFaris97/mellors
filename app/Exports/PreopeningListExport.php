<?php

namespace App\Exports;

use App\Models\PreopeningList;
use Maatwebsite\Excel\Concerns\FromCollection;

class PreopeningListExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PreopeningList::all();
    }
}
