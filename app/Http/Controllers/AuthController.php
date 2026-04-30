<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\About; 

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $userId = DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        About::create([
            'user_id' => $userId,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('/login')->with('success', 'Регистрация успешна! Теперь войдите.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'user_email' => $user->email
            ]);
            return redirect('/dashboard')->with('success', 'Добро пожаловать, ' . $user->name . '!');
        }

        return back()->with('error', 'Неверный email или пароль.');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Вы вышли из системы.');
    }
}