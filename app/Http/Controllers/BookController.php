<?php

namespace SongShare\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SongShare\DataLayer;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index() {
        // view with the list of books
        // GET method (path "/book")
        // root name: book.index
        
        $dl = new DataLayer();
        //$userID = $dl->getUserID($_SESSION["loggedName"]);
        $userID = Auth::user()->id;
        $books_list = $dl->listUserSongs($userID);
        //return view('book.booksBootstrap')->with('logged',true)
        //        ->with('loggedName', $_SESSION["loggedName"])
        //        ->with('bookList', $books_list);
        return view('book.booksBootstrap')->with('bookList', $books_list);
    }
    
    public function create() {
        // view with creation form
        // GET method (path "/book/create")
        // root name: book.create
        
        $dl = new DataLayer();
        //$userID = $dl->getUserID($_SESSION["loggedName"]);
        $userID = auth()->id();
        $authors_list = $dl->listAuthors($userID);
        
        //return view('book.editBookBootstrap')->with('logged',true)
        //        ->with('loggedName', $_SESSION["loggedName"])
        //        ->with('authorList', $authors_list);
        return view('book.editBookBootstrap')->with('authorList', $authors_list);
    }
    
    public function store(Request $request) {
        // for saving just created book
        // POST method (path "/book")
        // root name: book.store
        
        $dl = new DataLayer();
        //$userID = $dl->getUserID($_SESSION["loggedName"]);
        $userID = auth()->id();
        $dl->addSong($request->input('title'), $request->input('author_id'),$userID);
        return Redirect::to(route('book.index'));
    }
    
    public function show() {
        // for showing single book details
        // GET method (path "/book/{book}")
        // root name: book.show
        // NOT USED 
    }
    
    public function edit($id) {
        // view with edit form
        // GET method (path "/book/{book}/edit")
        // root name: book.edit
        
        $dl = new DataLayer();
        //$userID = $dl->getUserID($_SESSION["loggedName"]);
        $userID = auth()->id();
        $authors_list = $dl->listAuthors($userID);
        $book = $dl->findSongById($id);
        
        //return view('book.editBookBootstrap')->with('logged',true)
        //        ->with('loggedName', $_SESSION["loggedName"])
        //        ->with('authorList', $authors_list)->with('book', $book);
        return view('book.editBookBootstrap')
                ->with('authorList', $authors_list)->with('book', $book);
    }
    
    public function update(Request $request, $id) {
        // for saving just modified book
        // PUT method (path "/book/{book}") - root name: book.update NOT USED      
        // GET method (path "/book/{id}/update") - root name: book.update
        
        $dl = new DataLayer();
        $dl->editSong($id, $request->input('title'), $request->input('author_id'));
        return Redirect::to(route('book.index'));
    }
    
    public function destroy ($id) {
        // for deleting book
        // DELETE method (path "/book/{book}") - root name: book.destroy NOT USED
        // GET method (path "/book/{id}/destroy") - root name: book.destroy
        
        $dl = new DataLayer();
        $dl->deleteSong($id);
        return Redirect::to(route('book.index'));
    }
    
    public function confirmDestroy($id) {
        
        $dl = new DataLayer();
        $book = $dl->findSongById($id);
        if($book !== null)
        {
            //return view('book.deleteBookBootstrap')->with('logged',true)
            //    ->with('loggedName', $_SESSION["loggedName"])
            //    ->with('book',$book);
            return view('book.deleteBookBootstrap')->with('book',$book);
        }
        else
        {
            //return view('book.deleteErrorPage')->with('logged',true)
            //    ->with('loggedName', $_SESSION["loggedName"]);
            return view('book.deleteErrorPage');
        }
    }
}
