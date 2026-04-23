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

    <!-- ================= CATEGORIES ================= -->
    <section id="categories" class="section-full">
        <div class="section-title">
            <h2>Shop by Category</h2>
            <div class="underline"></div>
        </div>

        <div class="category-grid">
            @foreach ($catgories as $cat)
                <a href="/products?category={{$cat->name}}" class="category-tag">
                    <span style="font-size: 1.2rem;">🏷️</span>
                    {{$cat->name}}
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
                        @if($pro->image)
                            <img src="{{asset('storage/' . $pro->image)}}" class="card-img-modern" alt="{{$pro->name}}">
                        @else
                            <div class="card-img-modern d-flex align-items-center justify-content-center bg-light">
                                <span class="text-muted" style="font-size: 2rem;">📦</span>
                            </div>
                        @endif
                    </div>
                    <div class="card-body-modern">
                        <div>
                            <h6 class="product-name">{{$pro->name}}</h6>
                            <p class="product-price">₹{{number_format($pro->price, 2)}}</p>
                        </div>

                        <a href="{{ route('addToCart', $pro->id) }}" class="btn-add-cart">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
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

    <!-- ================= LATEST BLOG ================= -->
    <section id="blog" class="section-full">
        <div class="section-title">
            <h2>From Our Blog</h2>
            <div class="underline"></div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="blog-card">
                    <img src="https://images.unsplash.com/photo-1519389950473-acc7b968cb35?auto=format&fit=crop&q=80&w=400"
                        class="card-img-top blog-img">
                    <div class="blog-details">
                        <h5>Top 10 Gadgets in 2026</h5>
                        <p>Discover the latest trending gadgets that are redefining the digital landscape this year.</p>
                        <a href="#" class="btn-read">
                            Read Story
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="blog-card">
                    <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?auto=format&fit=crop&q=80&w=400"
                        class="card-img-top blog-img">
                    <div class="blog-details">
                        <h5>Fashion Trends</h5>
                        <p>Explore the new season styles and learn how to elevate your wardrobe with these key items.</p>
                        <a href="#" class="btn-read">
                            Read Story
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="blog-card">
                    <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&fit=crop&q=80&w=400"
                        class="card-img-top blog-img">
                    <div class="blog-details">
                        <h5>Fitness Essentials</h5>
                        <p>Everything you need to kickstart your wellness journey and hit your health goals this month.</p>
                        <a href="#" class="btn-read">
                            Read Story
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
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