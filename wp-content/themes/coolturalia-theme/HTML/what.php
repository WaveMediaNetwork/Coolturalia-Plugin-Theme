<!DOCTYPE html>
<?php
include_once '../../../../wp-load.php';
$theme_path = get_stylesheet_directory_uri();
?>
<html lang="en">
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coolturalia</title>
    <link href="<?php echo $theme_path?>/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Metrophobic&family=Work+Sans:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet" type="text/css">
</head>
<body>
<div id="content-mobile">
    <main>
        <div id="containerWhat">
            <div id="headerWhat">
                <span>
                    <a href="<?php echo get_site_url();?>">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="10px" height="10px" viewBox="0 0 122.878 122.88" enable-background="new 0 0 122.878 122.88" xml:space="preserve"><g><path d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z"/></g></svg>
                    </a>
                </span>
            </div>
            <div id="mainWhat">
                <ul id="whatActivities">
                    <li><h3><a href="">#Performance</a></h3></li>
                    <li><h3><a href="">#Exhibition</a></h3></li>
                    <li><h3><a href="">#Conferences</a></h3></li>
                    <li><h3><a href="">#Independent cinema</a></h3></li>
                    <li><h3><a href="">#Outdoor</a></h3></li>
                    <li><h3><a href="">#Community</a></h3></li>
                    <li><h3><a href="">#Kids</a></h3></li>
                    <li><h3><a href="">#Cool Stuff</a></h3></li>
                    <li><h3><a href="">#By Coolturalia</a></h3></li>
                </ul>
            </div>
        </div>
        <div id="stickyWhat">
            <button type="button"><a href="<?php echo $theme_path?>/HTML/when.php">When</a></button>
            <button type="button" class="<?php echo $theme_path?>/HTML/what"><a href="#"><span class="whatColor">What</span></a></button>
            <button type="button"><a href="<?php echo $theme_path?>/HTML/where.php">Where</a></button>
        </div>
    </main>
</div>
</body>