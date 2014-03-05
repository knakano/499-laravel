<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/11/14
 * Time: 5:57 PM
 */

class Song extends Eloquent{

       public static function validate($input)
       {
           return Validator::make($input, [
               'title'=> 'required|min:4',
               'price'=> 'required|numeric'
           ]);
       }
       public function artist() {
           // Set up one to many relationship
           return $this->belongsTo('Artist');
       }


        public function genre() {
            // One to many relationship
            return $this->belongsTo('Genre');
        }

//    public static function search($song_title, $artist)
//    {
//
//        /**
//         * SELECT * FROM songs
//         * INNER JOIN artists
//         * ON songs.artist_id = artists.id
//         * INNER JOIN genres
//         * ON songs.genre_id = genres.id
//         */
//
//        /**
//         * SELECT title, artist_name, DATE_FORMAT(added, '%m-%d-%y') AS added
//         * FROM songs
//         * INNER JOIN artist
//         * ON songs.artist_id = artists.id
//         */
//
//
//        $query = DB::table('songs')
//            ->select('title', 'artist_name', 'genre', DB::raw("DATE_FORMAT(added, '%m-%d-%y %h:%i %p') AS added"))
//            ->join('artists', 'artists.id', '=', 'songs.artist_id')
//            ->join('genres', 'songs.genre_id', '=', 'genres.id');
//
//        if($song_title) {
//            $query->where('title', 'LIKE', "%$song_title%");
//        }
//
//        if($artist) {
//            $query->where('artist_name', 'LIKE', "%$artist%");
//        }
//
//        $songs = $query->get();
//
//        return $songs;
//
//    }
} 