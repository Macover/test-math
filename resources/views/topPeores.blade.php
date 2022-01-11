@extends('layout_admin.mainAdmin')

@section('titulo')
    <title>VISTA ADMIN</title>
@endsection

@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('titulo-pagina')
    <h1 class="h3 mb-4 text-danger-800">TOP peores 5</h1>
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
                            <th>Nombre del usuario</th>
                            <th>edad</th>
                            <th>genero</th>
                            <th>puntaje</th>
                            <th>Detalles</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID del usuario</th>
                            <th>Nombre del usuario</th>
                            <th>edad</th>
                            <th>genero</th>
                            <th>puntaje</th>
                            <th>Detalles</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <th>{{$id1}}</th>
                                <th>{{$nombre1}}</th>
                                <th>{{$edad1}}</th>
                                <th>{{$genero1}}</th>
                                <th>{{$puntaje1}}</th>
                                <th><a href="{{route('detalles.usuario',$id1)}}" class="btn btn-block btn-warning">Detalles</a></th>
                            </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <th>2</th>
                            <th>{{$id2}}</th>
                            <th>{{$nombre2}}</th>
                            <th>{{$edad2}}</th>
                            <th>{{$genero2}}</th>
                            <th>{{$puntaje2}}</th>
                            <th><a href="{{route('detalles.usuario',$id2)}}" class="btn btn-block btn-warning">Detalles</a></th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <th>3</th>
                            <th>{{$id3}}</th>
                            <th>{{$nombre3}}</th>
                            <th>{{$edad3}}</th>
                            <th>{{$genero3}}</th>
                            <th>{{$puntaje3}}</th>
                            <th><a href="{{route('detalles.usuario',$id3)}}" class="btn btn-block btn-warning">Detalles</a></th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <th>4</th>
                            <th>{{$id4}}</th>
                            <th>{{$nombre4}}</th>
                            <th>{{$edad4}}</th>
                            <th>{{$genero4}}</th>
                            <th>{{$puntaje4}}</th>
                            <th><a href="{{route('detalles.usuario',$id4)}}" class="btn btn-block btn-warning">Detalles</a></th>
                        </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <th>5</th>
                            <th>{{$id5}}</th>
                            <th>{{$nombre5}}</th>
                            <th>{{$edad5}}</th>
                            <th>{{$genero5}}</th>
                            <th>{{$puntaje5}}</th>
                            <th><a href="{{route('detalles.usuario',$id5)}}" class="btn btn-block btn-warning">Detalles</a></th>
                        </tr>
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
