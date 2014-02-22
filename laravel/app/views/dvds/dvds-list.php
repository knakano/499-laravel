<!doctype html>
<html>
<head>
    <title>My DVDs</title>
</head>
<body>
<h1>My Songs</h1>
<?php foreach ($dvds as $dvd): ?>
    <div class="dvd">
        <h4>
            <?php echo $dvd->title; ?> by <?php echo $dvd->rating; ?>
        </h4>
        <p>Genre: <?php echo $dvd->genre; ?></p>
        <p>Label: <?php echo $dvd->label; ?></p>
        <p>Sound: <?php echo $dvd->sound; ?></p>
        <p>Format: <?php echo $dvd->fomrat; ?></p>
        <p>Added: <?php echo $dvd->release_date; ?></p>
    </div>
<?php endforeach; ?>
</body>
</html>