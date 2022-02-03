#!/usr/bin/env python3
"""
A python script for http server and external service which offers a random songs among
those passed as input
"""
import json, random
from http.server import BaseHTTPRequestHandler, HTTPServer
import urllib.parse


def main():
    print('Avvio del server...')
    # Specifichiamo le impostazioni del server
    # Scegliamo la porta 8082 (per la porta 80 sono necessari i permessi di root)
    server_address = ('127.0.0.1', 8082)
    httpd = HTTPServer(server_address, testHTTPServer_RequestHandler)
    print('Server in esecuzione...')
    httpd.serve_forever()

class testHTTPServer_RequestHandler(BaseHTTPRequestHandler):
    # Implementiamo il metodo che risponde alle richieste GET
    def do_GET(self):
        if self.headers.__contains__('source') and self.headers['source'] == 'SongShare': #autenticazione sito presso server       
            
            params = self.path[2:].split('&')
            userID = urllib.parse.unquote(params[0].split('=')[1])
            songs = urllib.parse.unquote(params[1].split('=')[1])
            result = json.loads(songs) #lista di dizionari
            result = preprocessing(result) #lista di dizionari corretta

            # response code
            self.send_response(200)
            # headers
            self.send_header('Content-type', 'application/json')
            self.end_headers() 
            
            #spedire indietro la risposta json contenente la canzone scelta
            dailySong = json.dumps(random.choice(result))
            if dailySong != None and dailySong != '':
                 self.wfile.write(json.dumps({'result': dailySong}).encode())
            else:
                self.wfile.write(json.dumps({'result': 'negative'}).encode())
           
            return
        else: # autenticazione fallita
            self.send_response(403)
            self.send_header('Content-type', 'application/json')
            self.end_headers()
            self.wfile.write((json.dumps({'result': 'negative'})).encode())
            return

def preprocessing(songs):
    for song in songs:
        song.pop('id', None)
        song.pop('likes', None)
        song.pop('user_id', None)
        song.pop('created_at', None)
        song.pop('updated_at', None)
        if song['feat'] == None:
            song['feat'] = ''
    return songs


if __name__ == "__main__":
    main()
