<?php
/**
 * Created by PhpStorm.
 * User: kalynnakano
 * Date: 2/24/14
 * Time: 6:01 PM
 */?>

<!DOCTYPE html>
<html>
<head>
    <title>Create DVD</title>
    <link rel="stylesheet" href="<?php echo asset('css/foundation.css')?>" type="text/css">
</head>
<body>
<?php if (Session::has('success')) : ?>
    <div data-alert class="alert-box success">
        <?php echo Session::get('success') ?>
    </div>
<?php endif; ?>

<?php //var_dump($errors->all()); ?>

<?php if (Session::has('errors')) : ?>
    <div data-alert class="alert-box warning">
        <?php foreach ($errors->all() as $error) : ?>
            <?php echo $error ?>
        <?php endforeach ?>
    </div>
<?php endif; ?>
<div class="row" style="padding-top:50px">
    <div class="small-6 large-4 small-centered large-centered columns">
        <form action = "<?php echo url('dvds')?>" method="post">
            <h1>Create DVD</h1>
            <div>
                <label>Title:</label> <input type="text" name="title">
            </div>
            <div>
                <label>Rating:</label>
                <select name ="rating">
                    <?php foreach ($ratings as $rating) : ?>
                        <option value="<?php echo $rating->id ?>">
                            <?php echo $rating->rating_name ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label>Genre:</label>
                <select name ="genre">
                    <?php foreach ($genres as $genre) : ?>
                        <option value="<?php echo $genre->id ?>">
                            <?php echo $genre->genre_name ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label>Label:</label>
                <select name ="label">
                    <?php foreach ($labels as $label) : ?>
                        <option value="<?php echo $label->id ?>">
                            <?php echo $label->label_name ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label>Sound:</label>
                <select name ="sound">
                    <?php foreach ($sounds as $sound) : ?>
                        <option value="<?php echo $sound->id ?>">
                            <?php echo $sound->sound_name ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <label>Format:</label>
                <select name ="format">
                    <?php foreach ($formats as $format) : ?>
                        <option value="<?php echo $format->id ?>">
                            <?php echo $format->format_name ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div>
                <input class="button" type="submit" value="Create DVD">
            </div>
        </form>
    </div>
</div>
</body>
</html>