<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use App\Imports\ProductsListImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FileController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function store(ImportFileRequest $request)
    {
        $file = $request->file('file');

        $import = new ProductsListImport;

        Excel::queueImport($import, $file);
echo $import->getRowCount();
        return back()->with('success', 'Excel Data Imported successfully. Row count: ' . $import->getRowCount());

    }
}
