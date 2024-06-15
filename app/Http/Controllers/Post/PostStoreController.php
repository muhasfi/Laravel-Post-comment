<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class PostStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        Post::create([
            'user_id'=>Auth::id(),
            'content'=>request('content')
        ]);
        return Redirect()->back()->with('successs', 'Comment Created');
    }
}
