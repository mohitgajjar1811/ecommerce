<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Unit Management</title>
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

    /* NAVBAR / HEADER */
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
      width: 200px;
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

    .btn-search:hover {
      background: #1e293b;
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

    .add-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    /* TABLE */
    .table-wrapper {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    th,
    td {
      border: 1px solid #e2e8f0;
      padding: 16px;
      text-align: left;
    }

    th {
      background: #f8fafc;
      color: #64748b;
      font-weight: 600;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    td {
      background: #ffffff;
      font-size: 15px;
      color: #334155;
    }

    tr:hover td {
      background: #f1f5f9;
    }

    /* ACTION BUTTONS */
    .actions {
      display: flex;
      gap: 8px;
    }

    .action-btn {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: 0.3s;
      font-size: 14px;
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
      background: var(--success);
      color: white;
      border-color: var(--success);
    }

    .page-item.disabled .page-link {
      background: #f8fafc;
      color: #94a3b8;
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

      .card-header {
        flex-direction: column;
        align-items: stretch;
      }

      .search-form input {
        width: 100%;
      }
    }
  </style>
</head>

<body>

  @include('sidebar')

  <div class="main">
    <div class="navbar">
      <h3>Unit Dashboard</h3>
      <div class="user-profile">
        <i class="fas fa-user-circle fa-2x"></i>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h2>Unit Data</h2>

        <form method="GET" action="{{ route('admin.unit') }}" class="search-form">
          <i class="fas fa-search" style="margin-left: 10px; color: #94a3b8;"></i>
          <input type="search" name="search" value="{{ request('search') }}" placeholder="Search units...">
          <button type="submit" class="btn-search">Search</button>
          @if(request('search'))
            <a href="{{ route('admin.unit') }}" style="font-size: 13px; color: var(--danger);">Clear</a>
          @endif
        </form>

        <a href="{{ route('unit.add') }}" class="add-btn">
          <i class="fas fa-plus"></i> Add Unit
        </a>
      </div>

      <div class="table-wrapper">
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Short Name</th>
              <th style="width: 100px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($unit as $data)
              <tr>
                <td style="font-weight: 500;">{{$data->name}}</td>
                <td><span
                    style="background: #e2e8f0; padding: 4px 8px; border-radius: 6px; font-size: 12px; font-weight: 600;">{{$data->short_name}}</span>
                </td>
                <td>
                  <div class="actions">
                    <a class="action-btn edit-btn" href="{{route('unit.edit', $data->id)}}" title="Edit">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a class="action-btn delete-btn" href="{{route('unit.delete', $data->id)}}" title="Delete"
                      onclick="return confirm('Are you sure?')">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="pagination-container">
        {{ $unit->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>

</body>

</html>