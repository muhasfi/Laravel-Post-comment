<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StoreCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Post $post)
    {
        // Comment::create([
        //     'user_id'=>Auth::id(),
        //     'post_id' => Auth::id(),
        //     'content'=>request('content')
        // ]);

        $data = $request->validate([
            'content' => ['required'],
        ]);

        $data['user_id'] = $request->user()->id;
        $post->comments()->create($data);

        return Redirect()->back()->with('successs', 'Post Created');
    }
}
