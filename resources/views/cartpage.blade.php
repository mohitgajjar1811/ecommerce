@extends('masterlayout.app')

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

    .cart-container {
        width: 100%;
        margin: 40px 0;
        padding: 0 40px;
    }

    .page-title {
        font-weight: 700;
        letter-spacing: -0.5px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .page-title span {
        background: var(--primary);
        color: white;
        font-size: 0.9rem;
        padding: 4px 12px;
        border-radius: 20px;
        font-weight: 400;
    }

    /* Main Grid Layout */
    .cart-grid {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 30px;
        align-items: start;
    }

    @media (max-width: 992px) {
        .cart-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Cart Items Table Design */
    .cart-card {
        background: var(--card-bg);
        border-radius: 20px;
        box-shadow: var(--shadow);
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.03);
    }

    .cart-table {
        margin: 0;
    }

    .cart-table th {
        background: #f1f5f9;
        color: var(--text-muted);
        text-transform: uppercase;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 1px;
        padding: 20px;
        border: none;
    }

    .cart-table td {
        padding: 25px 20px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .product-img {
        width: 100px;
        height: 100px;
        border-radius: 15px;
        object-fit: cover;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        transition: 0.3s;
    }

    .product-img:hover {
        transform: scale(1.05);
    }

    .product-details h6 {
        font-weight: 600;
        margin-bottom: 4px;
        color: var(--text-main);
    }

    .product-details p {
        font-size: 0.85rem;
        color: var(--text-muted);
        margin: 0;
    }

    /* Quantity Controls */
    .qty-controls {
        display: flex;
        align-items: center;
        background: #f8fafc;
        padding: 6px;
        border-radius: 50px;
        width: fit-content;
        border: 1px solid #e2e8f0;
    }

    .qty-btn {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 50%;
        color: var(--text-main);
        text-decoration: none;
        font-weight: bold;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        transition: 0.2s;
    }

    .qty-btn:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-1px);
    }

    .qty-val {
        padding: 0 15px;
        font-weight: 600;
        font-size: 0.95rem;
    }

    /* Summary Card */
    .summary-card {
        padding: 30px;
        background: white;
        border-radius: 20px;
        box-shadow: var(--shadow);
        border: 1px solid rgba(0,0,0,0.03);
        position: sticky;
        top: 100px;
    }

    .summary-title {
        font-weight: 700;
        margin-bottom: 25px;
        font-size: 1.25rem;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        color: var(--text-muted);
        font-size: 0.95rem;
    }

    .summary-row.total {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px dashed #e2e8f0;
        color: var(--text-main);
        font-weight: 700;
        font-size: 1.2rem;
    }

    .checkout-btn {
        width: 100%;
        padding: 16px;
        background: var(--text-main);
        color: white;
        border: none;
        border-radius: 15px;
        font-weight: 600;
        margin-top: 25px;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    .checkout-btn:hover:not(:disabled) {
        background: var(--primary);
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
    }

    .remove-btn {
        color: #ef4444;
        background: #fef2f2;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        transition: 0.2s;
        text-decoration: none;
    }

    .remove-btn:hover {
        background: #ef4444;
        color: white;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 40px;
    }

    .empty-icon {
        font-size: 4rem;
        margin-bottom: 20px;
        display: block;
    }

    .btn-shop {
        display: inline-block;
        padding: 12px 30px;
        background: var(--primary);
        color: white;
        text-decoration: none;
        border-radius: 50px;
        font-weight: 600;
        margin-top: 20px;
        transition: 0.3s;
    }

    .btn-shop:hover {
        background: var(--primary-hover);
        color: white;
        box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.3);
    }
</style>

<div class="cart-container">
    <h2 class="page-title">
        Shopping Cart 
        <span>{{ count($cart) }} Items</span>
    </h2>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show" style="border-radius: 15px;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="cart-grid">
        <!-- Products Column -->
        <div class="cart-card">
            <table class="table cart-table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Product Details</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{dd($cart)}} --}}
                    @forelse($cart as $item)
                    <tr>
                        <!-- Product -->
                        <td>
                            <div class="product-info">
                                @if($item['product']->image)
                                    <img src="{{ asset('storage/'.$item['product']->image) }}" class="product-img">
                                @else
                                    <div class="product-img d-flex align-items-center justify-content-center bg-light">
                                        <span class="text-muted" style="font-size: 2rem;">📦</span>
                                    </div>
                                @endif
                                <div class="product-details">
                                    <h6>{{ $item['product']->name }}</h6>
                                    <p>{{ $item['product']->category->name ?? 'General' }}</p>
                                </div>
                            </div>
                        </td>

                        <!-- Price -->
                        <td class="fw-semibold">₹{{ number_format($item['product']->price, 2) }}</td>

                        <!-- Quantity -->
                        <td>
                            <div class="qty-controls">
                                <a href="{{ route('cart.decrease', $item['product_id']) }}" class="qty-btn">-</a>
                                <span class="qty-val">{{ $item['quantity'] }}</span>
                                <a href="{{ route('cart.increase', $item['product_id']) }}" class="qty-btn">+</a>
                            </div>
                        </td>

                        <!-- Subtotal -->
                        <td class="fw-bold text-primary">₹{{ number_format($item['total'], 2) }}</td>

                        <!-- Remove -->
                        <td>
                            <a href="{{ route('cart.remove', $item['product_id']) }}" class="remove-btn" title="Remove Item">
                                ✕
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <span class="empty-icon">🛒</span>
                                <h4 class="fw-bold">Your cart is empty</h4>
                                <p class="text-muted">Looks like you haven't added anything to your cart yet.</p>
                                <a href="/products" class="btn-shop">Explore Products</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Summary Column -->
        <div class="summary-card">
            <h5 class="summary-title">Order Summary</h5>
            
            <div class="summary-row">
                <span>Subtotal</span>
                {{-- <span class="fw-semibold text-dark">₹{{ number_format($total, 2) }}</span> --}}
            </div>

            <div class="summary-row">
                <span>Estimated Shipping</span>
                <span class="text-success fw-medium">Free</span>
            </div>

            <div class="summary-row">
                <span>Tax Estimate</span>
                <span class="fw-semibold text-dark">₹0.00</span>
            </div>

            <div class="summary-row total">
                <span>Total</span>
                {{-- <span>₹{{ number_format($total, 2) }}</span> --}}
            </div>

            <button class="checkout-btn" {{ empty($cart) ? 'disabled' : '' }}>
                Process to Checkout
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </button>
            
            <div class="mt-4 text-center">
                <p class="text-muted mb-0" style="font-size: 0.8rem;">
                    <i class="me-1">🔒</i> Secure encrypted checkout
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
