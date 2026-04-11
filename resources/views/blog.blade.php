@extends('masterLayout.app')

@section('content')

<h1>This Is Blog Page</h1>

@endsection

@section('button')
    @parent
    <a href="https://facebook.com">FaceBook</a>
@endsection

@php 
    $name = "Mohit";
    $arr = ["Ahmedabad","Baroda","Surat","Rajkot"];
@endphp 

<script>

    // var name = @json($name);
    var name = {{Js::from($name)}};
    // console.log(name);

    var data = @json($arr);
    console.log(data);

    data.forEach((e)=>{
        console.log(e);
    })

</script>
@push('scripts')
    <script>
        alert('This Is Blog Page');
    </script>
@endpush
@push('styles')
<style>
    button{
        width: 300px;
        padding: 10px;
        background-color: blue;
        color: white;
        border-radius: 10px;
    }   
</style>
@endpush