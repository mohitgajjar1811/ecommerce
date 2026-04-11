
@include('layout/header',["title" => "Home Page"])
<!-- ================= SERVICES ================= -->
<section id="services" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Our Services</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Web Design</h5>
                        <p class="card-text">
                            Modern and clean website designs that look great on all devices.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">Development</h5>
                        <p class="card-text">
                            High-performance websites built with the latest technologies.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">SEO Optimization</h5>
                        <p class="card-text">
                            Improve your search rankings and grow your online presence.
                        </p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about" class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>About Us</h2>
                <p>
                    We are a creative team dedicated to building professional websites.
                    Our goal is to help businesses grow through modern web solutions.
                </p>
                <p>
                    With years of experience in design and development,
                    we deliver quality and performance.
                </p>
                <a href="#" class="btn btn-outline-primary">Learn More</a>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x300" class="img-fluid rounded shadow" alt="About Image">
            </div>
        </div>
    </div>
</section>

<!-- ================= CONTACT ================= -->
<section id="contact" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Contact Us</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="4" placeholder="Write your message"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
@include('layout/footer')
