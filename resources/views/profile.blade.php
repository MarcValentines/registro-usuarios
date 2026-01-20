<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
</head>
<body>

<h1>Mi perfil</h1>

<p><strong>Usuario:</strong> {{ auth()->user()->username }}</p>
<p><strong>Nombre:</strong> {{ auth()->user()->nombre }}</p>
<p><strong>Apellidos:</strong> {{ auth()->user()->apellidos }}</p>
<p><strong>Email:</strong> {{ auth()->user()->email }}</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

</body>
</html>
