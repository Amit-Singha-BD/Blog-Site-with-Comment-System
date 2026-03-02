@extends('frontend.layout.master-layout')

@section('content')

    <section class="contact-header">
        <div class="container text-center">
            <h1 class="display-3 fw-bold mb-4">Contact Us</h1>
            <p class="lead mb-5">Get in touch with us for any feedback, questions, or suggestions.</p>
        </div>
    </section>

    <section class="py-5 contact-info-section">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col-md-4">
                    <div class="contact-info-icon mx-auto">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5 class="fw-bold mt-3">Address</h5>
                    <p class="text-muted">Dhaka, Bangladesh</p>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-icon mx-auto">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h5 class="fw-bold mt-3">Phone</h5>
                    <p class="text-muted">+880 1XXX XXXXXX</p>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-icon mx-auto">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5 class="fw-bold mt-3">Email</h5>
                    <p class="text-muted">contact@amarblog.com</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="mb-4 fw-bold text-center text-dark">Send a Message</h4>
                            <form>
                                <div class="mb-3">
                                    <label for="yourName" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="yourName" placeholder="Enter your name">
                                </div>
                                <div class="mb-3">
                                    <label for="emailAddress" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailAddress" placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" id="subject" placeholder="Enter subject">
                                </div>
                                <div class="mb-3">
                                    <label for="messageContent" class="form-label">Message</label>
                                    <textarea rows="5" class="form-control" id="messageContent" placeholder="Write your message"></textarea>
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-custom px-5 py-2">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection