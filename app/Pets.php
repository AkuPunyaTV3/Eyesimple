<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pets extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','dob','user_id','species_id' ,'pet_names',
    ];
}
