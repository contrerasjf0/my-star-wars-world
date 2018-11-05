@extends('layouts.layout')

@section('title', 'show');

@section('content')
<div class="card">
    <h5 class="card-header">{{$character['name']}}</h5>
      <div class="card-body">
          <div class="d-flex justify-content-between">
              <div>
                  <img src="{{$character['image']}}" alt="{{ 'img' . $character['name']}}" height="400" width="250">
              </div>
              <div>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">Species: {{($character['species'])? $character['species'] : $character->specie->name }}</li>
                      <li class="list-group-item">Gender: {{$character['gender']}}</li>
                      <li class="list-group-item">Eye color: {{($character['eye_color'])? $character['eye_color'] :$character['eyes_color']}}</li>
                      <li class="list-group-item">Hair color: {{$character['hair_color']}}</li>
                      <li class="list-group-item">Height: {{$character['height']}}</li>
                      <li class="list-group-item">Skin color: {{$character['skin_color']}}</li>
                      <li class="list-group-item">Mass: {{$character['mass']}}</li>
                      <li class="list-group-item">Birth year: {{$character['birth_year']}}</li>

                      @if($character['vehicles'])
                      <li class="list-group-item">Vehicles: <br/>
                        @forelse ($character['vehicles'] as $vehicle)
                            <spam>{{ $vehicle }},</spam>
                        @empty
                            <spam>N/A</spam>
                        @endforelse
                    </li>
                      @endif

                    @if($character['starships'])
                    <li class="list-group-item">Starships: <br/>
                        @forelse ($character['starships'] as $starship)
                            <spam>{{ $starship }},</spam>
                        @empty
                            <spam>N/A</spam>
                        @endforelse
                    </li>
                    @endif
                      
                      @if($character['films'])
                      <li class="list-group-item">Films: <br/>
                        @forelse ($character['films'] as $film)
                            <spam>{{ $film }},</spam>
                        @empty
                            <spam>N/A</spam>
                        @endforelse
                    </li>
                      @endif

                      
                    </ul>
              </div>
          </div>
      </div>
  </div>
@endsection