{{-- {{dd($data)}} --}}

{{-- <style>

    body{
        margin:0%;
        font-family:Arial;
    }
    
    /* Sidebar */
    .sidebar{
        width:220px;
        height:100vh;
        background:#2c3e50;
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
        color:white;
        text-decoration:none;
        padding:10px;
        margin:10px 0;
        background:#34495e;
        border-radius:5px;
    }
    
    .sidebar a:hover{
        background:#1abc9c;
    }
    
    /* Main Content */
    .main{
        margin-left:240px;
        padding:20px;
    }
    
    </style>
    
    
    <div class="sidebar">
    
        <h2>Student Panel</h2>
    
        <a href="#">Dashboard</a>
        <a href="{{route('student')}}">Student Data</a>
        <a href="{{route('student.add')}}">Add Student</a>
    
    </div> --}}
    
{{-- <form action={{route('student.create')}} method="POST">
    @csrf
    <label for="">First_name</label>
    <input type="text" value="" name="first_name">
    <br>
    <label for="">Class_id</label>
    <input type="number" value="" name="class_id">
    <br>
    <label for="">Email_id</label>
    <input type="email" value="" name="email_id">
    <br>
    <label for="">Course_id</label>
    <input type="number" value="" name="course_id">
    <br>
    <input type="submit" value="Save">
</form> --}}

{{-- 
<style>
    *{
      margin:0;
      padding:0;
      box-sizing:border-box;
      text-decoration:none;
    }
    
    body{
      margin:0;
      font-family:Arial;
    }
    
    /* Sidebar */
    .sidebar{
      width:260px;
      height:100vh;
      background:#2c3e50;
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
      color:white;
      text-decoration:none;
      padding:10px;
      margin:10px 0;
      background:#34495e;
      border-radius:5px;
    }
    
    .sidebar a:hover{
      background:#1abc9c;
    }
    
    /* Main Content */
    .main{
      margin-left:-500px;
      padding:20px;
    }
    
    /* Form Design */
    .form-box{
      width:400px;
      margin:auto;
      margin-top:1%;
      background:#b8bdf4;
      padding:20px;
      border:2px solid black;
      border-radius:10px;
    }
    
    .form-box label{
      display:block;
      margin-top:10px;
    }
    
    .form-box input{
      width:100%;
      padding:8px;
      margin-top:5px;
    }
    
    .form-box input[type="submit"]{
      margin-top:15px;
      background:rgb(0, 45, 128);
      color:white;
      border:none;
      cursor:pointer;
    }
    </style>
    
    
    <div class="sidebar">
        <h2>Student Panel</h2>
    
        <a href="#">Dashboard</a>
        <a href="{{route('student')}}">Student Data</a>
        <a href="{{route('student.add')}}">Add Student</a>
        <a href="{{route('employee')}}">Employee Data</a>
        <a href="{{route('Department')}}">Department Data</a>
        <a href="{{route('Teacher')}}">Teacher Data</a>
        <a href="{{route('teacher.add')}}">Add Teacher</a>
        
    </div>
    
    
    <div class="main">
    
        <h1 align="center">Add Student</h1>
    
        <div class="form-box">
    
            <form action={{route('student.create')}} method="POST">
             @csrf
                    <label for="">Employee_name</label>
                     <input type="text" value="" name="name">
                    <br>

                    <label for="">Email_id</label>
                    <input type="email" value="" name="email_id">
                    <br>

                    <label for="">Department_Name</label>
                    <input type="text" value="" name="email_id">
                    <br>

                    <input type="submit" value="Save">
            </form> 
    
        </div>
    
    </div> --}}

    <style>
  
      *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        text-decoration:none;
      }
      
      body{
        margin:0;
        font-family:Arial;
      }
      
      *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family: 'Poppins', sans-serif;
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
      
      /* SEARCH */
      .search-box input{
        padding:8px 15px;
        border-radius:20px;
        border:1px solid #ccc;
        outline:none;
      }
      
      /* MAIN */
      .main{
        margin-left:250px;
        padding:30px;
      }
      
      /* CARD */
      .card{
        background:rgba(255,255,255,0.7);
        backdrop-filter:blur(10px);
        padding:25px;
        border-radius:15px;
        box-shadow:0 8px 25px rgba(0,0,0,0.1);
      }
      
      /* HEADER */
      .card-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
      }
      
      .card-header h2{
        color:#0f172a;
      }
      
      /* ADD BUTTON */
      .add-btn{
        padding:10px 18px;
        background:linear-gradient(45deg,#3b82f6,#6366f1);
        color:white;
        border-radius:20px;
        text-decoration:none;
        font-size:14px;
      }
      
      .add-btn:hover{
        opacity:0.85;
      }
      
      /* TABLE */
      table{
        width:100%;
        border-collapse:collapse;
      }
      
      th{
        background:#6366f1;
        color:white;
        padding:12px;
      }
      
      td{
        padding:12px;
        text-align:center;
      }
      
      /* ZEBRA STRIPES */
      tr:nth-child(even){
        background:#f1f5f9;
      }
      
      /* HOVER */
      tr:hover{
        background:#e0e7ff;
        transition:0.3s;
      }
      
      /* ACTION BUTTONS */
      .btn{
        padding:6px 12px;
        border-radius:6px;
        color:white;
        text-decoration:none;
        font-size:13px;
      }
      
      .edit{
        background:#10b981;
      }
      
      .delete{
        background:#ef4444;
      }
      
      .btn:hover{
        transform:scale(1.05);
        transition:0.2s;
      }
      
      /* Main Content */
      .main{
        margin-left:-500px;
        padding:20px;
      }
      
      /* Form Design */
      .form-box{
        width:400px;
        margin:auto;
        margin-top:1%;
        background:#b8bdf4;
        padding:20px;
        border:2px solid black;
        border-radius:10px;
      }
      
      .form-box label{
        display:block;
        margin-top:10px;
      }
      
      .form-box input{
        width:100%;
        padding:8px;
        margin-top:5px;
      }
      
      .form-box input[type="submit"]{
        margin-top:15px;
        background:rgb(0, 45, 128);
        color:white;
        border:none;
        cursor:pointer;
      }
      </style>
      
      
      @include('sidebar')
      
      
      <div class="main">
      
          <h1 align="center">Add Employee</h1>
      
          <div class="form-box">
      
            <form action={{route('employee.create')}} method="POST">
              @csrf
                     <label for="">Employee_name</label>
                      <input type="text" value="" name="name">
                     <br>
 
                     <label for="">Email_id</label>
                     <input type="email" value="" name="email_id">
                     <br>
 
                     <label for="">Department_Name</label>
                     <select style="width:100%;padding:5px;" name="department_id" id="">
                      @foreach($department as $dept)
                      <option value="{{ $dept->id}}" >{{ $dept->name }}</option>  
                      @endforeach
                     </select>

                    
                     <br>
 
                     <input type="submit" value="Save">
             </form> 
      
          </div>
      
      </div>