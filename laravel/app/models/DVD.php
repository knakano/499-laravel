<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/18/14
 * Time: 4:13 PM
 */


class DVD {
    public static function search($dvd_title)
    {
        $query = DB::table('dvds')
           // ->select('title', 'artist_name', 'genre', DB::raw("DATE_FORMAT(added, '%m-%d-%y %h:%i %p') AS added"))
            ->select('title', 'rating', 'genre', 'label', 'sound', 'format', 'release_date')
            ->join('artists', 'artists.id', '=', 'songs.artist_id')
            ->join('labels', 'dvds.label_id', '=', 'labels.id')
            ->join('sounds', 'dvds.sound_id', '=', 'sounds.id')
            ->join('genres', 'dvds.genre_id', '=', 'genres.id')
            ->join('ratings', 'dvds.rating_id', '=', 'ratings.id')
            ->join('formats', 'dvds.format_id', '=', 'formats.id');

        if($song_title) {
            $query->where('title', 'LIKE', "%$dvd_title%");
        }

        $dvds = $query->get();

        return $dvds;

    }
}