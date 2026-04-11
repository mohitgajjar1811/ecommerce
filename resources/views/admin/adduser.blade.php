{{-- {{dd($data)}} --}}
<style>
    <style>
body{
  font-family: Arial, sans-serif;
  background:#f4f6f8;
}

/* CENTER BOX */
.container{
  width:100%;
  height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
}

/* FORM CARD */
.form-box{
  width:350px;
  background:white;
  padding:25px;
  border-radius:8px;
  border:1px solid #ddd;
}

/* TITLE */
.form-box h2{
  text-align:center;
  margin-bottom:20px;
}

/* INPUT GROUP */
.form-group{
  margin-bottom:15px;
}

.form-group label{
  display:block;
  margin-bottom:5px;
  font-size:14px;
}

/* INPUT */
.form-group input{
  width:100%;
  padding:10px;
  border:1px solid #ccc;
  border-radius:5px;
  outline:none;
}

/* FOCUS */
.form-group input:focus{
  border-color:#2563eb;
}

/* BUTTON */
.btn{
  width:100%;
  padding:10px;
  background:#2563eb;
  color:white;
  border:none;
  border-radius:5px;
  cursor:pointer;
}

.btn:hover{
  background:#1d4ed8;
}
</style>

<div class="container">

  <div class="form-box">
    <h2>Create User</h2>

    <form action="{{route('user.create')}}" method="POST">
      @csrf

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter name">
      </div>

      {{-- <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter email">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password">
      </div> --}}

      <button class="btn">Save</button>

    </form>
  </div>

</div>
</style>
<form action={{route('user.create')}} method="POST">
    @csrf
    <label for="">Name</label>
    <input type="text" value="" name="name">
    <br>
    <label for="">Email</label>
    <input type="email" value="" name="email">
    <br>
    <label for="">Password</label>
    <input type="password" value="" name="password">
    <br>
    <input type="submit" value="Save">
</form>