<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\PostCreateValidate;
use App\Http\Requests\CategoriesCreateValidate;
use App\Http\Requests\ProfileUpdateValidate;
use App\Http\Requests\SearchValidate;
use App\Http\Requests\UserCreateValidate;
use App\Http\Requests\ArticleCreateValidate;
use App\Http\Requests\ArticleUpdateValidate;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
use App\Models\Categories;
use App\Models\Comment;
use App\Models\Contact;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        $postStats = Post::selectRaw(
            "SUM(CASE WHEN status = 'Published' THEN 1 ELSE 0 END) as published,
             SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) as pending,
             SUM(CASE WHEN status = 'Rejected' THEN 1 ELSE 0 END) as rejected"
             )->first();

        $userStats = User::selectRaw(
            "SUM(CASE WHEN role = 'User' THEN 1 ELSE 0 END) as users,
             SUM(CASE WHEN role IN ('Super Admin', 'Admin', 'Editor') THEN 1 ELSE 0 END) as admins"
             )->first();

        $usersPosts = Post::where('status', 'Pending')->with('category', 'user')->latest('id')->take(5)->get();

        $comments = Comment::with(['user', 'post', 'parent'])->orderBy('id', 'desc')->take(5)->get();

        $categoryCount = Categories::count();

        $commentsCount = Comment::count();

        $title = "Dashboard - Admin Panel";

        return view('dashboard.admins-dashboard.dashboard', compact('postStats',
                                                                               'userStats',
                                                                                          'usersPosts',
                                                                                          'comments',
                                                                                          'categoryCount',
                                                                                          'commentsCount',
                                                                                          'title'));
    }


    public function postList(){
        $query = Post::whereIn('status', ['Published', 'Pending', 'Draft'])
                     ->orderBy('id','desc')
                     ->with('category', 'user');

        if (!in_array(Auth::user()->role, ['Super Admin', 'Admin', 'Editor'])) {
            $query->where('user_id', Auth::id());
        }

        $posts = $query->paginate(15);
        $categories = Categories::select('id', 'categories_name')->get();
        $postCount = $posts->count();
        $searchResult = ($postCount == 0) ? 'No data found' : "$postCount posts found";

        $title = "All Posts";
        return view("dashboard/admins-dashboard/post-list", compact("title",
                                                                               "posts",
                                                                                          "postCount",
                                                                                          "searchResult"));
    }

    public function search(SearchValidate $request){
        $searchTerm = $request->search;

        $query = Post::whereIn('status', ['Published', 'Pending', 'Draft'])
                     ->where('post_title', 'LIKE', '%'. $searchTerm .'%')
                     ->with('category', 'user');

        $role = Auth::user()->role;

        if(!in_array($role, ['Super Admin', 'Admin', 'Editor'])){
            $query->where('user_id', Auth::id());
        }
        
        $posts = $query->paginate(15);
        $categories = Categories::select('id', 'categories_name')->get();
        $postCount = $posts->count();
        $searchResult = ($postCount == 0) ? 'No data found' : 'Matching data found';
        $searchKeyword = $searchTerm;

        $title = "All Posts";
        return view("dashboard/admins-dashboard/post-list", compact("title",
                                                                               "categories",
                                                                                          "posts",
                                                                                          "postCount",
                                                                                          "searchKeyword",
                                                                                          "searchResult"));
    }

    public function filter(Request $request){
        $query = Post::whereIn('status', ['Published', 'Pending', 'Draft'])
                     ->orderBy('id','desc')
                     ->with('category', 'user');

        if(!in_array(Auth::user()->role, ['Super Admin', 'Admin', 'Editor'])){
            $query->where('user_id', Auth::id());
        }

        if($request->post_status !== "all"){
            $query->where('status', $request->post_status);
        }

        if($request->post_categories !== "all"){
            $query->where('category_id', $request->post_categories);
        }

        $posts = $query->paginate(15);
        $categories = Categories::select('id', 'categories_name')->get();
        $postCount = $posts->count();
        $title = "All Posts";
        return view("dashboard/admins-dashboard/post-list", compact("title",
                                                                               "posts",
                                                                                          "postCount"));
    }


    public function show(Post $post){
        $title = "Post Show";
        return view("dashboard/admins-dashboard/show", compact("title", "post"));
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $categories = Categories::select('id', 'categories_name')->get();
        $statusList = ['Published', 'Pending', 'Draft', 'Rejected'];
        $title = "Post Edit";
        return view("dashboard/admins-dashboard/post-edit", compact("title",
                                                                               "post",
                                                                                          "categories",
                                                                                          "statusList"));
    }

    public function update(PostUpdateRequest $request, $id){
        $post = Post::findOrFail($id);

        $validatedData = $request->validated();

        if($request->hasFile('image')){
            $currentImage = public_path('storage/'.$post->image_path);
            
                if(file_exists($currentImage)){
                    @unlink($currentImage);
                }

            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move('storage/', $imageName);
        }

        $updated = $post->update([
            'post_title'       => $validatedData['post_title'],
            'image_path'       => $imageName,
            'categories_id'    => $validatedData['categories'],
            'status'           => $validatedData['status'],
            'slug'             => $validatedData['slug'],
            'description'      => $validatedData['description'],
            'meta_title'       => $validatedData['meta_title'] ?? null,
            'meta_description' => $validatedData['meta_description'] ?? null,
        ]);

        if($updated){
            return redirect()->route('admin.posts')
                             ->with('success', 'Your post updated successfully.');
        }
        else{
            return redirect()->back()
                             ->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function destroy(Post $post){
        if($post->delete()){
            return redirect()->back()
                             ->with('success','Your post was deleted successfully');
        }

        return redirect()->back()
                             ->with('error','Failed to delete the post');
    }

    public function rejectedList(){
        $query = Post::where('status', 'Rejected')
                     ->orderBy('id','desc')
                     ->with('category', 'user');

        if(!in_array(Auth::user()->role, ['Super Admin', 'Admin', 'Editor'])){
            $query->where('user_id', Auth::id());
        }


        $posts = $query->paginate(15);
        $postCount = $posts->count();
        $title = "Rejected Posts";
        return view("dashboard/admins-dashboard/post-rejected", compact("posts",
                                                                                   "postCount",
                                                                                              "title"));
    }

    public function rejectedSearch(SearchValidate $request){

        $searchTerm = $request->search;

        $role = Auth::user()->role;

        $query = Post::where('status', 'Rejected')
                     ->where('post_title', 'LIKE', '%' . $searchTerm . '%')
                     ->with('category', 'user');

        if(!in_array($role, ['Super Admin', 'Admin', 'Editor'])){
            $query->where('user_id', Auth::id());
        }

        $posts = $query->paginate(15);

        $postCount = $posts->count();
        $searchResult = ($postCount == 0) ? 'No data found' : 'Matching data found';
        $searchKeyword = $searchTerm;
        $rejectedPostCount = Post::where('status', 'Rejected')->count();
        $title = "Rejected Posts";

        return view("dashboard/admins-dashboard/post-rejected", compact("posts", 
                                                                                   "postCount",
                                                                                              "searchResult",
                                                                                              "searchKeyword",
                                                                                              "rejectedPostCount",
                                                                                              "title"));
    }

    public function create(){
        $statusList = ['Published', 'Pending', 'Draft'];
        $categories = Categories::all();
        $title = "Add New Post";
        return view("dashboard/admins-dashboard/create-post", compact("statusList",
                                                                                 "categories",
                                                                                            "title"));
    }

    public function store(PostCreateValidate $request){
        $validated = $request->validated();

        $imageName = null;
        if($request->hasFile('image')){
            $image     = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move('storage', $imageName);
        }

        $posts = new Post;
        $posts->post_title       = $validated['post_title'];
        $posts->image_path       = $imageName;
        $posts->category_id      = $validated['categories'];
        $posts->status           = $validated['status'] ?? 'Pending';
        $posts->user_id          = Auth::id();
        $posts->slug             = $validated['slug'];
        $posts->description      = $validated['description'];
        $posts->meta_title       = $valivalidateddateData['meta_title'] ?? null;
        $posts->meta_description = $validated['meta_description'] ?? null;

        if($posts->save()){
            return redirect()->route('admin.posts')
                             ->with('success', 'Your post has been created successfully.');
        }
        else{
            return redirect()->back()
                             ->with('error','Something went wrong. Please try again.');
        }
    }

    public function userPosts(){
        $posts = Post::where('status', 'Pending')
                     ->orderBy('id','desc')
                     ->with('category', 'user')
                     ->paginate(15);

        $postCount = $posts->count();
        $title = "Manage Users Posts";
        return view("dashboard/admins-dashboard/user-post-management", compact("posts",
                                                                                          "postCount",
                                                                                                     "title"));
    }

    public function userPostSearch(SearchValidate $request){
        $searchTerm = $request->search;

        $posts = Post::where("status", "Pending")
                     ->where('post_title', 'LIKE', '%'. $searchTerm .'%')
                     ->with('category', 'user')
                     ->paginate(15);

        $searchCount = $posts->count();
        $searchResult = ($searchCount == 0) ? 'No data found' : 'Matching data found';
        $searchKeyword = $searchTerm;
        $postCount = Post::where('status', 'Pending')->count();
        $title = "Manage Users Posts";
        return view("dashboard/admins-dashboard/user-post-management", compact("posts",
                                                                                          "searchCount",
                                                                                                     "searchResult",
                                                                                                     "searchKeyword",
                                                                                                     "postCount",
                                                                                                     "title"));
    }

    public function accept($id){
        $post = Post::find($id);

        if(!$post){
            return redirect()->back()
                             ->with("error","The post was not found.");
        }
        $post->status = 'Published';
        if($post->update()){
            return redirect()->back()
                             ->with('success','Post has been accepted successfully.');
        }
        else{
            return redirect()->back()
                             ->with('error','Failed to accept the post.');
        }
    }

    public function reject($id){
        $post = Post::find($id);
        if(!$post){
            return redirect()->back()
                             ->with('error','The post was not found.');
        }

        $post->status = 'Rejected';
        if($post->update()){
            return redirect()->back()
                             ->with('success','Post has been rejected successfully.');
        }
        else{
            return redirect()->back()
                             ->with('error','Failed to accept the post.');
        }
    }

    public function categories(){
        $categories = Categories::withCount('posts')->get();
        $title = "Manage Categories";
        return view("dashboard/admins-dashboard/categories-management", compact("categories",
                                                                                           "title"));
    }

    public function categoriesDestroy(Categories $categories){
        if($categories->delete()){
            return redirect()->back()
                             ->with("success","Your cotegorie was deleted successfully");
        }
        else{
            return redirect()->back()
                             ->with("error","Failed to delete the categorie.");
        }
    }

    public function categoriesStore(CategoriesCreateValidate $request){
        $validated = $request->validated();

        $categories = new Categories();
        $categories->categories_name = $validated["name"];
        $categories->categories_slug = $validated["slug"];
        $categories->categories_description = $validated["description"];

        if($categories->save()){
            return redirect()->back()
                             ->with("success","Your categories has been created successfully.");
        }
        else{
            return redirect()->back()
                             ->with("error","Something went wrong. Please try again.");
        }
    }

    public function comments(){
        $comments = Comment::with(['user', 'post', 'parent'])->orderBy('id', 'desc')->paginate(15);
        $title = "Manage Comments";
        return view("dashboard/admins-dashboard/comments-management", compact("comments", "title"));
    }

    public function users(){
        $users = User::withCount('posts')->paginate(15);
        $userCount = User::count();
        $roles = ['Super Admin', 'Admin', 'Editor', 'User'];
        $title = "Manage Users";
        return view("dashboard/admins-dashboard/user-management", compact("users",
                                                                                     "userCount",
                                                                                                "roles",
                                                                                                "title"));
    }

    public function usersSearch(SearchValidate $request){
        $searchTerm = $request->search;

        $users = User::where("name", "LIKE", '%'. $searchTerm .'%')->paginate(15);
        $searchCount = $users->count();
        $searchResult = ($searchCount == 0) ? 'No data found' : 'Matching data found';
        $searchKeyword = $searchTerm;
        $userCount = User::count();
        $title = "Manage Users";
        return view("dashboard/admins-dashboard/user-management", compact("users",
                                                                                     "searchCount",
                                                                                                "searchResult",
                                                                                                "searchKeyword",
                                                                                                "userCount",
                                                                                                "title"));
    }

    public function usersFilter(Request $request){
        if($request->users_role !== 'all'){
            $users = User::where('role', $request->users_role)->paginate(15);
        }
        else{
            $users = User::paginate(15);
        }

        $userCount = User::count();
        $title = "Manage Users";
        return view("dashboard/admins-dashboard/user-management", compact("users",
                                                                                     "userCount",
                                                                                                "title"));
    }

    public function usersStore(UserCreateValidate $request){
        $validated = $request->validated();

        $imageName = null;
        if($request->hasFile("image")){
            $image     = $request->file("image");
            $imageName = time().".".$image->getClientOriginalExtension();
            $image     -> move("storage", $imageName);
        }

        $users = new User();
        $users->name     = $validated['name'];
        $users->email    = $validated['email'];
        $users->phone    = $validated['phone'];
        $users->role     = $validated['role'];
        $users->gender   = $validated['gender'];
        $users->image    = $imageName;
        $users->password = Hash::make($validated['password']);

        if($users->save()){
            return redirect()->back()
                             ->with("success", "User create successfuly.");
        }
        else{
            return redirect()->back()
                             ->with("error", "Something went wrong. Please try again.");
        }
    }

    public function usersDestroy(User $user){
        $image = public_path('storage/' . $user->image);

        if ($user->image && file_exists($image)) {
            unlink($image);
        }

        if($user->delete()){
            return redirect()->back()
                             ->with("success", "Your user was deleted successfully");
        }
        else{
            return redirect()->back()->with("error", "Failed to delete the user.");
        }
    }

    public function profile(){
        $postCount = Post::where('user_id', Auth::id())->count();
        $title = "Profile";
        return view("dashboard/admins-dashboard/profile", compact("postCount",
                                                                             "title"));
    }

    public function profileEdit(){
        $user = User::findOrFail(Auth::id());
        $genders = ['Male', 'Female', 'Other'];
        $title = "Profile";
        return view("dashboard/admins-dashboard/profile-edit", compact("user",
                                                                                  "genders",
                                                                                             "title"));
    }

    public function profileUpdate(ProfileUpdateValidate $request){
        $user = User::findOrFail(Auth::id());

        $validated = $request->validated();

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->gender = $validated['gender'];
        if($user->update()){
            return redirect()->route("profile")
                             ->with("success", "Your profile updated successfully.");
        }
        else{
            return redirect()->back()
                             ->with("error", "Something went wrong. Please try again.");
        }
    }



    public function articleView(){
        $articles = Article::with(['user', 'category'])->get();
        $title = 'All Article';
        return view("dashboard/admins-dashboard/article-view", compact('articles', 'title'));
    }

    public function articleCreateView(){
        $categories = Categories::select('id', 'categories_name')->get();
        $title = 'Add New Article';
        return view("dashboard/admins-dashboard/create-article", compact('categories', 'title'));
    }

    public function articleStore(ArticleCreateValidate $request){

       $validatedData = $request->validated();

        // Save article
        $article = new Article();
        $article->user_id = Auth::id();
        $article->category_id = $validatedData['category_id'];
        $article->title = $validatedData['title'];
        $article->slug = $validatedData['slug'];
        $article->content = $validatedData['content'];
        $article->status = $validatedData['status'];
        $article->tags = $validatedData['tags'];
        $article->published_at = $validatedData['published_at'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/articles'), $filename);
            $article->image = $filename;
        }

        $article->save();

        return redirect()->back()->with('success', 'Article created successfully!');
    }

    public function articleShow($articleId) {
        $article = Article::with(['user', 'category'])->findOrFail($articleId);
        $title = 'Article View';
        return view("dashboard/admins-dashboard/article-show", compact('article', 'title'));
    }

    public function articleEditView($articleId){
        $article = Article::findOrFail($articleId);
        $categories = Categories::all();
        $statusList = ['draft', 'published', 'pending'];
        $title = "Article Edit";
        return view("dashboard/admins-dashboard/article-edit-view", compact('article', 'categories', 'statusList', 'title'));
    }

    public function articleUpdate(ArticleUpdateValidate $request, $articleId){
        DB::beginTransaction();

        try {
            $article = Article::findOrFail($articleId);
            $validatedData = $request->validated();

            if ($request->hasFile('image')) {
                if ($article->image && file_exists(public_path('uploads/articles/' . $article->image))) {
                    unlink(public_path('uploads/articles/' . $article->image));
                }

                $image      = $request->file('image');
                $imageName  = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/articles'), $imageName);
                $article->image = $imageName;
            }

            $article->title        = $validatedData['title'];
            $article->slug         = $validatedData['slug'];
            $article->category_id  = $validatedData['category_id'];
            $article->content      = $validatedData['content'];
            $article->status       = $validatedData['status'];
            $article->published_at = $validatedData['published_at'];
            $article->tags         = $validatedData['tags'];

            $article->save();

            DB::commit(); // Everything ok, commit changes
            return redirect()->back()->with('success', 'Article updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack(); // Something went wrong, rollback all changes
            \Log::error('Article Update Failed: '.$e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong! Article could not be updated.');
        }
    }


    public function articleDestroy($articleId) {
        $article = Article::findOrFail($articleId);

        if ($article->image && file_exists(public_path('uploads/articles/' . $article->image))) {
            unlink(public_path('uploads/articles/' . $article->image));
        }

        $article->delete();

        return redirect()->back()->with('success', 'Article deleted successfully!');
    }

    public function unreadContacts(){
        $contacts = Contact::where('status', 'unread')
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        $title = 'Contacts';
        return view('dashboard/admins-dashboard/contact-management', compact('contacts', 'title'));
    }

    public function readContacts(){
        $contacts = Contact::where('status', 'read')
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);

        $title = 'Contacts';
        return view('dashboard/admins-dashboard/contact-management', compact('contacts', 'title'));
    }
}