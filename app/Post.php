<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title','path','user_id'];

    public function user() {
      return $this->belongTo('App\User');
    }
}