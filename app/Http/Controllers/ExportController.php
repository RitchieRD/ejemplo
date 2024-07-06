<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class ExportController extends Controller
{
    public function export(Request $request)
    {

        $usuarios = json_decode($request->usuarios);

        // Ordenar la informacion

        $data = [];

        foreach ($usuarios as $key => $item) {
            $object = (object)[
                'fecha' => $item->fecha,
                'numero' => $item->id,
                'usuario' => $item->usuario
            ];

            $data[] = $object;
        }


        // Leer plantilla ----------------
        $reader =  \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
        $file = './templates/plantilla.xlsx';
        $spread_sheet = $reader->load($file);
        $sheet = $spread_sheet->getActiveSheet();

        // Insertar datos ----------------

        $columna = 'B';
        $fila = 3;

        foreach ($data as $key => $item) {

            foreach ($item as $key => $subitem) {

                $sheet->setCellValue($columna . $fila, $subitem);
                $columna++;
            }

            $columna = 'B';
            $fila++;
        }

        // Guardar copia ----------------

        $ubicacion = './temp_files/plantilla_copia.xlsx';

        $writer = new Xlsx($spread_sheet);
        $writer->save($_SERVER['DOCUMENT_ROOT'] . $ubicacion);

        return $ubicacion;
    }
}
