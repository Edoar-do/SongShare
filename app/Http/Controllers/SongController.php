<?php

namespace SongShare\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SongShare\DataLayer;
use Illuminate\Support\Facades\Redirect;

class SongController extends Controller {

    public function index() {
        // view with the list of a user's songs
        // GET method (path "/song")
        // root name: song.index

        $dl = new DataLayer();
        $userID = auth()->id();
        $songs_list = $dl->listUserSongs($userID);
        $threeMostLikedSongs = $dl->listUser3MostLikedSongs($userID);
        return view('song.songsBoostrap')->with('songList', $songs_list)->with('threeMostLikedSongs', $threeMostLikedSongs);
    }
    
    public function likeOrDislike(Request $request){
        $dl = new DataLayer();
        
        if($request->up_down){ //like
            $dl->likeSong($request->id);
        }else{ //dislike
            $dl->dislikeSong($request->id);
        }
        $mostLikedSongs = $dl->list10MostLikedSongs();
        $mostRecentSongs = $dl->list10LatestSongs();
        return view('front.musicSearch')->with('mostLikedSongs', $mostLikedSongs)->with('mostRecentSongs', $mostRecentSongs);
    }

//    public function like($id) {
//        //$user_id = auth()->id();
//        $dl = new DataLayer();
//
//        // if ($dl->findLike($id, $user_id) === null) { Controllo ridondante: se chiama questa funzione findLike ha già ritornato null
//        $dl->likeSong($id);
//        // }
//        
//        $mostLikedSongs = $dl->list10MostLikedSongs();
//        $mostRecentSongs = $dl->list10LatestSongs();
//        return view('front.musicSearch')->with('mostLikedSongs', $mostLikedSongs)->with('mostRecentSongs', $mostRecentSongs);
//    }
//    
//    public function dislike($id) {
//        //$user_id = auth()->id();
//        $dl = new DataLayer();
//
//        $dl->dislikeSong($id);
//    
//        $mostLikedSongs = $dl->list10MostLikedSongs();
//        $mostRecentSongs = $dl->list10LatestSongs();
//        return view('front.musicSearch')->with('mostLikedSongs', $mostLikedSongs)->with('mostRecentSongs', $mostRecentSongs);
//    }

    public function create() {
        // view with creation form
        // no song is passed to view because it's a creation of new one
        // GET method (path "/song/create")
        // root name: song.create
        return view('song.editSongBootstrap');
    }

    public function store(Request $request) {
        // for saving just created song
        // POST method (path "/song")
        // root name: song.store

        $dl = new DataLayer();
        $userID = auth()->id();
        $dl->addSong($request->input('title'), $request->input('author'), $request->input('feat'), $request->input('genre'), $userID);
        return Redirect::to(route('song.index'));
    }

    public function show() {
        // for showing single song details
        // GET method (path "/song/{song}")
        // root name: song.show
        // NOT USED 
    }

    public function edit($id) { 
        // view with edit form
        // GET method (path "/song/{song}/edit")
        // root name: song.edit
        $dl = new DataLayer();
        //$userID = auth()->id();
        $song = $dl->findSongById($id);

        //return view('song.editSongBootstrap')->with('logged',true)
        //        ->with('loggedName', $_SESSION["loggedName"])
        //        ->with('authorList', $authors_list)->with('song', $song);
        return view('song.editSongBootstrap')->with('song', $song);
    }

    public function update(Request $request, $id) {
        // for saving just modified song
        // PUT method (path "/song/{song}") - root name: song.update NOT USED      
        // GET method (path "/song/{id}/update") - root name: song.update

        $dl = new DataLayer();
        $dl->editSong($id, $request->input('title'), $request->input('author'), $request->input('feat'), $request->input('genre'));
        return Redirect::to(route('song.index'));
    }

    public function destroy($id) {
        // for deleting song
        // DELETE method (path "/song/{song}") - root name: song.destroy NOT USED
        // GET method (path "/song/{id}/destroy") - root name: song.destroy

        $dl = new DataLayer();
        $dl->deleteSong($id);
        return Redirect::to(route('song.index'));
    }

    public function confirmDestroy($id) {

        $dl = new DataLayer();
        $song = $dl->findSongById($id);
        if ($song !== null) {
            return view('song.deleteSongBootstrap')->with('song', $song);
        } else {
            return view('song.deleteErrorPage');
        }
    }
    
    public function ajaxCheckForSong(Request $request){
        // {'found':true/false}
        $dl = new DataLayer();
        if($dl->findSongByGeneralities($request->input('title'), $request->input('author'), $request->input('feat'), $request->input('genre'))){
            $response = array('found' => true);
        }else{
            $response = array('found' => false);
        }
        return response()->json($response);
    }

}
