<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/18/14
 * Time: 4:25 PM
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>DVD Search</title>
    <link rel="stylesheet" href="<?php echo asset('css/foundation.css')?>" type="text/css">
</head>
<body>
<div class="row" style="padding-top:50px">
    <div class="small-6 large-4 small-centered large-centered columns">
        <form method="get" action="/dvds">
            <h1>DVD Search</h1>
            <div>
            <label>Title:</label>
                <input type="text" name="dvd_title"/>
            </div>
            <div>
            <label>Genre:</label>
            <select name ="genre">
                <option value="all">All</option>
                <?php foreach ($genres as $genre) : ?>
                    <option value="<?php echo $genre->id ?>">
                        <?php echo $genre->genre_name ?>
                    </option>
                <?php endforeach ?>
            </select>
            </div>
            <div>
                <label>Rating:</label>
                <select name ="rating">
                    <option value="all">All</option>
                    <?php foreach ($ratings as $rating) : ?>
                        <option value="<?php echo $rating->id ?>">
                            <?php echo $rating->rating_name ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <input class="button" type="submit" value="Search" />
            </div>
        </form>
    </div>
</div>
</body>
</html>