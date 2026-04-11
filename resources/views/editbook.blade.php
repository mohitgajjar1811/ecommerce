 {{-- {{dd($classes)}} --}}

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

/* Main Content */
.main{
    margin-left:240px;
    padding:20px;
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
 
 <form action="{{route('book.update')}}" method="POST">
     @csrf
 
     <input type="hidden" value="{{$data->id}}" name="id">
 
     <label>Book Title</label>
     <input type="text" value="{{$data->title}}" name="title">
 
     <label>Book Author</label>
     <input type="text" value="{{$data->author}}" name="author">


     <label>Price</label>
     <input type="number" value="{{$data->price}}" name="price">
 
     <input type="submit" value="Update">
 
 </form>
 
 </div>
 
 </body>
 </html>