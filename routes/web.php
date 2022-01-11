<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio',[UsuarioController::class,'inicio'])->name('inicio');
Route::get('/login',[UsuarioController::class,'login'])->name('login');
Route::post('/login',[UsuarioController::class,'verificarCredenciales'])->name('login.form');
Route::get('/registro',[UsuarioController::class,'registro'])->name('registro');
Route::post('/registro',[UsuarioController::class,'registroForm'])->name('registro.form');
Route::get('/cerrarSesion',[UsuarioController::class,'cerrarSesion'])->name('cerrar.sesion');

Route::prefix('/usuario')->middleware("VerificarUsuario")->group(function () {

    //Route user
    Route::get('/menu', [UsuarioController::class, 'preguntasForm'])->name('usuario.menu');
    Route::post('/menu', [RespuestaController::class, 'verificarRespuestas'])->name('verifica.respuestas');


    //Route admin
    Route::get('/menuAdmin', [UsuarioController::class, 'menuAdmin'])->name('usuario.menu.admin');
    Route::get('/graficas', [RespuestaController::class, 'graficas'])->name('graficas.form');
    Route::post('/graficas', [RespuestaController::class, 'graficasRe'])->name('graficas.re');
    Route::get('/menu/tablaResultados', [RespuestaController::class, 'tablaResultados'])->name('tabla.resultados.form');
    Route::get('/menu/tablaResultadoss/pdf/{idUsuario}', [PDFController::class, 'pdf'])->name('descargar.pdf');
    Route::get('/menu/tablaResultados/{idUsuario}/', [RespuestaController::class, 'detallesUsuario'])->name('detalles.usuario');
    Route::get('/menu/topMejores', [RespuestaController::class, 'mejoresCinco'])->name('top.mejores.cinco');
    Route::get('/menu/topPeores', [RespuestaController::class, 'peoresCinco'])->name('top.peores.cinco');

});
