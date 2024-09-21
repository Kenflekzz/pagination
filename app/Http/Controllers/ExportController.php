<?php

namespace App\Http\Controllers;

use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        // Use Excel::download, not StudentsExport::export
        return Excel::download(new StudentsExport, 'students.xlsx');
    }
}