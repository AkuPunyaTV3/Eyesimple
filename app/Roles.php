<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{   

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
         'name' ,
   ];

   //role punya user apa
    public function users()
    {
        return $this->belongstoMany('App\User','user_role','roles_id','user_id');        
    }
}
