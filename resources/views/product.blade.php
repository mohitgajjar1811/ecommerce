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

    .products-container {
        width: 100%;
        margin: 40px 0;
        padding: 0 40px;
    }

    .header-section {
        margin-bottom: 40px;
        text-align: center;
    }

    .header-section h2 {
        font-weight: 700;
        letter-spacing: -1px;
        margin-bottom: 10px;
    }

    .header-section .product-count {
        background: #e2e8f0;
        color: var(--text-muted);
        font-size: 0.85rem;
        padding: 4px 12px;
        border-radius: 20px;
        font-weight: 500;
    }

    /* Layout Grid */
    .catalog-layout {
        display: grid;
        grid-template-columns: 320px 1fr;
        gap: 50px;
        align-items: start;
    }

    @media (max-width: 992px) {
        .catalog-layout {
            grid-template-columns: 1fr;
        }
    }

    /* Sticky Sidebar */
    .filter-sidebar {
        position: sticky;
        top: 100px;
        background: white;
        padding: 30px;
        border-radius: 24px;
        box-shadow: var(--shadow);
        border: 1px solid rgba(0,0,0,0.03);
    }

    .filter-title {
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-label {
        font-weight: 600;
        font-size: 0.85rem;
        color: var(--text-muted);
        margin-bottom: 8px;
        display: block;
    }

    .custom-input {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 15px;
        transition: 0.3s;
        font-size: 0.9rem;
    }

    .custom-input:focus {
        background: white;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        outline: none;
    }

    .btn-apply {
        background: var(--text-main);
        color: white;
        width: 100%;
        padding: 14px;
        border-radius: 12px;
        font-weight: 600;
        border: none;
        margin-top: 20px;
        transition: 0.3s;
    }

    .btn-apply:hover {
        background: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.2);
    }

    /* Product Grid */
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
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .img-wrapper {
        position: relative;
        overflow: hidden;
        padding-top: 100%; /* 1:1 Aspect Ratio */
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
        box-shadow: 0 8px 15px -3px rgba(99, 102, 241, 0.3);
    }

        /* Premium Pagination */
        .pagination-container {
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

    /* Empty State */
    .no-results {
        text-align: center;
        padding: 80px 40px;
        background: white;
        border-radius: 24px;
        box-shadow: var(--shadow);
    }
</style>

<div class="products-container">
    <div class="header-section">
        <h2>Our Collection</h2>
        <span class="product-count">{{ $products->total() }} Products Available</span>
    </div>

    <div class="catalog-layout">
        <!-- Sidebar Filters -->
        <aside>
            <form method="GET" class="filter-sidebar">
                <h5 class="filter-title">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>
                    Filters
                </h5>

                <div class="mb-4">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select custom-input">
                        <option value="">All Categories</option>
                        @foreach($catgories as $cat)
                            <option value="{{$cat->name}}" {{ request('category') == $cat->name ? 'selected' : '' }}>
                                {{$cat->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Min Price</label>
                    <input type="number" name="min_price" class="form-control custom-input" placeholder="₹ min" value="{{ request('min_price') }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Max Price</label>
                    <input type="number" name="max_price" class="form-control custom-input" placeholder="₹ max" value="{{ request('max_price') }}">
                </div>

                <button class="btn btn-apply">Apply Filters</button>
            </form>
        </aside>

        <!-- Product Grid -->
        <main>
            @if($products->isEmpty())
                <div class="no-results">
                    <span style="font-size: 3rem; display: block; margin-bottom: 20px;">🔍</span>
                    <h4 class="fw-bold">No products found</h4>
                    <p class="text-muted">Try adjusting your filters to find what you're looking for.</p>
                </div>
            @else
                <div class="product-grid">
                    @foreach ($products as $pro)
                    <div class="col">
                        <div class="card modern-card">
                            <div class="img-wrapper">
                                @if($pro->image)
                                    <img src="{{asset('storage/' . $pro->image)}}" class="card-img-modern" alt="{{$pro->name}}">
                                @else
                                    <div class="card-img-modern d-flex align-items-center justify-content-center bg-light">
                                        <span class="text-muted" style="font-size: 2.5rem;">📦</span>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body-modern">
                                <div>
                                    <h6 class="product-name">{{$pro->name}}</h6>
                                    <p class="product-price">₹{{number_format($pro->price, 2)}}</p>
                                </div>
                                
                                <a href="{{ route('addToCart', $pro->id) }}" class="btn-add-cart">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="pagination-container">
                    {{ $products->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </main>
    </div>
</div>
@endsection