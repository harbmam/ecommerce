<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login_admin()
    {
        if(!empty(Auth::check()) && Auth::user()->is_admin == 1) {
            return redirect('/admin/dashboard');
        }
        return view('admin.auth.login');
    }

    public function auth_login_admin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1, 'status' => 0, 'is_delete' => 0], $remember)) {
            // Redirect ke dashboard jika berhasil login
            return redirect('/admin/dashboard')->with(['success' => 'Login success']);
        } else {
            // Redirect kembali ke halaman login dengan pesan error
            return redirect('admin')->with(['error' => 'Invalid email or password']);
        }
    }
    
    public function logout_admin()
    {
        Auth::logout();
        return redirect('admin');
    }
}