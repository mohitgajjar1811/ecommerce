{{-- {{dd($users)}}
@php 
  $users
@endphp --}}
{{-- {{$users}} --}}
{{-- <style>
  
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none;
    }
    table{
      width: 80%;
      border: 2px solid black;
      border-collapse: collapse;
      background-color: rgb(240, 106, 106);
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
    
    
    @include('sidebar')
    
    
    <div class="main">
    
    <div class="conat">
      <div class="heading">
        <h1 align="center">Employee Data</h1>
      </div>
    
      {{-- <div class="button">
        <a href="{{route('student.add')}}">Add User</a>
      </div> --}}
    {{-- </div>
    
    </div>

  <table border="1">
    <tr>
      <th>Employee_Name</th>
      <th>Email_id</th>
      <th>Department_Name</th>
      <th>Action</th>

    </tr>
      @foreach ($employee as $id => $data)
          {{-- {{dd($data)}} --}}
        {{-- <tr>
          <td>{{$data->name}}</td>
          <td>{{$data->email_id}}</td>
          <td>{{$data->department_name}}</td>
          <td> <a href={{route('employee.edit',$data->id)}}>Edit</a> | <a style="background-color:red;" href={{route('employee.delete',$data->id)}}>Delete</a></td></td>
        </td>
        </tr>
        
      @endforeach
  </table> --}} 


  <style>
/* GLOBAL */
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Poppins', sans-serif;
}

body{
  background: linear-gradient(135deg,#dbeafe,#f0fdf4);
}

/* SIDEBAR */
.sidebar{
  width:250px;
  height:100vh;
  background:rgba(15,23,42,0.95);
  backdrop-filter: blur(10px);
  color:white;
  position:fixed;
  padding:20px;
}

.sidebar h2{
  text-align:center;
  margin-bottom:30px;
  letter-spacing:1px;
}

.sidebar a{
  display:block;
  padding:12px;
  margin:10px 0;
  border-radius:10px;
  color:white;
  transition:0.3s;
}

.sidebar a:hover{
  background:linear-gradient(45deg,#6366f1,#22c55e);
  transform:translateX(5px);
}

/* NAVBAR */
.navbar{
  margin-left:250px;
  height:70px;
  background:rgba(255,255,255,0.7);
  backdrop-filter: blur(12px);
  display:flex;
  align-items:center;
  justify-content:space-between;
  padding:0 30px;
  box-shadow:0 5px 20px rgba(0,0,0,0.05);
}

.navbar h3{
  font-weight:600;
  color:#111827;
}

/* MAIN */
.main{
  margin-left:250px;
  padding:30px;
}

/* CARD */
.card{
  background:rgba(255,255,255,0.7);
  backdrop-filter: blur(12px);
  padding:25px;
  border-radius:20px;
  box-shadow:0 15px 40px rgba(0,0,0,0.08);
  border:1px solid rgba(255,255,255,0.3);
}

/* HEADER */
.card-header{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:20px;
}

.card-header h2{
  font-weight:600;
}

/* ADD BUTTON */
.add-btn{
  padding:10px 20px;
  background:linear-gradient(45deg,#6366f1,#22c55e);
  color:white;
  border-radius:30px;
  font-size:14px;
  transition:0.3s;
}

.add-btn:hover{
  transform:scale(1.05);
  box-shadow:0 10px 25px rgba(99,102,241,0.4);
}

/* TABLE */
.table-wrapper{
  overflow-x:auto;
}

table{
  width:100%;
  border-collapse:collapse;
}

/* HEADER */
th{
  background:linear-gradient(45deg,#6366f1,#22c55e);
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

/* ROW */
tr{
  transition:0.3s;
}

tr:nth-child(even){
  background:#f9fafb;
}

tr:hover{
  background:rgba(99,102,241,0.1);
  transform:scale(1.01);
}

/* BUTTONS */
.btn{
  padding:7px 14px;
  border-radius:20px;
  font-size:13px;
  margin:2px;
  display:inline-block;
  transition:0.3s;
  color:black;
}

.edit{
  background:linear-gradient(45deg,#10b981,#34d399);
}

.delete{
  background:linear-gradient(45deg,#ef4444,#f87171);
}

.btn:hover{
  transform:scale(1.1);
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
  border-radius:10px;
  background:white;
  border:1px solid #ddd;
  transition:0.3s;
}

.pagination li.active span{
  background:linear-gradient(45deg,#6366f1,#22c55e);
  color:white;
  border:none;
}

.pagination li a:hover{
  background:#6366f1;
  color:white;
}
  </style>
  
  @include('sidebar')
  
  <!-- NAVBAR -->
  <div class="navbar">
    <h3>Employee Dashboard</h3>
  </div>
  
  <div class="main">
    <div class="card">
  
      <div class="card-header">
        <h2>Employee Data</h2>
        <span>
        <form method="GET" action="{{ route('employee') }}" style="display: inline-flex; align-items: center; gap: 10px;">
          <input 
              type="search" 
              name="search" 
              value="{{ request('search') }}" 
              placeholder="Search student..."
          >
          
          @if(request('search'))
              <a href="{{ route('employee') }}" class="btn btn-secondary btn-sm">Clear</a>
          @endif
          
          <button type="submit" class="btn btn-primary btn-sm">Search</button>
      </form>
          <a href="{{route('employee.add')}}" class="add-btn">+ Add Employee</a>
        </span>
        </div>
    
        <table>
          <tr>
            <th>Employee Name</th>
            <th>Email id</th>
            <th>Department Name</th>
            <th>Action</th>
      
          </tr>
            @foreach ($employee as $id => $data)
                {{-- {{dd($data)}} --}}
              <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->email_id}}</td>
                <td>{{$data->department->name}}</td>
                <td> <a class="btn edit" href={{route('employee.edit',$data->id)}}>Edit</a> | <a class="btn delete"  href={{route('employee.delete',$data->id)}}>Delete</a></td></td>
              </td>
              </tr>
              
            @endforeach
    
        </table>
    
      </div>

       <!-- PAGINATION -->
       <div class="pagination">
        {{ $employee->links('pagination::bootstrap-4') }}
      </div>
      
    </div>
  </div>
