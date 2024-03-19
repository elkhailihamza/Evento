<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Mail\ForgotPassMail;
use Illuminate\Support\Facades\Mail;

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

        return redirect()->back()->with([
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
                'role' => 'required|in:1,2',
            ]);

            $data['role_id'] = $request->input('role');

            User::create($data);

            return redirect(route('index'))->with(
                [
                    'success' => 'Successfully made account!',
                ]
            );
        } catch (ValidationException $e) {
            return redirect()->back()->with([
                'error' => $e->errors(),
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('index'))->with('success', 'Successfully logged out!');
    }
}
