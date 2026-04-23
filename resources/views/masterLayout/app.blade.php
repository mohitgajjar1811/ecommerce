<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ecommerce Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero {
            background: url('https://via.placeholder.com/1600x600') center/cover no-repeat;
            display: flex;
            align-items: center;
            color: white;
        }
        .hero-overlay {
            background: rgba(0,0,0,0.6);
            padding: 60px;
            width: 100%;
        }
        .product-card img {
            height: 200px;
            object-fit: cover;
        }
        .footer {
            background-color: #212529;
            color: white;
        
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">ShopZone</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/products">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="#categories">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                @php
                    $cartCount = 0;
                    $cart = \App\Models\Cart::where('session_id', session()->getId())
                        ->orWhere('user_id', auth()->id())
                        ->first();
                    if($cart) {
                        $cartCount = $cart->items()->sum('quantity');
                    }
                @endphp
                <li class="nav-item">
                    <a class="btn btn-warning ms-3" href="/addtocart">🛒 Cart ({{ $cartCount }})</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div style="margin-top:70px;"></div>

<!-- ================= HERO ================= -->
<section class="hero text-center">
    <div class="hero-overlay">
        <div class="container">
            <h1 class="display-4 fw-bold">Big Sale is Live!</h1>
            <p class="lead">Up to 50% off on selected products</p>
            <a href="#products" class="btn btn-warning btn-lg">Shop Now</a>
        </div>
    </div>
</section>
<div class="container-fluid">
    @hasSection('content')
        @yield('content')
    @else 
        <h1>No Content</h1>
    @endif
</div>
{{-- @section('button')
    <button>This is Comman Button</button>
@show  --}}
<!-- ================= FOOTER ================= -->
<footer class="footer py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <h5>ShopZone</h5>
                <p>Your trusted online shopping store.</p>
            </div>

            <div class="col-md-3">
                <h6>Quick Links</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">About</a></li>
                    <li><a href="#" class="text-white">Products</a></li>
                    <li><a href="/blog" class="text-white">Blog</a></li>
                    <li><a href="#" class="text-white">Contact</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <h6>Customer Service</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">FAQ</a></li>
                    <li><a href="#" class="text-white">Returns</a></li>
                    <li><a href="#" class="text-white">Shipping</a></li>
                </ul>
            </div>

            <div class="col-md-3">
                <h6>Contact</h6>
                <p>Email: support@shopzone.com</p>
                <p>Phone: +123 456 7890</p>
            </div>

        </div>

        <hr class="bg-light">
        <p class="text-center mb-0">&copy; 2026 ShopZone. All rights reserved.</p>
    </div>
</footer>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
