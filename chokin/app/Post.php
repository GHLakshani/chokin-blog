<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    function comments(){
        return $this->hasMany('App\Comment')->orderBy('id','desc');
    }

    function category(){
        return $this->belongsTo('App\Category','cat_id');
    }
}
