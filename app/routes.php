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

Route::get('itunes', function() {
//    $endpoint = "https://itunes.apple.com/search?term=jack+johnson";
//    $json = file_get_contents($endpoint);
//    $json = json_decode($json);
    //dd ($json);


    $itunes = new \Itp\Api\ItunesSearch();
    $json = $itunes->getResults();
    return View::make('itunes', [
        'songs' => $json->results
    ]);
});


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

//Eloquent - DVD
Route::get('/dvds/create', function()
{
        $ratings = Rating::all();
        $genres = Genre::all();
        $labels = Label::all();
        $sounds = Sound::all();
        $formats = Format::all();
        return View::make('dvds/create', [
            'ratings' => $ratings,
            'genres' => $genres,
            'labels' => $labels,
            'sounds' => $sounds,
            'formats' => $formats
        ]);
});

Route::get('/recipes/search', 'RecipeController@search');
Route::get('/recipes', 'RecipeController@listRecipes');

Route::get('/songs/search', 'SongController@search');
Route::get('/songs', 'SongController@listSongs');

Route::get('/dvds/search', 'DVDController@search');
Route::get('/dvds', 'DVDController@listDVDs');


// Eloquent
Route::post('songs', function(){
//    $validation = Validator::make(Input::all(), [
//        'title' => 'required|min:2',
//        'price' => 'required|numeric'
//    ]);
    $validation = Song::validate(Input::all());

    if ($validation->passes()) {
        $song = new Song();
        $song->title = Input::get('title');
        $song->artist_id = Input::get('artist');
        $song->genre_id = Input::get('genre');
        $song->price = Input::get('price');
        $song->save();

        return Redirect::to('songs/create')
            ->with('success', 'Yay!');
    }

    return Redirect::to('songs/create')
        ->withInput()
        ->with('errors', $validation->messages());

});

// Eloquent - DVD
Route::post('dvds', function(){

    // title', 'rating_name', 'genre_name', 'label_name', 'sound_name', 'format_name', DB::raw("DATE_FORMAT(release_date, '%m-%d-%y %h:%i %p') AS release_date

    $validation = DVD::validate(Input::all());

    if ($validation->passes()) {
        $dvd = new DVD();
        $dvd->title = Input::get('title');
        $dvd->rating_id = Input::get('rating');
        $dvd->genre_id = Input::get('genre');
        $dvd->label_id = Input::get('label');
        $dvd->sound_id = Input::get('sound');
        $dvd->format_id = Input::get('format');
        $dvd->save();

        return Redirect::to('dvds/create')
            ->with('success', 'Yay! Your record was inserted successfully.');
    }

    return Redirect::to('dvds/create')
        ->with('errors', $validation->messages())
        ->withInput(Input::old('title'));

});

//
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


// Many to one relationships
Route::get('ratings/{id}', function($id){
    $rating = Rating::find($id);
    dd($rating->dvds);
});

// Many to one relationships
Route::get('genres/{id}', function($id){
    $genre = Genre::find($id);
    dd($genre->dvds);
});

// Many to one relationships
Route::get('labels/{id}', function($id){
    $label = Label::find($id);
    dd($label->dvds);
});

// Many to one relationships
Route::get('sounds/{id}', function($id){
    $sound = Sound::find($id);
    dd($sound->dvds);
});

// Many to one relationships
Route::get('formats/{id}', function($id){
    $format = Format::find($id);
    dd($format->dvds);
});


