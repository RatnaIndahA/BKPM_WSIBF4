<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Redirect setelah login berhasil.
     */
    protected $redirectTo = '/dashboard';

    /**
     * Constructor.
     */
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    /**
     * Menampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login.
     */
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required|string', 
        'password' => 'required|string|min:6',
    ]);

    $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    $login = [
        $loginType => $request->username,
        'password' => $request->password
    ];

    if (Auth::attempt($login)) {
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['username' => 'Email atau username dan password tidak sesuai.']);
}

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}