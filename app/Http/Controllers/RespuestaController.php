<?php

namespace App\Http\Controllers;

use App\Mail\MetodoMail;
use App\Models\topCinco;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Http\Request;
use App\Models\UsuarioRespuesta;
use App\Models\RespuestasUsuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RespuestaController extends Controller
{
    public function verificarRespuestas(Request $datos)
    {

        $respuestasCorrestas = array("c", "a", "a", "b", "c");
        $respuestaUsuario = array();
        $puntajeUsuario = 0;
        for ($i = 0; $i < 5; $i++) {
            //obtiene las respuestas del usuario
            $respuestaUsuario[$i] = $_POST["pregunta" . ($i + 1)];
        }
        for ($i = 0; $i < 5; $i++) {
            //verifica respuestas con las correctas
            if ($respuestaUsuario[$i] == $respuestasCorrestas[$i]) {
                $puntajeUsuario++;
            }
        }
        for ($i = 0; $i < 5; $i++) {
            //Subir respuestas a la tabla usuario_respuesta
            $respuesta = $_POST["pregunta" . ($i + 1)];
            $respuestasUsuario = new UsuarioRespuesta();
            $respuestasUsuario->id_usuario = session('usuario')->id_usuario;
            $respuestasUsuario->numero_pregunta = "pregunta" . ($i + 1);
            $respuestasUsuario->usuario_respuesta = $respuesta;
            $respuestasUsuario->save();
        }
        //Subir respuestas a tabla respuestas_usuario
        $usuarioRes = new RespuestasUsuarios();
        $usuarioRes->id_usuario = session('usuario')->id_usuario;
        $usuarioRes->genero = session('usuario')->genero;
        $usuarioRes->edad = session('usuario')->edad;
        $usuarioRes->puntaje = $puntajeUsuario;
        $usuarioRes->save();

        //enviar correo electronico

        //Mail::to('correoPruebas@correo.com')->send(new MetodoMail());
        //correo prueba josefinah1569delaveg@gmail.com
        //correo prueba producciones.macover@gmail.com
        //Mail::mailer('mailgun')->to('producciones.macover@gmail.com')->send(new MetodoMail());
            return view("resultado",
                ["nombreUsuario" => session('usuario')->nombre_usuario,
                    "correo" => session('usuario')->correo,
                    "puntaje" => $puntajeUsuario,
                    "estatus" => "success"]);

    }

    public function graficas()
    {
        return view("graficas");
        //return response()->json(["mensaje" => "hola"]);
    }

    public function graficasRe(Request $request)
    {

        $respuestasUsuario = RespuestasUsuarios::get();

        return response()->json($respuestasUsuario);
    }

    public function tablaResultados()
    {
        $resultados = RespuestasUsuarios::get();
        return view("tablaResultados", ["resultados" => $resultados]);
    }

    public function detallesUsuario($idUsuario)
    {

        //conseguir el datos generales del usuario
        $datosUsuario = Usuario::where('id_usuario', $idUsuario)->first();
        $nombre_usuario = $datosUsuario->nombre_usuario;
        $edad = $datosUsuario->edad;
        $genero = $datosUsuario->genero;
        $correo = $datosUsuario->correo;

        //conseguir el created at del usaurio
        $respuestasUsuario = RespuestasUsuarios::where('id_usuario', $idUsuario)->first();

        //conseguir los valores de created_at y el puntaje
        $createdAt = $respuestasUsuario->created_at;
        $puntaje = $respuestasUsuario->puntaje;

        //conseguir las respuestas del usaurio clickeado
        $usuarioRespuestas = UsuarioRespuesta::where('created_at', $createdAt)->get();

        $usuarioRespuestasArray = array();

        foreach ($usuarioRespuestas as $uso) {
            $usuarioRespuestasArray[] = $uso->usuario_respuesta;
        }

        return view("respuestasUsuario",
            ["id_usuario" => $idUsuario,
                "nombre_usuario" => $nombre_usuario,
                "edad" => $edad,
                "genero" => $genero,
                "correo" => $correo,
                "created_at" => $createdAt,
                "respuesta1" => $usuarioRespuestasArray[0],
                "respuesta2" => $usuarioRespuestasArray[1],
                "respuesta3" => $usuarioRespuestasArray[2],
                "respuesta4" => $usuarioRespuestasArray[3],
                "respuesta5" => $usuarioRespuestasArray[4],
                "puntaje" => $puntaje
            ]);
    }

    public function mejoresCinco()
    {

        $resultados = RespuestasUsuarios::get();
        $puntajesArray = array();
        $idUsuarios = array();

        for ($i = 0; $i < $resultados->count(); $i++) {

            $idUsuarios[$i]["id_usuario"] = $resultados[$i]["id_usuario"];

        }
        foreach ($resultados as $uso) {

            $puntajesArray[] = $uso->puntaje;

        }
        $idLugares = array();


        arsort($puntajesArray);
        foreach ($puntajesArray as $key => $val) {
            $idLugares[] = $key;
        }

        //sacar ganadores

        $primerLugarId = $idUsuarios[$idLugares[0]]["id_usuario"];
        $segundoLugarId = $idUsuarios[$idLugares[1]]["id_usuario"];
        $tercerLugarId = $idUsuarios[$idLugares[2]]["id_usuario"];
        $cuartoLugarId = $idUsuarios[$idLugares[3]]["id_usuario"];
        $quintoLugarId = $idUsuarios[$idLugares[4]]["id_usuario"];

        //puntajes
        $puntajeId1 = RespuestasUsuarios::where('id_usuario', $primerLugarId)->first();
        $puntajeId2 = RespuestasUsuarios::where('id_usuario', $segundoLugarId)->first();
        $puntajeId3 = RespuestasUsuarios::where('id_usuario', $tercerLugarId)->first();
        $puntajeId4 = RespuestasUsuarios::where('id_usuario', $cuartoLugarId)->first();
        $puntajeId5 = RespuestasUsuarios::where('id_usuario', $quintoLugarId)->first();

        //conseguir los datos generales del primer lugar
        $datosUsuario1 = Usuario::where('id_usuario', $primerLugarId)->first();
        $nombre_usuario1 = $datosUsuario1->nombre_usuario;
        $edad1 = $datosUsuario1->edad;
        $genero1 = $datosUsuario1->genero;
        $puntaje1 = $puntajeId1->puntaje;

        //conseguir los datos generales del segundo lugar
        $datosUsuario2 = Usuario::where('id_usuario', $segundoLugarId)->first();
        $nombre_usuario2 = $datosUsuario2->nombre_usuario;
        $edad2 = $datosUsuario2->edad;
        $genero2 = $datosUsuario2->genero;
        $puntaje2 = $puntajeId2->puntaje;

        //conseguir los datos generales del tercer lugar
        $datosUsuario3 = Usuario::where('id_usuario', $tercerLugarId)->first();
        $nombre_usuario3 = $datosUsuario3->nombre_usuario;
        $edad3 = $datosUsuario3->edad;
        $genero3 = $datosUsuario3->genero;
        $puntaje3 = $puntajeId3->puntaje;

        //conseguir los datos generales del cuarto lugar
        $datosUsuario4 = Usuario::where('id_usuario', $cuartoLugarId)->first();
        $nombre_usuario4 = $datosUsuario4->nombre_usuario;
        $edad4 = $datosUsuario4->edad;
        $genero4 = $datosUsuario4->genero;
        $puntaje4 = $puntajeId4->puntaje;

        //conseguir los datos generales del quinto lugar
        $datosUsuario5 = Usuario::where('id_usuario', $quintoLugarId)->first();
        $nombre_usuario5 = $datosUsuario5->nombre_usuario;
        $edad5 = $datosUsuario5->edad;
        $genero5 = $datosUsuario5->genero;
        $puntaje5 = $puntajeId5->puntaje;

        return view("topMejores", [
            //persona1
            "id1" => $primerLugarId,
            "nombre1" => $nombre_usuario1,
            "edad1" => $edad1,
            "genero1" => $genero1,
            "puntaje1" => $puntaje1,
            //persona2
            "id2" => $segundoLugarId,
            "nombre2" => $nombre_usuario2,
            "edad2" => $edad2,
            "genero2" => $genero2,
            "puntaje2" => $puntaje2,
            //persona3
            "id3" => $tercerLugarId,
            "nombre3" => $nombre_usuario3,
            "edad3" => $edad3,
            "genero3" => $genero3,
            "puntaje3" => $puntaje3,
            //persona4
            "id4" => $cuartoLugarId,
            "nombre4" => $nombre_usuario4,
            "edad4" => $edad4,
            "genero4" => $genero4,
            "puntaje4" => $puntaje4,
            //persona5
            "id5" => $quintoLugarId,
            "nombre5" => $nombre_usuario5,
            "edad5" => $edad5,
            "genero5" => $genero5,
            "puntaje5" => $puntaje5,
        ]);

    }

    public function peoresCinco()
    {

        $usuarioPuntaje = RespuestasUsuarios::orderBy('puntaje', 'ASC')->get();

        $primerLugarId = $usuarioPuntaje[0]["id_usuario"];
        $segundoLugarId = $usuarioPuntaje[1]["id_usuario"];
        $tercerLugarId = $usuarioPuntaje[2]["id_usuario"];
        $cuartoLugarId = $usuarioPuntaje[3]["id_usuario"];
        $quintoLugarId = $usuarioPuntaje[4]["id_usuario"];

        //conseguir los datos generales del primer lugar
        $datosUsuario1 = Usuario::where('id_usuario', $primerLugarId)->first();
        $nombre_usuario1 = $datosUsuario1->nombre_usuario;
        $edad1 = $datosUsuario1->edad;
        $genero1 = $datosUsuario1->genero;
        $puntaje1 = $usuarioPuntaje[0]["puntaje"];

        //conseguir los datos generales del segundo lugar
        $datosUsuario2 = Usuario::where('id_usuario', $segundoLugarId)->first();
        $nombre_usuario2 = $datosUsuario2->nombre_usuario;
        $edad2 = $datosUsuario2->edad;
        $genero2 = $datosUsuario2->genero;
        $puntaje2 = $usuarioPuntaje[1]["puntaje"];

        //conseguir los datos generales del tercer lugar
        $datosUsuario3 = Usuario::where('id_usuario', $tercerLugarId)->first();
        $nombre_usuario3 = $datosUsuario3->nombre_usuario;
        $edad3 = $datosUsuario3->edad;
        $genero3 = $datosUsuario3->genero;
        $puntaje3 = $usuarioPuntaje[2]["puntaje"];

        //conseguir los datos generales del cuarto lugar
        $datosUsuario4 = Usuario::where('id_usuario', $cuartoLugarId)->first();
        $nombre_usuario4 = $datosUsuario4->nombre_usuario;
        $edad4 = $datosUsuario4->edad;
        $genero4 = $datosUsuario4->genero;
        $puntaje4 = $usuarioPuntaje[3]["puntaje"];

        //conseguir los datos generales del quinto lugar
        $datosUsuario5 = Usuario::where('id_usuario', $quintoLugarId)->first();
        $nombre_usuario5 = $datosUsuario5->nombre_usuario;
        $edad5 = $datosUsuario5->edad;
        $genero5 = $datosUsuario5->genero;
        $puntaje5 = $usuarioPuntaje[4]["puntaje"];

        return view("topPeores", [
            //persona1
            "id1" => $primerLugarId,
            "nombre1" => $nombre_usuario1,
            "edad1" => $edad1,
            "genero1" => $genero1,
            "puntaje1" => $puntaje1,
            //persona2
            "id2" => $segundoLugarId,
            "nombre2" => $nombre_usuario2,
            "edad2" => $edad2,
            "genero2" => $genero2,
            "puntaje2" => $puntaje2,
            //persona3
            "id3" => $tercerLugarId,
            "nombre3" => $nombre_usuario3,
            "edad3" => $edad3,
            "genero3" => $genero3,
            "puntaje3" => $puntaje3,
            //persona4
            "id4" => $cuartoLugarId,
            "nombre4" => $nombre_usuario4,
            "edad4" => $edad4,
            "genero4" => $genero4,
            "puntaje4" => $puntaje4,
            //persona5
            "id5" => $quintoLugarId,
            "nombre5" => $nombre_usuario5,
            "edad5" => $edad5,
            "genero5" => $genero5,
            "puntaje5" => $puntaje5,
        ]);
    }

}

/*
   * $(document).ready(function (){
          let idUsuario = 0;
          @foreach($resultados as $uso)
          $("#detallesUsuario{{$loop->index + 1}}").click(function (){
              console.log("click al boton"+{{$loop->index + 1}});
              console.log("con el id "+ {{$uso->id_usuario}});
              $.ajax({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  type: "get",
                  url: "{{route('detalles.usuario')}}/{{$uso->id_usuario}}",
                  dataType: 'json',
                  cache: false,
                  success: function (data) {
                      console.log(data);

                  }
              });
          });
          @endforeach
      });
   *
   */
