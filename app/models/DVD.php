<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/18/14
 * Time: 4:13 PM
 */


class DVD extends Eloquent {


    protected $table = 'dvds';


    public function rating() {
        // Set up one to many relationship
        return $this->belongsTo('Rating');
    }


    public function genre() {
        // One to many relationship
        return $this->belongsTo('Genre');
    }

    public function label() {
        // One to many relationship
        return $this->belongsTo('Label');
    }

    public function sound() {
        // One to many relationship
        return $this->belongsTo('Sound');
    }

    public function format() {
        // One to many relationship
        return $this->belongsTo('Format');
    }


    public static function search($dvd_title, $dvd_genre, $dvd_rating)
    {
        $query = DB::table('dvds')
           // ->select('title', 'artist_name', 'genre', DB::raw("DATE_FORMAT(added, '%m-%d-%y %h:%i %p') AS added"))
            ->select('title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name', DB::raw("DATE_FORMAT(release_date, '%m-%d-%y %h:%i %p') AS release_date"))
            ->join('labels', 'dvds.label_id', '=', 'labels.id')
            ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->join('genres', 'dvds.genre_id', '=', 'genres.id')
            ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
            ->join('formats', 'dvds.format_id', '=', 'formats.id');

        if($dvd_title) {
            $query->where('title', 'LIKE', "%$dvd_title%");
        }

        if($dvd_genre && $dvd_genre!="all") {
            $query->where('genre_name', 'LIKE', "%$dvd_genre%");
        }

        if($dvd_rating && $dvd_rating!="all") {
            $query->where('rating_name', 'LIKE', "%$dvd_rating%");
        }

        $dvds = $query->get();

        return $dvds;

    }

    public static function getGenres() {
        $query = DB::table('genres')
            ->select('id','genre_name');

        $genres = $query->get();
        return $genres;

    }

    public static function getRatings() {
        $query = DB::table('ratings')
            ->select('id','rating_name');

        $ratings = $query->get();
        return $ratings;

    }
}