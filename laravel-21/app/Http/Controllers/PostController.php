<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {   
       $this->authorize('create');
        
        Post::create([
            'title' => "Amar Sonar Bangla " . rand(1, 100),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Post created successfully');
    }
}
