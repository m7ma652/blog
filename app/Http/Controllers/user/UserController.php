<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $postsFromDB = Post::all();
        return view('users.index', ['posts' => $postsFromDB]);
    }

    // public function store(){
    //     // validate =>unique
    //     request()->validate([
    //         'name'=>['required','min:3'],
    //         'email'=>['required','email','unique:users,email','min:5'],
    //         'password'=>['required','min:5','unique:users,password'],
    //     ]);

    //     $data=request()->all();
    //     $name=request()->username;
    //     $email=request()->email;
    //     $password=request()->password;
    //     // dd($data,$name,$email,$password);

    //     User::create([
    //         'name'=>$name,
    //         'email'=>$email,
    //         'password'=>$password,
    //     ]);
    //     dd($data,$name,$email,$password);
    //     return to_route(route: 'users.profile');
    // }

    // public function login(){

    //     return view('auth.login');
    // }

    // public function inter(){
    //     // validation
    //     request()->validate([
    //         'email'=>['email','exists:users,email'],
    //         'password'=>['exists:users'],
    //     ]);
    //     $data=request()->all();
    //     $email=request()->email;
    //     $password=request()->password;


    //     return to_route(route: 'posts.index');
    // }
}
