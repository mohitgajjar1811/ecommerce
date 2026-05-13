@extends('masterLayout.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg-body: #f8fafc;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --accent: #22c55e;
            --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }

        body {
            background-color: var(--bg-body);
            font-family: 'Outfit', sans-serif !important;
            color: var(--text-main);
        }

        .section-full {
            width: 100%;
            padding: 80px 40px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-weight: 700;
            letter-spacing: -1px;
            margin-bottom: 15px;
        }

        .section-title .underline {
            width: 60px;
            height: 4px;
            background: var(--primary);
            margin: 0 auto;
            border-radius: 2px;
        }

        /* ================= CATEGORIES ================= */
        .category-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .category-tag {
            background: white;
            padding: 15px 30px;
            border-radius: 50px;
            color: var(--text-main);
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .category-tag:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.2);
            border-color: var(--primary);
        }

        /* ================= PRODUCTS (Modern Cards) ================= */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .card.modern-card {
            border: none;
            background: white;
            border-radius: 24px;
            box-shadow: var(--shadow);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .modern-card:hover {
            transform: translateY(-12px);
        }

        .img-wrapper {
            position: relative;
            overflow: hidden;
            padding-top: 100%;
        }

        .card-img-modern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.6s ease;
        }

        .modern-card:hover .card-img-modern {
            transform: scale(1.1);
        }

        .card-body-modern {
            padding: 25px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-name {
            font-weight: 700;
            color: var(--text-main);
            font-size: 1.05rem;
            margin-bottom: 8px;
        }

        .product-price {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .btn-add-cart {
            background: #f1f5f9;
            color: var(--text-main);
            padding: 12px 20px;
            border-radius: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-add-cart:hover {
            background: var(--primary);
            color: white;
        }

        /* ================= BLOG ================= */
        .blog-card {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: 0.3s;
            background: white;
        }

        .blog-card:hover {
            transform: translateY(-8px);
        }

        .blog-img {
            height: 220px;
            object-fit: cover;
        }

        .blog-details {
            padding: 25px;
        }

        .blog-details h5 {
            font-weight: 700;
            margin-bottom: 12px;
        }

        .blog-details p {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .btn-read {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 15px;
        }

        .btn-read:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }

        /* ================= NEWSLETTER ================= */
        .newsletter-section {
            background: var(--text-main);
            border-radius: 40px;
            padding: 60px;
            margin: 40px;
            color: white;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .newsletter-section h3 {
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .newsletter-section p {
            opacity: 0.8;
            margin-bottom: 35px;
        }

        .newsletter-form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            gap: 15px;
        }

        .news-input {
            flex: 1;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 15px 25px;
            color: white;
        }

        .news-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .btn-sub {
            background: white;
            color: var(--text-main);
            padding: 0 30px;
            border-radius: 15px;
            font-weight: 700;
            border: none;
            transition: 0.3s;
        }

        .btn-sub:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.05);
        }

        /* Premium Pagination */
        .pagination-wrapper {
            margin-top: 60px;
            display: flex;
            justify-content: center;
        }

        .pagination {
            gap: 12px;
            border: none;
        }

        .pagination .page-item {
            border: none;
        }

        .pagination .page-link {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50% !important;
            border: 1px solid #e2e8f0;
            color: var(--text-main);
            font-weight: 600;
            background: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary) 0%, #4f46e5 100%);
            border-color: transparent;
            color: white;
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
            transform: scale(1.1);
        }

        .pagination .page-item:not(.active) .page-link:hover {
            background: #f8fafc;
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .pagination .page-item.disabled .page-link {
            background: #f1f5f9;
            color: #cbd5e1;
            border-color: #e2e8f0;
            cursor: not-allowed;
            box-shadow: none;
        }
    </style>
    <!-- ================= HERO ================= -->
    <section class="hero text-center">
        <div class="hero-overlay">
            <div class="container">
                <h1 class="display-4 fw-bold">Big Sale is Live!</h1>
                <p class="lead">Up to 50% off on selected products</p>
                <a href="/products" class="btn btn-warning btn-lg">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- ================= CATEGORIES ================= -->
    <section id="categories" class="section-full">
        <div class="section-title">
            <h2>Shop by Category</h2>
            <div class="underline"></div>
        </div>

        <div class="category-grid">
            @foreach ($catgories as $cat)
                <a href="/products?category={{ $cat->name }}" class="category-tag">
                    <span style="font-size: 1.2rem;">🏷️</span>
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </section>

    <!-- ================= FEATURED PRODUCTS ================= -->
    <section id="products" class="section-full bg-light">
        <div class="section-title">
            <h2>Featured Products</h2>
            <div class="underline"></div>
        </div>

        <div class="product-grid">
            @foreach ($featProd as $pro)
                <div class="card modern-card">
                    <div class="img-wrapper">
                        @if ($pro->image)
                            <img src="{{ asset('storage/' . $pro->image) }}" class="card-img-modern"
                                alt="{{ $pro->name }}">
                        @else
                            <div class="card-img-modern d-flex align-items-center justify-content-center bg-light">
                                <span class="text-muted" style="font-size: 2rem;">📦</span>
                            </div>
                        @endif
                    </div>
                    <div class="card-body-modern">
                        <div>
                            <h6 class="product-name">{{ $pro->name }}</h6>
                            <p class="product-price">₹{{ number_format($pro->price, 2) }}</p>
                        </div>

                        <a href="{{ route('addToCart', $pro->id) }}" class="btn-add-cart">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            Add to Cart
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $featProd->links('pagination::bootstrap-4') }}
        </div>
    </section>

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
                        <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8" class="card-img-top"
                            alt="Shopping Tips" style="height:250px; object-fit:cover;">
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
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" class="card-img-top"
                            alt="Trending Products" style="height:250px; object-fit:cover;">
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
                        <img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f" class="card-img-top"
                            alt="Fashion Trends" style="height:250px; object-fit:cover;">
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
                        <img src="https://images.unsplash.com/photo-1607082349566-187342175e2f" class="img-fluid rounded"
                            style="max-height:200px; object-fit:cover;">
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ================= NEWSLETTER ================= -->
    <div class="newsletter-section">
        <h3>Join the Shopping Club</h3>
        <p>Be the first to know about new arrivals, sales, and exclusive digital offers.</p>
        <div class="newsletter-form">
            <input type="email" class="news-input" placeholder="Enter your best email...">
            <button class="btn-sub">Subscribe</button>
        </div>
    </div>
@endsection
