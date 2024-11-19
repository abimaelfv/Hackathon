<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PersonasController extends Controller
{

    public function create()
    {
        $this->authorize('datos');

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

    public function buscar($codigo)
    {
        try {
            if (isset($codigo)) {
                $dni = trim($codigo);

                $usuario = User::where('codigo', $dni)->where('estado', 1)
                    ->select('codigo', 'name', 'apellidos')
                    ->first();
                if (!$usuario) {
                    $usuario = Personas::where('per_codigo', $dni)->where('per_estado', 1)
                        ->select('per_codigo as codigo', 'per_nombres as name', 'per_apellidos as apellidos')
                        ->first();
                }
                if ($usuario) {
                    $response = ['status' => true, 'data' => $usuario];
                } else {
                    throw new \Exception('No encontrado. Solicite al estudiante que se registre.');
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
}
