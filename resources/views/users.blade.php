<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
</head>
<body>

<h1>Listado de usuarios</h1>

<table border="1">
    <tr>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Rol</th>
    </tr>

    @foreach ($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->nombre }}</td>
            <td>{{ $user->apellidos }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->rol }}</td>
        </tr>
    @endforeach
</table>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

</body>
</html>
