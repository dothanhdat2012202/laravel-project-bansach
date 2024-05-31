<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        
    }
    public function index()
    {
        if(Auth::id()>0){
            return redirect()->route('dashboard.index')->with('success','Đăng nhập thành công');
        }
        return view('backend.auth.login');
    }
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('pass')
        ];
        $user = User::where('email', $credentials['email'])->first();
        if ($user && $user->user_agent == 1) {
            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard.index')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->route('auth.admin')->with('error', 'Email hoặc mật khẩu không chính xác');
            }
        } else {
            return redirect()->route('auth.admin')->with('error', 'Tài khoản không đúng');
        }
        // $credentials = [
        //     'email' => $request->get('email'),
        //     'password' => $request->input('pass')
        // ];  
        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('dashboard.index')->with('success','Đăng nhập thành công');
        // }
        //  return redirect()->route('auth.admin')->with('error','email hoặc mật khẩu không chính xác');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.admin');
    }
}
