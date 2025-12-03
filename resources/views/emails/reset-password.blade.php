<!DOCTYPE html>
<html>
<body>
    <h1>Restablecimiento de contraseña</h1>

    <p>Hacé clic en el siguiente enlace para restablecer tu contraseña:</p>

    <p>
        <a href="{{ url('/reset-password/' . $token) }}">
            Restablecer contraseña
        </a>
    </p>

    <p>Si no solicitaste este cambio, ignora este correo.</p>
</body>
</html>


