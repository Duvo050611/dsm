<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('clientes.index'); 
        }
        return view("auth.login"); 
    }
    

    /**
     * Handle login attempt.
     */
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|string"
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('clientes.index');
            } else {
                return redirect()->route('no-access');
            }
        }
    }

    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        return view("auth.register");
    }

    /**
     * Handle user registration.
     */
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'apellido' => 'required|string|max:255',
    //         'telefono' => 'nullable|string|max:15',
    //         'direccion' => 'nullable|string|max:255',
    //         'ciudad' => 'nullable|string|max:100',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //         'role' => 'required|string|in:admin,user' // Validar el rol
    //     ]);

    //     // Crear el usuario
    //     User::create([
    //         'name' => $request->name,
    //         'apellido' => $request->apellido,
    //         'telefono' => $request->telefono,
    //         'direccion' => $request->direccion,
    //         'ciudad' => $request->ciudad,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => $request->role,
    //     ]);

    //     return redirect()->route('login')->with('status', 'Registro exitoso. Por favor inicie sesión.');
    // }

    /**
     * Handle logout.
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
}
