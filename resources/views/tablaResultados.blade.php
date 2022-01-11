@extends('layout_admin.mainAdmin')

@section('titulo')
    <title>VISTA ADMIN</title>
@endsection

@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('titulo-pagina')
    <h1 class="h3 mb-4 text-danger-800">Resultados</h1>
@endsection

@section('contenido')
    <div class="col-md-12">
        <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID del usuario</th>
                                    <th>genero</th>
                                    <th>edad</th>
                                    <th>puntaje</th>
                                    <th>Detalles</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ID del usuario</th>
                                    <th>genero</th>
                                    <th>edad</th>
                                    <th>puntaje</th>
                                    <th>Detalles</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($resultados as $tablaResultados)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td id="idUsuario">{{$tablaResultados->id_usuario}}</td>
                                        <td>{{$tablaResultados->genero}}</td>
                                        <td>{{$tablaResultados->edad}}</td>
                                        <td>{{$tablaResultados->puntaje}}</td>
                                        <td>
                                            <a href="{{route('detalles.usuario',$tablaResultados->id_usuario)}}" class="btn btn-block btn-warning">Detalles</a>
                                            <a href="{{route('descargar.pdf',$tablaResultados->id_usuario)}}" class="btn btn-block btn-outline-secondary">DESCARGAR PDF</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>

    </script>
@endsection


