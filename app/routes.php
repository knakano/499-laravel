<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//Eloquent
Route::get('/songs/create', function()
{
    $artists = Artist::all();
    $genres = Genre::all();
	return View::make('songs/create', [
        'artists' => $artists,
        'genres' => $genres
    ]);
});


Route::get('/songs/search', 'SongController@search');
Route::get('/songs', 'SongController@listSongs');

Route::get('/dvds/search', 'DVDController@search');
Route::get('/dvds', 'DVDController@listDVDs');


// Eloquent
Route::post('songs', function(){

    $song = new Song();
    $song->title = Input::get('title');
    $song->artist_id = Input::get('artist');
    $song->genre_id = Input::get('genre');
    $song->price = Input::get('price');
    $song->save();

    return Redirect::to('songs/create')
        ->with('success', 'Yay!');
});

//Event::listen('illuminate.query', function($sql){
//
//    // Good for debugging
//    echo "<div style='color:red;'>$sql</div>";
//});

// Eloquent: Lazy Loading, N+1 problem
Route::get('songs', function(){
    $songs = Song::take(5)->get();

    foreach ($songs as $song) {
        var_dump($song->artist->toArray());
    }

    // dd($songs->toArray());
    // toJson();
});

// Eloquent: Eager Loading, Hyrdation
Route::get('songs2', function(){
    $songs = Song::with('artist', 'genre')
        ->take(5)->get();

    dd($songs);

//    foreach ($songs as $song) {
//        var_dump($song->toArray());
//           $song->artist->getArtistNameLowerCase();
//    }

});


// Many to one relationships
Route::get('artists/{id}', function($id){
    $artist = Artist::find($id);
    dd($artist->songs);
});
