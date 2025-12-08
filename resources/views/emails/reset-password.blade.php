<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restablecimiento de Contraseña - PRAISPRO</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f454;
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff54;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-top: 5px solid #af2323; /* Línea de color PRAISPRO */
        }
        .header {
            background-color: #af2323; 
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            color: #ffffff;
            font-size: 24px;
            margin: 0;
        }
        .content {
            padding: 30px;
            text-align: center;
        }
        .content p {
            color: #333333;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #096446; /* Un verde vibrante (green-500 de Tailwind) */
            color: #ffffff !important; /* Importante para anular estilos del cliente */
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .footer {
            background-color: #1f2937; /* Gris oscuro/negro similar a tus footers */
            padding: 15px;
            text-align: center;
            color: #9ca3af; /* Gris claro para el texto */
            font-size: 12px;
        }
        .ignore-text {
            color: #6b7280; /* Gris medio */
            font-size: 14px;
            margin-top: 30px;
            border-top: 1px solid #e5e7eb;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="header">
            <h1>🔒 Restablecimiento de Contraseña</h1>
        </div>

        <div class="content">
            <p style="font-size: 16px; font-weight: bold;">Hola,</p>
            
            <p>
                Hemos recibido una solicitud para **restablecer la contraseña** de tu cuenta en **PRAISPRO**.
            </p>

            <p>
                Para continuar, hacé clic en el botón de abajo. Este enlace es válido por tiempo limitado.
            </p>

            <div class="button-container">
                <a href="{{ url('/reset-password/' . $token) }}" class="button">
                    Restablecer Contraseña
                </a>
            </div>

            <p class="ignore-text">
                Si vos **no** solicitaste este cambio, por favor, simplemente ignorá este correo electrónico. Tu contraseña actual no será modificada.
            </p>
        </div>

        <div class="footer">
            <p>PRAISPRO® - Todos los derechos reservados.</p>
        </div>

    </div>
</body>
</html>


