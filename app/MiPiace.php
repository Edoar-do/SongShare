<?php

namespace SongShare;

use Illuminate\Database\Eloquent\Model;

class MiPiace extends Model
{
   protected $table = "mipiace";
   protected $fillable = ['song_id', 'user_id'];
   
   public function user(){
       return $this->belongsTo('SongShare\User');
   }
   
   public function song(){
       return $this->belongsTo('SongShare\Song');
   }
}
