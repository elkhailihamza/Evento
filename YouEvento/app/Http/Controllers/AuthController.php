<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
    public function showRegister()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            return redirect()->intended(route('index'));
        }

        return back()->withErrors([
            'message' => 'login credentials error.',
            'error' => 'Email or Password Wrong!',
        ]);
    }
    public function register(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            User::create($data);

            return redirect(route('index'))->with(
                [
                    'message' => 'register creation success.',
                    'success' => 'Successfully made account!',
                ]
            );
        } catch (ValidationException $e) {
            return back()->with([
                'message' => 'register creation error.',
                'error' => $e->errors(),
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('index'))->withSuccess('Successfully logged out!');
    }
}
