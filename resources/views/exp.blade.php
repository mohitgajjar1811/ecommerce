{{-- <ul>
    <li>{{$users1}}</li>
</ul> --}}

<ul>
    @foreach ($users1 as $id => $data)
        {{-- {{dd($user)}} --}}
      <li><span>ID: {{$id}} : </span>
        <span>{{$data['name']}}</span>| 
        <span>{{$data['age']}}</span>|
        <span>{{$data['education']}}</span>
    </li>
    @endforeach
</ul>