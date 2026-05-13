@extends('masterLayout.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">


<!-- BLOG PAGE SECTION -->
<section class="py-5" style="background:#f8f9fa;">
    <div class="container">
        
        <!-- Page Heading -->
        <div class="text-center mb-5">
            <h1 class="fw-bold">Our Latest Blog</h1>
            <p class="text-muted">Stay updated with shopping tips, product trends & latest offers</p>
        </div>

        <div class="row g-4">
            
            <!-- Blog Card 1 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8" class="card-img-top" alt="Shopping Tips" style="height:250px; object-fit:cover;">
                    <div class="card-body">
                        <span class="badge bg-warning text-dark mb-2">Shopping</span>
                        <h4 class="card-title fw-bold">Top 10 Shopping Tips for Smart Buyers</h4>
                        <p class="card-text text-muted">
                            Discover how to save money, find the best deals, and shop smarter online.
                        </p>
                        <a href="#" class="btn btn-warning rounded-pill px-4">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Blog Card 2 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" class="card-img-top" alt="Trending Products" style="height:250px; object-fit:cover;">
                    <div class="card-body">
                        <span class="badge bg-warning text-dark mb-2">Products</span>
                        <h4 class="card-title fw-bold">Trending Gadgets in 2026</h4>
                        <p class="card-text text-muted">
                            Explore the latest gadgets and must-have tech products this year.
                        </p>
                        <a href="#" class="btn btn-warning rounded-pill px-4">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Blog Card 3 -->
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f" class="card-img-top" alt="Fashion Trends" style="height:250px; object-fit:cover;">
                    <div class="card-body">
                        <span class="badge bg-warning text-dark mb-2">Fashion</span>
                        <h4 class="card-title fw-bold">Fashion Trends You Need to Know</h4>
                        <p class="card-text text-muted">
                            Stay stylish with the newest fashion trends and outfit inspirations.
                        </p>
                        <a href="#" class="btn btn-warning rounded-pill px-4">Read More</a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Featured Blog -->
        <div class="mt-5 p-5 rounded shadow-sm text-white" style="background:linear-gradient(135deg,#111827,#1f2937);">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="fw-bold">Featured Article: Big Sale Season Guide</h2>
                    <p class="mb-3">
                        Learn how to maximize discounts, compare products, and shop wisely during mega sales.
                    </p>
                    <a href="#" class="btn btn-warning rounded-pill px-4">Explore Now</a>
                </div>
                <div class="col-md-4 text-center">
                    <img src="https://images.unsplash.com/photo-1607082349566-187342175e2f" class="img-fluid rounded" style="max-height:200px; object-fit:cover;">
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

