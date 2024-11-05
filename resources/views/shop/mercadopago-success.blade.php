<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Exitosa</title>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Estilos generales */
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
            color: #FF8300; /* orange */
            margin-bottom: 20px;
            font-weight: 600;
        }

        .thank-you {
            font-size: 1.2rem;
            color: #FFFFFF; /* white */
            margin-bottom: 10px;
        }

        .email-notice {
            font-size: 1rem;
            color: #3D9555; /* green */
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

        <!-- Mensaje de agradecimiento -->
        <div class="message-title">¡Compra Exitosa!</div>
        <div class="thank-you">Gracias por tu compra. Esperamos verte pronto.</div>
        <div class="email-notice">El comprobante ha sido enviado a tu correo electrónico (<span style="color: #FFFFFF">{{ auth()->user()->email }}</span>) con todos los detalles.</div>

        <!-- Botón de salir -->
        <a href="{{ route('home') }}" class="exit-button">Volver al sitio</a>
    </div>

</body>
</html>
