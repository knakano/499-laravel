<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/11/14
 * Time: 6:12 PM
 */

class SongController extends BaseController{

    public function search() {
        return View::make('songs/search');
    }

    public function listSongs() {

        $song_title = Input::get('song_title');
        $artist = Input::get('artist');

        $songs = Song::search($song_title, $artist);
        // dd($songs);

        return View::make('songs/songs-list', [
            'songs' => $songs

        ]);
    }



} 