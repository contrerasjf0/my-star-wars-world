@extends('layouts.layout')

@section('title', 'create')

@section('content')
<form class="" method="POST" action='{{url('characters')}}' novalidate>
    @csrf
    <div class="form-row">
      <div class="col-md-4 mb-3">
        <label for="nameInput">Name</label>
        <input type="text" class="form-control 
        @if($errors->has('name'))
            is-invalid
        @endif
        " id="nameInput" name="name" value="{{ old('name') }}">
        <div class="invalid-feedback">
                @if($errors->has('name'))
                    {{$errors->first('name')}}
                @endif
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="specieInput">Specie</label>
        <select class="form-control 
        @if($errors->has('specie_id'))
            is-invalid
        @endif
        " id="specieInput" name="specie_id">
            <option value=""></option>
            @foreach ($species as $specie)
                <option value="{{$specie->id}}" 
                    {{ old('specie_id') == $specie->id ? 'selected' : '' }}>
                    {{$specie->name}}
                </option>
            @endforeach
          </select>
        <div class="invalid-feedback">
            @if($errors->has('specie_id'))
                {{$errors->first('specie_id')}}
            @endif
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label for="heightInput">Height</label>
        <input type="text" class="form-control 
        @if($errors->has('height'))
            is-invalid
        @endif
        " id="heightInput" name="height" value="{{ old('height') }}">
          <div class="invalid-feedback">
            @if($errors->has('height'))
                    {{$errors->first('height')}}
        @endif
          </div>
      </div>
    </div>
    <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="nameInput">Gender</label>
                <div class="form-check">
                    <input type="radio" class="form-check-input
                    @if($errors->has('gender'))
                     is-invalid
                    @endif
                    " name="gender"  value="male" 
                        {{ old('gender') == 'male' ? 'checked' : '' }} >
                    <label class="form-check-label" for="genderInput">Male</label>
                    <input type="radio" class="form-check-input" name="gender"  value="female" 
                        {{ old('gender') == 'female' ? 'checked' : '' }} >
                    <label class="form-check-label" for="genderInput">Female</label>
                    <input type="radio" class="form-check-input" name="gender"  value="other" 
                        {{ old('gender') == 'other' ? 'checked' : '' }} >
                    <label class="form-check-label" for="genderInput">Other</label>
                    <input type="radio" class="form-check-input" name="gender"  value="n/a" 
                        {{ old('gender') == 'n/a' ? 'checked' : '' }} >
                    <label class="form-check-label" for="genderInput">N/A</label>
                    <div class="invalid-feedback">
                            @if($errors->has('gender'))
                                {{$errors->first('gender')}}
                            @endif
                        </div>
                </div>
                <div class="form-check">
                    
                </div>
                <div class="form-check">
                    
                </div>
                <div class="form-check">
                    
                </div>

        </div>
      </div>
    <div class="form-row">
        <div class="col-md-4 mb-3">
            <label for="eyesColorInput">Eyes color</label>
            <input type="text" class="form-control
            @if($errors->has('eyes_color'))
                is-invalid
            @endif
            " id="eyesColorInput" name="eyes_color" value="{{ old('eyes_color') }}">
            <div class="invalid-feedback">
                @if($errors->has('eyes_color'))
                    {{$errors->first('eyes_color')}}
                @endif
            </div>
        </div>
        <div class="col-md-4 mb-3">
                <label for="skinColorInput">Skin color</label>
                <input type="text" class="form-control
                @if($errors->has('skin_color'))
                    is-invalid
                @endif
                " id="skinColorInput" name="skin_color" value="{{ old('skin_color') }}">
                <div class="invalid-feedback">
                    @if($errors->has('skin_color'))
                        {{$errors->first('skin_color')}}
                    @endif
                </div>
        </div>
        <div class="col-md-4 mb-3">
                <label for="hairColorInput">Hair color</label>
                <input type="text" class="form-control
                @if($errors->has('hair_color'))
                    is-invalid
                @endif
                " id="hairColorInput" name="hair_color" value="{{ old('hair_color') }}">
                <div class="invalid-feedback">
                    @if($errors->has('hair_color'))
                        {{$errors->first('hair_color')}}
                    @endif
                </div>
        </div>
    </div>
    <div class="form-row">
            <div class="col-md-2 mb-3">
                <label for="birthYearInput">Birth year</label>
                <input type="text" class="form-control
                @if($errors->has('birth_year'))
                    is-invalid
                @endif
                " id="birthYearInput" name="birth_year" value="{{ old('birth_year') }}">
                <div class="invalid-feedback">
                    @if($errors->has('birth_year'))
                        {{$errors->first('birth_year')}}
                    @endif
                </div>
            </div>
            <div class="col-md-2 mb-3">
                    <label for="massInput">Mass</label>
                    <input type="number" class="form-control 
                    @if($errors->has('mass'))
                        is-invalid
                    @endif
                    " id="massInput" name="mass" value="{{ old('mass') }}">
                    <div class="invalid-feedback">
                        @if($errors->has('mass'))
                            {{$errors->first('mass')}}
                        @endif
                    </div>
            </div>
            <div class="col-md-8 mb-3">
                    <label for="imageInput">Image</label>
                    <input type="text" class="form-control
                    @if($errors->has('image'))
                        is-invalid
                    @endif
                " id="imageInput" name="image" value="{{ old('image') }}">
                    <div class="invalid-feedback">
                        @if($errors->has('image'))
                            {{$errors->first('image')}}
                        @endif
                    </div>
            </div>
        </div>

    <button class="btn btn-primary" type="submit">Add</button>
  </form>
@endsection