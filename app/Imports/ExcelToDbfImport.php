<?php

namespace App\Imports;

use org\majkel\dbase\Builder;
use org\majkel\dbase\Format;
use org\majkel\dbase\Field;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\Importable;


class ExcelToDbfImport implements ToCollection,WithHeadingRow
{
	// use Importable;
    /**
    * @param Collection $rows
    */
    public function collection(Collection $rows)
    {
    	$table = Builder::fromFile(public_path('CTC1120.dbf'))
	    ->setFormatType(Format::DBASE3)
	    ->addField(Field::create(Field::TYPE_NUMERIC)->setName('num'))
	    ->build(public_path('destination.dbf'));

       	foreach ($rows as $key => $row) {

	       	$table->insert([
	        	'CTOTAL' =>  floatval($row['importe_total']),
	        	'num'    =>  $row['importe_total']
	    	]);
       	}
    }
}
