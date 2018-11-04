@extends('layouts.layout')

@section('title', 'my characters')

@section('content')
    <div class="d-flex justify-content-around flex-wrap">
            @foreach ($characters as $character)
                <div class="card my-3" style="width: 18rem;">
                    <img class="card-img-top" src="{{$character->image}}" alt={{ 'img' .  $character->name}} height="250" width="100">
                    <div class="card-header">
                        {{$character->name}}
                        
                        <a href="{{route('showMyCharacter', ['id' => $character->id])}}"><i class="far fa-eye"></i></a>
                        <form id="form_delete" method="post" action="{{route('destroy', ['id' => $character->id])}}">
                            @method('DELETE')
                            @csrf
                            <a href="javascript:{}" onclick="document.getElementById('form_delete').submit();"><i class="fas fa-trash-alt"></i></a>
                        </form>
                       
                        
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Gender: {{$character->gender}}</li>
                      <li class="list-group-item">Height: {{$character->height}}</li>
                      <li class="list-group-item">Skin color: {{$character->skin_color}}</li>
                    </ul>
                  </div>
            @endforeach
    </div>
@endsection