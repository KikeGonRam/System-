<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    public function holaMundo()
    {
        return view('prueba.hola-mundo', [
            'mensaje' => '¡Hola Mundo! Sistema Escolar en Laravel 10.  ESTA ES UNA PRUEBA '
        ]);
    }
}
