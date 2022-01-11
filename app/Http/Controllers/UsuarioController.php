<?php

namespace App\Http\Controllers;

use App\Models\RespuestasUsuarios;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function login(){
        return view("login");
    }
    public function registro(){
        return view("registro");
    }
    public function inicio(){
        return view("inicio");
    }
    public function preguntasForm(){
        return view("preguntasForm");
    }
    public function menuAdmin(){
        return view("menuAdmin");
    }

    public function registroForm(Request $datos){

        if(!$datos->nombreUsuario || !$datos->edad || !$datos->genero || !$datos->correo || !$datos->password1 || !$datos->password2)
            return view("registro",["estatus"=> "error", "mensaje"=> "¡Falta información!"]);

        $usuario = Usuario::where('nombre_usuario',$datos->nombreUsuario)->first();
        if($usuario)
            return view("registro",["estatus"=> "error", "mensaje"=> "¡El nombre de usuario ya se encuentra registrado!"]);

        $usuario = Usuario::where('correo',$datos->correo)->first();
        if($usuario)
            return view("registro",["estatus"=> "error", "mensaje"=> "¡El correo ya se encuentra registrado!"]);
        $datos->validate([
            'edad' => 'numeric|min:1|max:100'
        ]);

        $nombreUsuario = $datos->nombreUsuario;
        $edad = $datos->edad;
        $genero = $datos->genero;
        $correo = $datos->correo;
        $password2 = $datos->password2;
        $password1 = $datos->password1;

        if($password1 != $password2){
            return view("registro",["estatus" => "error", "mensaje" => "¡Las contraseñas son diferentes!"]);
        }

        $usuario = new Usuario();
        $usuario->nombre_usuario = $nombreUsuario;
        $usuario->edad = $edad;
        $usuario->genero = $genero;
        $usuario->correo =  $correo;
        $usuario->contrasenia = bcrypt($password1);
        $usuario->tipo_usuario = "user";
        $usuario->save();
        return view("login",["estatus"=> "success", "mensaje"=> "¡Cuenta Creada!"]);

    }

    public function verificarCredenciales(Request $datos){

        if(!$datos->correo || !$datos->password)
            return view("login",["estatus"=> "error", "mensaje"=> "¡Completa los campos!"]);

        $usuario = Usuario::where("correo",$datos->correo)->first();
        if(!$usuario)
            return view("login",["estatus"=> "error", "mensaje"=> "¡El correo no esta registrado!"]);

        $respuestasUsuario = RespuestasUsuarios::where('id_usuario',$usuario->id_usuario)->first();
        /*if($respuestasUsuario)
            return view("login",["estatus"=> "error", "mensaje"=> "¡Este correo ya realizo el test!"]);*/

        if(!Hash::check($datos->password,$usuario->contrasenia))
            return view("login",["estatus"=> "error", "mensaje"=> "¡Datos incorrectos!"]);

        Session::put('usuario',$usuario);

        $admin = "admin";
        $usuario = Usuario::where("tipo_usuario",$admin)->first();

        if (session('usuario')->tipo_usuario == "admin"){
            if(isset($datos->url)){
                $url = decrypt($datos->url);
                return redirect($url);
            }else{
                return redirect()->route('usuario.menu.admin');
            }
        }else{
            if(isset($datos->url)){
                $url = decrypt($datos->url);
                return redirect($url);
            }else{
                return redirect()->route('usuario.menu');
            }
        }

    }
    public function cerrarSesion(){
        if(Session::has('usuario'))
            Session::forget('usuario');

        return redirect()->route('inicio');
    }
}
