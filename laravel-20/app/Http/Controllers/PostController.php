<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class PostController extends Controller
{

    public function showPosts(Post $post) {
       
        return Gate::allows('show_post', $post)? 'True' : 'False';

        
        return view('posts', compact('posts'));
    }

    public function showSinglePosts($id) {

        $info = Post::where('id', $id)->with('user')->first();
        return view('single-post', compact('info'));
    }
    public function createPost(Request $request) {
        $request->validate([
            'title' => 'required|string|max:250',
        ]);

        $id = Auth::user()->id;
        Post::create([
            'user_id' => $id,
            'title' => $request->input('title'),
        ]);

        return redirect()->back()->with('message', 'Post created successfully');
    }
}
