<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pets_names extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name',
    ];
}