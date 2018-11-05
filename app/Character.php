<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Specie;

class Character extends Model
{
   protected $fillable = [
       'name',
       'specie_id',
       'gender',
       'height',
       'eyes_color',
       'skin_color',
       'hair_color',
       'birth_year',
       'mass',
       'image',
   ];

   public function specie(){
      return $this->belongsTo(Specie::class);
   }
}
