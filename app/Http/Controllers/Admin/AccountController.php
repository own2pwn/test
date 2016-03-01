<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Core\BaseController;
use App\Http\Requests\Admin\LoginRequest;
use Auth;

class AccountController extends BaseController
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginApi(LoginRequest $request)
    {
        $data = $request->all();
        $auth = auth()->guard('admin');
        if ($auth->attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return $this->api('OK', ['path' => route('admin_table')]);
        }
        return $this->api('INVALID_DATA', null, ['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}