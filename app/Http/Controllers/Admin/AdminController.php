<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AdminUser;

class AdminController extends Controller
{
    public function login()
    {
        $md = new AdminUser();

        $data = $md->getData();

        return view('admin.login_page', ['data' => $data]);
    }
}
