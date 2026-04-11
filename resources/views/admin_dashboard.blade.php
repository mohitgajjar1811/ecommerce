<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #6366f1;
      --success: #10b981;
      --info: #3b82f6;
      --warning: #f59e0b;
      --danger: #ef4444;
      --dark: #0f172a;
      --light: #f8fafc;
      --white: #ffffff;
      --sidebar-bg: #0f172a;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
      text-decoration: none;
    }

    body {
      background: #f1f5f9;
      color: #334155;
      min-height: 100vh;
    }

    /* SIDEBAR */
    .sidebar {
      width: 260px;
      height: 100vh;
      background: var(--sidebar-bg);
      color: white;
      position: fixed;
      padding: 24px 16px;
      z-index: 1000;
      box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
    }

    .sidebar h2 {
      font-size: 20px;
      margin-bottom: 40px;
      text-align: center;
      color: #f8fafc;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 12px 16px;
      margin: 8px 0;
      border-radius: 12px;
      color: #94a3b8;
      font-weight: 500;
      transition: 0.3s;
      gap: 12px;
    }

    .sidebar a:hover {
      color: white;
      background: rgba(255, 255, 255, 0.05);
    }

    .sidebar a.active {
      color: white;
      background: var(--success);
    }

    /* MAIN CONTENT */
    .main {
      margin-left: 260px;
      padding: 40px;
    }

    /* HEADER / NAVBAR */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      background: white;
      padding: 20px 30px;
      border-radius: 16px;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .navbar h3 {
      font-size: 24px;
      font-weight: 700;
      color: var(--dark);
    }

    /* CARDS GRID */
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px;
    }

    /* DASHBOARD CARD */
    .dashboard-card {
      background: var(--white);
      padding: 24px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      gap: 20px;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.8);
    }

    .dashboard-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
    }

    .card-icon {
      width: 64px;
      height: 64px;
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      flex-shrink: 0;
    }

    .card-info h3 {
      font-size: 14px;
      font-weight: 600;
      color: #64748b;
      margin-bottom: 4px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .card-info .count {
      font-size: 28px;
      font-weight: 700;
      color: var(--dark);
    }

    .card-link {
      position: absolute;
      inset: 0;
      z-index: 1;
    }

    /* COLOR VARIANTS */
    .card-product .card-icon {
      background: rgba(59, 130, 246, 0.1);
      color: #3b82f6;
    }

    .card-unit .card-icon {
      background: rgba(16, 185, 129, 0.1);
      color: #10b981;
    }

    .card-category .card-icon {
      background: rgba(245, 158, 11, 0.1);
      color: #f59e0b;
    }

    .card-order .card-icon {
      background: rgba(139, 92, 246, 0.1);
      color: #8b5cf6;
    }

    .card-cart .card-icon {
      background: rgba(236, 72, 153, 0.1);
      color: #ec4899;
    }

    .card-user .card-icon {
      background: rgba(6, 182, 212, 0.1);
      color: #06b6d4;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 70px;
      }

      .sidebar h2 span,
      .sidebar a span {
        display: none;
      }

      .main {
        margin-left: 70px;
      }
    }
  </style>
</head>

<body>

  @include('sidebar')

  <div class="main">
    <div class="navbar">
      <h3>Admin Dashboard</h3>
      <div class="user-profile"><i class="fas fa-user-circle fa-2x"></i></div>
    </div>

    <div class="cards-grid">
      <!-- Product -->
      <div class="dashboard-card card-product">
        <div class="card-icon"><i class="fas fa-box"></i></div>
        <div class="card-info">
          <h3>Products</h3>
          <p class="count">{{ $productCount }}</p>
        </div>
        <a href="{{route('admin.product')}}" class="card-link"></a>
      </div>

      <!-- Unit -->
      <div class="dashboard-card card-unit">
        <div class="card-icon"><i class="fas fa-ruler-combined"></i></div>
        <div class="card-info">
          <h3>Units</h3>
          <p class="count">{{ $unitCount }}</p>
        </div>
        <a href="{{route('admin.unit')}}" class="card-link"></a>
      </div>

      <!-- Category -->
      <div class="dashboard-card card-category">
        <div class="card-icon"><i class="fas fa-tags"></i></div>
        <div class="card-info">
          <h3>Categories</h3>
          <p class="count">{{ $categoryCount }}</p>
        </div>
        <a href="{{route('admin.category')}}" class="card-link"></a>
      </div>

      <!-- Order -->
      <div class="dashboard-card card-order">
        <div class="card-icon"><i class="fas fa-shopping-bag"></i></div>
        <div class="card-info">
          <h3>Orders</h3>
          <p class="count">{{ $orderCount }}</p>
        </div>
        <a href="{{route('admin.order')}}" class="card-link"></a>
      </div>

      <!-- Cart -->
      <div class="dashboard-card card-cart">
        <div class="card-icon"><i class="fas fa-shopping-cart"></i></div>
        <div class="card-info">
          <h3>Cart Items</h3>
          <p class="count">{{ $cartCount }}</p>
        </div>
        <a href="{{route('admin.cart')}}" class="card-link"></a>
      </div>

      <!-- User -->
      <div class="dashboard-card card-user">
        <div class="card-icon"><i class="fas fa-users"></i></div>
        <div class="card-info">
          <h3>Users</h3>
          <p class="count">{{ $userCount }}</p>
        </div>
        <a href="{{route('user.show')}}" class="card-link"></a>
      </div>
    </div>
  </div>

</body>

</html>