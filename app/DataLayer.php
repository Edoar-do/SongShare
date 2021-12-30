<?php

namespace SongShare;

use SongShare\User;

class DataLayer {

    public function listUserSongs($user) {
        $songs = Song::where('user_id', $user)->orderBy('title', 'asc')->get();
        return $songs;
    }

    public function listUser3MostLikedSongs($user) {
        $songs = Song::where('user_id', $user)->orderBy('likes', 'desc')->take(3)->get();
        return $songs;
    }

    public function list10LatestSongs() {
        return Song::orderBy('id', 'desc')->take(10)->get();
    }

    public function list10MostLikedSongs() {
        return Song::orderBy('likes', 'desc')->take(10)->get();
    }

    public function findSongById($id) {
        return Song::find($id);
    }

    public function deleteSong($id) {
        Song::find($id)->delete();
    }

    public function editSong($id, $title, $author, $feat, $genre) {
        Song::find($id)->update(['title' => $title, 'author' => $author, 'feat' => $feat, 'genre' => $genre]);
    }

    public function addSong($title, $author, $feat, $genre, $user_id) {
        Song::create(['title' => $title, 'author' => $author, 'feat' => $feat, 'genre' => $genre, 'user_id' => $user_id, 'likes' => 0]);
    }

    public function findSongByFields($title, $author, $feat, $genre) {

        //$results = DB::select(DB::raw("SELECT * FROM song WHERE title = :title AND author = :author AND feat = :feat AND genre = :genre"), array(
        //            'title' => $title, 'author' => $author, 'feat' => $feat, 'genre' => $genre
        //));
        //return $results;
        return Song::where('title', $title)->where('author', $author)->where('feat', $feat)->where('genre', $genre)->get();
    }

    public function findSongByTitle($title) {
        return Song::where('title', 'like', '%' . $title . '%')->get();
    }

    public function findSongByAuthor($author) {
        return Song::where('author', 'like', '%' . $author . '%')->get();
    }

    public function findSongByFeat($feat) {
        return Song::where('feat', 'like', '%' . $feat . '%')->get();
    }

    public function likeSong($id) {
        MiPiace::create(['user_id' => auth()->id(), 'song_id' => $id]);
        Song::find($id)->increment('likes');
    }

    public function dislikeSong($id) {
        MiPiace::where('song_id', $id)->where('user_id', auth()->id())->delete();
        Song::find($id)->decrement('likes');
    }

    public function findLike($song_id) {
        return MiPiace::where('song_id', $song_id)->where('user_id', auth()->id())->get();
    }

    /* public function validUser($username, $password) {
      $users = LibUser::where('username',$username)->get(['password']);

      if(count($users) == 0)
      {
      return false;
      }

      return (md5($password) == ($users[0]->password));
      } */

    /* public function addUser($username, $password, $email) {
      $user = new LibUser();
      $user->username = $username;
      $user->password = md5($password);
      $user->email = $email;
      $user->save();
      // massive creation (only with fillable property enabled on LibUser):
      // LibUser::create(['username' => $username, 'password' => md5($password), 'email' => $email]);
      } */

    /* public function getUserID($username) {
      $users = LibUser::where('username',$username)->get(['id']);
      return $users[0]->id;
      } */

    public function getUserID($email) {
        $users = User::where('email', $email)->get(['id']);
        return $users[0]->id;
    }

}
