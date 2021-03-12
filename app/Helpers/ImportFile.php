<?php

namespace App\Helpers;

use Validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\HeadingRowImport;

/**
 * Helper to the upload file
 */
class ImportFile
{
	/**
     * All columns of the file.
     *
     * @var Array
     */
	const COLUMNS = [
        "campo",
        "numero_de_venta",
        "tipo_de_doc",
        "numero_de_doc",
        "establecimiento",
        "tipo_de_operacion",
        "tipo_de_comprobante",
        "moneda",
        "fecha_de_emision",
        "fecha_de_vencimiento",
        "formas_de_pago",
        "observaciones_de_comprobante",
        "codigo_item",
        "descripcion_de_item",
        "unidad",
        "cantidad",
        "precio_unitario",
        "subtotal",
        "impuestos",
        "codigo_de_destino",
        "serie",
    ];

	/**
	 * verify that it is the correct import file.
	 *
	 * @param Illuminate\Http\Request $request
	 *
	 * @return boolean
	 */
	public static function isCorrectImportFile($file)
	{
		$headings = (new HeadingRowImport)->toArray($file);
		//se obtiene la diferencia de columnas entre los archivos
		$diff =  array_diff(self::COLUMNS, array_filter($headings[0][0]));
		//si es igual a 0 no hay diferencia es el archivo correcto
		if (count($diff) > 0 ) {
			return false;
		}
		return true;
	}
}
