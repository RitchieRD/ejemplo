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

        // Obtener formato ---------------

        $lista_formatos = [];

        $columna = 'B';
        $fila = 3;

        while ($columna != 'E') {

            $formato = $sheet->getStyle($columna . $fila)->exportArray();

            $lista_formatos[] = $formato;

            $columna++;
        }

        // Insertar datos ----------------

        $columna = 'B';
        $fila = 3;
        $indice = 0;

        foreach ($data as $key => $item) {

            foreach ($item as $key => $subitem) {

                $sheet->setCellValue($columna . $fila, $subitem);
                $sheet->getStyle($columna . $fila)->applyFromArray($lista_formatos[$indice]);

                $columna++;
                $indice++;
            }

            $columna = 'B';
            $fila++;
            $indice = 0;
        }

        // Guardar copia ----------------

        $ubicacion = './temp_files/plantilla_copia.xlsx';

        $writer = new Xlsx($spread_sheet);
        $writer->save($_SERVER['DOCUMENT_ROOT'] . $ubicacion);

        // Generar PDF ------------------

        $xlsx_file = public_path('temp_files/plantilla_copia.xlsx');
        $pdf_file = public_path('temp_files/plantilla_copia.pdf');

        $command = env('LIBREOFFICE') . " --headless --convert-to pdf $xlsx_file --outdir " . dirname($pdf_file);
        shell_exec($command);

        return $pdf_file;
    }
}
