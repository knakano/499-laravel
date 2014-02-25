<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/18/14
 * Time: 4:13 PM
 */

class DVDController extends BaseController{

    public function search() {
        return View::make('dvds/search', ['genres'=> DVD::getGenres(), 'ratings'=> DVD::getRatings()]);
    }

    public function listDVDs() {

        $dvd_title = Input::get('dvd_title');
        $dvd_genre = Input::get('dvd_genre');
        $dvd_rating = Input::get('dvd_rating');
        $query = DVD::with('genre','rating');

        if($dvd_title) {
            $query->where('title', 'LIKE', "%$dvd_title%");
        }

        if($dvd_genre && $dvd_genre!="all") {
            $query->where('genre_name', 'LIKE', "%$dvd_genre%");
        }

        if($dvd_rating && $dvd_rating!="all") {
            $query->where('rating_name', 'LIKE', "%$dvd_rating%");
        }

        // dd($songs);

        $dvds = $query->take(30)->get();
        return View::make('dvds/dvds-list', [
            'dvds' => $dvds

        ]);
    }



}