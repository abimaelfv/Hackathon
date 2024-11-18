<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PersonasController extends Controller
{

    public function create()
    {
        return Inertia::render('Personas/CreateCargar');
    }

    public function importarExcel(Request $request)
    {
        $request->validate([
            'archivo' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {
            $archivo = $request->file('archivo');

            $spreadsheet = IOFactory::load($archivo);  // Leer archivo
            $hoja = $spreadsheet->getActiveSheet();    // Obtener primera hoja
            $filas = $hoja->toArray();  // Convertir en arreglo
            array_shift($filas);        // Eliminar encabezado

            $faileds = [];
            $n_exito = 0;
            foreach ($filas as $fila) {
                // Verificar filas vacías
                if (empty(array_filter($fila))) {
                    continue;
                }
                $nuevo  = [
                    'per_documento' => $fila[0],
                    'per_codigo' => $fila[1],
                    'per_nombres' => $fila[2],
                    'per_apellidos' => $fila[3],
                    'per_email' => $fila[1] . '@udh.edu.pe',
                    'per_genero' => $fila[4],
                    'per_telefono' => $fila[5],
                ];
                if (Personas::where('per_codigo', $nuevo['per_codigo'])->exists()) {
                    $faileds[] = $fila;
                    continue;
                }
                Personas::create($nuevo);
                $n_exito++;
            }
            return Inertia::render('Personas/CreateCargar', [
                'n_exito' => $n_exito,     // Número de registros exitosos
                'faileds' => $faileds,     // Registros fallidos
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }
}
