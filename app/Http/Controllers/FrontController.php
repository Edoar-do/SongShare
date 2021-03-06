<?php

namespace SongShare\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

use SongShare\DataLayer;

class FrontController extends Controller
{
    public function getHome() {
        return view('index');
    }
    
    public function getAboutMe() {        
        return view('front.aboutMe');
    }
    
    public function getMusicSearch() {
        
        $dl = new DataLayer();
        $mostLikedSongs = $dl->list10MostLikedSongs();
        $mostRecentSongs = $dl->list10LatestSongs();
        return view('front.musicSearch')->with('mostLikedSongs', $mostLikedSongs)->with('mostRecentSongs', $mostRecentSongs);
    }
    
    public function getSearchResult(Request $request){
        $dl = new DataLayer();
        $search = $request->input('searchInput');
        if(empty($search)){
            $result = array();
        }else{
            $result1 = $dl->findSongByTitle($search);
            $result2 = $dl->findSongByAuthor($search);
            $result3 = $dl->findSongByFeat($search);
            $result = $result1->union($result2)->union($result3);
        }        
        return view('front.searchResult')->with('searchResult', $result);
    }
    
    public function getHelpUs() {        
        return view('front.helpUs')->with('message', null);
    }
    
    public static function checkAlreadyLiked($song_id){
        $dl = new DataLayer();
        return ($dl->findLike($song_id)->isEmpty())? true : false;        
    }
    
    public function ajaxCheckSearch(Request $request){
        $dl = new DataLayer();
        $search = $request->input('search');
        $result = $dl->findSongByTitle($search)->union($dl->findSongByAuthor($search))->union($dl->findSongByFeat($search));
        if($result->isEmpty()){
            $response = array('found' => false);
        }else{
            $response = array('found' => true);
        }
        return response()->json($response);
    }
    
    public function sendHelpUsForm(Request $request){
        $email = Auth::user()->email;
        $textArea = $request->input('text-area');
        try{
            $client = new Client([
                // URI da contattare
                'base_uri' => 'http://localhost:8081',
                'timeout'  => 60.0,
            ]);

             $response = $client->request('GET', '', [
                 'query' => ['email' => $email, 'text' => $textArea],
                 'headers' => ['source' => 'SongShare', 'content-type' => 'text/html; charset=utf-8', 'Accept' => 'application/json']
            ]);

            $result = json_decode($response->getBody());
            if ($result->result == "positive") {
                return view('front.helpUs')->with('message', 'Mail sent successfully');
            }else{
                return view('front.helpUs')->with('message', 'Mail sending failed');
            }
        }catch(\GuzzleHttp\Exception\ConnectException $e){
            return view('front.helpUs')->with('message', 'Something went wrong...');
        }
    }
}
