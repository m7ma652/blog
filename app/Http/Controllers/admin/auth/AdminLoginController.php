<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login()
    {

        return view('admins.auth.login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]))
        //  or
        //  if (Auth::guard('admin')->attempt(
        //      $request->only('email','password')
        // ))  ===>> to make the code shorter
        {
            return redirect()
                ->route('posts.index');
        } else {
            return redirect()
                ->back()
                ->withInput(['email' => $request->email])
                ->withErrors(['errorResponse' => 'These credentials dont match our records!!']);
        }
    }

    public function logout(){

        auth::guard('admin')->logout();

        return redirect()->route('users.index');
    }
}
