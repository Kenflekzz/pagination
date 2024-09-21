<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
class ImportController extends Controller
{
    public function import(Request $request)

    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);
        
        Excel::import(new StudentsImport, $request->file('file'));

        return back()->with('success', 'Students imported successfully!');
    }
}
