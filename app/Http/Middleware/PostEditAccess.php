<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostEditAccess
{

    public function handle(Request $request, Closure $next): Response {
        $postId = $request->route('id') ?? $request->route('post');
        $post = Post::find($postId);
        if(!$post){
            return redirect()->back()
                             ->with("error", "Post not found");
        }

        if($post->status === "Published" && Auth::user()->role === "User"){
            return redirect()->back()
                             ->with('error', 'You are not authorized to edit a published post.');
        }
        return $next($request);
    }
}
