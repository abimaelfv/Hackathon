<?php

namespace App\Actions\Fortify;

use App\Models\Personas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class CompletarRegistro
{
    public function create()
    {
        $user = Auth::user();
        if (empty($user->se_registro)) {
            $codigo = strtok($user->email, '@');
            $persona = Personas::where('per_codigo', $codigo)->first();
            return Inertia::render(
                'Auth/CompletarRegistro',
                compact('user', 'persona')
            );
        }
        return redirect()->route('panel');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'documento' => ['required', 'integer', 'digits:8'],
            'name' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer', 'digits:9'],
            'genero' => ['required']
        ])->validate();

        $user = User::find(Auth::user()->id);
        $user->codigo = strtok($user->email, '@');
        $user->documento = $request->documento;
        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->genero = $request->genero;
        $user->phone = $request->phone;
        $user->se_registro = 1;

        $user->save();
        return redirect()->intended(route('panel'));
    }
}
