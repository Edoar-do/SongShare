<?php

namespace SongShare;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
   protected $table = "song";
   protected $fillable = ['title', 'author', 'feat', 'genre', 'user_id', 'likes'];
   public $timestamps = true;
   
   public function user(){
       return $this->belongsTo('SongShare\User');
   }
   
   public function mipiaces() {
        // use the 'authors' property: $user->authors (returns an array)
        return $this->hasMany('SongShare\MiPiace');
    }   
   
}
