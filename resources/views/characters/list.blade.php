@extends('layouts.layout')

@section('title', 'list')

@section('content')
    <div class="d-flex justify-content-around flex-wrap">
            @foreach ($characters as $character)
                <div class="card my-3" style="width: 18rem;">
                    <img class="card-img-top" src="{{$character['image']}}" alt={{ 'img' .  $character['image']}} height="250" width="100">
                    <div class="card-header">
                        {{$character['name']}}
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Gender: {{$character['gender']}}</li>
                      <li class="list-group-item">Height: {{$character['height']}}</li>
                      <li class="list-group-item">Skin color: {{$character['skin_color']}}</li>
                    </ul>
                  </div>
            @endforeach
    </div>
@endsection