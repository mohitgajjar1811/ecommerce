
@extends('welcome')
@section('content')
{{-- <h1>Main Content Of {{$data}}</h1> --}}
<h1>Main Content Of Page 2</h1>
<ul>
    @forEach($fruitList as $fruit)

        <li> <a href={{route('singlePage',$fruit)}}>{{$fruit}}</a></li>

    @endforEach
</ul>

<ul>
    @forEach($colors as $color)

    <li>{{$color}}</li>

    @endforEach
</ul>
@endsection
