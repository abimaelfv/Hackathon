<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InscripcionController extends Controller
{
    public function incripcion()
    {
        return Inertia::render('Inscripcion');
    }
}
