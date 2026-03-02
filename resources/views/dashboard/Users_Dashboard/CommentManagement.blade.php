@extends('Dashboard/Admins_Dashboard/Layout/MasterLayout')

@section('Content')

    <ul class="nav nav-pills mb-4 gap-3">
        <li class="nav-item">
            <a class="nav-link bg-primary active" href="#">
                <i class="fas fa-inbox me-1"></i> All
                <span class="badge ms-1">15</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-success" href="#">
                <i class="fas fa-check-circle me-1"></i> Approved
                <span class="badge ms-1">8</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-warning" href="#">
                <i class="fas fa-clock me-1"></i> Pending
                <span class="badge ms-1">4</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-danger" href="#">
                <i class="fas fa-trash me-1"></i> Spam
                <span class="badge ms-1">3</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-secondary" href="#">
                <i class="fas fa-ban me-1"></i> Trash
                <span class="badge ms-1">2</span>
            </a>
        </li>
    </ul>

    <div class="row mb-3 search-bulk-actions"> <div class="col-md-6">
            <div class="input-group mb-3 mb-md-0"> <input type="text" class="form-control" placeholder="Search comments...">
                <button class="btn btn-outline-secondary" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-md-end">
                <select class="form-select form-select-sm me-2" style="width: auto;">
                    <option selected>Bulk Actions</option>
                    <option>Approve</option>
                    <option>Mark as Spam</option>
                    <option>Move to Trash</option>
                    <option>Delete Permanently</option>
                </select>
                <button class="btn btn-sm btn-outline-secondary">Apply</button>
            </div>
        </div>
    </div>

    <div class="card comments-list-card"> <div class="card-body p-0">
            <div class="list-group list-group-flush">
                <div class="list-group-item">
                    <input type="checkbox" class="form-check-input comment-checkbox mt-2">
                    <img src="https://via.placeholder.com/50/6c5ce7/ffffff?text=U1" alt="User Avatar" class="comment-avatar">
                    <div class="comment-content-area">
                        <div class="comment-header">
                            <div>
                                <span class="comment-author">John Doe</span>
                                <span class="comment-meta d-block d-md-inline-block ms-md-2">on "Understanding Modern Web Development"</span>
                            </div>
                            <span class="comment-meta">2 hours ago</span>
                        </div>
                        <p class="comment-text">This is a great article! I found the explanation of React hooks particularly helpful. Keep up the good work!</p>
                        <div class="comment-actions">
                            <a href="#" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-eye me-1"></i> View
                            </a>
                            <a href="#" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-check me-1"></i> Approve
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-times me-1"></i> Spam
                            </a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-trash-alt me-1"></i> Trash
                            </a>
                        </div>
                    </div>
                </div>

                <div class="list-group-item">
                    <input type="checkbox" class="form-check-input comment-checkbox mt-2">
                    <img src="https://via.placeholder.com/50/20c997/ffffff?text=U2" alt="User Avatar" class="comment-avatar">
                    <div class="comment-content-area">
                        <div class="comment-header">
                            <div>
                                <span class="comment-author">Jane Smith</span>
                                <span class="comment-meta d-block d-md-inline-block ms-md-2">on "Latest Trends in AI"</span>
                                <span class="badge bg-warning comment-status-badge">Pending</span>
                            </div>
                            <span class="comment-meta">1 day ago</span>
                        </div>
                        <p class="comment-text">I'm still a bit confused about the difference between weak AI and strong AI. Could you perhaps elaborate more on that in a future post?</p>
                        <div class="comment-actions">
                            <a href="#" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-eye me-1"></i> View
                            </a>
                            <a href="#" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-check me-1"></i> Approve
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-times me-1"></i> Spam
                            </a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-trash-alt me-1"></i> Trash
                            </a>
                        </div>
                    </div>
                </div>

                <div class="list-group-item">
                    <input type="checkbox" class="form-check-input comment-checkbox mt-2">
                    <img src="https://via.placeholder.com/50/dc3545/ffffff?text=U3" alt="User Avatar" class="comment-avatar">
                    <div class="comment-content-area">
                        <div class="comment-header">
                            <div>
                                <span class="comment-author">Spam User</span>
                                <span class="comment-meta d-block d-md-inline-block ms-md-2">on "Top 10 SEO Strategies"</span>
                                <span class="badge bg-danger comment-status-badge">Spam</span>
                            </div>
                            <span class="comment-meta">3 days ago</span>
                        </div>
                        <p class="comment-text">Visit my site for **cheap viagra** and **casino** tips! Best **loans** online now. Click here: example.ru</p>
                        <div class="comment-actions">
                            <a href="#" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-eye me-1"></i> View
                            </a>
                            <a href="#" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-check me-1"></i> Approve
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-times me-1"></i> Spam
                            </a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-trash-alt me-1"></i> Trash
                            </a>
                        </div>
                    </div>
                </div>

                </div>
        </div>
    </div>

    <nav aria-label="Page navigation" class="mt-4">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

    <div class="modal fade" id="spamFilterModal" tabindex="-1" aria-labelledby="spamFilterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered"> <div class="modal-content">
                <div class="modal-header bg-primary text-white"> <h5 class="modal-title" id="spamFilterModalLabel"><i class="fas fa-filter me-2"></i> Spam Filter Settings</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button> </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Spam Detection Level</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="spamLevel" id="spamLevelLow" checked>
                                <label class="form-check-label" for="spamLevelLow">
                                    **Low**: Fewer false positives, but more spam may get through.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="spamLevel" id="spamLevelMedium">
                                <label class="form-check-label" for="spamLevelMedium">
                                    **Medium**: A balanced approach, recommended for most users.
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="spamLevel" id="spamLevelHigh">
                                <label class="form-check-label" for="spamLevelHigh">
                                    **High**: More aggressive, may occasionally catch legitimate comments.
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="spamKeywords" class="form-label">Spam Keywords (One per line)</label>
                            <textarea class="form-control" id="spamKeywords" rows="5" placeholder="e.g., viagra, casino, loan, crypto, offshore"></textarea>
                            <div class="form-text">Comments containing these words will be marked as spam automatically.</div>
                        </div>

                        <div class="mb-3">
                            <label for="blacklistDomains" class="form-label">Blacklisted Domains (One per line)</label>
                            <textarea class="form-control" id="blacklistDomains" rows="5" placeholder="e.g., .ru, .com.ru, .biz, .xyz, .top"></textarea>
                            <div class="form-text">Comments containing links to these domains will be automatically blocked.</div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="autoDeleteSpam" checked>
                            <label class="form-check-label" for="autoDeleteSpam">Automatically delete spam comments after 30 days</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Settings</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Ensure Bootstrap JavaScript is loaded before this.
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    </script>

@endsection