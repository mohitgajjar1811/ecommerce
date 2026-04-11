<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Unit</title>
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
      max-width: 600px;
      margin: 0 auto;
    }

    .card-header {
      margin-bottom: 30px;
      border-bottom: 1px solid #e2e8f0;
      padding-bottom: 15px;
    }

    .card-header h2 {
      font-size: 20px;
      font-weight: 600;
      color: var(--dark);
    }

    /* FORM STYLES */
    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
      color: var(--dark);
      font-size: 14px;
    }

    .form-control {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      font-size: 14px;
      outline: none;
      transition: all 0.3s;
      background: #f8fafc;
      color: #334155;
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
      background: white;
    }

    /* BUTTON */
    .btn-submit {
      background: var(--success);
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 10px;
      font-weight: 600;
      font-size: 15px;
      cursor: pointer;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      margin-top: 10px;
    }

    .btn-submit:hover {
      background: #059669;
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 70px;
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
      <h3>Edit Unit</h3>
      <div class="user-profile"><i class="fas fa-user-circle fa-2x"></i></div>
    </div>

    <div class="card">
      <div class="card-header">
        <h2><i class="fas fa-balance-scale" style="color: var(--primary); margin-right: 8px;"></i> Update Unit Details</h2>
      </div>

      <form action="{{route('unit.update')}}" method="POST">
        @csrf
        <input type="hidden" value="{{$data->id}}" name="id">

        <div class="form-group">
          <label>Unit Name</label>
          <input type="text" value="{{$data->name}}" name="name" class="form-control" placeholder="Enter unit name (e.g. Kilogram)">
        </div>

        <div class="form-group">
          <label>Short Name</label>
          <input type="text" value="{{$data->short_name}}" name="short_name" class="form-control" placeholder="Enter short name (e.g. Kg)">
        </div>

        <button type="submit" class="btn-submit">
          <i class="fas fa-save"></i> Update Unit
        </button>
      </form>
    </div>
  </div>

</body>
</html>