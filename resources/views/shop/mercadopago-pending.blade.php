<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Pendiente</title>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            background-color: #171717; /* darkGray */
            color: #FFFFFF; /* white */
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            background-color: #3D3D3D; /* lightGray */
            padding: 50px 40px;
            border-radius: 10px;
            max-width: 500px;
            width: 90%;
        }

        .logo {
            width: 180px;
            margin-bottom: 30px;
        }

        .message-title {
            font-family: 'Teko', sans-serif;
            font-size: 2.5rem;
            color: #FFC107; /* yellow */
            margin-bottom: 20px;
            font-weight: 600;
        }

        .pending-message {
            font-size: 1.2rem;
            color: #FFFFFF; /* white */
            margin-bottom: 40px;
        }

        .exit-button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #FF8300; /* orange */
            color: #FFFFFF; /* white */
            font-size: 1.2rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .exit-button:hover {
            background-color: #3D9555; /* green */
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Logo -->
        <img src="https://assets.canvolt.mx/logo-4-canvolt.png" alt="Logo Canvolt" class="logo">

        <!-- Mensaje de pago pendiente -->
        <div class="message-title">Pago en Proceso</div>
        <div class="pending-message">Tu pago está en proceso. Te notificaremos por correo cuando se confirme.</div>

        <!-- Botón de salir -->
        <a href="{{ route('home') }}" class="exit-button">Volver al sitio</a>
    </div>

</body>
</html>
