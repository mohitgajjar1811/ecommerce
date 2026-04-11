{{-- {{dd($users)}}
@php 
  $users
@endphp --}}
{{-- {{$users}} --}}
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
    <h3>User Dashboard</h3>
</div>

<div class="main">
    <div class="card">

        <!-- HEADER -->
        <div class="card-header">
            <h2>User Data</h2>

            <span>
              <form method="GET" action="{{ route('user.show') }}" style="display: inline-flex; align-items: center; gap: 10px;">
                  <input 
                      type="search" 
                      name="search" 
                      value="{{ request('search') }}" 
                      placeholder="Search user..."
                  >
                  
                  @if(request('search'))
                      <a href="{{ route('user.show') }}" class="btn btn-secondary btn-sm">Clear</a>
                  @endif
                  
                  <button type="submit" class="btn btn-primary btn-sm">Search</button>
              </form>
                <a href="{{ route('user.addform') }}" class="add-btn">+ Add User</a>
            </span>
        </div>

        <!-- TABLE -->
        <div class="table-wrapper">
            <table>
                <tr>
                    <th>Name</th>
                    {{-- <th>Email</th> --}}
                    <th>Action</th>
                </tr>

                @foreach ($users as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    {{-- <td>{{ $data->email }}</td> --}}
                    <td>
                        <a class="btn edit" href="{{ route('user.edit', $data->id) }}">Edit</a>
                        <a class="btn delete" href="{{ route('user.delete', $data->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>

        <!-- PAGINATION -->
      <div class="pagination">
        {{ $users->links('pagination::bootstrap-4') }}
      </div>

    </div>
</div>