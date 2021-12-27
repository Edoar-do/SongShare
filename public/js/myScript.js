/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkSong(button){
  //button rappresenta la stringa 'create' o 'save' che consente di distinguere il caso create dal caso edit rispettivamente    
  
  var error = false;
  
  title = $("#title"); //oggetto Jquery che corrisponde al tag con id = 'title' 
  title_msg = $("#invalid-title");
  author = $("#author"); //oggetto Jquery che corrisponde al tag con id = 'author' 
  author_msg = $("#invalid-author");
  feat = $("#feat"); //oggetto Jquery che corrisponde al tag con id = 'feat'
  genre = $("#genre"); //oggetto Jquery che corrisponde al tag con id = 'genre'
  genre_msg = $("#invalid-genre");
  
  var regexAutore = /^(\S+(\ \S+)*)$/i;
  var regexGenere = /^[a-z]+(\ [a-z]+)*$/i;  
  
  if(title.val().trim() === ""){
      title_msg.html("The title field must not be empty");
      author_msg.html("");
      genre_msg.html("");
      title.focus();
      error = true;
  }else if(author.val().trim() === ""){
      author_msg.html("The author field must not be empty");
      title_msg.html("");
      genre_msg.html("");
      author.focus(); 
      error = true;
  }else if(genre.val().trim() === ""){
      genre_msg.html("The genre field must not be empty");
      author_msg.html("");
      title_msg.html("");
      genre.focus(); 
      error = true;
  }else if(regexAutore.test(author.val()) == false){
      author_msg.html("Invalid author name: only space-separated and visible char-composed names allowed");
      title_msg.html("");
      genre_msg.html("");
      author.focus();
      error = true;
  }else if(regexGenere.test(genre.val()) == false){
      genre_msg.html("Invalid genre name: only space-separated words allowed");
      title_msg.html("");
      author_msg.html("");
      genre.focus();
      error = true;
  }   
  
  // cosa fare se tutto va bene
  if(error == false){
    if(button === 'Create'){
        //controllo che la canzone non esista già con ajax
        $.ajax({
            url: 'ajaxSong',
            type: 'GET',
            data: { //dati passati in input
                title:title.val(),
                author:author.val(),
                feat:feat.val(),
                genre:genre.val()
                },
            success: function(data){ //dati in risposta dal server
                if(data.found){
                    error = true;
                    title_msg.html("Song with these attributes already existing");
                }else{
                    $("form[name=song]").submit(); //mando avanti la richiesta
                }
            }
        });
    }else{
        $("form[name=song]").submit(); //mando avanti la richiesta
    }
  }
}

function checkSearch(){
    
    var error = false;
    search = $("#search");
    search_msg = genre_msg = $("#invalid-search");
    
    if(search.val().trim() === ""){
        search_msg.html("The search field must not be empty");
        search.focus();
        error = true;
    }
    
    // cosa fare se tutto va bene
    
    if(error == false){
        
    }
}

function checkEmail(){
    var error = false;
    email = $("#email");
    email_msg = $("#invalid-email");
    
    var regexEmail = /^([a-z]+(\.[a-z]+)*@[a-z]+(\.[a-z]+)*\.[a-z]{2,3})$/i;
    var regexUsername = /^([a-z]+(\.[a-z]+)*@)/i;
    var regexDomain = /(@[a-z]+(\.[a-z]+)*\.[a-z]{2,3})$/i;
    
    if(email.val().trim() === ""){
        email_msg.html("Emai must not be empty");
        email.focus();
        error = true;
    }else if(regexUsername.test(email.val()) == false){
        email_msg.html("Invalid username: only dot-separated words ending with @");
        email.focus();
        error = true;
    }else if(regexDomain.test(email.val()) == false){
        email_msg.html("Invalid domain name: only dot-separated words starting with @");
        email.focus();
        error = true;
    }else if(regexEmail.test(email.val()) == false){
        email_msg.html("Only one @ allowed");
        email.focus();
        error = true;
    }
    
    // cosa fare se tutto va bene
    
    if(error == false){
        
    }
}


