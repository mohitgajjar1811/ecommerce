@extends('masterlayout.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout | ShopZone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background: #f4f7fb;
            color: #18233a;
        }

        .navbar {
            background: #1f2429;
            padding: 16px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #fff;
            font-size: 24px;
            font-weight: 800;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 26px;
        }

        .nav-links a {
            color: #b8c0cc;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #fff;
        }

        .cart-btn {
            background: #ffc107;
            color: #000 !important;
            padding: 12px 22px;
            border-radius: 10px;
            font-weight: 700 !important;
            text-decoration: none;
        }

        .user-circle {
            width: 50px;
            height: 50px;
            background: #ffc107;
            color: #111;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 20px;
        }

        .checkout-wrapper {
            padding: 55px 7%;
        }

        .page-title {
            font-size: 38px;
            font-weight: 800;
            margin-bottom: 35px;
            color: #15213b;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1.6fr 0.9fr;
            gap: 38px;
            align-items: flex-start;
        }

        .checkout-card,
        .summary-card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 15px 35px rgba(19, 33, 68, 0.08);
        }

        .checkout-card {
            padding: 36px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 25px;
            color: #18233a;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: span 2;
        }

        label {
            font-size: 14px;
            font-weight: 700;
            color: #50607a;
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #e3e8f0;
            background: #f8fafc;
            padding: 15px 17px;
            border-radius: 14px;
            font-size: 15px;
            color: #18233a;
            outline: none;
            transition: 0.2s ease;
        }

        input:focus,
        textarea:focus {
            border-color: #6c63ff;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(108, 99, 255, 0.08);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .payment-box {
            margin-top: 32px;
            padding-top: 30px;
            border-top: 1px dashed #dce3ee;
        }

        .payment-options {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .payment-option {
            border: 1px solid #e3e8f0;
            background: #f8fafc;
            padding: 18px;
            border-radius: 16px;
            display: flex;
            gap: 12px;
            align-items: center;
            cursor: pointer;
            font-weight: 700;
            color: #18233a;
        }

        .payment-option input {
            width: auto;
            accent-color: #ffc107;
        }

        .summary-card {
            padding: 34px;
            position: sticky;
            top: 20px;
        }

        .summary-title {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 25px;
        }

        .order-item {
            display: flex;
            gap: 14px;
            margin-bottom: 20px;
            align-items: center;
        }

        .product-icon {
            width: 78px;
            height: 78px;
            border-radius: 14px;
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: 800;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .item-qty {
            font-size: 14px;
            color: #64748b;
        }

        .item-price {
            font-weight: 800;
            color: #0d6efd;
            white-space: nowrap;
        }

        .summary-line {
            display: flex;
            justify-content: space-between;
            margin: 18px 0;
            color: #62718d;
            font-size: 16px;
        }

        .summary-line strong {
            color: #18233a;
        }

        .divider {
            border-top: 1px dashed #dce3ee;
            margin: 24px 0;
        }

        .total-line {
            display: flex;
            justify-content: space-between;
            font-size: 24px;
            font-weight: 800;
            color: #18233a;
            margin-bottom: 28px;
        }

        .place-btn {
            width: 100%;
            border: none;
            background: #1d2a44;
            color: #fff;
            padding: 18px;
            border-radius: 16px;
            font-size: 17px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .place-btn:hover {
            background: #111827;
            transform: translateY(-2px);
        }

        .back-cart {
            display: inline-block;
            margin-top: 18px;
            text-align: center;
            width: 100%;
            color: #64748b;
            text-decoration: none;
            font-weight: 700;
        }

        .footer {
            background: #1f2429;
            padding: 45px 7%;
            color: #fff;
            margin-top: 30px;
        }

        @media (max-width: 992px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .summary-card {
                position: static;
            }
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 15px 20px;
            }

            .nav-links {
                gap: 12px;
            }

            .nav-links a:not(.cart-btn) {
                display: none;
            }

            .checkout-wrapper {
                padding: 35px 18px;
            }

            .page-title {
                font-size: 30px;
            }

            .checkout-card,
            .summary-card {
                padding: 24px;
            }

            .form-grid,
            .payment-options {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>



<div class="checkout-wrapper">

    <h1 class="page-title">Checkout</h1>

    <form action="#" method="POST">
        <div class="checkout-grid">

            <div class="checkout-card">
                <h2 class="section-title">Shipping Details</h2>

                <div class="form-grid">

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" value="{{ Auth::check() ? Auth::user()->name : '' }}" placeholder="Enter your full name">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" placeholder="Enter your email">
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" value="{{ Auth::check() ? Auth::user()->phone_number : '' }}"placeholder="Enter phone number">
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <input type="text" placeholder="Enter city">
                    </div>

                    <div class="form-group full">
                        <label>Full Address</label>
                        <textarea placeholder="House no, area, landmark..."></textarea>
                    </div>

                    <div class="form-group">
                        <label>State</label>
                        <input type="text" placeholder="Enter state">
                    </div>

                    <div class="form-group">
                        <label>Pincode</label>
                        <input type="text" placeholder="Enter pincode">
                    </div>

                </div>

                <div class="payment-box">
                    <h2 class="section-title">Payment Method</h2>

                    <div class="payment-options">
                        <label class="payment-option">
                            <input type="radio" name="payment_method" checked>
                            Cash on Delivery
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment_method">
                            Online Payment
                        </label>
                    </div>
                </div>
            </div>

            <div class="summary-card">
                <h2 class="summary-title">Order Summary</h2>

                <div class="order-item">
                    <div class="product-icon">🎧</div>

                    <div class="item-info">
                        <div class="item-name">Aether Pro Headphones</div>
                        <div class="item-qty">Qty: 1</div>
                    </div>

                    <div class="item-price">₹24,999.00</div>
                </div>

                <div class="divider"></div>

                <div class="summary-line">
                    <span>Subtotal</span>
                    <strong>₹24,999.00</strong>
                </div>

                <div class="summary-line">
                    <span>Estimated Shipping</span>
                    <strong style="color:#16a34a;">Free</strong>
                </div>

                <div class="summary-line">
                    <span>Tax Estimate</span>
                    <strong>₹0.00</strong>
                </div>

                <div class="divider"></div>

                <div class="total-line">
                    <span>Total</span>
                    <span>₹24,999.00</span>
                </div>

                <button type="button" class="place-btn">
                    Place Order
                </button>

                <a href="/addtocart" class="back-cart">← Back to Cart</a>
            </div>

        </div>
    </form>

</div>

</body>
</html>
@endsection