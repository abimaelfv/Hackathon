<?php

namespace App\Http\Controllers;

use App\Models\Inscripciones;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;

class InscripcionesController extends Controller
{
    public function view($id)
    {
        try {
            if (isset($id)) {
                $id = trim($id);
                $inscripcion = Inscripciones::with('integrantes.user')->find($id);
                if ($inscripcion) {
                    $response = ['status' => true, 'data' => $inscripcion];
                } else {
                    throw new \Exception('No se encontro registros.');
                }
            } else {
                throw new \Exception('Datos requeridos incompletos.');
            }
            return response()->json($response);
        } catch (\Exception $e) {
            $response = ['status' => false, 'msg' => $e->getMessage()];
            return response()->json($response);
        }
    }

    public function exportar()
    {
        $equipos = Inscripciones::where('ins_estado', 1)
            ->with('integrantes.user')
            ->get();

        // Cargar la plantilla
        $templatePath = resource_path('plantillas/inscripciones.xlsx');
        $spreadsheet = IOFactory::load($templatePath);

        // Obtener la hoja activa
        $sheet = $spreadsheet->getActiveSheet();

        // Inicializar el índice de fila
        $rowIndex = 4;

        foreach ($equipos as $i => $equipo) {
            $integrantes = $equipo->integrantes;
            $combinar = $rowIndex + count($integrantes) - 1;

            $sheet->insertNewRowBefore($rowIndex, count($integrantes));

            // Combinar celdas
            if (count($integrantes) > 1) {
                $sheet->mergeCells('B' . $rowIndex . ':B' . $combinar);
                $sheet->mergeCells('C' . $rowIndex . ':C' . $combinar);
                $sheet->mergeCells('D' . $rowIndex . ':D' . $combinar);
            }

            // Escribir celdas combinadas
            $sheet->setCellValue('B' . $rowIndex, $i + 1);
            $sheet->setCellValue('C' . $rowIndex, $equipo->ins_categoria);
            $sheet->setCellValue('D' . $rowIndex, $equipo->ins_equipo);

            // Escribir a los participantes
            foreach ($integrantes as $integrante) {
                $nombre = $integrante->user->name . ', ' . $integrante->user->apellidos;
                $sheet->setCellValue('E' . $rowIndex, $integrante->user->documento);
                $sheet->setCellValue('F' . $rowIndex, $integrante->user->codigo);
                $sheet->setCellValue('G' . $rowIndex, $integrante->user->email);
                $sheet->setCellValue('H' . $rowIndex, $nombre);
                $sheet->setCellValue('I' . $rowIndex, $integrante->user->genero);
                $rowIndex++;
            }
        }

        // Objeto de escritura en memoria
        $writer = new Xlsx($spreadsheet);

        // Nombre del archivo
        $filename = 'PARTICIPANTES HACKATHON ' . date('Y-m-d H-i') . '.xlsx';
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        // Devolver el archivo como una descarga
        return Response::stream(function () use ($writer) {
            $writer->save('php://output');
        }, 200, $headers);
    }
}
