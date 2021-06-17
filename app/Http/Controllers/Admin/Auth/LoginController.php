<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Auth\LoginRequest;

class LoginController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('guest:admin')->except('logout');
    }

    public function login()
    {
        return view('admin.auth.login_page');
    }

    public function store(LoginRequest $request)
    {
        Auth::guard('admin')->attempt($request->validated());
        return redirect()->route('dashboard');
    }
}
