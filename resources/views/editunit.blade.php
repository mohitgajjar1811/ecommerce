<!DOCTYPE html>
<html>
<head>
<style>

/* RESET */
*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:Arial;
}

/* BODY */
body{
  display:flex;
  background:linear-gradient(135deg,#dbeafe,#f0fdf4);
}

/* SIDEBAR */
.sidebar{
  width:250px;
  height:100vh;
  background:rgba(15,23,42,0.95);
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
  border-radius:10px;
  color:white;
}

.sidebar a:hover{
  background:linear-gradient(45deg,#6366f1,#22c55e);
}

/* MAIN AREA */
.main{
  margin-left:250px;
  width:100%;
  display:flex;
  justify-content:center;
  align-items:center;
  min-height:100vh;
}

/* FORM CARD */
.form-box{
  background:white;
  padding:30px;
  border-radius:15px;
  width:350px;
  box-shadow:0 15px 40px rgba(0,0,0,0.1);
}

/* TITLE */
.form-box h2{
  text-align:center;
  margin-bottom:20px;
}

/* INPUT */
.form-box input{
  width:100%;
  padding:10px;
  margin-bottom:15px;
  border-radius:8px;
  border:1px solid #ccc;
}

/* BUTTON */
.form-box button{
  width:100%;
  padding:10px;
  border:none;
  border-radius:25px;
  background:linear-gradient(45deg,#6366f1,#22c55e);
  color:white;
  cursor:pointer;
  transition:0.3s;
}

.form-box button:hover{
  transform:scale(1.05);
}

</style>
</head>

<body>

@include('sidebar')

<div class="main">

  <div class="form-box">
    <h2>Edit Unit</h2>

    <form action="{{route('unit.update')}}" method="POST">
      @csrf

      <input type="hidden" value="{{$data->id}}" name="id">

      <label>Name</label>
      <input type="text" value="{{$data->name}}" name="name">
      
      <label>Short Name</label>
      <input type="text" value="{{$data->short_name}}" name="short_name">

      <button type="submit">Update Unit</button>
    </form>

  </div>

</div>

</body>
</html>