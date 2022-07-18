<?php

namespace App\Exports;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\ContactInformation;
use App\Models\QuestionsRespUser;
use App\Models\CategoryQuestions;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }
}