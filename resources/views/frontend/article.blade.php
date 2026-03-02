@extends('frontend.layout.master-layout')

@section('content')

    <header class="article-header">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <span class="badge bg-primary mb-3">Technology</span>
                    <h1 class="display-4 fw-bold mb-4">Complete Guide to Starting Blogging</h1>
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Author" class="rounded-circle me-3" width="50" height="50">
                        <div class="text-start">
                            <p class="mb-0">Md. Rahimul Islam</p>
                            <small class="text-white"><i class="far fa-clock me-1"></i> Published: May 20, 2023</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article class="article-content container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <p class="lead">Blogging has become a popular and profitable profession nowadays. In this guide, we will discuss step-by-step how you can also start blogging and build a successful online presence.</p>

                <h2 class="mt-5 mb-4">1. Choosing a Blog Topic</h2>
                <p>The first step of a successful blog is choosing the right topic or niche. Your chosen topic should be something you are passionate about and knowledgeable in. Consider these popular topics:</p>
                <ul>
                    <li>**Technology and Gadgets**: Reviews, news, how-to guides.</li>
                    <li>**Health and Fitness**: Workout routines, diet tips, healthy living.</li>
                    <li>**Travel and Adventure**: Destination guides, travel stories, budget travel.</li>
                    <li>**Education and Career**: Study tips, job search advice, skill development.</li>
                    <li>**Cooking and Recipes**: Recipe collections, cooking techniques, food photography.</li>
                </ul>

                <img src="https://images.unsplash.com/photo-1547658719-da2b51169166?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Person writing on a laptop, representing blogging" class="img-fluid">

                <h2 class="mt-5 mb-4">2. Choosing a Blogging Platform</h2>
                <p>Selecting the right platform is crucial for your blogging journey. Each platform has its pros and cons, catering to different needs and technical expertise levels:</p>
                <table class="table table-bordered">
                    <thead>
                        <tr><th>Platform</th><th>Cost</th><th>Advantages</th></tr>
                    </thead>
                    <tbody>
                        <tr><td>**WordPress.org**</td><td>$$ (Self-hosted)</td><td>Fully customizable, vast plugin ecosystem, SEO-friendly.</td></tr>
                        <tr><td>**Blogger**</td><td>Free</td><td>Easy to use, Google integration, simple setup.</td></tr>
                        <tr><td>**Medium**</td><td>Free</td><td>Built-in audience, minimalist design, focus on content.</td></tr>
                    </tbody>
                </table>

                <blockquote>
                    <p>"**WordPress** is the most popular and powerful blogging platform, offering unparalleled flexibility and control over your content and design."</p>
                </blockquote>

                <h2 class="mt-5 mb-4">3. Creating Content</h2>
                <p>Quality content is the key to attracting and retaining readers. Focus on providing value and engaging your audience:</p>
                <ol>
                    <li>**Write after thorough research**: Ensure your content is accurate and well-informed.</li>
                    <li>**Use simple and understandable language**: Make your content accessible to a broad audience.</li>
                    <li>**Add engaging images and videos**: Visuals break up text and keep readers interested.</li>
                    <li>**Create SEO-friendly content**: Optimize your posts for search engines to increase visibility.</li>
                    <li>**Post regularly**: Consistency builds reader loyalty and signals to search engines that your site is active.</li>
                </ol>

                <div class="alert alert-info mt-4">
                    <h4><i class="fas fa-lightbulb me-2"></i>Tips</h4>
                    <p class="mb-0">In the first 3 months, aim to publish at least **2 posts every week** to establish momentum and start building your audience.</p>
                </div>

                <h2 class="mt-5 mb-4">4. Sources of Income</h2>
                <p>Once your blog gains traction, there are various ways to monetize it and earn income:</p>

                <div class="row g-4 mt-3">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-ad text-primary me-2"></i>Google AdSense</h5>
                                <p class="card-text">Earn by displaying relevant ads on your blog content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-link text-success me-2"></i>Affiliate Marketing</h5>
                                <p class="card-text">Earn commission by recommending products or services through unique affiliate links.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-book text-warning me-2"></i>Digital Products</h5>
                                <p class="card-text">Create and sell your own digital products like eBooks, online courses, or templates.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-4">
                    <div class="mb-2 mb-md-0">
                        <span class="badge bg-secondary me-2">#Blogging</span>
                        <span class="badge bg-secondary me-2">#Income</span>
                        <span class="badge bg-secondary">#WordPress</span>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-outline-secondary me-2"><i class="far fa-thumbs-up me-1"></i>Like (42)</button>
                        <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-share-alt me-1"></i>Share</button>
                    </div>
                </div>
            </div>
        </div>
    </article>

    ---

    <section class="author-profile container">
        <div class="row align-items-center">
            <div class="col-md-3 text-center mb-3 mb-md-0">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Author Md. Rahimul Islam" class="author-img">
            </div>
            <div class="col-md-9 text-center text-md-start">
                <h3>Md. Rahimul Islam</h3>
                <p class="text-muted">Professional blogger and content creator with years of experience in digital media. Passionate about sharing knowledge on technology and online entrepreneurship.</p>
                <div class="social-links mt-3">
                    <a href="#" class="btn btn-sm btn-outline-primary me-2"><i class="fab fa-facebook-f me-1"></i>Facebook</a>
                    <a href="#" class="btn btn-sm btn-outline-info me-2"><i class="fab fa-twitter me-1"></i>Twitter</a>
                    <a href="#" class="btn btn-sm btn-outline-danger"><i class="fab fa-youtube me-1"></i>YouTube</a>
                </div>
            </div>
        </div>
    </section>

    ---

    <section class="comment-section container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h3 class="mb-4"><i class="far fa-comments me-2"></i>Comments (3)</h3>

                <div class="card mb-5 border-0 shadow">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark">Leave a Comment</h5>
                        <form>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Write your comment..."></textarea>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="col-md-4">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary w-100">Post Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="comment-list">
                    <div class="comment-card">
                        <div class="d-flex align-items-start">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Commenter Ayesha Siddika" class="commenter-img me-3">
                            <div>
                                <h6>Ayesha Siddika</h6>
                                <small class="text-muted">2 days ago</small>
                                <p class="mt-2">Excellent post! I'm a new blogger and this guide is exactly what I needed to get started. The tips on content creation are particularly helpful. Thanks!</p>
                                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-reply me-1"></i>Reply</a>
                            </div>
                        </div>
                    </div>

                    <div class="comment-card">
                        <div class="d-flex align-items-start">
                            <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Commenter Rajib Ahmed" class="commenter-img me-3">
                            <div>
                                <h6>Rajib Ahmed</h6>
                                <small class="text-muted">1 week ago</small>
                                <p class="mt-2">I want to learn more about SEO-friendly content. Do you have any resources or future articles planned on that topic? Great overview!</p>
                                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-reply me-1"></i>Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection