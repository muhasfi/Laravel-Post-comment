<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\View\View;

class PostCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): View
    {
        
        return view('posts.comment', [
            
            'post' => $post->load('comments', 'comments.user', 'user'),
            'comments' => $post->comments()->latest('id')->get(),
            // 'comments' => Comment::latest('id')->get()
        ]);
    }
}
