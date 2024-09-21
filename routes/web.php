<?php

use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ImportController;

Route::get('/', function () {
    return view('welcome');

});


Route::get('/generate-pdf', [PDFController::class, 'generatePDF']);
route::get('/export', [ExportController::class, 'export']);
Route::get('/import-form', function () {
    return view('import');
});
route::post('/import', [ImportController::class, 'import'])->name('import');