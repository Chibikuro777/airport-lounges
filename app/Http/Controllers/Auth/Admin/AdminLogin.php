<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;

class AdminLogin extends Controller
{
    public function admin_login(LoginRequest $request)
    {
        if ($request->all()) {
            return redirect('admin.login')->withErrors($request);
        } else {
            return view('admin.home');
        }
    }
}
