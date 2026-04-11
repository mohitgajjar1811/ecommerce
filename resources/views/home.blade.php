
@extends('masterLayout.app')
@section('content')
<!-- ================= CATEGORIES ================= -->
<section id="categories" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Shop by Category</h2>
        <div class="row text-center g-4">
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Electronics</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Fashion</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Home</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Sports</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= PRODUCTS ================= -->
<section id="products" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Featured Products</h2>

        <div class="row g-4">
            <div class="col-md-3">
                <div class="card product-card shadow h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="">
                    <div class="card-body text-center">
                        <h6 class="card-title">Wireless Headphones</h6>
                        <p class="text-primary fw-bold">$59.99</p>
                        <button class="btn btn-sm btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card product-card shadow h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="">
                    <div class="card-body text-center">
                        <h6 class="card-title">Smart Watch</h6>
                        <p class="text-primary fw-bold">$89.99</p>
                        <button class="btn btn-sm btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card product-card shadow h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="">
                    <div class="card-body text-center">
                        <h6 class="card-title">Running Shoes</h6>
                        <p class="text-primary fw-bold">$49.99</p>
                        <button class="btn btn-sm btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card product-card shadow h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="">
                    <div class="card-body text-center">
                        <h6 class="card-title">Backpack</h6>
                        <p class="text-primary fw-bold">$39.99</p>
                        <button class="btn btn-sm btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= BLOG ================= -->
<section id="blog" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Latest Blog</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card shadow">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top">
                    <div class="card-body">
                        <h5>Top 10 Gadgets in 2026</h5>
                        <p>Discover the latest trending gadgets this year.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top">
                    <div class="card-body">
                        <h5>Fashion Trends</h5>
                        <p>Explore new fashion trends and styles.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <img src="https://via.placeholder.com/400x250" class="card-img-top">
                    <div class="card-body">
                        <h5>Fitness Essentials</h5>
                        <p>Must-have items for your workout routine.</p>
                        <a href="#" class="btn btn-outline-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= NEWSLETTER ================= -->
<section class="bg-primary text-white text-center py-5">
    <div class="container">
        <h3>Subscribe to Our Newsletter</h3>
        <p>Get updates about new products and special offers.</p>
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex">
                <input type="email" class="form-control me-2" placeholder="Enter your email">
                <button class="btn btn-dark">Subscribe</button>
            </div>
        </div>
    </div>
</section>

@endsection