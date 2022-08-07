<?php

namespace App\Export;

use App\Models\RespUserTemp;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ExcelExport implements FromView
{

    public function view(): View {
        return view('Plantilla_Export.excel', [
            'data' => RespUserTemp::all(),
            'filename' => date('dmY_his').'.jpeg',
            'delete' => RespUserTemp::whereNotNull('id')->delete()
        ]);
    }
    
}