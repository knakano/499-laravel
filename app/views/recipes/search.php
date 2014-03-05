<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 3/4/14
 * Time: 4:11 PM
 */ ?>

<!DOCTYPE html>
<html>
<head>
    <title>Recipe Search</title>
    <link rel="stylesheet" href="<?php echo asset('css/foundation.css')?>" type="text/css">
</head>
<body>
<div class="row" style="padding-top:50px">
    <div class="small-6 large-4 small-centered large-centered columns">
        <form method="get" action="/recipes">
            <h1>Recipe Search</h1>
            <div>
                <label>Keyword:</label>
                <input type="text" name="title"/>
            </div>
            <div>
                <input class="button" type="submit" value="Search" />
            </div>
        </form>
    </div>
</div>
</body>
</html>