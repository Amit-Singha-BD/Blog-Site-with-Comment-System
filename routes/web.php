<?php

use App\Http\Middleware\LogoutCheck;
use App\Http\Middleware\ReplyComment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Middleware\BlockUserAccess;
use App\Http\Middleware\PostEditAccess;
use App\Http\Middleware\RedirectIfAuthenticated;

/* Group these routes using controller for a clean and maintainable route structure. */
Route::controller(AuthenticationController::class)->middleware(RedirectIfAuthenticated::class)->group(function(){
    /* Authentication Routes(Login) */
    Route::get('/login', 'showLoginform')->name('login');
    Route::post('/login', 'login')->name('login.post');
    /* Authentication Routes(Registration) */
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'registrationStore')->name('register.store');
});

/* Authentication Routes(Logout) */
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout')
                                                                                ->middleware(LogoutCheck::class);

/* Group these routes using controller and name or middleware for a clean and maintainable route structure. */
Route::controller(UserController::class)->name("blog.")->group(function(){
    /* Frontend Routes */
    Route::get('/',  'index')->name('home');
    Route::get('/blog/categories',  'categoryList')->name('categories');
    Route::get('/blog/technology',  'technology')->name('technology');
    Route::get('/blog/health',  'health')->name('health');
    Route::get('/blog/travel',  'travel')->name('travel');
    Route::get('/blog/education',  'education')->name('education');
    Route::get('/blog/busness',  'busness')->name('busness');
    Route::get('/blog/article',  'article')->name('article');
    Route::get('/blog/about',  'about')->name('about');
    Route::get('/blog/contact',  'contact')->name('contact');
    Route::get('/blog/posts/{id}',  'showPost')->name('post.show');
    Route::post('/blog/comments/{id}', 'commentStore')->name('comment.store')->middleware('auth');
    Route::post('/blog/reply/{commentId}',  'replyStore')->name('reply.store')->middleware('auth');
});

/* Group these routes using prefix and name for a clean and maintainable route structure. */
Route::prefix("admin")->name("admin.")->controller(AdminDashboardController::class)
                                                     ->middleware(LogoutCheck::class)
                                                     ->group(function(){
    /* Admin Dashboard View Routes */
    Route::get('/dashboard', 'dashboard')->name('dashboard');

    /* This Routes All Blog Post */
    Route::get('/posts', 'postList')->name('posts');
    Route::get('/search', 'search')->name('search');
    Route::get('/filter', 'filter')->name('filter');
    Route::get('/posts/{post}', 'show')->name('posts.show');
    Route::get('/posts/{id}/edit', 'edit')->name('posts.edit')->middleware(PostEditAccess::class);
    Route::put('/posts/{id}', 'update')->name('posts.update');
    Route::delete('/posts/{post}', 'destroy')->name('posts.destroy');

    /* This Routes Rejected Post */
    Route::get('/rejected/posts', 'rejectedList')->name('rejected.list');
    Route::get('/rejected/search', 'rejectedSearch')->name('rejected.search');

    /* This Routes Create Post */
    Route::get('/create/posts', 'create')->name('posts.create');
    Route::post('/posts/store', 'store')->name('posts.store');

    /* This Routes restricted for normal users */
    Route::middleware(BlockUserAccess::class)->group(function(){
        /* This Routes Users Post Management */
        Route::get('/user-post', 'userPosts')->name('user.posts');
        Route::get('/users/posts/search', 'userPostSearch')->name('users.posts.search');
        Route::patch('/posts/{id}/accept', 'accept')->name('posts.accept');
        Route::patch('/posts/{id}/reject', 'reject')->name('posts.reject');

        /* This Routes Categories Management */
        Route::get('/categories', 'categories')->name('categories');
        Route::delete('/categories/{categories}', 'categoriesDestroy')->name('categories.destroy');
        Route::post('/categories/store', 'categoriesStore')->name('categories.store');

        /* This Routes Comments Management */
        Route::get('/comments', 'comments')->name('comments');

        /* This Routes Users Management */
        Route::get('/users', 'users')->name('users');
        Route::get('/users/search', 'usersSearch')->name('users.search');
        Route::get('/users/filter', 'usersFilter')->name('users.filter');
        Route::delete('/users/{user}', 'usersDestroy')->name('users.destroy');
        Route::post('/users/store', 'usersStore')->name('users.store');
    });
});

/* Group these routes using prefix and name or middleware for a clean and maintainable route structure. */
Route::prefix("admin")->name("admin.")->controller(SettingsController::class)->middleware(BlockUserAccess::class)->group(function(){
    /* This Routes Settings Management */
    Route::get('/settings', 'settings')->name('settings');
    Route::get('/settings/edit', 'editSettings')->name('settings.edit');
    Route::patch('/settings/{id}/name', 'nameUpdate')->name('settings.name.update');
    Route::patch('/settings/{id}/tagline', 'taglineUpdate')->name('settings.tagline.update');
    Route::put('/settings/{id}/social', 'socialUpdate')->name('settings.social.update');
});

/* This Routes Profile Management */
Route::get('/profile', [AdminDashboardController::class,'profile'])->name('profile');
Route::get('/profile/edit', [AdminDashboardController::class,'profileEdit'])->name('profile.edit');
Route::put('/profile/update', [AdminDashboardController::class,'profileUpdate'])->name('profile.update');




Route::get('/article/view', [AdminDashboardController::class,'articleView'])->name('article.view');
Route::get('/article/create/view', [AdminDashboardController::class,'articleCreateView'])->name('article.create.view');
Route::post('/article/store', [AdminDashboardController::class,'articleStore'])->name('article.store');
Route::get('/article/show/{articleId}', [AdminDashboardController::class,'articleShow'])->name('article.show');
Route::get('/article/edit/view/{articleId}', [AdminDashboardController::class,'articleEditView'])->name('article.edit.view');
Route::put('/article/update/{articleId}', [AdminDashboardController::class,'articleUpdate'])->name('article.update');
Route::delete('/article/destroy/{articleId}', [AdminDashboardController::class, 'articleDestroy'])->name('article.destroy');