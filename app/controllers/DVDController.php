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

        $dvds = DVD::search($dvd_title, $dvd_genre, $dvd_rating);
        // dd($songs);

        return View::make('dvds/dvds-list', [
            'dvds' => $dvds

        ]);
    }



}