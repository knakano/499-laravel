<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 3/4/14
 * Time: 4:12 PM
 */ ?>
<!doctype html>
<html>
<head>
    <title>Recipe Search Results</title>
    <link rel="stylesheet" href="<?php echo asset('css/foundation.css')?>" type="text/css">
</head>
<body>
<div class="row" style="padding-top:50px">
    <div class="small-12 large-12 small-centered large-centered columns">

        <?php if (empty($recipes)) : ?>
            <h2>Sorry, no results were found. <a href="./recipes/search">Return to search</a></h2>
        <?php else: ?>
            <h2>Recipe Search Results <a style="margin-left:50px;" class="button tiny" href="./recipes/search">Return to search</a></h2>
            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Ingredients</th>
                    <th>Link to Recipe</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($recipes as $recipe): ?>
                    <tr>
                        <td><?php echo $recipe->title; ?></td>
                        <td><?php echo $recipe->ingredients; ?></td>
                        <td><a target="_new" href="<?php echo $recipe->href ?>">Link</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
</body>
</html>