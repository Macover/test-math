<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

<table>
    <thead>
    <tr>
        <th>ID_Usuario</th>
        <th>Nombre del Usuario</th>
        <th>Correo</th>
        <th>Genero</th>
        <th>Edad</th>
        <th>Puntaje</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>{{$resUsuario->id_usuario}}</th>
        <th>{{$usuario->nombre_usuario}}</th>
        <th>{{$usuario->correo}}</th>
        <th>{{$resUsuario->genero}}</th>
        <th>{{$resUsuario->edad}}</th>
        <th>{{$resUsuario->puntaje}}</th>

    </tr>
    </tbody>
</table>

</body>
</html>
