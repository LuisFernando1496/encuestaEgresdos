<?php

namespace App\Exports;

use App\Models\RespUserTemp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ExcelExport implements FromCollection, FromView
{

    public function view(): View {
        return view('Plantilla_Export.excel', [
            'data' => RespUserTemp::all()
        ]);
    }
    public function collection()
    {
            
    }

}