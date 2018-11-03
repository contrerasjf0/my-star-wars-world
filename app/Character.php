<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
   protected $fillable = [
       'name',
       'specie',
       'gender',
       'height',
       'eyes_color',
       'skin_color',
       'hair_color',
       'birth_year',
       'mass',
       'image',
   ];
}
