<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Character;

class Specie extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function characters(){
        return $this->hasMany(Character::class);
    }
}
