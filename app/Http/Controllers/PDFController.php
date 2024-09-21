<?php

namespace App\Http\Controllers;

use App\Models\Students; // Make sure to import the Student model
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        // Fetch students from the database
        $students = Students::all(); // You can apply filtering or ordering as needed

        // Number of students per page (Pagination setting for PDF)
        $itemsPerPage = 20;

        // Load the view and pass data to it
        $pdf = Pdf::loadView('pdf', [
            'students' => $students,
            'itemsPerPage' => $itemsPerPage,
            'pageNumber' => 1 // Placeholder, updated in page_script
        ]);

        // Return the generated PDF as a download or inline view
        return $pdf->stream('attendance_list.pdf');
    }
}
