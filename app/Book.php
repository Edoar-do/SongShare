<?php

namespace SongShare;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "book";
    public $timestamps = false;
    
    protected $fillable = ['title', 'author_id', 'user_id'];
    
    public function author() {
        // use the 'author' property: $book->author (returns an object Author)
        return $this->belongsTo('SongShare\Author');
    }
    
    public function user() {
        // use the 'user' property: $book->user (returns an object User)
        return $this->belongsTo('SongShare\User');
    }
}
