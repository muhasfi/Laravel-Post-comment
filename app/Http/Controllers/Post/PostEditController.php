<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id): View
    {
        $post = Post::find($id);
        $this -> authorize('update', $post);

        return view('posts.edit', [
            'post' => Post::find($id),
        ]);
    }
}
