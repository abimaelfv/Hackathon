<?php

namespace App\Rules;

use App\Models\Integrantes;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MiembroUnicoEquipo implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where('codigo', $value)->first();

        // Verificar si el usuario ya pertenece a otro equipo
        if ($user && Integrantes::where('user_id', $user->id)->exists()) {
            $fail('El estudiante ya está en otro equipo.');
        }
    }
}
