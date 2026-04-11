<ul>
    @foreach ($users2 as $id => $data)
        {{-- {{dd($user)}} --}}
      <li><span>ID: {{$id}} : </span>
      <span>{{$data['name']}}</span>| </li>
    @endforeach
</ul>