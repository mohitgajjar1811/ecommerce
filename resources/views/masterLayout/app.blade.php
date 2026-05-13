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
            background: rgba(0, 0, 0, 0.6);
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

        .yellow-btn-2 {
            background: linear-gradient(135deg, #facc15, #f59e0b);
            color: #000;
            padding: 12px 28px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 0.5px;
            display: inline-block;
            transition: all 0.3s ease;
            margin-left: 10px;
        }

        /* Profile Dropdown Styling */
        .profile-dropdown {
            position: relative;
            display: inline-block;
            margin-left: 15px;
        }

        .profile-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #facc15, #f59e0b);
            color: #000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(250, 204, 21, 0.3);
            transition: all 0.3s ease;
            font-size: 1.1rem;
            border: 2px solid transparent;
            text-transform: uppercase;
        }

        .profile-dropdown:hover .profile-avatar {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(250, 204, 21, 0.4);
        }

        .dropdown-content {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            right: 0;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            min-width: 200px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            z-index: 1000;
            margin-top: 15px;
            overflow: hidden;
            transform: translateY(15px);
            transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .profile-dropdown:hover .dropdown-content {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-content .user-header {
            padding: 15px 20px;
            background: #f8fafc;
            border-bottom: 1px solid #f1f5f9;
        }

        .dropdown-content .user-header .user-name {
            display: block;
            font-weight: 700;
            color: #1e293b;
            font-size: 0.95rem;
        }

        .dropdown-content .user-header .user-email {
            display: block;
            font-size: 0.75rem;
            color: #64748b;
        }

        .dropdown-content a,
        .dropdown-content button {
            color: #475569;
            padding: 12px 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            transition: 0.2s;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            font-size: 0.9rem;
        }

        .dropdown-content a:hover,
        .dropdown-content button:hover {
            background-color: #fffbeb;
            color: #d97706;
        }

        .dropdown-content .logout-btn {
            border-top: 1px solid #f1f5f9;
            color: #ef4444;
        }

        .dropdown-content .logout-btn:hover {
            background-color: #fef2f2;
            color: #dc2626;
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
                    <li class="nav-item"><a class="nav-link" href="/categories">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                    {{-- {{dd(count(session()->get('cart')))}} --}}
                    @php

                        $cartCount = 0;

                        if (auth()->check()) {

                            // Login user cart
                            $cart = \App\Models\Cart::where('user_id', auth()->id())->first();

                            if ($cart) {
                                // Total quantity count
                                $cartCount = \App\Models\CartItem::where('cart_id', $cart->id)->sum('quantity');
                            }

                        } else {

                            // Session cart
                            $sessionCart = session()->get('cart', []);

                            if (!empty($sessionCart)) {
                                foreach ($sessionCart as $item) {
                                    $cartCount += isset($item['quantity']) ? $item['quantity'] : 0;
                                }
                            }
                        }
                    @endphp
                    <li class="nav-item">
                        <a class="btn btn-warning ms-3" href="/addtocart">🛒 Cart ({{ $cartCount }})</a>
                    </li>
                </ul>
                @php
                    $user = auth()->user();
                @endphp
                @if ($user)
                    <div class="profile-dropdown">
                        <div class="profile-avatar">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                        <div class="dropdown-content">
                            <div class="user-header">
                                <span class="user-name">{{ $user->name }}</span>
                                <span class="user-email">{{ $user->email }}</span>
                            </div>
                            <a href="/profile">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                Profile
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-btn">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/registration" class="yellow-btn-2">Register Now</a>
                    <a href="/login" class="yellow-btn-2">Login</a>
                @endif
            </div>
        </div>
    </nav>

    <div style="margin-top:70px;"></div>
    <div class="container-fluid">
        @hasSection('content')
            @yield('content')
        @else
            <h1>No Content</h1>
        @endif
    </div>
    {{-- @section('button')
    <button>This is Comman Button</button>
    @show --}}
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