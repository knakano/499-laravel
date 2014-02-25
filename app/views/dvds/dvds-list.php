<!doctype html>
<html>
<head>
    <title>DVD Search Results</title>
    <link rel="stylesheet" href="<?php echo asset('css/foundation.css')?>" type="text/css">
</head>
<body>
<div class="row" style="padding-top:50px">
    <div class="small-12 large-12 small-centered large-centered columns">
        <?php if (empty($dvds)) : ?>
            <h2>Sorry, no results were found. <a href="./dvds/search">Return to search</a></h2>
        <?php else: ?>
            <h2>DVD Search Results <a style="margin-left:50px;" class="button tiny" href="./dvds/search">Return to search</a></h2>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Rating</th>
                            <th>Genre</th>
                            <th>Label</th>
                            <th>Sound</th>
                            <th>Format</th>
                            <th>Release Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dvds as $dvd): ?>
                            <tr>
                                <td><?php echo $dvd->title; ?></td>
                                <td><?php echo $dvd->rating->rating_name; ?></td>
                                <td><?php echo $dvd->genre->genre_name; ?></td>
                                <td><?php echo $dvd->label->label_name; ?></td>
                                <td><?php echo $dvd->sound->sound_name; ?></td>
                                <td><?php echo $dvd->format->format_name; ?></td>
                                <td><?php echo $dvd->release_date; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        <?php endif; ?>
    </div>
</div>
</body>
</html>