<!DOCTYPE html>
 <html>
 <head>
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
    margin-right:81%;
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
 
 body{
     display:flex;
     justify-content:center;
     align-items:center;
     height:100vh;
     background:#47e9ce;
 }
 
 .form-box{
     background:rgb(183, 236, 182);
     padding:30px;
     border:1px solid #ccc;
     border-radius:8px;
     width:300px;
     box-shadow:0 0 10px rgba(0,0,0,0.1);
 }
 
 .form-box input{
     width:100%;
     padding:8px;
     margin-bottom:10px;
 }

 
 </style>
 </head>
 @include('sidebar')
 <body>
    <div class="form-box">
    <form action={{route('employee.update')}} method="POST">
        @csrf
        <input type="hidden" value="{{$data->id}}" name="id">
        <label for="">Employee_Name</label>
        <input type="text" value="{{$data->name}}" name="name">
        <br>
        <label for="">Email_id</label>
        <input type="email" value="{{$data->email_id}}" name="email">
        <br>
        <label for="">Department_Name</label>
        <select style="width:100%;padding:5px;" name="department_id" id="">
            @foreach($department as $dep)
                <option value="{{$dep->id}}" @selected($data->department_id == $dep->id) >{{$dep->name}}</option>
            @endforeach
        </select>
        <br>
        <br>


        <input type="submit" value="Update">
</form>
 
</div>
 
</body>
</html>
