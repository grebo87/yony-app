<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ImportFile;
use App\Imports\ExcelToDbfImport;
use Maatwebsite\Excel\Excel;

class ImportToexcelToDbfController extends Controller
{
	private $excel;
	public function __construct(Excel $excel)
	{
		$this->excel = $excel;
	}

	public function create()
	{
		return view('imports.excel-to-dbf');
	}

    public function import(Request $request)
    {
    	$validated = $request->validate([
        	'file' => 'required|file|mimes:csv,xls,xlsx,xlm,xla,xlc,xlt,xlw',
    	],['file.mimes' => 'El arcivo no cumple con el formato requerido']);

    	if ($request->hasFile('file')) {
    		// $validFormatFile = ImportFile::isCorrectImportFile($request->file('file'));
    		// if (!$validFormatFile) {
    		// 	return back()->withErrors(['El archivo no es el correcto, por favor descargue el archivo e intente nuevamente']);
    		// }

    		$this->excel->import(new ExcelToDbfImport, $request->file('file'));
    		// return response()->download(public_path('destination.dbf'));
    		return back()->with('success', 'File imported successfully!');
    	}

    	return back()->withErrors(['No fue posible cargar el archivo']);
    }
}
