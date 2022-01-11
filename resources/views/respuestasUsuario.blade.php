@extends('layout_admin.mainAdmin')

@section('titulo')
    <title>VISTA ADMIN</title>
@endsection

@section('css')
    <style>

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm > .col, .gutters-sm > [class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3, .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>
@endsection

@section('titulo-pagina')
    <h1 class="h3 mb-4 text-danger">Respuestas del usuario.</h1>
@endsection

@section('contenido')

    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center"><img
                            @if($genero == "masculino")
                            src="/img/undraw_profile_2.svg" alt="Admin" class="rounded-circle"
                            @else
                            src="/img/undraw_profile_1.svg" alt="Admin" class="rounded-circle"
                            @endif
                            width="150">
                        <div class="mt-3"><h4>{{$nombre_usuario}}</h4>
                            <p class="text-secondary mb-1">ID del usuario: {{$id_usuario}}</p>
                            <p class="text-muted font-size-sm">Fecha en que realizó el test: {{$created_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3"><h6 class="mb-0">Nombre del usuario </h6></div>
                        <div class="col-sm-9 text-secondary"> {{$nombre_usuario}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><h6 class="mb-0">Correo </h6></div>
                        <div class="col-sm-9 text-secondary"> {{$correo}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><h6 class="mb-0">Edad </h6></div>
                        <div class="col-sm-9 text-secondary"> {{$edad}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><h6 class="mb-0">Genero </h6></div>
                        <div class="col-sm-9 text-secondary"> {{$genero}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><h6 class="mb-0">Puntaje </h6></div>
                        <div class="col-sm-9 text-secondary"> {{$puntaje}}/5</div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3"><h6 class="mb-0">Respuesta de la pregunta 1 </h6></div>
                        <div class="col-sm-9 text-secondary"> {{$respuesta1}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><h6 class="mb-0">Respuesta de la pregunta 2 </h6></div>
                        <div class="col-sm-9 text-secondary"> {{$respuesta2}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><h6 class="mb-0">Respuesta de la pregunta 2 </h6></div>
                        <div class="col-sm-9 text-secondary"> {{$respuesta3}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><h6 class="mb-0">Respuesta de la pregunta 3 </h6></div>
                        <div class="col-sm-9 text-secondary"> {{$respuesta4}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3"><h6 class="mb-0">Respuesta de la pregunta 4 </h6></div>
                        <div class="col-sm-9 text-secondary"> {{$respuesta5}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

@endsection

