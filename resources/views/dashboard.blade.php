{!! "<h1>This Is Dashboard Page</h1>" !!}
<a href={{route('products')}}>Product Page</a><br><br>
<a href={{route('admin.users')}}>Users Page</a><br><br>
<a href={{route('admin.blogs')}}>Blogs Page</a><br><br>
<br>
<br>

{{ 5 + 5 }}

<?php
   // echo "Hello Buddy";
?>
<br>

{{ "Hello Laravel" }}      <!-- text show karva mate  -->

{!! "<h1>This is Lravel Templete</h1>" !!}      <!-- tag & another uses for this structure  -->

{{-- {!! "<script>alert('hello')</script>" !!} --}}

@php
$name  = "Mitesh";       
@endphp                                 <!--variable declare aa rite karay  -->

{{ $name }}
<br>
{!! $name !!}
<br>
<br>

@php
$name1 = "Mohit Gajjar";
@endphp

{!! "<h1>$name1</h1>" !!}

@php
$age = 25;
if($age > 18){
   echo"you can vote";
}else{
   echo "you can't vote";
}
@endphp

@php
$age1=61;
@endphp

@if($age1>=61)
{!!"<h1>you can vote</h1>"!!}
@else
{{"you can vote"}}
@endif

@if($age1>=18)
{!!"<h1>you can vote</h1>"!!}
@elseif($age1>=61)
{!!"<h1>you are senior citizen</h1>"!!}
@else
{!!"<h1>you cant't vote</h1>"!!}
@endif

@php
$signal = "Green";
@endphp

@switch($signal)
    @case("Red")
     {{"stop"}}
    @break

    @case("Green")
     {{"Go"}}
    @break

    @case("Yellow")
     {{"wait"}}
     @break

   @default
   {{"invalid input"}}
@endswitch

<br>
<br>

@php
 $arr = [ "Ahmedabad","Surat","Rajkot","Baroda"];
@endphp

@for($i = 0; $i<count($arr);$i++)
 {{$arr[$i]}}
@endfor


{{-- Property	Description
$loop->index	The index of the current loop iteration (starts at 0).
$loop->iteration	The current loop iteration (starts at 1).
$loop->remaining	The iterations remaining in the loop.
$loop->count	The total number of items in the array being iterated.
$loop->first	Whether this is the first iteration through the loop.
$loop->last	Whether this is the last iteration through the loop.
$loop->even	Whether this is an even iteration through the loop.
$loop->odd	Whether this is an odd iteration through the loop.
$loop->depth	The nesting level of the current loop.
$loop->parent	When in a nested loop, the parent's loop variable. --}}

<ul>
@foreach ($arr as $d)
    {{-- {{$d}} {{"=>"}}
    {{$loop->index}} --}}

    {{-- {{$loop->iteration}} --}}

    {{-- @if($loop->iteration === 1) --}}
       {{-- {{$d}} --}}
       {{-- {{$loop->remaining}} --}}
       {{-- {{$loop->count}} --}}
    {{-- @endif --}}

    {{-- @if ($loop->first)
        {{$d}}
    @endif

    @if ($loop->last)
        {{$d}}
    @endif --}}

    {{-- @if($loop->odd)
        {{$d}}
    @endif --}}

     {{-- @if($loop->even)
        {{$d}}
    @endif --}}

    {!! "<li>$d</li>" !!}
@endforeach
</ul>