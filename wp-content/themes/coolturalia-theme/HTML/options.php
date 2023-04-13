<?php
include_once '../../../../wp-load.php';
$theme_path = get_stylesheet_directory_uri();
?>
<html lang="en">
<head>
    <meta charset ="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="<?php echo get_site_url();?>">
        <h1>Coolturalia</h1>
    </a>
    <link href="<?php echo $theme_path?>/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Encode+Sans:wght@300&family=Metrophobic&family=Work+Sans:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet" type="text/css">
</head>
<body>
<div id="content-mobile">
    <div id="containerOptions">
        <div id="headerOptions">
            <h3><a href="#">Login</a></h3>
            <a href="<?php echo get_site_url();?>">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="10px" height="10px" viewBox="0 0 122.878 122.88" enable-background="new 0 0 122.878 122.88" xml:space="preserve"><g><path d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z"/></g></svg>
            </a>
        </div>
        <div id="mainOptions">
            <div id="lang">
                <a href="">FR</a>
                <a href="">EN</a>
            </div>
            <div id="options">
                <h2><a href="<?php echo $theme_path?>/HTML/allEvents.php?event_category=all_events">All Events</a></h2>
                <h2><a href="<?php echo $theme_path?>/HTML/myCoolagenda.php"">My Coolagenda</a></h2>
                <h2><a href="">About Us</a></h2>
                <h2><a href="">Contact Us</a></h2>
            </div>
            <span><a href="">Subscribe to our newsletter</a></span>
        </div>
    </div>
</div>
</body>