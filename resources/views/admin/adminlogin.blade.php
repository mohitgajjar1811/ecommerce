<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | ShopZone</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins', sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
        }

        .login-container{
            width:100%;
            max-width:420px;
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(12px);
            border-radius:20px;
            padding:40px 35px;
            box-shadow:0 10px 30px rgba(0,0,0,0.4);
            border:1px solid rgba(255,255,255,0.2);
            color:white;
        }

        .login-container h2{
            text-align:center;
            font-weight:700;
            margin-bottom:10px;
        }

        .login-container p{
            text-align:center;
            color:#dcdcdc;
            margin-bottom:30px;
        }

        .input-group{
            margin-bottom:20px;
            position:relative;
        }

        .input-group i{
            position:absolute;
            top:50%;
            left:15px;
            transform:translateY(-50%);
            color:#aaa;
        }

        .form-control{
            width:100%;
            padding:14px 14px 14px 45px;
            border:none;
            border-radius:12px;
            background:rgba(255,255,255,0.12);
            color:white;
            font-size:15px;
        }

        .form-control::placeholder{
            color:#ccc;
        }

        .form-control:focus{
            box-shadow:none;
            background:rgba(255,255,255,0.18);
            color:white;
        }

        .btn-login{
            width:100%;
            padding:14px;
            border:none;
            border-radius:12px;
            background: linear-gradient(90deg, #f7971e, #ffd200);
            color:#000;
            font-weight:600;
            font-size:16px;
            transition:0.3s;
        }

        .btn-login:hover{
            transform:translateY(-2px);
            box-shadow:0 8px 20px rgba(255,210,0,0.3);
        }

        .extra-links{
            display:flex;
            justify-content:space-between;
            margin-top:18px;
            font-size:14px;
        }

        .extra-links a{
            color:#ffd200;
            text-decoration:none;
        }

        .extra-links a:hover{
            text-decoration:underline;
        }

        .admin-icon{
            text-align:center;
            font-size:55px;
            color:#ffd200;
            margin-bottom:15px;
        }

        @media(max-width:500px){
            .login-container{
                margin:20px;
                padding:30px 25px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="admin-icon">
            <i class="fas fa-user-shield"></i>
        </div>

        <h2>Admin Panel</h2>
        <p>Login to manage your dashboard</p>

        <form action={{route('adminlogin')}} method="POST">
            <!-- Laravel CSRF -->
            @csrf
            
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" class="form-control" placeholder="Admin Email" required>
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-login">Login Now</button>

            <div class="extra-links">
                <a href="#">Forgot Password?</a>
                <a href="/">Back to Website</a>
            </div>
        </form>
    </div>

</body>
</html>