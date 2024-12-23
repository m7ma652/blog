<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // get the data from db
        $postsFromDB=Post::all();
        // dd($postsFromDB);
        // users interface
        return view('posts.index',['posts'=>$postsFromDB]);
    }
    public function create(){
        // show users from db
        $users=User::all();
        // show users interface
        return view('posts.create',['users'=>$users]);
    }
    public function store(){
        // validate
        request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:5'],
            'post_creator'=>['required','exists:users,id'],
        ]);
        // take data from the user
        $data=request()->all();
        $title=request()->title;
        $description=request()->description;
        $post_creator=request()->post_creator;
        
        // store the data in the db
        Post::create([
            'title'=>$title,
            'description'=> $description,
            'user_id'=>$post_creator,
        ]);

        // return the user to posts.index
        return to_route(route: 'posts.index');
    }

    public function show(Post $post){
    return view('posts.show',['post'=>$post]);
    }

    public function edit(Post $post){
    $users=User::all();
    return view('posts.edit',['post'=>$post,'user'=>$users]);
    }

    public function update($postId){

        // validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);

        $data=request()->all();
        $title=request()->title;
        $description=request()->description;
        $post_creator = request()->post_creator;
        $singlePost=Post::find($postId);
        $singlePost->update([
            'title'=>$title,
            'description'=>$description,
            'user_id'=>$post_creator,
        ]);

        return to_route(route: 'posts.show', parameters: $postId);
    }

    public function destroy($postId){
        $post=Post::find($postId);
        $post->delete();

        return to_route(route: 'posts.index');
    }
}

