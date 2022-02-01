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
        'id','dob','user_id','species_id' ,'name_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function species()
    {
        return $this->belongsTo('App\Species','species_id','id');
    }

    public function names()
    {
        return $this->belongsTo('App\Pets_names','name_id','id');
    }
}
