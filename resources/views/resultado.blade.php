@extends('layouts.main')

@section('titulo')
    <title>Resultados usuario</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')



@endsection

@section('contenido')

    <div class="container">

        @if(isset($correo))

            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="container text-center my-auto">
                                    @if(isset($estatus))
                                        @if($estatus == "success")
                                            <label class="text-success">{{$estatus}}</label>
                                        @elseif($estatus == "error")
                                            <label class="text-warning">{{$estatus}}</label>
                                        @endif
                                    @endif
                                    <h1 class="mb-1">¡Felicitaciones {{$nombreUsuario}}! Usted ah completado el test de lógica matemática</h1>
                                    <h3 class="mb-5">
                                        <em>Sus respuestas han sido enviadas a: {{$correo}} </em>
                                    </h3>
                                    <h3 class="mb-5">
                                        <em class="text-warning">Obtuvó: {{$puntaje}} puntos de 5 preguntas </em>
                                    </h3>

                                    <a class="btn btn-outline-warning btn-xl js-scroll-trigger" href="{{route('cerrar.sesion')}}">Cerrar Sesion</a>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        @endif

    </div>

@endsection

@section('js')

@endsection

