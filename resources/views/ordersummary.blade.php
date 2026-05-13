@extends('masterlayout.app')

@section('content')

    <style>
        .order-summary-section {
            margin-top: 32px;
        }

        .order-summary-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .order-summary-header h3 {
            font-size: 24px;
            font-weight: 800;
            color: #1b2a41;
            margin: 0;
        }

        .view-all-orders {
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            color: #f4a300;
        }

        .order-summary-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .summary-box {
            background: #f7f9fc;
            border: 1px solid #edf1f7;
            border-radius: 18px;
            padding: 20px;
            transition: 0.3s ease;
        }

        .summary-box.active {
            border: 1.5px solid #f4a300;
            background: #fffdf8;
            box-shadow: 0 8px 20px rgba(244, 163, 0, 0.08);
        }

        .summary-label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #6b7a90;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .summary-box h4 {
            font-size: 28px;
            font-weight: 800;
            color: #1b2a41;
            margin: 0;
        }

        .recent-order-card {
            background: #ffffff;
            border: 1px solid #edf1f7;
            border-radius: 22px;
            padding: 24px;
            box-shadow: 0 10px 24px rgba(17, 24, 39, 0.05);
        }

        .recent-order-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 18px;
            border-bottom: 1px solid #eef2f7;
            margin-bottom: 18px;
        }

        .order-id {
            font-size: 18px;
            font-weight: 800;
            color: #1b2a41;
            margin: 0 0 4px;
        }

        .order-date {
            font-size: 14px;
            color: #7b8798;
        }

        .order-status {
            background: #fff4db;
            color: #e39a00;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
        }

        .recent-order-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .detail-item {
            background: #f7f9fc;
            border-radius: 16px;
            padding: 16px 18px;
        }

        .detail-item span {
            display: block;
            font-size: 13px;
            color: #7b8798;
            margin-bottom: 6px;
            font-weight: 600;
        }

        .detail-item strong {
            font-size: 16px;
            color: #1b2a41;
            font-weight: 800;
        }

        @media (max-width: 992px) {
            .order-summary-stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .recent-order-details {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .order-summary-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .order-summary-stats {
                grid-template-columns: 1fr;
            }

            .recent-order-top {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
    </style>
    <div class="order-summary-section">
        <div class="order-summary-header">
            <h3>Order Summary</h3>
            <a href="#" class="view-all-orders">View All</a>
        </div>

        <div class="order-summary-stats">
            <div class="summary-box">
                <span class="summary-label">Total Orders</span>
                <h4>12</h4>
            </div>

            <div class="summary-box active">
                <span class="summary-label">Pending</span>
                <h4>03</h4>
            </div>

            <div class="summary-box">
                <span class="summary-label">Delivered</span>
                <h4>08</h4>
            </div>

            <div class="summary-box">
                <span class="summary-label">Cancelled</span>
                <h4>01</h4>
            </div>
        </div>

        <div class="recent-order-card">
            <div class="recent-order-top">
                <div>
                    <p class="order-id">Order #SZ1025</p>
                    <span class="order-date">Placed on 12 May 2026</span>
                </div>
                <span class="order-status">Pending</span>
            </div>

            <div class="recent-order-details">
                <div class="detail-item">
                    <span>Items</span>
                    <strong>3 Products</strong>
                </div>
                <div class="detail-item">
                    <span>Payment</span>
                    <strong>Cash on Delivery</strong>
                </div>
                <div class="detail-item">
                    <span>Total Amount</span>
                    <strong>₹24,999</strong>
                </div>
                <div class="detail-item">
                    <span>Expected Delivery</span>
                    <strong>16 May 2026</strong>
                </div>
            </div>
        </div>
    </div>
@endsection