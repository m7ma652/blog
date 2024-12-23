<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function index(){
        $postsFromDB = Post::all();
        return view('posts.index', ['posts' => $postsFromDB]);
    }
}
