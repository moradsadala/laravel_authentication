<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request as Request;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','post_tag','post_id','tag_id')->withTimestamps(); //To add time stamps with any new record
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    //Mutator to set post title in lowercase

    public function setTitleAttribute($value){
        $this->attributes['title'] = strtolower($value);
    }   
   
    //Accessor to get post title from the database in uppercase

    public function getTitleAttribute($value){
        return strtoupper($value);
    }
}
