{{-- <style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none;
    }
    table{
      width: 70%;
      margin-left: 20%;
      border: 2px solid black;
      border-collapse: collapse;
      background-color: rgb(190, 244, 184);
    }
   th,td{
      padding: 10px;
      color: rgb(0, 0, 0);
      text-align: center
    }
    tr td a{
      display: inline-block;
      width: 100px;
      border: 2px solid black;
      border-radius: 10px;
      padding: 5px;
      background-color: green;
      color: white;
    }
  </style>
  <style>

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
        margin-left:240px;
        padding:20px;
    }
    
    </style>
    
    
    <div class="sidebar">
    
        <h2>Student Panel</h2>
    
        <a href="">Dashboard</a>
        <a href="{{route('student')}}">Student Data</a>
        <a href="{{route('student.add')}}">Add Student</a>
        <a href="{{route('employee')}}">Employee Data</a>
        <a href="{{route('Department')}}">Department Data</a>

    </div>
    
    
    <div class="main">
    
    <div class="conat">
      <div class="heading">
        <h1 align="center">Department Data</h1>
      </div>
    </div>
    
    </div> --}}


    {{-- <style>
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          text-decoration: none;
        }
        table{
          width: 70%;
          margin-left: 20%;
          border: 2px solid black;
          border-collapse: collapse;
          background-color: rgb(190, 244, 184);
        }
       th,td{
          padding: 10px;
          color: rgb(0, 0, 0);
          text-align: center
        }
        tr td a{
          display: inline-block;
          width: 100px;
          border: 2px solid black;
          border-radius: 10px;
          padding: 5px;
          background-color: green;
          color: white;
        }
      </style>
      <style>
    
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
            margin-left:240px;
            padding:20px;
        }
        .button{
          width: 150px;
          border-radius: 10px;
          border: 2px solid black;
          float: right;
          background-color: green;
          padding: 20px;
          text-align: center;

        }
        .button a{
          color: white;
        }
        </style>
        
        
        @include('sidebar')
        
        
        <div class="main">
        
        <div class="conat">
          <div class="heading">
            <h1 align="center">Department Data</h1>
          </div>
        
          <div class="button">
            <a href="{{route('student.add')}}">Add User</a>
          </div>
        </div>
        
        </div>
    
    <table border="1">
        <tr>
          <th>Department Name</th>
          <th>Action</th>
        </tr>
          @foreach ($department as $id => $data)
            <tr>
              <td>{{$data->department_name}}</td>
              <td> <a href={{route('Department.edit',$data->id)}}>Edit</a> | <a style="background-color:red;" href={{route('Department.delete',$data->id)}}>Delete</a></td></td>
            </tr>
          @endforeach
      </table> --}}



<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
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
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
  }
  
  .navbar h3{
    color:#0f172a;
  }
  
  /* MAIN */
  .main{
    margin-left:250px;
    padding:30px;
  }
  
  /* CARD */
  .card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
  }
  
  /* HEADER */
  .card-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
  }
  
  .card-header h2{
    color:#111827;
  }
  
  /* ADD BUTTON */
  .add-btn{
    padding:10px 18px;
    background:linear-gradient(45deg,#3b82f6,#6366f1);
    color:white;
    border-radius:25px;
    text-decoration:none;
    font-size:14px;
    transition:0.3s;
  }
  
  .add-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(99,102,241,0.4);
  }
  
  /* TABLE */
  .table-wrapper{
    overflow-x:auto;
  }
  
  table{
    width:100%;
    border-collapse:collapse;
    border-radius:10px;
    overflow:hidden;
  }
  
  /* HEADER */
  th{
    background:#6366f1;
    color:white;
    padding:14px;
    font-size:14px;
  }
  
  /* DATA */
  td{
    padding:14px;
    text-align:center;
    font-size:14px;
    color:#374151;
  }
  
  /* ROW STYLE */
  tr{
    transition:0.3s;
  }
  
  tr:nth-child(even){
    background:#f9fafb;
  }
  
  tr:hover{
    background:#eef2ff;
    transform:scale(1.01);
  }
  
  /* ACTION BUTTONS */
  .btn{
    padding:6px 12px;
    border-radius:6px;
    color:black;
    text-decoration:none;
    font-size:13px;
    margin:2px;
    display:inline-block;
  }
  
  .edit{
    background:#10b981;
  }
  
  .delete{
    background:#ef4444;
  }
  
  .btn:hover{
    opacity:0.85;
  }
  
  /* PAGINATION */
  .pagination{
    display:flex;
    justify-content:center;
    margin-top:20px;
    gap:8px;
  }
  
  .pagination li{
    list-style:none;
  }
  
  .pagination li a,
  .pagination li span{
    padding:8px 14px;
    border-radius:8px;
    background:white;
    border:1px solid #ddd;
    color:#374151;
    text-decoration:none;
    transition:0.3s;
  }
  
  .pagination li.active span{
    background:#6366f1;
    color:white;
    border:none;
  }
  
  .pagination li a:hover{
    background:#6366f1;
    color:white;
  }
  input[type="search"]{
  padding:8px 15px;
  border-radius:20px;
  border:1px solid #ccc;
  outline:none;
  transition:0.3s;
}

input[type="search"]:focus{
  border-color:#6366f1;
  box-shadow:0 0 5px rgba(99,102,241,0.4);
}
  </style>
  
  @include('sidebar')
  
  <!-- NAVBAR -->
  <div class="navbar">
    <h3>Department Dashboard</h3>
  </div>
  
  <div class="main">
    <div class="card">
  
      <div class="card-header">
        <h2>Department Data</h2>
    
        <span>
            <form method="GET" action="{{ route('department') }}" 
                  style="display: inline-flex; align-items: center; gap: 10px;">
    
                <input 
                    type="search" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search department..."
                >
    
                @if(request('search'))
                    <a href="{{ route('department') }}" class="btn btn-secondary btn-sm">Clear</a>
                @endif
    
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </form>
    
            <a href="{{ route('department.add') }}" class="add-btn">+ Add Department</a>
        </span>
    </div>
        
            <table>
              <tr>
                <th>Department Name</th>
                <th>Action</th>
              </tr>
                @foreach ($department as $id => $data)
                    {{-- {{dd($data)}} --}}
                  <tr>
                    <td>{{$data->name}}</td>
                    <td> <a class="btn edit" href={{route('department.edit',$data->id)}}>Edit</a> | <a class="btn edit" style="background-color:red;" href={{route('department.delete',$data->id)}}>Delete</a></td></td>
                  </tr>
                @endforeach
        
            </table>
        
          </div>
        
         <!-- PAGINATION -->
      <div class="pagination">
        {{ $department->links('pagination::bootstrap-4') }}
      </div>
  
    </div>
  </div>