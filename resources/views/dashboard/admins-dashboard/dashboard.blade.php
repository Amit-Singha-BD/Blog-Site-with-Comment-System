@extends('dashboard/admins-dashboard/layout/master-layout')

@section('content')

    <h2 class="dashboard-heading">Dashboard</h2>
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Total Posts</h6>
                            <h3 class="mb-0">{{ $postStats->published ?? 0 }}</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fas fa-file-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Users Account</h6>
                            <h3 class="mb-0">{{ $userStats->users ?? 0 }}</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Total Views</h6>
                            <h3 class="mb-0">8956</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Pending Posts</h6>
                            <h3 class="mb-0">{{ $postStats->pending ?? 0 }}</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-solid fa-hourglass-half"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Admin Account</h6>
                            <h3 class="mb-0">{{ $userStats->admins ?? 0 }}</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Categories</h6>
                            <h3 class="mb-0">{{ $categoryCount ?? 0 }}</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-solid fa-tag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Comments</h6>
                            <h3 class="mb-0">{{ $commentsCount }}</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-regular fa-comment-dots"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase">Rejected Posts</h6>
                            <h3 class="mb-0">{{ $postStats->rejected ?? 0 }}</h3>
                        </div>
                        <div class="icon-wrapper icon-bg-warning">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent User Posts --}}
    <div class="custom-modern-table">
        <h4 class="table-title text-center"> Recent Users Posts</h4>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>Categories</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usersPosts as $userPost)
                        <tr class="text-center">
                            <td data-label="Id"><span>{{ $userPost->id }}</span></td>
                            <td data-label="Title">
                                <span>{{ \Illuminate\Support\Str::limit($userPost->post_title, 30, '...') }}</span>
                            </td>
                            <td data-label="Status">
                                <span class="status-inactive">{{ $userPost->status }}</span>
                            </td>
                            <td data-label="Author"><span>{{ $userPost->user->name }}</span></td>
                            <td data-label="Categories"><span>{{ $userPost->category->categories_name }}</span></td>
                            <td data-label="Description">
                                <span>{{ \Illuminate\Support\Str::limit($userPost->description, 30, '...') }}</span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    {{-- Recent Comments --}}
    <div class="custom-modern-table">
        <h4 class="table-title text-center"> Recent Comments</h4>
        <div class="table-responsive">
            <table class="table align-middle mb-0">
                <thead>
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Post Title</th>
                        <th>Post Author</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr class="text-center">
                            <td data-label="Id"><span>{{ $comment->id }}</span></td>
                            <td data-label="Post Title">
                                <span>{{ \Illuminate\Support\Str::limit($comment->post->post_title, 30, '...') }}</span>
                            </td>
                            <td data-label="Post Author">
                                <span class="status-active">{{ $comment->post->user->name }}</span>
                            </td>
                            <td data-label="Comment">
                                <span>{{ \Illuminate\Support\Str::limit($comment->comment, 30, '...') }}</span>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection