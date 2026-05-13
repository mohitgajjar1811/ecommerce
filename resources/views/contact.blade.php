@extends('masterlayout.app')

@section('content')

<!-- CONTACT PAGE SECTION -->
<section class="py-5" style="background:#f8f9fa;">
    <div class="container">
        
        <!-- Heading -->
        <div class="text-center mb-5">
            <h1 class="fw-bold">Contact Us</h1>
            <p class="text-muted">We’d love to hear from you. Get in touch with us anytime!</p>
        </div>

        <div class="row g-4">
            
            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4">
                    <h3 class="fw-bold mb-4">Send Us a Message</h3>
                    
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Full Name</label>
                                <input type="text" class="form-control rounded-pill" placeholder="Enter your name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="email" class="form-control rounded-pill" placeholder="Enter your email">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Subject</label>
                            <input type="text" class="form-control rounded-pill" placeholder="Enter subject">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Message</label>
                            <textarea class="form-control rounded-4" rows="5" placeholder="Write your message..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-warning rounded-pill px-5 py-2 fw-bold">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm p-4 h-100" style="background:linear-gradient(135deg,#111827,#1f2937); color:white;">
                    <h3 class="fw-bold mb-4">Get In Touch</h3>

                    <div class="mb-4">
                        <h5 class="fw-semibold">📍 Address</h5>
                        <p class="mb-0">ShopZone Headquarters, Ahmedabad, Gujarat, India</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-semibold">📞 Phone</h5>
                        <p class="mb-0">+91 98765 43210</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-semibold">📧 Email</h5>
                        <p class="mb-0">support@shopzone.com</p>
                    </div>

                    <div class="mb-4">
                        <h5 class="fw-semibold">🕒 Working Hours</h5>
                        <p class="mb-0">Mon - Sat: 9:00 AM - 8:00 PM</p>
                    </div>

                    <!-- Social Links -->
                    <div class="mt-4">
                        <h5 class="fw-semibold mb-3">Follow Us</h5>
                        <a href="#" class="btn btn-warning btn-sm rounded-circle me-2">F</a>
                        <a href="#" class="btn btn-warning btn-sm rounded-circle me-2">I</a>
                        <a href="#" class="btn btn-warning btn-sm rounded-circle me-2">T</a>
                        <a href="#" class="btn btn-warning btn-sm rounded-circle">L</a>
                    </div>
                </div>
            </div>

        </div>

        {{-- <!-- Google Map Section -->
        <div class="mt-5">
            <div class="card border-0 shadow-sm overflow-hidden">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.160653125395!2d72.5714!3d23.0225!2m3!1f0!2f0!3f0!"
                    width="100%" 
                    height="350" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div> --}}

    </div>
</section>
@endsection