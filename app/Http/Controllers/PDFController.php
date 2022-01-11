<?php

namespace App\Http\Controllers;

use App\Models\RespuestasUsuarios;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFController extends Controller
{
    public function pdf($idUsario){

        $resUsuario = RespuestasUsuarios::where('id_usuario',$idUsario)->first();
        $usuario = Usuario::where('id_usuario',$idUsario)->first();
        $pdf = PDF::loadView('pdf.tabla',compact('resUsuario','usuario'));
        return $pdf->download('prueba.pdf');


    }
}
