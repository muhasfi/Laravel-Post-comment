<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

use App\Models\Post;

class PostUpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $post = Post::find($id);
        $post->update(['content' => request('content'),
    ]);

        return Redirect('/dashboard');
    }
}
