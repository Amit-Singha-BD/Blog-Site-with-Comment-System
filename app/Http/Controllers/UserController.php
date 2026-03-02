<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $posts = Post::where('status', 'Published')->with('category', 'user')->paginate(12);
        $title = "Home page";
        return view('Frontend.Home', compact("posts", "title"));
    }

    public function categoryList(){
        return view('frontend.category');
    }

    public function technology(){
        $posts = Post::where('category_id', 1)->with('category')->paginate(9);
        return view('frontend.category-view', compact('posts'));
    }

    public function health(){
        $posts = Post::where('category_id', 2)->with('category')->paginate(9);
        return view('frontend.category-view', compact('posts'));
    }

    public function travel(){
        $posts = Post::where('category_id', 3)->with('category')->paginate(9);
        return view('frontend.category-view', compact('posts'));
    }

    public function education(){
        $posts = Post::where('category_id', 4)->with('category')->paginate(9);
        return view('frontend.category-view', compact('posts'));
    }

    public function busness(){
        $posts = Post::where('category_id', 5)->with('category')->paginate(9);
        return view('frontend.category-view', compact('posts'));
    }

    public function article(){
        return view('frontend.article');
    }

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function showPost($id){
        $post = Post::with('category', 'user')->findOrFail($id);
        $comments = Comment::where('post_id', $post->id)
                           ->whereNull('reply_id')
                           ->with(["user", "reply.user"])
                           ->get();
        return view('frontend.post-view', compact("post", "comments"));
    }

    public function commentStore(Request $request, $id){
        $post = Post::with('user')->findOrFail($id);

        comment::create([
            "comment" => $request->comment,
            "post_id" => $post->id,
            "user_id" => Auth::id(),
        ]);
        return redirect()->back()->with('success', 'Your comment posted successfully.');
    }

    public function replyStore(Request $request, $commentId){
        $parentComment = Comment::findOrFail($commentId);

        Comment::create([
            "comment" => $request->comment,
            "reply_id" => $parentComment->id,
            'post_id' => $parentComment->post_id,
            "user_id" => Auth::id(),
        ]);
        return redirect()->back()->with('success', 'Your reply posted successfully.');
    }
}
