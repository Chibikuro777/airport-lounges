<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminUser;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.login_page');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('id', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('admin.home')->with('login_success', 'ログイン成功！');
        }

        return back()->withErrors([
            'login_error' => 'ログイン情報に誤りがあります。',
        ]);
    }
}
