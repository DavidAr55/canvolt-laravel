<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\TemporalToken;
use App\Models\EmailVerification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        $credentials = $request->only('email', 'password');
    
        // Verificar si el usuario es administrador
        $user = User::where('email', $request->email)->first();
    
        if ($user && $user->admin_id !== null) {
            // Generar un token temporal
            $temporal_token = Str::random(60);
    
            // Guardar el token
            TemporalToken::create([
                'user_id' => $user->id,
                'token' => $temporal_token,
                'expires_at' => now()->addMinutes(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Iniciar sesión automáticamente
            Auth::login($user);
    
            // Redirigir al usuario a la ruta de validación de token
            return redirect()->away(config('app.admin_url') . '/temporal-token/' . $temporal_token);
        }

        // Primero verificar si las credenciales son correctas
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Si las credenciales son correctas, verificar si el correo electrónico ha sido verificado
            if ($user->verified_at === null) {
                Auth::logout();
                return redirect()->back()->with('warning', 'Debes verificar tu correo electrónico antes de iniciar sesión.');
            }

            // Si el correo electrónico ha sido verificado, redirigir al usuario
            return redirect()->intended('/');
        }

        else {
            // Si las credenciales no son correctas, mostrar el mensaje de error
            return redirect()->back()->with('error', 'Las credenciales no coinciden con nuestros registros.');
        }
    }

    public function signup(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        // Generar el token de confirmación
        $token = Str::random(60);

        // Guardar el token en la tabla email_verifications
        EmailVerification::create([
            'user_id' => $user->id,
            'token' => $token
        ]);

        // Enviar el correo de confirmación
        $this->sendConfirmationEmail($user->email, $token, $user->name);

        return redirect('/iniciar-sesion')->with('success', 'Registro exitoso. Por favor, revisa tu correo electrónico para confirmar tu cuenta.');
    }

    protected function sendConfirmationEmail($email, $token, $cliente)
    {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor de correo
            $mail->SMTPDebug = 0; // Cambia a 0 en producción
            $mail->isSMTP();
            $mail->Host = config('mail.mailers.smtp.host');
            $mail->SMTPAuth = true;
            $mail->Username = config('mail.mailers.smtp.username');
            $mail->Password = config('mail.mailers.smtp.password');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = config('mail.mailers.smtp.port');

            $mail->setFrom(config('mail.from.address'), config('mail.from.name'));
            $mail->addAddress($email, $cliente);
            
            // Establecer la codificación UTF-8
            $mail->CharSet = PHPMailer::CHARSET_UTF8;

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Confirmación de correo electrónico';
            $mail->Body = '
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Bienvenido a Canvolt</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        background-color: #f5f5f5;
                    }
                    .container {
                        width: 80%;
                        max-width: 600px;
                        margin: auto;
                        background-color: #ffffff;
                        border: 1px solid #dddddd;
                    }
                    .header {
                        background-color: #171717;
                        padding: 20px;
                        text-align: center;
                        color: white;
                    }
                    .header img {
                        width: 100px;
                        height: auto;
                    }
                    .header h2 {
                        margin: 0;
                    }
                    .body-section {
                        padding: 20px;
                    }
                    .body-section p {
                        margin: 0 0 15px 0;
                    }
                    .button-container {
                        text-align: center;
                        margin: 20px 0;
                    }
                    .confirm-button {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #ED6F1B;
                        color: #ffffff;
                        text-decoration: none;
                        border-radius: 5px;
                        font-size: 16px;
                    }
                    .footer {
                        background-color: #f5f5f5;
                        padding: 20px;
                        text-align: center;
                    }
                    .footer p {
                        margin: 0;
                    }
                    @media (max-width: 600px) {
                        .container {
                            width: 100%;
                            border: none;
                        }
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <!-- Encabezado -->
                    <header class="header">
                        <img src="https://sistema.canvolt.com.mx/public/images/logo-1-canvolt.png" alt="Canvolt logo">
                        <h2>Estimado/a ' . $cliente . '</h2>
                        <p>¡Gracias por unirte a la familia Canvolt!</p>
                    </header>
                    <!-- Cuerpo del mensaje -->
                    <section class="body-section">
                        <p>Por favor, haz clic en el siguiente enlace para confirmar tu correo electrónico:</p>
                        <div class="button-container">
                            <a href="' . route('auth.verify_email', $token) . '" class="confirm-button">Confirmar correo</a>
                        </div>
                        <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en ponerte en contacto con nosotros.</p>
                    </section>
                    <!-- Pie de página -->
                    <section class="footer">
                        <p>Nuestro equipo está listo para brindarle el mejor servicio posible.</p>
                        <p>Si tienes alguna pregunta o necesitas información adicional, no dudes en contactarnos. Estamos aquí para ayudarte.</p>
                        <p>Gracias nuevamente por unirte a la familia Canvolt.</p>
                        <p>Saludos cordiales,</p>
                        <p>El Equipo de Canvolt: <a href="mailto:contacto@canvolt.com.mx">contacto@canvolt.com.mx</a></p>
                    </section>
                </div>
            </body>
            </html>';

            $mail->send();
            return back()->with("success", "El correo electrónico ha sido enviado.");
        } catch (Exception $e) {
            // Manejar el error de envío de correo
            report($e);
            return redirect()->back()->with('error', 'No se pudo enviar el correo de confirmación a ('.$email.'): ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Sesión cerrada correctamente.');
    }

    public function verifyEmail($token)
    {
        $verification = EmailVerification::where('token', $token)->firstOrFail();

        // Verificar si el usuario existe
        $user = $verification->user;
        if ($user) {
            $user->verified_at = now();
            $user->save();

            // Eliminar el token de verificación
            $verification->delete();

            // Iniciar sesión automáticamente
            Auth::login($user);

            return redirect('/')->with('success', 'Correo electrónico confirmado con éxito. ¡Has iniciado sesión automáticamente!');
        } else {
            return redirect('/')->with('error', 'No se pudo verificar el correo electrónico. El usuario no existe.');
        }
    }

    public function loginRedirect()
    {
        return redirect('/iniciar-sesion')->with('info', 'Antes de continuar con la compra necesitas iniciar sesión.');
    }
}
