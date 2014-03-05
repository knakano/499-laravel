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
        $genre = Input::get('genre');
        $rating = Input::get('rating');
        $query = DVD::with('genre', 'rating', 'label', 'sound', 'format');

        if($dvd_title) {
            $query = $query->where('title', 'LIKE', "%$dvd_title%");
        }

        if($genre && $genre!="all") {
            $query = DVD::join('genres','genres.id', '=', 'dvds.genre_id')
                       ->where('genre_name', '=', $genre);
                           // ->join('genres', 'dvds.genre_id', '=', 'genres.id');

//            $query = $query->join('genres', function($join) {
//                $join->on('dvds.genre_id', '=', 'genres.id');
//            });
//            $query = $query->where('genre_name', 'LIKE', "%$dvd_genre%");
        }

        if($rating && $rating!="all") {

            $query = DVD::join('ratings','ratings.id', '=', 'dvds.rating_id')
                ->where('rating_name', '=', $rating);
            //$query = $query->where('rating_name', 'LIKE', "%$rating%");
                //->join('ratings', 'dvds.rating_id', '=', 'ratings.id');
        }

        // dd($songs);
        //$dvds = DVD::search($dvd_title,$dvd_genre,$dvd_rating);

        $dvds = $query->take(30)->get();
        return View::make('dvds/dvds-list', [
            'dvds' => $dvds

        ]);
    }



}