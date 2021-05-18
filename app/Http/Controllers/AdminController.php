<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;

class AdminController extends Controller
{
    public function admin_show(LoginRequest $request)
    {
        if ($request->all()) {
            return redirect('admin.login')->withErrors($request);
        }
    }
}
