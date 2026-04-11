<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Management</title>
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

    /* HEADER */
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

    /* CARD */
    .card {
      background: var(--white);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      flex-wrap: wrap;
      gap: 20px;
    }

    .card-header h2 {
      font-size: 20px;
      font-weight: 600;
      color: var(--dark);
    }

    /* SEARCH FORM */
    .search-form {
      display: flex;
      align-items: center;
      gap: 12px;
      background: #f8fafc;
      padding: 6px;
      border-radius: 12px;
      border: 1px solid #e2e8f0;
    }

    .search-form input {
      border: none;
      background: transparent;
      padding: 8px 12px;
      outline: none;
      font-size: 14px;
      width: 250px;
    }

    .btn-search {
      background: var(--dark);
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      transition: 0.3s;
    }

    .add-btn {
      background: var(--success);
      color: white;
      padding: 10px 20px;
      border-radius: 10px;
      font-weight: 600;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: 0.3s;
    }

    /* TABLE */
    .table-wrapper {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th {
      text-align: left;
      padding: 16px;
      color: #64748b;
      font-weight: 600;
      font-size: 13px;
      text-transform: uppercase;
      border: 1px solid #e2e8f0;
      background: #f8fafc;
    }

    td {
      padding: 16px;
      background: #ffffff;
      font-size: 14px;
      border: 1px solid #e2e8f0;
    }

    tr:hover td {
      background: #f1f5f9;
    }

    /* PRODUCT IMAGE */
    .product-img {
      width: 50px;
      height: 50px;
      border-radius: 8px;
      object-fit: cover;
      border: 1px solid #e2e8f0;
    }

    /* BADGES */
    .badge {
      padding: 4px 8px;
      border-radius: 6px;
      font-size: 12px;
      font-weight: 600;
    }

    .badge-category {
      background: #e0e7ff;
      color: #4338ca;
    }

    .badge-unit {
      background: #ecfdf5;
      color: #065f46;
    }

    .price {
      font-weight: 700;
      color: var(--dark);
    }

    .stock {
      font-weight: 600;
      color: #64748b;
    }

    /* ACTIONS */
    .actions {
      display: flex;
      gap: 8px;
    }

    .action-btn {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: 0.3s;
    }

    .edit-btn {
      background: rgba(16, 185, 129, 0.1);
      color: var(--success);
    }

    .edit-btn:hover {
      background: var(--success);
      color: white;
    }

    .delete-btn {
      background: rgba(239, 68, 68, 0.1);
      color: var(--danger);
    }

    .delete-btn:hover {
      background: var(--danger);
      color: white;
    }

    /* PAGINATION */
    .pagination-container {
      margin-top: 30px;
      display: flex;
      justify-content: center;
    }

    .pagination {
      display: flex;
      gap: 8px;
      list-style: none;
      padding: 0;
    }

    .page-item {
      display: inline-block;
    }

    .page-link {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: white;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      color: #64748b;
      font-weight: 600;
      transition: 0.3s;
      text-decoration: none;
      font-size: 14px;
    }

    .page-item.active .page-link {
      background: var(--primary);
      color: white;
      border-color: var(--primary);
      box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
    }

    .page-item.disabled .page-link {
      background: #f8fafc;
      color: #cbd5e1;
      cursor: not-allowed;
    }

    .page-link:hover:not(.disabled) {
      background: #f1f5f9;
      color: var(--primary);
      transform: translateY(-2px);
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

      .search-form input {
        width: 100%;
      }
    }

    /* ALERTS */
    .alert {
      padding: 16px 20px;
      border-radius: 12px;
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 12px;
      font-weight: 500;
      animation: slideIn 0.3s ease-out;
    }

    .alert-success {
      background: #ecfdf5;
      color: #065f46;
      border: 1px solid #10b981;
    }

    @keyframes slideIn {
      from {
        transform: translateY(-10px);
        opacity: 0;
      }

      to {
        transform: translateY(0);
        opacity: 1;
      }
    }
  </style>
</head>

<body>

  @include('sidebar')

  <div class="main">
    <div class="navbar">
      <h3>Product Dashboard</h3>
      <div class="user-profile"><i class="fas fa-user-circle fa-2x"></i></div>
    </div>

    @if(session('success'))
      <div class="alert alert-success">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
      </div>
    @endif

    <div class="card">
      <div class="card-header">
        <h2>Product Data</h2>
        <form method="GET" action="{{ route('admin.product') }}" class="search-form">
          <i class="fas fa-search" style="margin-left:10px; color:#94a3b8"></i>
          <input type="search" name="search" value="{{ request('search') }}" placeholder="Search products...">
          <button type="submit" class="btn-search">Search</button>
          @if(request('search'))
            <a href="{{ route('admin.product') }}"
              style="font-size:12px; color:var(--danger); margin-right:10px">Clear</a>
          @endif
        </form>
        <a href="{{ route('product.add') }}" class="add-btn"><i class="fas fa-plus"></i> Add Product</a>
      </div>

      <div class="table-wrapper">
        <table>
          <thead>
            <tr>
              <th>Img</th>
              <th>Name</th>
              <th>Category</th>
              <th>Unit</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product as $data)
              <tr>
                <td><img src="{{ asset('storage/' . $data->image) }}" class="product-img"></td>
                <td style="font-weight:600">{{$data->name}}</td>
                <td><span class="badge badge-category">{{$data->category->name}}</span></td>
                <td><span class="badge badge-unit">{{$data->unit->name}}</span></td>
                <td class="price">₹{{$data->price}}</td>
                <td class="stock">{{$data->stock}}</td>
                <td>
                  <div class="actions">
                    <a class="action-btn edit-btn" href="{{route('product.edit', $data->id)}}"><i
                        class="fas fa-edit"></i></a>
                    <a class="action-btn delete-btn" href="{{route('product.delete', $data->id)}}"
                      onclick="return confirm('Delete this product?')"><i class="fas fa-trash-alt"></i></a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="pagination-container">
        {{ $product->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>

</body>

</html>