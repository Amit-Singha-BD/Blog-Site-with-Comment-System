<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ReplyComment
{
    public function handle(Request $request, Closure $next): Response{
        if(!Auth::check()){
            return redirect()->route('login')->with('error', 'You must be logged in to reply.');
        }

        $comment = Comment::findOrFail($request->commentId);
        $post = $comment->post;

        if (Auth::id() !== $post->user_id) {
            return redirect()->route('blog.home')->with('error', 'You are not authorized to reply to this comment.');
        }
        return $next($request);
    }
}
