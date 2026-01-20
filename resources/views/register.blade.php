<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>

<h1>Registro de usuario</h1>

@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="/register">
    @csrf

    <label>Usuario:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Nombre:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Apellidos:</label><br>
    <input type="text" name="surename" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Rol:</label><br>
    <select name="rol" required>
        <option value="user">Usuario</option>
        <option value="admin">Administrador</option>
    </select><br><br>

    <button type="submit">Registrarse</button>
</form>

<p>
    <a href="/login">Volver al login</a>
</p>

</body>
</html>
