<style>
  *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
  }
  
  /* BODY */
  body{
    background: linear-gradient(135deg,#eef2ff,#f8fafc);
  }
  
  /* SIDEBAR */
  .sidebar{
    width:250px;
    height:100vh;
    background:#0f172a;
    color:white;
    position:fixed;
    padding:20px;
  }
  
  .sidebar h2{
    text-align:center;
    margin-bottom:30px;
  }
  
  .sidebar a{
    display:block;
    padding:12px;
    margin:10px 0;
    background:#1e293b;
    border-radius:8px;
    color:white;
    transition:0.3s;
  }
  
  .sidebar a:hover{
    background:linear-gradient(45deg,#22c55e,#4ade80);
  }
  
  /* NAVBAR */
  .navbar{
    margin-left:250px;
    height:70px;
    background:white;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
  }
  
  /* MAIN */
  .main{
    margin-left:250px;
    padding:40px;
  }
  
  /* WELCOME TEXT */
  .welcome-text{
    font-size:32px;
    color:#0f172a;
    margin-bottom:30px;
  }
  
  /* CARDS CONTAINER */
  .cards{
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap:25px;
  }
  
  /* CARD */
  .dashboard-card{
    padding:25px;
    border-radius:15px;
    color:white;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
    transition:0.3s;
    margin-top: 10%;
  }
  
  .dashboard-card:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,0.15);
  }
  
  /* CARD TITLE */
  .dashboard-card h3{
    font-size:20px;
    margin-bottom:10px;
  }
  
  /* COUNT */
  .dashboard-card p{
    font-size:35px;
    font-weight:bold;
  }
  
  /* COLORS */
  .card1{
    background:linear-gradient(45deg,#3b82f6,#60a5fa);
  }
  
  .card2{
    background:linear-gradient(45deg,#10b981,#34d399);
  }
  
  .card3{
    background:linear-gradient(45deg,#f59e0b,#fbbf24);
  }

  .card4{
    background:linear-gradient(45deg,#8cf50b,#8cf50b);
  }

  .card5{
    background:linear-gradient(45deg,#0b26f5,#0b26f5);
  }

  .card6{
    background:linear-gradient(45deg,#f50bb7,#f50bb7);
  }
  </style>
  
  @include('sidebar')
  
  <div class="main">
  
    <h1 class="welcome-text">Welcome to Dashboard 👋</h1>
    <hr>
  
    <div class="cards">
  
      <!-- Student -->
      {{-- <div class="dashboard-card card1">
        <h3>Students</h3>
        <a href="{{route('student')}}"><p>{{ $studentCount }}</p></a>
      </div> --}}
  
      <!-- Employee -->
      {{-- <div class="dashboard-card card2">
        <h3>Employees</h3>
        <a href="{{route('employee')}}"><p>{{ $employeeCount }}</p></a>
      </div> --}}

      <!-- Product -->
      <div class="dashboard-card card1">
        <h3>Product</h3>
        <a href="{{route('admin.product')}}"><p>{{ $productCount }}</p></a>
      </div>

      <!-- Unit -->
      <div class="dashboard-card card2">
        <h3>Unit</h3>
        <a href="{{route('admin.unit')}}"><p>{{ $unitCount }}</p></a>
      </div>

      <!-- Category -->
      <div class="dashboard-card card3">
        <h3>Category</h3>
        <a href="{{route('admin.category')}}"><p>{{ $categoryCount }}</p></a>
      </div>

      <!-- Order -->
      <div class="dashboard-card card4">
        <h3>Order</h3>
        <a href="{{route('admin.order')}}"><p>{{ $orderCount }}</p></a>
      </div>
      
      <!-- Cart -->
      <div class="dashboard-card card5">
        <h3>Cart</h3>
        <a href="{{route('admin.cart')}}"><p>{{ $cartCount }}</p></a>
      </div>
      
      <!-- User -->
      <div class="dashboard-card card6">
        <h3>User</h3>
        <a href="{{route('user.show')}}"><p>{{ $userCount }}</p></a>
      </div>
  
      <!-- Teacher -->
      {{-- <div class="dashboard-card card3">
        <h3>Teachers</h3>
        <a href="{{route('teacher')}}"><p>{{ $teacherCount }}</p></a>
      </div> --}}

      <!-- Book -->
      {{-- <div class="dashboard-card card4">
        <h3>Books</h3>
        <a href="{{route('book')}}"><p>{{ $bookCount }}</p></a>
      </div> --}}
  
    </div>
  
  </div>

