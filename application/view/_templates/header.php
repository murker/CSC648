<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Books and Tutors SFSU</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- JS -->
        <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
        <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

        <!-- CSS -->
        <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- Top Bar -->
        <div>
            <div class="logo">
                <a href="<?php echo URL; ?>"><img src="<?php echo URL . '/img/logo.png' ?>" /></a>
            </div>
            <!-- navigation -->
            <div class="navigation">
                <a href="<?php echo URL; ?>products">sell an item</a>
                <a href="<?php echo URL; ?>cart">cart</a>
                <a href="<?php echo URL; ?>customers">register</a>
                <a href="<?php echo URL; ?>signin">sign in</a>
            </div>
            <div class="searchDiv">
                <form action="<?php echo URL; ?>searchproducts/index" method="POST">
                    <input type="text" name='searchinput' placeholder="Search for books, tutors and more!" required>
                    <input type="submit" name='submit_search_product' value="Search" class="searchButton" class="navigation">
                </form>
                </div>
            </div>