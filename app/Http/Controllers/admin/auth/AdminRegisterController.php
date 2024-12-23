<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminRegisterController extends Controller
{

    public function register()
    {

        return view('admins.auth.register');
    }

    public function store(Request $request)
    {
        $adminKey = "adminKey1";
        if ($request->admin_key == $adminKey) {
            // validate
            request()->validate([
                'name' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:admins'],
                'admin_key' => ['required'],
                'password' => ['required', 'min:5', 'confirmed'],
            ]);
            // take data from the user
            $data = request()->all();
            $data['password'] = Hash::make($data['password']);
            $data['password_confirmation'] = Hash::make($data['password_confirmation']);
            $data['admin_key'] = Hash::make($data['admin_key']);
            $name = request()->name;
            $email = request()->email;
            $password = Hash::make($request->password);
            // dd($data, $name, $email, $password);

            // store the data in the db
            Admin::create([
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ]);
            return redirect()->route('admins.login');
        } else {
            return redirect()->back()->with('errorResponse', 'Some thing went wrong!');
        }
    }
}
