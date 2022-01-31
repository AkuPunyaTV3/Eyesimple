<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name',
    ];

    public function pets()
    {
        return $this->hasMany('App');         
    }
}
