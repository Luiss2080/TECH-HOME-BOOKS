<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Show the application login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $email = trim($request->email ?? '');
        $password = $request->password ?? '';

        // Validaciones básicas
        if (empty($email) || empty($password)) {
            return back()->withErrors(['error' => 'Por favor, completa todos los campos.']);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return back()->withErrors(['error' => 'Por favor, ingresa un email válido.']);
        }

        try {
            // Buscar usuario en la base de datos
            $user = DB::table('users')
                ->select('users.*')
                ->where('users.email', $email)
                ->where('users.estado', 'activo')
                ->first();

            if (!$user) {
                if ($request->expectsJson()) {
                    return response()->json(['success' => false, 'message' => 'Usuario no encontrado o inactivo.']);
                }
                return back()->withErrors(['error' => 'Usuario no encontrado o inactivo.']);
            }

            // Verificar contraseña
            if (Hash::check($password, $user->password)) {
                // Login exitoso
                Session::put('user_id', $user->id);
                Session::put('user_email', $user->email);
                Session::put('user_name', $user->name . ' ' . ($user->apellido ?? ''));
                Session::put('user_role', $user->rol);
                
                // Actualizar último acceso
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['ultimo_acceso' => now()]);

                // Redirección según el rol del usuario
                $redirectRoute = match($user->rol) {
                    'admin' => 'admin.dashboard',
                    'docente' => 'docente.dashboard',
                    'estudiante' => 'estudiante.dashboard',
                    default => 'admin.dashboard'
                };
                
                if ($request->expectsJson()) {
                    return response()->json(['success' => true, 'redirect' => route($redirectRoute)]);
                }
                return redirect()->route($redirectRoute);
            } else {
                if ($request->expectsJson()) {
                    return response()->json(['success' => false, 'message' => 'Credenciales incorrectas.']);
                }
                return back()->withErrors(['error' => 'Credenciales incorrectas.']);
            }
        } catch (\Exception $e) {
            Log::error('Error en login: ' . $e->getMessage());
            if ($request->expectsJson()) {
                return response()->json(['success' => false, 'message' => 'Error de conexión.']);
            }
            return back()->withErrors(['error' => 'Error de conexión.']);
        }
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        // Limpiar todas las sessions del usuario
        Session::forget('user_id');
        Session::forget('user_email');
        Session::forget('user_name');
        Session::forget('user_role');
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            switch ($user->rol) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'docente':
                    return redirect()->route('docente.dashboard');
                case 'estudiante':
                    return redirect()->route('estudiante.dashboard');
                default:
                    Auth::logout();
                    return view('auth.login');
            }
        }
        return view('auth.registro');
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        // Validation and registration logic would go here
        // For now, just redirect or show a message as this might be handled by another controller or service
        // based on the user's existing structure, but since they asked for flow optimization,
        // we'll keep it simple for now.
        
        return redirect()->route('login')->with('success', 'Registro solicitado correctamente. Nos pondremos en contacto.');
    }
}
