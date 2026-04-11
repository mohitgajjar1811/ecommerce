<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body { overflow-x: hidden; }
        .sidebar {
            height: 100vh;
            background: #212529;
        }
        .sidebar a {
            color: #adb5bd;
            display: block;
            padding: 12px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #343a40;
            color: #fff;
        }
        .card-box {
            border-left: 5px solid #0d6efd;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">

        {{-- Sidebar --}}
        <div class="col-md-2 sidebar p-0">
            <h4 class="text-white text-center py-3">{{$name}}</h4>

            <a href="#"><i class="fa fa-home me-2"></i> Dashboard</a>
            <a href="#"><i class="fa fa-users me-2"></i> Users</a>
            <a href="#"><i class="fa fa-box me-2"></i> Products</a>
            <a href="#"><i class="fa fa-chart-bar me-2"></i> Reports</a>
            <a href="#"><i class="fa fa-cog me-2"></i> Settings</a>
            <a href="#"><i class="fa fa-sign-out-alt me-2"></i> Logout</a>
        </div>

        {{-- Main Content --}}
        <div class="col-md-10">

            {{-- Navbar --}}
            <nav class="navbar navbar-light bg-light shadow-sm">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h5">Dashboard</span>

                    <div>
                        <i class="fa fa-bell me-3"></i>
                        <i class="fa fa-user-circle"></i>
                    </div>
                </div>
            </nav>

            <div class="p-4">
                @yield('content')
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>