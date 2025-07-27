<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $role = auth()->user()->role;
        
            if ($role === 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif ($role === 'doctor') {
                return redirect()->route('dashboard.doctor');
            } elseif ($role === 'receptionist') {
                return redirect()->route('dashboard.receptionist');
            }
        
            // fallback
            return redirect('/login')->with('error', 'Role not recognized.');
        }
        

        return back()->with('error', 'Invalid credentials');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'role'     => 'required|in:admin,doctor,receptionist',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Account created.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
